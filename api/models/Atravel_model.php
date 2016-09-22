<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/25
 * Time: 下午8:27
 */
class Atravel_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/a_p_travels_atomic_model', 'a_p_travels_atomic_model');
    }

    public function get_pids_by_uid($uid, $p_type, $limit, $offset, $status =-1) {
        $select = 'pid,status';
        $where = array('uid' => $uid) ;
        if(isset($p_type) && $p_type != '') {
//            $where['p_type'] = $p_type ;
        }
        if($status != -1) {
            $where['status'] = $status ;
        }

        return $this->a_p_travels_atomic_model->slt_res_arr($where, $select, $limit, $offset) ;
    }

    public function get_pids_count($uid, $p_type, $status =-1) {
//        $where = array('uid' => $uid, 'p_type' => $p_type) ;
        $where = array('uid' => $uid) ;
        if($status != -1) {
            $where['status'] = $status ;
        }
        return $this->a_p_travels_atomic_model->cnt($where) ;
    }



}