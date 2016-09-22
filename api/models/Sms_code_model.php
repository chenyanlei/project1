<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_code_model extends CI_Model
{
	private $ERC_OK							= Ecode::OK;
	private $ERC_NO_RESULT					= Ecode::NO_RESULT; //查询错误或无结果
	private $ERC_INSERT_FAIL				= Ecode::INSERT_FAIL;
	private $ERC_USER_INPUT_ERR				= Ecode::USER_INPUT_ERR;
	private $ERC_SMS_CODE_EXPIRED			= Ecode::SMS_CODE_EXPIRED;
	private $ERC_SMS_CODE_SEND_TOO_OFTEN	= Ecode::SMS_CODE_SEND_TOO_OFTEN;

	//四位随机sms_code，变更位数时，需修改sms_code表sms_code字段to varchar(位数)
	private $RAND_MIN				= 1000;
	private $RAND_MAX				= 9999;
	private $TEMPLATE_ID			= 24614; //容联云通讯 http://www.yuntongxun.com 短信模板ID(templateId):24614 内容:【暖遇APP】验证码:{1},请输入完成登录
	private $SMS_CODE_SEND_GAP_TIME	= 55; //短信验证码发送间隔55秒,客户端限制60秒,服务端只为防恶意刷短信,给客户端留5秒宽限时间
	private $SMS_CODE_EXPIRY_TIME	= 900; //短信验证码有效时间15分钟

	public function __construct()
	{
		parent::__construct();
		$this->load->model('atomic/sms_code_atomic_model', 'sms_code_atomic');
	}

	public function send_sms_code($country_code, $mobile)
	{
		$row_arr = $this->sms_code_atomic->slt_row_arr(array('country_code'=>$country_code, 'mobile'=>$mobile), 'create_time', 'sms_code_id desc');
		if (isset($row_arr['create_time']) && ($row_arr['create_time'] > time() - $this->SMS_CODE_SEND_GAP_TIME))
		{ //上次发送的短信验证码还未超过有效期,即:同一个手机号有效期内不能重复发送
			return $this->ERC_SMS_CODE_SEND_TOO_OFTEN;
		}

		$CI =& get_instance();
		$CI->load->add_package_path(APPPATH.'third_party/sms/');
		$CI->load->helper('yuntongxun_com');

		$generate_erc = $this->generate_sms_code($sms_code, $country_code, $mobile);
		if (0 !== $generate_erc)
		{
			return $generate_erc;
		}
		return h_send_sms($mobile, array($sms_code), $this->TEMPLATE_ID);
	}

	public function check_sms_code($country_code, $mobile, $post_sms_code)
	{
		$row_arr = $this->sms_code_atomic->slt_row_arr(array('country_code'=>$country_code, 'mobile'=>$mobile), 'sms_code, create_time', 'sms_code_id desc');
		if (!isset($row_arr['sms_code']) || $this->RAND_MIN > $row_arr['sms_code'] || $this->RAND_MAX < $row_arr['sms_code'])
		{
			return $this->ERC_NO_RESULT;
		}
		if ($post_sms_code != $row_arr['sms_code'])
		{
			return $this->ERC_USER_INPUT_ERR;
		}
		if ((time() - $this->SMS_CODE_EXPIRY_TIME) > $row_arr['create_time'])
		{ //短信验证码发送时间已超过其有效期,即:已失效,须重新发送
			return $this->ERC_SMS_CODE_EXPIRED;
		}
		return $this->ERC_OK;
	}

	public function generate_sms_code(&$sms_code, $country_code, $mobile)
	{
		$sms_code = mt_rand($this->RAND_MIN, $this->RAND_MAX);
		$sms_code_ins_ret = $this->sms_code_atomic->ins(array('country_code'=>$country_code, 'mobile'=>$mobile, 'sms_code'=>$sms_code, 'create_time'=>time()));
		if (!isset($sms_code_ins_ret['insert_id']))
		{
			Ecode::logs($this->ERC_INSERT_FAIL, __METHOD__, 'country_code='.$country_code.'&mobile='.$mobile, 'sms_code='.$sms_code);
			return $this->ERC_INSERT_FAIL;
		}
		return $this->ERC_OK;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
