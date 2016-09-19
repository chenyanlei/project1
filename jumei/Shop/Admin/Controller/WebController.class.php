<?php
namespace Admin\Controller;
use Think\Controller;
class WebController extends CommonController {
	
	//添加操作 
	public function add(){
		$this->display();
	}

	//执行添加操作
	public function insert(){
		
		$web = M('webconfig');
		var_dump($_POST);
		if($_FILES['logo']['error'] == 0){
			$upload = new \Think\Upload();   
			$upload->maxSize   =     3145728 ;  
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');    
			$upload->rootPath = '../jumei/Public';
			$upload->savePath  =      '/Logo/';     
			$infos = $upload->upload();
			if(!$infos) {       
				$this->error($upload->getError(),'',3);    
			}else{        
				$_POST['logo'] = ltrim($upload->rootPath,'.').$infos['logo']['savepath'].$infos['logo']['savename'];
			}
		}
		
		$web->create();
		if($web->add()){
			$this->success('添加成功',U('Admin/Web/index'),3);
		}else{
			
			$this->error('添加失败',U('Admin/Web/index'),3);
		}
	}

	public function index(){
		
		$web = M('webconfig');
	
		$webs = $web->select();
		$this->assign('webs', $webs);
	
		$this->display();
	}
	//编辑操作
	public function edit(){
		
		$web = M('webconfig');
	
		$id = I('get.id');
		$info = $web->where('id='.$id)->find();
	
		$this->assign('info', $info);
		$this->display();
	}
	//更新操作
	public function update(){
		$web = M('webconfig');
		$id=I('post.id');
		if($_FILES['logo']['error'] == 0){
			$upload = new \Think\Upload();  
			$upload->maxSize   =     3145728 ;  
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');   
			$upload->rootPath = '../jumei/Public';
			$upload->savePath  =      '/Logo/';     
			$infos = $upload->upload();
			if(!$infos) {        
				$this->error($upload->getError(),'',3);    
			}else{       
				$_POST['logo'] = ltrim($upload->rootPath,'.').$infos['logo']['savepath'].$infos['logo']['savename'];
			}
		}
		
		$web->create();
		
		$res = $web->save();
		
		//判断
		if($res){
			$this->success('更新成功',U('Admin/Web/index'),3);
		}else{
		
			$this->error('更新失败',U('Admin/Web/edit',array('id'=>$id)),3);
		}
	}	
	//删除操作
	public function delete(){
		$id = I('get.id');
		
		$web = M('webconfig');
		
		$one =$web->delete($id);
	
		if($one){
			
			$this->success('删除成功',U('Admin/Web/index'),3);
		}else{
			
			$this->error('删除失败',U('Admin/Web/index'),3);
		}
	}



}