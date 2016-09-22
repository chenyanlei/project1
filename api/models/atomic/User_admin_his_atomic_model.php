<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin_his_atomic_model extends Atomic_model
{
//	private $ERC_OK	= Ecode::OK;

	public function __construct() 
	{
		parent::__construct();
		$this->table_name = 'user_status_his_0';
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
