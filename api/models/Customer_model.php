<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/21
 * Time: 下午3:28
 */
class Customer_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function get_list($uid, $pn, $rn) {
        $this->load->model('atomic/order_atomic_model', 'order_atomic_model') ;
        $orders = $this->order_atomic_model->get_order_list_by_uid($uid, 0, 100) ;

        $orders_id = array() ;
        foreach($orders as $order) {
            $orders_id[] = $order['order_id'] ;
        }

        $this->load->model('atomic/order_customer_atomic_model', 'order_customer_atomic_model') ;
        $rst = $this->order_customer_atomic_model->get_list($orders_id, $rn, $pn) ;

        return $rst ;
    }

    public function get_list_by_sql($uid, $pn, $rn) {
        $sql = "SELECT COUNT(id) FROM order_customer_0 WHERE order_id in (select order_id from order_0 where aid='".$uid."')" ;
        $rst_cnt = $this->db->query($sql)->row_array() ;
        $rst = array() ;
        if(!empty($rst_cnt)) {
            $total = intval($rst_cnt['COUNT(id)']);

            $offset = $pn * $rn ;
            if($offset < $total) {
                $rst['total'] = $total;
                $rst['page_num'] = intval($rst['total'] / $rn) + 1  ;
                $rst['cur'] = intval($pn) ;
                $rst['rn'] = intval($rn) ;

                $sql = "SELECT * FROM order_customer_0 WHERE order_id in (select order_id from order_0 where aid='".$uid."') limit ".$offset.','.$rn ;
                $rst['list'] = $this->db->query($sql)->result_array() ;
            }
        }

        return $rst ;
    }

    public function detail($cid) {
        $this->load->model('atomic/order_customer_atomic_model', 'order_customer_atomic_model') ;
        return $this->order_customer_atomic_model->detail($cid) ;
    }







}