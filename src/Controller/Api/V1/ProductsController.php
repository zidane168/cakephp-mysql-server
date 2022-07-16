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
class ProductsController extends AppController
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
            if ($this->request->is('post')) {
                $payload = $this->request->getData();

                if (!isset($payload['language']) || empty($payload['language'])) {
                    $message = __('missing_parameter') .  ' language';
                } elseif (!isset($payload['product_type_id']) || empty($payload['product_type_id'])) {
                    $message = __('missing_parameter') .  ' product_type_id';
                } elseif (!isset($payload['limit']) || empty($payload['limit'])) {
                    $message = __('missing_parameter') .  ' limit';
                } else {
                    $this->Api->set_language($payload['language']);

                    if (isset($payload['token']) && !empty($payload['token'])) {
                        $obj_Members = TableRegistry::get('Members');
                        $member = $obj_Members->get_token_by_id($payload['token']);

                        $response = $this->Products->get_list($payload, $member->id);
                    } else {
                        $response = $this->Products->get_list($payload);
                    }


                    $status     = $response['status'];
                    $message    = $response['message'];
                    $params     = $response['params'];

                    $this->write_api_log($payload, $response, $response['params']);
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

    public function search()
    {
        $this->Api->init();
        $params = [];
        $status = 999;
        $message = "";

        try {
            if ($this->request->is('post')) {
                $payload = $this->request->getData();

                if (!isset($payload['language']) || empty($payload['language'])) {
                    $message = __('missing_parameter') .  ' language';
                } elseif (!isset($payload['page']) || empty($payload['page'])) {
                    $message = __('missing_parameter') .  ' page';
                } elseif (!isset($payload['limit']) || empty($payload['limit'])) {
                    $message = __('missing_parameter') .  ' limit';
                } else {
                    $this->Api->set_language($payload['language']);
                    if (isset($payload['token']) && !empty($payload['token'])) {
                        $obj_Members = TableRegistry::get('Members');
                        $member = $obj_Members->get_token_by_id($payload['token']);

                        $response = $this->Products->search($payload, $member->id);
                    } else {
                        $response = $this->Products->search($payload);
                    }

                    $status     = $response['status'];
                    $message    = $response['message'];
                    $params     = $response['params'];

                    $this->write_api_log($payload, $response, $response['params']);
                }
            }
        } catch (\Exception $ex) {
            $this->response = $this->response->withStatus(501);
            $message = $ex->getMessage();
            $status = 501;
        }

        $this->Api->set_result($status, $message, $params);
        $this->Api->output($this);
    }

    // getDetail
    public function getDetail()
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
                } elseif (!isset($payload['slug']) || empty($payload['slug'])) {
                    $message = __('missing_parameter') .  ' slug';
                } else {
                    $this->Api->set_language($payload['language']);

                    if (isset($payload['token']) && !empty($payload['token'])) {
                        $obj_Members = TableRegistry::get('Members');
                        $member = $obj_Members->get_token_by_id($payload['token']);

                        if (!$member) {
                            $status     = 999;
                            $message    = __d('member', 'invalid_member');
                           
                        } else {
                            $response = $this->Products->get_detail($payload, $member->id);
                        }

                    } else {
                        $response = $this->Products->get_detail($payload);

                        $status     = $response['status'];
                        $message    = $response['message'];
                        $params     = $response['params'];

                        $this->write_api_log($payload, $response, $response['params']);
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

        load_data:
        $this->Api->set_result($status, $message, $params);
        $this->Api->output($this);
    }

    // getRelatedProducts
    public function getRelatedProducts() {
        $this->Api->init();
        $params = [];
        $status = 999;
        $message = "";

        try {
            if ($this->request->is('post')) {
                $payload = $this->request->getData();

                if (!isset($payload['language']) || empty($payload['language'])) {
                    $message = __('missing_parameter') .  ' language';
              
                } else {

                    if (    ( !isset($payload['district_id']) && !isset($payload['name']) ) || 
                            ( empty($payload['district_id']) && empty($payload['name']) ) 
                        )  {
                        $message = __('must_choose_one_and_two_params: district_id_or_name');
                        goto return_data;
                    } 

                    $this->Api->set_language($payload['language']);

                    if (isset($payload['token']) && !empty($payload['token'])) {
                        $obj_Members = TableRegistry::get('Members');
                        $member = $obj_Members->get_token_by_id($payload['token']);

                        if (!$member) {
                            $message = __d('member', 'invalid_member');
                            goto return_data;
                        } 
                        
                        $response = $this->Products->get_related_products($payload, $member->id);
                        

                    } else {
                        $response = $this->Products->get_related_products($payload);
                    }


                    $status     = $response['status'];
                    $message    = $response['message'];
                    $params     = $response['params'];

                    $this->write_api_log($payload, $response, $response['params']);
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
