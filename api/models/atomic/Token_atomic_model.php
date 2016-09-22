<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Token_atomic_model extends Atomic_model 
{
	public function __construct() 
	{
		parent::__construct();
		$this->table_name = 'token_0';
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
