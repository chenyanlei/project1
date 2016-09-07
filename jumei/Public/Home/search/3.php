<?php 
	
	//curl扩展类
	include "Curl.class.php";

	//实例化对象
	$curl = new Curl();

	//调用方法
	$con = $curl->get("http://search.jumei.com/?filter=0-11-1&cat=1&from=mall_null_index30_top_cate_null&lo=3435&mat=33545&site=sh");

	file_put_contents('./mian.html', $con);

	//作业  采集讲师页面

 ?>