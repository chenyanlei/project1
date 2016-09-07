<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {

	//展示搜索页面
	public function index(){
		$cate_id=I('get.cate');
		$cate=M('cate');
		$lay=$cate->where('id='.$cate_id)->find();
		//如果是顶级分类
		if($lay['layer']==1){
			$cates=$cate->where("pid='".$cate_id."'")->select();
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
			$layer=$cate->where("path='".$lay['path'].",".$lay['id']."'")->select();
			foreach($layer as $k=>$v){
					
					$cates_id[]=$v['id'];
			}
		//三级分类
		}else if($lay['layer']==3){
			
			$cates_id[]=$cate_id;

		}

		$good=M('goods');
		
		$map['cate']  = array('in',$cates_id);
		$goods=$good->where($map)->select();
		
		var_dump($goods);die;
		
		
		$this->assign('goods',$goods);
		$this->display();
		
		
	}
	


	
}