<?php

/**
 * Created by IntelliJ IDEA.
 * User: yake
 * Date: 15/12/26
 * Time: 下午9:59
 *
 * 登录
 * 注册
 * 校验码
 * 当前语言
 *
 */
class Webapp_user extends MY_Controller
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

    /*
    *webapp
    *注册
    *个人中心
    */
    //注册页 
    public function register(){
        $data['url'] ='';
        $this->load->view('webapp/register',$data);
    }

    //个人中心
    public function mycenter(){
        $data['aid'] = $this->input->get('aid');
        $data['level'] = $_SESSION['userinfo']['level'];
        if (!$data['aid']) {
            if ($data['level']) {
                $data['aid'] = $_SESSION['userinfo']['id'];
            } else {
                $data['aid'] = 2;
            }
        }

        if (isset($_SESSION['userinfo']['wx']['nickname'])) {
            $data['name'] = $_SESSION['userinfo']['wx']['nickname'];
        } else {
            $data['name'] = $_SESSION['userinfo']['name'];
        }
        if (isset($_SESSION['userinfo']['wx']['headimgurl'])) {
            $data['face_img'] = $_SESSION['userinfo']['wx']['headimgurl'];
        } else {
            $data['face_img'] = '';
        }
        if (isset($_SESSION['userinfo']['mobile'])) {
            $data['mobile'] = $_SESSION['userinfo']['mobile'];
        } else {
            $data['mobile'] = '';
        }

        $this->load->view('webapp/my',$data);
    }

    //短消息确认
    public function check_captcha(){
        //接受参数
        $mobile=$this->input->post('mobile');
        $captcha=$this->input->post('captcha');
        if(!$mobile){
            return false;
        }

        if(!$captcha){
            return false;
        }
        //请求接口
        $url=URL_API.'sms/send_login_sms';
        $sdata['phone'] = $mobile;
        $sdata['captcha'] = $captcha;
       

        $s=h_curl($url,$sdata);
        //返回数据给客户端
        h_echo_json($s);
    }
    //短信认证
    public function check_code(){
        //接受参数
        $mobile=$this->input->post('mobile');
        $captcha=$this->input->post('code');

        //请求接口
        $url=URL_API.'user/login_by_sms';
        $sdata['phone'] = $mobile;
        $sdata['code'] = $captcha;
        //绑定默认参数
        $this->add_webapp_default_params($sdata,$_SESSION['token']);
        //发送请求
        $s=h_curl($url,$sdata);
        $userinfo=json_decode($s,true);

        if($userinfo['result']['err']==0){
             $_SESSION['token']=$userinfo['content']['token'];
             $_SESSION['userinfo'] = $userinfo['content'];
             $s1['result'] = $userinfo['result'];
             $s = json_encode($s1);
        }
        //返回数据给客户端
        h_echo_json($s);
    }

     //
     public function dologin(){

        //接受参数
         $pwd=$this->input->post('pass_word');
         $name=$this->input->post('mobile');


        //格式化数据
        $sdata['mobile']=$name;
        $sdata['pwd']=$pwd;
        //绑定默认参数
         $this->add_webapp_default_params($sdata,$_SESSION['token']);

        //请求接口
        $url=URL_API.'wx_user/bind_by_user_pwd';
        $s=h_curl($url,$sdata);
        $userinfo=json_decode($s,true);
         //对返回结果做逻辑判断
        if($userinfo['result']['err']==0){

            $_SESSION['userinfo'] = $userinfo['content'];
            $_SESSION['token'] = $userinfo['content']['token'];
            $this->session->user_id = $userinfo['content']['id'];
            $s1['result'] = $userinfo['result'];
            $s1['content']['name'] = $userinfo['content']['name'];
            $s1['content']['status'] = $userinfo['content']['status'];
            if( $userinfo['content']['begin_use'] === '0'){
                $s1['content']['msg'] = $userinfo['content']['status_msg']['msg'];
            }
            $s1['content']['backto'] = $userinfo['content']['begin_use'];
            $s = json_encode($s1);

        }
        //返回数据给客户端
        h_echo_json($s);
    }
    //获取代理信息
    public function get_agent_detail(){
        $sdata = array();
        $aid = $this->input->get('aid');
        if(!$aid){
            $aid = 2;
        }
        $sdata['aid'] = $aid;
        $this->add_webapp_default_params($sdata,$_SESSION['token']);

        //请求接口
        $url=URL_API.'wx_product/get_agent_info_by_aid';

        $s=h_curl($url,$sdata);
        h_echo_json($s);

    }

}    