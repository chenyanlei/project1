<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/26
 * Time: 下午10:51
 */
class Qrcode_creator extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

//    public function get_qr_code() {
//        include APPPATH.'/third_party/phpqrcode/phpqrcode.php';
//        QRcode::png('http://a.qsctrip.com');
//    }

    public function get_qr_code() {
        $url = $this->input->get_post('url') ;
        $display = $this->input->get_post('display') ;
        if(isset($display)) {
            $display = true ;
        } else {
            $display = false ;
        }

        if(!isset($url) || empty($url)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

//        $base_64 = $url ;
        $url = urldecode($url) ;
        $base_64 = str_replace("/","A", $url) ;//$url ;
        $base_64 = str_replace(":","B", $base_64) ;//$url ;
        $base_64 = str_replace("&","C", $base_64) ;//$url ;
        $base_64 = str_replace("?","D", $base_64) ;//$url ;
        $base_64 = str_replace(".","E", $base_64) ;//$url ;
        $base_64 = str_replace("=","F", $base_64) ;//$url ;
        $base_64 = str_replace("_","G", $base_64) ;//$url ;
        $base_64 = md5($base_64) ;

//      $qr_code_path = PATH_WEBROOT."api/cache/qrcode/qrcode.png" ;

        $qr_code_path = "cache/qrcode/".$base_64.".png" ;
        $output_img_path = "cache/qrcode/".$base_64."_1.png" ;
        if(file_exists(PATH_WEBROOT.'api/'.$output_img_path)) {
            if($display) {
                echo '<img src='.URL.$output_img_path.'>';
            } else {
                h_echo_json(Ecode::OK, array('qr_url' => URL.$output_img_path)) ;
            }
            return ;
        }

        include APPPATH.'/third_party/phpqrcode/phpqrcode.php';
        $value = $url ;//'http://api.qsctrip.com'; //二维码内容
        $errorCorrectionLevel = 'L';//容错级别
        $matrixPointSize = 6;//生成图片大小

        //生成二维码图片
        QRcode::png($value, PATH_WEBROOT.'api/'.$qr_code_path, $errorCorrectionLevel, $matrixPointSize, 2);
        $logo = PATH_WEBROOT.'api/public/images/'.'qr_center_logo.png';//准备好的logo图片
        $QR = PATH_WEBROOT.'api/'.$qr_code_path;//已经生成的原始二维码图

        if ($logo !== FALSE) {
            $QR = imagecreatefromstring(file_get_contents($QR));
            $logo = imagecreatefromstring(file_get_contents($logo));
            $QR_width = imagesx($QR);//二维码图片宽度
            $QR_height = imagesy($QR);//二维码图片高度
            $logo_width = imagesx($logo);//logo图片宽度
            $logo_height = imagesy($logo);//logo图片高度
            $logo_qr_width = $QR_width / 5;
            $scale = $logo_width/$logo_qr_width;
            $logo_qr_height = $logo_height/$scale;
            $from_width = ($QR_width - $logo_qr_width) / 2;
            //重新组合图片并调整大小
            imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
                $logo_qr_height, $logo_width, $logo_height);
        }
        //输出图片
//        $output_img_path = PATH_WEBROOT."api/cache/qrcode/helloweba.png" ;
        imagepng($QR, PATH_WEBROOT.'api/'.$output_img_path);
        if($display) {
            echo '<img src='.URL.$output_img_path.'>';
        } else {
            h_echo_json(Ecode::OK, array('qr_url' => URL.$output_img_path)) ;
        }
    }


}