<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/8/4
 * Time: 下午1:26
 */
class Wx_pay_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function update_order_status($data){

        //修改订单状态
        $out_trade_no = $data['out_trade_no'];
        $this->load->model('atomic/order_atomic_model', 'order_atomic');
        $this->load->model('atomic/order_status_atomic_model', 'order_status_atomic');
        $this->load->model('order/order_wx_pay_atomic_model', 'order_wx_pay_atomic_model');

        // 更新当前状态
        $upd_status = $this->order_atomic->update_status($out_trade_no, Ptype::ORDER_STATUS_PAYED, Ptype::ORDER_PAYMENTS_WXPAY) ;
        $status = $this->order_status_atomic->add_order_status($out_trade_no, Ptype::ORDER_STATUS_PAYED, "微信支付")  ;
        if(empty($status) )  {
            h_echo_json(Ecode::INSERT_FAIL) ;
            return true ;
        }

        $arr = array(
            "attach" => $data['attach'],
            "bank_type" => $data['bank_type'],
            "cash_fee" => $data['cash_fee'],
            "total_fee" => $data['total_fee'],
            "fee_type" => $data['fee_type'],
            "is_subscribe" => $data['is_subscribe'],
            "nonce_str" => $data['nonce_str'],
            "openid" => $data['openid'],
            "out_trade_no" => $data['out_trade_no'],
            "result_code" => $data['result_code'],
            "return_code" => $data['return_code'],
            "return_msg" => $data['return_msg'],
            "time_end" => $data['time_end'],
            "trade_state" => $data['trade_state'],
            "trade_type" => $data['trade_type'],
            "transaction_id" => $data['transaction_id']
        ) ;

        return $this->order_wx_pay_atomic_model->ins($arr) ;

    }
}
