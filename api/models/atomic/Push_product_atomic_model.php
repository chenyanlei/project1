<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午3:21
 */
class Push_product_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'push_product_0';
    }

    public function add_one_push_msg($pid, $push_type) {
        $where = array('pid' => $pid, 'push_type' => $push_type) ;
        $select = 'id, push_time, push_type, pid' ;
        $rst = $this->slt_row_arr($where, $select) ;
        if(empty($rst)) {
            $rst = $this->ins($where) ;
            if(empty($rst)) {
                return -1;
            }

            return 0;
        }

        return 1;
    }


}