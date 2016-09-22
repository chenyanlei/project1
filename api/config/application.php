<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['easemob'] = array(
	'client_id' => 'YXA6O0V0UDWtEeWx4tnxUDhY1w',
	'client_secret' => 'YXA6MtHTpsN51PCUjYejZt17xFohFYc',
	'url' => 'https://a1.easemob.com/nuanyu/development/'
);

$config['sms'] = array(
	'account_sid' => 'aaf98f89495b3f380149603c0a43038a',	//SMS服务SID
	'account_token' => '9b8d7dcd2acf454081e6b241727ce451',	//SMS服务TOKEN
	'app_id' => 'aaf98f894e2360b4014e2ee3ff270ade',			//SMS服务APP_ID
	'server_ip' => 'sandboxapp.cloopen.com',				//SMS服务IP地址(for test)
	'server_port' => 8883,									//SMS服务端口号
	'soft_version' => '2013-12-26',							//SMS服务版本号
	'body_type' => 'json',									//SMS服务数据格式
	'enabe_log' => TRUE										//SMS服务是否记日志
);

$config['support_area'] = array(
	86 => '中国大陆',
	852 => '中国香港',
	853 => '中国澳门',
	886 => '中国台湾'
);

$config['sms_huaxing'] = array(
	"reg" => "101100-WEB-HUAX-340338" ,
	"pwd" => "OABAKSMM" ,
	"server_url" => "http://www.stongnet.com/sdkhttp/sendsms.aspx" ,
) ;

$config['wx'] = array(
	'app_id' => 'wx4bfa67be4a93ca1f',
	'app_secret' => 'cabf6f01f3b1832af601aff6fd888a73',
);

/* vim: set ts=4 sw=4 sts=4 noet: */
