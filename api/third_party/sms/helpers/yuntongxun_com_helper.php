<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *  Copyright (c) 2014 The CCP project authors. All Rights Reserved.
 *
 *  Use of this source code is governed by a Beijing Speedtong Information Technology Co.,Ltd license
 *  that can be found in the LICENSE file in the root of the web site.
 *
 *  容联云通讯 http://www.yuntongxun.com
 *
 *  An additional intellectual property rights grant can be found
 *  in the file PATENTS.  All contributing project authors may
 *  be found in the AUTHORS file in the root of the source tree.
 */

include_once(APPPATH.'third_party/sms/libraries/Yuntongxun_com.php');

/**
  * 发送模板短信
  * @param to_mobile 手机号码集合,用英文逗号分开
  * @param msg_arr 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
  * @param tpl_id 模板Id
  */

if (!function_exists('h_send_sms'))
{
	function h_send_sms($to_mobile, $msg_arr, $tpl_id)
	{
		$CI =& get_instance();
		$CI->config->load('application', TRUE);
		$cfg = $CI->config->item('sms', 'application');
		//var_dump($cfg);

		$account_sid	= $cfg['account_sid']; //主帐号
		$account_token	= $cfg['account_token']; //主帐号Token
		$app_id			= $cfg['app_id']; //应用Id
		$server_ip		= $cfg['server_ip']; //请求地址，格式如下，不需要写https://
		$server_port	= $cfg['server_port']; //请求端口 
		$soft_version	= $cfg['soft_version']; //REST版本号
		$body_type		= $cfg['body_type']; //使用json or xml格式数据
		$enabe_log		= $cfg['enabe_log']; //是否开启日志

		$rest = new Yuntongxun_com($server_ip, $server_port, $soft_version, $body_type, $enabe_log);
		$rest->setAccount($account_sid, $account_token);
		$rest->setAppId($app_id);

		$result = $rest->sendTemplateSMS($to_mobile, $msg_arr, $tpl_id); //发送模板短信
		if ($result == NULL)
		{
			return Ecode::SMS_SEND_RESULT_ERR;
		}
		if ($result->statusCode != 0)
		{
			//echo 'error code :'.$result->statusCode.'<br>';
			//echo 'error msg :'.$result->statusMsg.'<br>';
			return Ecode::SMS_SEND_STATUS_ERR;
		}
		else
		{
			$sms_msg = $result->TemplateSMS;
			//echo 'dateCreated:'.$sms_msg->dateCreated.'<br/>';
			//echo 'smsMessageSid:'.$sms_msg->smsMessageSid.'<br/>';
			return Ecode::OK;
		}
	}
}

//Demo调用 
//sendTemplateSMS('手机号码','内容数据','模板Id');

/* vim: set ts=4 sw=4 sts=4 noet: */
