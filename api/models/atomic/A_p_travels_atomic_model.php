<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午3:21
 */
class A_p_travels_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'a_p_travels_0';
    }

    public function add_item($uid, $pid, $p_type) {
        $where = array('uid' => $uid, 'pid' => $pid) ;
        $select = 'id' ;
        $rst = $this->slt_row_arr($where, $select) ;

        if(!isset($rst['id'])) {
            $where['p_type'] = $p_type ;
            $this->a_p_travels_atomic_model->ins($where) ;
        }
    }

    public function is_exist($pid, $uid) {
        $where = array('pid' => $pid, 'uid'=>$uid) ;
        $select = 'id' ;
        $rst = $this->slt_row_arr($where, $select)  ;
        return isset($rst['id'])?1:0;
    }

    public function is_onsale($pid, $uid) {

//        $where = array('pid' => $pid, 'uid'=>$uid, 'status' => 1) ;
//        $select = 'id' ;
//        $rst = $this->slt_row_arr($where, $select)  ;
//        return isset($rst['id'])?1:0;

        $where = array('pid' => $pid, 'uid'=>$uid) ;
        $select = 'id, status' ;
        $rst = $this->slt_row_arr($where, $select)  ;

        if(isset($rst['id'])) {
            return intval($rst['status']);
        } else {
            return -1 ;
        }
    }

}