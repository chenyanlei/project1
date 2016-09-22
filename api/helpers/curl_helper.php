<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('h_curl'))
{
	function h_curl(&$result, $url, $args='', $header='', $method='POST', $content_type='JSON')
	{
		$ch = curl_init();
		if (('GET' === $method) && is_array($args))
		{
			$url = $url.'?'.http_build_query($args);
		}
//		$http_header[] ='' ;//= 'Host: api.qsctrip.com';
//		if (!empty($header))
//		{
//			$http_header[] = $header;
//		}
		$options = array(
			CURLOPT_URL => $url,				//请求URL
			CURLOPT_HEADER => FALSE,			//HEADER
			CURLOPT_TIMEOUT => 30,				//超时(秒)
			CURLOPT_FOLLOWLOCATION => TRUE,		//跳转后抓取
			CURLOPT_ENCODING => 'gzip',			//gzip压缩
			CURLOPT_RETURNTRANSFER => TRUE,		//文件流是否直接输出
			CURLOPT_CUSTOMREQUEST => $method,	//设置请求方式:GET|POST|PUT|DELETE
//			CURLOPT_HTTPHEADER => $http_header,	//设置HTTP头
			CURLOPT_USERAGENT => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)', //模拟用户使用的浏览器
			CURLOPT_SSL_VERIFYPEER => FALSE,	//对认证证书来源的检查
			CURLOPT_SSL_VERIFYHOST => FALSE,		//从证书中检查SSL加密算法是否存在
			CURLOPT_POSTFIELDS => $args
		);
		if ('POST' === $method)
		{
			$options[CURLOPT_POST] = TRUE;		//开启POST
		}
		if ((('POST' === $method) || ('PUT' === $method)) && is_array($args))
		{
//			$options[CURLOPT_POSTFIELDS] = ('JSON' === $content_type) ? json_encode($args, JSON_UNESCAPED_UNICODE) : http_build_query($args); //POST数据
		}
		curl_setopt_array($ch, $options);		//组装$options参数
		if(!$result = curl_exec($ch)) 
		{
			$erc = Ecode::CURL_EXEC_FAIL;
			$log_more = 'url='.$url.'&args='.json_encode($args, JSON_UNESCAPED_UNICODE).'&header='.$header.'&method='.$method.'&content_type='.$content_type;
			$log_more .= '&curl_error='.curl_error($ch).'&curl_getinfo='.json_encode(curl_getinfo($ch), JSON_UNESCAPED_UNICODE);
			Ecode::logs($erc, __METHOD__, '', $log_more);
			return $erc;
		}
		curl_close($ch);
		return Ecode::OK;
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
