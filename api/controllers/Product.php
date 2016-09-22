<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/29
 * Time: 下午3:53
 */

class Product extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('product_model') ;
    }

    // 列表
    public function get_list() {
        $uid = $GLOBALS['user_id'] ;
        $pn = $this->input->get_post('pn') ;
        $rn = $this->input->get_post('rn') ;
        $p_type = $this->input->get_post('p_type') ;
        $u_type = $this->input->get_post('type') ;

        if(!isset($p_type)) {
            $p_type = 0;
        }

        $p_status = $this->input->get_post('p_status') ;
        if(!isset($p_status)) {
            $p_status = -1;
        }

        $rst = $this->product_model->get_list($u_type, $uid, $pn,$rn,$p_type,$p_status) ;

        h_echo_json(Ecode::OK, $rst) ;
    }

    // 获取代理所有出售中的商品
    public function get_a_product_list() {
        $aid = $this->input->get_post('aid') ;
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;

        if(!isset($rn) || $rn < 0) {
            $rn = 10 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $rst = $this->product_model->get_a_product_list($aid, $rn, $pn) ;

        if(!empty($rst)) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

    public function detail() {
        $uid =  $GLOBALS['user_id'] ;

        $pid = $this->input->get_post('id') ;
        $aid = $this->input->get_post('aid') ;
        $p_type = $this->input->get_post('p_type') ;
        $deep_detail = $this->input->get_post('deep_detail') ;

        if(!isset($deep_detail)) {
            $travel_info = true ;
        } else {
            if($deep_detail == '0') {
                $travel_info = false ;
            } else {
                $travel_info = true ;
            }
        }

        if(!isset($p_type)) {
            $p_type = Ptype::ONE_DAY;
        }

        $rst = $this->product_model->detail($pid, $uid, $aid, $p_type, $travel_info) ;

        if($rst !== null) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

    public function add() {     // 添加
        $insert_id = '' ;
        $post = $this->input->post(null, false) ;
        $rst = $this->product_model->add($insert_id , $post) ;
        h_echo_json($rst, $rst===Ecode::OK?array('id' =>$insert_id ):array()) ;
    }

    // 添加一个价格
    public function add_calendar_price() {
        $post = $this->input->post(null) ;
        $rst = $this->product_model->add_calendar_price($post) ;
        if( isset($rst['insert_id']) ) {
            h_echo_json(Ecode::OK, array('id' => $rst['insert_id'])) ;
        } else {
            h_echo_json(Ecode::INSERT_FAIL) ;
        }
    }

    // 删除一个价格
    public function remove_calendar_price() {
        $p_type = $this->input->get_post('p_type') ;
        $id = $this->input->get_post('id') ;
        $rst = $this->product_model->remove_calendar_price($p_type, $id) ;
        if( isset($rst['insert_id']) ) {
            h_echo_json(Ecode::OK, array('id' => $rst['insert_id'])) ;
        } else {
            h_echo_json(Ecode::INSERT_FAIL) ;
        }
    }

    // 移除一张图片
    public function remove_img() {
        $id = $this->input->get_post('id') ;
        $pid = $this->input->get_post('pid') ;
        $p_type = $this->input->get_post('p_type') ;
        $uid = $GLOBALS['user_id'];

        $this->load->model('product_model') ;
        $rst = $this->product_model->del_img($uid, $p_type, $id, $pid) ;
        if( isset($rst['affected_rows']) ) {
            h_echo_json(Ecode::OK, array('id' => $rst['affected_rows'])) ;
        } else {
            h_echo_json(Ecode::DELETE_FAIL) ;
        }
    }

    // 修改
    public function modify() {
        $post = $this->input->post(null) ;
        $rst = $this->product_model->modify($post) ;
        h_echo_json($rst) ;
    }

    // 删除一个产品
    public function del() {
        $post = $this->input->post(null) ;
        $rst = $this->product_model->modify($post) ;
        $rst?h_echo_json(Ecode::OK):h_echo_json(Ecode::DELETE_FAIL) ;
    }

    public function change_status() {
        $type = $this->input->get_post('type') ;
        if($type == Ptype::TYPE_A) {
            $uid = $GLOBALS['user_id'] ;
            $pid = $this->input->get_post('id') ;
            $p_status = $this->input->get_post('p_status') ;
            $to_status = $this->input->get_post('to_status') ;
            $p_type = $this->input->get_post('p_type') ;

            // 先进行产品插入操作
            $this->load->model('atomic/a_p_travels_atomic_model','a_p_travels_atomic_model') ;
            $this->a_p_travels_atomic_model->add_item($uid, $pid, $p_type) ;

            $rst = $this->product_model->change_a_status($uid, $pid, $p_type ,$to_status) ;
            if($rst) {
                h_echo_json(Ecode::OK, array('p_status'=>$to_status)) ;
            } else {
                h_echo_json(Ecode::UPDATE_FAIL) ;
            }
        } elseif($type == Ptype::TYPE_S) {
            $pid = $this->input->get_post('id') ;
            $p_status = $this->input->get_post('p_status') ;
            $to_status = $this->input->get_post('to_status') ;
            $p_type = $this->input->get_post('p_type') ;

            $rst = $this->product_model->chang_status($pid, $p_type ,$to_status) ;

            if($rst) {
                h_echo_json(Ecode::OK, array('p_status'=>$to_status)) ;
            } else {
                h_echo_json(Ecode::UPDATE_FAIL) ;
            }
        } else {

        }
    }
}