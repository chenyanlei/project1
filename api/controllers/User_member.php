<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/08/23
 * Time: 上午11:59
 */
class User_member extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model") ;
        $this->load->model("user_agent_model") ;
    }

    public function add() {
        $reg_type = $this->input->post("reg_type") ;
        $parent = $this->input->post("parent") ;

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
//            $this->load->model('sms_model') ;
//            $code = $this->input->get_post('code') ;
//            if(strlen($code) != 6) {
//                h_echo_json(Ecode::C2S_ARG_ERR, array(), '短消息验证码错误') ;
//                return false ;
//            }
//            $sms_rst = $this->sms_model->check_login_sms($mobile, $code) ;
//            if( !$sms_rst ) {
//                h_echo_json(Ecode::C2S_ARG_ERR, array(), '手机号或者短消息验证码错误') ;
//                return false ;
//            }

            $email = $this->input->post("email") ;

            $pwd = $this->input->post("pwd") ;
            if(!isset($pwd) ||empty($pwd)) {
                h_echo_json(ECode::REGISTER_REQUIRE_PWD) ;
                return false;
            }

            $name = $this->input->post("name") ;
        }

        $verify = $this->input->post("verify") ;
        $user_type = $this->input->post("type") ;
        $from = $this->input->post("from") ;

        $result = $this->user_model->register($user_type ,$reg_type, $pwd, $email, $mobile, $name, $from,'') ;
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
                $this->user_admin_his_model->add_user_status_msg('管理员添加成员，注册成功', $result['insert_id'],Ptype::REGISTER_SUCCESS) ;

                // 如果是手机端注册，直接注册成功，不需要邮箱二次验证
                $confirm_code = '' ;
                $register_code ='' ;
                $set_confirm_result = $this->user_model->set_confirm_code($register_code, $confirm_code,$result['insert_id'], '1') ;
                $token ='' ;
                $rst = $this->token_model->set_token($token, $result['insert_id']) ;
                if($rst == Ecode::OK){
                    h_echo_json(Ecode::OK, array('token' => $token, 'name' => $this->user_model->register_generate_user_id($result['insert_id']),'id'=>$result['insert_id'])) ;
                } else {
                    h_echo_json(Ecode::S2S_ARG_ERR) ;
                }
            } else {
                h_echo_json(Ecode::OK) ;
            }
        }



    }

    public function set_agent_info() {
        // 申请成为代理，需要添加注册码
        $recommend_uid = $GLOBALS['user_id'] ;

        $uid = $this->input->post('uid');
        $level = $this->input->post('level');
        $agent_type = $this->input->get_post('agent_type') ;
        $agent_rst = $this->user_agent_model->set_agent_type_parent($uid, $agent_type, $recommend_uid) ;
        if(!empty($agent_rst)) {
            if($agent_type == 0) { // 个人
                $name = $this->input->post('name') ;
                $sex = $this->input->post('sex') ;
                $contact = $this->input->post('contact') ;
                $address = $this->input->post('address') ;
                $id_card_0 = $this->input->post('id_card_0') ;
                $id_card_1 = $this->input->post('id_card_1') ;
                $id_card_2 = $this->input->post('id_card_2') ;
                $this->user_model->set_user_level($uid,$level);

                $rst = $this->user_agent_model->set_personal_agent_auting_info($uid, $name, $sex, $contact, $address, $id_card_0, $id_card_1,$id_card_2) ;

//                $this->load->model('user_model') ;
//                if(!$this->user_model->find_mobile_is_exist($uid)) {
//                    $this->user_model->set_user_mobile($uid, $contact) ;
//                }
            } else { // 企业
                $name = $this->input->post('name') ;
                $bussiness_licence = $this->input->post('bussiness_licence') ;
                $orgnization_code = $this->input->post('orgnization_code') ;
                $address = $this->input->post('address') ;
                $bussiness_licence_img = $this->input->post('bussiness_licence_img') ;
                $orgnization_code_img = $this->input->post('orgnization_code_img') ;
                $corporate = $this->input->post('corporate') ;
                $corporate_card_id = $this->input->post('corporate_card_id') ;
                $contact = $this->input->post('contact') ;
                $contact_phone = $this->input->post('contact_phone') ;
                $this->user_model->set_user_level($uid,$level);
                $rst = $this->user_agent_model->set_com_agent_auting_info($uid, $name, $bussiness_licence,  $orgnization_code, $address,
                    $bussiness_licence_img, $orgnization_code_img, $corporate, $corporate_card_id, $contact, $contact_phone) ;
            }
        }

        $this->load->model("user_model") ;
        $user_infor = $this->user_model->get_user_infor_by_uid($uid) ;
        $this->user_model->update_user_status($uid, Ptype::AGENT_STATUS_PASS_CHECK) ;
        $this->load->model("user_admin_his_model") ;
        $this->user_admin_his_model->add_user_status_msg('代理商信息已提交，待审核', $uid, Ptype::AGENT_STATUS_INFO_COMMIT) ;
        $this->user_admin_his_model->add_user_status_msg('添加成员自动通过', $uid, Ptype::AGENT_STATUS_PASS_CHECK) ;

        if(empty($rst)) {
            h_echo_json(Ecode::INSERT_FAIL) ;
            return ;
        }
        h_echo_json(Ecode::OK) ;
    }

    private function _check_recommend_code() {
        $recommend_code = $this->input->get_post('recommend_code') ;
        if(!isset($recommend_code)) {
            die(h_echo_json(Ecode::C2S_ARG_ERR, array(), '请添加推荐码')) ;
        }

        $recommend_uid = $this->user_agent_model->get_uid_by_recommend_code($recommend_code) ;

        if( $recommend_uid == null || $recommend_uid <= 0 ) {
            die(h_echo_json(Ecode::C2S_ARG_ERR, array(), '请输入正确的推荐码') );
        }

        return $recommend_uid;
    }

    public function get_list() {
        $uid = $GLOBALS['user_id'];
        $pn = $this->input->post('pn') ;
        if(!$pn) {
            $pn = 0 ;
        }
        $rn = $this->input->post('rn') ;
        if(!$rn) {
            $rn = 20 ;
        }

        $rst = $this->user_agent_model->get_list($uid, $pn, $rn) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function del_agent(){
        $uid = $this->input->post('uid');
        $this->load->model('atomic/agent/user_agent_atomic_model', 'user_agent_atomic_model') ;
        
        $rst = $this->user_agent_atomic_model->del_agent_by_uid($uid) ;
        if($rst) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL) ;
        }
    }

    public function reset_agent_info(){
        $uid = $this->input->post('uid');
        $this->load->model('atomic/agent/user_agent_com_atomic_model', 'user_agent_com_atomic_model') ;
        $post = $this->input->post(null) ;
        $arr = array('uid' 			 => $post['uid'],
            'name'					 => $post['name'] ,
            'address' 				 => $post['address'] ,
            'contact' 				 => $post['contact'] ,
            'contact_phone' 		 => $post['contact_phone']
        );
        $where = array('uid' => $uid) ;
        $rst = $this->user_agent_com_atomic_model->upd($arr, $where) ;
        if($rst) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL) ;
        }

    }
}