<?php
namespace Home\Controller;
use Think\Controller;
class GradeController extends Controller {
	public function index(){
		$uid = $_SESSION['id'];
		$web=M('webconfig');
        $webinfo=$web->where('enable=1')->find();
		//查询用户会员等级
		$user = M('user');
    	$uinfo = $user->where('sdc_user.id='.$uid)->join('sdc_userinfo on sdc_user.id=sdc_userinfo.uid')->find();
		$this->assign('webinfo',$webinfo);
    	
    	$this->assign('uinfo',$uinfo);
// var_dump($uinfo);
		$this->display();
	}




}