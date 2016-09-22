<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_admin_his_model extends CI_Model
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model("atomic/user_admin_his_atomic_model", 'user_admin_his_atomic_model') ;
	}

	/**
	 * 添加一条用户维护信息
	 */
	public function add_user_status_msg($msg, $uid, $status=-1) {
		if($status == -1) {
			$where = array('uid' => $uid) ;
			$slt = 'status' ;
			$order_by = 'time DESC' ;
			$rst = $this->user_admin_his_atomic_model->slt_row_arr($where, $slt, $order_by) ;
			if(!empty($rst)) {
				$status = $rst['status'] ;
			}
		}

		$ary = array('uid' => $uid, 'msg' => $msg, 'status' => $status) ;

        return $this->user_admin_his_atomic_model->ins($ary) ;
	}

	// 获取所有用户维护历史
	public function get_user_status_msg($uid) {
		$where = array('uid' => $uid) ;
		$select = 'id, uid, msg, time, status' ;
		return $this->user_admin_his_atomic_model->slt_res_arr($where, $select) ;
	}

	// 获取最后一条状态
	public function get_user_last_status_msg($uid) {
		$where = array('uid' => $uid) ;
		$select = 'id, uid, msg, time, status' ;
		$order_by = "id DESC";
		return $this->user_admin_his_atomic_model->slt_row_arr($where, $select, $order_by) ;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
