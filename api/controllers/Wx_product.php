<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/08/01
 * Time: 下午4:52
 */
class Wx_product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_data_type() {
        $uid = $GLOBALS['user_id'] ;
        $this->load->model("user_model") ;
        $user_info = $this->user_model->get_user_infor_by_uid($uid) ;

        if(empty($user_info)) {
            h_echo_json(Ecode::S2S_ARG_ERR);
        } else {
            //加载代理的数据
            if($user_info['user_type'] == Ptype::TYPE_A) { // 代理商
                if($user_info['level'] == Ptype::LEVEL_USER_GENERAL) { //普通游客
                    $rst = $this->_get_tourism_data_type($user_info) ;
                } else { //代理
                    $rst = $this->_get_agent_data_type($user_info) ;
                }
            } else {    // 供应商
                $rst = $this->_get_supplier_data_type($user_info) ;
            }
            h_echo_json(Ecode::OK, $rst) ;
        }
    }

    public function get_agent_info_by_aid() {
        $aid = $this->input->get_post("aid") ;
        if(!isset($aid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            die() ;
        }
        $this->load->model("wx/wx_product_tourism_model", "wx_product_tourism_model") ;
        $rst =  $this->wx_product_tourism_model->get_agent_info_by_aid($aid) ;
        if(empty($rst)){
            h_echo_json(Ecode::NO_RESULT) ;
        } else {
            h_echo_json(Ecode::OK, $rst) ;
        }
    }

    public function load_agent_list() {
        $uid = $GLOBALS['user_id'] ;
        $this->load->model("user_model") ;
        $user_info = $this->user_model->get_user_infor_by_uid($uid) ;
        if(empty($user_info)) {
            h_echo_json(Ecode::S2S_ARG_ERR);
        } else {
            $this->load->model("wx/wx_product_tourism_model", "wx_product_tourism_model") ;
            $rst =  $this->wx_product_tourism_model->load_agent_list($user_info) ;
            h_echo_json(Ecode::OK, $rst) ;
        }
    }

    // 加载游客数据
    private function _get_tourism_data_type($user_info) {
        $this->load->model("wx/wx_product_tourism_model", "wx_product_tourism_model") ;
        return $this->wx_product_tourism_model->get_data_type($user_info) ;
    }

    // 加载代理商数据
    private function _get_agent_data_type($user_info) {
//        $this->load->model("wx/wx_product_agent_model", "wx_product_agent_model") ;
//        return $this->wx_product_agent_model->get_data_type($user_info) ;
        return array("data_type" => Ptype::WX_PRODUCT_TYPE_AGENT_PRODUCT, "aid" => $user_info['id']) ;
    }

    // 加载供应商数据
    private function _get_supplier_data_type($user_info) {
//        $this->load->model("wx/wx_product_supplier_model", "wx_product_supplier_model") ;
//        return $this->wx_product_supplier_model->get_data_type($user_info) ;
        return array("data_type" => Ptype::WX_PRODUCT_TYPE_AGENT_PRODUCT, "aid"=>"2") ;
    }

}