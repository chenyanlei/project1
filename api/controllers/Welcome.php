<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model') ;
	}

	public function index(){
		$this->lang->load('info',$GLOBALS['language']) ;
		$data['username']=$this->lang->line('txt_username',FALSE) ;
		$data['password']=$this->lang->line('txt_password',FALSE) ;
		$data['login_title']=$this->lang->line('txt_login_title',FALSE) ;
		$data['title']=$this->lang->line('txt_login_title',FALSE) ;
		$data['page_foget_password']=base_url()."welcome/page_foget_password";
		$data['page_register']=base_url()."welcome/page_register";
		$data['login_url']=base_url()."welcome/login" ;
		$data['mainpage']=base_url()."welcome/mainpage" ;
		$this->load_view('/login/page_login',$data);
	}

	//首页
	public function mainpage() {
		$this->lang->load('info',$GLOBALS['language']) ;
		$data['title']=$this->lang->line('txt_mainpage_title',FALSE) ;
		$this->load_view('mainpage',$data);
	}

	//忘记密码
	public function page_foget_password() {

	}

	public function login() {
		//获取用户信息
		$name =	$this->input->get_post('name') ;
		$password = $this->input->get_post('pwd') ;
		if(!isset($name) || strlen($name)<=0 || !isset($password) || strlen($password) <=0) {
			$this->index($name, $password) ;
			return;			
		}

		//判断用户是否存在
		if(!$this->user_model->is_exist($name, $password) ) {
			h_echo_json(Ecode::LOGIN_USER_NOT_EXIST);
			return ;
		}

		//获取用户信息
		$user_info = $this->user_model->check_user_login($name, $password);
		$user_info?h_echo_json(0,$user_info):h_echo_json(ECode::LOGIN_GET_USER_INFO_FAILED) ;
	}

	// 检查用户名和密码
	private function check_username_pwd($username , $password) {
		$user_info = $this->user_model->check_user_login($username, $password);
		if(!$user_info) {
			return FALSE ;
		}

		return TRUE ;
	}

	//注册页面
	public function page_register() {
		$data['login']=base_url()."welcome/login" ;
		$this->lang->load('info',$GLOBALS['language']) ;
		$data['username']=$this->lang->line('username',FALSE) ;
		$data['password']=$this->lang->line('password',FALSE) ;
		$data['login_title']=$this->lang->line('login_title',FALSE) ;
		$data['title']=$this->lang->line('register_title',FALSE) ;
		$data['page_login']=base_url()."welcome/page_foget_password";
		$data['page_register']=base_url()."welcome/page_register";
		$data['register']=base_url()."welcome/page_register";


//		$this->load->view('header', $data) ;
//		$this->load->view('/login/page_register', $data) ;
//		$this->load->view('footer', $data) ;
		$this->load_view('/login/page_register',$data);
	}

	public function register() {
		$username = $this->input->post('name') ; 
		$pwd = $this->input->post('pwd') ; 
		$repwd = $this->input->post('re_pwd') ;
		if(empty($username)) {
			$data['register'] = 'http://yakejiao.com/welcome/register' ;
			$data['username']='(please input username)';
			$this->load->view('register' , $data) ;
			return ;
		}
 		
		if(empty($pwd)) {
			$data['register'] = 'http://yakejiao.com/welcome/register' ;
			$data['pwd']='(please input password)';
			$this->load->view('register' , $data) ;
			return ;
		}
		
		if(empty($repwd)) {
			$data['register'] = 'http://yakejiao.com/welcome/register' ;
			$data['pwd']='(please  reinput password)';
			$this->load->view('register' , $data) ;
			return ;
		}

		// insert to db
		$result = $this->user_model->register($username, $pwd) ;
		var_dump($result) ;
	
		// to login page, and login
		$this->load->view('welcome') ;
	}

	//找回密码
	public function forget_pwd() {

		$this->load->view('forget_pwd',$data) ;
	}

	//中英文切换
	public function change_lang() {
		//session 改变为当前语言环境下的语言

		//刷新当前页面
	}

}

/* vim: set ts=4 sw=4 sts=4 noet: */
