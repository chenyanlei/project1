<?php

/**
 * 需求定制接口
 * User: yake
 * Date: 16/5/23
 * Time: 下午5:00
 */
class Custom extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('custom/custom_model', 'custom_model');
    }

    public function get_my_custom() {
        $uid = $GLOBALS['user_id'] ;
        $rn = $this->input->get_post("rn") ;
        $pn = $this->input->get_post("pn") ;
        if(!isset($rn) || $rn < 1) {
            $rn = 20 ;
        }
        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }
        $rst = $this->custom_model->get_my_custom($uid, $rn , $pn) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
        } else {
            h_echo_json(Ecode::OK, $rst) ;
        }
    }

    public function get_custom_detail() {
        $id = $this->input->get_post("id") ;
        $rst = $this->custom_model->get_custom_detail($id) ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
        } else {
            h_echo_json(Ecode::OK, $rst) ;
        }
    }

    public function commit() {
        $uid = $GLOBALS['user_id'] ;
        $preference     = $this->input->get_post("preference") ;
        $start_date     = $this->input->get_post("start_date") ;
        $person_num     = $this->input->get_post("person_num") ;
        $destination    = $this->input->get_post("destination") ;
        $start_point    = $this->input->get_post("start_point") ;
        $name           = $this->input->get_post("name") ;
        $age            = $this->input->get_post("age") ;
        $sex            = $this->input->get_post("sex") ;
        $phone          = $this->input->get_post("phone") ;
        $other          = $this->input->get_post("other") ;
        $platform       = $this->input->get_post("platform") ;
        $days       = $this->input->get_post("days") ;

        if(!isset($preference)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "1") ;
            return ;
        }
        if(!isset($start_date)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "2") ;
            return ;
        }
        if(!isset($person_num)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "3") ;
            return ;
        }
        if(!isset($destination)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "4") ;
            return ;
        }
        if(!isset($start_point)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "5") ;
            return ;
        }
        if(!isset($name)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "6") ;
            return ;
        }
        if(!isset($age)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "7") ;
            return ;
        }
        if(!isset($sex)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "8") ;
            return ;
        }
        if(!isset($phone)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "9") ;
            return ;
        }
        if(!isset($days)) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), "10") ;
            return ;
        }

        $rst = $this->custom_model->add($uid, $preference, $start_date, $person_num, $destination, $start_point, $name, $age, $sex, $phone, $other,$days) ;
        if(!empty($rst)) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::INSERT_FAIL) ;
        }

        // 通知供应商
        if(isset($platform) && $platform == "wx") {
            $this->custom_model->notify_to_suppliyer($uid, $preference, $start_date, $person_num, $destination, $start_point, $name, $age, $sex, $phone, $other) ;
        }
    }

}