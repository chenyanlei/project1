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

	<script>
		var _hmt = _hmt || [];
		(function() {
			var hm = document.createElement("script");
			hm.src = "//hm.baidu.com/hm.js?34cbe9471ee0df69511a30388f881b49";
			var s = document.getElementsByTagName("script")[0];
			s.parentNode.insertBefore(hm, s);
		})();
	</script>

    <script src=<?php echo "'".base_url()."Public/js/my_cookie.js"."'";?>></script>
	<style>
		*{
			margin:0;
			padding:0;
		}
		a:hover, a:visited, a:link, a:active{
			text-decoration: none;
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
			background-color: #f5f5f5;
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
			/*border-top: none;*/
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


		
		/*头部--end*/
	</style>
</head>
<body>
	<div  style="position:relative;width:100%;min-height:100%;">
		<div class="header">

			<a href="/index/home">
				<div class="logo">
					<img src="/Public/images/header_logo.png" alt="" >
				</div>
			</a>
			<div class="menu">
				<ul>
					<li class="my-info">
						<div class="my-info-name">
							<div class="myinfo-icon"></div>
							<div class="myinfo-name"></div>
							<div class="myinfo-sanjiao"></div>
						</div>
						<div class="my-info-list">
							<div><a  href="/personal/home">我的信息</a></div>
							<div><a href="/user/logout" onclick="logout()">退出</a></div>
						</div>
					</li>
					<li class="help"><a href="/help/home">帮助</a></li>
				</ul>
			</div>
		</div>	

		<script>
			
			//退出登录
		    function logout() {
		        clearCokie();
		        window.location.href = "/user/login" ;
		    }

		    // 登录信息mouseover、mouseout事件
				$(".my-info").mouseover(function() {
					$(".my-info-list").toggleClass('selector');
					$(this).toggleClass('selector1');
				});
				$(".my-info").mouseout(function() {
					$(".my-info-list").toggleClass('selector');
					$(this).toggleClass('selector1');
				});
	$(function() {
			



		String.prototype.gblen = function() { 
			var len = 0; 
			for (var i=0; i<this.length; i++) { 
				if (this.charCodeAt(i)>127 || this.charCodeAt(i)==94) { 
					len += 2; 
				} else { 
					len ++; 
				} 
			} 
			return len; 
		} 
		String.prototype.gbtrim = function(len, s) { 
			var str = ''; 
			var sp = s || ''; 
			var len2 = 0; 
			for (var i=0; i<this.length; i++) { 
				if (this.charCodeAt(i)>127 || this.charCodeAt(i)==94) { 
					len2 += 2; 
				} else { 
					len2 ++; 
				} 
			} 

			if (len2 <= len) { 
				return this; 
			}

			len2 = 0; 

			len = (len > sp.length) ? len-sp.length: len; 
			for (var i=0; i<this.length; i++) { 
				if (this.charCodeAt(i)>127 || this.charCodeAt(i)==94) { 
					len2 += 2; 
				} else { 
					len2 ++; 
				} 

				if (len2 > len) { 
					str += sp; 
					break; 
				} 
					str += this.charAt(i); 
			} 
			return str; 
		} 


	    var data = getCookie('user_info') ;

	    var jObj = jQuery.parseJSON(data) ;
	    if(data == null || data =='') {
	        window.location.href = "/user/login" ;
	    } else if(jObj[0]['backto'] == '0'){
	        window.location.href = "/user/login" ;
	    }else{
	      
	    	 var user_name = jObj[0]['name'];
	 
	        if(user_name == null || user_name == '') {
	            window.location.href = "/user/login" ;
	        } else {
	        	$('.myinfo-name').html(user_name.gbtrim(12,'....'));
	        }
	    }
	}) ;
	</script>

