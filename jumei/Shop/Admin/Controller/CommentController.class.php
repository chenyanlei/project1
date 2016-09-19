<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends CommonController {

	public function index(){
		$comment = M('comment');
		$cominfo = $comment->where(('best=0'))->order('id desc')->select();
		//查询商品和用户名称
		foreach ($cominfo as $key => $value) {
			$gids[] = $value['gid'];
			$uids[] = $value['uid'];
		}
		$gid = implode(',',$gids);
		$uid = implode(',',$uids);
		$this->assign('cominfo',$cominfo);
		
		// var_dump($cominfo);
		$this->display();

	}
	
	//添加操作  =>  如果不想在url中进行访问的话 这个时候声明private
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
			$this->success('口碑添加成功',U('Admin/Comment/index'),3);
		}else{
			$this->error('口碑添加失败',U('Admin/Comment/add'),3);
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
		//创建  new Model();
		$comment = M('comment');
		// 处理effect字段
		if(!empty($_POST['effect'])){
			$_POST['effect'] = implode(',', $_POST['effect']);
		}
		// var_dump($_POST);die;
		$comment->create();
		if($comment->save()){
			$this->success('口碑更新成功',U('Admin/Comment/index'),3);
		}else{
			$this->error('口碑更新失败',U('Admin/Comment/editor/id/'.$_POST['id']),3);
		}
	}

	public function delete(){
		//获取id
		$id = I('get.id');
		$comment = M('comment');
		$res = $comment->table('sdc_comment')->delete($id);
	
		//判断
		if($res){
			$this->success('删除成功',U('Admin/Comment/index'),3);
			//删除相应图片
			// unlink('__PUBLIC__/uploads/image/20151020/1445274861480708.jpg');
		}else{
			$this->error('删除失败',U('Admin/Comment/index'),3);
		}
	}

}

?>