<?php

declare(strict_types=1);

namespace App\Controller\Api\V1;

use App\Controller\Api\AppController;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductViolatesController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
    }

    public function create()
    {
        $this->Api->init();
        $params = (object)array();
        $status = 999;
        $message = "";

        try {
            if ($this->request->is('post')) {
                $payload = $this->request->getData();

                if (!isset($payload['language']) || empty($payload['language'])) {
                    $message = __('missing_parameter') .  ' language';

                } elseif (!isset($payload['product_id']) || empty($payload['product_id'])) {
                    $message = __('missing_parameter') .  ' product_id';

                } elseif (!isset($payload['token']) || empty($payload['token'])) {
                    $message = __('missing_parameter') .  ' token';

                } elseif (!isset($payload['content']) || empty($payload['content'])) {
                    $message = __('missing_parameter') .  ' content';

                } else {
                    $this->Api->set_language($payload['language']);

                    $obj_Members = TableRegistry::get('Members');
                    $member = $obj_Members->get_token_by_id($payload['token']);
                    if (!$member) {

                        $status     = 999;
                        $message    = __d('member', 'invalid_member');

                    } else {

                        // check exist before report
                        $product_violate = $this->ProductViolates->find('all', [
                            'conditions' => [
                                'ProductViolates.product_id' => $payload['product_id'],
                                'ProductViolates.member_id' => $member->id,
                            ],
                        ])->first();

                        if ($product_violate) {
                            $status     = 999;
                            $message    = __d('product', 'exist_violate');
                            goto return_data;
                        }

                        $response = $this->ProductViolates->create($payload, $member->id);

                        $status     = $response['status'];
                        $message    = $response['message'];
                        $this->write_api_log($payload, $response, $params);
                    }
                }
            } else {
                $message        = __('invalid_method');
                $status         = 999;
            }
        } catch (\Exception $e) {
            $response = $this->show_catch_message_api($e);
            $this->response = $response['response'];
            $message        = $response['message'];
            $status         = $response['status'];
        }

        return_data:
        $this->Api->set_result($status, $message, $params);
        $this->Api->output($this);
    }
}
