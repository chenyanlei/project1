<?php
namespace Home\Controller;
use Think\Controller;
class CommentController extends Controller {
    public function index(){
        $_SESSION['url']=$_SERVER['REQUEST_URI'];
    	//获取用户名
    	$uid = $_SESSION['id'];

    	$user = M('user');
    	$info = $user->where('id = '.$uid)->find();

    	$cate = M('cate');
    	$brand = M('brand');
    	$cates = $cate -> where('layer=2')->select();
    	$hucate = $cate -> where('layer=3 and pid between 7 and 12')->select();
    	$caicate = $cate -> where('layer=3 and pid between 17 and 26')->select();
    	$gecate = $cate -> where('layer=3 and pid between 31 and 39')->select();
    	$xcate = $cate -> where('layer=3 and pid between 27 and 30')->select();
    	$brands = $brand -> select(); 
    	foreach($brands as $k=>$v){
    		
    		if(strlen($brands[$k]['path']) > 4){
    			$bname[] = $v['bname'];
    		}
    	}
    	
    	
    	foreach($hucate as $k=>$v){
    		$huname[] = $hucate[$k]['name'];
    	}	
    	foreach($caicate as $k=>$v){
    		$cainame[] = $caicate[$k]['name'];
    	}
    	foreach($gecate as $k=>$v){
    		$gename[] = $gecate[$k]['name'];
    	}
    	foreach($xcate as $k=>$v){
    		$xname[] = $xcate[$k]['name'];
    	}
    	$this->assign('info',$info);
    	$this->assign('cates',$cates);
    	$this->assign('huname',$huname);
    	$this->assign('cainame',$cainame);
    	$this->assign('gename',$gename);
    	$this->assign('xname',$xname);
    	$this->assign('bname',$bname);
    	$this->assign('uid',$uid);
    	
     	$this->display();
    }

    public function house(){
    	//获取用户名  查询用户基本信息

    	$uid = $_SESSION['id'];
    	$user = M('user');
    	$info = $user->where('sdc_user.id='.$uid)->join('sdc_userinfo on sdc_user.id=sdc_userinfo.uid')->find();

    	//通过用户id查询用户收藏
    	$collect = M('collect');
    	$goods = M('goods');
    	$cols = $collect->where('uid = '.$uid)->select();
    	foreach ($cols as $key => $value) {
    		$gids[] = $value['gid'];
    	}
    	$gid = implode(',',$gids);
    	$detail = $goods->where('sdc_goods.id in('.$gid.')')->join('sdc_gdetail on sdc_goods.id=sdc_gdetail.gid')->select();

    	//查询订单表里的数据
    	$order = M('order');
    	$orders = $order->where("uid=".$uid." and comed = 0")->select();
    	
    	foreach ($orders as $key => $value) {
    		$orid[] = $value['id'];
    	}
    	$orids = implode(',',$orid);
        $orderlist = M('orderlist');
    	$orgoods = $orderlist->where('order_id in ('.$orids.')')->select();
        
    	//查询精品报告里的数据
    	$comment = M('comment');
        $coms = $comment->where('best = 1')->order('id desc')->select();
        foreach ($coms as $kk => $vv) {
            $shows[] = $vv['showimgs'];
        }
        foreach ($shows as $kt => $vt) {
            $sh[] = explode(',',$vt);
        }
       
    	$this->assign('info',$info);
    	$this->assign('uid',$uid);
    	$this->assign('detail',$detail);
        $this->assign('orgoods',$orgoods);
        $this->assign('coms',$coms);
        $this->assign('sh',$sh);

    	$this->display();
    }

    public function add(){
    	$uid = I('get.uid');
    	$gid = I('get.id');
    	$title = I('get.title');

    	$this->assign('title',$title);
    	$this->assign('gid',$gid);
    	$this->assign('uid',$uid);
    	$this->display();
    }

    public function insert(){

    	//获取评论状态comed 更新到订单表order里
    	$order = M('order');

    	$g = $_POST['gid'];
    	$data['comed'] = $_POST['comed'];

    	$order->where('gid = '.$g)->save($data);
			
    	$uid = $_SESSION['id'];
    	$_POST['effect'] = implode(',',$_POST['effect']);
        $_POST['cover'] = './Public/Uploads/20151020/'.$_POST['cover'];


        //获取内容里的所有图片
        $reg = '/\/j.*?.jpg/';
        preg_match_all($reg, $_POST['content'], $matches);
        $match =  $matches['0'];
        $_POST['showimgs'] = implode(',',$matches['0']);
        
    	//实例化对象,插入数据库
    	$comment = M('comment');
		$comment->create();
		
    	if($comment->add()){
			redirect('house');
		}else{
			$this->error('口碑发布失败',U('Home/Comment/add'),3);
		}

    }
}