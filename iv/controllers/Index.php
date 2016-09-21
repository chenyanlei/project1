<?php

/**
 * Created by IntelliJ IDEA.
 * User: junlei
 * Date: 16/04/26
 * Time: 下午9:59
 *
 * 
 * 
 *网站首页
 *
 */
class Index extends MY_Controller
{   
    private $m_page ;
    private $m_controller ;
    
	public function __construct()
    {
        parent::__construct();
    }
    //首页
    public function index(){

        if(isset($_SESSION['token'])){
            header('location:/index/home');
            return;
        } 
    	$this->load->view('index/index.html');
    }
    //注册成功页
    public function success(){

        $info=$this->is_login();
    	$this->load->view('index/success');
    }
    //登录后首页
    public function home(){
        if(!isset($_SESSION['token'])){
            header('location:/user/login');
            return;
        }
        $this->session->current_page = 6;
        $sdata= array();
        $this->add_default_params($sdata,$_SESSION['token']) ;
        //请求接口
        $url=URL_API.'commition/get_my_commition_by_date';

        $s=h_curl($url,$sdata);
        
        $info=json_decode($s,true);

        if($info['result']['err'] == 0){

            $data['list_price'] = json_encode($info['content']);

            $this->lang->load('info',$GLOBALS['language']) ;
            $data['tip_title']=$this->lang->line('txt_mainpage_title',FALSE);
            // $this->load->view('mall/recommend.html',$data);
            $this->load_view('statistics/statistics.html',$data);
        } else {
            $msg = $info['result']['err'].':'.$info['result']['msg'];
            $this->load_view_errors($msg);
        }

    }

    

}	