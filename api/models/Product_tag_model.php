<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/6/2
 * Time: 下午12:27
 */
class Product_tag_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/product_tags_atomic_model', 'product_tags_atomic_model');
    }

    public function add_tag($uid, $tag_name) {
        $arr = array('create_uid' => $uid, 'tag_name' => $tag_name) ;
        return $this->product_tags_atomic_model->ins($arr) ;
    }

    public function modify_tag($uid, $tag_id, $tag_name) {
        $where = array('id' => $tag_id) ;
        $arr = array('create_uid' => $uid, 'tag_name' => $tag_name) ;
        return $this->product_tags_atomic_model->upd($arr, $where) ;
    }

    public function remove_tag($uid, $tag_id) {

    }

    public function get_all_tags() {
        $select = "id, tag_name" ;
        return $this->product_tags_atomic_model->slt_res_arr(null,$select) ;
    }


}