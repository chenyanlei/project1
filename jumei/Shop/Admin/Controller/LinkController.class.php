<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends Controller {

	public function index(){
		//查询友情链接信息
		$link = M('link');
		$linkinfo = $link->order(' id desc')->select();

		$this->assign('linkinfo',$linkinfo);
		$this->display();
	}

	public function add(){
		$this->display();
	}

	public function insert(){
    	$link = M('link');
		$link->create();
		
    	if($link->add()){
    		
			$this->success('友情链接添加成功',U('Admin/Link/index'),3);
		}else{
			$this->error('友情链接添加失败',U('Admin/Link/add'),3);
		}

    }

    public function editor(){
    	$id = I('get.id');
    	//查询友情链接信息
		$link = M('link');
		$linkinfo = $link->where('id ='.$id)->find();

		$this->assign('linkinfo',$linkinfo);
    	$this->assign('id',$id);
		$this->display();
	}

	public function update(){
		//创建  new Model();
		$link = M('link');
		
		$link->create();
		if($link->save()){
			$this->success('友情链接更新成功',U('Admin/Link/index'),5);
		}else{
			$this->error('友情链接更新失败',U('Admin/Link/editor/id/'.$_POST['id']),3);
		}
	}

	public function delete(){
		//获取id
		$id = I('get.id');
		$link = M('link');
		$res = $link->table('sdc_link')->delete($id);
	
		//判断
		if($res){
			$this->success('删除成功',U('Admin/Link/index'),3);
		}else{
			$this->error('删除失败',U('Admin/Link/index'),3);
		}
	}


}