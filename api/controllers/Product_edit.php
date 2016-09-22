<?php

/**
 *
 */
class Product_edit extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/pd_travels_detail_atomic_model', 'pd_travels_detail_atomic_model');
    }


    public function get_day_data() {
        $id = $this->input->get_post("id") ;
        if(!isset($id)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $where = array("id" => $id) ;
        $select = 'id, days, start_name, start_img, end_name, end_img, travel_intro' ;
        $rst = $this->pd_travels_detail_atomic_model->slt_row_arr($where, $select) ;
        if($rst) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

    public function commit_day_data() {
        $str_data =  $this->input->get_post("data",false) ;
        $data = json_decode($str_data, true) ;
        $id = $data["id"] ;
        if(!isset($id)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $start_name = $data["start_name"] ;
        if(!isset($start_name)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $start_img = $data["start_img"] ;
        if(!isset($id)) {
            $start_img ="";
        }
        $end_name = $data["end_name"] ;
        if(!isset($end_name)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $end_img = $data["end_img"] ;
        if(!isset($end_img)) {
            $end_img ="";
        }
        $travel_intro = $data["travel_intro"] ;
        $where = array("id" => $id) ;
        $arr = array(
            "start_name"=>$start_name,
            "start_img"=>$start_img,
            "end_name"=>$end_name,
            "end_img"=>$end_img,
            "travel_intro"=>$travel_intro,
        ) ;
        $rst = $this->pd_travels_detail_atomic_model->upd($arr, $where) ;
        if($rst) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL) ;
        }

    }

}