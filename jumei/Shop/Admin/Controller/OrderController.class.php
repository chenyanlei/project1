<?php
namespace Admin\Controller;
use Think\Controller;

class OrderController extends Controller{

	//订单列表
	public function order(){

		$ord = M('order');

		$res = $ord->select();

		$this->assign('res',$res);

		$this->display();

	}

	public function detail(){

		$id = $_GET['id'];

		$det = M('order');

		$info = $det->where('id='.$id)->find();

		$infos = $det->field('sdc_goods.id,sdc_goods.spic,sdc_goods.gname,sdc_goods.price,sdc_order.gnum,sdc_order.gprice,sdc_order.paytype')->where('sdc_order.id='.$id)->join('sdc_goods on sdc_goods.id in ('.$info['gid'].')')->select();

		foreach($infos as $k=>$v){

			$gnum = explode(',',$v['gnum']);
			$gprice = explode(',',$v['gprice']);
			$paytype = explode(',',$v['paytype']);
		}
		
		var_dump($in);
		$this->assign('infos',$infos);

		//商品数量
		$this->assign('gnum',$gnum);

		//商品小计
		$this->assign('gprice',$gprice);

		$this->display();
	}

}