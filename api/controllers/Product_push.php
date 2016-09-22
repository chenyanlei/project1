<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/24
 * Time: 上午11:35
 */
class Product_push extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('product_push_model') ;
    }

    public function get_list() {
        $pn = $this->input->get_post('pn') ;
        $rn = $this->input->get_post('rn') ;

        if($pn < 0) {
            $pn = 0 ;
        }

        if($rn <= 0) {
            $rn = 20 ;
        }

        $rst = $this->product_push_model->get_list($rn, $pn) ;

        if($rst == null || empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function set_recommend() {
        $pid = $this->input->get_post('pid') ;


    }

    public function set_hot() {
        $pid = $this->input->get_post('pid') ;

    }


    public function push_to_all_user() {
        $pid = $this->input->get_post('pid') ;
        $p_type = $this->input->get_post('p_type') ;
        $this->load->model('product_push_model') ;
        $rst = $this->product_push_model->push_to_all_user($pid, $p_type) ;

        if(!$rst) {
            h_echo_json(Ecode::BAD_REQUEST) ;
            return ;
        }
        h_echo_json(Ecode::OK) ;
    }

}