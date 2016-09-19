<?php
namespace Home\Controller;
use Think\Controller;
class TpicController extends controller {
	public function index(){
		
		$this->display();
	}
	

	public function uppic(){
		$_POST['id']=session('id');
		$user=M('user');

			
			if($_FILES['fileList']['error'] == 0){
				$upload = new \Think\Upload();   
				$upload->maxSize   =     3145728 ;    
				$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');   
				$upload->rootPath = './Public';
				$upload->savePath  =      '/Uploads/';     
				$infos = $upload->upload();
				if(!$infos) {        
					$this->error($upload->getError(),'',1000000);    
				}else{        
					$_POST['pic'] = ltrim($upload->rootPath,'.').$infos['fileList']['savepath'].$infos['fileList']['savename'];
					
				}


			}
			
			$user->create();
			$res = $user->save();
			if($res){
				
				echo '更新成功';
			}else{
				
				echo '更新失败';
			}

	}
}