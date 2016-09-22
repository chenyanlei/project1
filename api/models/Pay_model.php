<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/21
 * Time: 下午3:28
 */
class Pay_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('atomic/pay_atomic_model', 'pay_atomic');
        $this->load->model('order_model');
    }


    // 添加订单状态
    public function add_pay_item($data) {

//        buyer_email=yakejiao%40gmail.com&
//        buyer_id=2088102113422363&
//        exterface=create_direct_pay_by_user&
//        extra_common_param=0&
//        is_success=T&
//        notify_id=RqPnCoPT3K9%252Fvwbh3InXShbmEVyI6GQ9ECKueied9MxKBeHMflsekCQG0znLWy90CWqs&
//        notify_time=2016-05-21+14%3A49%3A12&
//        notify_type=trade_status_sync&
//        out_trade_no=20160521146381330711&
//        payment_type=1&
//        seller_email=2680412302%40qq.com&
//        seller_id=2088221899732061&
//        subject=%E6%B3%95%E5%9B%BD%E7%9A%87%E5%AE%A4%E8%8A%B1%E5%9B%AD%E5%8D%A2%E7%93%A6%E5%B0%94%E6%B2%B3%E8%B0%B7%E5%9F%8E%E5%A0%A11%E6%97%A5%E6%B8%B8%EF%BC%88%E5%B7%B4%E9%BB%8E%E5%BE%80%E8%BF%94%2B%E5%85%8D%E6%8E%92%E9%98%9F%2B%E4%B8%AD%E6%96%87%E5%AF%BC%E6%B8%B8%EF%BC%89&
//        total_fee=0.01&
//        trade_no=2016052121001004360292880825&trade_status=TRADE_SUCCESS&
//        sign=be9c42010630e3814078a03389c366c2&
//        sign_type=MD5


        $out_trade_no           =   urldecode($data['out_trade_no']);
        $trade_no               =   urldecode($data['trade_no']);
        $buyer_email            =   urldecode($data['buyer_email']);
        $buyer_id               =   urldecode($data['buyer_id']);
        $exterface              =   urldecode($data['exterface']);
        $extra_common_param     =   urldecode($data['extra_common_param']);
        $is_success             =   urldecode($data['is_success']);
        $notify_id              =   urldecode($data['notify_id']);
        $notify_time            =   urldecode($data['notify_time']);
        $notify_type            =   urldecode($data['notify_type']);
        $payment_type           =   urldecode($data['payment_type']);
        $seller_email           =   urldecode($data['seller_email']);
        $seller_id              =   urldecode($data['seller_id']);
        $subject                =   urldecode($data['subject']);
        $total_fee              =   urldecode($data['total_fee']);
        $trade_status           =   $data['trade_status'];
        $sign                   =   $data['sign'];
        $sign_type              =   $data['sign_type'];

        $ary = array(
            'order_id'             =>   $out_trade_no,
            'trade_no'             =>   $trade_no,
            'buyer_email'          =>   $buyer_email,
            'buyer_id'             =>   $buyer_id,
            'exterface'            =>   $exterface,
            'extra_common_param'   =>   $extra_common_param,
            'is_success'           =>   $is_success,
            'notify_id'            =>   $notify_id,
            'notify_time'          =>   $notify_time,
            'notify_type'          =>   $notify_type,
            'payment_type'         =>   $payment_type,
            'seller_email'         =>   $seller_email,
            'seller_id'            =>   $seller_id,
            'subject'              =>   $subject,
            'total_fee'            =>   $total_fee,
            'trade_status'         =>   $trade_status,
            'sign'                 =>   $sign,
            'sign_type'            =>   $sign_type
        ) ;


        // 添加一条支付记录
        $this->pay_atomic->ins($ary) ;

        if($trade_status == 'TRADE_SUCCESS') {
//            $status = Ptype::ORDER_STATUS_PAYED;
        }

        // 获取订单当前状态
        $cur_status = $this->order_model->get_order_cur_status($out_trade_no) ;

        // 添加订单状态
        $this->order_model->modify_order_status('', $out_trade_no, $cur_status, Ptype::ORDER_STATUS_PAYED, '支付成功', '支付宝') ;
    }

    // 订单是否已经支付
    public function order_is_payed($order_id) {
        $this->load->model('atomic/order_status_atomic_model', 'order_status_atomic_model') ;
        return $this->pay_atomic->order_is_payed($order_id) ;
    }

    public function order_current_status($order_id) {
        $this->load->model('atomic/order_status_atomic_model', 'order_status_atomic_model') ;
        return $this->order_status_atomic_model->get_order_cur_status($order_id) ;
    }





}