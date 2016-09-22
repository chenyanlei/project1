<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/29
 * Time: 下午5:01
 *
 * 商店商品
 */
class Goods_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    //        $this->load->model('atomic/product_atomic_model', 'product_atomic');
    //        $this->load->model('atomic/user_product_atomic_model', 'user_product_atomic');
    //        $this->load->model('product_img_index_model', 'product_img_index_model');
    }

    public function get_list($uid,$pn,$rn,$p_type=0) {

        return array() ;
    }


    public function add($data=null) {     // 添加



    }

    public function modify($data=null) {  // 修改

    }

    public function del($data=null) {     // 删除

    }

    public function find($data=null) {    // 查找

    }



}