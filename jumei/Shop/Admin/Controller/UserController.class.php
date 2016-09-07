<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends CommonController {
	
	//添加操作 
	public function add(){
		$this->display();
	}

	//执行添加操作
	public function insert(){
		
		$user = M('user');
		$_POST['password']=md5(I('post.password'));
		if($_FILES['pic']['error'] == 0){
			$upload = new \Think\Upload();   
			$upload->maxSize   =     3145728 ;  
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');    
			$upload->rootPath = './Public';
			$upload->savePath  =      '/Uploads/';     
			$infos = $upload->upload();
			if(!$infos) {       
				$this->error($upload->getError(),'',3);    
			}else{        
				$_POST['pic'] = ltrim($upload->rootPath,'.').$infos['pic']['savepath'].$infos['pic']['savename'];
			}
		}
		
		
		if($user->add()){
			$this->success('添加成功',U('Admin/User/index'),3);
		}else{
			$this->error('添加失败',U('Admin/User/index'),3);
		}
	}

	public function index(){
		
		$user = M('user');
	
		$users = $user->select();
		$this->assign('users', $users);
	
		$this->display();
	}
	//编辑操作
	public function edit(){
		
		$user = M('user');
	
		$id = I('get.id');
		$info = $user->where('id='.$id)->find();
	
		$this->assign('info', $info);
		$this->display();
	}
	//更新操作
	public function update(){
		
		
		$_POST['password']=md5(I('post.password'));
		$user = M('user');
	
	
		if($_FILES['pic']['error'] == 0){
			$upload = new \Think\Upload();  
			$upload->maxSize   =     3145728 ;  
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');   
			$upload->rootPath = '../jumei/Public';
			$upload->savePath  =      '/Uploads/';     
			$infos = $upload->upload();
			if(!$infos) {        
				$this->error($upload->getError(),'',3);    
			}else{       
				$_POST['pic'] = ltrim($upload->rootPath,'.').$infos['pic']['savepath'].$infos['pic']['savename'];
			}
			
			$r = $user->find($_POST['id']);
			$path = $r['pic'];
			
			@unlink('.'.$path);
		}else{
			return $_POST['pic'];
		}
		
		$user->create();
		
		$res = $user->save();

		//判断
		if($res){
			$this->success('更新成功',U('Admin/User/index'),3);
		}else{
		
			$this->error('更新失败',U('Admin/User/index'),3);
		}
	}	
	//删除操作
	public function delete(){
		$id = I('get.id');
		
		$m = new \Think\Model();
		$m->startTrans();
		$one = $m->table('sdc_user')->delete($id);
	
		if($one){
			$m->commit();
			$this->success('删除成功',U('Admin/User/index'),3);
		}else{
			$m->rollback();
			$this->error('删除失败',U('Admin/User/index'),3);
		}
	}



}