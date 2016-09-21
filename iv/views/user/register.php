<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">
    <script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/js/md5.js"></script>
    <script type="text/javascript" src="/Public/js/layer.js"></script>
    <script type="text/javascript" src="/Public/js/time.js"></script>
    <script type="text/javascript" src="/Public/js/my_cookie.js"></script>

    <link rel="icon" href="/Public/images/ico.png">
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
            background: url("/Public/images/logo-white.png") no-repeat;
            width:152px;
            height: 40px;
            margin:20px 20px 20px 80px;
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
            background: #ffffff;
            margin:0 auto;
            width:900px;
            min-height: 640px
        }
        .con_title{
            text-align: center;
            padding-top: 40px;
            font-size: 16px;
            color:#585858;
        }
        
        .con_list{
            margin:35px 0px 0px 84px;
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
           border: 1px solid #ccc;
            color: #000;
            font-size: 14px;
            height: 40px;
            padding-left: 10px;
            width: 250px;
        }
       
        .is_agree{
            margin-left:204px;
            padding:30px  0px 0px 0px;
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
        .con_right{
            width:344px;
            float: left;
            text-align: center;
            margin-top: 100px
        }
        .inner_con{
            width:556px;
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
            left: 120px;
            margin-top: 4px;
            top:100%;
            white-space: nowrap;
            word-break: keep-all;
        }
        .valid {
            background-position: 0 -125px;
            line-height: 1.5;
            position: absolute;
            left: 93%;
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
        #cap~.invalid {
            color: #999;
            left: 120px;
            margin-top: 4px;
            top:68%;
            white-space: nowrap;
            word-break: keep-all;
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
       #code{
          width:120px;
       }
       #code~.valid{
            left: 58%;
       }
       #send{
             background: #0097d6 none repeat scroll 0 0;
            border: medium none;
            color: #ffffff;
            display: inline-block;
            height: 40px;
            width: 110px;
            margin-left:20px
       }
       .icon1 {
           background: url(/Public/images/bcheck_01.png) no-repeat;
           height: 16px;
           left: 0;
           position: absolute;
           top: 0;
           width: 16px;
           margin: 2px;
        }
        .selected {
            background: url(/Public/images/bcheck_02.png) no-repeat;
            height: 16px;
            left: 0;
            position: absolute;
            top: 0;
            width: 16px;
            margin: 2px;
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
         button[disabled]{
            background: #cccccc
        }
        .yanzm{
            margin-left:10px
        }
        #captcha{
            height:40px;
            margin-left:60px;
            padding-left:10px
        }
        .layui-layer-btn{
            background:#fff;
        }
        #send:disabled{
            background:#ccc;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="header_logo"></div>
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
                <li class="current">1 账号信息</li>
                <li class="nnext">2 完善信息</li>
                <li class="next">3 审核结果</li>
            </ul>
            <div class="clear"></div>
            <div class="con_add">
                <div class="inner_con">
                    <div class="con_list">
                        <label for="">手机号:</label><input type="text" placeholder="请输入手机号" id="phone">
                    </div>
                    <div class="con_list">
                        <label for="">设置密码:</label><input type="password" placeholder="请设置8-16位密码" id="password">
                    </div>
                    <div class="con_list">
                        <label for="">短消息验证码:</label><input type="text" placeholder="请输入验证码" id="code"><button id="send">获取验证码</button>
                    </div>
                    <div class="clear"></div>
                    <div class="is_agree">
                        <div style="float:left;margin-left:0px;position:relative">
                                        <span class="icon1 selected" id="protocol"></span>
                                        <input type="checkbox" id="agreement" style="display:none"/>
                                      </div><span class="protocol"><a style="text-decoration: underline" href="/help/service_protocol" target="_blank">同意逍品旅行服务协议</a></span>
                        <div class="clear"></div>            
                        <div class="invalid" style="display:none;margin-left:20px" id="invalidxie">
                            <i></i>
                            <div class="msg">未勾选协议</div>
                        </div>              
                    </div>
                    <div class="sub"><button class="bt" disabled>下一步</button></div>
                </div>
                <div class="con_right">已有账号?<a href="/user/login">立即登录</a></div>
                <form action="/user/verify" accept-charset="utf-8" id="sub"  method="post">
                            <input type="hidden" name="email" value="" id="ret">
                            <input type="hidden" name="email_encode" value="" id="ema">
                </form>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $('.bt').attr('disabled',false);
        $('.normal').click(function(){
            if($(this).attr('class') == 'normal'){
                $(this).addClass('seled');
            }else{
                $(this).removeClass('seled');
            }
        })

        var PHONEXISTS = false;
        var ISPASS = false;
        var ISCODE = false;
         $('input').focus(function(){
            $(this).parent().find('.invalid').css('display','none');
            $(this).parent().find('.valid').css('display','none');
            $(this).val();
        })
        //正确的ui 
        function ui_false(e){
            e.parent().find('.invalid').css('display','block');
        }
        //错误的ui
        function ui_true(e){
            e.parent().find('.invalid').css('display','none');
            e.parent().find('.valid').css('display','inline');
        }

        function error_ui(e,i){
            var error_info = '<div class="invalid" style="display:none;margin-left:20px"><i></i><div class="msg">'+i+'</div></div><i class="valid" style="display: none;"></i>';
            if(e.parent().find('.invalid').attr('class') != 'invalid'){
                e.parent().append(error_info);
            }else{
                e.parent().find('.msg').html(i);
            }
            
        }

        //检查手机号格式
        function is_phone(phone){
            var reg = /^1[3-9][0-9]{9}$/; 
            //检测   exec
            return reg.test(phone);
        }
        //短信验证码
       function code_six(e){
          //声明正则
          var reg = /^\d{6}$/;
          //检测
          return reg.test(e);
       }

         //检查手机号是否已经注册
        function phone_exist(e){
            var inp = e;
            var phone = e.val();
            // 发送ajax检测用户名是否已经存在
            $.ajax({
                url:'/user/check_user_exists',
                data:{uname:phone,utype:2},
                type:'post',
                async:false,//设置同步
                success:function(data){
                
                    //如果用户名不可用
                    if(data.result.err==5022){
                         error_ui(e,'该手机号已经注册');
                         ui_false(inp);
                         PHONEXISTS = false;
                         return false;
                    }else{
                        error_ui(e,'');
                        ui_true(inp);
                        inp.val();
                        PHONEXISTS = true;
                        return true;
                    }
                }
            },'json')
        }
        //手机号验证
        $('#phone').blur(function(){
            var e = $(this);
            if(!is_phone(e.val())){
                error_ui(e,'手机号格式错误');
                ui_false(e);
            }else{
                phone_exist(e);
            }
           
        })
         //密码验证
        $('#password').blur(function(){
            var e = $(this);
            is_pass(e);
        })

        //密码格式是否正确
        function is_pass(e){
            //获取密码的值
            var pass = e.val();
            //声明正则
            var reg = /^\S{8,16}$/;
             inp=e;
            //检测失败的话
            if(!reg.test(pass)){
                error_ui(e,'密码格式不正确');
                ui_false(e);
                ISPASS = false;
            }else{
                error_ui(e,'');
                ui_true(inp);
                inp.val();
                ISPASS = true;
            }
        }
     

        //检验短信验证码格式
        $('#code').blur(function(){
            var e = $(this);
           if(!code_six(e.val())){
                error_ui(e,'短信验证码格式不正确');
                ui_false(e);
                ISCODE = false;
           }else{
                ISCODE = true;
           }
        })
        //验证码必须4位
        function catcha_four(e){
            //获取密码的值
            var captcha = e.val();
            //声明正则
            var reg = /^\S{4}$/;
            
            //检测失败的话
            if(!reg.test(captcha)){
                error_ui(e,'验证码必须为4位')
                ui_false(e);
               return  false;
            }else{
               return true;
            }
        }
        
        //同意协议验证
       
        $('#protocol').click(function(){
            if(!$('#agreement').prop('checked')){
               $('#invalidxie').css('display','none');
       
            }else{
               $('#invalidxie').css('display','block');
            }
           if($(this).attr('class')=='icon1'){
              $(this).addClass('selected');
              $('#agreement').prop('checked',true);
              $('.bt').attr('disabled',false);
           }else{
              $(this).removeClass('selected');
              $('#agreement').prop('checked',false);
              $('.bt').attr('disabled',true);
           }
        })

        
        //开始倒计时
        var countdown;
        function settime(obj) { 
          countdown=getCookieValue("secondsremained");
          if (countdown == 0) { 
            obj.removeAttr("disabled");  
            obj.html("发送短消息"); 
            return;
          } else { 
            obj.attr("disabled", true); 

            obj.html("重新发送(" + countdown + ")"); 
            countdown--;
            editCookie("secondsremained",countdown,countdown+1);
          } 
          setTimeout(function() { settime(obj) },1000) //每1000毫秒执行一次
        }

    var mobile = '';
     var v = getCookieValue("secondsremained");//获取cookie值
      if(v>0){
        settime($("#send"));//开始倒计时
      }

    $('#send').click(function(){
        var i = $('#phone');
        if(!is_phone(i.val())){
             error_ui(i,'手机号格式错误');
             ui_false(i);
             return false;
        }

        if(!PHONEXISTS){
             error_ui(i,'该手机号已经注册');
             ui_false(i);
            return false;
        }
        mobile = i.val();
        var msg = "<div class='yanzm'><input id='captcha' type='text' placeholder='请输入验证码' style='width:50%'><img style='width:80px;margin-left:15px;height:40px;position:absolute;top:20px'  src='http://api.qsctrip.com/captcha/get_captcha?uname="+mobile+"&from=h5' id='cap'></div>";
             
         layer.open({
                     title:'请填写验证码',
                     content: msg,
                     area: '500px',
                     yes: function(index){
                        var captcha = $('#captcha');
                        var uname = $('#phone').val();
                        if(!catcha_four(captcha)){
                            return false;
                            console.log(222);
                        }
                        var capt = captcha.val();
                        $.ajax({
                            url:'/user/send_sms_code',
                            data:{captcha:capt,uname:uname},
                            type:'post',
                            success:function(data){
                              
                                if(data.result.err==1001){
                                   alert('图形验证码错误');
                                   return false;
                                }else if(data.result.err==0){
                                    addCookie("secondsremained",60,60);//添加cookie记录,有效时间60s

                                    settime($('#send'));//开始倒计时

                                    layer.close(index);
                                }else{
                                    var message = data.result.err + ':' + data.result.msg;
                                    layer.open({
                                         title:false,
                                         content: message,
                                         area: '260px',
                                         closeBtn: false
                                    });
                                }
                            }
                        },'json')
                     }

         })
    })

         $('.bt').click(function(){
            if(!PHONEXISTS){
                $('#phone').trigger('blur');
            }
            if(!ISPASS){
                $('#password').trigger('blur');
            }

            if(!ISCODE){
                $('#code').trigger('blur');
            }

            if(PHONEXISTS && ISPASS && ISCODE){
                
                var user =$('#phone').val();
                var pass = $('#password').val();
                var code = $('#code').val();
                var pwd = hex_md5(pass);
                $.ajax({
                        url:'/user/doregister',
                        data:{krecjde:user,iczryn:code,orlzne:pwd,daeewc:2},
                        type:'post',
                        // async:false,//设置同步
                        success:function(data){

                            //如果用户名不可用
                            if(data.result.err === 0){
                                error_ui($('#code'),'');
                                ui_true($('#code'));
                              var info = new Array();
                              var userinfo = data.content;
                              info.push(userinfo);
                              var strContent = JSON.stringify(info);

                              setCookie('user_info',strContent,30) ;
                              location.href='/user/info_verify';
                            }else if(data.result.err === 1001 ){
                                   var str = data.result.msg;
                                   error_ui($('#code'),str);
                                   ui_false($('#code'));
                                   return false;       
                            }else{
                                var message = data.result.err + ':' + data.result.msg;
                                layer.open({
                                     title:false,
                                     content: message,
                                     area: '260px',
                                     closeBtn: false
                                });
                            }
                           
                        }
                },'json')

                return false;
            }
               
            return false;        
            
        })

    $('body').delegate('#cap','click',function(){
        var mobile = $('#phone').val();
         var sr ='http://api.qsctrip.com/captcha/get_captcha?uname='+mobile+'';
         var a = '&from=web&a='+Date.parse(new Date()); 
         $(this).attr('src',(sr+a));
    })
    </script>

</body>
</html>