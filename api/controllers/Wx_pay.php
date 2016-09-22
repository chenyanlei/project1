<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/4/25
 * Time: 下午4:52
 */
class Wx_pay extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
//    public function test() {
//        $order_id = "20160722146918986713" ;
//        $this->_get_pay_fee_by_order_id($order_id)  ;
//    }

    public function test() {
        $data['openid'] = $this->input->get_post("openid") ;
        $this->load->view("pay/wx/pay_qr_code.html", $data) ;
    }

//    public function test() {
//        $data = $this->input->post(null) ;
//        var_dump($data) ;
//        $this->load->model("wx_pay_model") ;
//        $rst = $this->wx_pay_model->update_order_status($data) ;
//        if(empty($rst)) {
//            h_echo_json(Ecode::INSERT_FAIL) ;
//        } else {
//            h_echo_json(Ecode::OK) ;
//        }
//    }

    public function callback() {
        $this->load->library("wxpay/PayNotifyCallBack.php", null, "PayNotifyCallBack");
        $this->PayNotifyCallBack->Handle(false);
    }

    //打印输出数组信息
    function printf_info($data)
    {
        foreach($data as $key=>$value){
            echo "<font color='#00ff55;'>$key</font> : $value <br/>";
        }
    }

    public function pay() {
        ini_set('date.timezone','Asia/Shanghai');
        require_once APPPATH."libraries/wxpay/lib/WxPay.Api.php";
        require_once APPPATH.'libraries/wxpay/pages/WxPay.JsApiPay.php';

        $redirect_url = $this->input->get_post('redirect_url') ;
        if(!isset($redirect_url)) {
            $this->load->view("pay/wx/err", array("params" => "param openid is error")) ;
            return;
        }
        $redirect_url = urldecode($redirect_url) ;

        //①、获取用户openid
        $tools = new JsApiPay();
        $openId = $this->input->get_post('openid') ;
        if(!isset($openId)) {
            $this->load->view("pay/wx/err", array("params" => "param openid is error")) ;
            return;
        }
        $body = $this->input->get_post('subject') ;
        if(!isset($body)) {
            $this->load->view("pay/wx/err", array("params" => "body is error")) ;
            return;
        }
        $attach = $this->input->get_post('attach') ;
        $total_fee_display = $this->input->get_post('total_fee') ;
        if(!isset($total_fee_display)) {
            $this->load->view("pay/wx/err", array("params" => "total_fee is error")) ;
            return;
        }
        $total_fee = intval($total_fee_display * 100);
        $out_trade_no = $this->input->get_post('out_trade_no') ;
        if(!isset($out_trade_no)) {
            $this->load->view("pay/wx/err", array("params" => "out_trade_no is error")) ;
            return;
        }

//        if(false)
        {
            // 通过订单id获取价格信息
            $order_detail = $this->_get_pay_fee_by_order_id($out_trade_no)  ;
            if($order_detail == null) {
                $this->load->view("pay/wx/err", array("params" => "当前订单状态不是待支付，如有错误，请联系客服")) ;
                return;
            }

            $total_fee = $order_detail['total_fee'] ;
//            $total_fee = 0.01 ; //test
            $total_fee_display = $total_fee ;
            $total_fee = intval($total_fee_display * 100);


            if($total_fee <= 0) {
                $this->load->view("pay/wx/err", array("params" => "价格错误，请联系客服")) ;
                return;
            }
        }

        //②、统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetBody("$body");
        $input->SetAttach($attach);
        $input->SetOut_trade_no($out_trade_no);
        $input->SetTotal_fee($total_fee);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("逍品旅行");
        $input->SetNotify_url("http://api.qsctrip.com/wx_pay/callback");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);

        $input->SetSubMch_id("1378429102"); //艾威商户号
//        $input->SetSubAppid($openId);
        $order = WxPayApi::unifiedOrder($input);

        if($order['return_code'] == "SUCCESS") {
            if(isset($order['err_code'])) {
                $err_code = $order['err_code'] ;
                if("NOAUTH" == $err_code) { // 商户无此接口权限
                    $this->load->view("pay/wx/err", array("params" => "商户未开通此接口权限,请商户前往申请此接口权限")) ;
                } else if("NOTENOUGH" == $err_code) { // 余额不足
                    $this->load->view("pay/wx/err", array("params" => "用户帐号余额不足，请用户充值或更换支付卡后再支付")) ;
                } else if("ORDERPAID" == $err_code) { //订单已支付
                    $this->load->view("pay/wx/err", array("params" => "商户订单已支付，无需更多操作。 ")) ;
                } else if("ORDERCLOSED" == $err_code) { // 订单已关闭
                    $this->load->view("pay/wx/err", array("params" => "商户订单已支付，无需重复操作。 ")) ;
                } else if("SYSTEMERROR" == $err_code) { // 系统错误
                    $this->load->view("pay/wx/err", array("params" => "系统异常，请用相同参数重新调用")) ;
                } else if("APPID_NOT_EXIST" == $err_code) { // APPID不存在
                    $this->load->view("pay/wx/err", array("params" => "请检查APPID是否正确")) ;
                } else if("MCHID_NOT_EXIST" == $err_code) { // MCHID不存在
                    $this->load->view("pay/wx/err", array("params" => "请检查MCHID是否正确 ")) ;
                } else if("APPID_MCHID_NOT_MATCH" == $err_code) { // appid和mch_id不匹配
                    $this->load->view("pay/wx/err", array("params" => "请确认appid和mch_id是否匹配 ")) ;
                } else if("LACK_PARAMS" == $err_code) { // 缺少参数
                    $this->load->view("pay/wx/err", array("params" => "请检查参数是否齐全 ")) ;
                } else if("OUT_TRADE_NO_USED" == $err_code) { // 商户订单号重复
                    $this->load->view("pay/wx/err", array("params" => "请核实商户订单号是否重复提交 ")) ;
                } else if("SIGNERROR" == $err_code) { // 签名错误
                    $this->load->view("pay/wx/err", array("params" => "请检查签名参数和方法是否都符合签名算法要求 ")) ;
                } else if("XML_FORMAT_ERROR" == $err_code) { // XML格式错误
                    $this->load->view("pay/wx/err", array("params" => "请检查XML参数格式是否正确")) ;
                } else if("REQUIRE_POST_METHOD" == $err_code) { // 请使用post方法
                    $this->load->view("pay/wx/err", array("params" => "请检查请求参数是否通过post方法提交")) ;
                } else if("POST_DATA_EMPTY" == $err_code) { // post数据为空
                    $this->load->view("pay/wx/err", array("params" => "请检查post数据是否为空 ")) ;
                } else if("NOT_UTF8" == $err_code) { // 编码格式错误
                    $this->load->view("pay/wx/err", array("params" => "请使用NOT_UTF8编码格式")) ;
                } else {
                    $this->load->view("pay/wx/err", array("params" => "未知错误， ". $err_code)) ;
                }

                return;
            }
        } else {
            $this->load->view("pay/wx/err", array("params" => "签名错误，请联系客服")) ;
            return;
        }

        $jsApiParameters = $tools->GetJsApiParameters($order);

        $data = array(
            "order_name"=>$order_detail['title'],
            "jsApiParameters"=>$jsApiParameters,
            "total_fee_display"=>$total_fee_display,
            "redirect_url"=>$redirect_url
        ) ;
        $this->load->view("pay/wx/pay.php", $data) ;
    }

    public function pay1() {
        ini_set('date.timezone','Asia/Shanghai');
        require_once APPPATH."libraries/wxpay/lib/WxPay.Api.php";
        require_once APPPATH.'libraries/wxpay/pages/WxPay.JsApiPay.php';

        //①、获取用户openid
        $tools = new JsApiPay();
        $openId = $this->input->get_post('openid') ;
        if(!isset($openId)) {
            $this->load->view("pay/wx/err", array("params" => "param openid is error")) ;
            return;
        }
        $body = $this->input->get_post('subject') ;
        if(!isset($body)) {
            $this->load->view("pay/wx/err", array("params" => "body is error")) ;
            return;
        }
        $attach = $this->input->get_post('attach') ;
        $total_fee_display = $this->input->get_post('total_fee') ;
        if(!isset($total_fee_display)) {
            $this->load->view("pay/wx/err", array("params" => "total_fee is error")) ;
            return;
        }
        $total_fee = intval($total_fee_display * 100);
        $out_trade_no = $this->input->get_post('out_trade_no') ;
        if(!isset($out_trade_no)) {
            $this->load->view("pay/wx/err", array("params" => "out_trade_no is error")) ;
            return;
        }

        if($total_fee <= 0) {
            $this->load->view("pay/wx/err", array("params" => "价格错误，请联系客服")) ;
            return;
        }

        //②、统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetBody($body);
        $input->SetAttach($attach);
        $input->SetOut_trade_no($out_trade_no);
        $input->SetTotal_fee($total_fee);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("逍品旅行");
        $input->SetNotify_url("http://api.qsctrip.com/wx_pay/callback");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);

        $input->SetSubMch_id("1378429102"); //艾威商户号
//        $input->SetSubAppid($openId);
        $order = WxPayApi::unifiedOrder($input);

        if($order['return_code'] == "SUCCESS") {
            if(isset($order['err_code'])) {
                $err_code = $order['err_code'] ;
                if("NOAUTH" == $err_code) { // 商户无此接口权限
                    $this->load->view("pay/wx/err", array("params" => "商户未开通此接口权限,请商户前往申请此接口权限")) ;
                } else if("NOTENOUGH" == $err_code) { // 余额不足
                    $this->load->view("pay/wx/err", array("params" => "用户帐号余额不足，请用户充值或更换支付卡后再支付")) ;
                } else if("ORDERPAID" == $err_code) { //订单已支付
                    $this->load->view("pay/wx/err", array("params" => "商户订单已支付，无需更多操作。 ")) ;
                } else if("ORDERCLOSED" == $err_code) { // 订单已关闭
                    $this->load->view("pay/wx/err", array("params" => "商户订单已支付，无需重复操作。 ")) ;
                } else if("SYSTEMERROR" == $err_code) { // 系统错误
                    $this->load->view("pay/wx/err", array("params" => "系统异常，请用相同参数重新调用")) ;
                } else if("APPID_NOT_EXIST" == $err_code) { // APPID不存在
                    $this->load->view("pay/wx/err", array("params" => "请检查APPID是否正确")) ;
                } else if("MCHID_NOT_EXIST" == $err_code) { // MCHID不存在
                    $this->load->view("pay/wx/err", array("params" => "请检查MCHID是否正确 ")) ;
                } else if("APPID_MCHID_NOT_MATCH" == $err_code) { // appid和mch_id不匹配
                    $this->load->view("pay/wx/err", array("params" => "请确认appid和mch_id是否匹配 ")) ;
                } else if("LACK_PARAMS" == $err_code) { // 缺少参数
                    $this->load->view("pay/wx/err", array("params" => "请检查参数是否齐全 ")) ;
                } else if("OUT_TRADE_NO_USED" == $err_code) { // 商户订单号重复
                    $this->load->view("pay/wx/err", array("params" => "请核实商户订单号是否重复提交 ")) ;
                } else if("SIGNERROR" == $err_code) { // 签名错误
                    $this->load->view("pay/wx/err", array("params" => "请检查签名参数和方法是否都符合签名算法要求 ")) ;
                } else if("XML_FORMAT_ERROR" == $err_code) { // XML格式错误
                    $this->load->view("pay/wx/err", array("params" => "请检查XML参数格式是否正确")) ;
                } else if("REQUIRE_POST_METHOD" == $err_code) { // 请使用post方法
                    $this->load->view("pay/wx/err", array("params" => "请检查请求参数是否通过post方法提交")) ;
                } else if("POST_DATA_EMPTY" == $err_code) { // post数据为空
                    $this->load->view("pay/wx/err", array("params" => "请检查post数据是否为空 ")) ;
                } else if("NOT_UTF8" == $err_code) { // 编码格式错误
                    $this->load->view("pay/wx/err", array("params" => "请使用NOT_UTF8编码格式")) ;
                } else {
                    $this->load->view("pay/wx/err", array("params" => "未知错误， ". $err_code)) ;
                }

                return;
            }
        } else {
            $this->load->view("pay/wx/err", array("params" => "签名错误，请联系客服")) ;
            return;
        }

        $jsApiParameters = $tools->GetJsApiParameters($order);

        $data = array(
            "order_name"=>$body,
            "jsApiParameters"=>$jsApiParameters,
            "total_fee_display"=>$total_fee_display,
            "redirect_url"=>""
        ) ;
        $this->load->view("pay/wx/pay.php", $data) ;
    }

    private function _get_pay_fee_by_order_id($order_id) {
        $this->load->model("order_model") ;
        $order_detail = $this->order_model->get_order_detail($order_id)  ;

        if($order_detail['status'] != Ptype::ORDER_STATUS_WILL_PAY) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), '请确认订单状态是否为待支付') ;
            return null;
        }

        return $order_detail;
    }

    /**
     * 扫码支付
     */
    public function pay_by_qrcode() {
        $key = $this->input->get_post("key") ;
        $mid = $this->input->get_post("mid") ;
        $openid = $this->input->get_post("openid") ;
        $data['key'] = $key ;
        $data['mid'] = $mid ;
        $data['openid'] = $openid ;
        $this->load->view("pay/wx/pay_qr_code.html", $data) ;
    }

    public function get_pay_params() {
        ini_set('date.timezone','Asia/Shanghai');
        require_once APPPATH."libraries/wxpay/lib/WxPay.Api.php";
        require_once APPPATH.'libraries/wxpay/pages/WxPay.JsApiPay.php';

        //①、获取用户openid
        $tools = new JsApiPay();
        $openId = $this->input->get_post('openid') ;
        if(!isset($openId)) {
            $this->load->view("pay/wx/err", array("params" => "param openid is error")) ;
            return;
        }
        $body = $this->input->get_post('subject') ;
        if(!isset($body)) {
            $this->load->view("pay/wx/err", array("params" => "body is error")) ;
            return;
        }
        $attach = $this->input->get_post('attach') ;
        $total_fee_display = $this->input->get_post('total_fee') ;
        if(!isset($total_fee_display)) {
            $this->load->view("pay/wx/err", array("params" => "total_fee is error")) ;
            return;
        }
        $total_fee = intval($total_fee_display * 100);
        $out_trade_no = $this->input->get_post('out_trade_no') ;
        if(!isset($out_trade_no)) {
            $this->load->view("pay/wx/err", array("params" => "out_trade_no is error")) ;
            return;
        }

        {
            if($total_fee <= 0) {
                $this->load->view("pay/wx/err", array("params" => "价格错误，请联系客服")) ;
                return;
            }
        }

        //②、统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetBody("$body");
        $input->SetAttach($attach);
        $input->SetOut_trade_no($out_trade_no);
        $input->SetTotal_fee($total_fee);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("逍品旅行");
        $input->SetNotify_url("http://api.qsctrip.com/wx_pay/callback");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);

        $input->SetSubMch_id("1378429102"); //艾威商户号
//        $input->SetSubAppid($openId);
        $order = WxPayApi::unifiedOrder($input);

        if($order['return_code'] == "SUCCESS") {
            if(isset($order['err_code'])) {
                $err_code = $order['err_code'] ;
                if("NOAUTH" == $err_code) { // 商户无此接口权限
                    $this->load->view("pay/wx/err", array("params" => "商户未开通此接口权限,请商户前往申请此接口权限")) ;
                } else if("NOTENOUGH" == $err_code) { // 余额不足
                    $this->load->view("pay/wx/err", array("params" => "用户帐号余额不足，请用户充值或更换支付卡后再支付")) ;
                } else if("ORDERPAID" == $err_code) { //订单已支付
                    $this->load->view("pay/wx/err", array("params" => "商户订单已支付，无需更多操作。 ")) ;
                } else if("ORDERCLOSED" == $err_code) { // 订单已关闭
                    $this->load->view("pay/wx/err", array("params" => "商户订单已支付，无需重复操作。 ")) ;
                } else if("SYSTEMERROR" == $err_code) { // 系统错误
                    $this->load->view("pay/wx/err", array("params" => "系统异常，请用相同参数重新调用")) ;
                } else if("APPID_NOT_EXIST" == $err_code) { // APPID不存在
                    $this->load->view("pay/wx/err", array("params" => "请检查APPID是否正确")) ;
                } else if("MCHID_NOT_EXIST" == $err_code) { // MCHID不存在
                    $this->load->view("pay/wx/err", array("params" => "请检查MCHID是否正确 ")) ;
                } else if("APPID_MCHID_NOT_MATCH" == $err_code) { // appid和mch_id不匹配
                    $this->load->view("pay/wx/err", array("params" => "请确认appid和mch_id是否匹配 ")) ;
                } else if("LACK_PARAMS" == $err_code) { // 缺少参数
                    $this->load->view("pay/wx/err", array("params" => "请检查参数是否齐全 ")) ;
                } else if("OUT_TRADE_NO_USED" == $err_code) { // 商户订单号重复
                    $this->load->view("pay/wx/err", array("params" => "请核实商户订单号是否重复提交 ")) ;
                } else if("SIGNERROR" == $err_code) { // 签名错误
                    $this->load->view("pay/wx/err", array("params" => "请检查签名参数和方法是否都符合签名算法要求 ")) ;
                } else if("XML_FORMAT_ERROR" == $err_code) { // XML格式错误
                    $this->load->view("pay/wx/err", array("params" => "请检查XML参数格式是否正确")) ;
                } else if("REQUIRE_POST_METHOD" == $err_code) { // 请使用post方法
                    $this->load->view("pay/wx/err", array("params" => "请检查请求参数是否通过post方法提交")) ;
                } else if("POST_DATA_EMPTY" == $err_code) { // post数据为空
                    $this->load->view("pay/wx/err", array("params" => "请检查post数据是否为空 ")) ;
                } else if("NOT_UTF8" == $err_code) { // 编码格式错误
                    $this->load->view("pay/wx/err", array("params" => "请使用NOT_UTF8编码格式")) ;
                } else {
                    $this->load->view("pay/wx/err", array("params" => "未知错误， ". $err_code)) ;
                }

                return;
            }
        } else {
            $this->load->view("pay/wx/err", array("params" => "签名错误，请联系客服")) ;
            return;
        }

        $jsApiParameters = $tools->GetJsApiParameters($order);

        echo $jsApiParameters ;
    }



/*

{"appid":"wx4bfa67be4a93ca1f","attach":[],"bank_type":"CMB_CREDIT","cash_fee":"1","fee_type":"CNY","is_subscribe":"Y",
"mch_id":"1372770602","nonce_str":"IoHD1tFATAjEVvYp","openid":"ofqfxvty42tmlp2r1A1CvviY5qbg","out_trade_no":"123456789",
"result_code":"SUCCESS","return_code":"SUCCESS","return_msg":"OK","sign":"C4F8EAFF7C432394817EAF1B45B2F49A",
"time_end":"20160803202720","total_fee":"1","trade_state":"SUCCESS","trade_type":"JSAPI","transaction_id":"4004642001201608030484746901"}

*/

}