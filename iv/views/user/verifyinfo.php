<!DOCTYPE html>
<html><head>
<title>qsctrip</title> 
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<style type="text/css">
	body{
    background:#f1f1f1 url("/Public/images/bk.png") no-repeat scroll 0 -35px;
    font-family: "黑体";
    font-size: 12px;
    margin: 0;
  }
 .top{
	background: #fff url("/Public/images/01_02.png") no-repeat scroll 0 0;
	height:180px
  }
  .logo{
  	background:transparent url("/Public/images/logo_02.png") no-repeat scroll center center;
	height:180px;
  }
  .lag{
        margin-top:120px;
        color:#585858;
    }
   .setfont{
   	 background:transparent url("/Public/images/correct.png") no-repeat scroll 540px 7px;
   	 color:#585858;
   	 font-size:18px;
   	 margin-top:40px;
   	 padding-top:10px
   }
   .seterrfont{
   	 background:transparent url("/Public/images/wrong.png") no-repeat scroll 520px 7px;
   	 color:#585858;
   	 font-size:18px;
   	 margin-top:40px;
   	 padding-top:10px
   }
   .seterrfont1{
   	 background:transparent url("/Public/images/wrong.png") no-repeat scroll 500px 7px;
   	 color:#585858;
   	 font-size:18px;
   	 margin-top:40px;
   	 padding-top:10px
   }  
</style>
</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 top">
					<div class="col-sm-6 logo"></div>
					<div class="col-sm-6 text-center lang">
						 <select class="lag">
		                    <option>中文(简体)&nbsp;&nbsp;</option>
		                    <option>英文&nbsp;&nbsp;&nbsp;&nbsp;</option>
		                </select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center" style="color:#0097d6;font-size:18px;margin-top:80px">
					注册认证
				</div>	
			</div>
			<?php ?>
				<?php if($info['result']['err']==0){?>
				<div class="col-sm-12 text-center setfont">
					&nbsp;&nbsp;恭喜您,邮箱验证成功!<br>
					<button onclick="javascript:window.location.href='/user/login'" style="height:35px;border-color:#0097d6;background:#0097d6;width:120px;font-size:14px;color:#fff;font-weight:bold;margin-top:40px;border-radius:40px">
						立即登录
					</button>
				</div>
				<?php }elseif($info['result']['err']==5019){?>
				<div class="col-sm-12 text-center seterrfont1">
					箱验证已超时,请重新验证邮箱<br>
					<button onclick="javascript:window.location.href='/user/once_more?email=<?echo $info['content']['email'];?>'" style="height:35px;border-color:#0097d6;background:#0097d6;width:120px;font-size:14px;color:#fff;font-weight:bold;margin-top:40px;border-radius:40px">
						重新验证邮箱
					</button>
				</div>
				<?php }elseif($info['result']['err']==5027){?>
					<div class="col-sm-12 text-center setfont">
					邮箱验证已经通过!<br>
					<button onclick="javascript:window.location.href='/user/login'" style="height:35px;border-color:#0097d6;background:#0097d6;width:120px;font-size:14px;color:#fff;font-weight:bold;margin-top:40px;border-radius:40px">
						立即登录
					</button>
					</div>
				<?php }else{ ?>	
					
					<div class="col-sm-12 text-center seterrfont">
					邮箱验证异常!请先注册!<br>
					<button onclick="javascript:window.location.href='/user/register'" style="height:35px;border-color:#0097d6;background:#0097d6;width:120px;font-size:14px;color:#fff;font-weight:bold;margin-top:40px;border-radius:40px">
						立即注册
					</button>
					</div>

				<?php } ?>	

		</div>
	</body>
</html>