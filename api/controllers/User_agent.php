<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/21
 * Time: 上午11:59
 */
class User_agent extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_agent_model") ;
    }

    // 设置擅长的目的地
    public function set_agent_product_destination() {
        $uid = $GLOBALS['user_id'];

        $product_destinations_type = $this->input->post('product_destinations_type') ;
        $product_destinations_id = $this->input->post('product_destinations_id') ;
        $agent_type = $this->input->post('agent_type') ;

        $rst = $this->user_agent_model->set_agent_product_destination($uid,$product_destinations_type, $product_destinations_id,$agent_type) ;

        if(!empty($rst)) {
            h_echo_json(Ecode::OK);
        } else {
            h_echo_json(Ecode::INSERT_FAIL);
        }
    }

    public function get_agent_product_destination() {
        $uid = $GLOBALS['user_id'];
        $rst = $this->user_agent_model->get_agent_product_destination($uid) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    // 设置擅长的产品类型
    public function set_agent_classify() {
        $uid = $GLOBALS['user_id'];

        $tags_type = $this->input->post('product_classifies_type') ;
        if($tags_type == 1) {
            $tags_id = $this->input->post('product_classifies_id') ;
            $rst = $this->user_agent_model->set_agent_product_classify($uid, $tags_type, $tags_id) ;

        } else {
            $arr = null;
        }

        if(empty($rst)) {
            h_echo_json(Ecode::INSERT_FAIL) ;
            return ;
        }
        h_echo_json(Ecode::OK) ;
    }

    public function get_agent_classify() {
        $uid = $GLOBALS['user_id'];
        $rst = $this->user_agent_model->get_agent_product_classify($uid) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function get_my_agent_info() {
        $uid = $GLOBALS['user_id'] ;
        $rst = $this->user_agent_model->get_my_agent_info($uid) ;
        if(empty($rst)) {
           h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        h_echo_json(Ecode::OK, $rst) ;
    }

    public function check_recommend_code() {
        $recommend_uid = $this->_check_recommend_code() ;
        if(isset($recommend_uid)) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::C2S_ARG_ERR,array(), '请输入正确的推荐码') ;
        }
    }

    public function set_agent_auting_info() {
        // 申请成为代理，需要添加注册码
        $recommend_uid = $this->_check_recommend_code() ;

        $uid = $GLOBALS['user_id'];
        $agent_type = $this->input->post('agent_type') ;
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
                $rst = $this->user_agent_model->set_com_agent_auting_info($uid, $name, $bussiness_licence,  $orgnization_code, $address,
                    $bussiness_licence_img, $orgnization_code_img, $corporate, $corporate_card_id, $contact, $contact_phone) ;
            }
        }

        $this->load->model("user_model") ;
        $user_infor = $this->user_model->get_user_infor_by_uid($uid) ;
        $this->user_model->update_user_status($uid, Ptype::AGENT_STATUS_INFO_COMMIT) ;
        $this->load->model("user_admin_his_model") ;
        $this->user_admin_his_model->add_user_status_msg('代理商信息已提交，待审核', $uid, Ptype::AGENT_STATUS_INFO_COMMIT) ;

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

    // 管理员权限
    public function create_recommend_code() {
        $to_uid = $this->input->get_post('to_uid') ;
        $code = $this->user_agent_model->create_recommend_code($to_uid) ;
        h_echo_json(Ecode::OK, array('recommend_code' => $code)) ;
    }

}