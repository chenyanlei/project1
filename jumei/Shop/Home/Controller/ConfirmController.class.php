<?php
namespace Home\Controller;
use Think\Controller;

class ConfirmController extends Controller{

	public function firm_ajax(){

		$id = I('post.id');

		//创建模型
		$firm = M('address');

		//查询当前ID的地址信息

		$own = $firm->where('id='.$id)->find();

		echo json_encode($own);

	}

	public function update_ajax(){

		//创建模型

		$mo = M('address');

		$id = $_POST['id'];
		$uid = $_POST['uid'];

		//查询当前此条数据
		$info = $mo->where('id='.$id)->find();

		$mo->create();
		//执行更新操作
		$res = $mo->where('id='.$id)->save();
		if($res){
			$this->ajaxReturn(1);
			echo $res;
		}else{
			$this->ajaxReturn(0);
		}



	}

	//订单页面遍历的数据
	public function confirm(){
		
		$uid = $_SESSION['id'];

		$gi = $_GET['gid'];

		$gu = $_GET['gum'];

		$gum = explode(',',$gu);

		$count = count($gum);

		$gid = explode(',',$gi);

		

		$info = M('address');

		$gd = M('goods');

		$res = $info->where('uid='.$uid)->select();

		$map['id']=array('in',$gid);
		$goodsinfo=$gd->where($map)->select();
		$key = array_keys($gum);
		

		//分配变量
		$this->assign('res',$res);

		$this->assign('goodsinfo',$goodsinfo);

		$this->assign('count',$count);
		$this->assign('gum',$gum);

		//解析模板
		$this->display();
	}


	public function insert(){

		$aid = I('post.add_id');

		$ress = M('address');

		$infos = $ress->where('id='.$aid)->find();

		echo json_encode($infos);
		
		// $this->display();
	}


	//生成订单插入数据库
	public function ins(){

		//创建模型
		$ins = M('order');

		unset($_POST['id']);

		//用户ID
		$_POST['uid'] = $_SESSION['id'];

		//收货人电话
		$_POST['rephone'] = $_POST['phone'];
		//收货人姓名
		$_POST['rename'] = $_POST['name'];

		//收货人地址
		$_POST['readdres'] = $_POST['address'];

		//付款状态	0 未付款
		$_POST['status'] = 0;

		//是否付款_状态 0未付款
		$_POST['ispayment'] = 0;

		//付款方式
		$_POST['paytype'] = $_POST['gateway'];

		//运输方式
		$_POST['shiptype'] = '聚美自营快递';

		//送货时间
		$_POST['time'] = $_POST['prefer_delivery_day'];

		//评论状态
		$_POST['comed'] = '0';



		$num = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

		$count = count($num);

		$pho = $_POST['rephone'];

		//订单号为随机的两位字母+当前时间戳+随机打乱当前用户的手机号
		$_POST['buynumber'] = $num[rand(0,$count)].$num[rand(0,$count)].time().str_shuffle($pho);

		//订单提交日期
		$_POST['orderdate'] = time();
		// var_dump($_POST);die;


		//过滤数据
		$ins->create();

		$oid = $ins->add();
 	



		$num = $_POST['num'];

		foreach($_POST['gid'] as $k=>$v){

			$good=M('goods');

			$_POST=$good->find($v);

			unset($_POST['id']);
			$_POST['gid']=$v;

			$_POST['order_id']=$oid;

			$_POST['gnum']=$num[$k];

			$orderlist=M('orderlist');

			$orderlist->create();
			$orderlist->add();
			
			
			

		}

		

		redirect('pay');
	
	}

	//付款页
	public function pay(){
		$this->display();
	}

}


?>