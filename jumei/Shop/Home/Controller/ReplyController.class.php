<?php
namespace Home\Controller;
use Think\Controller;
class ReplyController extends Controller {
    public function index(){
        $_SESSION['url']=$_SERVER['REQUEST_URI'];
    	//获得当前登录用户的id
    	$nowuid = $_SESSION['id'];
    	//获得口碑的用户id和商品id
    	$gid = I('get.gid');
    	$uid = I('get.uid');
    	//查询用户信息
    	$user = M('user');
    	$userinfo = $user->where('id = '.$uid)->find();
    	//查询商品信息
    	$goods = M('goods');
    	$goodsinfo = $goods->where('id = '.$gid)->find();
    	//查询口碑信息
    	$comment = M('comment');
    	$cominfo = $comment->where('gid = '.$gid.' and uid = '.$uid)->find();
    	//分开功效
    	$effect = explode(',',$cominfo['effect']);
    	//获取此商品下口碑的数量
    	$coms = $comment->where('gid = '.$gid)->select();
    	$num = count($coms);
    	//查询同分类下的商品
        //查父类id
        $cate = M('cate');
        $pcate = $cate->where('id = '.$goodsinfo['cate'])->find();
        $pids = $pcate['pid'];  
    	$cate = $cate->where('pid=' .$pids)->select();
    	for($i=0;$i<count($cate);$i++){
    		$cid[]=$cate[$i]['id'];
    	}
    	$ids = implode(',',$cid);
    	//查询商品表
    	$hot = $goods->where('cate in ('.$ids.')')->select();

    	//查询同品牌商品
    	$same = $goods->where('bname = '."'{$goodsinfo['bname']}'")->select();

    	//查询该商品的所有口碑数量
    	$allcom = $comment->where('gid = '.$gid)->select();
    	$allnum = count($allcom);

    	//查询回复
    	$reply = M('reply');
    	$replyinfo = $reply->where('cid = '.$cominfo['id'])->order('id desc')->select();
    	foreach ($replyinfo as $key => $value) {
    		$name[] = $user->where('id = '.$value['uid'])->select();
    	}
    	foreach ($name as $kkk => $vvv) {
    		foreach ($vvv as $ks => $vs) {
    		$names[] = $vs['username'];
    			
    		}
    	}
    	// var_dump($names);
    	// var_dump($replyinfo);

    	//查询当前用户的信息
    	$user = M('user');
    	$nowuser = $user->where('id = '.$nowuid)->find();

    	// var_dump($nowuser);
    	$this->assign('userinfo',$userinfo);
    	$this->assign('goodsinfo',$goodsinfo);
    	$this->assign('cominfo',$cominfo);
    	$this->assign('coms',$coms);
    	$this->assign('effect',$effect);
    	$this->assign('hot',$hot);
    	$this->assign('same',$same);
    	$this->assign('allnum',$allnum);
    	$this->assign('allcom',$allcom);
    	$this->assign('nowuid',$nowuid);
    	$this->assign('replyinfo',$replyinfo);
    	$this->assign('nowuser',$nowuser);
    	$this->assign('names',$names);
    	$this->assign('uid',$uid);



    	$this->display();
    }

    public function insert(){
    	var_dump($_POST);
    	$reply = M('reply');
    	$reply->create();
    	$newid = $reply->add();
    	if($newid){
    		$uid = $reply->where('id = '.$newid)->find();
    		redirect('index/uid/'.$_POST['comuid'].'/gid/'.$_POST['gid']);
    	}else{
    		echo $reply->_sql();die;
    		redirect('index/uid/'.$_POST['uid'].'/gid/'.$_POST['gid'],2,'回复失败');
    	}
    	
    }
}
?>