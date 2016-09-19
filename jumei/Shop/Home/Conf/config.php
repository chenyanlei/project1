<?php
return array(
	//'配置项'=>'配置值'
	//数据库配置信息
	'DB_TYPE'   => 'mysqli', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_NAME'   => 'jumei', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '123456', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'sdc_', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集

	//显示页面的Trace信息
	// 'SHOW_PAGE_TRACE' =>true,
	
	// URL伪静态后缀设置
	'URL_HTML_SUFFI' => 'shtml',

	//设置url模式
	'URL_MODEL' => 2,
	// 默认参数过滤方法 是存入数据库的内容为HTML标签
	'DEFAULT_FILTER' => '',
	 'SESSION_AUTO_START'    =>  true    // 是否自动开启Session

);
