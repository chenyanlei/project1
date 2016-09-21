<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册激活</title>
	<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
	<script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script src="/Public/js/layer.js"></script>
	<style type="text/css">

		.d_logo {
			float: left;
		}
		.logo{
			margin: 20px 20px 20px 30px;
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
			background:#f1f1f1;
			padding:30px 80px;
		}
		.con{
			background: #ffffff;
			margin:0 auto;
			width:1200px;
			min-height: 340px
		}
		.con_title{
			text-align: center;
			padding-top: 40px;
			font-size: 16px;
			color:#585858;
		}
		
		.con_list{
			margin:35px 0px 0px 150px;
		}
		.con_list label{
			font-weight: normal;
			width:100px;
			text-align: right;
			margin-right:20px;
			font-size: 14px;
			color: #585858 
		}
		.con_list input{
			width:250px;
			height:30px;
			padding-left: 10px;
			border:solid 1px #cccccc;
			font-size: 14px;
			color:#cccccc;
		}
		.con_list input:focus,.con_list input:hover{
			border-color:#0097d6;
			color:#000000;
		}
		{
			width:150px;
			height: 40px
		}
		.is_agree{
			margin-left:269px;
			padding:30px  0px 0px 0px;
			/*height:40px;*/
			position: relative;
		}
		.is_agree .invalid{
			 left: 0px;
		}
		.is_agree i{
			width:20px;
			/*height:60px;*/
			display: inline-block;
			float:left;
		}
		.normal{
			background: url(/Public/images/bcheck_01.png) no-repeat 0px 0px;
		}
		.seled{
			background: url(/Public/images/bcheck_02.png) no-repeat 0px 0px;
		}
		.ag_text{
			color:#585858;
			font-size: 14px;
			margin-left:10px;
			float:left;
		}
		.sub{
			margin:40px auto 0px;
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
			width:200px;
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
		.con_list{
			display: inline-block;
	        vertical-align: middle;
	        position: relative;
		}
		.valid,.invalid{
	        display: none;
	        line-height: 1.5;
	        position: absolute;
	    }
		.invalid {
	        color: #999;
	        left: 100px;
	        margin-top: 4px;
	        top:100%;
	        white-space: nowrap;
	        word-break: keep-all;
	    }
		.valid {
		    background-position: 0 -125px;
		    line-height: 1.5;
		    position: absolute;
		    left: 30%;
		    margin-top: -0.75em;
		    top: 45%;
	 	 }
		.invalid i{
		    background-position: 0 5px;
		    left: -20px;
		    position: absolute;
		    top: 34%;
	  	}
	  	.invalid i {
		    background-image: url("/Public/images/wrong1.png");
		    background-repeat: no-repeat;
		}
		.valid{
	       background-image: url("/Public/images/sign.png?2");
	       background-repeat: no-repeat;
	   }
	   .valid,.invalid i {
		    height: 20px;
		    margin-top: -10px;
		    width: 20px;
	   }
	   #captcha{
	   	  width:120px;
	   }
	   .current_foot{
			background: url(/Public/images/icon-right.png) no-repeat center right;
		}
	   .icon1 {
		    background: url(/Public/images/bcheck_01.png) no-repeat;
		    height: 20px;
		    left: 0;
		    position: absolute;
		    top: 0;
		    width: 20px;
		}
		.selected {
		    background: url(/Public/images/bcheck_02.png) no-repeat;
		    height: 20px;
		    left:0;
		    position: absolute;
		    top: 0;
		    width: 20px;
		}
		.protocol{
		    float:left;
		    font-size: 14px;
		    color:#585858;
		    text-indent: 2em;
		 }
		 .canx:hover,#captcha~img{
		   cursor: pointer;
		 }  
  		 .active_con{
  		 	width:600px;
  		 	margin:0 auto;
  		 	height:300px;
  		 	margin-top: 100px
  		 }
  		 .ac_info{
  		 	color: #585858;
  		 	font-size: 16px;
  		 	text-align: center;
  		 }
  		 .code{
  		 	width:450px;
			display: block;
  		 	margin:20px auto 0px;
			text-align: center;

  		 }
  		 .code input{
  		 	border:#0097d6 1px solid;
  		 	padding: 10px;
  		 	color:#999999;
  		 	width:150px;
  		 	height:40px;
  		 	margin-right:10px

  		 }
  		 .code label{
  		 	font-weight:normal;
  		 	margin-right:10px;
  		 	color: #999999;

  		 }
		 .code span{
		 	color: #999999;
		 	font-size:14px
		 }

  		 .code a,a:hover,a:focus{
  		 	decoration:none;
  		 }
  		 .layui-layer-dialog .layui-layer-content {
       		text-align: center;
       		font-size: 12px;
       		color:#585858;
       		background: url("/Public/images/wrong1.png") no-repeat 28px 25px;
    		
       }
	</style>
</head>
<body>

	<div class="header">
		<a class="pull-left" href="">
			<div class="d_logo">
				<img class="logo" src="/Public/images/header_logo.png">
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
				<li class="current_foot">1 账号信息</li>
				<li class="current">2 注册激活</li>
				<li class="nnext">3 信息认证</li>
				<li class="next">4 选择目的地</li>
				<li class="next">5 选择类别</li>
				<li class="next">6 审核结果</li>
			</ul>
			<div class="clear"></div>
			<div class="active_con">
				<form action="" method="post">
				<div class="ac_info">注册验证码,已发送至您的邮箱<?php echo $email_encode;?></div>
				<div class="code">	
				<label>输入6位验证码:</label><input type="text"  placeholder="请输入验证码" name="register_code" id="code">
				</div>
				<div class="code">
					<span>没有收到验证码?<a href="#" id="re_email">重新发送</a></span>
				</div>
				<input type="hidden" name="email" value="<?=$email;?>" id="email">
				<div class="sub"><button class="bt">下一步</button></div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	 function tip_info(msg){
		 	layer.open({
	             title:false,
	             content: msg,
	             area: '240px',
	             closeBtn: false
	    });
  	}
	$('.bt').click(function(){
		var code = $("#code").val();
		// console.log(code);
		if(code == ''){
			alert('验证码不能为空');
			return false;
		}

		var email = $('#email').val();
		var code = $("#code").val();
		 $.ajax({
                url:'/user/verify_code',
                data:{email:email,register_code:code},
                type:'post',
                // async:false,//设置同步
                success:function(data){

                    //如果用户名不可用
                    if(data.result.err === 0){
                        document.location.href="/user/info_verify";
                    }else{
                        var message = data.result.err + ':' + data.result.msg;
                       tip_info(message);
                        return false
                    }
                   
                }
             },'json')

                return false;    
	})
	var index = '';
	$('#re_email').click(function(){
		index = layer.load(1,{offset:['285px','650px'],shade: [0.4, '#393D49']});
		var remail = $('#email').val();
		$.ajax({
            url:'/user/re_email',
            data:{email:remail},
            type:'post',
            // async:false,//设置同步
            success:function(data){
            	// console.log(data);
            	if(data){
            		layer.close(index);
            	}
                if(data.result.err === 0){
                	layer.open({
			             title:false,
			             content: '验证码已发送至您的邮箱，请注意查收',
			             area: '300px',
			             closeBtn: false
	    			});
                }else{
                    var message = data.result.err + ':' + data.result.msg;
                    tip_info(message);
                    return false
                }
               
            }
        },'json')

	})


	</script>

</body>
</html>