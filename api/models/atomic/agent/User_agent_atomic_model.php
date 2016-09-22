<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/22
 * Time: 下午2:52
 */
class User_agent_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'user_agent_0';
    }

    public function get_agent_list_by_uid($uid) {
        $where = array('recommend_uid' => $uid,'is_del'=> 0) ;

        $select = 'id,uid' ;
        return $this->slt_res_arr($where, $select) ;
    }

    public function del_agent_by_uid($uid) {
        $where = array('uid' => $uid) ;
        $arr = array('is_del'=> 1) ;

        return $this->upd($arr, $where) ;
    }

}