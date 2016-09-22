<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/08/03
 * Time: 下午5:03
 *
 * 商户信息
 *      商店
 *      酒店
 *      餐厅
 *      购物商店
 */
class Merchant_img_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'merchant_imgs_0';
    }



    public function add($id,$imgs) {     // 添加
        foreach($imgs as $img) {
            $arr[] = array("mid" => $id, "img" => $img) ;
        }

        return $this->ins_batch($arr) ;
    }

    public function get_imgs($id) {
        $where = array("mid" => $id) ;
        $select = "img" ;
        return $this->slt_res_arr($where, $select) ;
    }

}