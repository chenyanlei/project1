<?php
namespace Home\Controller;
use Think\Controller;
class DetailsController extends Controller {
    public function index(){
        $_SESSION['url']=$_SERVER['REQUEST_URI'];
        $uid = $_SESSION['id'];
    	//接收id
    	$id = I('get.id');
    	// var_dump($id);
    	//创建模板
    	$det = M('goods');
    	$brand = M('brand');
    	$cate = M('cate');
        $web=M('webconfig');
        $webinfo=$web->where('enable=1')->find();
    	$detail = $det->where('sdc_goods.id='.$id)->join('sdc_gdetail on sdc_goods.id=sdc_gdetail.gid')->select();
        foreach($_SESSION['cart'] as $k=>$v){
                $goodsinfo=$det->find($v['gid']);
                $goodsinfo['num']=$v['num'];
                $cartgood[]=$goodsinfo;
            }
    
    	
    	//将二维数组变成一维数组
    	$details = $detail[0];

    	// var_dump($details);
    	//正则匹配img标签
    	$reg = '/<img.*?\/>/';
    	// //查询品牌授权  bname='御泥坊'
    	$map['bname']=$details['bname'];
    	$shou = $brand->where($map)->find();
    	$shouquan = $shou['shouquan'];
    	
    	//查询类名
    	$cname = $cate->where('id='.$details['cate'])->find();
    	
    	//处理图片标签字符串
    	$big  = $details['bigpics'];
    	$bigpics = explode('</p>',$big,-1);

    	//查询大家都喜欢买
    	$like = $det->where('bname='."'{$details['bname']}'". ' and id <>'.$details['id'])->select();
    	for($i=0;$i<count($like);$i++){
			
			$lid[]=$like[$i]['id'];
		}
        $gid1 = $like['0']['id'];
        $gid2 = $like['1']['id'];
        $gid3 = $like['2']['id'];
		$logo = $brand->where('bname = '."'{$like[0]['bname']}'")->find();
        // echo $brand->_sql();
		//随机去数组
		$also = array_rand($like,4);
        // var_dump($logo);
    	//查询类名
        //查父类id
        $pcate = $cate->where('id = '.$details['cate'])->find();
        $pids = $pcate['pid'];  
    	$cate = $cate->where('pid=' .$pids)->select();
    	for($i=0;$i<count($cate);$i++){
    		$cid[]=$cate[$i]['id'];
    	}
    	$ids = implode(',',$cid);

    	//查询同大类的商品
    	$same = $det->where('cate in('.$ids.') and id <>'.$details['id'])->select();
    	// var_dump($same);

    	//查询hot商品
    	$hot = $det->where('hot = 1 and id <>'.$details['id'])->select();

        //查询评论  只需要商品id 和发布口碑的用户uid
        $comment = M('comment');
        $user = M('user');
        $coms = $comment->where('gid = '.$id)->select();
        $numm = count($coms);
        //查询展示图
        $pdetail = M('pdetail');
        $pds = $pdetail->where('gid = '.$id)->select();
        foreach ($pds as $kk => $vv) {
           $pdss[] = $vv['pic'];
        }




    	

    	$this->assign('details',$details);
    	$this->assign('bigpics',$bigpics);
    	$this->assign('cname',$cname);
    	$this->assign('like',$like);
    	$this->assign('also',$also);
    	$this->assign('lid',$lid);
    	$this->assign('logo',$logo);
    	$this->assign('same',$same);
    	$this->assign('hot',$hot);
        $this->assign('shouquan',$shouquan);
        $this->assign('numm',$numm);
        $this->assign('id',$id);
        $this->assign('uid',$uid);
        $this->assign('coms',$coms);
        $this->assign('pdss',$pdss);
        $this->assign('comms',$comms);
        $this->assign('gid1',$gid1);
        $this->assign('gid2',$gid2);
    	$this->assign('gid3',$gid3);
        $this->assign('cartgood',$cartgood);   
        $this->assign('webinfo',$webinfo);
    	
     	$this->display();
    }

    
}