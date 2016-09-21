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

    public function alipay_create_direct_pay_by_user() {
        $data = $this->input->post() ;
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);
        $data['extra_common_param'] = ''.PType::TYPE_A ;  // 支付宝回调公用回传参数

        $url=URL_API.'pay/alipay_create_direct_pay_by_user';
        $content= h_curl($url,$data);

        echo $content;
    }
    public function alipay_create_direct_pay_by_webuser() {
        $data = $this->input->post() ;
        $this->add_webapp_default_params($data,$_SESSION['token']);
        $data['extra_common_param'] = ''.PType::TYPE_A ;  // 支付宝回调公用回传参数

        $url=URL_API.'pay/alipay_create_direct_pay_by_user';
        $content= h_curl($url,$data);

        echo $content;
    }

    public function pay_by_qr_code() {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];//获取浏览器信息
        if (strpos($user_agent, 'MicroMessenger')) {
            if (!isset($_SESSION['openid'])) {
                $this->load->library('request_openid');
                $this->request_openid->get_return(URL . $_SERVER['REQUEST_URI']);
            }

            if(isset($_SESSION['openid'])) {
                header("location:http://api.qsctrip.com/wx_pay/pay_by_qrcode?openid=".$_SESSION['openid']) ;
            }



//            if(isset($_SESSION['openid'])) {
//                $this->load->view("pay/pay_qr_code.html") ;
//            }
        } else {

        }
    }

}