<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_model extends CI_Model
{
	public function __construct() {
		parent::__construct();
		$this->load->model('atomic/sms_atomic_model', 'sms_atomic_model');
	}

	public function send_sms_by_type($sms_type, $phone, $channel=Ptype::SEND_SMS_CHANNEL_HUAXING) {
		$code = '' ;
		$msg = $this->_general_msg_by_type($code, $sms_type) ;
		$rst = $this->send_sms($msg, $phone, $channel)  ;

		if($rst != null) {
			$smsid = $rst['smsid'] ;
			$status = $rst['result'];
			if($status == 0) {
				$status = Ptype::SMS_STATUS_SENDING ;
				$status_msg = $rst['message'];
				$status_msg = '短消息发送中';
				$this->set_msg($phone, $smsid, $code, $msg, $sms_type, $status_msg, $status, $channel) ;
				return Ecode::OK ;
			} else {
				$status = Ptype::SMS_STATUS_SEND_FAILURE ;
				$status_msg = "短消息发送失败" ;
				$this->set_msg($phone, $smsid, $code, $msg, $sms_type, $status_msg, $status, $channel) ;
				// TODO 走其他渠道发送
				return Ecode::SMS_SEND_RESULT_ERR  ;
			}
		} else {
			// TODO 走其他渠道发送
			return Ecode::SMS_SEND_RESULT_ERR  ;
		}
	}

	/**
	 * 检查登录的手机号和短消息验证码
	 * 	   验证码有效期15分钟，过期，直接die
	 *
	 * @param $phone
	 * @param $code
	 * @return bool
	 */
	public function check_login_sms($phone, $code) {
		$where = array('phone'=>$phone, 'code'=>$code) ;
		$select = 'sms_type, time_send' ;
		$order_by = 'time_send DESC' ;
		$rst = $this->sms_atomic_model->slt_row_arr($where, $select, $order_by) ;

//		if( !empty($rst) ) {
		if( $rst ) {
			$time = strtotime($rst['time_send']);
			if(time() - $time > 30 * 60) {
//			if(time() - $time >  60) { // test
				die(h_echo_json(Ecode::SMS_CODE_EXPIRED)) ;
			}
			return true ;
		}

		return false ;
	}

	//手机号是否可以重新发送短消息
	public function can_resend_sms($phone) {
		$where = array('phone'=>$phone) ;
		$select = 'sms_type, time_send' ;
		$order_by = 'time_send DESC' ;
		$rst = $this->sms_atomic_model->slt_row_arr($where, $select, $order_by) ;
		if( $rst ) {
			$time = strtotime($rst['time_send']);
			if(time() - $time >  60) {
				return true ;
			} else {
				return false ;
			}
		} else {
			return true ;
		}
	}

	public function send_sms_by_msgid($msg_id, $channel=Ptype::SEND_SMS_CHANNEL_HUAXING) {
		$msg = '' ;
		$phone = '' ;
		$sms_type = '' ;
		if($this->_get_send_msg_by_smsid($msg, $phone, $sms_type, $msg_id)) {
			$this->send_sms_by_type($sms_type, $phone, $channel) ;
		}
	}

	public function send_sms_success($sms_id, $status_msg, $channel) {
		$where = array('sms_id' => $sms_id, 'channel' => $channel) ;
		$data = array('status' => Ptype::SMS_STATUS_SEND_SUCCESS, 'status_msg'=>$status_msg, 'time_callback'=>time()) ;
		return $this->sms_atomic_model->upd($data, $where) ;
	}

	public function send_sms_failure($sms_id, $status_msg, $channel) {
		$where = array('sms_id' => $sms_id, 'channel' => $channel) ;
		$data = array('status' => Ptype::SMS_STATUS_SEND_FAILURE , 'status_msg'=>$status_msg, 'time_callback'=>time()) ;
		return $this->sms_atomic_model->upd($data, $where) ;
	}

	public function send_sms_failure_resend($sms_id, $status_msg, $channel) {
		$where = array('sms_id' => $sms_id, 'channel' => $channel) ;
		$data = array('status' => Ptype::SMS_STATUS_SEND_FAILURE_RESEND , 'status_msg'=>$status_msg, 'time_callback'=>time()) ;
		return $this->sms_atomic_model->upd($data, $where) ;
	}

	public function send_sms($msg, $phone, $channel=Ptype::SEND_SMS_CHANNEL_HUAXING) {
		if($channel == Ptype::SEND_SMS_CHANNEL_HUAXING) {
			return $this->_send_sms_by_huaxing($msg, $phone) ;
		} elseif($channel == Ptype::SEND_SMS_CHANNEL_RONGLIAN) {
			// TODO
			return null ;
		} elseif($channel == Ptype::SEND_SMS_CHANNEL_DAYU) {
			// TODO
			return null ;
		}
	}

	private function _get_send_msg_by_smsid(&$msg, &$phone, &$sms_type,  $smsid) {
		$where = array("sms_id" => $smsid) ;
		$select = "msg, phone, sms_type" ;
		$rst =  $this->sms_atomic_model->slt_row_arr($where, $select) ;

		if(empty($rst)) {
			return false ;
		}
		$msg = $rst['msg'] ;
		$phone = $rst['phone'] ;
		$sms_type = $rst['sms_type'] ;
		return true;
	}

	public function set_msg($phone, $smsid, $code, $msg, $msg_type, $status_msg, $status, $channel=Ptype::SEND_SMS_CHANNEL_HUAXING) {
		$data = array(
			'channel' 		=> $channel,
			'sms_id' 		=> $smsid,
			'sms_type' 		=> $msg_type,
			'msg' 			=> $msg,
			'code' 			=> $code,
			'phone' 		=> $phone,
			'status' 		=> $status,
			'status_msg' 	=> $status_msg,
		) ;
		return $this->sms_atomic_model->ins($data) ;
	}

	private function _send_sms_by_huaxing($msg, $phone) {
		require_once APPPATH.'/libraries/sms_huaxing/Huaxing_sms_send.php';
		$sender = new Huaxing_sms_send() ;
		$rst =  $sender->post($msg, $phone) ;

		if(!empty($rst)) {
			$arr = explode('&', $rst) ;

			$data_arr = array() ;
			foreach($arr as $item) {
				$data = explode("=", $item) ;
				$data_arr[$data[0]] = $data[1] ;
			}

			return $data_arr ;
		}

		return null ;
	}

	private function _generate_sms_code() {
		$min = 100000 ;
		$max = 999999 ;
		return rand($min, $max) ;
	}

	private function _general_msg_by_type(&$code, $sms_type) {
		switch($sms_type) {
			case Ptype::SMS_TYPE_REGISTER:{ // 注册
				$code = $this->_generate_sms_code() ;
				return "欢迎注册使用逍品旅行，您的验证码是".$code."【逍品旅行】" ;
			} break ;
			case Ptype::SMS_TYPE_LOGIN:{    // 登录
				$code = $this->_generate_sms_code() ;
				return "欢迎使用逍品旅行，您本次的登录验证码是".$code."。请不要告诉别人，如果非本人操作，请注意账号安全。【逍品旅行】" ;
//				return "您的登录验证码是".$code."。请不要告诉别人，如果非本人操作，请注意账号安全【逍品旅行】" ;
			} break ;
			case Ptype::SMS_TYPE_FIND_PWD:{ // 找回密码
				$code = $this->_generate_sms_code() ;
				return "您本次的验证码是".$code."。为保障您的账号和资产安全，请勿将验证码泄露给他人。【逍品旅行】" ;
			} break ;
			case Ptype::SMS_TYPE_BOOKING:{  // 预订产品
				return "您【逍品旅行】" ;
			} break ;
			case Ptype::SMS_TYPE_PAYED:{    // 支付


			} break ;
			case Ptype::SMS_TYPE_ORDER_CANCEL:{ // 订单取消


			} break ;
			case Ptype::SMS_TYPE_ORDER_MODIFY:{ // 订单修改


			} break ;
			case Ptype::SMS_TYPE_REGISTER_SUCCSESS:{ // 订单修改
//				return "恭喜您成为逍品旅行的至尊合伙代理人，登陆网址为：http://a.qsctrip.com。逍品旅行免费为业界同行和合伙代理人提供高效、便捷的在线销售工具，以及全球各目的地优质的旅游产品和专项服务，帮助合伙代理人轻轻松松地营销钱进。如需帮助，请拨打服务专员电话010-62238287，或者添加服务专员qq好友3481486609，我们将及时为您提供在线咨询服务。【逍品旅行】" ;
				return "恭喜您成为逍品旅行的至尊合伙代理人，如需帮助，请拨打服务专员电话010-62238287，或者添加服务专员qq好友3481486609，我们将及时为您提供在线咨询服务。【逍品旅行】" ;
			} break ;
			default:
				break ;
		}
	}

	public function generate_order_cancel_sms_content($order_id) {
		return "您的订单号为".$order_id."的订单已取消【逍品旅行】" ;
	}

	public function generate_order_chargeback_sms_content($order_id) {
		return "您的订单号为".$order_id."的订单提交退款申请，我们会尽快审核，预计3个工作日完成您的退款审核，请耐心等待。" ;
	}




}

/* vim: set ts=4 sw=4 sts=4 noet: */
