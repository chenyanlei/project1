<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/24
 * Time: 上午11:35
 */
class Product_material_check extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('aspread_material_model') ;
    }

    public function get_list_all() {
        $rn = $this->input->get_post("rn") ;
        $pn = $this->input->get_post("pn") ;
        $status = $this->input->get_post("status") ;

        if(!isset($status) || $status < 0 || $status > 2) {
            $status = -1 ;
        }
        if(!isset($rn) || $rn < 1) {
            $rn = 20 ;
        }
        if(!isset($pn) || $pn < 1) {
            $pn = 0 ;
        }

        $rst = $this->aspread_material_model->get_list(-1, $rn , $pn, $status) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        h_echo_json(Ecode::OK, $rst) ;
    }

    public function pass() {
        $id = $this->input->get_post("id") ;
        $arr = array("id" => $id, "status"=>Ptype::MATERIAL_STATUS_CHECK_PASS) ;

        $this->load->model('atomic/a_spread_material_atomic_model', 'a_spread_material_atomic_model') ;
        $rst = $this->a_spread_material_atomic_model->ins_or_upd($arr, array("id" => $id)) ;
        if($rst < 0 ) {
            h_echo_json(Ecode::UPDATE_FAIL, array(), "插入或者更新失败") ;
        } else if($rst == 1) {
            h_echo_json(Ecode::OK, array(), "更新成功") ;
        } else if($rst == 2) {
            h_echo_json(Ecode::OK, array(), "插入成功") ;
        }
    }

    public function failed() {
        $id = $this->input->get_post("id") ;
        $arr = array("id" => $id, "status"=>Ptype::MATERIAL_STATUS_CHECK_FAILED) ;
        $this->load->model('atomic/a_spread_material_atomic_model', 'a_spread_material_atomic_model') ;
        $rst = $this->a_spread_material_atomic_model->ins_or_upd($arr, array("id" => $id)) ;
        if($rst < 0 ) {
            h_echo_json(Ecode::UPDATE_FAIL, array(), "插入或者更新失败") ;
        } else if($rst == 1) {
            h_echo_json(Ecode::OK, array(), "更新成功") ;
        } else if($rst == 2) {
            h_echo_json(Ecode::OK, array(), "插入成功") ;
        }
    }

    public function get_list_by_pid() {
        $uid = $GLOBALS['user_id'] ;
        $rn = $this->input->get_post("rn") ;
        $pn = $this->input->get_post("pn") ;
        $pid = $this->input->get_post("pid") ;

        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        if(!isset($rn) || $rn < 1) {
            $rn = 20 ;
        }
        if(!isset($pn) || $pn < 1) {
            $pn = 0 ;
        }

        $where = array("pid" => $pid) ;
        $this->load->model('atomic/a_spread_product_atomic_model', 'a_spread_product_atomic_model') ;
        $cnt = $this->a_spread_product_atomic_model->cnt($where) ;

        $offset = $rn * $pn ;
        if($offset > $cnt) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        $sql = "select a_spread_product_0.id, a_spread_product_0.mid, a_spread_material_0.title, a_spread_material_0.face_img
                from a_spread_product_0,a_spread_material_0
                where a_spread_product_0.pid=".$pid."
                    and a_spread_product_0.mid=a_spread_material_0.id
                order by a_spread_product_0.id"." limit ".$rn * $pn.",".$rn ;

        $this->load->model('atomic/a_spread_atomic_model', 'a_spread_atomic_model');
        $rst =  $this->a_spread_atomic_model->query($sql) ;
        if($rst == null) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        $data = $rst->result_array();
        if(empty($data)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        $arr = array(
            "rn" => $rn,
            "pn" => $pn,
            "total" => $cnt,
            "img_url" => URL_IMG,
            "data" => $data
        ) ;
        h_echo_json(Ecode::OK, $arr) ;
    }


}