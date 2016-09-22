<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ecode
{
	const DEBUG								= TRUE; //是否开启Debug模式

	const VALIDATE_DAYS                     = 2592000; //30天有效期  60 * 60 * 24 * 30 = 2592000

	const OK								= 0;

	//系统
	const C2S_ARG_ERR						= 1001;
	const S2S_ARG_ERR						= 1002;
	const CURL_EXEC_FAIL					= 1003;
	const SERIALIZE_FAIL					= 1004;
	const UNSERIALIZE_FAIL					= 1005;
	const NO_PRIVILIGE						= 1006;   // 没有操作权限

	const SMS_CODE_SEND_TOO_OFTEN			= 2000;
	const SMS_CODE_EXPIRED					= 2001;
	const USER_IMG_MKDIR_FAIL				= 2002;
	const UPLOAD_FAIL						= 2003;
	const ALREADY_LAUDED					= 2004;
	const USER_INPUT_ERR					= 2005;
	const COUNTRY_CODE_NONSUPPORT			= 2006;
	const MOBILE_FORMAT_ERR					= 2007;
	const BAD_REQUEST						= 2008;
	const BAD_REQUEST_TOKEN					= 2009;
	const BAD_REQUEST_TOKEN_TIME			= 2010;
	const BAD_REQUEST_WARNING				= 2011;

	//验证码
	const USER_GET_CAPTCHA_TAG_IS_NULL      = 2100;     // 获取图形验证码邮箱或者手机号为空
	const USER_CHECK_CAPTCHA_ERR      		= 2101;     // 输入的图形校验码错误
	const USER_CAPTCHA_INFO_ERR      		= 2102;     // 图形校验码位数小于4
	const USER_CAPTCHA_REFRESH      		= 2103;     // 请刷新校验码

	//第三方
	const SMS_SEND_RESULT_ERR				= 3001;
	const SMS_SEND_STATUS_ERR				= 3002;

	//数据
	const INSERT_FAIL						= 4001;
	const DELETE_FAIL						= 4002;
	const UPDATE_FAIL						= 4003;
	const NO_RESULT							= 4004;

	//登录
	const LOGIN_USER_NOT_EXIST              = 5001;
	const LOGIN_GET_USER_INFO_FAILED        = 5002;
	const LOGIN_USER_IS_NULL		        = 5003;
	const LOGIN_PWD_IS_NULL			        = 5004;
	const LOGIN_PWD_IS_ERROR			    = 5005;
	const LOGIN_USER_IS_NOT_CONFIRM			= 5006;  //用户未校验
	const LOGIN_USER_LOGIN_ERR				= 5007;  //您登录的qsc账号错误，请登录xxx

	//注册
	const REGISTER_REQUIRE_EMAIL		    = 5010;  // 需要邮箱
	const REGISTER_REQUIRE_PWD		        = 5011;  // 需要密码
	const REGISTER_REQUIRE_REPWD		    = 5012;	 // 需要重新输入密码
	const REGISTER_REQUIRE_WECHAT		    = 5013;  // 需要微信
	const REGISTER_REQUIRE_COUNTRY		    = 5014;  // 需要国家
	const REGISTER_REQUIRE_CITY		        = 5015;  // 需要城市
	const REGISTER_REQUIRE_NAME		        = 5016;  // 需要名称
	const REGISTER_USER_EXIST				= 5017;  // 用户已存在
	const REGISTER_USER_INVALIDATE			= 5018;  // 用户信息错误
	const REGISTER_MAIL_VERIFY_TIME_OUT		= 5019;  // 用户邮箱验证过期，请重新验证邮箱
	const REGISTER_PWD_NOT_EQUAL			= 5020;  // 两次输入密码不一致
	const REGISTER_REQUIRE_PHONE		    = 5021;  // 需要手机号
	const USER_REG_CHECK_PHONE_EXIST      	= 5022;  // 注册手机号已存在
	const USER_REG_CHECK_EMAIL_EXIST      	= 5023;  // 注册邮箱号已存在
	const USER_REG_CHECK_QSC_EXIST      	= 5024;  // 注册QSC已存在
	const USER_REG_CHECK_QSC_INVALID	    = 5025;  // 注册QSC证书编号无效
	const USER_REG_REV_MAIL_FAILED		    = 5026;  // 注册接收邮件失败，请确认邮箱是否有效
	const USER_REG_MAIL_VIRYFYED			= 5027;  // 邮箱已经验证，请直接登录
	const USER_REG_MAIL_VIRYFY_CODE_ERR		= 5028;  // 注册验证码错误

	//找回密码
	const FIND_PASSWORD_USER_IS_NOT_EXIST	= 5030;  //用户不存在
	const RESET_PASSWORD_FAILD				= 5031;  //重置密码失败
	const USER_NOT_BEGIN_USE				= 5032;  //没有设置确定审核通过





	private static $msg_arr;
	static function msg($err)
	{
		self::$msg_arr = array(
			self::OK							=> '成功',
			self::C2S_ARG_ERR					=> '客户端传递给服务器的参数错误',
			self::S2S_ARG_ERR					=> 'Server内部参数传递错误',
			self::CURL_EXEC_FAIL				=> 'CURL请求第三方API失败',
			self::SERIALIZE_FAIL				=> '序列化失败',
			self::UNSERIALIZE_FAIL				=> '反序列化失败',
			self::NO_PRIVILIGE					=> '没有操作权限',

			self::USER_GET_CAPTCHA_TAG_IS_NULL 	=> '邮箱或者手机号为空',
			self::USER_CHECK_CAPTCHA_ERR 		=> '校验码校验错误',
			self::USER_CAPTCHA_INFO_ERR 		=> '图形校验码位数小于4',
			self::USER_CAPTCHA_REFRESH 			=> '请刷新校验码',
			self::USER_REG_CHECK_PHONE_EXIST 	=> '注册手机号已存在，请直接登录或者找回密码',
			self::USER_REG_CHECK_EMAIL_EXIST 	=> '注册邮箱号已存在，请直接登录或者找回密码',
			self::USER_REG_CHECK_QSC_EXIST      => '注册QSC已存在',
			self::USER_REG_CHECK_QSC_INVALID    => '注册QSC证书编号无效',
			self::USER_REG_REV_MAIL_FAILED		=> '注册接收邮件失败，请确认邮箱是否有效',
			self::USER_REG_MAIL_VIRYFYED		=> '邮箱验证链接失效',
			self::USER_REG_MAIL_VIRYFY_CODE_ERR	=> '注册验证码错误',

			self::SMS_CODE_SEND_TOO_OFTEN		=> '1分钟内不能重复发送', //短信验证码发送间隔限制,防恶意刷短信
			self::SMS_CODE_EXPIRED				=> '短信验证码过期',
			self::USER_IMG_MKDIR_FAIL			=> '创建用户图片目录失败',
			self::UPLOAD_FAIL					=> '上传失败',
			self::ALREADY_LAUDED				=> '您已赞过',
			self::USER_INPUT_ERR				=> '用户输入错误',
			self::COUNTRY_CODE_NONSUPPORT		=> '不支持此手机号',
			self::MOBILE_FORMAT_ERR				=> '手机号格式错误',
			self::BAD_REQUEST					=> '非法请求',
			self::BAD_REQUEST_TOKEN				=> 'Token无效',
			self::BAD_REQUEST_TOKEN_TIME		=> 'Token过期',
			self::BAD_REQUEST_WARNING			=> '警告:没有Token且越过强制校验',

			self::SMS_SEND_RESULT_ERR			=> '短信发送失败',
			self::SMS_SEND_STATUS_ERR			=> '短信发送状态异常',

			self::INSERT_FAIL               	=> '创建失败',
			self::DELETE_FAIL					=> '删除失败',
			self::UPDATE_FAIL              	 	=> '更新失败',
			self::NO_RESULT						=> '查询错误或无结果',

			//登录
			self::LOGIN_USER_NOT_EXIST			=> '用户不存在',
			self::LOGIN_GET_USER_INFO_FAILED	=> '获取用户信息失败',
			self::LOGIN_USER_IS_NULL			=> '用户名不能为空',
			self::LOGIN_PWD_IS_NULL				=> '密码不能为空',
			self::LOGIN_PWD_IS_ERROR			=> '输入密码错误',
			self::LOGIN_USER_IS_NOT_CONFIRM 	=> '此邮箱尚未验证，请到您的邮箱收信，并点击其中的链接验证您的邮箱',

			//注册
			self::REGISTER_REQUIRE_EMAIL		=> '需要邮箱',
			self::REGISTER_REQUIRE_PWD			=> '需要密码',
			self::REGISTER_REQUIRE_REPWD		=> '需要重新输入密码',
			self::REGISTER_REQUIRE_WECHAT		=> '需要微信',
			self::REGISTER_REQUIRE_COUNTRY		=> '需要国家',
			self::REGISTER_REQUIRE_CITY			=> '需要城市',
			self::REGISTER_REQUIRE_NAME			=> '需要名称',
			self::REGISTER_USER_EXIST			=> '用户已存在',
			self::REGISTER_USER_INVALIDATE		=> '用户信息错误',
			self::REGISTER_MAIL_VERIFY_TIME_OUT	=> '用户邮箱校验超时',
			self::REGISTER_PWD_NOT_EQUAL		=> '两次输入密码不一致',
			self::REGISTER_REQUIRE_PHONE    	=> '需要手机号',

			self::FIND_PASSWORD_USER_IS_NOT_EXIST	=> '用户不存在',
			self::RESET_PASSWORD_FAILD				=> '重置密码失败',
			self::LOGIN_USER_LOGIN_ERR				=> '您登录的qsc账号错误，请登录xxx',
			self::USER_NOT_BEGIN_USE				=> '用户审核通过，还没有确定使用',  //没有设置确定审核通过

		);

		return isset(self::$msg_arr[$err]) ? self::$msg_arr[$err] : '未知错误!';
	}

	static function logs($err, $method, $who = '', $more = '')
	{
		if (self::DEBUG) log_message('error', '#'.$err.' [where]:'.$method.' [what]:"'.self::msg($err).'" [who]:'.$who.' [more]:'.$more);
		return self::msg($err);
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
