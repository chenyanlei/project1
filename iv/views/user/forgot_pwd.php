<!DOCTYPE html>
<html><head>
<title>qsctrip</title> 
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="/Public/js/jquery-1.9.0.min.js"></script>
<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<style type="text/css">
    body{
    background: #f1f1f1 url("/Public/images/bk.png") no-repeat scroll 0 -35px;
    font-family: "黑体";
    font-size: 12px;
    margin: 0;
  }
 .top{
    background: #fff url("/Public/images/01_02.png") no-repeat scroll 0 0;
    height:80px
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
    .canx{
        cursor: pointer;
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
                   重新验证邮箱
                </div>  
            </div>
	<div class="row">
		<form action="/user/doforgot_pwd" method="post">
		<div class="col-sm-12 text-center">
            <div class="inputOuter" style="margin-top:40px">
            <input type="text" name="email" id="email" placeholder="输入邮箱" style="width:280px;height:40px;border-radius:40px;color:#999999;font-size:14px;padding-left:20px;border-color:#0097d6">
			<div class="focus_text">请填写邮箱</div>
			<div class="error"></div>
            </div>
		</div>
		<div  class="col-sm-12 text-center" style="margin-top:40px;">
            <div class="inputOuter">
            <input type="text"  id="captcha" name="captcha" style="width:170px;height:40px;border-radius:10px;border-color:#ff7800;padding-left:15px;color:#999999;font-size:14px;" placeholder="请输入验证码">
            <div class="focus_text">请填写验证码</div>
            <div class="error"></div>
            <img src="http://api.qsctrip.com/captcha/get_captcha" onclick="this.src=this.src+'?a'" style="width:100px;float:right;height:38px;margin-left:10px">
            </div>
            <span class="canx" style="font-size:12px;color:#ff7800;position:absolute;right:450px;top:12px">
                        看不清?换一张
             </span>
        </div>
	    <div class="col-sm-12 text-center">   
		<input type="submit" value="确定" style="margin-top:40px;background:#0097d6;border-color:#0097d6;color:white;font-weight:bold;font-size:14px;width:100px;height:40px;border-radius:40px" id="sub">
        </div>
		</form>
	</div>
    </div>
	<script type="text/javascript">

        $('input').focus(function(){
            $(this).parent().find('.error').css('display','none');
            $(this).val();
        })
		//检查邮箱格式
        function Is_email(){

            //检测用户名的格式是否ok
            var reg = /^[0-9A-Za-zd]+([-_.][A-Za-zd]+)*@([A-Za-zd]+[-.])+[A-Za-zd]{2,5}$/;
            //获取用户名的值
            var email = $('#email').val();
            //检测   exec
            var res = reg.test(email);
            //用户名的格式i错误
            if(!res){
              $('#email').parent().find('.error').html('您输入的邮箱格式有误，请重新输入').css('display','block');
              return false;
           }else{
              return true;
           }

        }

        //检查邮箱是否已经注册
        function email_exist(){
           
        }

        //验证码必须4位
        function catcha_four(){
            //获取密码的值
            var captcha = $('#captcha').val();
            //声明正则
            var reg = /^\S{4}$/;
            //检测失败的话
            if(!reg.test(captcha)){
                $('#captcha').parent().find('.error').html('验证码必须为4位').css('display','block');
               return false;
            }else{
               return true;
            }
        }

        //验证码是否正确
        function captcha_ture(){
            var inp = $('#captcha');
            var captcha = $('#captcha').val();
            // 发送ajax检测用户名是否已经存在
            $.ajax({
                url:'/user/check_captcha',
                data:{captcha:captcha},
                type:'post',
                async:false,//设置同步
                success:function(data){
                
                    //如果用户名不可用
                    if(data.result.err==2101){
                         $('#captcha').parent().find('.error').html('验证码错误').css('display','block');
                        return false;
                    }else{
                    		
			        	var inp = $('#email');
			            var email = $('#email').val();
			            // 发送ajax检测用户名是否已经存在
			            $.ajax({
			                url:'/user/check_user_exists',
			                data:{uname:email,utype:1},
			                type:'post',
			                async:false,//设置同步
			                success:function(data){
			                
			                    //如果用户名不可用
			                    if(data.result.err==5023){     
			                      $('form').trigger('submit');
			                    }else{
			                    	$('#email').parent().find('.error').html('您输入的邮箱尚未注册,请先注册').css('display','block');
			                       
			                       return false;
			                    }
			                }
			            },'json')
                        inp.val();
                      
                    }
                }
            },'json')
        }

        $('#sub').click(function(){
        	 
        	if(Is_email() && catcha_four() && captcha_ture()){
        		return true;
        	}

        	return false;
        })

         $('.canx').click(function(){
            $('img').trigger('click');
        });
	</script>

</body>
</html>