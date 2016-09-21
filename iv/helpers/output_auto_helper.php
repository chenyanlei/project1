<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('h_echo_json'))
{
	function h_echo_json($json)
	{
		
		header('Content-type: application/json;charset=utf-8');
		exit($json); //This function does not need to return, void foo().
	}
}


if (!function_exists('h_echo_json_ex'))
{
	function h_echo_json_ex($err, array $content=array(), $msg='')
	{
		if (!is_int($err) || $err < 0 || !is_array($content))
		{
			$json = json_encode(array('result'=>array('err'=>$err, 'msg'=>$msg)), JSON_UNESCAPED_UNICODE);
		}
		elseif (!empty($content))
		{
			$json = json_encode(array('result'=>array('err'=>$err, 'msg'=>$msg, 'content'=>$content)), JSON_UNESCAPED_UNICODE);
		}
		else
		{
			$json = json_encode(array('result'=>array('err'=>$err, 'msg'=>$msg)), JSON_UNESCAPED_UNICODE); //Use JSON_UNESCAPED_UNICODE Need PHP_VERSION >= 5.4.0
		}

		header('Content-type: application/json;charset=utf8');
//		header('Content-type: html/text;charset=utf8');

		echo $json; //This function does not need to return, void foo().
	}
}
/* vim: set ts=4 sw=4 sts=4 noet: */
