<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
	
	//用户个人中心编辑
	public function index(){
		
		$web=M('webconfig');
        $webinfo=$web->where('enable=1')->find();
		$user = M('user');
		
		$id = I('get.id');
	
		$info = $user->where('id='.$id)->find();
		//查找收藏
		$coll=M('collect');
		$coll=$coll->field('gid')->where(' uid='.$id)->select();
		for($i=0;$i<count($coll);$i++){
				$collid[]=$coll[$i]['gid'];
		}

		//查找收藏商品
		$colgood=M('goods');
		$map['id']=array('in',$collid);
		$count=$colgood->where($map)->count();

		$page = new \Think\Page($count,6);// 实例化分页类 
		//获取limit参数
		$limit = $page->firstRow.','.$page->listRows;

		//获取页码信息
		$pages = $page->show();
		$totalPages = $page->totalPages;
		$nowPage = $page->nowPage;
		
		$colgoods=$colgood->limit($limit)->where($map)->select();
		//订单列表
		$order=M('order');
		$uid=$id;
		$orders=$order->where('uid='.$uid)->select();

		foreach($orders as $k=>$v){
			$orderlist=M('orderlist');
			$data['order_id']=array('in',$v['id']);
			$listinfo[$v['id']]=$orderlist->where($data)->select();
		}
		
		//会员等级
		$user = M('user');
    	$uinfo = $user->where('sdc_user.id='.$uid)->join('sdc_userinfo on sdc_user.id=sdc_userinfo.uid')->find();

    	
    	$this->assign('uinfo',$uinfo);
		$this->assign('orders',$orders);
		$this->assign('listinfo',$listinfo);
		$this->assign('colgoods',$colgoods);
		$this->assign('info', $info);
		$this->assign('count',$count);
		$this->assign('pages',$pages);
		$this->assign('totalPages',$totalPages);
		$this->assign('nowPage',$nowPage);
		$this->assign('url', $url);
		$this->assign('webinfo',$webinfo);
		$this->assign('id',$id);
		$this->display();
	}
	//用户注册
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
	public function checkpass(){

		$user = M('user');
		
		$map['id']=I('post.id');
		$map['password']=md5(I('post.password'));
		$info = $user->where($map)->find();
		if($info){
			echo 1;
		}else{
			echo 0;
		}

	}
	public function insert(){
		$userinfo=M('userinfo');
		$user = M('user');
		$_POST['password']=md5($_POST['password']);
		
		$user->create();
		
		$lastid=$user->add();
		
		$_POST['uid']=$lastid;
		$userinfo->create();
		$res=$userinfo->add();
		if($lastid && $res){
			redirect('login');
		}

	}
	
	//更新操作
	public function update(){
		
		$user = M('user');
		if($_POST['password']){
			$_POST['password']=md5(I('post.password'));
		}
		$id=I('post.id');
		//创建数据
		$user->create();
		//执行更新
		$res=$user->save();


		//判断
		if($res){
			$this->success('更新成功',U('Home/User/index',array('id'=>$id)),3);
		}else{
			$this->error('更新失败',U('Home/User/index',array('id'=>$id)),3);
		}
	}



	//用户登录
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
		$info=$user->where("phone='%s' and password='%s'",$phone,$password)->find();
		
		//检测  如果用户存在的话
		if(!empty($info)){
		
			$_SESSION['phone'] = $info['phone'];
			$_SESSION['id'] = $info['id'];
			echo 1;
			if($_SESSION['url']){
				redirect($_SESSION['url']);
			}else{
				redirect('/');
			}	
			
	
		}
	}
	//退出登陸
	 public function loginout(){
        session('id',null);
      	session('username',null);
      
      if($_SESSION['url']){
			redirect($_SESSION['url']);
		}else{
			redirect('Home/Index/index');
		}	

    }
  



}