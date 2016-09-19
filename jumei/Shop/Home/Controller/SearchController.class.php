<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {

	//展示搜索页面
	public function index(){
		$_SESSION['url']=$_SERVER['REQUEST_URI'];
		$gname=I('get.gname');
		$price=I('get.price');

		$cate_id=I('get.cate');
		$cate=M('cate');
		$lay=$cate->where('id='.$cate_id)->find();
		$web=M('webconfig');
        $webinfo=$web->where('enable=1')->find();
		//如果是顶级分类
		if($lay['layer']==1){
			$lay1=$cate->where('layer=1')->select();
			
			$cates=$cate->where("pid='".$cate_id."'")->select();

			$cateinfo=$cates;

			for($i=0;$i<count($cates);$i++){
				$layer[]=$cate->where("path='".$cates[$i]['path'].",".$cates[$i]['id']."'")->select();
			}	
			foreach($layer as $k=>$v){
				
				for($i=0;$i<count($v);$i++){
					
					$cates_id[]=$v[$i]['id'];
				}
				
			}	
		//二级分类			
		}else if($lay['layer']==2){
			$layp=$cate->where('id='.$lay['pid'])->find();
			$lays=$cate->where('pid='.$layp['id'])->select();
			$layer=$cate->where("path='".$lay['path'].",".$lay['id']."'")->select();

			$cateinfo=$layer;
			foreach($layer as $k=>$v){			
					$cates_id[]=$v['id'];
			}
		//三级分类
		}else if($lay['layer']==3){

			$lays2=$cate->where('id='.$lay['pid'])->find();
			$layg=$cate->where('pid='.$lays2['id'])->select();
			$layp=$cate->where('id='.$lays2['pid'])->find();
			$lays=$cate->where('pid='.$layp['id'])->select();		
			$cates_id[]=$cate_id;
		}else{
			$map['title']=array('like',"%{$gname}%");
			$god=M('goods');
			 $arr=array();
            foreach($_SESSION['cart'] as $k=>$v){
                $goodsinfo=$god->find($v['gid']);
                $goodsinfo['num']=$v['num'];
                $cartgood[]=$goodsinfo;
            }
			$count=$god->where($map)->count();
			//获取每页显示的数量
			$num = !empty($_GET['num']) ? $_GET['num'] : 8;
			//实例化分页对象
			$page = new \Think\Page($count,$num);// 实例化分页类 
			//获取limit参数
			$limit = $page->firstRow.','.$page->listRows;
			
			//获取页码信息
			$pages = $page->show();
			$totalPages = $page->totalPages;
			$nowPage = $page->nowPage;
			$goods=$god->where($map)->limit($limit)->select();
			$this->assign('pages',$pages);
			$this->assign('goods',$goods);
			$this->assign('cartgood',$cartgood); 
			$this->display();
			return true;
		}
		//收藏商品
		$uid=session('id');
		if($uid){
			
			$coll=M('collect')->field('gid')->where(' uid= '.$uid)->select();
			for($i=0;$i<count($coll);$i++){
				$collid[]=$coll[$i]['gid'];
			}

			$this->assign('collid',$collid);
		}
		
		$good=M('goods');
		 $arr=array();
            foreach($_SESSION['cart'] as $k=>$v){
                $goodsinfo=$good->find($v['gid']);
                $goodsinfo['num']=$v['num'];
                $cartgood[]=$goodsinfo;
            }
		$url='/cate/'.$cate_id;
		if(!empty($price) && I('get.delete')!=1){
			$url.='/price/'.$price;
			if($price==1400){
				$map['price']=array('gt',intval($price));
			}else{
				$arr1=explode('-',$price);
				foreach($arr1 as $k=>$v){
					$arr[]=intval($v);
				}
				$map['price']  = array('between',$arr);
			}
			$this->assign('price',$price);
			// echo "<script type='text/javascript'> var data=1;var ptitle='{$price}';</script>";
		}else{
			unset($price);
		}
		if(!empty($gname)){
			$map['title']=array('like',"%{$gname}%");
		}
		//价格排序
		if($_GET['sort']){
			if($_GET['sort']=='up'){
				$order='price';
				$this->assign('sort','up');
			}else{
				$order='price desc';
				$this->assign('sort','down');
			}
		}
		$map['cate']  = array('in',$cates_id);
		$count=$good->where($map)->count();
		//获取每页显示的数量
		$num = !empty($_GET['num']) ? $_GET['num'] : 8;
		//实例化分页对象
		$page = new \Think\Page($count,$num);// 实例化分页类 
		//获取limit参数
		$limit = $page->firstRow.','.$page->listRows;
		
		//获取页码信息
		$pages = $page->show();
		$totalPages = $page->totalPages;
		$nowPage = $page->nowPage;

		if($order){
			$goods=$good->limit($limit)->order($order)->where($map)->select();
		}else{
			$goods=$good->limit($limit)->where($map)->select();
		}
		$this->assign('url',$url);
		$this->assign('lay',$lay);
		$this->assign('layp',$layp);
		$this->assign('lays',$lays);
		$this->assign('layg',$layg);
		$this->assign('lay1',$lay1);
		$this->assign('lays2',$lays2);
		$this->assign('cateinfo',$cateinfo);
		$this->assign('pages',$pages);//
		$this->assign('totalPages',$totalPages);//
		$this->assign('nowPage',$nowPage);//
		$this->assign('goods',$goods);
		$this->assign('cartgood',$cartgood);   
		$this->assign('count',$count);
		$this->assign('webinfo',$webinfo);
		$this->display();
		
		
	}
	


	
}