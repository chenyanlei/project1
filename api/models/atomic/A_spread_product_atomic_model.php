<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午3:21
 */
class A_spread_product_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'a_spread_product_0';
    }

    public function detail_by_id($id) {
        $select = "id, pid, mid" ;
        $where = array("id"=>$id) ;
        return $this->slt_row_arr($where, $select) ;
    }
}