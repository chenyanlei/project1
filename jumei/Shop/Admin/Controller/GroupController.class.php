<?php

namespace Admin\Controller;
use Think\Controller;
class GroupController extends Controller {
	//用户组列表
	public function index(){
		$group=M('think_auth_group');
		$groups=$group->select();
		$this->assign('groups',$groups);
		$this->display();
	}

	//用户组添加
	public function add(){
		$this->display();
	}

	//执行添加
	public function insert(){
		$group=M('think_auth_group');
		$group->create();

		if($group->add()){
			$this->success('添加成功',U('Admin/Group/index'),3);
		}else{
			$this->error('添加失败',U('Admin/Group/add'),3);
		}
	}
	//用户组编辑
	public function edit(){
		
		$group=M('think_auth_group');
		$id=I('get.id');
		$groups=$group->find($id);
		$this->assign('groups',$groups);
		$this->display();
	}

	//执行更新
	public function update(){
		$id=I('post.id');
		$group=M('think_auth_group');
		$group->create();
		if($group->save()){
			$this->success('更新成功',U('Admin/Group/index'),3);

		}else{
			$this->error('更新失败',U('Admin/Group/edit',array('id'=>$id)),3);
		}

	}
	//删除操作
	function delete(){
		$group=M('think_auth_group');
		$id=I('get.id');
		if($group->delete($id)){
			$this->success('删除成功',U('Admin/Group/index'),3);
		}else{
			$this->error('删除失败',U('Admin/Group/index'),3);
		}

	}
}