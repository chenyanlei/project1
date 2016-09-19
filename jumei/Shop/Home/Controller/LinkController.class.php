<?php
namespace Home\Controller;
use Think\Controller;
class LinkController extends Controller {

	public function index(){
		  $web=M('webconfig');
		  $webinfo=$web->where('enable=1')->find();
        $this->assign('webinfo',$webinfo);

		$this->display();
	}

	public function friend(){
		 $web=M('webconfig');
		 $webinfo=$web->where('enable=1')->find();
        $this->assign('webinfo',$webinfo);
		//查询友情链接信息
		$link = M('link');
		$linkinfo = $link->select();

		$this->assign('linkinfo',$linkinfo);
		$this->display();
	}




}