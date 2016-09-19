<?php
namespace Admin\Controller;
use Think\Controller;
class CateController extends CommonController {
	
	
	public function add(){
		
		$cate = M('cate');
		$cates = $cate->select();
		$this->assign('cates', $cates);
		$this->display();
	}


	public function insert(){
		
		$cate = M('cate');
		
		if($_POST['pid'] == 0){
			$_POST['path'] = 0;
		}else{
			$info = $cate->where('id='.$_POST['pid'])->find();
			$_POST['path'] = $info['path'].','.$info['id'];
		}
		
		$cate->create();

		if($cate->add()){
			$this->success('添加成功',U('Admin/Cate/index'),3);
		}else{
			$this->error('添加失败',U('Admin/Cate/add'),3);
		}
	}


	public function index(){

		$cate = M('cate');
		$cates = $cate->query('select c1.*,c2.name as names,concat(c1.path,",",c1.id) as paths from sdc_cate c1 left join sdc_cate c2 on c1.pid=c2.id  order by paths');
		foreach ($cates as $key => $value) {
			$c = count(explode(',', $value['path']))-1;

			$cates[$key]['name'] = str_repeat('|-----', $c).$value['name'];
		}

		$this->assign('cates', $cates);
		$this->display();
	}

	public function edit(){

		$cate = M('cate');
		$cates = $cate->select();

		$id = I('get.id');

		$info = $cate->find($id);

		$this->assign('info', $info);
		$this->assign('cates', $cates);

		$this->display();
	}

	//更新操作
	public function update(){

		$cate = M('cate');

		$cate->create();
		$res = $cate->save();
		if($res){
			$this->success('更新成功',U('Admin/Cate/index'),3);
		}else{
			$this->error('更新失败',U('Admin/Cate/index'),3);
		}
	}

	//删除操作
	public function delete(){
	
		$id = I('get.id');
		$cate = M('cate');
		$info = $cate->find($id);
		$start = $info['path'].','.$info['id'];
		$cate->where("path like '$start%'")->delete();
		if($cate->delete($id)){
			$this->success('删除成功',U('Admin/Cate/index'),3);
		}else{
			$this->error('删除失败',U('Admin/Cate/index'),3);
		}

	}

}