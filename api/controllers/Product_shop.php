<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/6/29
 * Time: 下午12:41
 */
class Product_shop extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atravel_model') ;
    }

    public function all() {
        $uid = $GLOBALS['user_id'];
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 10 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $pids_list = $this->atravel_model->get_pids_by_uid($uid, null/*Ptype::ONE_DAY*/, $rn, $rn * $pn) ;
        if(sizeof($pids_list) == 0) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        $total = $this->atravel_model->get_pids_count($uid, Ptype::ONE_DAY) ;

        foreach($pids_list as $pid) {
            $pids[] = $pid['pid'] ;
        }

        $this->load->model('product_model') ;
        $list = $this->product_model->get_product_list_by_ids($pids,$uid) ;

        $data = array(
            'rn'=>$rn,
            'pn'=>$pn,
            'total'=>$total,
            'pns'=>intval(($total +$rn -1) / $rn ) ,
            'list'=>$list
        ) ;

        return h_echo_json(Ecode::OK, $data) ;
    }

    // 用户获取代理销售中的产品列表
    public function get_agent_product() {
        $uid = $GLOBALS['user_id'];
        $aid = $this->input->get_post("aid") ;
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 10 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $pids_list = $this->atravel_model->get_pids_by_uid($aid, Ptype::ONE_DAY, $rn, $rn * $pn, 1) ;
        if(sizeof($pids_list) == 0) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        $total = $this->atravel_model->get_pids_count($aid, Ptype::ONE_DAY, 1) ;

        foreach($pids_list as $pid) {
            $pids[] = $pid['pid'] ;
        }
        $this->load->model('product_model') ;
        $list = $this->product_model->get_product_list_by_ids($pids,$uid) ;

        $data = array(
            'rn'=>$rn,
            'pn'=>$pn,
            'total'=>$total,
            'pns'=>intval(($total +$rn -1) / $rn ) ,
            'list'=>$list
        ) ;

        return h_echo_json(Ecode::OK, $data) ;
    }

    public function onsale() {
        $uid = $GLOBALS['user_id'];
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 10 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $pids_list = $this->atravel_model->get_pids_by_uid($uid, Ptype::ONE_DAY, $rn, $rn * $pn, 1) ;


        if(sizeof($pids_list) == 0) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        $total = $this->atravel_model->get_pids_count($uid, Ptype::ONE_DAY, 1) ;


        foreach($pids_list as $pid) {
            $pids[] = $pid['pid'] ;
        }
        $this->load->model('product_model') ;
        $list = $this->product_model->get_product_list_by_ids($pids,$uid) ;

        $data = array(
            'rn'=>$rn,
            'pn'=>$pn,
            'total'=>$total,
            'pns'=>intval(($total +$rn -1) / $rn ) ,
            'list'=>$list
        ) ;

        return h_echo_json(Ecode::OK, $data) ;
    }

    public function offline() {
        $uid = $GLOBALS['user_id'];
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 10 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $pids_list = $this->atravel_model->get_pids_by_uid($uid, Ptype::ONE_DAY, $rn, $rn * $pn, 0) ;
        if(sizeof($pids_list) == 0) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        $total = $this->atravel_model->get_pids_count($uid, Ptype::ONE_DAY, 0) ;

        foreach($pids_list as $pid) {
            $pids[] = $pid['pid'] ;
        }
        $this->load->model('product_model') ;
        $list = $this->product_model->get_product_list_by_ids($pids,$uid) ;

        $data = array(
            'rn'=>$rn,
            'pn'=>$pn,
            'total'=>$total,
            'pns'=>intval(($total +$rn -1) / $rn ) ,
            'list'=>$list
        ) ;

        return h_echo_json(Ecode::OK, $data) ;
    }

}