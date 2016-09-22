<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午3:21
 */
class A_spread_material_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'a_spread_material_0';
    }

    public function is_exist($pid, $uid) {
        $where = array('pid' => $pid, 'uid'=>$uid) ;
        $select = 'id' ;
        $rst = $this->slt_row_arr($where, $select)  ;
        return isset($rst['id'])?1:0;
    }


}