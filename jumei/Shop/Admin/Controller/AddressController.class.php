<?php
namespace Admin\Controller;
use Think\Controller;

class AddressController extends Controller{

	public function address(){

		$info = M('user');

		$infos = $info->select();

		// $info->table('sdc_user u,sdc_address a')->where('a.uid = u.id')->select();

		// $res = $info -> query ('select sdc_user.*,sdc_address.* from sdc_address LEFT JOIN sdc_user on sdc_address.uid=sdc_user.id order by sdc_address.uid');

		$this->assign('infos',$infos);

		$this->display();

	}

	public function index(){

		//创建模型
		$infos = M('address');

		// $info->table('sdc_user u,sdc_address a')->where('a.uid = u.id')->select();
		//联用户表查出用户的信息与相对应的用户地址信息
		$res = $infos -> query ('select sdc_user.*,sdc_address.* from sdc_address LEFT JOIN sdc_user on sdc_address.uid=sdc_user.id order by sdc_address.uid');

		//分配变量
		$this->assign('res',$res);
		//解析模板
		$this->display();

}

	public function add(){

		$id = $_GET['id'];

		$user = M('address');

		$inc = $user->query("select sdc_user.username,sdc_address.* from sdc_address left join sdc_user on sdc_address.uid = sdc_user.id where sdc_user.id = ".$id);

		$this->assign('inc',$inc);

		$this->display();

	}

	public function insert(){

		// var_dump($_POST);die;

		$cart = M('address');

		$_POST['location_id'] = $_POST['sheng'];

		$_POST['location_idd'] = $_POST['shi'];

		$_POST['location_iddd'] = $_POST['xian'];

		if(empty($_POST['name'])){
			$this->error('收货人不能为空!','',3);
		}

		if(empty($_POST['card'])){
			$this->error('身份证不能为空!','',3);
		}

		if(empty($_POST['location_id'])){
			$this->error('收货地址请填写完整!','',3);
		}

		if(empty($_POST['location_idd'])){
			$this->error('收货地址请填写完整!','',3);
		}

		if(empty($_POST['location_iddd'])){
			$this->error('收货地址请填写完整!','',3);
		}

		if(empty($_POST['detail'])){
			$this->error('请填写完整的收货地址!','',3);
		}

		if(empty($_POST['mphone'])){
			$this->error('请填完整的手机号!','',3);
		}

		$cart->create();

		$res = $cart->add();

		if($res){
			$this->success('当前用户收货地址创建成功',U('Admin/Address/index'),3);
		}else{
			$this->error('当前用户收货地址创建失败',U('Admin/Address/index'),3);
		}


	}


	public function edit(){

		$id = $_GET['id'];
		// 创建模型
		$ed = M('address');

		//联表查询address与user表的所有数据 uid=id
		// $res = $ed->where('sdc_address.id = '.$id)->join('sdc_user on sdc_user.id = sdc_address.uid')->select();
		$res = $ed->field('sdc_address.*,sdc_user.username')->table('sdc_address,sdc_user')->where('sdc_address.id = '.$id)->select();
		
		//分配变量
		$this->assign('res',$res);
		
		echo $ed->_sql();
		//解析模板
		$this->display();
	}

	public function update(){

		//创建模型
		$up = M('address');

		//条件限制
		if(empty($_POST['name'])){
			$this->error('收货人不能为空!','',3);
		}

		if(empty($_POST['card'])){
			$this->error('身份证不能为空!','',3);
		}

		if(empty($_POST['location_id'])){
			$this->error('收货地址请填写完整!','',3);
		}

		if(empty($_POST['location_idd'])){
			$this->error('收货地址请填写完整!','',3);
		}

		if(empty($_POST['location_iddd'])){
			$this->error('收货地址请填写完整!','',3);
		}

		if(empty($_POST['detail'])){
			$this->error('请填写完整的收货地址!','',3);
		}

		if(empty($_POST['mphone'])){
			$this->error('请填完整的手机号!','',3);
		}

		// var_dump($_POST);die;
		//过滤数据
		$up->create();

		if($up->where('id='.$_POST['id'])->save()){
			$this->success('当前用户收货地址更新成功',U('Admin/Address/index'),3);
		}else{
			$this->error('当前用户收货地址更新失败','',3);
		}


	}

	public function delete(){

		//创建模型
		$del = M('address');

		//接收删除按钮传来的id
		$aid = $_GET['id'];

		//更新数据
		$del->create();

		echo "<script>confirm('您确认要删除此条信息吗?');</script>";
		//执行删除操作
		$del->where('id='.$aid)->delete();

		if($del){
			$this->success('当前地址删除成功!',U('Admin/Address/index'),3);
		}else{
			$this->error('删除当前地址失败',U('Admin/Address/index'),3);
		}





	}



}