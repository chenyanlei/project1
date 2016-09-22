<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/19
 * Time: 下午2:43
 */


class Pay extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add_pay_item() {
        $this->load->model('pay_model') ;
        $this->pay_model->add_pay_item($this->input->post()) ;
    }

    public function alipay_create_direct_pay_by_user() {
        /**************************请求参数**************************/
        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = $this->input->post('out_trade_no');

        $this->load->model('pay_model') ;
        $current_status = $this->pay_model->order_current_status($out_trade_no) ;
        if($current_status != Ptype::ORDER_STATUS_WILL_PAY) {
            h_echo_json(Ecode::C2S_ARG_ERR, array(), '请确认订单状态是否为待支付') ;
            return ;
        }

        //订单名称，必填
        $subject = $this->input->post('subject');

        //付款金额，必填
        $total_fee = $this->input->post('total_fee');

        //商品描述，可空
        $body = $this->input->post('body');

        // aid
        $aid = $this->input->post('aid');

        $extra_common_param = $this->input->post('extra_common_param');

        $from = $this->input->get_post('from') ;
        $extra_common_param .= '|'.$from.'|'.$aid ;

        /************************************************************/
        require_once(APPPATH."libraries/alipay/create_direct_pay_by_user/lib/alipay_submit.class.php");
        require_once(APPPATH."libraries/alipay/create_direct_pay_by_user/alipay.config.php");

        //构造要请求的参数数组，无需改动
        $parameter = array(
            "service"       => $alipay_config['service'],
            "partner"       => $alipay_config['partner'],
            "seller_id"     => $alipay_config['seller_id'],
            "payment_type"	=> $alipay_config['payment_type'],
            "notify_url"	=> $alipay_config['notify_url'],
            "return_url"	=> $alipay_config['return_url'],

            "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
            "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
            "out_trade_no"	=> $out_trade_no,
            "subject"	=> $subject,
            "total_fee"	=> $total_fee,
            "body"	=> $body,
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset'])),
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
            //如"参数名"=>"参数值"

            "extra_common_param" => $extra_common_param ,
        );

        //建立请求
        $alipaySubmit = new AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        echo $html_text;
    }

    public function alipay_notify_callback() {
        require_once(APPPATH."libraries/alipay/create_direct_pay_by_user/lib/alipay_notify.class.php");
        require_once(APPPATH."libraries/alipay/create_direct_pay_by_user/alipay.config.php");

        //计算得出通知验证结果
        $alipayNotify = new AlipayNotify($alipay_config);
        $verify_result = $alipayNotify->verifyNotify();

        if($verify_result) { //验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代


            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表

//            //商户订单号
//            $out_trade_no = $this->input->post('out_trade_no');
//
//            //支付宝交易号
//            $trade_no = $this->input->post('trade_no');

            $this->load->model('pay_model') ;
            $this->pay_model->add_pay_item($this->input->post()) ;

            //交易状态
            $trade_status = $this->input->post('trade_status');
            if($trade_status == 'TRADE_FINISHED') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知

                //调试用，写文本函数记录程序运行情况是否正常
                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
            }
            else if ($trade_status == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //付款完成后，支付宝系统发送该交易状态通知

                //调试用，写文本函数记录程序运行情况是否正常
                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");

            }

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            echo "success";		//请不要修改或删除
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "fail";

            //调试用，写文本函数记录程序运行情况是否正常
            //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
        }
    }

    public function alipay_return_callback() {
        $extra_common_param = $this->input->get('extra_common_param') ;

        // 商户订单号
        $out_trade_no = $this->input->get('out_trade_no');

        // 订单总价格
        $total_fee = $this->input->get('total_fee');

        $arr = explode('|',$extra_common_param) ;
        $type = $arr[0] ;
        $from = $arr[1] ;
        $aid = $arr[2] ;

        $url = 'http://' ;
        if($type == Ptype::TYPE_A) {
            $url .= 'a.' ;
        } else if($type == Ptype::TYPE_S) {
            $url .= 's.' ;
        } else {
            $url .= 's.' ;  //api
        }

        if($from == 'h5') {
            $url .= "qsctrip.com/webapp_order/get_order_detail?".'&aid='.$aid.'&order_id='.$out_trade_no.'&total_fee='.$total_fee.'&trade_status=' ;
        } else {
            $url .= 'qsctrip.com/order/pay_success?'.'&aid='.$aid.'&order_id='.$out_trade_no.'&total_fee='.$total_fee.'&trade_status=' ;
        }

        $verify_result = $this->input->get('verify_result');

        if($verify_result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码

            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

            //支付宝交易号
//            $trade_no = $this->input->get('trade_no');
//
//            //交易状态
//            $trade_status = $this->input->get('trade_status');


            if($this->input->get('trade_status') == 'TRADE_FINISHED' || $this->input->get('trade_status') == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                ////如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序
            }
            else {
                echo "trade_status=".$this->input->get('trade_status');
            }

            echo "验证成功<br />";

            $url .= '1';


            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            //如要调试，请看alipay_notify.php页面的verifyReturn函数
            echo "验证失败";

            $url .= '0';
        }

//        $url .= '&extra_common_param='.$extra_common_param ;

        header('location:'. $url) ;
    }

}