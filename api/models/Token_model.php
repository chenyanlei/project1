<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Token_model extends CI_Model
{
	private $ERC_OK						= Ecode::OK;
	private $ERC_NO_RESULT				= Ecode::NO_RESULT; //查询错误或无结果
	private $ERC_INSERT_FAIL			= Ecode::INSERT_FAIL;
	private $ERC_DELETE_FAIL			= Ecode::DELETE_FAIL;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('atomic/token_atomic_model', 'token_atomic');
	}

	public function get_user_id_create_time(&$user_id, &$create_time, $token)
	{
		$user_id = 0;
		$create_time = 0;
		$select = 'uid, create_time';
		$row = $this->token_atomic->slt_row_arr(array('token'=>$token), $select);
		if (!isset($row['uid']))
		{
			return $this->ERC_NO_RESULT;
		}
		$user_id = $row['uid'];
		$create_time = $row['create_time'];
		return $this->ERC_OK;
	}

	public function update_token_time($uid) {
		$time = time();
		$time += Ecode::VALIDATE_DAYS  ;

		$create_time_upd_ret = $this->token_atomic->upd(array('create_time'=>$time) , array('uid' => $uid)) ;
		if (!isset($create_time_upd_ret['affected_rows'])) { //
			return false ;
		}

		return true ;
	}

	public function set_token(&$token, $uid)
	{
		$time = time();
//		$this->token_atomic->del(array('uid'=>$uid));
		$token = md5($uid.MD5_SALT.$time);
		$ins_ret = $this->token_atomic->ins(array('token'=>$token, 'uid'=>$uid, 'create_time'=>$time));
		if (!isset($ins_ret['insert_id']))
		{
			Ecode::logs($this->ERC_INSERT_FAIL, __METHOD__, 'uid='.$uid, 'table=token&token='.$token);
			return $this->ERC_INSERT_FAIL;
		}
		return $this->ERC_OK;
	}

	public function del_token($token)
	{
		$row = $this->token_atomic->slt_row_arr(array('token'=>$token), 'uid');
		if (isset($row['uid']))
		{
			$token_del_ret = $this->token_atomic->del(array('uid'=>$row['uid']));
			if (!isset($token_del_ret['affected_rows']))
			{
				Ecode::logs($this->ERC_DELETE_FAIL, __METHOD__, 'uid='.$row['uid'], 'token='.$token);
			}
		}
		return $this->ERC_OK;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
