<?php 
	
	

 
	function checkDisc($d){
		if($d>=10 || $d<=0){
			return false;
		}
		return true;
	}
	function checkCate($e){
		if($e==0){
			return false;
		}
		return true;
	}
	//处理上传字段
	function dealPic(){
		
		if($_FILES['spic']['error'] == 0){
			$upload = new \Think\Upload();  
			$upload->maxSize   =     3145728 ;
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');
			$upload->rootPath = '../jumei/';
			$upload->savePath  =      'Public/Home/search/imgs';    
			$infos = $upload->upload();
			if(!$infos) {       
				$this->error($upload->getError(),'',3);    
			}else{       
				return ltrim($upload->rootPath,'.').$infos['spic']['savepath'].$infos['spic']['savename'];
			}
		}else{
			return I('post.spic');
		}
	}

 ?>