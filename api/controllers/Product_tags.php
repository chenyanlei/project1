<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/6/2
 * Time: 上午11:39
 */
class Product_tags extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('product_tag_model') ;

    }

    public function add_tag() {
        $uid = $GLOBALS['user_id'] ;
        $tag_name = $this->input->post('tag_name') ; ;
        $rst = $this->product_tag_model->add_tag($uid, $tag_name) ;
        if(empty($rst)) {
            h_echo_json(Ecode::INSERT_FAIL) ;
            return ;
        }

        h_echo_json(Ecode::OK) ;
    }

    public function get_all_tags() {
        $rst = $this->product_tag_model->get_all_tags() ;
        if(empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function modify_tag() {

    }

    public function remove_tag() {

    }

}