<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/24
 * Time: 上午11:35
 */
class Product_check extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('product_check_model') ;
    }

    public function get_list() {
        $pn = $this->input->get_post('pn') ;
        $rn = $this->input->get_post('rn') ;
        $status = $this->input->get_post('status') ;

        if(!isset($status)) {
            $status = -1 ;
        }

        if($pn < 0) {
            $pn = 0 ;
        }

        if($rn <= 0) {
            $rn = 20 ;
        }

        $rst = $this->product_check_model->get_list($rn, $pn, $status) ;

        if($rst == null || empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }

        $this->load->model('atomic/a_spread_product_atomic_model', 'a_spread_product_atomic_model') ;
        $data = $rst["data"] ;
        $index = 0 ;
        foreach($data as $item) {
            $where = array("pid"=> $item["id"]) ;
            $rst["data"][$index]["material_cnt"] = $this->a_spread_product_atomic_model->cnt($where) ;
            $index ++ ;
        }

        h_echo_json(Ecode::OK, $rst) ;
    }

    public function detail() {
        $pid = $this->input->get_post('pid') ;
        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $rst = $this->product_check_model->detail($pid) ;

        h_echo_json(Ecode::OK, $rst) ;
    }

    public function check_pass() {
        $pid = $this->input->get_post('pid') ;
        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $rst = $this->product_check_model->check_pass($pid) ;

        h_echo_json(Ecode::OK) ;
    }

    public function check_failed() {
        $pid = $this->input->get_post('pid') ;
        if(!isset($pid)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $rst = $this->product_check_model->check_failed($pid) ;

        if(empty($rst)) {
            h_echo_json(Ecode::UPDATE_FAIL) ;
        } else {
            h_echo_json(Ecode::OK) ;
        }
    }

    public function fill_prices() {
        $params = $this->input->post() ;

        $rst = $this->product_check_model->fill_prices($params) ;

        if(empty( $rst )) {
            h_echo_json(Ecode::UPDATE_FAIL) ;
        } else {
            h_echo_json(Ecode::OK) ;
        }
    }

}