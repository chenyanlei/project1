<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/23
 * Time: 下午5:00
 */
class Customer extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model', 'customer_model');
    }

    public function get_list() {
        $uid = $GLOBALS['user_id'];
        $pn = $this->input->get_post('pn') ;
        if($pn < 0) {
            $pn = 0 ;
        }
        $rn = $this->input->get_post('rn') ;
        if($rn < 0) {
            $rn = 20 ;
        }

        $rst = $this->customer_model->get_list_by_sql($uid, $pn, $rn) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

//    public function get_list() {
//        $uid = $GLOBALS['user_id'];
//        $pn = $this->input->get_post('pn') ;
//        if($pn < 0) {
//            $pn = 0 ;
//        }
//        $rn = $this->input->get_post('rn') ;
//        if($rn < 0) {
//            $rn = 20 ;
//        }
//
//        $rst = $this->customer_model->get_list($uid, $pn, $rn) ;
//        h_echo_json(Ecode::OK, $rst) ;
//    }

    public function detail() {
        $cid = $this->input->get_post('id') ;
        if(!isset($cid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $rst = $this->customer_model->detail($cid) ;

        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }



}