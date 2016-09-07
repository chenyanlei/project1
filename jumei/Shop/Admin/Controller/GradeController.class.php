<?php
namespace Admin\Controller;
use Think\Controller;
class GradeController extends Controller {
    public function index(){
    	$uid = $_SESSION['id'];
    	//查询订单表里的总消费
    	$order = M('order');
    	$orderinfo = $order->where('uid = '.$uid)->select();
    	foreach ($orderinfo as $key => $value) {
    		$total[] = $value['totalprice'];
    	}
    		
    	foreach ($total as $kk => $vv) {
    		$sum += $vv;
    	}
        
    	if($sum < 4500){
    		$grade = '普通会员';
    	}elseif($sum >= 8469){
    		$grade = '钻石会员';
    	}elseif($sum >= 6700){
    		$grade = '白金会员';
    	}else{
    		$grade = '黄金会员';
    	}
    	// var_dump($orderinfo);
    	//把总钱数更新userinfo
    	$uinfo = M('userinfo');
        $_POST['grade'] = $grade;
    	$_POST['sum'] = $sum;
    	$num = $uinfo->where('uid = '.$uid)->save($_POST);
    	
    	//查询用户表
    	$user = M('user');
    	$userinfo = $user->join('sdc_userinfo on sdc_userinfo.uid = sdc_user.id')->select();

    	$this->assign('userinfo',$userinfo);
    	$this->display();
    }

    public function editor(){
    	$uid = I('get.id');
    	//查询用户表
    	$user = M('user');
    	$userinfo = $user->where('sdc_user.id = '.$uid)->join('sdc_userinfo on sdc_userinfo.uid = sdc_user.id')->find();
		echo $user->_sql();
    	var_dump($userinfo);
		$this->assign('userinfo',$userinfo);
    	$this->assign('id',$uid);
		$this->display();
	}




}