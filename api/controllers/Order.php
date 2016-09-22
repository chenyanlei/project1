<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午3:13
 */
class Order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('order_model') ;
    }

    // 创建订单
    public function create_order() {

        // 产品类型
        $p_type = $this->input->post('p_type') ;
        if(!$this->ptype->is_validate($p_type)) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        // 产品id
        $pid = $this->input->post('pid') ;
        if(!isset($pid) || $pid <= 0) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        // 预订个数
        $num = $this->input->post('num') ;
        if(!isset($num) || $num <= 0) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        // 预订日期
        $date = $this->input->post('date') ;
        if(!isset($date) || $date <= 0) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        // 联系人
        $contact = $this->input->post('contact') ;
        if(!isset($contact)) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        // aid 代理商id
        $aid = $this->input->post('aid') ;
        if(!isset($aid) || $aid <= 0) {
            $aid = '0' ;
        }

        $contact = json_decode($contact, true) ;
        $uid = $GLOBALS['user_id'] ;

        $this->load->library('commen') ;
        $date = $this->commen->toUnixTimestamp($date) ;
        $order_id = $this->order_model->create_order($aid, $uid, $pid, $p_type, $num, $date, $contact) ;

        if($order_id === Ecode::INSERT_FAIL) {
            die(h_echo_json(Ecode::INSERT_FAIL, array(), 'create order failed!')) ;
        }

        $rst = $this->order_model->get_order_detail($order_id) ;

        h_echo_json(Ecode::OK, $rst) ;
    }

    public function get_a_order_list() {
        $aid = $this->input->get_post('aid');
        $uid = array();
        if(isset($aid)){
            $uid[] = $aid;
        }else{
            $user_id = $GLOBALS['user_id'];
            $this->load->model('atomic/agent/user_agent_atomic_model', 'user_agent_atomic_model') ;
            $agents = $this->user_agent_atomic_model->get_agent_list_by_uid($user_id) ;
            foreach ($agents as $agent) {
                $uid[] = intval($agent['uid']);
            }
            $uid[] = $GLOBALS['user_id'];
        }


        $rn = $this->input->get_post('rn') ;
        if(!isset($rn) || $rn <= 0) {
            $rn = 20 ;
        }

        $pn = $this->input->get_post('pn') ;
        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }
        $order_id = $this->input->get_post('order_id');
        $min_fee = $this->input->get_post('min_fee');
        $max_fee = $this->input->get_post('max_fee');
        $status = $this->input->get_post('status');
        $time_span = $this->input->get_post('time_span') ;
//        echo $order_id;
        $rst = $this->order_model->get_a_order_list($uid, $rn, $pn,$time_span,$order_id,$min_fee,$max_fee,$status) ;

        if($rst === null || empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
        } else {
//            $str = $this->db->last_query();
//            echo $str;
            h_echo_json(Ecode::OK, $rst) ;
        }
    }

    public function get_sp_order_list() {
        $uid = $GLOBALS['user_id'];

        $rn = $this->input->get_post('rn') ;
        if(!isset($rn) || $rn <= 0) {
            $rn = 20 ;
        }

        $pn = $this->input->get_post('pn') ;
        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $time_span = $this->input->get_post('time_span') ;
        $rst = $this->order_model->get_sp_order_list($uid, $rn, $pn,$time_span) ;

        if($rst === null || empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
        } else {
            h_echo_json(Ecode::OK, $rst) ;
        }
    }

    // 超级用户权限
    public function get_all_order_list() {
        // TODO 添加超级用户权限控制
        $uid = $GLOBALS['user_id'];

        $rn = $this->input->get_post('rn') ;
        if(!isset($rn) || $rn <= 0) {
            $rn = 20 ;
        }

        $pn = $this->input->get_post('pn') ;
        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $status = $this->input->get_post('status') ;

        $time_span = $this->input->get_post('time_span') ;
        $rst = $this->order_model->get_all_order($rn, $pn,$time_span , $status) ;

        if($rst === null || empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
        } else {
            h_echo_json(Ecode::OK, $rst) ;
        }
    }

    public function get_order_list() {
        $uid = $GLOBALS['user_id'];

        $rn = $this->input->get_post('rn') ;
        if(!isset($rn) || $rn <= 0) {
            $rn = 20 ;
        }

        $pn = $this->input->get_post('pn') ;
        if(!isset($pn) || $pn < 0) {
            $pn = 0 ;
        }

        $time_span = $this->input->get_post('time_span') ;
        $rst = $this->order_model->get_order_list($uid, $rn, $pn,$time_span) ;

        if($rst === null || empty($rst)) {
            h_echo_json(Ecode::NO_RESULT) ;
        } else {
            h_echo_json(Ecode::OK, $rst) ;
        }
    }

    public function get_order_detail() {
        $order_id = $this->input->get_post('order_id') ;
        if(!isset($order_id)) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }
        $rst = $this->order_model->get_order_detail($order_id) ;
        if($rst == null) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function get_order_cur_status() {
        $order_id = $this->input->get_post('order_id') ;
        if(!isset($order_id)) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }
        $rst = $this->order_model->get_order_cur_status($order_id) ;
        h_echo_json(Ecode::OK, $rst) ;
    }

    public function modify_order_status() {
        $uid = $GLOBALS['user_id'];
        $order_id = $this->input->get_post('order_id') ;
        $cur_status = $this->input->get_post('cur_status') ;
        $to_status = $this->input->get_post('to_status') ;
        $description = $this->input->get_post('description') ;

        $rst = $this->order_model->modify_order_status($uid, $order_id, $cur_status, $to_status, $description) ;

        if($rst) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL) ;
        }
    }

    /**
     * 批发商订单确认
     */
    public function s_order_confirm() {
        $uid = $GLOBALS['user_id'];
        $order_id = $this->input->get_post('order_id') ;
        $cur_status = $this->input->get_post('cur_status') ;
        //当前状态必须为已支付
        if($cur_status == Ptype::ORDER_STATUS_PAYED) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $to_status = Ptype::ORDER_STATUS_AGREE;
        $description = $this->input->get_post('description') ;
        $rst = $this->order_model->modify_order_status($uid, $order_id, $cur_status, $to_status, $description) ;
        if($rst) {
            h_echo_json(Ecode::OK) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL) ;
        }
    }

    /**
     * 修改游客信息
     * 修改单个游客的信息，根据游客的id来修改
     **/
    public function modify_customer_info() {
        $uid = $GLOBALS['user_id'];
        $order_id = $this->input->get_post('order_id') ;
        $customer_id = $this->input->get_post('customer_id') ;
        $name = $this->input->get_post('name') ;
        $sex = $this->input->get_post('sex') ;
        $phone = $this->input->get_post('phone') ;
        $email = $this->input->get_post('email') ;
        $id_card = $this->input->get_post('id_card') ;
        $passport = $this->input->get_post('passport') ;
        $other = $this->input->get_post('other') ;

        $rst = $this->order_model->modify_customer_info($uid, $order_id, $customer_id, $name, $sex, $phone, $email, $id_card, $passport, $other) ;

        h_echo_json($rst ? Ecode::OK : Ecode::UPDATE_FAIL) ;
    }

    // 取消订单
    public function cancel() {
        $order_id = $this->input->get_post('order_id') ;
        $reason = $this->input->get_post('reason') ;
        $desc = $this->input->get_post('desc') ;

        if(!isset($reason)) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        if(!isset($order_id)) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        $mark = $reason ;
        if(isset($desc)) {
            $mark .= ".".$desc ;
        }

        $uid = $GLOBALS['user_id'] ;
        $rst = $this->order_model->cancel($uid, $order_id,$mark) ;

        if($rst) {
            h_echo_json(Ecode::OK, array() ,'订单取消操作成功' ) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL, array(), '订单取消操作失败') ;
        }
    }

    // 退单
    public function chargeback() {
        $order_id = $this->input->get_post('order_id') ;
        $reason = $this->input->get_post('reason') ;
        $desc = $this->input->get_post('desc') ;

        if(!isset($reason)) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        if(!isset($order_id)) {
            die(h_echo_json(Ecode::C2S_ARG_ERR)) ;
        }

        $mark = $reason ;
        if(isset($desc)) {
            $mark .= ".".$desc ;
        }

        $uid = $GLOBALS['user_id'] ;
        $rst = $this->order_model->chargeback($uid, $order_id,$mark) ;

        if($rst) {
            h_echo_json(Ecode::OK, array() ,'提交订单退款申请，操作成功' ) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL, array(), '提交订单退款申请，操作失败') ;
        }
    }

    // 退款申请通过，后台权限
    public function refund_check_pass() {
        $order_id = $this->input->get_post('order_id') ;
        if(!isset($order_id)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $uid = $GLOBALS['user_id'];
        $rst = $this->order_model->refund_check_pass($uid, $order_id) ;

        if($rst) {
            h_echo_json(Ecode::OK, array() ,'订单退款审核通过，操作成功' ) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL, array(), '订单退款审核通过，操作失败') ;
        }
    }

    // 退款申请失败，后台权限
    public function refund_check_failure() {
        $order_id = $this->input->get_post('order_id') ;
        if(!isset($order_id)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }

        $reason = $this->input->get_post('reason') ;
        $uid = $GLOBALS['user_id'];
        $rst = $this->order_model->refund_check_failure($uid, $order_id, $reason) ;

        if($rst) {
            h_echo_json(Ecode::OK, array() ,'订单退款审核通过，操作成功' ) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL, array(), '订单退款审核未通过，操作失败') ;
        }
    }

    // 退款完成，后台权限
    public function refund_finished() {
        $order_id = $this->input->get_post('order_id') ;
        if(!isset($order_id)) {
            h_echo_json(Ecode::C2S_ARG_ERR) ;
            return ;
        }
        $uid = $GLOBALS['user_id'];
        $rst = $this->order_model->refund_finished($uid, $order_id) ;

        if($rst) {
            h_echo_json(Ecode::OK, array() ,'退款完成，操作成功' ) ;
        } else {
            h_echo_json(Ecode::UPDATE_FAIL, array(), '退款完成，操作失败') ;
        }
    }

    public function delete() {

//        echo "delete 1" ;
//        echo "<br/>" ;
        $uid = $GLOBALS['user_id'] ;
        $order_id = $this->input->get_post('order_id') ;
        $rst = $this->order_model->order_delete($uid, $order_id) ;

//        var_dump($rst) ;
        if($rst === 0) {
            h_echo_json(Ecode::OK) ;
        } elseif($rst === -1) {
            h_echo_json(Ecode::UPDATE_FAIL) ;
        } elseif($rst === 1) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), '该订单不存在或已被删除' ) ;
        } else if($rst === 2) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), '您不能删除该订单') ;
        } else {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), 'unknown') ;
        }
    }



}