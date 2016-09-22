<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/6/6
 * Time: 下午2:06
 */
class Sms extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sms_model') ;
    }

    public function send_login_sms_ex() {
        $phone = $this->input->get_post('phone') ;
        if(!isset($phone)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $this->load->model('user_model') ;
        $user_info = $this->user_model->get_user_infor_by_login_name($phone, User_model::REG_TYPE_MOBILE);
        if(empty($user_info)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "用户不存在") ;
            return ;
        }

        if($user_info['user_type'] != Ptype::TYPE_A) {
            h_echo_json(Ecode::NO_PRIVILIGE) ;
            return ;
        }

        // 限制60s内只能发送一次
        if( $this->sms_model->can_resend_sms($phone) ) {
            $sms_type = Ptype::SMS_TYPE_LOGIN ;
            $this->_send_sms_internal($sms_type, $phone) ;
        } else {
            h_echo_json(Ecode::SMS_CODE_SEND_TOO_OFTEN) ;
        }
    }

    // 发送登录短消息
    public function send_login_sms() {
        $phone = $this->input->get_post('phone') ;
        $captcha = $this->input->get_post('captcha') ;
        if( !isset($captcha) || strlen($captcha) < 4 ) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), '请输入正确的图形校验码') ;
            return ;
        }

        $captcha = strtolower($captcha) ;
        $this->load->model('captcha_model') ;
        $captcha_server = $this->captcha_model->get_captcha($phone) ;
        if($captcha == $captcha_server) {

            // 设置图形校验码失效
            $this->captcha_model->set_captcha($phone, '') ;

            // 限制60s内只能发送一次
            if( $this->sms_model->can_resend_sms($phone) ) {
                $sms_type = Ptype::SMS_TYPE_LOGIN ;
                $this->_send_sms_internal($sms_type, $phone) ;
            } else {
                h_echo_json(Ecode::SMS_CODE_SEND_TOO_OFTEN) ;
            }
        } else {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), '图形校验码错误') ;
        }
    }

    public function send_regiter_sms() {
        $phone = $this->input->get_post('phone') ;
        $captcha = $this->input->get_post('captcha') ;

        if( !isset($captcha) || strlen($captcha) != Ptype::CAPTCHA_LEN) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $captcha = strtolower($captcha) ;
        $this->load->model('captcha_model') ;
        $captcha_server = $this->captcha_model->get_captcha($phone) ;
        if($captcha != $captcha_server) {
            die(h_echo_json(Ecode::C2S_ARG_ERR, array(), '图形校验码错误')) ;
        }

        // 设置图形校验码失效
        $this->captcha_model->set_captcha($phone, '') ;

        // 如果是注册，先判断手机号是否注册过，如果注册过，则直接返回去登陆
        $this->load->model('user_model') ;
        $rst = $this->user_model->get_user_infor_by_login_name($phone, User_model::REG_TYPE_MOBILE) ;

        // 如果手机号已经存在，则提示直接登录
        if( $rst ) {
            die(h_echo_json(Ecode::USER_REG_CHECK_PHONE_EXIST)) ;
        }

        // 限制60s内只能发送一次
        if( $this->sms_model->can_resend_sms($phone) ) {
            $this->_send_sms_internal(Ptype::SMS_TYPE_FIND_PWD, $phone) ;
        } else {
            h_echo_json(Ecode::SMS_CODE_SEND_TOO_OFTEN) ;
        }
    }

    public function send_find_pwd_sms() {
        $phone = $this->input->get_post('phone') ;

        // 如果是注册，先判断手机号是否注册过，如果注册过，则直接返回去登陆
        $this->load->model('user_model') ;
        $rst = $this->user_model->get_user_infor_by_login_name($phone, User_model::REG_TYPE_MOBILE) ;

        // 如果用户不存在，则提示注册
        if( !$rst ) {
            die(h_echo_json(Ecode::FIND_PASSWORD_USER_IS_NOT_EXIST)) ;
        }

        // 限制60s内只能发送一次
        if( $this->sms_model->can_resend_sms($phone) ) {
            $this->_send_sms_internal(Ptype::SMS_TYPE_FIND_PWD, $phone) ;
        } else {
            h_echo_json(Ecode::SMS_CODE_SEND_TOO_OFTEN);
        }
    }

    public function send_sms() {
        $sms_type = $this->input->get_post('sms_type') ;
        $phone = $this->input->get_post('phone') ;

        // 限制60s内只能发送一次
        if( $this->sms_model->can_resend_sms($phone) ) {
            $this->_send_sms_internal($sms_type, $phone) ;
        } else {
            h_echo_json(Ecode::SMS_CODE_SEND_TOO_OFTEN) ;
        }
    }

    // 发送短消息接口
    public function _send_sms_internal($sms_type, $phone) {
        if($sms_type < Ptype::SMS_TYPE_MIN || $sms_type > Ptype::SMS_TYPE_MAX) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $rst = $this->sms_model->send_sms_by_type($sms_type, $phone, Ptype::SEND_SMS_CHANNEL_HUAXING) ;
        if($rst == Ecode::OK) {
            h_echo_json(Ecode::OK) ;
            return ;
        } else {
            $rst = $this->sms_model->send_sms_by_type($sms_type, $phone, Ptype::SEND_SMS_CHANNEL_RONGLIAN) ;
            if($rst == Ecode::OK) {
                h_echo_json(Ecode::OK) ;
                return ;
            } else {
                $rst = $this->sms_model->send_sms_by_type($sms_type, $phone, Ptype::SEND_SMS_CHANNEL_DAYU) ;

                if($rst == Ecode::OK) {
                    h_echo_json(Ecode::OK) ;
                } else {
                    h_echo_json(Ecode::SMS_SEND_RESULT_ERR) ;
                }
            }
        }
    }

    // 华兴软通短消息结果回调
    public function sms_callback_by_hxrt() {
        $phone = $this->input->get_post('phone') ;
        $smsid = $this->input->get_post('smsid') ;
        $status = $this->input->get_post('status') ;
        if(!isset($smsid)) {
            echo 'param smsid is err';
            return ;
        }
        if(!isset($phone)) {
            echo 'param phone is not set';
            return ;
        }

        if(isset($status) && ($status == '0' || $status == 'DELIVRD')) {
            $this->sms_model->send_sms_success($smsid, '短消息发送成功', Ptype::SEND_SMS_CHANNEL_HUAXING) ;
            echo 0;
        } else {
            $this->sms_model->send_sms_failure_resend($smsid, '短消息发送失败，通过容联渠道发送', Ptype::SEND_SMS_CHANNEL_HUAXING) ;
//            $this->sms_model->send_sms_by_msgid($smsid,  Sms::SEND_SMS_CHANNEL_RONGLIAN) ;
            echo -1;
        }
    }


}