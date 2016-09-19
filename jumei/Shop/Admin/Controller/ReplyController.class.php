<?php
namespace Admin\Controller;
use Think\Controller;
class ReplyController extends Controller {
    public function index(){
    	//查询回复表内容
    	$reply = M('reply');
    	$replyinfo = $reply->order('id desc')->select();
    	$this->assign('replyinfo',$replyinfo);
    	$this->display();
    }

    public function editor(){
    	$id = I('get.id');
    	//查询回复表里的数据
    	$reply = M('reply');
    	$replyinfo = $reply->where('id ='.$id)->find();

    	$this->assign('replyinfo',$replyinfo);
    	$this->assign('id',$id);
    	// var_dump($effect);
		$this->display();
	}

	public function update(){
		//创建  new Model();
		$reply = M('reply');
	
		$reply->create();
		if($reply->save()){
			$this->success('回复更新成功',U('Admin/Reply/index'),3);
		}else{
			$this->error('回复更新失败',U('Admin/Reply/editor/id/'.$_POST['id']),3);
		}
	}

	public function delete(){
		//获取id
		$id = I('get.id');
		$reply = M('reply');
		$res = $reply->table('sdc_reply')->delete($id);
	
		//判断
		if($res){
			$this->success('删除成功',U('Admin/Reply/index'),3);
			
		}else{
			$this->error('删除失败',U('Admin/Reply/index'),3);
		}
	}

}