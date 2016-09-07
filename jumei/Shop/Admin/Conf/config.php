<?php
return array(
	//'配置项'=>'配置值'

	//数据库配置信息
	'DB_TYPE'   => 'mysqli', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'jumei', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'sdc_', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集

	//显示页面的Trace信息
	//'SHOW_PAGE_TRACE' =>true,
	
	// URL伪静态后缀设置
	'URL_HTML_SUFFI' => 'shtml',

	//设置url模式
	'URL_MODEL' => 2,
	// 默认参数过滤方法 是存入数据库的内容为HTML标签
	'DEFAULT_FILTER' => '',
	
	'AUTH_CONFIG' => array(
        'AUTH_ON' => true,  // 认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为实时认证；2为登录认证。
        'AUTH_GROUP' => 'sdc_think_auth_group', // 用户组数据表名
        'AUTH_GROUP_ACCESS' => 'sdc_admin', // 用户-用户组关系表
        'AUTH_RULE' => 'sdc_think_auth_rule', // 权限规则表
    ),



);