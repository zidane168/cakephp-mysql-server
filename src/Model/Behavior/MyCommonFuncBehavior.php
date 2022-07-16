<?php

// ---------------------------------------------------------------------------------------------------------
// -- Author:       ViLH
// -- Description:  MyCommonFuncBehavior
// ---------------------------------------------------------------------------------------------------------

namespace App\Model\Behavior;

use Cake\Core\Configure;
use Cake\Filesystem\File;
use Cake\ORM\Behavior;
use Cake\ORM\TableRegistry;
use Cake\Utility\Text;

class MyCommonFuncBehavior extends Behavior {

    protected $_table;

    // PASSWORD_DEFAULT - Use the bcrypt algorithm (default as of PHP 5.5.0). Note that this constant is designed to change over time as new and stronger algorithms are added to PHP. For that reason, the length of the result from using this identifier can change over time. Therefore, it is recommended to store the result in a database column that can expand beyond 60 characters (255 characters would be a good choice).
    // PASSWORD_BCRYPT - Use the CRYPT_BLOWFISH algorithm to create the hash. This will produce a standard crypt() compatible hash using the "$2y$" identifier. The result will always be a 60 character string, or false on failure.
    // PASSWORD_ARGON2I - Use the Argon2i hashing algorithm to create the hash. This algorithm is only available if PHP has been compiled with Argon2 support.
    // PASSWORD_ARGON2ID - Use the Argon2id hashing algorithm to create the hash. This algorithm is only available if PHP has been compiled with Argon2 support.

    // pw gen dynamic need use verify_admin_password to check it
    // every time pw gen will change another key.
    static function create_admin_password($pwd) {

        $pepper = Configure::read('admin.pepper');
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        return password_hash($pwd_peppered, PASSWORD_DEFAULT );     //PASSWORD_ARGON2ID);
    }

    static function create_member_password($pwd) {

        $pepper = Configure::read('member.pepper');
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        return password_hash($pwd_peppered, PASSWORD_DEFAULT );     //PASSWORD_ARGON2ID);
    }

    // $pwd:            pw from client
    // $pw_from_db:     pw_hashed before
    static function verify_admin_password($pwd, $pw_from_db) {

        $pepper = Configure::read('admin.pepper');
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        
        if (password_verify($pwd_peppered, $pw_from_db)) {
            return true;
        }
        return false;
    }

    static function verify_member_password($pwd, $pw_from_db) {

        $pepper = Configure::read('member.pepper');
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);

        if (password_verify($pwd_peppered, $pw_from_db)) {
            return true;
        }
        return false;
    }


    function encrypt($password) {
        $plaintext = Configure::read('admin.key');
        $method = "AES-256-CBC";
        $key = hash('sha256', $password, true);
        $iv = openssl_random_pseudo_bytes(16);
    
        $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext . $iv, $key, true);
    
        return $iv . $hash . $ciphertext;
    }


	public function remove_uploaded_image($images_model ,$image_ids = array()) {
		$result = array( 
			'status' => false, 
		);

		$removed = array();

		$conditions = array(
			$images_model . '.id IN ' => $image_ids
		);

		$this->images_model = TableRegistry::get("$images_model");

		$images = $this->images_model->find('all', array(
			'fields' => array(
				$images_model.'.id', 
                $images_model.'.path'
			),
			'conditions' => $conditions,
			'recursive' => -1
		));

		if ($images) {

			foreach ($images as $key => $image) {

				$model = $this->images_model->get($image->id);

				if( $this->images_model->delete($model) ){
					$file = new File(WWW_ROOT .  $image->path);
					$file->delete();
				}
			}
		}

		if (!empty($removed)) {
			$result = array(
				'status' => true,
			);
		}

		return $result;
	}

    public function isNull($item) {
        if ($item === array() || $item === '' || $item === null || empty($item)) {
            return true;
        }

        return false;
    }

    public function generatePin( $length = "6" ){
		return substr(str_shuffle("0123456789"), 0, $length);
	}
    
    public function generateToken_advance( $length = "16" ) {
		$length = $length < 16 ? 16 : $length;
		$unicode = uniqid(rand(), false);	// false: don't have dot signal
		return  strtoupper($unicode).substr(str_shuffle("123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length - mb_strlen($unicode));
	}

    public function generate_ECID($limit = array()) {
       
        $prefix = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);

        if ($limit) {
            return $prefix . $this->generatePin($limit);
        }
        return $prefix . $this->generatePin(8);
    }

    public function convert_time_to_days($date) {
        $current_date = date("Y-m-d H:i:s"); 
        $time = array();
        $day = floor((strtotime($current_date) - strtotime($date)) / (60 * 60 * 24));

        if ($day == 0) {
            $hour = floor((strtotime($current_date) - strtotime($date)) / (60 * 60));

            if ($hour == 0) {
                $minute = floor((strtotime($current_date) - strtotime($date)) / (60));
                $time = $minute . __("minutes ago");

            } else {
                $time = $hour . __("hours ago");
            }
        
        } else {
            $time = $day . __("days ago");
        }
        
        return $time;
    }

    public function create_unique_slug($model, $name, $id = array(), $slug = array(), $is_edit_name = false)
    {
        // get new slug when edit name
        if ($is_edit_name) {
            $slug = strtolower(Text::slug(h($name), Configure::read('slug')));

        } else {
            if (!$slug) {
                $slug = strtolower(Text::slug(h($name), Configure::read('slug')));
            }
        }

        $obj_Model = TableRegistry::get($model);

        $conditions = ["'" . $model . ".slug'" => $slug];
        if ($id) {
            $conditions = [
                "'" . $model . ".slug'" => $slug,
                "'" . $model . ".id <>'" => $id
            ];
        }

        $item = $obj_Model->find('all')
            ->where($conditions)
            ->first();

        $step = 0;
        while ($item) {
            // random number here
            $step++;
            $slug = strtolower(Text::slug(h($name), Configure::read('slug')) . Configure::read('slug') . $step);

            $conditions = ["'" . $model . ".slug'" => $slug];
            if ($id) {
                $conditions = [
                    "'" . $model . ".slug'" => $slug,
                    "'" . $model . ".id <>'" => $id
                ];
            }

            $item = $obj_Model->find('all')
                ->where($conditions)
                ->first();
        }

        return $slug;
    }

    public function generate_report_ECID($id, $total, $prefix = 'EC') {
        $len_id     = strlen($id);  // 1

        while ($len_id < $total) {
            $id = '0' . $id;
            $len_id = strlen($id); // 2;
        }

        return $prefix . $id;
    }


	public function calc_file_size($bytes)
	{
		if ($bytes >= 1073741824) {
			$bytes = ceil($bytes / 1073741824) . ' GB';
		} else if ($bytes >= 1048576) {
			$bytes = ceil($bytes / 1048576) . ' MB';
		} else if ($bytes >= 1024) {
			$bytes = ceil($bytes / 1024) . ' KB';
		} else if ($bytes > 1) {
			$bytes = $bytes . ' bytes';
		} else if ($bytes == 1) {
			$bytes = $bytes . ' byte';
		} else {
			$bytes = '0 byte';
		}

		return $bytes;
	}
}
