<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/25
 * Time: 下午4:52
 */
class Wx_user extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("wx_user_model") ;
    }

//    public function get_openid() {
//        require_once "/libraries/wxpay/example/lib/WxPay.Api.php";
//        require_once "/libraries/wxpay/example/WxPay.JsApiPay.php";
//        $tools = new JsApiPay();
//        $openId = $tools->GetOpenid();
//
//        var_dump($openId) ;
//    }

    public function get_user_info() {
        $openid = $this->input->get_post("openid") ;
        $from = $this->input->get_post("from") ;
        $key=$this->input->get_post("key") ;
//        echo "111" ;
        $this->_infor_verify($openid, $from, $key) ;


        if($this->wx_user_model->register_from_wx_web($openid, $from) > 0) {
            $rst = $this->wx_user_model->get_user_infor_by_openid($openid, $from) ;
            if($rst != null) {
                h_echo_json(Ecode::OK, $rst) ;
                die() ;
            }
        }

        h_echo_json(Ecode::NO_RESULT) ;
    }

    public function bind_by_sms() {
        $uid = $GLOBALS["user_id"] ;

        $from = $this->input->get_post("from") ;
        if($from !== "wx_web") {
            h_echo_json(Ecode::C2S_ARG_ERR);
            die();
        }

        // 检查手机号和短消息
        $phone = $this->input->get_post("mobile") ;
        $sms_code = $this->input->get_post("sms_code") ;
        $this->_verify_phone($phone, $sms_code) ;

        //根据id获取用户的openid
        $openid = $this->wx_user_model->get_openid_by_id($uid) ;

        //绑定手机号和openid
        $this->wx_user_model->bind_by_mobile($openid, $phone) ;

        //返回绑定后的用户信息
        $rst = $this->wx_user_model->get_user_infor_by_openid($openid, $from) ;

        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT);
        } else {
            //如果绑定前后用户id不同
            if($uid != $rst['id']) {
                //删除旧token
                $this->load->model("token_model") ;
                $token = $this->input->get_post("token") ;
                $this->token_model->del_token($token) ;
            }

            h_echo_json(Ecode::OK, $rst);
        }
    }

    public function bind_by_user_pwd() {
        $uid = $GLOBALS["user_id"] ;
        $from = $this->input->get_post("from") ;
        // 通过token获取openid
        $openid = $this->wx_user_model->get_openid_by_id($uid) ;

        if($from !== "wx_web") {
            h_echo_json(Ecode::C2S_ARG_ERR);
            die();
        }

        $phone = $this->input->get_post("mobile") ;
        $pwd = $this->input->get_post("pwd") ;
        $this->_verify_mobile_pwd($phone, $pwd) ;

        $this->wx_user_model->bind_by_mobile($openid, $phone) ;
        $rst = $this->wx_user_model->get_user_infor_by_openid($openid, $from) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT);
        } else {
            //如果绑定前后用户id不同
            if($uid != $rst['id']) {
                //删除旧token
                $this->load->model("token_model") ;
                $token = $this->input->get_post("token") ;
                $this->token_model->del_token($token) ;
            }
            h_echo_json(Ecode::OK, $rst);
        }
    }

    private function _verify_mobile_pwd($phone, $pwd) {
        $this->load->model("user_model") ;
        $row_array = $this->user_model->get_user_infor_by_login_name($phone, User_model::REG_TYPE_MOBILE);
        $pwd = $this->user_model->generate_login_password_login($row_array['loginsult'] , $pwd) ;

        if($pwd !== $row_array['passwd']) {
            h_echo_json(Ecode::LOGIN_PWD_IS_ERROR) ;
            die();
        }
    }

    private function _verify_phone($phone, $sms_code) {
        $this->load->model("sms_model") ;
        $rst = $this->sms_model->check_login_sms($phone, $sms_code) ;
        if(!$rst) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            die() ;
        }
    }

    private function _infor_verify($openid, $from, $key ) {
        if($from !== "wx_web") {
            h_echo_json(Ecode::C2S_ARG_ERR);
            die();
        }
        if(!isset($openid) || strlen($openid) < 16) {
            h_echo_json(Ecode::C2S_ARG_ERR);
            die();
        }
        if(!isset($key)) {
            h_echo_json(Ecode::C2S_ARG_ERR);
            die();
        }
        $verify = "openid".$openid."from".$from.Ptype::SECRIT_KEY ;
        $verify_md5 = md5($verify) ;
//        echo $verify_md5;
        if($verify_md5 != $key) {
            h_echo_json(Ecode::C2S_ARG_ERR);
            die();
        }
    }

    //需要手工同步微信用户信息， 不常用！！！！！
    public function bactch_get_user_info() {
        $select = "openid" ;
        $this->load->model("wx/wx_user_atomic_model", "wx_user_atomic_model") ;
        $rst = $this->wx_user_atomic_model->slt_res_arr( null, $select) ;
        $this->load->model("wx/wx_msg_subscribe_model", "wx_msg_subscribe_model") ;
        foreach($rst as $item) {
            $this->wx_msg_subscribe_model->get_wx_user_by_openid($item['openid']) ;
        }

    }

}