<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

	//后台登陆页面
	public function login(){
		
		$this->display();

	}

	//用户登陆
	public function loginin(){
		$user = M('admin');
		$username = I('post.username');
		$password = md5(I('post.password'));

		$info = $user->where("password='%s' and username='%s'",array($password,$username))->find();
		if(!empty($info)){
			$_SESSION['username'] = $info['username'];
			$_SESSION['uid'] = $info['uid'];
			$this->success('恭喜您登陆成功', U('Admin/Index/index'),3);
		}else{
			$this->error('登陆失败', U('Admin/Login/login'),3);
		}
	}
	
	public function logout(){
		session('uid',null);
		$this->success('退出成功',U('Admin/Login/login'));
	}
}