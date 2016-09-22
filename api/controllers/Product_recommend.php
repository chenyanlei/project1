<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/24
 * Time: 上午11:35
 */
class Product_recommend extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('atomic/pd_travels_atomic_model', 'pd_travels_atomic_model') ;
    }

    public function get_list() {
        $pn = $this->input->get_post('pn') ;
        $rn = $this->input->get_post('rn') ;

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        if(!isset($rn) || $rn <= 0) {
            $rn = 20 ;
        }

        $select = "id, uid, title, continent, country, city, lang, p_type, p_status, price_type, calendar_type,is_recommend, is_hot" ;
        $rst = $this->pd_travels_atomic_model->slt_res_arr(null, $select, $rn, $pn * $pn) ;
        $cnt = $this->pd_travels_atomic_model->cnt(null) ;

        $arr = array(
            'cur'=>$pn,
            'page_num'=> intval(($cnt  + $rn -1 )/ $rn) ,
            'rn'=>$rn,
            'pn'=>$pn,
            'data'=>$rst
        );

        if($rst == null || empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $arr) ;
    }

    public function set_recommend() {
        $pid = $this->input->get_post('pid') ;
        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $where = array("id"=>$pid) ;
        $arr = array("is_recommend"=>1, "time_recommend"=>time()) ;
        $rst = $this->pd_travels_atomic_model->upd($arr,$where);
        if($rst > 0) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::INSERT_FAIL) ;
        }
    }

    public function set_cancel_recommend() {
        $pid = $this->input->get_post('pid') ;
        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $where = array("id"=>$pid) ;
        $arr = array("is_recommend"=>0, "time_recommend"=>time()) ;
        $rst = $this->pd_travels_atomic_model->upd($arr,$where);
        if($rst > 0) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::INSERT_FAIL) ;
        }
    }

    public function set_hot() {
        $pid = $this->input->get_post('pid') ;
        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $where = array("id"=>$pid) ;
        $arr = array("is_hot"=>1, "time_hot"=>time()) ;
        $rst = $this->pd_travels_atomic_model->upd($arr,$where);
        if($rst > 0) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::INSERT_FAIL) ;
        }
    }

    public function set_cancel_hot() {
        $pid = $this->input->get_post('pid') ;
        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $where = array("id"=>$pid) ;
        $arr = array("is_hot"=>0, "time_hot"=>time()) ;
        $rst = $this->pd_travels_atomic_model->upd($arr,$where);
        if($rst > 0) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::INSERT_FAIL) ;
        }
    }

}