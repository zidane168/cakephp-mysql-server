<?php
declare(strict_types=1);

namespace App\Controller\Api\V1;

use App\Controller\Api\AppController;
use Cake\Event\EventInterface;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 * @method \App\Model\Entity\Member[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsController extends AppController
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

                } elseif (!isset($payload['limit']) || empty($payload['limit'])) {
                    $message = __('missing_parameter') .  ' limit';

                } else {
                    $this->Api->set_language($payload['language']);
                    $response =  $this->News->get_list($payload);

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

    public function getAll()
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
                    $response =  $this->News->get_all($payload);

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

    public function getItemsByTypeId()
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

                } elseif (!isset($payload['new_type_id']) || empty($payload['new_type_id'])) {
                    $message = __('missing_parameter') .  ' new_type_id';

                } elseif (!isset($payload['page']) || empty($payload['page'])) {
                    $message = __('missing_parameter') .  ' page';

                } elseif (!isset($payload['limit']) || empty($payload['limit'])) {
                    $message = __('missing_parameter') .  ' limit';

                } else {
                    $this->Api->set_language($payload['language']);
                    $news =  $this->News->api_get_items_by_type_id($payload['new_type_id'], $payload['limit'], $payload['language'], $payload['page']);

                    $status     = 200;
                    $message    = __('retrieve_data_successfully');
                    $params     = $news;
    
                    $this->write_api_log($payload, $news, $news);
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

    public function getItemsBySlug()
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

                } elseif (!isset($payload['slug']) || empty($payload['slug'])) {
                    $message = __('missing_parameter') .  ' slug';

                } elseif (!isset($payload['page']) || empty($payload['page'])) {
                    $message = __('missing_parameter') .  ' page';

                } elseif (!isset($payload['limit']) || empty($payload['limit'])) {
                    $message = __('missing_parameter') .  ' limit';

                } else {
                    $this->Api->set_language($payload['language']);
                    $news =  $this->News->api_get_items_by_slug($payload['slug'], $payload['limit'], $payload['language'], $payload['page']);

                    $status     = 200;
                    $message    = __('retrieve_data_successfully');
                    $params     = $news;
    
                    $this->write_api_log($payload, $news, $news);
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

    public function getDetail()
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

                } else if (!isset($payload['slug']) || empty($payload['slug'])) {
                    $message = __('missing_parameter') .  ' slug';

                } else {
                    $this->Api->set_language($payload['language']);
                    $rel =  $this->News->get_detail($payload);

                    $status     = $rel['status'];
                    $message    = $rel['message'];
                    $params     = $rel['params'];
    
                    $this->write_api_log($payload, $params, $params);
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

                } else if (!isset($payload['keyword']) || empty($payload['keyword'])) {
                    $message = __('missing_parameter') .  ' keyword';

                } else {
                    $this->Api->set_language($payload['language']);
                    $rel =  $this->News->search($payload);

                    $status     = $rel['status'];
                    $message    = $rel['message'];
                    $params     = $rel['params'];
    
                    $this->write_api_log($payload, $params, $params);
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
