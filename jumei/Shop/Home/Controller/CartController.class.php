<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller { 

		

		public function index(){
			$_SESSION['url']=$_SERVER['REQUEST_URI'];
			// var_dump($_SESSION);die;
			$goods=M('goods');
			$arr=array();
			foreach($_SESSION['cart'] as $k=>$v){
				$goodsinfo=$goods->find($v['gid']);
				$goodsinfo['num']=$v['num'];
				$good[]=$goodsinfo;
			}

			$this->assign('good',$good);
			$this->display();
			

		}
		public function insert(){
			$addtime=NOW_TIME; 
			$_POST['num']=$_POST['num'] ? $_POST['num'] : 1;
			if(!$this->checkExists()){
				$_SESSION['addtime']=$addtime;
				$_SESSION['cart'][] = $_POST;
			}else{
				$this->addNum();
			}

			echo 1;
		}
		public function decrease(){
			foreach($_SESSION['cart'] as $k=>$v){
				if($_POST['gid']==$v['gid']){
					$_SESSION['cart'][$k]['num'] -=1;
					echo 1;
				}
			}
			
		}

		public function delete(){
			foreach($_SESSION['cart'] as $k=>$v){
				$num += $k;
				if($_POST['gid']==$v['gid']){
					unset($_SESSION['cart'][$k]);
					echo $num;
				}
			}	
		}
		private function addNum(){
			foreach($_SESSION['cart'] as $k=>$v){
				if($_POST['gid']==$v['gid']){
					$_SESSION['cart'][$k]['num'] +=$_POST['num'];
				}
			}
		}

		private function checkExists(){
			foreach($_SESSION['cart'] as $k=>$v){
				if($_POST['gid']==$v['gid']){
					return true;
				}
			}
			return false;
		}

		public function checkGoods(){
			$good=M('goods');
			//购物车物品
			$arr=array();
			foreach($_SESSION['cart'] as $k=>$v){
				$goodsinfo=$good->find($v['gid']);
				$goodsinfo['num']=$v['num'];
				$cartgood[]=$goodsinfo;
			}

			$this->ajaxReturn($cartgood);
			
		}

}	
 