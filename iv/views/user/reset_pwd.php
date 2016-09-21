<!DOCTYPE html>
<html><head>
<title>qsctrip</title> 
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="/Public/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="/Public/js/md5.js"></script>

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
    height:80px
  }
    .logo{
        /*width: 40px;*/
        /*height: 40px;*/
        /*margin-top: 10px;*/
        /*margin-left: 30px;*/
        margin: 20px 20px 20px 30px;
    }
    .d_logo {
        float: left;
    }
  .lag{
        margin-top:20px;
        color:#585858;
    }
   .setfont{
     color:#585858;
     font-size:18px;
     margin-top:40px
   } 

	input{
		background: #fff none repeat scroll 0 0;
	    border: 1px solid #d7d7d7;
	    border-radius: 2px;
	    color: #333;
	    font-family: Verdana,Tahoma,Arial;
	    font-size: 16px;
	    height: 33px;
	    ime-mode: disabled;
	    line-height: 33px;
	    padding-left: 5px;
	    width: 200px;
	}

	:focus{
		border:1px solid blue;
	}
	.focus_text{
		display: none
	}
	:focus~.focus_text{
		display: block;
	}
	.inputOuter{
        display: inline-block;
        vertical-align: middle;
        position: relative;
    }

    .inputOuter .focus_text,.inputOuter .error{
        color: #999;
        left: 0;
        margin-top: 4px;
        top:100%;
        white-space: nowrap;
        word-break: keep-all;
        width:100px;
        position:absolute;
        margin-left:0px;
        font-size:12px 
    }

    .error{
    	display: none;
    }
</style>
</head>
<body>
	<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 top">
                <a class="pull-left" href="">
                    <div class="d_logo">
                        <img class="logo" src="/Public/images/header_logo.png">
                    </div>
                </a>
                <div class="col-sm-6 lang text-right pull-right">
                     <select class="lag">
                        <option>中文(简体)&nbsp;&nbsp;</option>
                        <option>英文&nbsp;&nbsp;&nbsp;&nbsp;</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center" style="color:#0097d6;font-size:18px;margin-top:80px">
               重置密码
            </div>
        </div>
    <form action="/user/doreset_pwd" method="post">       
        <div class="row">
            <div class="col-sm-12 text-center">

                <input type="hidden" name='confirm_code' value="<?php echo $confirm_code;?>">
                <div class="inputOuter">
                <input type="password" name="pwd" id="password" style="width:280px;height:40px;border-radius:40px;color:#999999;font-size:14px;padding-left:20px;border-color:#0097d6;margin-top:40px" placeholder="请输入8-16位密码">
                <div class="focus_text">请填写新登录密码</div>
                <div class="error"></div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <div  class="inputOuter">
                <input type="password"  id="repassword" name="repwd" style="width:280px;height:40px;border-radius:40px;color:#999999;font-size:14px;padding-left:20px;border-color:#0097d6;margin-top:40px" placeholder="再次输入密码">
                <div class="focus_text">请确认新密码</div>
                <div class="error"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <input type="submit" value="确定" style="margin-top:40px;background:#0097d6;border-color:#0097d6;color:white;font-weight:bold;font-size:14px;width:100px;height:40px;border-radius:40px" id="sub">
        </div>
    </form> 
    </div>
	<script type="text/javascript">

        $('input').focus(function(){
            $(this).parent().find('.error').css('display','none');
            $(this).val();
        })
		//密码格式是否正确
        function is_pass(){
            //获取密码的值
            var pass = $('#password').val();
            //声明正则
            var reg = /^\S{8,16}$/;
             inp=$('#password');
            //检测失败的话
            if(!reg.test(pass)){
                inp.parent().find('.error').html('密码格式不正确').css('display','block');
                return false;
            }else{
                inp.val();
                return true;
            }
        }
        
        //密码是否一致
        function is_repass(){
              //获取确认密码的值
           var rePass = $('#repassword').val();
           var inp=$('#repassword');
            //获取密码的值
            var pass = $('#password').val();
            if(rePass != pass){
                inp.parent().find('.error').html('两次密码不一致').css('display','block');
                return false;
            }else{
                inp.val();
              return true;
            }
        }
        
        $('#sub').click(function(){
        	var pass=  $('#password').val();
            var mdpass = hex_md5(pass);
        	if(is_pass() && is_repass()){
                $('#password').val(mdpass);
                $('#repassword').val(mdpass);
        		return true;
        	}

        	return false;
        })
	</script>

</body>
</html>