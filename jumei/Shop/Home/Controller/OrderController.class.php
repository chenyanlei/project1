<?php
namespace Home\Controller; 
use Think\Controller;
class OrderController extends Controller {

	public function order(){
		$order=M('order');
		// $uid=$_SESSION['id'];
		$uid=I('get.id');
		$orders=$order->where('uid='.$uid)->select();

		foreach($orders as $k=>$v){
			$orderlist=M('orderlist');
			$data['order_id']=array('in',$v['id']);
			$listinfo[$v['id']]=$orderlist->where($data)->select();
		}
		

		$this->assign('orders',$orders);
		$this->assign('listinfo',$listinfo);
		$this->display();
	}


}