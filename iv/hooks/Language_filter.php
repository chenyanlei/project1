<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Language_filter /* extends CI_Controller*/
{
//	public function __construct()
//	{
//		parent::__construct();
////		$this->load->model('user_model');
////		$this->ERC_BAD_REQUEST				= Ecode::BAD_REQUEST; //非法请求
////		$this->ERC_BAD_REQUEST_TOKEN		= Ecode::BAD_REQUEST_TOKEN; //Token无效
////		$this->ERC_BAD_REQUEST_TOKEN_TIME	= Ecode::BAD_REQUEST_TOKEN_TIME; //Token过期
////		$this->ERC_BAD_REQUEST_WARNING		= Ecode::BAD_REQUEST_WARNING; //警告:没有Token且越过强制校验
//	}

	public function language_destructor()
	{
		$CI = & get_instance() ;
		$GLOBALS['language'] = "chineses";
		$lang = $CI->input->get_post('lang', TRUE);

		switch($lang) {
			case 0:
				$GLOBALS['language'] = "chineses";
				break;
			case "1":
				$GLOBALS['language'] = "english";
				break;
			case "2":
				break;
		}
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
