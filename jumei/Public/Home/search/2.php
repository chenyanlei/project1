<?php 
	header('content-type:text/html;charset=utf-8');
	//在脚本中向1.php发起请求   php100.com
	// $con = file_get_contents("http://localhost/class/lamp112/JS04/1.php");//这里的url可以是任何的远程连接 taobao.com  tmall.com  baidu.com/index.php
	// $con = file_get_contents("http://www.lampbrother.net");//这里的url可以是任何的远程连接 taobao.com  tmall.com  baidu.com/index.php
	include "Curl.class.php";

	//实例化对象
	$curl = new Curl();

	//调用方法
	$con = $curl->get("http://search.jumei.com/?filter=0-11-1&search=&cat=348&bid=2_c&from=mall_null_index30_top_cate_null&lo=3435&mat=33548&site=www");


	//匹配操作
	// <div class="php_teacher_renwu"><a href="http://www.lampbrother.net/php/html/teacher/teacher_lieibiao/"  target="_blank"><img src="http://www.lampbrother.net/php/uploadfile/2015/0104/20150104093809527.jpg" alt="PHP培训" width="134px;"height="320px;" /></a><h5>张诚</h5><p class="php_teacher_zhiwei">UI教学总监</p><p class="php_teacher_jianjie">UI交互设计及用户体验专家，实战派讲师</p></div>
	 //<div class="php_teacher_renwu">.*<h5>(.*)<\/h5>
	// preg_match_all('/<div class="php_teacher_renwu">.*<img src="(.*)".*\/>.*<h5>(.*)<\/h5>.*<p.*>(.*)<\/p>.*<p.*>(.*)<\/p>/isU', $con, $tmp);
	preg_match_all('/<div class="item_wrap clearfix  ">.*<img .* src="(.*)" .*>.*<span class="disc">(.*)折.*<\/span>(.*)<\/a>.*<span>(.*)<\/span>.*<del>&yen;(.*)<\/del>/isU',$con,$tmp);

	
	
	//pdo
	$pdo = new PDO('mysql:host=localhost;dbname=jumei;charset=utf8;port=3306','root','');

	// //预处理语句
	$stmt = $pdo->prepare("insert into sdc_goods (spic,discount,gname,price,cprice,cate)values(:spic,:discount,:gname,:price,:cprice,:cate)");

	// //绑定
	$arr = array();
	$count = count($tmp[1]);

	// //遍历绑定参数并且执行   K站
	for($i=0;$i<$count;$i++){
		//图片下载 $tmp[1][$i]
		$con1 = file_get_contents($tmp[1][$i]);//http://www.lampbrother.net/php/uploadfile/2015/0104/20150104093809527.jpg
		//获取当前图片的名称
		$name = "/jumei/Public/Home/search/imgs/".basename($tmp[1][$i]);//20150104093809527.jpg
		//存储图片
		file_put_contents($name, $con1);

		$arr[':spic'] = $name;
		$arr[':discount'] = $tmp[2][$i];
		$arr[':gname'] = trim($tmp[3][$i]);
		$arr[':price'] =$tmp[4][$i];
		$arr[':cprice'] =$tmp[5][$i];
		$arr[':cate']=45;
		//执行
		
		$stmt->execute($arr);
	}

 ?>