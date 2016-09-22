<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('h_check_mobile'))
{
	function h_check_mobile($country_code, $mobile)
	{
		if (empty($country_code) || empty($mobile))
		{
			return Ecode::S2S_ARG_ERR;
		}
		$CI =& get_instance();
		$CI->config->load('application', TRUE);
		$support_area = $CI->config->item('support_area', 'application');
		if (!array_key_exists($country_code, $support_area))
		{
			return Ecode::COUNTRY_CODE_NONSUPPORT;
		}
		if (!preg_match("/^1[34578][0-9]{9}$/", $mobile))
		{
			return Ecode::MOBILE_FORMAT_ERR;
		}
		return Ecode::OK;
	}
}

if (!function_exists('h_check_password'))
{
	function h_check_password($password)
	{
		return Ecode::OK;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
