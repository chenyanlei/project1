<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_atomic_model extends Atomic_model 
{
//	private $ERC_OK	= Ecode::OK;

	public function __construct() 
	{
		parent::__construct();
		$this->table_name = 'user_0';
	}

	public function get_users_by_type($utype, $limit, $offset) {
		$where = array('user_type'=>$utype) ;
		$select = "id" ;
		return $this->slt_res_arr($where, $select, $limit, $offset) ;
	}

	public function get_count($utype = -1) {
		$where = array() ;
		if($utype != -1) {
			$where['user_type'] = $utype ;
		}

		return $this->cnt($where) ;
	}

}

/* vim: set ts=4 sw=4 sts=4 noet: */
