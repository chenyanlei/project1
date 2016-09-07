<?php
namespace Admin\Controller;
use Think\Controller;
date_default_timezone_set('UTC');
class ActivityController extends Controller{

	public function ajax(){
		//创建对象
		$info = M('brand');

		//ajax提交过来的type值
		$type = I('get.type');

		//查询所有顶级品牌分类
		// $res = $info->where('sdc_brand.type='.$type)->getField('bname',true);
		$res = $info->query('select id,bname from sdc_brand where type ='.$type);
		// $res = $info -> query("select sdc_brand.id,sdc_brand.bname from sdc_brand where sdc_brand.type = ".$type);

		//输出
		 echo json_encode($res);


	}


	public function add(){

		//创建对象
		$info = M('brand');

		//获取当前顶级分类下的品牌
		$res = $info->query('select * from sdc_brand where type=60');

		//分配变量
		$this->assign('res',$res);

		$info -> create();

		// 解析模板
		$this->display();


	}

	public function insert(){

		//创建对象
		$pname = M('brand');

		//获取传过来的品牌名称的id
		$pid = $_POST['pname'];
		//查询品牌名称
		$p = $pname->where('id='.$pid)->getField('bname',true);
		//将品牌名称赋值给id
		$_POST['pname'] = $p[0];
		// var_dump($_POST);die;
		//创建对象
		$ins = M('activity');
		//连表查询所有数据
		$res = $ins->query('select b.*,a.* from sdc_brand b left join sdc_activity a on a.pid=b.id where a.pid=b.id');

		//遍历数组
		foreach($res as $k=>$v){
			$i = $res[$k];
		}
	
			// if(isset($_POST['type'])){
			// 	$this->success('品牌类型不能为空','',33333333);
			// }

			// if(empty($_POST['bname'])){
			// 	$this->success('品牌名称不能为空','',3);
			// }

			if(empty($_POST['full']) || empty($_POST['subtract'])){
				$this->error('优惠条件不能为空','',3);die;
			}

			if($_POST['pname'] == $i['pname']){
				$this->error('此商品以参加活动,请确认后重试','',3);die;
			}

			// var_dump($i);die;
		//处理logo字段
		if($_FILES['img']['error'] == 0){
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
			$upload->rootPath = './Public';//手动设置文件上传根目录
			$upload->savePath  =      '/Uploads/Brand_hd/'; // 设置附件上传目录    // 上传文件     
			$infos = $upload->upload();
			
			if(!$infos) {// 上传错误提示错误信息        
				$this->error($upload->getError(),'',3);    
			}else{// 上传成功        
				$_POST['img'] = ltrim($upload->rootPath,'.').$infos['img']['savepath'].$infos['img']['savename'];
			}
		}

		// //开始日期
		// $begin = $_POST['sdate_submit'].$_POST['stime'];
		// $_POST['sdate_submit'] = strtotime($begin);
		// //结束日期

		// $end = $_POST['edate_submit'].$_POST['etime'];
		// $_POST['edate_submit'] = strtotime($end);

		//创建数据
		$ins->create();
		//执行添加操作
		if($ins->add()){
			$this->success('品牌活动添加成功',U('Admin/Activity/index'),3);
		}else{
			$this->error('品牌活动添加失败,请仔细检查后重新上传',U('Admin/Activity/index'),3);
		}
	}


	public function index(){


		//创建对象
		$br = M('brand');

		$ac = M('activity');

		$res = $ac->query('select b.*,a.* from sdc_brand b left join sdc_activity a on a.pid=b.id where a.pid=b.id and expired = 1');
		// var_dump($res);
		// foreach($res as $k=>$v){

		// 	$time = strtotime($v['edate_submit'].$v['etime']);
				
		// 		// $ac -> where("$res['power']"."'=1'")->update(0);
		// 		// $ac->execute("update sdc_activity set power = 0 where".$time <= time());
				
		// 			// $ac->create();
		// 			$arr = ['power'=>0];
		// 			var_dump($time);
		// 			var_dump(time());
		// 			$rrr = $ac->where( time().'>='.$time)->save($arr);
		// 			var_dump($rrr);
		// 			//创建数据
		// 			echo $ac->_sql();
				
				
				
			
		// }
		

		$this->assign('res',$res);

		$this->display();

	}

	public function edit(){


		//创建对象
		$br = M('brand');
		//创建对象
		$ac = M('activity');
		//接收修改按钮传过来的pid
		$id = $_GET['pid'];
		//根据pid的值查询数据表里的数据
		$info = $br->find($id);

		//根据pid的值查询数据表里的数据
		$infos = $ac->where('pid='.$id)->find();

		// var_dump($infos);die;
		//查询品牌类型
		$ress = $ac->query('select b.*,a.* from sdc_activity a left join sdc_brand b on b.id=a.bid group by b.id');
		//查询品牌名称
		$res = $ac->query('select b.*,a.* from sdc_brand b left join sdc_activity a on a.pid=b.id where a.pid=b.id');
		// var_dump($res);die;
		//分配变量
		$this->assign('id',$id);
		$this->assign('info',$info);
		$this->assign('infos',$infos);
		$this->assign('res',$res);
		$this->assign('ress',$ress);

		//解析模板
		$this->display();
	}

	public function update(){

		//创建对象

		$upd = M('activity');

		// $update = $upd ->select();
		//$_POST['pname']为当前品牌名称的id 去查找本身的名字
		$p = $upd->where('id='.$_POST['id'])->getField('img',true);

		$v = array_values($p);
		// array_values($k);

		//获取原图片路径
		$img = implode($v);
		// $_POST['pname']= implode($k);

			// var_dump($_FILES['img']);die;

		//处理img字段
		if($_FILES['img']['error'] == 0){
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
			$upload->rootPath = './Public';//手动设置文件上传根目录
			$upload->savePath  =      '/Uploads/Brand_hd/'; // 设置附件上传目录    // 上传文件     
			$infos = $upload->upload();
			
			if(!$infos) {// 上传错误提示错误信息        
				$this->error($upload->getError(),'',1000000);
				// $_FILES['img'] = $_POST['img'];
			}else{// 上传成功        
				$_POST['img'] = ltrim($upload->rootPath,'.').$infos['img']['savepath'].$infos['img']['savename'];
				
			}	

				//删除该图片
				unlink('.'.$img);
		}
		//创建
		$upd->create();
		
		//执行修改

		if($upd->save()){
			$this -> success('品牌活动修改成功!',U('Admin/Activity/index'),3);
		}else{
			$this -> error('品牌活动没有修改,请仔细检查后重新修改!','',3);
		}
		
	}

	public function delete(){

		//创建模型
		$del = M('activity');

		//获取删除按钮传来的pid
		$pid = I('get.pid');

		$info = $del->where('pid='.$pid)->find();

		$img = $info['img'];
		//利用传过来的pid去数据库里查询数据
		$res = $del->where('pid='.$pid)->delete();

		
		//执行删除操作
		if($res){
			$this->success('删除成功','',3);
			@unlink('.'.$img);
		}else{
			$this->error('删除失败,请检查','',3);
		}


	}

	public function invalid(){

		//创建对象
		$br = M('brand');

		$ac = M('activity');

		$res = $ac->query('select b.*,a.* from sdc_brand b left join sdc_activity a on a.pid=b.id where a.pid=b.id and expired = 0');

		$this->assign('res',$res);

		$this->display();

	}


}