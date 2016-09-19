<?php

namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{   
	protected $_validate = array(    
	
	     
	    
	    array('password','checkPwd','密码格式不正确',0,'function'),
	    array('email','email','email格式错误'),


	);
}
