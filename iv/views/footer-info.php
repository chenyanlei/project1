<?php
$CI = & get_instance() ;
    $CI->load->library('commen') ;
    if(!$CI->commen->is_weixin()) {
?>
<!DOCTYPE HTML>
<!--PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<!--xmlns="http://www.w3.org/1999/xhtml"-->
<html lang="zh-CN">
<head>
    <title><?=$tip_title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Public/images/ico.png">
    <script src="/Public/js/jquery-1.11.3.js"></script>
    <script src="/Public/js/ichart.1.2.1.beta.20140329.min.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href=<?php echo "'".base_url()."/Public/css/common.css"."'";?>/>
	<link href="/Public/css/page_footer.css" rel="stylesheet" type="text/css"/>
	<style>
		*{
			margin:0;
			padding:0;
		}
		a:link,a:hover,a:active,a:visited{
			text-decoration: none !important;
		}
		ul li{
			list-style: none;
		}
		button{
			outline: none;
		}
		body,html{
			font-size: 14px;
			font-family:"Microsoft YaHei";
			height: 100%;
			background-color: #fff;
		}
		/*重置初始样式--end*/

		/*头部样式--begin*/
		.header{
			width: 100%;
			height: 64px;
			background-color: #fff;
			border-bottom: 1px solid #ccc;
		}
		.logo{
			float: left;
			width: 212px;
			height: 64px;
			line-height: 64px;
			text-align: center;
			border-right: 1px solid #ccc;
		}
	    .logo img{
			vertical-align: middle;
		}

		.logo:hover{
			background-color: #f5f5f5;
		}
		.menu{
			float: right;
		}
		.menu ul li{
			list-style: none;
			float: left;
		}
		.my-info{
			height: 64px;
			line-height: 64px;
			border-left: 1px solid #ccc;
			padding: 0 20px;
			cursor: pointer;
			position: relative;
		}
		.myinfo-icon,.myinfo-name,.myinfo-sanjiao{
			display: inline-block;
		}
		.myinfo-icon{
			width: 30px;
			height: 30px;
			background-image: url(/Public/images/mine.png);
			background-repeat: no-repeat;
			vertical-align: middle;
		}
		.myinfo-name{
			width: 100px;
			text-align: center;
			font-size:16px ;
			color: #585858;

		}
		.myinfo-sanjiao{
			border:5px solid transparent;
			border-top-color:#000;
			display:inline-block;
		}
		.my-info:hover{
			background-color: #f5f5f5;
		}
		.my-info-list{
			position: absolute;
			background-color: #fff;
			border:1px solid #ccc;
			top:64px;
			left: -1px;
			display: none;
			z-index: 1;
		}
		.my-info-list div a{
			display: block;
			font-size: 16px;
			color: #585858;
			width: 188px;
			height: 40px;
			line-height: 40px;
			text-align:center;
		}
		.my-info-list div a:hover{
			background-color: #f5f5f5;
		}
		.help a{
			background-image: url(/Public/images/help.png);
			background-repeat: no-repeat;
			background-position: 20px center ;
			font-size:16px ;
			color: #585858;
			display: inline-block;
			height: 64px;
			border-left: 1px solid #ccc;
			padding: 0 20px 0 60px;
			line-height: 64px;
		}
		.help a:hover{
			background-color: #f5f5f5;
		}
		.selector{
			display: block;
		}
		.selector1{
			background-color: #f5f5f5;
		}
		.lang{
			border-left:1px solid #ccc ;
			line-height: 64px;
			padding: 0 30px;
		}
		.lang select{
			width:100px;
			height:34px;
			color:#565858;
			padding-left:20px;
		}
		/*头部样式--end*/


		/*头部--bigin*/
		.head{
			width: 100%;
			height: 45px;
			line-height: 45px;
			background-color: #3c3c3c;
		}
		.head div{
			width: 1200px;
			margin:0 auto;
			overflow: hidden;
		}
		.head ul li{
			float: left;
			margin-right: 15px;
		}
		.head ul li a{
			display: block;
			font-size: 14px;
			color: #ccc;
			padding: 0 8px;
		}
		.head ul li a:hover,.head ul li a:active{
			background-color: #707070;
		}
		.head-active{
			background-color: #707070;
		}
		/*头部--end*/
	</style>

	<script>
		var _hmt = _hmt || [];
		(function() {
			var hm = document.createElement("script");
			hm.src = "//hm.baidu.com/hm.js?34cbe9471ee0df69511a30388f881b49";
			var s = document.getElementsByTagName("script")[0];
			s.parentNode.insertBefore(hm, s);
		})();
	</script>

</head>
<body>
	<div  style="position:relative;width:100%;min-height:100%;">
		<div class="head">
			<div>
				<ul>
					<li id="navli_help"><a href="/help/home">帮助</a></li>
					<li id="navli_about"><a href="/footer/about">关于我们</a></li>
					<li id="navli_contact"><a href="/footer/contact">联系我们</a></li>
					<li id="navli_join"><a href="/footer/join">人才招聘</a></li>
					<li id="navli_server"><a href="/footer/server">服务协议</a></li>
				</ul>
			</div>
		</div>
		<script>
			
			//退出登录
		    function logout() {
		        clearCokie();
		        window.location.href = "/user/login" ;
		    }

	$(function() {
				$(".head div ul li a").click(function() {
					$(".head div ul li a").removeClass('head-active');
					$(this).addClass('head-active');
				});
				// 登录信息mouseover、mouseout事件
				$(".my-info").mouseover(function() {
					$(".my-info-list").toggleClass('selector');
					$(this).toggleClass('selector1');
				});
				$(".my-info").mouseout(function() {
					$(".my-info-list").toggleClass('selector');
					$(this).toggleClass('selector1');
				});

	    <?php $footer_page = $this->session->footer_page ;
	    if($footer_page == 1) { ?>
	        $("#navli_help").addClass("head-active") ;
	    <?php } else if ($footer_page == 2) { ?>
	        $("#navli_about").addClass("head-active") ;
	    <?php } else if ($footer_page == 3) { ?>
	        $("#navli_contact").addClass("head-active") ;
	    <?php }else if($footer_page == 4){?>
	         $("#navli_join").addClass("head-active") ;
	    <?php }else if($footer_page == 5){ ?>
	         $("#navli_server").addClass("head-active") ;  
	    <?php }?>

	
	}) ;
	</script>
<?php } ?>