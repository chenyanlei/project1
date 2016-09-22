<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Request_filter /*extends CI_Controller*/
{
	protected $CI;

	public function __construct()
	{
//		parent::__construct();

		$this->C2S_ARG_ERR					= Ecode::C2S_ARG_ERR; //客户端传递参数错误
		$this->ERC_BAD_REQUEST				= Ecode::BAD_REQUEST; //非法请求
		$this->ERC_BAD_REQUEST_TOKEN		= Ecode::BAD_REQUEST_TOKEN; //Token无效
		$this->ERC_BAD_REQUEST_TOKEN_TIME	= Ecode::BAD_REQUEST_TOKEN_TIME; //Token过期
		$this->ERC_BAD_REQUEST_WARNING		= Ecode::BAD_REQUEST_WARNING; //警告:没有Token且越过强制校验

		$this->CI =& get_instance();
		$this->CI->load->model('token_model');
	}

	public function token_destructor()
	{
		$method = $this->CI->uri->segment(2);
		$cls = $this->CI->uri->segment(1);
		$method_arr = array(
//			'truncate' => "清空表测试",
			'register' => '注册',
			'login_by_sms' => '短消息登录',
			're_verify_email'=>'重新验证邮箱',
			'check_user_name' => '检测用户名',
			'get_verify_code' => '获取手机校验码',
			'login' => '登录',
			'register_confirm' => '注册确认',
			'find_pwd_by_email' => '找回密码',
			'reset_pwd_by_code'=>'reset passwd',
			'register_confirm_by_code' => '注册码验证',
			'find_pwd_by_mobile' => '手机号找回密码',
		);

		// 不需要token的method
		if ($cls == 'user' && array_key_exists((string)$method, $method_arr)) {
			return ;
		}

		//过滤merchant中的方法
		$method_arr_merchant = array(
			"get_list" => "get_list",
			"get_detail" => "get_detail"
		) ;
		if ($cls == 'merchant' && array_key_exists((string)$method, $method_arr_merchant)) {
			return ;
		}

		// 忽略掉的controller
		$ignore_cls = array(
			'register' => '注册',
			'captcha' =>'图形校验码',
			'pay' =>'pay',
			'qrcode_creator' => 'qrcode_creator',
			'wx_msg'=>'Wx_msg',
			'wx_pay'=>'Wx_pay',
//			'weixin_admin_menu'=>'Weixin_admin_menu'
		) ;

		if(array_key_exists((string)$cls, $ignore_cls)) {
			return ;
		}

		$is_optional = $this->_token_is_optional($cls, $method) ;
		$ignore_cls1 = array(
			'product_spread' => '分享' ,
			'sms' => "短消息回调",
			'product' => '产品',
			) ;

		$ignore_method_arr = array(
			'sms_callback_by_hxrt'=>"短消息回调" ,
			'get_a_product_list' => '商户',
			'send_login_sms' => '短消息登录',
			'send_regiter_sms' =>'注册短消息',
			'send_find_pwd_sms' =>'找回密码短消息',
			'send_login_sms_ex'=>'send_login_sms_ex'

		) ;

		if(!$is_optional) {
			if(array_key_exists((string)$cls, $ignore_cls1) && array_key_exists((string)$method, $ignore_method_arr) ) {
				return ;
			}
		}

		$GLOBALS['user_id'] = 0;
		$user_id = -1 ;
		$create_time = 0 ;

		$token = $this->CI->input->get_post('token') ;
		$this->CI->token_model->get_user_id_create_time($user_id, $create_time, $token) ;
		if (isset($token))
		{
			$expiry_time = time() - 31536000; //86400 * 365; //Token有效期一年
			$user_id = 0 ;
			$create_time = 0 ;
			$model_erc = $this->CI->token_model->get_user_id_create_time($user_id, $create_time, $token);

			if (Ecode::OK !== $model_erc || 0 === $user_id || 0 === $create_time)
			{
				if(!$is_optional) {
					exit(h_echo_json($this->ERC_BAD_REQUEST_TOKEN));
				}
			}
			elseif ($expiry_time > $create_time)
			{
				if(!$is_optional) {
					exit(h_echo_json($this->ERC_BAD_REQUEST_TOKEN_TIME));
				}
			}
			$GLOBALS['user_id'] = (int)$user_id;

			$this->type_destruct($user_id) ;
		}
		else
		{
			if(!$is_optional) {
				exit(h_echo_json($this->ERC_BAD_REQUEST, $this->CI->input->post()));
			}
		}
	}

	// token 可选
	private function _token_is_optional($cls, $method) {
		$ignore_cls1 = array(
					'product' => '产品',
					'product_spread' => '分享',
					'wx_user'=>'Wx_user',
			) ;
		$ignore_method_arr = array(
					'detail' => '详情',
					'get_detail' => '详情',
					'get_user_info'=>'wx_user-get_user_info'
					) ;

		return array_key_exists((string)$cls, $ignore_cls1) && array_key_exists((string)$method, $ignore_method_arr);
	}

	// 根据user_id check请求的来源和用户注册类型
	private  function type_destruct($user_id)
	{
		$user_type = $this->CI->input->get_post('type') ;
		if($user_type != 0 && $user_type != 1 && $user_type != 2 && $user_type != 3 && $user_type != 4 ) {
			exit(h_echo_json($this->C2S_ARG_ERR, array(), "缺少参数type"));
		}

		$GLOBALS['user_type'] = $user_type;
		$this->CI->load->model('user_model') ;

		$user_info = $this->CI->user_model->get_user_infor_by_uid($user_id) ;
		if(empty($user_info)) {
			exit(h_echo_json($this->C2S_ARG_ERR, array(), "参数错误"));
		}

		if($user_info['begin_use'] == 0) {
			$cls = $this->CI->uri->segment(1);
			$method = $this->CI->uri->segment(2);
			$ignoreCls = array(
				"user" => "user",
				"user_agent" => "user_agent",
				"image" => "image"
			) ;
			$ignoreMethod = array(
				'begin_use_platfrom' => 'begin_use_platfrom',
				'get_user_last_status_msg' => 'get_user_last_status_msg',
				'check_recommend_code' => 'check_recommend_code',
				'get_general_qiniu_uptoken' => 'get_general_qiniu_uptoken',
				'get_upload_key' => 'get_upload_key',
				'get_qiniu_uptoken' => 'get_qiniu_uptoken',
				'callback' => 'callback',
				'get_user_last_status_msg' => 'get_user_last_status_msg',
				'set_agent_auting_info' => 'set_agent_auting_info',
			) ;
			if(array_key_exists($cls, $ignoreCls) && array_key_exists($method, $ignoreMethod)) {
				// pass
			} else {
				exit(die(h_echo_json(Ecode::USER_NOT_BEGIN_USE)) ) ;
			}
		}

		// 超级管理员
		if($user_info['privilige'] == 0) {
			return ;
		}

		$type = $user_info['user_type'];//$this->CI->user_model->get_user_type_by_id($user_id) ;
		if($type != $user_type) {
			exit(h_echo_json($this->C2S_ARG_ERR, array(), "参数type错误"));
		}
	}


}

/* vim: set ts=4 sw=4 sts=4 noet: */
