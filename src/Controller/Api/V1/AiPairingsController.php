<?php

declare(strict_types=1);

namespace App\Controller\Api\V1;

use App\Controller\Api\AppController;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AiPairingsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
    }

    public function send()
    {
        $this->Api->init();
        $params = (object)array();
        $status = 999;
        $message = "";

        try {
            if ($this->request->is('post')) {
                $payload = $this->request->getData();

                if (!isset($payload['product_type_id']) || empty($payload['product_type_id'])) {  // 1: rent, 2 sell
                    $message    = __('missing') . " product_type_id";

                } elseif (!isset($payload['area_code']) || empty($payload['area_code'])) {
                    $message    = __('missing') . " area_code";

                } elseif (!isset($payload['phone']) || empty($payload['phone'])) {
                    $message    = __('missing') . " phone";

                } elseif (!isset($payload['region_id']) || empty($payload['region_id'])) {
                    $message    = __('missing') . " region_id";

                } elseif (!isset($payload['district_id']) || empty($payload['district_id'])) {
                    $message    = __('missing') . " district_id";

                } elseif (!isset($payload['subdistrict_id']) || empty($payload['subdistrict_id'])) {
                    $message    = __('missing') . " subdistrict_id";

                } elseif (!isset($payload['product_name']) || empty($payload['product_name'])) {
                    $message    = __('missing') . " product_name";

                } elseif (!isset($payload['code']) || empty($payload['code'])) {
                    $message    = __('missing') . " code";

                } else {

                    $response = $this->AiPairings->send($payload);

                    $status     = $response['status'];
                    $message    = $response['message'];

                    $this->write_api_log($payload, $response, $params);
                }
            }
        } catch (\Exception $e) {
            $response = $this->show_catch_message_api($e);
            $this->response = $response['response'];
            $message        = $response['message'];
            $status         = $response['status'];
        }

        $this->Api->set_result($status, $message, $params);
        $this->Api->output($this);
    }
}
