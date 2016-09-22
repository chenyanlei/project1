<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Custom_model extends Atomic_model
{
	public function __construct()
	{
		parent::__construct();
		$this->table_name = 'custom_0';
	}

	public function add($uid, $preference, $start_date, $person_num, $destination, $start_point, $name, $age, $sex, $phone, $other, $days)
	{
		$arr = array(
			"uid" => $uid,
			"preference" =>$preference ,
			"start_date" =>$start_date ,
			"person_num" =>$person_num ,
			"destination" =>$destination ,
			"start_point" =>$start_point ,
			"name" =>$name ,
			"age" =>$age ,
			"sex" =>$sex ,
			"phone" =>$phone,
			"days" =>$days,
		) ;

		if( isset($other) ) {
			$arr['other'] = $other;
		}

		$rst = $this->ins($arr) ;
		return $rst ;
	}

	public function get_my_custom($uid, $rn , $pn) {
		$where = array('uid' => $uid) ;
		$offset = $rn * $pn ;
		$select = "id, preference, start_date, person_num, start_point, destination, name, age, sex, phone, other,days" ;

		$cnt = $this->cnt($where) ;
		if($offset < $cnt) {
			$rst = $this->slt_res_arr($where, $select, $rn, $offset) ;
		} else {
			return null ;
		}

		$data = array(
			"rn" => $rn ,
			"pn" => $pn ,
			"total" => intval($cnt),
			"data" => $rst ,
		) ;

		return $data ;
	}

	public function get_custom_detail($id) {
		$where = array('id' => $id) ;
		$rst = $this->slt_row_arr($where) ;
		return $rst ;
	}

	public function notify_to_suppliyer($uid, $preference, $start_date, $person_num, $destination, $start_point, $name, $age, $sex, $phone, $other) {
		$this->load->model("atomic/user_atomic_model", "user_atomic_model") ;
		$this->load->model("wx/wx_user_atomic_model", "wx_user_atomic_model") ;
		$where = array('id'=>$uid) ;
		$select = "wx_openid" ;
		$rst = $this->user_atomic_model->slt_row_arr($where, $select) ;
		if(empty($rst)) {
			return ;
		}

		$openid = $rst['wx_openid'];
		$where = array("openid" => $openid) ;
		$select = "nickname,sex" ;
		$rst = $this->wx_user_atomic_model->slt_row_arr($where, $select) ;
		if(empty($rst)) {
			return ;
		}

		if($rst['sex'] == 1) {
			$sex = "先生" ;
		} else {
			$sex = "女士" ;
		}


		$content = "尊敬的".$rst['nickname'].$sex.", 我们已经收到您的旅游定制需求，清单如下： ".$start_date."日,".
		"从".$start_point."去往".$destination."的vip定制需求。请保持手机开通或者定时查看微信中的通知，逍品旅行提供国内高端出境旅游服务。";

		$this->load->model("wx/wx_agent_model", "wx_agent_model") ;
		$this->wx_agent_model->kf_msg($openid, $content) ;

		// 通知客服
		$date = date("Y-m-d",time()) ;
		$notify = "客户".$rst['nickname'].$sex.",\n于".$date."提交了旅游定制需求，清单如下：\n ".$start_date."日,\n".
			"从".$start_point."去往".$destination."的vip定制需求，\n请相关人员及时跟进";

		$arr = array(
			"yake" => "ofqfxvty42tmlp2r1A1CvviY5qbg",
			"david" => "ofqfxvl82n1eoUFqbDmjMohu5AgE",
			"wxj" => "ofqfxvgy4VSSxUgoN9i75_MAKoNg",
			"军磊" => "ofqfxvips89Ia56c4Y0kEYCyOsGA",
			"庆亮" => "ofqfxvsuy1La5j1OVK2z_D3Euk6c",
		) ;

		foreach($arr as $key => $openid) {
			$this->wx_agent_model->kf_msg($openid, "客服".$key.":\n".$notify) ;
		}
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
