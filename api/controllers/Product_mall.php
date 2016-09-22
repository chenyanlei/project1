<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/6/25
 * Time: 下午3:13
 */
class Product_mall extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('product_mall_model') ;
    }

    public function recommend() {
        $uid = $GLOBALS['user_id'];
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 24 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }
        $is_hot = false ;

        $rst = $this->product_mall_model->filter($rn,$pn,$is_hot,$uid) ;
        if(is_array($rst)) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

    public function hot() {
        $uid = $GLOBALS['user_id'];
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 24 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }
        $is_hot = true ;
        $rst = $this->product_mall_model->filter($rn,$pn,$is_hot,$uid) ;
        if(is_array($rst)) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

    public function all() {
        $uid = $GLOBALS['user_id'];
        $rn = $this->input->get_post('rn') ;
        $pn = $this->input->get_post('pn') ;
        if(!isset($rn) || $rn < 1) {
            $rn = 24 ;
        }

        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $classify = $this->input->get_post('classify') ;
        if(Ptype::PRODUCT_CLASSIFY_FREE_IN != $classify && Ptype::PRODUCT_CLASSIFY_GROUP_IN != $classify && Ptype::PRODUCT_CLASSIFY_GROUP != $classify && Ptype::PRODUCT_CLASSIFY_FREE != $classify ) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $continent = $this->input->get_post('continent') ;
        $country = $this->input->get_post('country') ;
        $city = $this->input->get_post('city') ;
        $tag = $this->input->get_post('tag') ;

        $rst = $this->product_mall_model->all($rn,$pn,$continent, $country, $city, $tag , $uid, $classify) ;
        if(is_array($rst)) {
            h_echo_json(Ecode::OK, $rst) ;
        } else {
            h_echo_json(Ecode::NO_RESULT) ;
        }
    }

}