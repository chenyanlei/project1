<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/21
 * Time: 上午11:59
 */
class User_supliyer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_suppliyer_model") ;
    }


    public function set_supliyer_contact_info() {
        $uid = $GLOBALS['user_id'];

        $contact = $this->input->post('contact') ;
        $tel = $this->input->post('tel') ;
        $phone = $this->input->post('phone') ;
        $weichat = $this->input->post('weichat') ;
        $qq = $this->input->post('qq') ;
        $addr = $this->input->post('addr') ;
        $rst = $this->user_suppliyer_model->set_supliyer_contact_info($uid, $contact, $tel, $phone, $weichat, $qq, $addr) ;
        if(empty($rst)) {
            h_echo_json(Ecode::BAD_REQUEST) ;
            return ;
        }

        $this->load->model('user_model') ;
        $this->user_model->update_user_status($uid, Ptype::SUPPLIER_STATUS_INFO_COMMIT) ;

        $this->load->model("user_admin_his_model") ;
        $this->user_admin_his_model->add_user_status_msg('您的信息已提交，将进入审核状态', $uid, Ptype::SUPPLIER_STATUS_INFO_COMMIT) ;

        h_echo_json(Ecode::OK) ;
    }
}