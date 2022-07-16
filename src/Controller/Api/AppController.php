<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
// namespace App\Controller;
namespace App\Controller\Api; // vilh important for split AppController backend/frontend

use Cake\Controller\Controller;
use Cake\Event\EventInterface;

use Cake\I18n\I18n;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    protected $default_language = 'zh_HK';

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Api');
        $this->loadComponent('Sms');
        $this->loadComponent('Email');
        $this->loadComponent('RequestHandler');

    }
    
    public function beforeFilter(EventInterface $event) {
        I18n::setLocale($this->default_language);
        
    }


    public function get_current_api_url($v1 = 'v1') {
        $controller = $this->request->getParam('controller');
        $action = $this->request->getParam('action');
        return '\api\\' . $v1 . '\\'. $controller . '\\' . $action . '.json';

    }

    // $level =
    //          'info'
    //          'warning'
    //          'error'
    //          'alert'
    //          'emergency'
    //          'critical'
    //          'notice'
    //          'debug'
    //          'info'
    //          'warning'
    //          'error'
    //          'alert'
    //          'emergency'
    //          'critical'
    //          'notice'
    //          'debug'
    public function write_api_log($request, $result, $data, $level = 'info') {
        $event = new Event('Model.Common.writeAPILog', $this, [
            'level'     => $level,
            'url'       => $this->get_current_api_url(),
            'request'   => $request,
            'response'  => $result,
            'data'      => $data,
        ]);
        $this->getEventManager()->dispatch($event);
    }

    public function show_catch_message_api($e) {
        $response = $this->response->withStatus(501);
        $message = json_encode($e->getMessage());
        $status = 501;

        return array(
            'status'    => $status,
            'message'   => $message,
            'response'  => $response,
        );
    }
}
