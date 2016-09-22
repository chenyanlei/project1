<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_suppliyer_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('atomic/supliyer/user_supliyer_atomic_model', 'user_supliyer_atomic');
	}

	public function set_supliyer_contact_info($uid, $contact, $tel, $phone, $weichat, $qq, $addr) {

		$arr = array("contact" => $contact, "tel" => $tel, "phone" => $phone,
			"weichat" => $weichat, "qq" => $qq, "addr" => $addr) ;

		if($this->_user_is_exist($uid) == 0) {
			$arr['uid'] = $uid;
			$rst = $this->user_supliyer_atomic->ins($arr) ;
		} else {
			$where = array('uid' => $uid) ;
			$rst = $this->user_supliyer_atomic->upd($arr,$where) ;
		}
		return $rst ;
	}

	public function get_my_supliyer_info($uid) {
		$where = array('uid' => $uid) ;
		$select = "contact, tel, phone, weichat, qq, addr" ;
		return $this->user_supliyer_atomic->slt_row_arr($where, $select) ;
	}

	private function _user_is_exist($uid) {
		$where = array('uid' => $uid) ;

		$rst = $this->user_supliyer_atomic->cnt($where) ;
		return $rst ;
	}

}

/* vim: set ts=4 sw=4 sts=4 noet: */
