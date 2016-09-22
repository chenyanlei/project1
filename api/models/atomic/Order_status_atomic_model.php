<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午3:21
 */
class Order_status_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'order_status_0';
    }

    public function add_order_status($order_id, $status, $desc='') {
        $ary = array('order_id' => $order_id, 'status' => $status, 'description' => $desc, 'time' => time()) ;
        $rst = $this->ins($ary) ;
        if(!empty($rst)) {
            unset($ary['order_id']) ;
            return $ary;
        }
        return null ;
    }

    public function get_status_by_order_id($order_id)  {
        $where = array('order_id' => $order_id) ;
        $select = 'time, status, description' ;
        return $this->slt_res_arr($where, $select) ;
    }

    public function get_order_cur_status($order_id) {
        $where = array('order_id' => $order_id) ;
        $select = 'status, description' ;
        $order_by = 'time desc' ;
        $rst = $this->slt_row_arr($where, $select, $order_by) ;
        if(!empty($rst)) {
            return $rst['status'];
        }

        return null ;
    }

    // TODO 需优化
    public function get_orders_cur_status($order_ids) {
        foreach($order_ids as $order_id) {
            $rst[]['status'] = $this->get_order_cur_status($order_id) ;
        }
        return $rst ;
//        $where = array("#in#"=>'order_id' ,'#arr#' => $order_ids) ;
//        $select = 'order_id,status, description' ;
//        $order_by = 'time desc' ;
//        $group_by = 'order_id' ;
//        $rst = $this->slt_res_arr($where, $select,null,null, $order_by, $group_by) ;
//        if(!empty($rst)) {
//            return $rst;
//        }
//
//        return null ;
    }

    public function order_is_payed($order_id) {
        $status = $this->get_order_cur_status($order_id) ;
        if($status == Ptype::ORDER_STATUS_PAYED) {
            return true ;
        }
        return false ;
    }
}