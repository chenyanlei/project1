<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_agent_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('atomic/agent/user_agent_atomic_model', 'user_agent_atomic');
	}

	public function set_agent_type_parent($uid, $agent_type, $recommend_uid) {
		if($this->_agent_is_exist($uid)) {
			$arr = array('agent_type' => $agent_type, 'recommend_uid' =>$recommend_uid) ;
			$where = array('uid' => $uid) ;
			$rst = $this->user_agent_atomic->upd( $arr, $where) ;
		} else {
			$arr = array('uid'=>$uid,'agent_type' => $agent_type) ;
			if(isset($recommend_uid)){
				$arr['recommend_uid'] =$recommend_uid;
			}
			$rst = $this->user_agent_atomic->ins($arr);
		}
		return $rst ;
	}

	public function get_agent_type($uid) {
		$where = array('uid' => $uid) ;
		$select = 'agent_type, recommend_code' ;
		$rst = $this->user_agent_atomic->slt_row_arr($where, $select);
		if(empty($rst)) {
			return Ptype::AGENT_TYPE_PERSONAL ;
		}

		return $rst['agent_type'];
	}

	public function get_my_agent_info($uid) {
		$where = array('uid' => $uid) ;
		$select = 'agent_type, recommend_code' ;
		$rst = $this->user_agent_atomic->slt_row_arr($where, $select) ;
		if(empty($rst)) {
			return $rst;
		}

		// classify
		$rst['classify'] = $this->get_agent_product_classify($uid) ;

		// des
		$rst['destination'] = $this->get_agent_product_destination($uid) ;

		// 获取个人代理或者企业代理的详细信息
		if($rst['agent_type'] == Ptype::AGENT_TYPE_PERSONAL) {
			$select = 'name, sex, contact, id_card_0, id_card_1, id_card_2, address' ;
			$this->load->model('atomic/agent/user_agent_personal_atomic_model', 'user_agent_personal_atomic_model') ;
			$rst['info'] = $this->user_agent_personal_atomic_model->slt_row_arr($where, $select) ;

		} else {
			$select = 'name, bussiness_licence, orgnization_code, address, bussiness_licence_img,
				orgnization_code_img, corporate, corporate_card_id, contact, contact_phone' ;

			$this->load->model('atomic/agent/user_agent_com_atomic_model', 'user_agent_com_atomic_model') ;
			$rst['info'] = $this->user_agent_com_atomic_model->slt_row_arr($where, $select) ;
		}

		return $rst ;
	}

	public function set_agent_product_destination($uid, $destinations_type, $destinations_id, $agent_type=Ptype::AGENT_TYPE_PERSONAL) {
		if($this->_agent_destination_is_exist($uid)) {
			$this->load->model("user_admin_his_model") ;
			$this->user_admin_his_model->add_user_status_msg('您的目的地信息已修改', $uid) ;
		} else {
//			$arr = array('uid' => $uid, 'destination_type' => $destinations_type, 'destinations_id'=>$destinations_id) ;
//			$rst = $this->user_agent_atomic->ins($arr) ;

			// 更新用户状态
			$this->load->model('user_model') ;
			$this->user_model->update_user_status($uid, Ptype::AGENT_STATUS_SLT_DES) ;

			// 添加状态历史
			$this->load->model("user_admin_his_model") ;
			$this->user_admin_his_model->add_user_status_msg('您的目的地信息已提交', $uid, Ptype::AGENT_STATUS_SLT_DES) ;
		}

		$arr = array('destination_type' => $destinations_type, 'destinations_id'=>$destinations_id) ;
		$where = array('uid' => $uid) ;
		$rst = $this->user_agent_atomic->upd( $arr, $where) ;
		return $rst ;
	}

	public function get_agent_product_destination($uid) {
		$this->load->model('atomic/agent/user_agent_atomic_model', 'user_agent_atomic') ;
		$where = array('uid' => $uid) ;
		$select = 'destination_type, max_destination_num,destinations_id' ;
		$data = $this->user_agent_atomic->slt_row_arr($where, $select) ;

		if(empty($data)) {
			return $data ;
		}

		if($data['destination_type'] == 1 && !empty($data['destinations_id'])) {
			$ids = json_decode($data['destinations_id'], true) ;
			$where = array("#in#"=>'id', '#arr#'=>$ids) ;
			$select = 'id, name, en_name' ;
			$this->load->model('atomic/destination_atomic_model', 'destination_atomic') ;
			$data['data'] = $this->destination_atomic->slt_res_arr($where, $select) ;
			unset($data['destinations_id']) ;
		} else {
			unset($data['destinations_id']) ;
		}
//		$data = $this->user_atomic->slt_row_arr($where, $select) ;
//		$sql = 'select id, name, en_name from destination_0 where id in (select user_product_destionation_id from user_product_destionation_0 where uid='.$uid.')';
//		$rst = $this->user_product_destination_atomic->query($sql) ;
//		$data['data'] = $rst->result_array() ;
		return $data ;
	}

	public function set_agent_product_classify($uid, $tags_type, $tags_id) {

		if($this->_agent_classify_is_exist($uid)) {
			$this->load->model("user_admin_his_model") ;
			$this->user_admin_his_model->add_user_status_msg('您的产品类别信息已变更', $uid) ;
		} else {
			// 更新用户状态
			$this->load->model('user_model') ;
			$this->user_model->update_user_status($uid, Ptype::AGENT_STATUS_SLT_CLASSIFY) ;

			$this->load->model("user_admin_his_model") ;
			$this->user_admin_his_model->add_user_status_msg('您的产品类别信息已提交，将进入审核状态', $uid, Ptype::AGENT_STATUS_SLT_CLASSIFY) ;
		}

		$arr = array('tags_type' => $tags_type, 'tags_id'=>$tags_id) ;
		$where = array('uid' => $uid) ;
		$rst = $this->user_agent_atomic->upd( $arr, $where) ;

		if(!empty($rst)) {
			$this->load->model('user_model') ;
			$this->user_model->update_user_status($uid, Ptype::AGENT_STATUS_WILL_CHECK) ;
		}

		return !empty($rst) ;
	}

	public function get_agent_product_classify($uid) {
//		$this->load->model('atomic/user_product_tags_atomic_model', 'user_product_tags_atomic') ;
//		$select = 'product_tags_id';
//		$where = array('uid' => $uid);
//		return $this->user_product_destination_atomic->slt_res_arr($where, $select) ;
//		$where = array('id' => $uid) ;
//		$select = 'tags_type, max_tags_num' ;
//		$data = $this->user_atomic->slt_row_arr($where, $select) ;
//
//		$sql = 'select id, tagname from product_tags where id in (select product_tags_id from user_product_tags_0 where uid='.$uid.')';
//		$rst = $this->user_product_destination_atomic->query($sql) ;
//		$data['data'] =  $rst->result_array() ;

		$where = array('uid' => $uid) ;
		$select = 'tags_type, max_tags_num, tags_id' ;
		$data = $this->user_agent_atomic->slt_row_arr($where, $select) ;

		if(empty($data)) {
			return null ;
		}

		if($data['tags_type'] == 1 && !empty($data['tags_id'])) {
			$ids = json_decode($data['tags_id'], true) ;
//			var_dump($data['tags_id']) ;
//			var_dump($ids) ;
			$where = array("#in#"=>'id', '#arr#'=>$ids) ;
			$select = 'id, tag_name' ;
			$this->load->model('atomic/product_tags_atomic_model', 'product_tags_atomic_model') ;
			$data['data'] = $this->product_tags_atomic_model->slt_res_arr($where, $select) ;
			unset($data['tags_id']) ;
		} else {
			unset($data['tags_id']) ;
		}

		return $data ;
	}

	/**
	 * destination_type默认值是-1，
	 * 	判断destination_type 是否等于-1，
	 * 		如果是-1，则没有设置过，
	 * 		如果不为-1（是0或者1），则已经设置过
	 *
	 * @param $uid
	 * @return bool
	 */
	private function _agent_destination_is_exist($uid) {
		$select = 'destination_type' ;
		$where = array('uid' => $uid) ;
		$rst  = $this->user_agent_atomic->slt_row_arr($where, $select) ;

		return $rst['destination_type'] != -1;
	}

	private function _agent_classify_is_exist($uid) {
		$select = 'tags_type' ;
		$where = array('uid' => $uid) ;
		$rst  = $this->user_agent_atomic->slt_row_arr($where, $select) ;

		return $rst['tags_type'] != -1;
	}

	private function _agent_is_exist($uid) {
		$select = 'id' ;
		$where = array('uid' => $uid) ;
		$rst  = $this->user_agent_atomic->slt_row_arr($where, $select) ;
		return !empty($rst) ;
	}

	private function _com_agent_exist($uid) {
		$this->load->model('atomic/agent/user_agent_com_atomic_model', 'user_agent_com_atomic_model') ;
		$where = array('uid' => $uid) ;
		$cnt = $this->user_agent_com_atomic_model->cnt($where) ;

		return $cnt > 0 ;
	}

	private function _personal_agent_exist($uid) {
		$this->load->model('atomic/agent/user_agent_personal_atomic_model', 'user_agent_personal_atomic_model') ;
		$where = array('uid' => $uid) ;
		$cnt = $this->user_agent_personal_atomic_model->cnt($where) ;

		return $cnt > 0 ;
	}

	public  function set_com_agent_auting_info($uid, $name, $bussiness_licence,  $orgnization_code, $address,
												$bussiness_licence_img, $orgnization_code_img, $corporate,
											   $corporate_card_id, $contact, $contact_phone) {
		$this->load->model('atomic/agent/user_agent_com_atomic_model', 'user_agent_com_atomic_model') ;

		$arr = array('uid' 			 => $uid,
			'name'					 => $name ,
			'bussiness_licence'		 => $bussiness_licence ,
			'orgnization_code' 		 => $orgnization_code ,
			'address' 				 => $address ,
			'bussiness_licence_img'  => $bussiness_licence_img ,
			'orgnization_code_img' 	 => $orgnization_code_img ,
			'corporate' 			 => $corporate ,
			'corporate_card_id' 	 => $corporate_card_id ,
			'contact' 				 => $contact ,
			'contact_phone' 		 => $contact_phone ) ;

		if($this->_com_agent_exist($uid)) {
			$where = array('uid' => $uid) ;
			$rst = $this->user_agent_com_atomic_model->upd($arr, $where) ;

			$this->load->model("user_admin_his_model") ;
			$this->user_admin_his_model->add_user_status_msg('您的商户信息已变更', $uid) ;
		} else {
			$rst = $this->user_agent_com_atomic_model->ins($arr) ;

			$this->load->model('user_model') ;
			$this->user_model->update_user_status($uid, Ptype::AGENT_STATUS_INFO_COMMIT) ;

			$this->load->model("user_admin_his_model") ;
			$this->user_admin_his_model->add_user_status_msg('您的商户信息已提交', $uid, Ptype::AGENT_STATUS_INFO_COMMIT) ;

			// 设置为公司代理一级
			$this->user_model->set_user_level($uid, Ptype::LEVEL_AGENT_COM_LEVEL_1);
		}

		return $rst ;
	}

	public function set_personal_agent_auting_info($uid, $name, $sex, $contact, $address, $id_card_0, $id_card_1, $id_card_2) {
		$this->load->model('atomic/agent/user_agent_personal_atomic_model', 'user_agent_personal_atomic_model') ;
		$arr = array('uid' 			 => $uid,
			'name'					 => $name ,
			'sex'					 => $sex ,
			'address' 				 => $address ,
			'contact' 				 => $contact ,
			'id_card_0' 			 => $id_card_0 ,
			'id_card_1' 			 => $id_card_1 ,
			'id_card_2' 			 => $id_card_2
			) ;

		if($this->_personal_agent_exist($uid)) {
			$where = array('uid' => $uid) ;
			$rst = $this->user_agent_personal_atomic_model->upd($arr, $where) ;

			$this->load->model("user_admin_his_model") ;
			$this->user_admin_his_model->add_user_status_msg('您的个人信息已变更', $uid) ;
		} else {
			$rst = $this->user_agent_personal_atomic_model->ins($arr) ;

			$this->load->model('user_model') ;
			$this->user_model->update_user_status($uid, Ptype::AGENT_STATUS_INFO_COMMIT) ;

			$this->load->model("user_admin_his_model") ;
			$this->user_admin_his_model->add_user_status_msg('您的个人信息已提交', $uid, Ptype::AGENT_STATUS_INFO_COMMIT) ;

			// 设置为个人代理一级
			$this->user_model->set_user_level($uid, Ptype::LEVEL_AGENT_PERSON_LEVEL_1);
		}

		return $rst ;
	}

	public function create_recommend_code($to_uid) {
		$rst = $this->_recommend_code_is_exist($to_uid) ;

		if(!empty($rst)) {
			$code = $rst['recommend_code'] ;
		} else {
			$code = $this->_generate_recommend_code() ;
			$where = array('uid' => $to_uid) ;
			$arr = array('recommend_code' => $code) ;
			$upd = $this->user_agent_atomic->upd($arr, $where) ;
			if(empty($upd)) {
				$code == null ;
			}
		}

		return $code ;
	}

	public function get_uid_by_recommend_code($recommend_code) {
		$where = array('recommend_code' => $recommend_code) ;
		$select = 'id,uid' ;
		$rst = $this->user_agent_atomic->slt_row_arr($where, $select) ;

		if(empty($rst)) {
			if($recommend_code == "1234") {  //TODO del
				return "1" ;
			}
			return null ;
		}

		return $rst['uid'];
	}

	private function _recommend_code_is_exist($uid) {
		$where = array('uid' => $uid) ;
		$select = 'id,uid,recommend_code' ;
		$rst = $this->user_agent_atomic->slt_row_arr($where, $select) ;
		if(empty($rst)){
			return null ;
		}

		if(!isset($rst['recommend_code'])) {
			return null ;
		}

		return $rst ;
	}

	private function _generate_recommend_code() {
		$str_salt = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXXYZ';
		$code_len = 4 ;
		$code = '';
		for ($i = 0; $i < $code_len; $i ++) {
			$code .= $str_salt{rand(0, 33)};
		}

		if($this->_get_recommend_code_by_code($code)) {
			return $this->_generate_recommend_code() ;
		}
		return $code ;
	}

	private function _get_recommend_code_by_code($code) {
		$where = array('recommend_code' => $code) ;
		$select = 'recommend_code' ;
		$rst  = $this->user_agent_atomic->slt_row_arr($where, $select) ;
		return !empty($rst) ;
	}

	public function get_list($uid, $pn, $rn) {
		$this->load->model('atomic/agent/user_agent_atomic_model', 'user_agent_atomic_model') ;
		$agents = $this->user_agent_atomic_model->get_agent_list_by_uid($uid) ;

		if($agents) {
			$agents_uid = array();
			foreach ($agents as $agent) {
				$agents_uid[] = $agent['uid'];
			}

			$this->load->model('atomic/agent/user_agent_com_atomic_model', 'user_agent_com_atomic_model');
			$rst = $this->user_agent_com_atomic_model->get_list($agents_uid, $rn, $pn);
		}else{
			$rst = false;
		}
		return $rst ;
	}


}

/* vim: set ts=4 sw=4 sts=4 noet: */
