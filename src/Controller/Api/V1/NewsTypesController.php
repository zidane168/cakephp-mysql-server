<?php
declare(strict_types=1);

namespace App\Controller\Api\V1;

use App\Controller\Api\AppController;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;

/**
 * ChildCategories Controller
 *
 * @property \App\Model\Table\ChildCategoriesTable $ChildCategories
 * @method \App\Model\Entity\ChildCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsTypesController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
    }

    public function getList()
    {
        $this->Api->init();
        $params = [];
        $status = 999;
        $message = "";

        try {
            if ($this->request->is('get')) {

                $payload = $this->request->getQuery();
                if (!isset($payload['language']) || empty($payload['language'])) {
                    $message = __('missing_parameter') .  ' language';

                } else {
                    $this->Api->set_language($payload['language']);

                    $response = $this->NewsTypes->get_list($payload['language']);
                    $status     = 200;
                    $message    = __('retrieve_data_successfully');
                 
                    if (!empty($response->toArray())) {
                        $params     = $response;
                    }

                    $this->write_api_log($payload, $response, json_encode($response));
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

        $this->Api->set_result($status, $message, $params);
        $this->Api->output($this);
    }

}
