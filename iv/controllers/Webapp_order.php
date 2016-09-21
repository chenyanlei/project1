<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 16/5/17
 * Time: 下午7:22
 */
class Webapp_order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $user_agent = $_SERVER['HTTP_USER_AGENT'];//获取浏览器信息
        if (strpos($user_agent, 'MicroMessenger')) {
            if (!isset($_SESSION['openid'])) {
                $this->load->library('request_openid');
                $this->request_openid->get_return(URL . $_SERVER['REQUEST_URI']);
            }
            if (!isset($_SESSION['token'])) {
                $this->load->library('request_openid');
                $this->request_openid->band_openid();
            }
        }
    }

    //订单列表
    public function get_order_list() {
        $data = $this->input->get(null) ;

        if(!isset($data)) {
            $data = $this->input->post(null) ;
        }
        $url=URL_API.'order/get_a_order_list';
        $this->add_webapp_default_params($data,$_SESSION['token']);
        $content= h_curl($url,$data);
        h_echo_json($content) ;
    }
    //我的订单列表
    public function get_myorder_list() {
        $data = $this->input->get(null) ;

        if(!isset($data)) {
            $data = $this->input->post(null) ;
        }
        $url=URL_API.'order/get_order_list';
        $this->add_webapp_default_params($data,$_SESSION['token']);
        $content= h_curl($url,$data);
        h_echo_json($content) ;
    }

    //取消定单
    public function cancel_order(){
       $data = $this->input->post(null) ;
        $url=URL_API.'order/cancel';
        $this->load->library('request') ;
        $this->request->add_default_request_params($data);
        $this->request->add_token_from_session($data);
        $content= h_curl($url,$data);
        h_echo_json($content) ;
    }
    //退单
    public function refund_order(){
        $data = $this->input->post(null) ;
        $url=URL_API.'order/chargeback';
        $this->add_webapp_default_params($data,$_SESSION['token']);
        $content= h_curl($url,$data);
        h_echo_json($content) ;
    }
    //订单详情
    public function get_order_detail() {

        $data = $this->input->get(null) ;
        if(!isset($data)) {
            $data = $this->input->post(null) ;
        }
        $url=URL_API.'order/get_order_detail';
        
        $this->add_webapp_default_params($data,$_SESSION['token']);
        $content= h_curl($url,$data);
        $datainfo=json_decode($content,true);
//         var_dump($datainfo);
        if($datainfo['result']['err'] === 0) {
            $data = $datainfo['content'];
            $this->load->view('/webapp/order_detail', $data);
        }else if($datainfo['result']['err'] === 4004){
            $this->load->view('/webapp/error/no_result.html');
        } else {
            $data['msg']=$datainfo['result']['err'].':'.$datainfo['result']['msg'];
            $this->load->view('/webapp/error/other_error.html',$data);
        }
    }

   /*
    *webapp订单部分
    *
    */
    //填写订单日期
    public function fillorder(){
        
        $data = $this->input->post(null);
        $data['title'] =  urldecode($this->input->post('title'));
        $data['prices'] =  json_decode($this->input->post('prices'),true);
        $this->load->view('/webapp/clander',$data);
    }

    //填写订单联系人
    public function fillcontact(){
        $data = $this->input->post(null);
        $data['title'] =  urldecode($this->input->post('title'));;
        $data['pnum'] =intval($this->input->post('pnum')) > 10 ? 10 : intval($this->input->post('pnum'));
        $this->load->view('/webapp/contact',$data);
    }
    //填写旅客信息
    public function fillcustomer(){

        $data = $this->input->post(null);
        $this->load->view('/webapp/customer',$data);
    }
    //生成订单
    public function addorder(){
        //绑定参数
        $sdata['p_type'] = $this->input->post('p_type');
        $sdata['aid'] = $this->input->post('aid');
        $sdata['date'] = $this->input->post('date');;
        $sdata['pid'] = $this->input->post('pid');
        $sdata['num'] = $this->input->post('pnum');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $nameo = $this->input->post('cname');
        $arr1 = array('name'=>$nameo,'is_contact'=>1,'phone'=>$phone,'email'=>$email);
        $sdata['contact'][0]=$arr1;
        $name = $this->input->post('name');
        $id_card = $this->input->post('id_card');
        $passport = $this->input->post('passport');
        if($name[0]) {
            $num = count($name);
           for ($i = 0; $i < $num; $i++) {
               $sex = $this->input->post('sex' . ($i + 1));
               $v['name'] = $name[$i];
               $v['sex'] = $sex;
               $v['id_card'] = $id_card[$i];
               $v['passport'] = $passport[$i];
               $v['is_contact'] = 0;
               array_push($sdata['contact'], $v);
           }
       }
        $sdata['contact'] = json_encode($sdata['contact']);

        //请求接口
        $url=URL_API.'order/create_order';
        $this->add_default_params($sdata,$_SESSION['token']);
        $content= h_curl($url,$sdata);
        $datainfo=json_decode($content,true);
        //逻辑判断处理
        if($datainfo['result']['err'] === 0){
            $order_id=$datainfo['content']['order_id'];
            header('location:/webapp_order/order_pay?order_id='.$order_id);
        } else {
            $data['msg'] = $datainfo['result']['err'].':'.$datainfo['result']['msg'];
            $this->load->view('/webapp/error/other_error.html',$data);
        }

    }
    //客户订单列表
    public function order_list(){
        //绑定参数
        $data['rn'] = '5';
        $data['pn'] = '0';
        $this->add_webapp_default_params($data,$_SESSION['token']);
        //请求接口
        $url=URL_API.'order/get_a_order_list';
        $content= h_curl($url,$data);
        $datainfo=json_decode($content,true);
        //逻辑判断处理
        if($datainfo['result']['err'] === 0){
            $data=$datainfo['content'];
            $this->load->view('/webapp/order_list',$data);
        }else if($datainfo['result']['err'] === 4004) {
            $data = '';
            $this->load->view('/webapp/order_list',$data);
        }else{
            $data['msg'] = $datainfo['result']['err'].':'.$datainfo['result']['msg'];
            $this->load->view('/webapp/error/other_error.html',$data);
        }

    }
    //我的订单列表
    public function my_order_list(){
        //绑定参数
        $data['rn'] = '5';
        $data['pn'] = '0';
        $this->add_webapp_default_params($data,$_SESSION['token']);
        //请求接口
        $url=URL_API.'order/get_order_list';
        $content= h_curl($url,$data);
        $datainfo=json_decode($content,true);
        //逻辑判断处理
        if($datainfo['result']['err'] === 0){
            $data=$datainfo['content'];
            $this->load->view('/webapp/order_list',$data);
        } else if($datainfo['result']['err'] === 4004){
            $data = '';
            $this->load->view('/webapp/order_list',$data);
        }else{
            $data['msg'] = $datainfo['result']['err'].':'.$datainfo['result']['msg'];
            $this->load->view('/webapp/error/other_error.html',$data);
        }

    }

    //删除订单
    public function delete(){
        $data = $this->input->post(null) ;
        $url=URL_API.'order/delete';
        $this->add_webapp_default_params($data,$_SESSION['token']);
        $content= h_curl($url,$data);
        h_echo_json($content) ;
    }
    //未完成订单处理
    public function order_pay(){

        //绑定参数
        $order_id= $this->input->get('order_id');
       $sdata['order_id']=$order_id;
        $this->add_default_params($sdata,$_SESSION['token']);
        //请求接口
        $url=URL_API.'order/get_order_detail';
       $content= h_curl($url,$sdata);
       $datainfo=json_decode($content,true);
        //逻辑判断处理
       if($datainfo['result']['err'] === 0){
       		$data=$datainfo['content'];
            $data['openid'] = $_SESSION['openid'];
            if(!$data['aid']){
                $data['aid'] = 2;
            }
           $this->load_view_webapp_footer('/webapp/pay',$data);
       } else if($datainfo['result']['err'] === 4004){
           $this->load->view('/webapp/error/no_result.html');
       }else{
           $data['msg'] = $datainfo['result']['err'].':'.$datainfo['result']['msg'];
           $this->load->view('/webapp/error/other_error.html',$data);
       }
    }

    //订单完成
    public function pay_success(){
    	 $trade_status = $this->input->get('trade_status');
    	 if($trade_status != 1){
             $data['msg'] = '订单异常';
             $this->load->view('/webapp/error/other_error.html',$data);
             return false;
    	 }
        $data['order_id'] = $this->input->get('order_id');
        $data['total_fee'] = $this->input->get('total_fee');
    	$data['tip_title']='支付成功';
        $this->load_view('/order/pay_success',$data);
    }
    
}