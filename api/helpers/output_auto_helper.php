<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('h_echo_json'))
{
	function h_echo_json($err, array $content=array(), $msg='')
	{
		if (!is_int($err) || $err < 0 || !is_array($content))
		{
			$json = json_encode(array('result'=>array('err'=>Ecode::S2S_ARG_ERR, 'msg'=>Ecode::msg(Ecode::S2S_ARG_ERR))), JSON_UNESCAPED_UNICODE);
		}
		elseif (!empty($content))
		{
			$json = json_encode(array('result'=>array('err'=>$err, 'msg'=>($msg==''?Ecode::msg($err):$msg) ), 'content'=>$content), JSON_UNESCAPED_UNICODE);
		}
		else
		{
			$json = json_encode(array('result'=>array('err'=>$err, 'msg'=>($msg==''?Ecode::msg($err):$msg))), JSON_UNESCAPED_UNICODE); //Use JSON_UNESCAPED_UNICODE Need PHP_VERSION >= 5.4.0
		}

		header('Content-type: application/json;charset=utf8');
//		header('Content-type: html/text;charset=utf8');

//		var_dump('json:'.$json) ;
		echo $json; //This function does not need to return, void foo().
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
