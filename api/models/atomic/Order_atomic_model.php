<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午3:21
 */
class Order_atomic_model extends Atomic_model
{
    public function __construct()
    {
        parent::__construct();
        $this->table_name = 'order_0';
        $this->del_field = 'is_del' ;
        $this->real_del = false ;
    }

    public function update_status($order_id, $to_status, $payments=0) {
        $where = array('order_id' => $order_id) ;
        $data = array('status'=>$to_status) ;
        if($payments != 0) {
            $data['payments'] = $payments ;
        }
        return $this->upd($data, $where) ;
    }

    public function get_order_base($order_id) {
        $where = array('order_id' => $order_id) ;
        $select = 'order_id, uid, aid, pid, p_type, travel_date, total_fee, unit_price, num, create_time, title, status' ;
        return $this->slt_row_arr($where, $select) ;
    }

    public function get_uid_order_total($uid,$time_start='',$time_end='') {
        $where = array('uid' => $uid) ;
        if($time_start != '') {
            $where['create_time >='] = $time_start ;
        }
        if($time_end != '') {
            $where['create_time <='] = $time_end ;
        }
        return $this->cnt($where) ;
    }

    public function get_order_list_by_uid($uid, $offset, $rn,$time_start='',$time_end='') {
        $where = array('uid' => $uid) ;
        if($time_start != '') {
            $where['create_time >='] = $time_start ;
        }
        if($time_end != '') {
            $where['create_time <='] = $time_end ;
        }
        $select = 'id,order_id, pid, p_type, travel_date, total_fee, unit_price, num, create_time, title' ;
        return $this->slt_res_arr($where, $select,$rn, $offset) ;
    }

    // aid
    public function get_aid_order_total($aid,$time_start='',$time_end='',$order_id,$min_fee,$max_fee,$status) {
        //$where = array('aid' => $aid) ;
//        $where = array("#in#"=>'aid', "#arr#" =>$aid) ;
        $aid = implode(',',$aid);
        $where = "aid in (".$aid.") ";
        if($time_start != '') {
            $where .= " and create_time >=".$time_start ;
        }
        if($time_end != '') {
            $where .= " and create_time <=".$time_end;
        }
        if($order_id != ''){
            $where .= " and order_id =".$order_id;
        }
        if($min_fee != ''){
            $where .= " and total_fee >=".$min_fee;
        }
        if($max_fee != ''){
            $where .=" and total_fee <=".$max_fee;
        }
        if($status != ''){
            $where .= " and status =".$status;
        }
        return $this->cnt($where) ;
    }

    public function get_order_list_by_aid($aid, $offset, $rn,$time_start='',$time_end='',$order_id,$min_fee,$max_fee,$status) {
//        $where = array("#in#"=>'aid', "#arr#" =>$aid) ;
       // $where = array('aid' => $aid) ;
        $aid = implode(',',$aid);
        $where = "aid in (".$aid.") ";
        if($time_start != '') {
            $where .= " and create_time >=".$time_start ;
        }
        if($time_end != '') {
            $where .= " and create_time <=".$time_end;
        }
        if($order_id != ''){
            $where .= " and order_id =".$order_id;
        }
        if($min_fee != ''){
            $where .= " and total_fee >=".$min_fee;
        }
        if($max_fee != ''){
            $where .=" and total_fee <=".$max_fee;
        }
        if($status != ''){
            $where .= " and status =".$status;
        }

        $total = $this->cnt($where) ;
        $select = 'id,order_id, pid, p_type, travel_date, total_fee, unit_price, num, create_time, title ,status' ;
        $order_by = 'order_id DESC' ;
        $data = '';
        //if( $offset < $total) {
            $data = $this->slt_res_arr($where, $select,$rn, $offset, $order_by) ;
           
        //}

        return $data;
    }

    // s、p
    public function get_sp_order_total($uid,$time_start='',$time_end='') {
        $sql = 'select count(*) from '.$this->table_name.' where pid in (select id from p_travels_0 where uid='.$uid.')' ;
        if($time_start != '' ) {
            $sql .= ' and create_time>=\''.$time_start.'\' ' ;
        }

        if($time_end != '') {
            $sql .= ' and create_time <=\''.$time_end.'\' ' ;
        }
//        $sql = 'select count(*) from '.$this->table_name.' where pid in (select id from p_travels_0 where uid='.$uid.
//              ') and create_time>=\''.$time_start.'\'  and create_time <=\''.$time_end.'\'' ;

        $query = $this->db->query($sql) ;
        $row = $query->row_array();
        if(isset($row)) {
            return $row['count(*)'];
        }
        return 0;
    }

    public function get_order_list_by_sp($uid, $offset, $rn,$time_start='',$time_end='') {
//        $sql = 'select id,order_id, pid, p_type, travel_date, total_fee, unit_price, num, create_time, title from '
//            .$this->table_name.' where pid in (select id from p_travels_0 where uid='.$uid.') and create_time>=\''
//            .$time_start.'\'  and create_time <=\''.$time_end.'\' limit '.$offset.','.$rn ;

        $sql =  'select id,order_id, pid, p_type, travel_date, total_fee, unit_price, num, create_time, title from '
            .$this->table_name.' where pid in (select id from p_travels_0 where uid='.$uid.')' ;
        if($time_start != '' ) {
            $sql .= ' and create_time>=\''.$time_start.'\'' ;
        }

        if($time_end != '') {
            $sql .= 'and create_time <=\''.$time_end.'\'' ;
        }

        $sql .= ' limit '.$offset.','.$rn ;
        $sql .= 'order by order_id DESC' ;
        $query = $this->db->query($sql) ;

        return $query->result_array() ;
    }

    public function get_all_order_total($time_start='',$time_end='', $status='') {
        $where = array() ;
        if($time_start != '') {
            $where['create_time >='] = $time_start ;
        }
        if($time_end != '') {
            $where['create_time <='] = $time_end ;
        }

        if($status != '') {
            $where['status'] = $status ;
        }
        return $this->cnt($where) ;
    }

    public function get_all_order_list($offset, $rn,$time_start='',$time_end='', $status='') {
        $select =  'id,order_id, pid, p_type, travel_date, total_fee, unit_price, num, create_time, title ' ;
        $where = array() ;
        if($time_start != '' ) {
            $where['create_time>='] = $time_start ;
        }

        if($time_end != '') {
            $where['create_time<='] = $time_end ;
        }

        if($status != '') {
            $where['status'] = $status ;
        }
        $order_by = 'order_id DESC' ;

        return $this->slt_res_arr($where, $select, null, null, $order_by);
    }

    // 设置为删除状态
    public function set_order_delete($order_id) {
        $where = array('order_id' => $order_id) ;
        $data = array('is_del' => 1) ;

        return $this->upd($data, $where) ;
    }
}