<?php

namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

	public function _initialize(){
		
		$id = session('uid');
		if(empty($id)){

			$this->error('您还没有登陆 !!!', U('Admin/Login/login'),3);
		}
		//检测用户是否拥有权限
		$AUTH = new \Think\Auth();
		//类库位置应该位于ThinkPHP\Library\Think\
		if(!$AUTH->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, session('uid'))){
		       $this->error('没有权限',U('Admin/Login/login'));
		}

	}


}