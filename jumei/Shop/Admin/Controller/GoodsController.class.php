<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController {
	
	//添加操作 
	public function add(){
		
		$brand = M('brand');
		//查询品牌名
		$bname = $brand->getField('id,bname',true);
		// $bid = array_keys($bname);
		// var_dump($bname);
		$cate = M('cate');
		//获取关键字
	
		//读取数据库信息
		$cates = $cate->query('select c1.*,c2.name as names,concat(c1.path,",",c1.id) as paths from sdc_cate c1 left join sdc_cate c2 on c1.pid=c2.id  order by paths');
		foreach ($cates as $key => $value) {
			//获取当前要添加的分隔符的次数
			$c = count(explode(',', $value['path']))-1;
			//|-----
			$cates[$key]['name'] = str_repeat('|-----', $c).$value['name'];
		}
		//分配变量
		$this->assign('cates', $cates);
		$this->assign('bname', $bname);

		$this->display();
	}
	//设置最后一条插入的id为全局变量
	
	//添加商品
	public function insert(){
		// var_dump($_POST);
		// die;
		//验证价格
		$price = I('post.price');
		$cprice = I('post.cprice');
		if(!is_numeric($price) || !is_numeric($cprice)){
			$this->error('商品价格必须为数字',U('Admin/Goods/add'),3);
		}
		//验证折扣
		$discount = I('post.discount');
		if(!is_numeric($discount)){
			$this->error('商品折扣必须为数字',U('Admin/Goods/add'),3);
		}
		//验证库存
		$store = I('post.store');
		if(!is_numeric($store)){
			$this->error('商品库存必须为数字',U('Admin/Goods/add'),3);
		}
		
		//创建  new Model();
		$goods = M('goods');
		//图像上传处理
		if($_FILES['spic']['error'] == 0){
			//实例化上传类
			$upload = new \Think\Upload();
			//设置附件上传的大小
			$upload->maxsize = 3145728;
			//设置附件上传类型
			$upload->exts = array('jpg','gif', 'png', 'jpeg');
			//手动设置文件上传目录
			$upload->rootPath = './Public';
			// 设置附件上传目录
			$upload->savePath = '/Home/search/imgs/';
			
			$good = $upload->upload();

			if(!$good){
				//上传错误提示信息
				$this->error($upload->getError(),'',3);
				
			}else{
				$_POST['spic'] = ltrim($upload->rootPath,'.').$good['spic']['savepath'].$good['spic']['savename'];
			}
		}
		//查询品牌名
		$bid = I('post.bid');
		$b = M('brand');
		$name = $b->where('id='.$bid)->find();
		$_POST['bname'] = $name['bname'];
		$bname = $_POST['bname'];
		
	
		$goods->create();
		$gid = $goods->add();
		
		//创建附加表对象
		$gdetail = M('gdetail');
		$eff = $_POST['effect'];
		$effect = implode(',',$eff);

		//添加商品ID
		$_POST['gid'] = $gid;
		$gdetail->create();
		if($gdetail->add()){
			$this->success('商品添加成功,去添加展示图片吧!',U('Admin/Goods/files',array('gid'=>$gid)),3);
		}else{
			$this->error('商品添加失败',U('Admin/Goods/add'),3);
		}

		
	}

	//显示页面
	public function files(){
		$gid = I('get.gid');
		$this->assign('gid',$gid);
		$this->display();
	}

	//处理多图
	public function work(){
		$gid = I('get.gid');
		// var_dump($_POST);
		// var_dump($gid);
		//图像上传处理
		if($_FILES['showpic']['error'] == 0){

			//实例化上传类
			$upload = new \Think\Upload();
			//设置附件上传的大小
			$upload->maxsize = 3145728;
			//设置附件上传类型
			$upload->exts = array('jpg','gif', 'png', 'jpeg');
			//手动设置文件上传目录
			$upload->rootPath = './';
			// 设置附件上传目录
			$upload->savePath = '/Uploads/filepic/';
			
			$good = $upload->upload();

			if(!$good){
				//上传错误提示信息
				$this->error($upload->getError(),U('Admin/Goods/files'),3);
				
			}else{
				$pic = $_POST['showpic'][] = ltrim($upload->rootPath,'.').$good['showpic']['savepath'].$good['showpic']['savename'];
			}
			// var_dump($_GET['pic']); 
			//插入到商品展示表中
			$pdetail = M('pdetail');
			$res = $pdetail->query("insert into sdc_pdetail (gid,pic) values('{$gid}','{$pic}')");
			// echo $pdetail->_sql();die;
			// var_dump($pdetail);die;
		if($pdetail){
			$this->success('图片添加成功',U('Admin/Goods/index'),0);
		}else{
			$this->error('图片添加失败',U('Admin/Goods/files'),1000);
		}

		}
	}

	//删除商品
	public function delete(){
		$id = I('get.id');
		$goods = M('goods');
		$spic = $goods->find($id);

		
		//创建模型
		$m = new \Think\Model();//查找该文件
		///开启事物
		$m->startTrans();
		//创建对象
		$one = $m->table('sdc_goods')->delete($id);
		$two = $m->table('sdc_gdetail')->where('gid='.$id)->delete();
		
		//判断
		if($one && $two){

			$m->commit();
			$this->success('删除成功',U('Admin/Goods/index'),3);
			//删除相应图片
			unlink('..'.$spic['spic']);

		}else{
			$m->rollback();
			$this->error('删除失败',U('Admin/Goods/index'),3);
		}

	}

	//编辑商品
	public function edit(){

		$good=M('goods');
		$cate = M('cate');
		$id=I('get.id');
		$goods=$good->where('id='.$id)->find();
		$cates=$cate->where('layer=3')->select();
		$this->assign('goods',$goods);
		$this->assign('cates',$cates);
		$this->display();

	}

	//更新操作
	public function update(){
		//创建  new Model();
		$goods = D('goods');
		$id=I('post.id');
		//创建数据(验证数据)
		if(!$goods->create()){
			
		
			//获取错误信息
			$info = $goods->getError();
			$this->error($info,'',3);
		}

		if($goods->save()){
			$this->success('商品更新成功',U('Admin/Goods/index'),5);
		}else{
			$this->error('商品更新失败',U('Admin/Goods/edit/id/'.$id),5);
		}
	}

	//列表页
	public function index(){
		$good = M('goods');
		
		$goods=$good->select();
		
		for($i=0;$i<count($goods);$i++){
			
			$cateid[]=$goods[$i]['cate'];
			$cate=M('cate');
			$goods[$i]['cateinfo']=$cate->where('id='.$cateid[$i])->select();

			$bid[] = $goods[$i]['bid'];
			//获取品牌名称
			$brand = M('brand');
			$goods[$i]['bname'] = $brand->where('id='.$bid[$i])->select();
			// var_dump($goods[$i]['bname']);
// 

		}

		
	

		$this->assign('goods',$goods);
		$this->display();
	}

}