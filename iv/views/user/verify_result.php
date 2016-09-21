<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>审核结果 </title>
	<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
	<script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script src="/Public/js/my_cookie.js"></script>
	<style type="text/css">
		body{
			background-color: #f5f5f5;
		}
		.header{
			height:80px;
			background: #0097d6;
			padding:0px;
		}
		.header_logo{
			background: url(/Public/images/nlogo.png) no-repeat 0px 20px;
			width:170px;
			height: 90px;
			margin:0px 0px 20px 80px;
			float:left;
		}
		.header_right{
			float:right;
			padding:25px 80px;
		}
		.header_right select{
			width:150px;
			height:30px;
		}
		
		.content{
			padding:30px 80px;
		}
		.con{
			background: #fff;
			margin:0 auto;
			width:900px;
			min-height: 440px;
		}
	
		
		.sub{
			margin:20px auto 0px;
			width:150px;
			padding-bottom: 84px
		}
		.bt{
			display: inline-block;
			background: #0097d6;
			color: #ffffff;
			width:150px;
			height: 40px;
			border:none;
		}
		.proccess{
			padding: 0px;
			height: 38px;
			border-bottom: solid #cccccc 1px;
			clear: both;
			display: block;
		}
		.proccess li{
			list-style: none;
			float:left;
			height:38px;
			line-height: 38px;
			width:300px;
			text-align: center;
		}
		.current{
			background: #0097d6;
			color:#ffffff;
		}
		.nnext{
			background: url(/Public/images/icon-left.png) no-repeat;
			color:#585858;
		}
		.next{
			background: url(/Public/images/icon-angle.png) no-repeat;
			color:#585858;
		}
		.nexta{
			background: url(/Public/images/icon-angle.png) center right no-repeat;
			color:#585858;
			position: relative;
			width:250px;
		}
		.con_right{
			width:500px;
			float: left;
			text-align: center;
			margin-top: 100px
		}
		.inner_con{
			width:700px;
			float:left;
			border-right:1px solid #cccccc;
			margin-top: 20px
		}
		.clear{
			clear: both
		}
		.con_add{
			clear:both;
		}
		.current_foot{
			width:190px;
			background: url(/Public/images/icon-right.png) no-repeat center right;

		}
	
		.result{
			margin:20px auto 0px;
			min-height: 300px;
			text-align: center;
			margin-top:100px; 
			font-size: 16px;
			color:#585858;
		}
		.reason{
			width:520px;
			height:120px;
			border:solid 1px #cccccc;
			margin:20px auto 0px;
			text-align: left;
			padding: 20px;
			color:red;
		}
		.badres{
			background: url(/Public/images/wrong02.png) no-repeat;
			margin: 0 auto;
    		width: 600px;

		}
		.badreason{
			margin-top: 10px
		}
		ul li{
			list-style: none
		}
		.pass{
			background: url(/Public/images/pass.png) no-repeat;
			margin: 0 auto;
    		text-indent: 2em;
    		width: 200px;
		}
		.sub{
			margin:30px auto 0px;
			width:150px;
			padding-bottom: 84px
		}
		.bt{
			display: inline-block;
			background: #0097d6;
			color: #ffffff;
			width:100px;
			height: 40px;
			border:none;
			font-size: 14px
		}
		.d_logo {
			float: left;
		}
		.logo{
			margin: 20px 20px 20px 80px;
		}
	</style>
</head>
<body>

	<div class="header">
		<a class="pull-left" href="/index/home">
			<div class="d_logo">
				<img class="logo" src="/Public/images/logo-white.png">
			</div>
		</a>
		<div class="header_right">
			<select name="" id="">
				<option value="中文">中文（简体）</option>
				<option value="English">English</option>
			</select>
		</div>
	</div>
	<div class="content">
		<div class="con">
			<ul class="proccess">
				<li class="nexta">1 账号信息</li>
				<li class="current_foot">2 完善信息</li>
				<li class="current">3 审核结果</li>
			</ul>
			<div class="result">
				<?php  
				// var_dump($status);
				if( $status == Ptype::AGENT_STATUS_WILL_CHECK || $status ==Ptype::AGENT_STATUS_INFO_COMMIT){?>
					您的信息已提交请等待审核！
				<?php }else if($status == Ptype::AGENT_STATUS_CHECKING){?>
					审核中...请耐心等待审核结果！
				<?php }else if($status == Ptype::AGENT_STATUS_PASS_CHECK){ ?>
					<div class="pass">恭喜您顺利通过审核！</div>
					<div class="sub">
						<button class="bt" type="submit">确定</button>
					</div>
				<?php }else if($status == Ptype::AGENT_STATUS_WILL_CHECK || $status == Ptype::AGENT_STATUS_FAILED_CHECK){ ?>
				<div class="badres">
					您提交的信息未能通过审核，如有疑问致电010-10948087客服或者在线咨询,
					<p>或者<a href="/user/info_verify">重新提交</a>信息</p>
				</div>
				<div class="reason">
					<div>未通过原因：</div>
					<ul class="badreason">
						<li><?php if(isset($msg))
									echo $msg;
								else
									echo "无";
							?>
						</li>
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<script>
	$('.bt').click(function(){

		$.ajax({
                url:'/user/begin',
                type:'post',
                success:function(data){
                    if(data.result.err==0){
                        var data = getCookie('user_info') ;
                        var data1 = JSON.parse(data);
                    
                        data1[0]['backto']="1";
                        data1[0]['status']="14";
                        var strContent = JSON.stringify(data1);
                        //console.log(data1);
                        setCookie('user_info',strContent,30) ;
                        document.location.href="/index/home";
                    }else{
                        var msg = data.result.err+':'+data.result.msg;
                          layer.open({ 
                                title:false,
                                content: msg,
                                area: ['645px', '145px']
                           })     
                
                    }
                }
        },'json')
	})
	
		

	</script>
	

</body>
</html>