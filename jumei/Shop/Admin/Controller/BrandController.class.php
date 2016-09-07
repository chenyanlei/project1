<?php
namespace Admin\Controller;
use Think\Controller;
class BrandController extends Controller{

	public function add(){
		//创建对象
		$brand = M('brand');
		//获取品牌分类
		$brands = $brand->query('select c1.*,c2.bname as names,concat(c1.path,",",c1.id) as paths from sdc_brand c1 left join sdc_brand c2 on c1.type=c2.id order by paths');
		foreach ($brands as $key => $value) {
			//获取当前要添加的分隔符的次数
			$c = count(explode(',', $value['path']))-1;
			//|-----
			$brands[$key]['bname'] = str_repeat('|-----', $c).$value['bname'];
		}
		//分配变量
		$this->assign('brands',$brands);
		$this -> display();
	}

	public function insert(){
		//创建对象
		$info = M('brand');
		//处理品牌墙------------------
		//获取当前分类的类型type
		$type = $_POST['type'];
		//如果接过来的power为1,进行数据库查询
		if($_POST['power'] == 1){

			//数据库查询 当前分类类型包含的品牌和power为1的有哪些品牌
			$infor = $info->where('type='.$type.' and power=1')->order('id')->getField('power',true);
			// var_dump($infor);die;
			
			//查出来之后进行count统计个数
			$count = count($infor);
			//如果当前类型的品牌墙以展示12个 则不能继续上传
			if($count == 12){
				$this->error('当前品牌类型的品牌墙展示位已满,请检查后重新上传!','',3);
			}

			//品牌墙价值1000元的大图广告位 我也是醉了...
		}elseif($_POST['power'] == 2){

			//数据库查询 当前分类类型包含的品牌和power为1的有哪些品牌
			$infor = $info->where('type='.$type.' and power=2')->order('id')->getField('power',true);
			//查出来之后进行count统计个数
			$count = count($infor);
			//如果当前类型的品牌墙以展示12个 则不能继续上传
			if($count > 1){
				$this->error('高级品牌墙展位只有一个以被占用,请检查后重新上传!','',3);
			}
		}
		
		// var_dump($_POST);die;
		//处理bname字段
		$bname = $_POST['bname'];
		if(empty($bname)){
			$this->error('品牌名称不能为空,请确认后从新填写.',U('Admin/Brand/add'),3);
		}

		//检索数据库是否有从名
		// $res = $info->query('select bname from sdc_brand');
		// $res = $info->getField('bname',true);
		$res = $info->select();

		foreach($res as $k=>$v){
			if($bname == $res[$k]['bname']){
				$this->error('品牌类型或名称以存在,请检查后重新上传!','',3);
			}
		}

		//处理type字段
		// $type = $_POST['bname'];
		// if(empty($type)){
		// 	$this->error('品牌类型不能为空,请确认后从新填写.',U('Admin/Brand/add'),3);
		// }

		//处理logo字段
		if($_FILES['logo']['error'] == 0){
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
			$upload->rootPath = './Public';//手动设置文件上传根目录
			$upload->savePath  =      '/Uploads/Brand/'; // 设置附件上传目录    // 上传文件
			$infos = $upload->upload();
		
			
			if(!$infos) {// 上传错误提示错误信息        
				$this->error($upload->getError(),'',3);    
			}else{// 上传成功       
				$_POST['logo'] = ltrim($upload->rootPath,'.').$infos['logo']['savepath'].$infos['logo']['savename'];
				$_POST['images'] = ltrim($upload->rootPath,'.').$infos['images']['savepath'].$infos['images']['savename'];
				// var_dump($_POST);die;
			}

			//如果品牌墙的图片不添加的话 默认活动是关闭状态
			if(empty($infos['images'])){
				$_POST['power'] = '0';
			}
		}

		if(empty($_POST['logo'])){
			$_POST['type'] = 0;
		}


		// $type = I('post.type');
		// if(empty($type)){
		// 	$_POST['type']=$_POST['id'];
		// }

		//针对path字段进行获取
		//检测是否为顶级分类
		if($_POST['type'] == 0){//如果是顶级
			$_POST['path'] = 0;
		}else{
			//查找父级分类的信息
			$infos = $info->where('id='.$_POST['type'])->find();
			$_POST['path'] = $infos['path'].','.$infos['id'];
		}

		$_POST['time'] = date('Y-m-d H:i:s');
		//创建主表数据
		$info -> create();
		//执行添加
		if($info->add()){
			$this -> success('品牌添加成功!',U('Admin/Brand/index'),3);
		}else{
			$this -> error('品牌添加失败,请重试!','',3);
		}

	}

	public function index(){
		$brand = M('brand');
		// $info = $brand->query('select c1.*,c2.bname as names,concat(c1.type,",",c1.id) as paths from sdc_brand c1 left join sdc_brand c2 on c1.type=c2.id order by paths');
		// $info = $brand->query('select c1.*,c2.bname as names from sdc_brand c1 left join sdc_brand c2 on c1.type=c2.id');
		// $info = $brand->query('select c1.*,c2.bname as names, concat(c1.type,",",c1.id) as paths from sdc_brand c1 left join sdc_brand c2 on c1.type=c2.id order by paths');
		$info = $brand->query('select c1.*,c2.bname as names,concat(c1.path,",",c1.id) as paths from sdc_brand c1 left join sdc_brand c2 on c1.type=c2.id order by paths');
		// var_dump($info);die;		
		$this->assign('info',$info);
		$this->display();
		// $this->assign('brand',)
	}

	public function edit(){
		$edit = M('brand');
		// $edits = $edit->select();
		$editss = $edit->query('select c1.*,c2.bname as names,concat(c1.path,",",c1.id) as paths from sdc_brand c1 left join sdc_brand c2 on c1.type=c2.id order by paths');
		//获取品牌分类
		foreach ($editss as $key => $value) {
			//获取当前要添加的分隔符的次数
			$cc = count(explode(',', $value['path']))-1;
			//|-----
			$editss[$key]['bname'] = str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|-----', $cc).$value['bname'];
		}
		//获取id
		$id = I('get.id');
		//查找当前分类
		$info = $edit->find($id);
		//分配变量
		$this->assign('editss',$editss);
		$this->assign('info',$info);
		//解析模板
		$this->display();
	}

	public function update(){
		//创建对象
		$update = M('brand');

		//获取id
		$id = I('post.id');

		$updates = $update->find($id);

		$img = $updates['logo'];
		$images = $updates['images'];

		//针对path字段进行获取
		//检测是否为顶级分类
		if($_POST['type'] == 0){//如果是顶级
			$_POST['path'] = 0;
		}else{
			//查找父级分类的信息
			$infor = $update->where('id='.$_POST['type'])->find();
			
			$_POST['path'] = $infor['path'].','.$infor['id'];
		}
		//获取最新的修改时间
		$_POST['time'] = date('Y-m-d H:i:s');

		//处理品牌墙------------------
		//获取当前分类的类型type
		$type = $_POST['type'];

		//如果接过来的power为1,进行数据库查询
		if($_POST['power'] == 1){

			//数据库查询 当前分类类型包含的品牌和power为1的有哪些品牌
			$infor = $update->where('type='.$type.' and power=1')->order('id')->getField('power',true);
			
			//查出来之后进行count统计个数
			$count = count($infor);
			// var_dump($count);die;

			//如果当前类型的品牌墙以展示12个 则不能继续上传
			if($count == 12){
				$this->error('当前品牌类型的品牌墙展示位已满,请检查后重新上传!','',3);
			}

			//修改品牌墙价值1000元的广告位
		}elseif($_POST['power'] == 2){

			//数据库查询 当前分类类型包含的品牌和power为1的有哪些品牌
			$infor = $update->where('type='.$type.' and power=2')->order('id')->getField('power',true);
			//查出来之后进行count统计个数
			$count = count($infor);
			//如果当前类型的品牌墙以展示12个 则不能继续上传
			if($count > 1){
				$this->error('高级品牌墙展位只有一个以被占用,请检查后重新上传!','',3);
			}
		}


		//处理img字段
		if($_FILES['logo']['error'] == 0 || $_FILES['images']['error'] == 0){
			$upload = new \Think\Upload();// 实例化上传类    
			$upload->maxSize   =     3145728 ;// 设置附件上传大小    
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
			$upload->rootPath = './Public';//手动设置文件上传根目录
			$upload->savePath  =      '/Uploads/Brand/'; // 设置附件上传目录    // 上传文件     
			$infos = $upload->upload();


			if(!$infos) {// 上传错误提示错误信息        
				$this->error($upload->getError(),'',1000000);
				// $_FILES['img'] = $_POST['img'];
			}else{// 上传成功  当logo['error'] == 0 成功上传时 $_POST['images']的路径为$images      
				$_POST['logo'] = ltrim($upload->rootPath,'.').$infos['logo']['savepath'].$infos['logo']['savename'];
				$_POST['images'] = $images;

			}

			//当images['error'] == 0 成功上传时 $_POST['logo']的路径为$img  
			if($_FILES['images']['error'] == 0){
				$_POST['images'] = ltrim($upload->rootPath,'.').$infos['images']['savepath'].$infos['images']['savename'];
				$_POST['logo'] = $img;

			}	
			//删除该图片
			// unlink('.'.$img);
			
		}else{
			//如果品牌墙的图片不添加的话 默认活动是关闭状态
			// if($_FILES['images']['error'] == 4 || !isset($images)){
			// 	$_POST['power'] = '0';
			// }
			if(empty($images)){
				$_POST['power'] = '0';
			}else{
				$_POST['power'] = $_POST['power'];
			}
		}

		// var_dump($_POST);die;
		//创建数据
		$update->create();
		$res = $update->save();

		if($res){
			$this->success('品牌修改成功!',U('Admin/Brand/index'),3);
		}else{
			$this->error('品牌修改失败,稍后请重试!',U('Admin/Brand/index'),3);
		}

	}	

	public function delete(){
		//创建对象
		$delete = M('brand');
		//获取当前数据id
		$id = I('get.id');
		//获取当前id的数据
		$info = $delete->find($id);
		//拼接当前分类的路径与id
		$start = $info['path'].','.$info['id'];
		//执行删除路径类似于$start的数据
		$delete->where("path like %'$start'%")->delete();
		if($delete->delete($id)){
			$this->success('品牌删除成功!',U('Admin/Brand/index'),3);
		}else{
			$this->error('品牌删除失败!',U('Admin/Brand/index'),3);
		}


	}


}
