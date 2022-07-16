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
namespace App\Controller\Admin; // vilh important for split AppController backend/frontend

use Cake\Controller\Controller;
use Cake\Core\Configure;
Use Cake\Routing\Router;
use Cake\Error\Debugger;
use Cake\Event\EventInterface;
use Cake\I18n\I18n;
use Cake\Http\Exception\NotFoundException;
use Cake\ORM\TableRegistry;

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
    public $default_language    = 'en_US'; // zh_HK';  //'en_US';  // 'zh_HK';
    public $lang18              = '';
    public $is_admin            = true;
    private $allow_actions = array('index', 'add', 'edit', 'view', 'delete', 'approve');
    public static $session_administrator_id = null;
	

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
      
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Common');

        /*
         * Enable the following component for recommended CakePHP form protection settings.
         * see https://book.cakephp.org/4/en/controllers/components/form-protection.html
         */
        //$this->loadComponent('FormProtection');
    }

 
    public function beforeFilter(EventInterface $event) {

        $this->viewBuilder()->setLayout('admin/default');

       
 
    }
    
    public function beforeRender(EventInterface $event)
    {
        $available_language  = array(
            'zh_HK',
            // 'en_US',
        );

        $current_language = $this->lang18;

        $this->set(compact('available_language', 'current_language'));
    }

	public function addNewImageWithType() { // Different cakephp2, convert this to get
		$data = $this->request->getQuery();

        $this->viewBuilder()->setLayout('admin/blank');

		if ($data) {
			$images_model = $data['images_model'];

            // init imagetype
            $obj_ImageTypes = TableRegistry::get('ImageTypes');
			$imageTypes = $obj_ImageTypes->find_list(array(
                'ImageTypes.slug LIKE' => strtolower($data['base_model']) . "%"
            ), $this->lang18);

			$this->set(compact('imageTypes', 'images_model'));

            // $this->render('AddMoreControls/add_new_image_with_type');      // Admin/Courses/AddMoreControls/add_new_image_with_type.php <-- use current controller
            $this->render('/Admin/PageBEs/add_new_image_with_type');      // /Admin/AddMoreControls/add_new_image_with_type.php
		
        } else {
			return 'NULL';
		}
	}

    public function addNewFile() { 
		$data = $this->request->getQuery();

        $this->viewBuilder()->setLayout('admin/blank');

		if ($data) {
			$images_model = $data['images_model'];
			$this->set(compact( 'images_model'));

            $this->render('/Admin/PageBEs/add_new_file');      // /Admin/AddMoreControls/add_new_file.php
		
        } else {
			return 'NULL';
		}
	}
}
