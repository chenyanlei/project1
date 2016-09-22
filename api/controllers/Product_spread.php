<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/27
 * Time: 下午7:10
 */
class Product_spread extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('aspread_model') ;
    }

    public function create() {
        $uid = $GLOBALS['user_id'];
        $mid = $this->input->get_post("mid") ;
        $pid = $this->input->get_post("pid") ;

        if(!isset($mid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $id = '' ;
        $rst = $this->aspread_model->create($id, $uid, $pid, $mid) ;
        if($rst == -1) {
            h_echo_json(Ecode::INSERT_FAIL, array(), "添加失败") ;
        } else if($rst == 1) {
            h_echo_json(Ecode::INSERT_FAIL, array(), "已经存在啦") ;
        } else //if($rst== 0)
        {
            // 先进行产品插入操作
            $this->load->model('atomic/a_p_travels_atomic_model','a_p_travels_atomic_model') ;
            $this->a_p_travels_atomic_model->add_item($uid, $pid, Ptype::ONE_DAY) ;
            $this->load->model('product_model') ;
            $this->product_model->change_a_status($uid, $pid, Ptype::ONE_DAY , 1) ;

            h_echo_json(Ecode::OK, array('id' => $id, 'aid'=>$uid)) ;
        }
    }

    public function modify() {
        $uid = $GLOBALS['user_id'];
        $sid = $this->input->get_post('id') ;
        $mid = $this->input->get_post('mid') ;
        $face_img = $this->input->get_post('face_img') ;
        if(!isset($face_img) || sizeof($face_img) == 0) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return;
        }
        $title = $this->input->get_post('title') ;
        if(!isset($title) || sizeof($title) == 0) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return;
        }
        $content = $this->input->get_post('content') ;
        if(!isset($content) || sizeof($content) == 0) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return;
        }

        $rst = $this->aspread_model->modify($uid, $sid, $mid, $face_img, $title, $content) ;
        h_echo_json($rst?Ecode::OK:Ecode::UPDATE_FAIL);
    }

    public function get_list() {
        $uid = $GLOBALS['user_id'] ;
        $rn = $this->input->get_post("rn") ;
        $pn = $this->input->get_post("pn") ;
        if(!isset($rn) || $rn < 1) {
            $rn = 20 ;
        }
        if(!isset($pn) || $pn < 1) {
            $pn = 0 ;
        }
        $rst = $this->aspread_model->get_list($uid, $rn ,$pn) ;
        if($rst == null || empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        h_echo_json(Ecode::OK, $rst) ;
    }

    public function get_detail() {

        $id = $this->input->get_post('id') ;
        $rst = $this->aspread_model->get_detail($id) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        $rst['img_url'] = URL_IMG ;

        $this->load->model('product_model') ;
        if(!isset($GLOBALS['user_id'])) {
            $uid = '';
        } else {
            $uid = $GLOBALS['user_id'];
        }

        $aid = $this->input->get_post('aid');
        if(!isset($aid)) {
            $aid = '' ;
        }

        $rst['p_detail'] = $this->product_model->detail($rst['pid'], $uid, $aid) ;
        unset($rst['p_detail']['travel_intro']) ;

        h_echo_json(Ecode::OK, $rst) ;
    }

}