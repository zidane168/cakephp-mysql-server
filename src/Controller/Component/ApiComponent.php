<?php 

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\I18n\I18n;
class ApiComponent extends Component {

    private $params = array();
    private $status = false;

    private $result;

    public function init() {
    
        $this->result = array(
            'status' 	=> $this->status,
            'message' 	=> __("please_provide_information"),
            'params' 	=> $this->params,
        );
    }

    public function set_result($status = false, $message, $params){
        // set the final result
      
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
      
        $this->result = array(
            'status' 	=> $status,
            'message' 	=> $message,
            'params' 	=> $params,
        );
    }

    public function output ($obj_controller, $values = array()) {
        if (empty($values)) {
            $values = $this->result;
        }
        
        //if (Configure::read('debug')) {
            // header("Access-Control-Allow-Origin: *");
            // header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
            // header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
        // }

        $values = $this->replace_null($values);

        $result = $this->result;
        $obj_controller->set(compact('result'));
        // <b>Deprecated</b> (16384)</a>: Setting special view var &quot;_serialize&quot; is deprecated. Use ViewBuilder::setOption(&#039;serialize&#039;, $value) instead. - /var/www/localhost/htdocs/vendor/cakephp/cakephp/src/View/SerializedView.php, line: 67
        // $obj_controller->set('_serialize', 'result');

       $obj_controller->viewBuilder()->setOption('serialize', 'result');
    }
    
    /**
     * Public function to set the language
     */
    public function set_language( $language = "zh_HK" ) {
        I18n::setLocale($language);
    }

    public function replace_null( $data ) {
        array_walk_recursive($data, function(&$item, $key){
            if ( is_null($item) ) { $item = ""; }
        });

        return $data;
    }
}