<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('h_curl'))
{
	// function h_curl(&$result, $url, $args='', $header='', $method='POST', $content_type='JSON')
	// {
	// 	$ch = curl_init();
	// 	if (('GET' === $method) && is_array($args))
	// 	{
	// 		$url = $url.'?'.http_build_query($args);
	// 	}
	// 	$http_header[] = 'Host:s.outbound-tourism.cn';
	// 	if (!empty($header))
	// 	{
	// 		$http_header[] = $header;
	// 	}
	// 	$options = array(
	// 		CURLOPT_URL => $url,				//请求URL
	// 		CURLOPT_HEADER => FALSE,			//HEADER
	// 		CURLOPT_TIMEOUT => 30,				//超时(秒)
	// 		CURLOPT_FOLLOWLOCATION => TRUE,		//跳转后抓取
	// 		CURLOPT_ENCODING => 'gzip',			//gzip压缩
	// 		CURLOPT_RETURNTRANSFER => TRUE,		//文件流是否直接输出
	// 		CURLOPT_CUSTOMREQUEST => $method,	//设置请求方式:GET|POST|PUT|DELETE
	// 		CURLOPT_HTTPHEADER => $http_header,	//设置HTTP头
	// 		CURLOPT_USERAGENT => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)', //模拟用户使用的浏览器
	// 		CURLOPT_SSL_VERIFYPEER => FALSE,	//对认证证书来源的检查
	// 		CURLOPT_SSL_VERIFYHOST => FALSE		//从证书中检查SSL加密算法是否存在
	// 	);
	// 	if ('POST' === $method)
	// 	{
	// 		$options[CURLOPT_POST] = TRUE;		//开启POST
	// 	}
	// 	if ((('POST' === $method) || ('PUT' === $method)) && is_array($args))
	// 	{
	// 		$options[CURLOPT_POSTFIELDS] = ('JSON' === $content_type) ? json_encode($args, JSON_UNESCAPED_UNICODE) : http_build_query($args); //POST数据
	// 	}
	// 	curl_setopt_array($ch, $options);		//组装$options参数
	// 	$result = curl_exec($ch);
	// 	// if(!$result = curl_exec($ch)) 
	// 	// {
	// 	// 	$erc = Ecode::CURL_EXEC_FAIL;
	// 	// 	$log_more = 'url='.$url.'&args='.json_encode($args, JSON_UNESCAPED_UNICODE).'&header='.$header.'&method='.$method.'&content_type='.$content_type;
	// 	// 	$log_more .= '&curl_error='.curl_error($ch).'&curl_getinfo='.json_encode(curl_getinfo($ch), JSON_UNESCAPED_UNICODE);
	// 	// 	Ecode::logs($erc, __METHOD__, '', $log_more);
	// 	// 	return $erc;
	// 	// }
	// 	curl_close($ch);
	// 	return $result;
	// }
	function h_curl($url, $para, $input_charset = '') {

		if (trim($input_charset) != '') {
			$url = $url."_input_charset=".$input_charset;
		}
		$curl = curl_init($url);
		// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);//SSL证书认证
		// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);//严格认证
		// curl_setopt($curl, CURLOPT_CAINFO,$cacert_url);//证书地址
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_HEADER, 0 ); // 过滤HTTP头
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// 显示输出结果
		curl_setopt($curl,CURLOPT_POST,true); // post传输数据
		curl_setopt($curl,CURLOPT_POSTFIELDS,$para);// post传输数据
		$responseText = curl_exec($curl);
		//var_dump( curl_error($curl) );//如果执行curl过程中出现异常，可打开此开关，以便查看异常内容
		curl_close($curl);

		// token 是否过期
		//token_invalidate($responseText) ;

		return $responseText;
	}
}

if(!function_exists('token_invalidate')) {
	function token_invalidate($data) {
		$json_arr = json_decode($data, true) ;
		if(isset($json_arr['result']['err'])) {
			if ($json_arr['result']['err'] === Ecode::BAD_REQUEST
				|| $json_arr['result']['err'] === Ecode::BAD_REQUEST_TOKEN
				|| $json_arr['result']['err'] === Ecode::BAD_REQUEST_TOKEN_TIME
				|| $json_arr['result']['err'] === Ecode::USER_NOT_BEGIN_USE) {
				header('location:/user/login');
				die();
			}
		}
	}
}

/* vim: set ts=4 sw=4 sts=4 noet: */
