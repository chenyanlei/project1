<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/21
 * Time: 上午11:59
 */
class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model") ;
    }

    public function login() {
        $this->login_internal() ;
    }

    public function login_by_sms() {
        $phone = $this->input->get_post('phone') ;
        $code = $this->input->get_post('code') ;
        $user_type = $this->input->get_post('type') ;
        $from = $this->input->get_post('from') ;
        $name = $this->input->get_post('name') ;
        if(!isset($name)) {
            $name = '' ;
        }

        $this->load->model('sms_model') ;

        //验证码有效期15分钟，过期，直接die
        $check_rst = $this->sms_model->check_login_sms($phone, $code) ;
        if(!$check_rst) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), '手机号或者验证码错误') ;
            return ;
        }

        $rst = $this->user_model->login_by_sms($phone, $user_type, $name, $from) ;
        if(empty($rst)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
        } else {
            unset($rst['loginsult']) ;
            unset($rst['passwd']) ;
            unset($rst['is_confirm']) ;
            unset($rst['register_time']) ;

            h_echo_json(Ecode::OK, $rst) ;
        }
    }

    public function register() {
        $this->register_internal() ;
    }

    public function get_list() {
        $this->get_list_internal() ;
    }

    public function re_verify_email() {
        $this->re_verify_email_internal() ;
    }

    public function check_user_name() {
        $this->check_user_name_internal() ;
    }

    public function get_verify_code() {
        $this->get_verify_code_internal() ;
    }

    public function register_confirm() {
        $this->register_confirm_internal() ;
    }

    public function register_confirm_by_code() {
        $this->_register_confirm_by_code_internal() ;
    }

    public function find_pwd_by_email() {
        $this->find_pwd_by_email_internal() ;
    }

    public function reset_pwd_by_code() {
        $this->reset_pwd_by_code_internal() ;
    }

    public function reset_pwd(){
        $this->reset_pwd_internal();
    }

    public function find_pwd_by_mobile() {
        $this->find_pwd_by_mobile_internal() ;
    }

    public function check_pwd_by_uid() {
        $this->check_pwd_by_uid_internal();
    }

    public function check_qsc() {
        $this->check_qsc_internal() ;
    }

    public function set_user_qsc() {
        $this->set_user_qsc_internal() ;
    }

    // 设置擅长的目的地
    public function set_agent_product_destination() {
        $uid = $GLOBALS['user_id'];

        $product_destinations_type = $this->input->post('product_destinations_type') ;
        $product_destinations_id = $this->input->post('product_destinations_id') ;
        if(isset($product_destinations_id)) {
            $arr = json_decode($product_destinations_id, true);
        } else {
            $arr = null ;
        }

        $rst = $this->user_model->set_agent_product_destination($uid,$product_destinations_type, $arr) ;


        if(!empty($rst)) {
            h_echo_json(Ecode::OK);
        } else {
            h_echo_json(Ecode::INSERT_FAIL);
        }
    }

    public function get_agent_product_destination() {
        $uid = $GLOBALS['user_id'];
        $rst = $this->user_model->get_agent_product_destination($uid) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function del_agent_product_destination() {
        $uid = $GLOBALS['user_id'];
        $rst = $this->user_model->del_agent_product_destination($uid) ;

    }

    public function set_user_detail() {
        $this->set_user_detail_internal() ;
    }

    // 获取自己的用户详细信息
    public function get_my_detail() {
        $id = $GLOBALS['user_id'] ;
        $this->get_user_detail_internal($id) ;
    }

    // 获取指定用户id的用户详细信息
    public function get_user_detail() {
        $id = $this->input->get_post('id') ;
        $this->get_user_detail_internal($id) ;
    }

    public function set_bank_info() {
        $uid = $GLOBALS['user_id'];
        $account = $this->input->post('account') ;
        $name = $this->input->post('name') ;
        if(!isset($account)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        if(!isset($name)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $rst = $this->user_model->set_bank_info($uid, $account, $name) ;
        h_echo_json($rst?Ecode::OK:Ecode::UPDATE_FAIL);
    }

    public function get_bank_info() {
        $uid = $GLOBALS['user_id'];
        $rst = $this->user_model->get_bank_info($uid) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function set_currency() {
        $uid = $GLOBALS['user_id'];
        $currency = $this->input->post('currency') ;
        if(!isset($currency)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $rst = $this->user_model->set_currency($uid, $currency) ;
        h_echo_json($rst?Ecode::OK:Ecode::UPDATE_FAIL);
    }

    public function get_currency() {
        $uid = $GLOBALS['user_id'];
        $rst = $this->user_model->get_currency($uid) ;

        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    // 返回供应商的类别
    public function get_user_s_type() {
        $uid = $GLOBALS['user_id'] ;
        $this->load->model('atomic/user_atomic_model', 'user_atomic_model') ;

        $where = array('id' => $uid) ;
        $select = 'user_type,user_s_type' ;
        $rst = $this->user_atomic_model->slt_row_arr($where, $select) ;

        h_echo_json(Ecode::OK, $rst) ;
    }

    // 设置供应商的类别，只有超级用户和系统管理员才有的权限
    public function set_user_s_type() {
        $user_s_type = $this->input->get_post('user_s_type') ;
        $uid = $GLOBALS['user_id'] ;
        $this->load->model('atomic/user_atomic_model', 'user_atomic_model') ;

        $where = array('id' => $uid) ;
        $select = 'user_s_type,privilige' ;
        $rst = $this->user_atomic_model->slt_row_arr($where, $select) ;

        if($rst['privilige'] > 1) {
            h_echo_json(Ecode::NO_PRIVILIGE) ;
            return ;
        }

        $ins = array('user_s_type' => $user_s_type) ;
        $this->user_atomic_model->upd($where,$ins) ;

        h_echo_json(Ecode::OK, $rst) ;
    }


    /**
     * 超级管理员权限
     */
    public function set_user_status() {
        $this->set_user_status_internal() ;
    }

    private function reset_pwd_by_code_internal() {
        $confirm_code = $this->input->get_post('confirm_code') ;
        if(! isset($confirm_code) ) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $pwd = $this->input->get_post('pwd') ;
        $repwd = $this->input->get_post('repwd') ;
        if($pwd != $repwd) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $user_info = $this->user_model->get_user_infor_by_confirm_code($confirm_code) ;
        if( false === $user_info ) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        } else {
            $rst = $this->user_model->reset_pwd($user_info['id'], $pwd) ;
            $rst ? h_echo_json(Ecode::OK):h_echo_json(Ecode::RESET_PASSWORD_FAILD) ;
        }
    }

    private function reset_pwd_internal() {
        $pwd = $this->input->get_post('pwd') ;
        $repwd = $this->input->get_post('repwd') ;
        if($pwd != $repwd) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
  
        $rst = $this->user_model->reset_pwd($GLOBALS['user_id'], $pwd) ;
        if($rst) {
            $user_info = $this->user_model->get_user_infor_by_id($GLOBALS['user_id']) ;
            if($user_info['begin_use'] == '0') {
                h_echo_json(Ecode::USER_NOT_BEGIN_USE) ;
            } else {
                h_echo_json(Ecode::OK) ;
            }
        } else {
            h_echo_json(Ecode::RESET_PASSWORD_FAILD) ;
        }
    }
    private function set_user_status_internal() {
        $id = $GLOBALS['user_id'] ;

        $user_info = $this->user_model->get_user_infor_by_uid($id) ;

        if(! isset($user_info) ) {
            h_echo_json(Ecode::S2S_ARG_ERR) ;
            return ;
        }

        if($user_info['privilige'] != 0) {
            h_echo_json(Ecode::NO_PRIVILIGE) ;
            return ;
        }
    }

    public function truncate() {
        $this->load->model("atomic/atomic_model", "atomic_model") ;
        $this->atomic_model->query("truncate user_0") ;
        $this->atomic_model->query("truncate user_detail_0") ;
        h_echo_json(Ecode::OK) ;
    }

    /**
     * 重新验证注册邮箱
     */
    private function re_verify_email_internal() {
        $email = $this->input->get_post('email') ;
        $user_type = $this->input->get_post('type') ;

        // delete captcha
//        $captcha = $this->input->get_post('captcha') ;
//        $uname = $this->input->get_post('uname') ;

//        if(!isset($uname)) {
//            $uname = $this->input->ip_address() ;
//        }
//        $this->load->model('captcha_model') ;
//
//        if(!$this->captcha_model->check_captcha_is_success($uname, $captcha)) {
//            h_echo_json(Ecode::USER_CHECK_CAPTCHA_ERR) ;
//            return ;
//        }

        $result = $this->user_model->re_verify_email($email) ;
        if(is_int($result)) {
            h_echo_json($result) ;
            return ;
        }

        $confirm_code = '' ;
        $register_code = '';
        $set_confirm_result = $this->user_model->set_confirm_code($register_code, $confirm_code,$result['id']) ;
        if(isset($set_confirm_result)) {
            $mail_notify = $this->input->post("mail_notify") ;  // 注册通知方式 0 自动通知  1 自定义通知，比如s.qsctrip.com
            if(!isset($mail_notify) || $mail_notify == Ecode::MAIL_NOTIFY_AUTO ) {
                $send_success = $this->send_register_mail($register_code, $confirm_code, $email, $user_type) ;
                if(!$send_success) {
                    h_echo_json(Ecode::USER_REG_REV_MAIL_FAILED) ;
                    return ;
                }
                $arr = array("send_email" => $send_success) ;
            } else {
                $arr = array("confirm_code" => $confirm_code) ;
            }
            $email_encode = '';
            $email_url ='';
            $this->get_email_and_emailurl($email_encode, $email_url ,$email) ;
            $arr['email_encode'] = $email_encode ;
            $arr['email'] = $email ;
            $arr['email_url'] = $email_url ;
            h_echo_json(Ecode::OK,$arr) ;
        } else {
            h_echo_json(ECode::S2S_ARG_ERR) ;
        }
    }


    /**
     *
     * 用户注册接口
     *
     * http://api.qsctrip.com/user/register
     *
     */
    private function register_internal() {
        $reg_type = $this->input->post("reg_type") ;

        if($reg_type == User_model::REG_TYPE_EMAIL) {
            $email = $this->input->post("email") ;
            if(!isset($email) || empty($email)) {
                h_echo_json(ECode::REGISTER_REQUIRE_EMAIL) ;
                return false;
            }
            $mobile = $this->input->post("mobile") ;

            $pwd = $this->input->post("pwd") ;
            if(!isset($pwd) ||empty($pwd)) {
                h_echo_json(ECode::REGISTER_REQUIRE_PWD) ;
                return false;
            }

            $repwd = $this->input->post("repwd") ;
            if(!isset($repwd) ||empty($repwd)) {
                h_echo_json(ECode::REGISTER_REQUIRE_PWD) ;
                return false;
            }

            if($pwd != $repwd) {
                h_echo_json(ECode::REGISTER_PWD_NOT_EQUAL) ;
                return false;
            }

            $name = $this->input->post("name") ;
            if(!isset($name) ||empty($name)) {
                h_echo_json(ECode::REGISTER_REQUIRE_NAME) ;
                return false;
            }

        } else {
            $mobile = $this->input->post("mobile") ;
            if(!isset($mobile) || empty($mobile)) {
                h_echo_json(ECode::REGISTER_REQUIRE_PHONE) ;
                return false;
            }

            // 检测手机号和验证码是否正确
            $this->load->model('sms_model') ;
            $code = $this->input->get_post('code') ;
            if(strlen($code) != 6) {
                h_echo_json(Ecode::C2S_ARG_ERR, array(), '短消息验证码错误') ;
                return false ;
            }
            $sms_rst = $this->sms_model->check_login_sms($mobile, $code) ;
            if( !$sms_rst ) {
                h_echo_json(Ecode::C2S_ARG_ERR, array(), '手机号或者短消息验证码错误') ;
                return false ;
            }

            $email = $this->input->post("email") ;

            $pwd = $this->input->post("pwd") ;
            if(!isset($pwd) ||empty($pwd)) {
                h_echo_json(ECode::REGISTER_REQUIRE_PWD) ;
                return false;
            }

            $name = $this->input->post("name") ;
        }

        //2016.6.2 去掉qsc认证
//        $qsc = $this->input->post("qsc") ;
//        if(isset($qsc) && !empty($qsc)) {
//            // 检查qsc证书编号是否已经在使用，如果在使用，返回错误
//            if($this->user_model->qsc_certificate_is_exist($qsc)) {
//                h_echo_json(ECode::USER_REG_CHECK_QSC_EXIST) ;
//                return ;
//            }
//        }

        $verify = $this->input->post("verify") ;
        $user_type = $this->input->post("type") ;
        $from = $this->input->post("from") ;

        $result = $this->user_model->register($user_type ,$reg_type, $pwd, $email, $mobile, $name, $from, ''/*$qsc*/) ;
        if($result === -1) {
            h_echo_json(ECode::REGISTER_USER_EXIST) ;
        } elseif($result === -2) {
            h_echo_json(ECode::S2S_ARG_ERR) ;
        } else {
            if($reg_type == User_model::REG_TYPE_EMAIL) {
                $confirm_code = '' ;
                $register_code = '' ;
                $set_confirm_result = $this->user_model->set_confirm_code($register_code, $confirm_code,$result['insert_id']) ;
                if(isset($set_confirm_result)) {
                    $mail_notify = $this->input->post("mail_notify") ;  // 注册通知方式 0 自动通知  1 自定义通知，比如s.qsctrip.com
                    if(!isset($mail_notify) || $mail_notify == Ecode::MAIL_NOTIFY_AUTO ) {
                        $send_success = $this->send_register_mail($register_code, $confirm_code, $email, $user_type) ;
                        if(!$send_success) {
                            h_echo_json(Ecode::USER_REG_REV_MAIL_FAILED) ;
                            return ;
                        }
                        $arr = array("send_email" => $send_success) ;
                    } else {
                        $arr = array("confirm_code" => $confirm_code) ;
                    }
                    $email_encode = '';
                    $email_url ='';
                    $this->get_email_and_emailurl($email_encode, $email_url ,$email) ;
                    $arr['email_encode'] = $email_encode ;
                    $arr['email'] = $email ;
                    $arr['email_url'] = $email_url ;

                    $this->load->model("user_admin_his_model") ;
                    $this->user_admin_his_model->add_user_status_msg('注册成功', $result['insert_id'], Ptype::REGISTER_SUCCESS) ;

                    h_echo_json(Ecode::OK,$arr) ;
                } else {
                    h_echo_json(ECode::S2S_ARG_ERR) ;
                }
            } else if($reg_type == User_model::REG_TYPE_MOBILE) {
                $this->load->model("user_admin_his_model") ;
                $this->user_admin_his_model->add_user_status_msg('注册成功', $result['insert_id'],Ptype::REGISTER_SUCCESS) ;

                // 如果是手机端注册，直接注册成功，不需要邮箱二次验证
                $confirm_code = '' ;
                $register_code ='' ;
                $set_confirm_result = $this->user_model->set_confirm_code($register_code, $confirm_code,$result['insert_id'], '1') ;
                $token ='' ;
                $rst = $this->token_model->set_token($token, $result['insert_id']) ;
                if($rst == Ecode::OK){
                    h_echo_json(Ecode::OK, array('token' => $token, 'name' => $this->user_model->register_generate_user_id($result['insert_id']))) ;
                } else {
                    h_echo_json(Ecode::S2S_ARG_ERR) ;
                }
            } else {
                h_echo_json(Ecode::OK) ;
            }
        }
    }

    /**
     * 检测手机号或者邮箱是否注册
     */
    private function check_user_name_internal() {
        $utype = $this->input->get_post("utype") ;
        if(!isset($utype) ) {
            h_echo_json(ECode::C2S_ARG_ERR) ;
            return ;
        } else if( $utype != User_model::REG_TYPE_EMAIL && $utype != User_model::REG_TYPE_MOBILE ) {
            h_echo_json(ECode::C2S_ARG_ERR) ;
            return ;
        }
        $name = $this->input->get_post("uname") ;
        if(!isset($name) || empty($name) ) {
            h_echo_json(ECode::C2S_ARG_ERR) ;
            return ;
        }

        $this->load->model("user_model") ;
        if($this->user_model->user_is_exist($name ,$utype)) {
            if($utype == User_model::REG_TYPE_EMAIL) {
                h_echo_json(Ecode::USER_REG_CHECK_EMAIL_EXIST) ;
            } else {
                h_echo_json(Ecode::USER_REG_CHECK_PHONE_EXIST) ;
            }

            return ;
        }

        h_echo_json(Ecode::OK) ;
    }
    private function check_pwd_by_uid_internal() {
        $uid = $GLOBALS['user_id'] ;
        $password = $this->input->get_post("password") ;
        if(!isset($password) || empty($password) ) {
            h_echo_json(ECode::C2S_ARG_ERR) ;
            return ;
        }
        $this->load->model("user_model") ;
        if(!$this->user_model->check_user_pwd($uid,$password)){
            h_echo_json(ECode::LOGIN_PWD_IS_ERROR);
            return;
        }

        h_echo_json(Ecode::OK) ;
    }
    /**
     * 获取手机注册验证码
     */
    private function get_verify_code_internal() {
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


    private function get_list_internal() {

        $uid = $GLOBALS['user_id'] ;
        $rst = $this->user_model->get_user_infor_by_uid($uid) ;
        if($rst['privilige'] != 0) {
            h_echo_json(Ecode::NO_PRIVILIGE) ;
            return ;
        }

        $status = $this->input->get_post('status') ;
        if(!isset($status)) {
            $status =  -1 ;
        }

        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;

        if(!isset($rn)) {
            $rn = 10 ;
        }

        if(!isset($pn)) {
            $pn = 0 ;
        }

        $rst = $this->user_model->get_list($status, $rn , $pn) ;

//        var_dump($rst) ;

        h_echo_json(Ecode::OK, $rst) ;
    }

    public function get_user_last_status_msg() {
        $user_id = $GLOBALS['user_id'] ;
        $user_info = $this->user_model->get_user_infor_by_uid($user_id) ;
        if( !$user_info ) {
            h_echo_json(Ecode::S2S_ARG_ERR) ;
            return ;
        }

        $this->load->model('user_admin_his_model') ;
        $rst = $this->user_admin_his_model->get_user_last_status_msg($user_id) ;
        if($rst) {
            $user_info['status_msg'] = $rst;
            unset($user_info['passwd']) ;
            unset($user_info['loginsult']) ;
            unset($user_info['uid']) ;
            h_echo_json(Ecode::OK, $user_info) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }


    /**
     * 用户名+密码登录
     */
    private function login_internal() {
        $captcha = $this->input->get_post('captcha') ;

        if(!isset($captcha) || strlen($captcha) < 4) {
//            h_echo_json(Ecode::USER_CHECK_CAPTCHA_ERR) ;
//            return ;
        }

        $name = $this->input->get_post('name') ;
        if(!isset($name)) {
            h_echo_json(Ecode::LOGIN_USER_IS_NULL) ;
            return ;
        }

        $pwd = $this->input->get_post('pwd') ;
        if(!isset($pwd)) {
            h_echo_json(Ecode::LOGIN_PWD_IS_NULL) ;
            return ;
        }

        $tag_id = $this->input->get_post('uname') ;
        if(!isset($tag_id)) {
            $tag_id = $this->input->ip_address() ;
        }
//        $tag_id = $this->session->tag_id ;

        $type = $this->input->get_post('type') ;
        $from = $this->input->get_post('from') ;

        $captcha = strtolower($captcha);
        $result = $this->user_model->login($name, $pwd, $captcha,$tag_id) ;

        $status = 0 ;
        if(is_int($result) && $result !== Ecode::OK) {
            if($result === Ecode::LOGIN_USER_IS_NOT_CONFIRM) {
                $email = '';
                $email_url = '';
                $this->get_email_and_emailurl($email, $email_url ,$name) ;
                h_echo_json($result, array("email_url" => $email_url)) ;

                $status = 1 ;
            } else {
                $status = 2 ;
                $msg = Ecode::msg($result) ;
                h_echo_json($result) ;
            }
        } else {
            if($type == $result['user_type']  ) {
                $status = 0 ;
                h_echo_json(0, $result) ;
            } elseif($result['privilige'] == 0) {
                $status = 0 ;
                h_echo_json(0, $result) ;
            }
            else {
                if($result['user_type'] == 0) {
                    $status = 3 ;
                    $msg = '请登录http://s.qsctrip.com' ;
                } elseif($result['user_type'] == 1) {
                    $status = 4 ;
                    $msg = '请登录http://p.qsctrip.com' ;
                } elseif($result['user_type'] == 2) {
                    $status = 5 ;
                    $msg = '请登录http://a.qsctrip.com' ;
                } elseif($result['user_type'] == 3) {
                    $status = 6 ;
                    $msg = '请登录http://c.qsctrip.com' ;
                }
                h_echo_json(Ecode::LOGIN_USER_LOGIN_ERR, array(), $msg) ;
            }
        }

        if( isset($result['id']) ) {
            $id = $result['id'] ;
        } else {
            $id = -1 ;
        }

        $this->record_login_log($id, $status, $tag_id, isset($msg)?$msg:'', $name, $from) ;
    }

    /**
     * 记录登录日志
     *
     * @param $uid
     * @param $status
     * @param $ip
     * @param $msg
     * @param $login_name
     */
    private function record_login_log($uid, $status, $ip, $msg, $login_name,$from) {
        $this->load->model('user_login_his_model') ;
        $this->user_login_his_model->record_login_log($uid, $status, $ip, $msg, $login_name,$from) ;
    }

    /**
     * 注册确认
     */
    private function register_confirm_internal() {
        $confirm_code = $this->input->get_post('confirm_code') ;
        if(!isset($confirm_code)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $email = '' ;
        $result = $this->user_model->set_is_confirm($confirm_code , $email) ;
        if($result == 0 || $result == 1) {
            h_echo_json(Ecode::OK) ;
        } else if(is_int($result)){
            if($result === Ecode::REGISTER_MAIL_VERIFY_TIME_OUT) {
                h_echo_json($result, array('email'=>$email)) ;
            } else {
                h_echo_json($result) ;
            }
        }
    }

    private function _register_confirm_by_code_internal() {
        $email = $this->input->get_post('email') ;
        $register_code = $this->input->get_post('register_code') ;
        if(!isset($register_code) || strlen($register_code) != 6) {
            h_echo_json(Ecode::USER_REG_MAIL_VIRYFY_CODE_ERR) ;
            return ;
        }

        $email = trim($email) ;
        $register_code = trim($register_code) ;

        $token = '' ;
        $result = $this->user_model->set_is_confirmed_by_register_code($token, $register_code , $email) ;
        if($result == 0 || $result == 1) {
            h_echo_json(Ecode::OK, array('token' => $token)) ;
        } else if(is_int($result)){
            if($result === Ecode::REGISTER_MAIL_VERIFY_TIME_OUT) {
                h_echo_json($result, array('email'=>$email)) ;
            } else {
                h_echo_json($result) ;
            }
        }
    }

    /**
     * 根据email找回密码
     */
    private function find_pwd_by_email_internal() {
        $email = $this->input->get_post('email') ;
        $captcha = $this->input->get_post('captcha') ;
        if($email == null || strlen($email) <= 0) {
            h_echo_json(ECode::REGISTER_USER_INVALIDATE) ;
            return ;
        }

        $type = $this->input->get_post('type') ;
        $from = $this->input->get_post('from') ;

        // 查找用户信息
        $user_info = $this->user_model->get_user_infor_by_login_name($email, User_model::REG_TYPE_EMAIL) ;
        if(!$user_info) {
            h_echo_json(ECode::LOGIN_USER_NOT_EXIST) ;  // 用户不存在
            return ;
        }

        if($type != $user_info['user_type']) {
            h_echo_json(ECode::LOGIN_USER_NOT_EXIST) ;  // 用户不存在
            return ;
        }


        // 设置confirm_code
        $confirm_code = '';
        $register_code ='' ;
        $this->user_model->set_confirm_code($register_code, $confirm_code,$user_info['id'],$user_info['is_confirm']) ;

        $mail_notify = $this->input->get_post('mail_notify') ;
        if(!isset($mail_notify) || $mail_notify == User_model::MAIL_NOTIFY_AUTO) {
            // 发送找回密码邮件通知
            $send_success = $this->send_find_password_mail($confirm_code, $email, $type, $from) ;
            if(!$send_success) {  //邮件发送失败
                h_echo_json(Ecode::S2S_ARG_ERR) ;
                return ;
            }
        } else {
            $arr['confirm_code'] = $confirm_code;
            $arr['email'] = $email;
        }

        //页面跳转
        $email_encode = '';
        $email_url ='';
        $this->get_email_and_emailurl($email_encode, $email_url ,$email) ;
        $arr['email_encode'] = $email_encode;
        $arr['email_url'] = $email_url;
        h_echo_json(Ecode::OK,$arr) ;
    }

    /**
     * 根据手机号找回密码
     */
    private function find_pwd_by_mobile_internal() {
        $mobile = $this->input->get_post('mobile') ;
        $code = $this->input->get_post('code') ;

        //
        $this->load->model('sms_model') ;
        $rst = $this->sms_model->check_login_sms($mobile, $code) ;
        if( !$rst ) {
            h_echo_json(Ecode::LOGIN_USER_NOT_EXIST) ;
            return ;
        }

        $user_info = $this->user_model->get_user_infor_by_login_name($mobile,User_model::REG_TYPE_MOBILE) ;
        if( empty($user_info) ) {
            h_echo_json(Ecode::S2S_ARG_ERR) ;
        } else {
//            $confirm_code = '';
//            $register_code ='' ;
//            $rst = $this->user_model->set_confirm_code($register_code, $confirm_code,$user_info['id'],$user_info['is_confirm']) ;

            $token = '';
            $rst = $this->token_model->set_token($token, $user_info['id']) ;
            if( $rst ===  Ecode::OK){
                h_echo_json(Ecode::OK, array('token' => $token)) ;
            } else {
                h_echo_json(Ecode::S2S_ARG_ERR) ;
            }
        }
    }

    /**
     * 检查qsc号码是否存在
     */
    private function check_qsc_internal() {
        $qsc = $this->input->get_post('qsc') ;

        //qsc编号是否合法
        $this->load->model('qsc_model') ;
        if(!$this->qsc_model->is_exist($qsc)){
            h_echo_json(ECode::USER_REG_CHECK_QSC_INVALID) ;
            return ;
        }

        //qsc编号是否已经被注册
        if($this->user_model->qsc_certificate_is_exist($qsc)) {
            h_echo_json(ECode::USER_REG_CHECK_QSC_EXIST) ;
        } else {
            h_echo_json(ECode::OK) ;
        }
    }

    /**
     * 设置用户的QSC证书编号
     */
    private function set_user_qsc_internal() {
        $qsc = $this->input->get_post('qsc') ;

        if(!isset($qsc)) {
            h_echo_json(ECode::USER_REG_CHECK_QSC_INVALID) ;
            return ;
        }

        // 检测qsc证书编号是否有效
        $this->load->model("qsc_model") ;
        if(!$this->qsc_model->is_exist($qsc)) {
            h_echo_json(ECode::USER_REG_CHECK_QSC_INVALID) ;
            return ;
        }

        $this->load->model("user_model") ;
        $id = $GLOBALS['user_id'] ;
        $result = $this->user_model->set_user_detail($id, $qsc) ;
        if($result) {
            if($GLOBALS['user_type'] == 0) { //供应商
                $user_detail = $this->user_model->get_user_infor_by_id($id) ;
                if(!isset($user_detail)) {
                    h_echo_json(Ecode::S2S_ARG_ERR) ;
                    return ;
                }

                if($GLOBALS['user_type'] != $user_detail['user_type']) {
                    h_echo_json(Ecode::C2S_ARG_ERR) ;
                    return ;
                }

                if($user_detail['status'] <2) { //如果没有完成认证
                    $rst = $this->user_model->update_user_status($id,2) ;
                    if(!$rst) {
                        h_echo_json(Ecode::S2S_ARG_ERR) ;
                        return ;
                    }

                    h_echo_json(Ecode::OK, array(), "完成认证，等待签署合作协议") ;
                } else {
                    h_echo_json(Ecode::OK, array(), "完成认证，等待签署合作协议") ;
                }
            } else {   // 代理商、批发商、其他
                h_echo_json(Ecode::OK, array(), "完成认证，等待签署合作协议") ;
            }
        } else {
            h_echo_json(ECode::S2S_ARG_ERR) ;
        }
    }

    public function update_user_status() {
//        if($user_type == User_model::USER_TYPE_PROVIDER) {    // 供应商
//            $this->s_qsc_id() ;
//        } else if($user_type == User_model::USER_TYPE_PIFASHANG) { // 批发商
//
//        } else if($user_type == User_model::USER_TYPE_AGENT) { // 代理商
//
//        } else {  //其他
//
//        }

        $uid = $this->input->get_post('id') ;
        $status = $this->input->get_post('status') ;

        $rst = $this->user_model->update_user_status($uid,$status) ;

        if($rst ) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL) ;
        }
    }

    /**
     * -1 账号注销
     * 0  账号注册成功
     * 1  qsc认证中
     * 2  qsc已认证，待签线下协议
     * 3  线下协议签订中
     * 4  线下协议签署完成
     */
    private function update_user_status_by_id($id, $status) {
        // 0 -> 1 -> 2 -> 3 -> 4
//        $user_type = $GLOBALS['user_type'] ;
//        $status


        $rst = $this->user_model->update_user_status($id,2) ;


    }

    /**
     * 设置用户详情信息
     * 用户详情包含三个部分的内容，
     *      user_0表中的内容，
     *      user_detail_0表中的内容，
     *      qsc_0表中的内容
     */
    private function set_user_detail_internal() {

        $uid = $this->input->get_post('id') ;
        $status = $this->input->get_post('status') ;

        // 用户历史
        $this->load->model("user_admin_his_model") ;
        $rst = $this->user_admin_his_model->add_user_status_msg('用户信息改变为:'.$this->get_stauts_text($status), $uid) ;



//        $this->user_model->set_user_detail() ;
        h_echo_json(Ecode::OK);
    }

    private function get_stauts_text($status) {
        switch($status) {
            case 0:
                return '注册成功';
                break;
            case 1:
                return 'qsc认证中';
                break;
            case 2:
                return 'qsc已认证，待签线下协议';
                break;
            case 3:
                return '线下协议签订中';
                break;
            case 4:
                return '线下协议签署完成';
                break;
            case 100:
                return '账号注销';
                break;
            default:
                return 'error';
                break ;
        }

    }

    /**
     * 获取用户详情信息
     */
    private function get_user_detail_internal($id) {
//        $id = $GLOBALS['user_id'];

//        $id = $this->input->get_post('id') ;
        if(!isset($id)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        // 注册信息
        $rst = $this->user_model->get_user_infor_by_uid($id) ;
        $rst2 = $this->user_model->get_user_detai_info_by_uid($id) ;

//        var_dump($rst) ;
//        var_dump($rst2) ;
        if(is_array($rst2)) {
            $result = array_merge($rst, $rst2) ;
        } else {
            $result = $rst ;
        }

        // qsc信息
        if(isset($result['qsc'])) {
            $this->load->model('qsc_model') ;
            $qsc_info = $this->qsc_model->get_qsc_detail_info($result['qsc']) ;
            $result['qsc'] = $qsc_info ;
        }

        if($rst['user_type'] == Ptype::TYPE_A) {
            $this->load->model("user_agent_model") ;
            $result['agent'] = $this->user_agent_model->get_my_agent_info($id) ;
        } else if($rst['user_type'] == Ptype::TYPE_S) {
            $this->load->model("user_suppliyer_model") ;
            $result['supliyer'] = $this->user_suppliyer_model->get_my_supliyer_info($id) ;
        }

        h_echo_json(Ecode::OK, $result) ;
    }

    /**
     * 可定制注册邮件发送接口
     *
     * @param $confirm_code
     * @param $tomail
     * @param $user_type
     * @return int
     */
    private function send_register_mail($register_code, $confirm_code, $tomail, $user_type) {
        if($user_type == Ptype::TYPE_S) { // 供应商、批发商
            $url = "http://s.qsctrip.com"."/user/register_confirm?confirm_code=".$confirm_code ;
            $title ="来自QSC供应商的注册邮件" ;
//            $content="欢迎注册QSC网站,点击链接完成确认注册(请在24小时内完成验证) $url" ;
            $content="欢迎注册QSC网站,请在24小时内完成验证, 验证码：". $register_code ;
        }
//        elseif($user_type == Ptype::TYPE_S) { // 批发商
//            $url = "http://p.qsctrip.com"."/user/register_confirm?confirm_code=".$confirm_code ;
//            $title ="来自QSC批发商的注册邮件" ;
////            $content="欢迎注册QSC批发商网站,点击链接完成确认注册(请在24小时内完成验证)". $url ;
//            $content="欢迎注册QSC批发商网站,请在24小时内完成验证, 验证码： $register_code" ;
//        }
        elseif($user_type == Ptype::TYPE_A) { // 代理商
            $url = "http://a.qsctrip.com"."/user/register_confirm?confirm_code=".$confirm_code ;
            $title ="来自QSC代理商的注册邮件" ;
//            $content="欢迎注册QSC网站,点击链接完成确认注册(请在24小时内完成验证) $url" ;
            $content="欢迎注册QSC代理商,请在24小时内完成验证, 验证码： $register_code" ;
        } elseif($user_type == User_model::TYPE_TOURISM) { // 旅游顾问、玩家
//            $confirm_url = "http://.qsctrip.com"."/user/register_confirm?confirm_code=".$confirm_code ;
        }

        $this->load->library('mail_send') ;
        return $this->mail_send->send_mail($tomail, $title, $content) ;

//        return $this->send_mail($tomail, $title, $content) ;
    }

    private function get_email_and_emailurl(&$email, &$email_url, $tomail) {
        $arr_spite = explode("@", $tomail, 2) ;
        $email = $arr_spite[0] ;
        $char_len = strlen($email) ;
        $first_char = $email[0] ;
        $last_char = $email[$char_len - 1] ;
        $center_chars = '';
        for($i=0;$i<$char_len-2;$i++) {
            $center_chars .= '*' ;
        }
        $email = $first_char . $center_chars .$last_char .'@'.$arr_spite[1] ;
        $email_url = $this->get_email_url_by_suffix($arr_spite[1]) ;
    }

    private function get_email_url_by_suffix($suffix) {
        $arr = explode('.',$suffix,2) ;
        $com = $arr[0] ;
        if($com == 'qq') {
            return "http://www.mail.qq.com" ;
        }

        //find mail url from database by com as key

        return "http://www.mail.qq.com" ;
    }

    /**
     * 发送邮件找回密码
     *
     * @param $confirm_code
     * @param $to_mail
     * @param $user_type
     * @param $from
     * @return bool
     */
    private function send_find_password_mail($confirm_code, $to_mail, $user_type, $from) {
        $from_str = "您从". $this->get_from_platfrom($from)."发起找回密码操作" ;

        if($user_type == User_model::USER_TYPE_PROVIDER) { // 供应商
            $url = "http://s.qsctrip.com"."/user/reset_pwd?confirm_code=".$confirm_code ;
            $title ="来自QSC供应商的找回密码邮件" ;
        } elseif($user_type == User_model::USER_TYPE_PIFASHANG) { // 批发商
            $url = "http://p.qsctrip.com"."/user/reset_pwd?confirm_code=".$confirm_code ;
            $title ="来自QSC批发商的找回密码邮件" ;
        } elseif($user_type == User_model::USER_TYPE_AGENT) { // 代理商
            $url = "http://a.qsctrip.com"."/user/reset_pwd?confirm_code=".$confirm_code ;
            $title ="来自QSC代理商的找回密码邮件" ;
        } elseif($user_type == User_model::USER_TYPE_CONSULTANT) { // 旅游顾问、玩家
            $url = "http://a.qsctrip.com"."/user/reset_pwd?confirm_code=".$confirm_code ;
            $title ="来自QSC旅行顾问的找回密码邮件" ;
        }
        $content = $from_str."点击链接确认找回密码".$url ;

        $this->load->library('mail_send') ;
        return $this->mail_send->send_mail($to_mail, $title, $content) ;
    }

    /**
     * 根据from转换成对应的文字
     *
     * @param $from
     * @return string
     */
    private function get_from_platfrom($from) {
        if(!isset($from)) {
            return "位置来源" ;
        } elseif($from == 1) {
            return "web" ;
        } elseif($from == 2) {
            return "android" ;
        } elseif($from == 3) {
            return "ios" ;
        } elseif($from == 4) {
            return "h5" ;
        }
    }

    public function begin_use_platfrom() {
        $uid = $GLOBALS['user_id'] ;
        $rst = $this->user_model->begin_use_platfrom($uid) ;
        if(!empty($rst)) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::BAD_REQUEST) ;
        }
    }



}