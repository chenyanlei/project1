<?php

namespace Admin\Controller;
use Think\Controller;
class JoinController extends Controller {
	//职位列表
	public function index(){
		$work=M('join');
		$works=$work->select();
		$this->assign('works',$works);
		$this->display();
	}
	//职位添加
	public function add(){
		$this->display();
	}
	//执行添加
	public function insert(){
		$work=M('join');
		$work->create();

		if($work->add()){
			$this->success('添加成功',U('Admin/Join/index'),3);
		}else{
			$this->error('添加失败',U('Admin/Join/add'),3);
		}
	}

	//职位编辑
	public function edit(){
		
		$work=M('join');
		$id=I('get.id');
		$info=$work->find($id);
		$this->assign('info',$info);
		$this->display();
	}

	//执行更新
	public function update(){
		$id=I('post.id');
		$work=M('join');
		$work->create();
		if($work->save()){
			$this->success('更新成功',U('Admin/Join/index'),3);

		}else{
			$this->error('更新失败',U('Admin/Join/edit',array('id'=>$id)),3);
		}

	}

	//删除职位操作
	function delete(){
		$work=M('join');
		$id=I('get.id');
		if($work->delete($id)){
			$this->success('删除成功',U('Admin/Join/index'),3);
		}else{
			$this->error('删除失败',U('Admin/Join/index'),3);
		}

	}

}	