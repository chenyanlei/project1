<?php

namespace Admin\Controller;
use Think\Controller;
class RulesController extends Controller {
	//规则列表
	public function index(){
		$rule=M('think_auth_rule');
		$rules=$rule->select();
		$this->assign('rules',$rules);
		$this->display();
	}

	//添加规则
	public function add(){
		$this->display();
	}
	//执行添加
	public function insert(){
		$rule=M('think_auth_rule');
		$rule->create();

		if($rule->add()){
			$this->success('添加成功',U('Admin/Rules/index'),3);

		}else{
			$this->error('添加失败',U('Admin/Rules/add'),3);

		}

	} 

	//编辑规则
	public function edit(){
		$id=I('get.id');
		$rule=M('think_auth_rule');
		$rules=$rule->find($id);
		$this->assign('rules',$rules);
		$this->display();
	}

	//执行编辑
	public function update(){
		$id=I('post.id');
		$rule=M('think_auth_rule');
		$rule->create();
		if($rule->save()){
			$this->success('更新成功',U('Admin/Rules/index'),3);
		}else{
			$this->error('更新失败',U('Admin/Rules/index',array('id'=>$id)),3);

		}
	}
	//删除规则
	public function delete(){
		$id=I('get.id');
		$rule=M('think_auth_rule');
		if($rule->delete($id)){
			$this->success('删除成功',U('Admin/Rules/index'),3);	
		}else{
			$this->error('删除失败',U('Admin/Rules/index'),3);
		}
	}
}	
