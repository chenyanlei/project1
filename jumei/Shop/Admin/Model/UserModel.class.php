<?php

namespace Admin\Model;
use Think\Model;
class UserModel extends Model{   
	protected $_validate = array(    
	
	     
	    
	    array('realname','/\w+/','姓名格式不正确',3,'regex'),
	    array('email','email','email格式错误'),


	);
}
