<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {

	//管理员列表
	public function index(){

		$admin = M('admin');
		$admins = $admin->select();
		
		$this->assign('admins', $admins);
		$this->display();
	}
	
	//添加页模板
	public function add(){
		$this->display();
	}

	//执行添加操作
	public function insert(){
		
		$admin = D('admin');
		$_POST['password']=md5(I('post.password'));

		
		if(!$admin->create()){
			
	
			$info = $admin->getError();
			$this->error($info,'',3);
		}
		if($admin->add()){
			$this->success('添加成功',U('Admin/Admin/index'),3);
		}else{
			$this->error('添加失败',U('Admin/Admin/index'),3);
		}
	}

	//编辑操作
	public function edit(){
		
		$admin = M('admin');
		
		$id = I('get.id');
		
		$info = $admin->find($id);
		
		$this->assign('info', $info);
		$this->display();
	}
	//更新操作
	public function update(){
		// var_dump($_POST);die;
		$uid=I('post.uid');
		$admin = M('admin');
		$_POST['password']=md5(I('post.id'));
	
		$admin->create();
	
		$res = $admin->save();

		if($res){
			$this->success('更新成功',U('Admin/Admin/index'),3);
		}else{
			// echo $admin->_sql();die;
			$this->error('更新失败',U('Admin/Admin/edit',array('id'=>$uid)),3);
		}
	}	
	//删除操作
	public function delete(){
		//获取id
		$id = I('get.uid');

		$admin=M('admin');
		
		if($admin->delete($id)){
	
			$this->success('删除成功',U('Admin/Admin/index'),3);
		}else{
			
			$this->error('删除失败',U('Admin/Admin/index'),3);
		}
	}



}