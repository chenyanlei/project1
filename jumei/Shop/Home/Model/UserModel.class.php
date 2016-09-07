<?php 
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	

	protected $_auto  = array(
		array('status','1'),
		array('pic','dealPic' ,3,'function')
		);


}

 ?>