<?php
namespace Admin\Controller;
use Think\Controller;
class BestcommentController extends CommonController {

	public function index(){
		$comment = M('comment');
		$cominfo = $comment->where('best=1')->order('id desc')->select();
		// echo $comment->_sql();
		//查询商品和用户名称
		foreach ($cominfo as $key => $value) {
			$gids[] = $value['gid'];
			$uids[] = $value['uid'];
		}
		$gid = implode(',',$gids);
		$uid = implode(',',$uids);
		$this->assign('cominfo',$cominfo);
		
		
		$this->display();

	}

	public function add(){
		$this->display();
	}
	public function insert(){
    	$_POST['effect'] = implode(',',$_POST['effect']);
    	//如果内容中有图片,则提取出来图片用来展示
    	// $imgs = $_POST['content'];
    	// $reg = '/\/P.*?.jpg/';
    	// preg_match_all($reg, $_POST['content'], $matches);
    	// $showimgs = implode(',',$matches['0']);
    	
    	//实例化对象,插入数据库
    	$comment = M('comment');
		$comment->create();
		
    	if($comment->add()){
    		
			$this->success('精品报告添加成功',U('Admin/Bestcomment/index'),3);
		}else{
			$this->error('精品报告添加失败',U('Admin/Bestcomment/add'),3);
		}

    }

    public function editor(){
    	$id = I('get.id');
    	//查询口碑表里的数据
    	$com = M('comment');
    	$cominfos = $com->where('id='.$id)->find();
    	$effect = explode(',',$cominfos['effect']);

    	$this->assign('cominfos',$cominfos);
    	$this->assign('effect',$effect);
    	$this->assign('id',$id);
    	// var_dump($effect);
		$this->display();
	}

	public function update(){
		var_dump($_POST);die;
		//创建  new Model();
		$comment = M('comment');
		// 处理effect字段
		if(!empty($_POST['effect'])){
			$_POST['effect'] = implode(',', $_POST['effect']);
		}
		// var_dump($_POST);die;
		$comment->create();
		if($comment->save()){
			$this->success('报告更新成功',U('Admin/Bestcomment/index'),5);
		}else{
			$this->error('报告更新失败',U('Admin/Bestcomment/editor/id/'.$_POST['id']),3);
		}
	}

	public function delete(){
		//获取id
		$id = I('get.id');
		$comment = M('comment');
		$res = $comment->table('sdc_comment')->delete($id);
	
		//判断
		if($res){
			$this->success('删除成功',U('Admin/Bestcomment/index'),3);
			//删除相应图片
			// unlink('..'.$spic['spic']);
		}else{
			$this->error('删除失败',U('Admin/Bestcomment/index'),3);
		}
	}
}


?>