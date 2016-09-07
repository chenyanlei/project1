<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {

	//展示后台登陆页面
	public function register(){
		$this->display();
	}
	public function checkup(){
		$user=M('user');
		$phone = I('post.phone');
		$info = $user->where(" phone = '{$phone}' ")->find();
		if(!empty($info)){
			echo 1;
		}else{
			echo 0;
		}


	}
	
	public function checkVerify($code, $id = ''){
		 $code=I("post.code");
		$verify = new \Think\Verify();    
		 if($verify->check($code)){
		 	echo 1;
		 }else{
		 	echo 0;
		 }
	}
	public function insert(){
		
		$user = M('user');
		$_POST['password']=md5($_POST['password']);
		
		$user->create();
		

		if($user->add()){

			$this->success('用户添加成功',U('Home/Login/login'),3);
		}else{
			 echo ($user->_sql());
			$this->error('用户添加失败',U('Home/Register/register'),3000000);
		}

	}


	
}