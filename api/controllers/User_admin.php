<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/10
 * Time: 下午1:51
 */
class User_admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_admin_his_model") ;
    }

    /**
     * 添加一条用户维护信息
     */
    public function add_user_status_msg() {

        $msg = $this->input->get_post('msg') ;
        $uid = $this->input->get_post('uid') ;
        $rst = $this->user_admin_his_model->add_user_status_msg($msg, $uid) ;

        if(empty($rst)) {
            h_echo_json(Ecode::INSERT_FAIL) ;
        } else {
            h_echo_json(Ecode::OK) ;
        }
    }

    // 获取所有用户维护历史
    public function get_user_status_msg() {
        $uid = $this->input->get_post('uid') ;
        $rst = $this->user_admin_his_model->get_user_status_msg($uid) ;

        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
        } else {
            h_echo_json(Ecode::OK, $rst) ;
        }
    }

}