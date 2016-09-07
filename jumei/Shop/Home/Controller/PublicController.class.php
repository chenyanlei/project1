<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {

	//生成验证码
	
	public function createVcode(){
		$Verify = new \Think\Verify();
		$Verify->imageW='200px';
		$Verify->imageH=0;
		$Verify->length   = 4;
		$Verify->fontSize = 30;
		$Verify->entry();
	}

}