<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <title>绑定手机号</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/aui.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/dialog.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/iconfont.css" />
    <style type="text/css">
    body {
        height: auto;
    }
    .aui-card {
        margin-top: 15px;
    }
    .aui-input-addon.aui-iconfont {
        font-size: 20px;
    }
    .yanzm{
        height:35px;
    }
    .aui-btn:disabled{
        color:#bdc3c7;
    }
    .aui-btn {
        width:100%;
        border-radius:0;
    }
    </style>
</head>
<body>
<div class="aui-tab">
    <ul class="aui-tab-nav" id="demo1">
        <li class="active" data="login_one">密码绑定</li>
        <li data="login_two">短信绑定</li>
    </ul>
</div>
    <div class="aui-content aui-card aui-noborder">
        <input type="hidden"  id="return_url" value="<?=$url;?>">
        <div class="aui-form" style="display:none" id="login_two">
            <div class="aui-input-row">
                <i class="aui-input-addon aui-iconfont aui-icon-mobilefill aui-text-warning"></i>
                <input type="text" id="mobile" class="aui-input" placeholder="手机号" name="mobile" value="" />
            </div>
            <div class="aui-input-row">
                <input type="text" class="aui-input" id="code" value="" placeholder="请输入收到的验证码"/>
                <span class="aui-input-addon">
                    <button class="aui-btn" id="sendVerify" status="1" >获取验证码</button>
                </span>
            </div>

          
            <div class="aui-btn-row">
                <div class="aui-btn aui-btn-warning" id="next">快速登陆</div>
            </div>
        </div>
        <div class="aui-form" id="login_one">
            <div class="aui-input-row">
                <i class="aui-input-addon  aui-iconfont aui-icon-people"></i>
                <input type="text" class="aui-input" placeholder="手机号" id="phone"/>
            </div>
            <div class="aui-input-row">
                <input type="password" class="aui-input" placeholder="密码" id="pass"/>
                <i class="aui-input-addon  aui-iconfont aui-icon-lock"></i>
            </div>
            <div class="aui-btn-row">
                <div class="aui-btn aui-btn-warning" id="login">登录</div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>

    <script type="text/javascript" src="/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/Public/js/layer.js"></script>
    <script type="text/javascript" src="/Public/js/md5.js"></script>

    <script type="text/javascript">
  /*验证类函数开始*/
    //检查手机号格式
    function is_phone(phone){
        var reg = /^1[3-9][0-9]{9}$/; 
        //检测   exec
        return reg.test(phone);
    }

    //验证码必须4位
    function catcha_four(e){
        //声明正则
        var reg = /^\S{4}$/;
        //检测
        return reg.test(e);
    }

   //短信验证码
   function code_six(e){
      //声明正则
      var reg = /^\d{6}$/;
      //检测
      return reg.test(e);
   }

    //密码格式是否正确
    function is_pass(pwd){
        //声明正则
        var reg = /^\S{8,16}$/;
        //检测失败的话
        return reg.test(pwd);
    }
    /*验证类函数结束*/

    //发送手机验证码
    var index = '';
    $('#sendVerify').click(function(){
        var o = $(this);
        var mobile = $('#mobile').val();
        if(!is_phone(mobile)){
            $.dialog({
                contentHtml:'请填写正确的手机格式'
            })
             return false;
        }
        var msg = "<div class='yanzm'><input id='captcha' type='text' placeholder='请输入验证码' style='width:50%'><img style='width:80px;margin-left:15px;height:40px;position:absolute;top:20px'  src='http://api.qsctrip.com/captcha/get_captcha?uname="+mobile+"&from=h5' id='cap'></div>";
     
         layer.open({
                     title:'请填写验证码',
                     content: msg,
                     area: ['80%', '150px'],
                     yes: function(index){
                        var captcha = $('#captcha').val();
                        if(!catcha_four(captcha)){
                            alert('验证码必须4位');
                            return false;
                        }

                        $.ajax({
                            url:'/webapp_user/check_captcha',
                            data:{captcha:captcha,mobile:mobile},
                            type:'post',
                            success:function(data){
                              
                                if(data.result.err==1001){
                                   alert('图形验证码错误');
                                   return false;
                                }else{
                                    time(o);
                                    layer.close(index);
                                }
                            }
                        },'json')
                     }

         })
    })
    //图形验证码点击
    $('body').delegate('#cap','click',function(){
        var mobile = $('#mobile').val();
         var sr ='http://api.qsctrip.com/captcha/get_captcha?uname='+mobile+'';
         var a = '&from=h5&a='+Date.parse(new Date()); 
         $(this).attr('src',(sr+a));
    })

    //倒计时
     var wait=60; 
     function time(o) { 
       if (wait == 0) { 
            o.attr("disabled",false);    
            o.html("获取验证码"); 
            wait = 60; 
       } else { 
            o.attr("disabled", true); 
            o.html('重新发送(' + wait + ')'); 
            wait--; 
            setTimeout(function() { time(o) },1000) 
       } 

      }

     //验证码登录
     $('#next').click(function(){
        var mobile = $('#mobile').val();
        var code = $('#code').val();
         var return_url = $('#return_url').val();
        if(!is_phone(mobile)){
            layer.msg('请填写正确的手机格式');
            return false;
        }

        if(!code_six(code)){
            layer.msg('短信验证码格式不正确');
            return false;
        }

        $.ajax({
            url:'/webapp_user/check_code',
            data:{code:code,mobile:mobile},
            type:'post',
            success:function(data){
            
                if(data.result.err==1001){
                    layer.msg('短信验证码错误');
                   return false;
                }else if(data.result.err==0){
                    location.href = '/webapp_user/mycenter';
                }else{
                  var msg = data.result.msg;
                  var err = data.result.err;
                    layer.msg(err+':'+msg);
                }
            }
        },'json')
     })

    //tab 登录方式切换
    $('#demo1 li').click(function(){
        var way = $(this).attr('data');
        $(this).addClass('active').siblings().removeClass('active');
        $('#'+way).css('display','block').siblings().css('display','none');
    })
    //密码登录
    $('#login').click(function(){
        var phone = $('#phone').val();
        var pass  = $('#pass').val();
        var return_url = $('#return_url').val();
        if(!is_phone(phone)){
            layer.msg('请填写正确的手机格式');
            return false;
        }

        if(!is_pass(pass)){
            layer.msg('请输入8-16密码,检查格式是否正确');
            return false;
        }
        var pwd = hex_md5(pass);
        $.ajax({
            url:'/webapp_user/dologin',
            data:{pass_word:pwd,mobile:phone},
            type:'post',
            success:function(data){
                if(data.result.err==1001){
                    layer.msg('短信验证码错误');
                    return false;
                }else if(data.result.err==0){
                        location.href = '/webapp_user/mycenter';
                }else{
                    var msg = data.result.msg;
                    var err = data.result.err;
                    layer.msg(err+':'+msg);
                }
            }
        },'json')
    })
    </script>
</body>

</html>