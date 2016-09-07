<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {

	//展示后台登陆页面
	public function login(){
		$this->display();
	}
	
	//用户的登陆操作
	public function loginin(){
	
		//创建用户模型
		$user = M('user');
		// //查找数据库
		$phone=I('post.username');
		$password=md5(I('post.password'));
		$info1=$user->where("phone='%s' and password='%s'",$phone,$password)->find();
		
		//检测  如果用户存在的话
		if(!empty($info)){
			$_SESSION['username'] = $info['username'];
			$_SESSION['id'] = $info['id'];
			echo 1;

		}else if(!empty($info1)){
			session_start();
			$_SESSION['username'] = $info1['phone'];
			$_SESSION['id'] = $info1['id'];
			echo 1;

		}else{
			echo 0;
			
		}
	}

	 public function loginout(){
        session('id',null);
      	session('username',null);
        $this->redirect("Index/index");
    }

	
}