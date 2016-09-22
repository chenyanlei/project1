<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/25
 * Time: 下午4:52
 */
class Captcha extends MY_Controller
{

    public function get_captcha() {
        $this->get_captcha_internal() ;
    }

    public function check_captcha() {
        $this->check_captcha_internal() ;
    }

    /**
     * 获取图形验证码
     */
    private function get_captcha_internal() {
        // 获取手机号或者邮箱
//        $tag_id = $this->input->get_post("uname") ;
//        $tag_id = $this->input->ip_address().time() ;

        $tag_id = $this->input->get_post("uname") ;
        if(!isset($tag_id)) {
            $tag_id = $this->input->ip_address() ;
        }

        if(!isset($tag_id)) {
            h_echo_json(Ecode::USER_GET_CAPTCHA_TAG_IS_NULL) ;
            return ;
        }

        // 生成图形校验码
        $this->load->add_package_path(APPPATH.'third_party/captcha/');
        $this->load->library('image');
        $this->image->CreateImage() ;

        // 获取图形校验码，并且写入数据库
        $word = strtolower($this->image->GetCaptchaWord()) ;
        $this->load->model("captcha_model") ;
        $this->captcha_model->set_captcha($tag_id, $word) ;
    }

    /**
     * 检验图形校验码是否正确
     */
    private function check_captcha_internal() {
        $tag_id = $this->input->get_post("uname") ;
        if(!isset($tag_id)) {
            $tag_id = $this->input->ip_address() ;
        }

//        $tag_id = $this->session->tag_id ;
//        $tag_id = $this->input->ip_address() ;
        if(!isset($tag_id) || empty($tag_id)) {
            h_echo_json(Ecode::USER_GET_CAPTCHA_TAG_IS_NULL) ;
            return ;
        }
        $captcha = $this->input->get_post("captcha") ;
        if(!isset($captcha) || strlen($captcha) < 4) {
            h_echo_json(Ecode::USER_CAPTCHA_INFO_ERR) ;
            return ;
        }

        $this->load->model("captcha_model") ;
        $word = $this->captcha_model->get_captcha($tag_id) ;
        if($word == null) {
            h_echo_json(Ecode::USER_CAPTCHA_REFRESH, array("ip"=>$tag_id)) ;
            return ;
        }

        $captcha = strtolower($captcha) ;
        if($word != $captcha) {
            h_echo_json(Ecode::USER_CHECK_CAPTCHA_ERR, array("ip"=>$tag_id)) ;
            return ;
        }

        h_echo_json(Ecode::OK) ;
    }

    /**
     * 获取手机注册验证码
     */
    public function get_verify_code() {
        $captcha = $this->input->get_post('capture') ;
        $phone = $this->input->get_post('phone') ;
        if(!isset($captcha) || strlen($captcha) != 4) {
            h_echo_json(Ecode::USER_CAPTCHA_INFO_ERR) ;
            return ;
        }

        $tag_id = $this->input->ip_address() ;
        $this->load->model("captcha_model") ;
        $word = $this->captcha_model->get_captcha($tag_id) ;
        if($word == null) {
            h_echo_json(Ecode::USER_CAPTCHA_REFRESH) ;
            return ;
        }

        if($word != $captcha) {
            h_echo_json(Ecode::USER_CHECK_CAPTCHA_ERR) ;
            return ;
        }

        // 生成图形校验码
        $this->load->add_package_path(APPPATH.'third_party/sms/');
        $this->load->helper('yuntongxun_com');

        //TODO testing
//        h_send_sms($phone, $msg_arr, $tpl_id) ;

    }

}