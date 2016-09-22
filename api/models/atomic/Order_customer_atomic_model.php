<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午3:21
 */
class Order_customer_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'order_customer_0';
    }

    public function add_customers($order_id, $items) {
        foreach($items as $item) {
            $rst = $this->add_customer($order_id, $item) ;
            if(empty($rst) ) {
                return false ;
            }
        }
        return true;
    }

    public function add_customer($order_id, $item) {
        $item['order_id'] = $order_id ;
        return $this->ins($item) ;
    }

    public function get_contact_by_order_id($order_id) {
        $where = array('order_id' => $order_id) ;
        $select = 'id, name, sex, phone, email, id_card, passport, is_contact, other' ;
        return $this->slt_res_arr($where, $select) ;
    }

    public function get_list($orders_id, $rn, $pn) {
        $where = array("#in#"=>'order_id', "#arr#" =>$orders_id) ;
        $select = 'id,name, sex, phone, email' ;
        $data['total'] = $this->cnt($where) ;
        $data['page_num'] = intval($data['total'] / $rn) + 1  ;
        $data['cur'] = intval($pn) ;
        $data['rn'] = intval($rn) ;

        if($rn * $pn < $data['total']) {
            $data['list'] = $this->slt_res_arr($where, $select,$rn, $rn*$pn)  ;
        }
        return $data ;
    }

    public function detail($cid) {
        $where = array('id' => $cid) ;
        $select = 'id,name, sex, order_id, phone, email, id_card, passport, is_contact, other' ;
        return $this->slt_row_arr($where, $select) ;
    }

    // 修改游客信息
    public function modify($id, $name, $sex, $phone, $email, $id_card, $passport, $other) {
        $where = array('id' => $id) ;
        $data = array() ;

        if(isset($name)) {
            $data['name'] = $name ;
        }
        if(isset($sex)) {
            $data['sex'] = $sex ;
        }
        if(isset($phone)) {
            $data['phone'] = $phone ;
        }
        if(isset($email)) {
            $data['email'] = $email ;
        }
        if(isset($id_card)) {
            $data['id_card'] = $id_card ;
        }
        if(isset($passport)) {
            $data['passport'] = $passport ;
        }
        if(isset($other)) {
            $data['other'] = $other ;
        }

//        var_dump($data) ;
//        var_dump($where) ;

        if(sizeof($data) > 0) {
            return $this->upd($data, $where) ;
        }

        return null ;
    }

}