<?php
namespace Home\Controller;
use Think\Controller;
class CollectController extends Controller { 

		
		//执行收藏
		public function insert(){
			
			$uid=session('id');
			$_POST['uid']=$uid;
			$gid=I('post.gid');
			$_POST['bid']='61';
			$data['uid']=$uid;
			$data['gid']=$gid;
			$coll=M('collect');

			$colls=$coll->where($data)->select();
			if($colls){
				$res=$coll->where($data)->delete();
				if($res){
					echo 2;
				}else{
					echo 3;
				}
			}else{
				
				$coll->create();
				if($coll->add()){
					echo 1;
				}else{
					echo 4;
				}			
			}
		}

		public function delete(){
			$coll=M('collect');
			$map['gid']=I('post.gid');
			
			$res=$coll->where($map)->delete();
			if($res){
				echo 1;
			}
		}
	

}	
 