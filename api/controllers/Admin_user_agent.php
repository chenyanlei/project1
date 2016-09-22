<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/6/3
 * Time: 下午6:52
 */
class Admin_user_agent extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_agent_model") ;
    }

    // 系统管理员权限
    public function get_all_suppliyer() {

        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 10 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $where = array('user_type' => Ptype::TYPE_S) ;
        $status = $this->input->get_post('status') ;
        if(isset($status)) {
            if($status == 0) {  //全部

            } else if($status == Ptype::SUPPLIER_STATUS_WILL_SIGN) {    // 供应商待签协议
                $where['status'] = Ptype::SUPPLIER_STATUS_WILL_SIGN ;
            } else if($status == Ptype::SUPPLIER_STATUS_SIGNING){       // 供应商协议签订中
                $where['status'] = Ptype::SUPPLIER_STATUS_SIGNING ;
            } else if($status == Ptype::SUPPLIER_STATUS_SIGN_FINISHED) { //供应商协议签订完成
                $where['status'] = Ptype::SUPPLIER_STATUS_SIGN_FINISHED ;
            }
        }

        $select = 'id, privilige, email, mobile, name, register_time, status';

//        $sql = "select user_0.privilige, user_0.email, user_0.mobile, user_0.name, user_0.register_time, user_0.status, user_agent_0.agent_type
//         from user_0,user_agent_0 where user_0.id=user_agent_0.uid" ;

        $this->load->model('atomic/user_atomic_model', 'user_atomic_model') ;
        $rst['total'] = $this->user_atomic_model->cnt($where) ;
        $rst['page_num'] = intval(($rst['total'] -1) / $rn + 1)  ;
        $rst['rn'] = $rn ;
        $rst['cur'] = $pn ;
        $rst['data'] = $this->user_atomic_model->slt_res_arr($where, $select, $rn, $rn * $pn) ;

        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    // 系统管理员权限
    public function get_all_agent() {

        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 10 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $where = array('user_type' => Ptype::TYPE_A) ;
        $status = $this->input->get_post('status') ;
        if(isset($status)) {
            if($status == 0) {  //全部

            } else if($status == Ptype::AGENT_STATUS_PASS_CHECK) {  // 通过
                $where['status'] = Ptype::AGENT_STATUS_PASS_CHECK ;
            } else if($status == Ptype::AGENT_STATUS_FAILED_CHECK){ // 不通过
                $where['status'] = Ptype::AGENT_STATUS_FAILED_CHECK ;
            } else if($status == Ptype::AGENT_STATUS_FROZEN) { //冻结
                $where['status'] = Ptype::AGENT_STATUS_FROZEN ;
            } else {
                $where['status<'] = Ptype::AGENT_STATUS_PASS_CHECK ;
            }
        }

        $select = 'id, privilige, email, mobile, name, register_time, status, level';

//        $sql = "select user_0.privilige, user_0.email, user_0.mobile, user_0.name, user_0.register_time, user_0.status, user_agent_0.agent_type
//         from user_0,user_agent_0 where user_0.id=user_agent_0.uid" ;

        $this->load->model('atomic/user_atomic_model', 'user_atomic_model') ;
        $rst['total'] = $this->user_atomic_model->cnt($where) ;
        $rst['page_num'] = intval(($rst['total'] -1) / $rn + 1)  ;
        $rst['rn'] = $rn ;
        $rst['cur'] = $pn ;
        $rst['data'] = $this->user_atomic_model->slt_res_arr($where, $select, $rn, $rn * $pn) ;

        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    // 系统管理员权限
    public function get_com_agent_list() {
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 10 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $where = array('user_type' => Ptype::TYPE_A) ;
        $select = 'id, privilige, email, mobile, name, register_time, status';

//        $sql = "select user_0.privilige, user_0.email, user_0.mobile, user_0.name, user_0.register_time, user_0.status, user_agent_0.agent_type
//         from user_0,user_agent_0 where user_0.id=user_agent_0.uid" ;

        $this->load->model('atomic/user_atomic_model', 'user_atomic_model') ;
        $rst['total'] = $this->user_atomic_model->cnt($where) ;
        $rst['rn'] = $rn ;
        $rst['pn'] = $pn ;
        $rst['data'] = $this->user_atomic_model->slt_res_arr($where, $select, $rn, $rn * $pn) ;

        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;

    }

    // 系统管理员权限
    public function get_personal_agent_list() {

    }

    // 代理商审核通过
    public function agent_check_pass() {
        $uid = $this->input->get_post('id') ;
        // 更新用户状态
        $this->load->model('user_model') ;
        $this->user_model->update_user_status($uid, Ptype::AGENT_STATUS_PASS_CHECK) ;

        $this->load->model("user_admin_his_model") ;
        $this->user_admin_his_model->add_user_status_msg('您的代理信息已经审核通过', $uid, Ptype::AGENT_STATUS_PASS_CHECK) ;
        h_echo_json(Ecode::OK) ;

        $user_info = $this->user_model->get_user_infor_by_id($uid) ;
        if(!empty($user_info)) {
            $this->load->model('sms_model') ;
            $this->sms_model->send_sms_by_type(Ptype::SMS_TYPE_REGISTER_SUCCSESS, $user_info['mobile']) ;
        }
    }

    // 代理商审核未通过
    public function agent_check_failure() {
        $uid = $this->input->post('id') ;
        $reason = $this->input->post('reason') ;
        // 更新用户状态
        $this->load->model('user_model') ;
        $this->user_model->update_user_status($uid, Ptype::AGENT_STATUS_FAILED_CHECK) ;

        $this->load->model("user_admin_his_model") ;
        $this->user_admin_his_model->add_user_status_msg('您的代理信息已经审核没有通过，原因是：'. $reason, $uid, Ptype::AGENT_STATUS_FAILED_CHECK) ;
        h_echo_json(Ecode::OK) ;
    }

    // 代理商审核通过
    public function supliyer_check_pass() {
        $uid = $this->input->get_post('id') ;
        // 更新用户状态
        $this->load->model('user_model') ;
        $this->user_model->update_user_status($uid, Ptype::SUPPLIER_STATUS_WILL_SIGN) ;

        $this->load->model("user_admin_his_model") ;
        $this->user_admin_his_model->add_user_status_msg('您的供应商信息已经审核通过,等待签线下协议', $uid, Ptype::SUPPLIER_STATUS_WILL_SIGN) ;
        h_echo_json(Ecode::OK) ;
    }

    // 代理商审核未通过
    public function supliyer_check_failure() {
        $uid = $this->input->post('id') ;
        $reason = $this->input->post('reason') ;
        // 更新用户状态
        $this->load->model('user_model') ;
        $this->user_model->update_user_status($uid, Ptype::SUPPLIER_STATUS_FAILED_CHECK) ;

        $this->load->model("user_admin_his_model") ;
        $this->user_admin_his_model->add_user_status_msg('您的代理信息已经审核没有通过，原因是：'. $reason, $uid, Ptype::SUPPLIER_STATUS_FAILED_CHECK) ;
        h_echo_json(Ecode::OK) ;
    }

    public function supliyer_signed(){
        $uid = $this->input->get_post('id') ;
        // 更新用户状态
        $this->load->model('user_model') ;
        $this->user_model->update_user_status($uid, Ptype::SUPPLIER_STATUS_SIGN_FINISHED) ;

        $this->load->model("user_admin_his_model") ;
        $this->user_admin_his_model->add_user_status_msg('线下协议签订完成', $uid, Ptype::SUPPLIER_STATUS_SIGN_FINISHED) ;
        h_echo_json(Ecode::OK) ;
    }

    public function get_tourist_list() {
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 10 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $where = array('user_type' => Ptype::TYPE_TOURISM) ;
        $select = 'id, privilige, email, mobile, name, register_time, status';

        $this->load->model('atomic/user_atomic_model', 'user_atomic_model') ;
        $rst['total'] = $this->user_atomic_model->cnt($where) ;
        $rst['page_num'] = intval(($rst['total'] -1) / $rn + 1)  ;
        $rst['rn'] = $rn ;
        $rst['cur'] = $pn ;
        $rst['data'] = $this->user_atomic_model->slt_res_arr($where, $select, $rn, $rn * $pn) ;

        if(empty($rst['data'])) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function set_user_agent_level() {
//        $uid = $GLOBALS['user_id'] ;
        $level = $this->input->get_post("level")  ;
        $uid = $this->input->get_post("id")  ;
        if(!isset($level) || $level < Ptype::LEVEL_AGENT_PERSON_LEVEL_1 || $level > Ptype::LEVEL_AGENT_COM_LEVEL_3) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

//        echo $uid ;
        $arr = array("level" => $level, "id" => $uid) ;
        $where = array("id" => $uid) ;
        $this->load->model("user_atomic_model") ;
        $rst = $this->user_atomic_model->upd($arr,$where) ;
        if(empty($rst)) {
            h_echo_json(Ecode::UPDATE_FAIL) ;
        } else {
            h_echo_json(Ecode::OK) ;
        }
    }

}