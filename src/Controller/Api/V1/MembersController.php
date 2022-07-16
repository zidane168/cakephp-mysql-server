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
class MembersController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
    }

    // phone + password
    // google + facebook;
    public function login()
    {
        $this->Api->init();
        $params = [];
        $status = 999;
        $message = "";

        try {
            if ($this->request->is('post')) {
                $payload = $this->request->getData();
                // $this->Api->set_language("english"); // set default on App/v1/AppController

                $response = $this->Members->login($payload);

                $status     = $response['status'];
                $message    = $response['message'];
                $params     = $response['params'];

                $this->write_api_log($payload, $response, $response['params']);
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

    public function logout()
    {
        $this->Api->init();
        $params = [];
        $status = 999;
        $message = "";

        try {
            if ($this->request->is('post')) {
                $payload = $this->request->getData();

                if (!isset($payload['token']) || empty($payload['token'])) {
                    $message    = __('missing') . " token";
                } else {
                    $response = $this->Members->logout($payload);
                    $status     = $response['status'];
                    $message    = $response['message'];
                    $params     = $response;
                }

                $this->write_api_log($payload, $params, []);
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

    public function sendSmsVerificationCode()
    {     
        $this->Api->init();
        $status = 999;
        $message = "";
        $params = (object)array();
        $db = $this->Members->getConnection();
        $db->begin();

        try {
            if ($this->request->is('post')) {

                $payload = $this->request->getData();

                if ((!isset($payload['area_code']) || empty($payload['area_code']))) {
                    $message = __('missing_parameter') .  'area_code';
                } elseif ((!isset($payload['phone']) || empty($payload['phone']))) {
                    $message = __('missing_parameter') .  'phone';
                } elseif ((!isset($payload['verification_type']) || empty($payload['verification_type']))) {
                    $message = __('missing_parameter') .  ' verification_type';
                } else {

                    $temp = 1;
                    $lang = $temp == 1 ? 'zh_HK' : 'en_US';
                    $receiver = array(  // array phone
                        array(
                            'phone'     => $payload['area_code'] . $payload['phone'],
                            'language'    => $lang,
                        )
                    );
                    $obj_MemberVerification = TableRegistry::get('MemberVerifications');
                    if ($payload['verification_type'] == array_search('Register', $obj_MemberVerification->verification_types)) {
                        // if exist phone, dont allow send sms for register again

                        $member = $this->Members->find('all', [
                            'conditions' => [
                                'area_code' => $payload['area_code'],
                                'phone' => $payload['phone'],
                            ],
                        ])->first();

                        if ($member) {
                            $status = 999;
                            $message = __d('member', 'exist_phone');
                            goto return_data;
                        }
                    
                    }  elseif ($payload['verification_type'] == array_search('Forgot password', $obj_MemberVerification->verification_types)) {
                       
                        $member = $this->Members->find('all', [
                            'conditions' => [
                                'area_code' => $payload['area_code'],
                                'phone' => $payload['phone'],
                            ],
                        ])->first();

                        if (!$member) {
                            $status = 999;
                            $message = __d('member', 'invalid_member');
                            goto return_data;
                        }
                    }

                    // gen code, reset table info, save table info into MemberVerifications
                    $verification_method = array_search('Sms', $obj_MemberVerification->verification_methods);
                    
                    // send succeed, disabled oldest
                    $obj_MemberVerification->update_enabled_to_disabled($payload['phone'], $payload['area_code'],  $payload['verification_type'], $verification_method);

                    $result_MemberVerification = $obj_MemberVerification->handling_verify_data(
                        // $member,
                        $verification_method,
                        $payload['verification_type'],
                        '',
                        $payload['phone'],
                        $payload['area_code']
                    );

                    if ($result_MemberVerification['status'] == 999) {
                        $status = 999;
                        $message = $result_MemberVerification['message'];
                        goto return_data;
                    }

                    $sms_message = "";
                    if ($payload['verification_type'] == array_search('Register', $obj_MemberVerification->verification_types)) {
                        $sms_message = array(
                            $lang => __d('member', 'verification_code_sms', $result_MemberVerification['verify_code'], Configure::read('sms.timeout_message'))
                        );
                    
                    } elseif ($payload['verification_type'] == array_search('Forgot password', $obj_MemberVerification->verification_types)) {
                        $sms_message = array(
                            $lang => __d('member', 'forgot_password', $result_MemberVerification['verify_code'], Configure::read('sms.timeout_message'))
                        );

                    } elseif ($payload['verification_type'] == array_search('Ai Pairing', $obj_MemberVerification->verification_types)) {
                        $sms_message = array(
                            $lang => __d('member', 'ai_pairing', $result_MemberVerification['verify_code'], Configure::read('sms.timeout_message'))
                        );
                    }

                    $title = array($lang => __('ECPark'));

                    $sent_data = $this->Sms->send_sms($receiver, $title, $sms_message, 'Verification');

                    if (!$sent_data['status']) {
                        $this->write_api_log($payload, $sent_data['error_message'], $params, 'error');
                        $status = 999;
                        $message = __d('member', 'send_sms_failed') . ' ' . $sent_data['error_message'];
                        goto return_data;

                    } else {
                      
                        if (isset($sent_data['params']['failed']) && !empty($sent_data['params']['failed'])) {
                            $status = 999;
                            $message = __d('member', 'send_sms_failed') . ' ' . json_encode($sent_data['params']);
                            goto return_data;
                        }
                    }

                   
                    $params = array(
                    //     'verify_code'                 => $result_MemberVerification['verify_code'],
                        'number_sent_verification'     => $result_MemberVerification['number_sent_verification']
                    );

                    $db->commit();
                    $status = 200;
                    $message = __d('member', 'send_sms_successfully');
                }

            } else {
                $db->rollback();
                $status = 999;
                $message =  __('invalid_method');
            }
        } catch (\Exception $e) {

            $db->rollback();
            $response = $this->show_catch_message_api($e);
            $this->response = $response['response'];
            $message        = $response['message'];
            $status         = $response['status'];
        }
        return_data:
        $this->Api->set_result($status, $message, $params);
        $this->Api->output($this);
    }

    public function register()
    {
        $this->Api->init();
        $params = (object)array();
        $status = 999;
        $message = "";

        try {
            if ($this->request->is('post')) {
                $payload = $this->request->getData();

                if (!isset($payload['area_code']) || empty($payload['area_code'])) {
                    $message    = __('missing') . " area_code";
                } elseif (!isset($payload['phone']) || empty($payload['phone'])) {
                    $message    = __('missing') . " phone";
                } elseif (!isset($payload['password']) || empty($payload['password'])) {
                    $message    = __('missing') . " password";
                } elseif (!isset($payload['email']) || empty($payload['email'])) {
                    $message    = __('missing') . " email";
                } elseif (!isset($payload['code']) || empty($payload['code'])) {
                    $message    = __('missing') . " code";
                } else {
                    $response = $this->Members->register($payload);
                    $status     = $response['status'];
                    $message    = $response['message'];
                    $params     = $response['params'];

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

    public function checkSmsForgotCode()
    {
        $this->Api->init();
        $params = (object)array();
        $status = 999;
        $message = "";

        try {
            if ($this->request->is('post')) {
                $payload = $this->request->getData();

                if (!isset($payload['area_code']) || empty($payload['area_code'])) {
                    $message    = __('missing') . " area_code";
                } elseif (!isset($payload['phone']) || empty($payload['phone'])) {
                    $message    = __('missing') . " phone";
                } elseif (!isset($payload['code']) || empty($payload['code'])) {
                    $message    = __('missing') . " code";

                } else {
                    $response = $this->Members->check_sms_forgot_code($payload);
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

    public function changePassword()
    {
        $this->Api->init();
        $params = (object)array();
        $status = 999;
        $message = "";

        try {
            if ($this->request->is('post')) {
                $payload = $this->request->getData();

                if (!isset($payload['area_code']) || empty($payload['area_code'])) {
                    $message    = __('missing') . " area_code";
                } elseif (!isset($payload['phone']) || empty($payload['phone'])) {
                    $message    = __('missing') . " phone";
                } elseif (!isset($payload['code']) || empty($payload['code'])) {
                    $message    = __('missing') . " code";
                } elseif (!isset($payload['password']) || empty($payload['password'])) {
                    $message    = __('missing') . " password";

                } else {
                    $response = $this->Members->change_password($payload);
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
