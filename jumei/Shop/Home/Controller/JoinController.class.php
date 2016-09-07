<?php
namespace Home\Controller;
use Think\Controller;
class JoinController extends Controller {

    public function index(){
    	$work=M('join');
    	$count=$work->count();
    	$page = new \Think\Page($count,5);
		$limit = $page->firstRow.','.$page->listRows;
		$pages = $page->show();
		$totalPages = $page->totalPages;
		$nowPage = $page->nowPage;
		$works=$work->limit($limit)->select();

		$this->assign('count',$count);
		$this->assign('pages',$pages);
		$this->assign('totalPages',$totalPages);
		$this->assign('nowPage',$nowPage);
       $this->assign('works',$works);		
       $this->display();
     }
}       