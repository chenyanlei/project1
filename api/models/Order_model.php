<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午3:19
 */
class Order_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/order_atomic_model', 'order_atomic');
        $this->load->model('atomic/order_status_atomic_model', 'order_status_atomic');
    }

    public function create_order($aid, $uid, $pid, $p_type, $num, $date, $contact) {
        $total_fee = 0 ;
        $unit_price = 0 ;
        $title = '' ;
        $this->db->trans_start() ;

//        $aid = $uid ;
        $this->_get_order_price($title, $unit_price, $total_fee, $p_type, $pid, $uid, $uid, $date, $num) ;
        $order_id = $this->generate_order_id($pid,$p_type) ;

        $order = array(
                        'uid'  => $uid,
                        'aid'  => $aid,
                        'order_id' => $order_id,
                        'pid' => $pid,
                        'title' => $title,
                        'p_type' => $p_type ,
                        'travel_date' => $date,
                        'total_fee' => $total_fee,
                        'unit_price' => $unit_price,
                        'num' => $num ,
                        'status' => Ptype::ORDER_STATUS_WILL_PAY
        ) ;

        $rst = $this->order_atomic->ins($order) ;
//        if(empty($rst)) {
//            $this->db->trans_complete();
//            return Ecode::INSERT_FAIL ;
//        }

        $order['title'] = $title;

        // 插入订单状态为提交订单
        $status = $this->order_status_atomic->add_order_status( $order_id, Ptype::ORDER_STATUS_WILL_PAY, $desc='待支付') ;
//        if($status != null) {
//            $order['order_status'] = $status ;
//        }

        // 插入客户信息
        $this->load->model('atomic/order_customer_atomic_model', 'order_customer_atomic');
        $rst = $this->order_customer_atomic->add_customers($order_id, $contact) ;
//        if($rst) {
//            $order['contact'] = $contact ;
//        }

        $this->db->trans_complete();

        if($this->db->trans_status()  === FALSE) {
            return Ecode::INSERT_FAIL;
        }

        return $order_id ;
    }

    public function get_a_order_list($aid, $rn, $pn,$time_span,$order_id,$min_fee,$max_fee,$status){
        $time_start = '' ;
        $time_end = '' ;
        if(isset($time_span) ) {
            $arr = explode('@',$time_span) ;
            if(sizeof($arr) == 2) {
                $time_start = '"'.$arr[0].' 00:00:00"' ;
                $time_end = '"'.$arr[1].' 23:59:59"' ;
            }
        }
        

        $total = $this->order_atomic->get_aid_order_total($aid,$time_start,$time_end,$order_id,$min_fee,$max_fee,$status) ;
        if( $pn  * $rn >= $total) {
            return null ;
        }

        $data = $this->order_atomic->get_order_list_by_aid($aid, $rn * $pn, $rn,$time_start,$time_end,$order_id,$min_fee,$max_fee,$status) ;
        if(empty($data)) {
            return null ;
        }

//        foreach($data as $item) {
//            $order_ids[] = $item['order_id'];
//        }
//
//        $orders_status = $this->order_status_atomic->get_orders_cur_status($order_ids) ;
//        $index = 0 ;
//        foreach($orders_status as $order_status) {
//            $data[$index]['status'] = $order_status['status'] ;
//            $data[$index]['commission']='1'; // TODO 计算佣金
//            $index ++ ;
//        }
//        var_dump($orders_status) ;


        return array('total' => $total, 'cur' => $pn, 'rn' => $rn , 'data' => $data) ;
    }

    public function get_sp_order_list($uid, $rn, $pn,$time_span){
        $time_start = '' ;
        $time_end = '' ;
        if(isset($time_span) ) {
            $arr = explode('@',$time_span) ;
            if(sizeof($arr) == 2) {
                $time_start = $arr[0] ;
                $time_end = $arr[1] ;

                $time_start .= "  00:00:00" ;
                $time_end .= "  23:59:59" ;
            }
        }

        $total = $this->order_atomic->get_sp_order_total($uid,$time_start,$time_end) ;
        if( $pn  * $rn >= $total) {
            return null ;
        }

        $data = $this->order_atomic->get_order_list_by_sp($uid, $rn * $pn, $rn,$time_start,$time_end) ;
        if(empty($data)) {
            return null ;
        }

        foreach($data as $item) {
            $order_ids[] = $item['order_id'];
        }

        $orders_status = $this->order_status_atomic->get_orders_cur_status($order_ids) ;
        $index = 0 ;
        foreach($orders_status as $order_status) {
            $data[$index]['status'] = $order_status['status'] ;
            $index ++ ;
        }
//        var_dump($orders_status) ;


        return array('total' => $total, 'cur' => $pn, 'rn' => $rn , 'data' => $data) ;
    }

    // 超级用户权限
    public function get_all_order($rn , $pn, $time_span, $status) {
        $time_start = '' ;
        $time_end = '' ;
        if(isset($time_span) ) {
            $arr = explode('@',$time_span) ;

            if(sizeof($arr) == 2) {
                $time_start = $arr[0] ;
                $time_end = $arr[1] ;

                $time_start .= "  00:00:00" ;
                $time_end .= "  23:59:59" ;
            }
        }

        $total = $this->order_atomic->get_all_order_total($time_start,$time_end, $status) ;
        if( $pn  * $rn >= $total) {
            return null ;
        }

        $data = $this->order_atomic->get_all_order_list($rn * $pn, $rn,$time_start,$time_end, $status) ;
        if(empty($data)) {
            return null ;
        }

        foreach($data as $item) {
            $order_ids[] = $item['order_id'];
        }

        $orders_status = $this->order_status_atomic->get_orders_cur_status($order_ids) ;
        $index = 0 ;
        foreach($orders_status as $order_status) {
            $data[$index]['status'] = $order_status['status'] ;
            $index ++ ;
        }
//        var_dump($orders_status) ;

        $page_num = intval(($total -1) / $rn +1);

        return array('total' => $total, 'cur' => $pn, 'rn' => $rn , 'page_num'=>$page_num, 'data' => $data) ;


    }

    public function get_order_list($uid, $rn , $pn, $time_span) {
        $time_start = '' ;
        $time_end = '' ;
        if(isset($time_span) ) {
            $arr = explode('@',$time_span) ;

            if(sizeof($arr) == 2) {
                $time_start = $arr[0] ;
                $time_end = $arr[1] ;

                $time_start .= "  00:00:00" ;
                $time_end .= "  23:59:59" ;
            }
        }

//        var_dump($time_span) ;

//        echo "$time_start" ;
//        echo "<br />" ;
//        echo "$time_end" ;
//        echo "<br />" ;

        $total = $this->order_atomic->get_uid_order_total($uid,$time_start,$time_end) ;
        if( $pn  * $rn >= $total) {
            return null ;
        }

        $data = $this->order_atomic->get_order_list_by_uid($uid, $rn * $pn, $rn,$time_start,$time_end) ;
        if(empty($data)) {
            return null ;
        }

        foreach($data as $item) {
            $order_ids[] = $item['order_id'];
        }

        $orders_status = $this->order_status_atomic->get_orders_cur_status($order_ids) ;
        $index = 0 ;
        foreach($orders_status as $order_status) {
            $data[$index]['status'] = $order_status['status'] ;
            $index ++ ;
        }
//        var_dump($orders_status) ;


        return array('total' => $total, 'cur' => $pn, 'rn' => $rn , 'data' => $data) ;
    }

    public function get_order_detail($order_id) {

        // 获取基本信息
        $rst = $this->order_atomic->get_order_base($order_id) ;
        if(empty($rst)) {
            return null;
        }

        // 获取状态信息
        $rst['order_status'] = $this->order_status_atomic->get_status_by_order_id($order_id) ;
        $rst['order_cur_status'] = $rst['order_status'][sizeof($rst['order_status']) - 1] ;

        // 获取联系人
        $this->load->model('atomic/order_customer_atomic_model', 'order_customer_atomic');
        $rst['contact'] = $this->order_customer_atomic->get_contact_by_order_id($order_id) ;

        return $rst ;
    }

    public function get_order_cur_status($order_id) {
        return $this->order_status_atomic->get_order_cur_status($order_id) ;
    }

    public function modify_order_status($uid, $order_id, $cur_status, $to_status, $description, $pay_type='') {

        if(!$this->user_can_modify($uid, $order_id)) {
            return false ;
        }

        if(!$this->status_can_modify($cur_status, $to_status)) {
            return false ;
        }

        // 更新当前状态
        $this->order_atomic->update_status($order_id, $to_status) ;

        if(! empty($this->order_status_atomic->add_order_status($order_id, $to_status, $pay_type!=''?$pay_type:$description)) )  {
            return true ;
        }
        return false ;
    }

    public function modify_customer_info($uid, $order_id, $customer_id, $name, $sex, $phone, $email, $id_card, $passport, $other) {
        if(!$this->user_can_modify($uid, $order_id)) {
            return false ;
        }

        $this->load->model('atomic/order_customer_atomic_model', 'order_customer_atomic');
        $rst = $this->order_customer_atomic->modify($customer_id, $name, $sex, $phone, $email, $id_card, $passport, $other) ;
        if($rst != null && !empty($rst)) {
            return true;
        }
        return false ;
    }

    // 用户是否有修改权限
    private function user_can_modify($uid, $order_id) {
        // TODO

        return true ;
    }

    private function status_can_modify($cur_status, $to_status) {
        // TODO

        return true ;
    }


    private function _get_order_price(&$title,&$unit_price, &$total_fee, $p_type, $pid, $uid, $aid, $date, $num) {
        // 获取产品详情
        $this->load->model('product_model') ;
        $p_detail = $this->product_model->detail($pid, $uid, $aid, $p_type) ; // TODO 使用uid为0， 要修改成$uid
        $title = $p_detail['title'];

//        var_dump($date) ;

//        var_dump($p_detail) ;

        if($p_detail['calendar_type'] == Ptype::CALENDAR_TYPE_FULL_YEAR) {
            $price = $p_detail['prices'][0] ;
            $unit_price = $price['price1'] ;
        } else if($p_detail['calendar_type'] == Ptype::CALENDAR_TYPE_A_PERIOD) {
            $unit_price = -1;
            for($i=0;$i< sizeof($p_detail['prices']) ; $i++) {
                $price = $p_detail['prices'][$i];
                if($date > $price['calendar_from'] && $date <= $price['calendar_to'] ) {
                    $unit_price =  $price['price1'];
                    break ;
                }
            }
        } else {

//            var_dump($date) ;
            $cur_date = intval((intval($date) +1) / 86400) ;
//            var_dump($cur_date) ;
            $cur_date_from = $cur_date * 86400 + 57600;  // 转换到北京时间
            $cur_date_to = ($cur_date+1) * 86400 + 57600;
            $unit_price = -1;
//            var_dump($cur_date) ;
//            var_dump($cur_date_from) ;
//            var_dump($cur_date_to) ;

//            var_dump($p_detail['prices']) ;

            for($i=0;$i< sizeof($p_detail['prices']) ; $i++) {
                $price = $p_detail['prices'][$i];
                if($cur_date_from <= $price['calendar_from'] && $cur_date_to >= $price['calendar_from']){
                    $unit_price =  $price['price1'];
                    break ;
                }
            }
        }

        $total_fee = $unit_price * $num ;
    }

    private function generate_order_id($pid, $p_type) {
//        $order_id = $pid.''.time().$p_type.'' ;
        $order_id = date('Ymd', time()) ;
        $order_id .= time().$pid.$p_type ;
//        return base64_encode($order_id) ;
        return $order_id ;
    }

    public function chargeback($uid, $order_id, $mark) {
        $detail = $this->get_order_detail($order_id) ;
        if(empty($detail)) {
            return false ;
        }

        if(!$this->_order_can_cancel($order_id)) {
            return false ;
        }

        if($uid != $detail['uid']) {
            if(!$this->_user_author_agent()) {  // 是否授权
                return false ;
            }
        }

        // 获取当前订单状态
        $cur_status = $this->get_order_cur_status($order_id) ;

        // 修改订单，并返回修改结果
        $rst =  $this->modify_order_status($uid, $order_id, $cur_status, Ptype::ORDER_STATUS_REFUND_CHECHING, "退款审核中".",".$mark) ;

        // 通知
        if($rst) {
            $this->_order_chargeback_notify($order_id, $uid, $detail['aid']) ;
        }

        return $rst ;
    }


    // 取消订单，
    //   1. 要判断订单是否是自己的，如果不是自己的订单， 不能取消. 则只有代理或者平台方可以取消
    //   2. 订单是否可以取消？ 如果不能取消的话，则返回取消失败
    //   3. 订单在未支付状态下，可以随时取消
    public function cancel($uid, $order_id, $mark) {

        $detail = $this->get_order_detail($order_id) ;
        if(empty($detail)) {
            return false ;
        }

        if(!$this->_order_can_cancel($order_id)) {
            return false ;
        }

        if($uid != $detail['uid']) {
            if(!$this->_user_author_agent()) {  // 是否授权
                return false ;
            }
        }

        // 获取当前订单状态
        $cur_status = $this->get_order_cur_status($order_id) ;

        // 修改订单，并返回修改结果
        $rst =  $this->modify_order_status($uid, $order_id, $cur_status, Ptype::ORDER_STATUS_CANCELED, "订单取消". ",".$mark ) ;

        // 通知
        if($rst) {
            $this->_order_cancel_notify($order_id, $uid, $detail['aid']) ;
        }

        return $rst ;
    }

    // 用户是否授权代理修改
    private function _user_author_agent() {
        // TODO 添加用户授权

        return true ;
    }

    private function  _order_chargeback_notify($order_id, $uid, $aid) {
        // 通知用户
        // 根据uid获取用户详情
        $this->load->model('user_model') ;
        $user_info = $this->user_model->get_user_infor_by_uid($uid) ;

        if( !empty($user_info) ) {
            $phone = $user_info['mobile'] ;
            $email = $user_info['email'];
            $email_content = $this->_generate_order_chargeback_email_content($order_id);
            $sms_content = $this->_generate_order_chargeback_sms_content($order_id) ;
            $email_title = '退款申请' ;
            $this->load->model('notify_model') ;
            $this->notify_model->set_phone($phone) ;
            $this->notify_model->set_sms_content($sms_content) ;
            $this->notify_model->set_to_email($email) ;
            $this->notify_model->set_email_title($email_title) ;
            $this->notify_model->set_email_content($email_content) ;
//            $this->notify_model->set_notify_type(Ptype::NOTIFY_TYPE_SMS | Ptype::NOTIFY_TYPE_EMAIL | Ptype::NOTIFY_TYPE_STATION_LETTER) ;
            $this->notify_model->set_notify_type(Ptype::NOTIFY_TYPE_EMAIL | Ptype::NOTIFY_TYPE_STATION_LETTER) ;
            $this->notify_model->notify() ;
        }

        // 如果用户和代理商不是一个人，通知代理商
        if($uid != $aid) {
            $agent_info = $this->user_model->get_user_infor_by_uid($aid) ;
            if( !empty($agent_info) ) {
                $phone = $agent_info['mobile'] ;
                $email = $agent_info['email'];
                $email_content = $this->_generate_order_chargeback_email_content($order_id);
                $sms_content = $this->_generate_order_chargeback_sms_content($order_id) ;
                $email_title = '退款申请' ;
                $this->load->model('notify_model') ;
                $this->notify_model->set_phone($phone) ;
                $this->notify_model->set_sms_content($sms_content) ;
                $this->notify_model->set_to_email($email) ;
                $this->notify_model->set_email_title($email_title) ;
                $this->notify_model->set_email_content($email_content) ;
//                $this->notify_model->set_notify_type(Ptype::NOTIFY_TYPE_SMS | Ptype::NOTIFY_TYPE_EMAIL | Ptype::NOTIFY_TYPE_STATION_LETTER) ;
                $this->notify_model->set_notify_type(Ptype::NOTIFY_TYPE_EMAIL | Ptype::NOTIFY_TYPE_STATION_LETTER) ;
                $this->notify_model->notify() ;
            }
        }
    }

    private function _order_cancel_notify($order_id, $uid, $aid) {

        // 通知用户
        // 根据uid获取用户详情
        $this->load->model('user_model') ;
        $user_info = $this->user_model->get_user_infor_by_uid($uid) ;

        if( !empty($user_info) ) {
            $phone = $user_info['mobile'] ;
            $email = $user_info['email'];
            $email_content = $this->_generate_order_cancel_email_content($order_id);
            $sms_content = $this->_generate_order_cancel_sms_content($order_id) ;
            $email_title = '取消订单' ;
            $this->load->model('notify_model') ;
            $this->notify_model->set_phone($phone) ;
            $this->notify_model->set_sms_content($sms_content) ;
            $this->notify_model->set_sms_type(Ptype::SMS_TYPE_ORDER_CANCEL) ;
            $this->notify_model->set_to_email($email) ;
            $this->notify_model->set_email_title($email_title) ;
            $this->notify_model->set_email_content($email_content) ;
            $notify_type = Ptype::NOTIFY_TYPE_STATION_LETTER ;
            if(!empty($phone)) {
                $notify_type |= Ptype::NOTIFY_TYPE_SMS;
            }
            if(!empty($email)) {
                $notify_type |= Ptype::NOTIFY_TYPE_EMAIL;
            }
            $this->notify_model->set_notify_type($notify_type) ;
            $this->notify_model->notify() ;
        }

        // 如果用户和代理商不是一个人，通知代理商
        if($uid != $aid) {
            $agent_info = $this->user_model->get_user_infor_by_uid($aid) ;
            if( !empty($agent_info) ) {
                $phone = $agent_info['mobile'] ;
                $email = $agent_info['email'];
                $email_content = $this->_generate_order_cancel_email_content($order_id);
                $sms_content = $this->_generate_order_cancel_sms_content($order_id) ;
                $email_title = '取消订单' ;
                $this->load->model('notify_model') ;
                $this->notify_model->set_phone($phone) ;
                $this->notify_model->set_sms_content($sms_content) ;
                $this->notify_model->set_sms_type(Ptype::SMS_TYPE_ORDER_CANCEL) ;
                $this->notify_model->set_to_email($email) ;
                $this->notify_model->set_email_title($email_title) ;
                $this->notify_model->set_email_content($email_content) ;
//                $this->notify_model->set_notify_type(Ptype::NOTIFY_TYPE_SMS | Ptype::NOTIFY_TYPE_EMAIL | Ptype::NOTIFY_TYPE_STATION_LETTER) ;
                $notify_type = Ptype::NOTIFY_TYPE_STATION_LETTER ;
                if(!empty($phone)) {
                    $notify_type |= Ptype::NOTIFY_TYPE_SMS;
                }
                if(!empty($email)) {
                    $notify_type |= Ptype::NOTIFY_TYPE_EMAIL;
                }
                $this->notify_model->set_notify_type($notify_type) ;
                $this->notify_model->notify() ;
            }
        }
    }

    private function _order_can_cancel($order_id) {
        // TODO 添加订单是否可以被取消的逻辑

        return true ;
    }

    private function _generate_order_cancel_sms_content($order_id) {
        $this->load->model('sms_model') ;
        return $this->sms_model->generate_order_cancel_sms_content($order_id) ;
    }

    private function _generate_order_cancel_email_content($order_id) {

        return "您的订单号为".$order_id."的订单已取消，" ;
    }

    private function _generate_order_chargeback_sms_content($order_id) {
        $this->load->model('sms_model') ;
        return $this->sms_model->generate_order_chargeback_sms_content($order_id) ;
    }

    private function _generate_order_chargeback_email_content($order_id) {
        return "您的订单号为".$order_id."的订单提交退款申请，我们会尽快审核，预计3个工作日完成您的退款审核，请耐心等待。" ;
    }

    // 订单退款审核通过
    public function refund_check_pass($uid, $order_id) {
        // 获取当前订单状态
        $cur_status = $this->get_order_cur_status($order_id) ;

        // 修改订单，并返回修改结果
        $rst =  $this->modify_order_status($uid, $order_id, $cur_status, Ptype::ORDER_STATUS_REFUNDING, "订单退款审核通过") ;

        return $rst ;
    }

    // 订单退款审核不通过
    public function refund_check_failure($uid, $order_id, $reason='') {
        // 获取当前订单状态
        $cur_status = $this->get_order_cur_status($order_id) ;

        // 修改订单，并返回修改结果
        $rst =  $this->modify_order_status($uid, $order_id, $cur_status, Ptype::ORDER_STATUS_REFUND_FAILED, "订单退款审核失败".',原因：'.$reason) ;

        return $rst ;
    }

    // 订单退款审核不通过
    public function refund_finished($uid, $order_id) {
        // 获取当前订单状态
        $cur_status = $this->get_order_cur_status($order_id) ;

        // 修改订单，并返回修改结果
        $rst =  $this->modify_order_status($uid, $order_id, $cur_status, Ptype::ORDER_STATUS_REFUNDED, "退款完成") ;

        return $rst ;
    }

    public function order_delete($uid, $order_id) {
        // 获取基本信息
        $rst = $this->order_atomic->get_order_base($order_id) ;
        if( empty($rst) ) {
            return 1 ;
        }

        if($rst['uid'] != $uid) {
            return 2;
        }

        $rst = $this->order_atomic->set_order_delete( $order_id) ;

        if(empty($rst)) {
            return -1;
        }

        return 0;
    }

}