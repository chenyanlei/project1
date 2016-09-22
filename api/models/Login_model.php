<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
	private $ERC_OK				= Ecode::OK;
	private $ERC_NO_RESULT		= Ecode::NO_RESULT;		//查询错误或无结果
	private $ERC_INSERT_FAIL	= Ecode::INSERT_FAIL;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('atomic/user_atomic_model', 'user_atomic');
		$this->load->model('token_model');
	}

	public function check_in(&$user_row, $country_code, $mobile, $nickname, $sms_code)
	{
		$this->load->model('sms_code_model');
		if ('18601992186' == $mobile) //Apple审核用户,恶心吧?~
		{
			$sms_code_model_ret = $this->ERC_OK;
		}
		else
		{
			$sms_code_model_ret = $this->sms_code_model->check_sms_code($country_code, $mobile, $sms_code);
		}
		if ($this->ERC_OK !== $sms_code_model_ret)
		{
			return $sms_code_model_ret;
		}
		$user_row = $this->user_atomic->slt_row_arr(array('country_code'=>$country_code, 'mobile'=>$mobile),
			'user_id, nickname, type, role_reversal, status, setting, country_code, mobile, gender, avatar,
			 cover, brief, level, follow_num, fans_num, point, tag, create_time, im_result');
		if (!isset($user_row['user_id']) || !(0 < $user_row['user_id']))
		{
			return $this->register($user_row, $country_code, $mobile, $nickname);
		}
		$user_row['im_result'] = (int)$user_row['im_result'];
		if (0 === $user_row['im_result'])
		{
			$this->load->library('im'); 
			$easemob_ret = $this->im->open_register($result, array('username'=>$user_row['user_id'], 'nickname'=>$user_row['nickname'], 'password'=>$user_row['create_time']));
			if (0 !== $easemob_ret)
			{
				return $easemob_ret;
			}
			else
			{
				$upd_ret = $this->user_atomic->upd(array('im_result'=>1), array('user_id'=>$user_row['user_id']));
			}
		}
		if ($nickname != $user_row['nickname'])
		{
			//return $this->ERC_???; //找到用户,但两次使用App时设置的昵称不一样,提示用户确认是否是同一身份,让用户选择档案(用于自己手机号之前被人注册过nuanyu的情况)
		}
		$user_row['easemob'] = array('username'=>$user_row['user_id'], 'password'=>$user_row['create_time']);
		$token_ret = $this->token_model->set_token($token, $user_row['user_id']);
		if (0 !== $token_ret)
		{
			return $token_ret;
		}
		$user_row['token'] = $token;
		return $this->ERC_OK;
	}

	public function register(&$user_row, $country_code, $mobile, $nickname)
	{
		$this->load->library('im');
		$this->load->library('pinyin');
		$time = time();
		$user_ins_arr = array(
			'setting'		=> 7, //二进制111, 001=声音; 010=振动; 100=允许搜索;
			'country_code'	=> $country_code,
			'mobile'		=> $mobile,
			'nickname'		=> $nickname,
			'pinyin'		=> $this->pinyin->char_to_pinyin($nickname),
			'cover'			=> URL_IMG_CMS_DEFAULT.'cover.jpg',
			'create_time'	=> $time
		);
		$user_ins_ret = $this->user_atomic->ins($user_ins_arr);
		if (!isset($user_ins_ret['insert_id']) || !(0 < $user_ins_ret['insert_id']))
		{
			Ecode::logs($this->ERC_INSERT_FAIL, __METHOD__, 'country_code='.$country_code.'&mobile='.$mobile, 'nickname='.$nickname);
			return $this->ERC_INSERT_FAIL;
		}
		$user_id = $user_ins_ret['insert_id'];
		$easemob_ret = $this->im->open_register($result, array('username'=>$user_id, 'nickname'=>$nickname, 'password'=>$time));
		//var_dump($easemob_ret);
		//var_dump($result);
		if (0 !== $easemob_ret)
		{
			return $easemob_ret;
		}
		$user_row = $this->user_atomic->slt_row_arr(array('user_id'=>$user_id),
			'user_id, nickname, type, role_reversal, status, setting, country_code, mobile, gender, avatar,
			 cover, brief, level, follow_num, fans_num, point, tag, create_time');
		if (!isset($user_row['user_id']) || !(0 < $user_row['user_id']))
		{
			return $this->ERC_NO_RESULT;
		}
		$user_row['easemob'] = array('username'=>$user_id, 'password'=>$time);
		$token_ret = $this->token_model->set_token($token, $user_id);
		if (0 !== $token_ret)
		{
			return $token_ret;
		}
		$user_row['token'] = $token;
		return $this->ERC_OK;
	}

	public function check_out($token)
	{
		$token_ret = $this->token_model->del_token($token);
		if (0 !== $token_ret)
		{
			return $token_ret;
		}
		return $this->ERC_OK;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
