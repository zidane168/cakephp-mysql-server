<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

class CommonComponent extends Component
{

    // -------------------------------------------------------
    // -- COMMON FUNCTION
    // -------------------------------------------------------

    public function upload_files($img, $relative_path, $file_name_suffix, $key)
    {

        if (!file_exists($relative_path)) {
            // $dir = new Folder($relative_path, true, 0777);
            @mkdir($relative_path, 0777, true);
        }

        $name    = $img->getClientFileName();
        // $type    = $img->getClientMediaType();
        $size    = $img->getSize();
        $tmpName = $img->getStream()->getMetadata('uri');

        // rename the uploaded file
        $_filename = mb_strtolower($name);
        $file = new File($_filename);
        $renamed_file = date('Ymd-Hi') . '-' . $file_name_suffix . '-' . uniqid() . '-' . $key . '.' . $file->ext();
        $path = $relative_path . DS . $renamed_file;;
        $targetPath = WWW_ROOT . $path;

        list($width, $height, $type, $attr) = getimagesize($tmpName);
        $succeed  = array();

        if ($img->getSize() > 0 && $img->getError() == 0) {
            $img->moveTo($targetPath);

            $succeed = array(
                'ori_name'      => $name,
                're_name'       => $renamed_file,
                'path'             => $path,
                'extension'     => $file->ext(),
                'width'         => $width,
                'height'         => $height,
                'size'             => $size,
            );
        }

        return $succeed;
    }

    public function upload_pdf_files($img, $relative_path, $file_name_suffix, $key)
    {

        if (!file_exists($relative_path)) {
            // $dir = new Folder($relative_path, true, 0777);
            @mkdir($relative_path, 0777, true);
        }

        $name    = $img->getClientFileName();

        $size    = $img->getSize();

        // rename the uploaded file
        $_filename = mb_strtolower($name);
        $file = new File($_filename);
        $renamed_file = date('Ymd-Hi') . '-' . $file_name_suffix . '-' . uniqid() . '-' . $key . '.' . $file->ext();
        $path = $relative_path . DS . $renamed_file;
        $targetPath = WWW_ROOT . $path;

        $succeed  = array();

        if ($img->getSize() > 0 && $img->getError() == 0) {
            $img->moveTo($targetPath);

            $succeed = array(
                'ori_name'      => $name,
                're_name'       => $renamed_file,
                'path'             => $path,
                'extension'     => $file->ext(),
                'size'             => $size,
            );
        }

        return $succeed;
    }



    public function handling_crawl_web($year = 2022, $month = 6, $page = 1)
    {
        $status = true;
        $message = "";
        $result = array();

        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://cppcl.property.hk/tran_prop.php',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'find[dcode]' => 'ALL',
                    'find[[prop]' => 'P',
                    'find[bname]' => '',
                    'find[searchType]' => 'B',
                    'find[sizeType]' => '',
                    'find[year]'    => $year, 
                    'find[month]'   => $month, 
                    'find[page]'    => $page,
                    'find[startwith]' => ''
                ),
            ));

            $status = 200;
            $message =  'Retrieved data successfully';
            $result = curl_exec($curl);

            curl_close($curl);

        } catch (\Exception $e) {

            $status = 999;
            $message = $e->getMessage();
        }

        return array(
            'status'    => $status,
            'message'   => $message,
            'result'    => $result,
        );
    }
}
