<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	
	<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<style type="text/css">
    body{
    	background: #fff url("/Public/images/qsctripback.jpg") no-repeat scroll 50% 0;
	    font-family: "黑体";
	    font-size: 12px;
	    margin: 0;
	}
   font{
   	 font-family:"Arial";
   }
	.logo{
		margin-top:40px
	}
	.qlogo{
		background:url('/Public/images/qsc_logo.png') no-repeat center top;
		border-bottom:2px solid #fff;
	}
	.qslogo{
		background:url('/Public/images/qsctirp_logo.png') no-repeat center center;
	}
	.lag{
		margin-top:80px;
		color:#585858;
		background:rgba(255,255,255,0.5)
	}
	.lang{
		border-bottom:2px solid #fff;
		height:140px;
	}
	.zhlogo{
		margin-top:110px;
		font-size:30px;
		color:#fff;
		font-weight:bold;

	}
	button{
		height:50px;
		width:180px;
		border-radius:60px;
		border:1px solid #0097d6;
		color:#fff;
		font-size:18px
	}
	.bleft{
		background:#0097d6;
		float:left
	}
	.bright{
		background:rgba(0,151,214,0.2);
		float:right
	}
	.qscintro{
		font-size:24px;
		font-weight:bold;
		color:#fff;
		margin-top:100px
	}
	.qscins{
		font-size:24px;
		font-weight:bold;
		color:#004158;
		margin-top:30px
	}
	</style>
</head>
	<body>
		<div class="container-fluid">
		  <div class="row logo">
		  	 <div class="col-sm-4 qlogo" style="height:140px"></div>
		  	 <div class="col-sm-4 qslogo text-center" style="height:100px">
		  	 <div class="zhlogo">逍品旅行<font>qsctrip.com</font></div>
		  	 </div>
		  	 <div class="col-sm-4 text-center lang">
		  	 	<select class="lag">
		  	 		<option>中文(简体)&nbsp;&nbsp;</option>
		  	 		<option>英文&nbsp;&nbsp;&nbsp;&nbsp;</option>
		  	 	</select>
		  	 </div>
		  </div>
		  <div class="row">
		  	 <div class="col-sm-6  col-sm-offset-3" style="height:20px;margin-top:150px">
		  	 	<button class="bleft" onclick="javascript:window.location.href='/user/login'">登录</button>
		  	 	<button class="bright" onclick="javascript:window.location.href='/user/register'">注册</button>
		  	 </div>
		  </div>
		  <div class="row">
		  	  <div class="col-sm-12 text-center qscintro">
		  	  		中国出境旅游优质供应商分销平台&nbsp;&nbsp;&nbsp;直通中国全域市场有效营销通道
		  	  </div>
		  </div>
		  <div class="row">
		  	  <div class="col-sm-12 text-center qscins">
		  	  		如果你是QSC认证的优质供应商,每天遍布全中国的旅行代理在帮你销售和推广
		  	  </div>
		  </div>
		</div>
	</body>
</html>	
