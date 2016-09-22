<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/08/03
 * Time: 下午12:41
 */
class Merchant extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('merchant/merchant_model', 'merchant_model') ;
    }

    public function get_list() {
        $rn = $this->input->get_post("rn") ;
        $pn = $this->input->get_post("pn") ;
        $s_type = $this->input->get_post("s_type") ;
        if(!isset($rn) || $rn < 1) {
            $rn = 20 ;
        }
        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }
        if(!isset($s_type)) {
            $s_type = 0 ;
        }
        if($s_type>Ptype::TYPE_S_PFS || $s_type<Ptype::TYPE_S_LOCAL_TRAVEL) {
            $s_type = 0 ;
        }

        $rst = $this->merchant_model->get_list($pn,$rn,$s_type) ;
        if(!empty($rst)) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

    public function get_detail() {
        $id = $this->input->get_post("id") ;
        if(!isset($id)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        if($id < 0 ) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $rst = $this->merchant_model->get_detail($id) ;
        if(!empty($rst)) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

    public function add() {
        $uid = $GLOBALS['user_id'] ;
        $post = $this->input->post(null, false) ;
        if(!isset($post['s_type'])) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
//        if($post['s_type']>Ptype::TYPE_S_PFS || $post['s_type']<Ptype::TYPE_S_LOCAL_TRAVEL) {
//            h_echo_json(Ecode::C2S_ARG_ERR) ;
//            return ;
//        }
        if($post['s_type']>3 || $post['s_type']<1) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $post['uid'] = $uid;
        $insert_id = '' ;
        $rst = $this->merchant_model->add($insert_id , $post) ;
        h_echo_json($rst, $rst===Ecode::OK?array('id' =>$insert_id ):array()) ;
    }

}