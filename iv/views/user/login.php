<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>康辉畅享假期</title>
  <link rel="stylesheet" href="/Public/css/bootstrap.min.css">
  <script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>
  <script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="/Public/js/md5.js"></script>
  <script type="text/javascript" src="/Public/js/my_cookie.js"></script>
  <script type="text/javascript" src="/Public/js/layer.js"></script>
  <script type="text/javascript" src="/Public/js/time.js"></script>

    <link rel="icon" href="/Public/images/ico.png">
  <style type="text/css">

    body{
      background: url("/Public/images/nbackground.png") no-repeat center;
      background-attachment: fixed;
      background-size:cover;
    }

    .header{
      height:80px;
      background-color:#fff;
      padding:0px;
    }
    .header_logo{
        background: url("/Public/images/kh_logo.png") no-repeat;
        width:250px;
        height: 50px;
        margin:16px 20px 20px 20px;
        float:left;
    }
    .header_right{
      float:right;
      padding:25px 80px;
    }
    .header_right select{
      width:150px;
      height:30px;
    /*  background: transparent;
      border:none;*/
    }
    .bd_logo{
      width:340px;
      height:50px;
      background: url(/Public/images/character_01.png) no-repeat;
    }
    .con_left{
      width:800px;
      float: left;
      margin-top: 200px
    }
    /*登录页 文字描述*/
 /*   .logo_text{
      margin-left: 250px;
      width:482px;
      height:80px;
      background: url(/Public/images/login_slogan.png) no-repeat;

    }*/
    .con_right{
      float: right;
      margin-right:100px 
    }
    .login{
      margin-top:50px;
      width:346px;
      /*height:390px;*/
      background: rgba(0,0,0,0.5);
      padding:20px;
    }
  
    .clear{
      clear: both
    }
    .supplier_login{
      font-size: 16px;
      color:#ffffff;
      margin-top:20px;
    }
    .user_name{
      margin-top: 30px;
      height:40px;
    }
    .user_name input,.pwd input{
      height:40px;
      width:266px;
      float:left;
      padding-left: 20px;
      color:#999999;
      border:#cccccc 1px solid;
    }
    .user_name input:focus,.user_name input：hover,.pwd input:focus,.pwd input:hover{
      border:#0097d6 1px solid;
    }
    .pwd{
      margin-top: 30px
    }
    .icon_01{
      background: url(/Public/images/icon_one.png) no-repeat;
      width:40px;
      height:40px;
      display: inline-block;
      float:left;
    }
    .icon_02{
      background: url(/Public/images/icon_two.png) no-repeat;
      width:40px;
      height:40px;
      display: inline-block;
      float:left;
    }
    .other_info{
      height: 25px;
      margin-top:30px;
    }
    .rem{
      color:#ffffff;
      font-size: 14px;
      text-indent: 2em;
      width:120px;
      height:20px;
      float: left
    }

    .normal{
      background: url(/Public/images/check_01.png) no-repeat;
    }
    .seled{
      background: url(/Public/images/check_02.png) no-repeat;
    }
    .forgot_pwd{
      float: right
    }
    a:focus,a:hover{
      color:#7fcbea;
      text-decoration: none
    }
    .sub{
      margin-top: 30px
    }
    .bt,.p_bt{
      background: #00d8ff;
      color: #fff;
      border:none;
      width:100%;
      height:40px;
    }
    .reg{
      margin-top: 20px;
      color:#ffffff;

    }
    
    .focus_text{
          display:block
      }
    
      .error_ui .focus_text{
          display:none
      }

      .sms_t .invalid,.sms_t .valid,.yanzm .invalid,.yanzm .valid,.spo .invalid,.pwd .valid,.user_name .valid,.pwd .invalid,.user_name .invalid,.pwd .focus_text,.user_name .focus_text{
          display: none;
          line-height: 1.5;
          position: absolute;
      }

      :focus~.focus_text{
          display:block
      }
      
    .sms_t .valid,.spo .invalid,.spo .valid,.pwd .invalid,.user_name .invalid,.pwd .focus_text,.user_name .focus_text{
          color: #999;
          left: 0;
          margin-top: 4px;
          top:100%;
          white-space: nowrap;
          word-break: keep-all;
      }
       .sms_t .invalid{
          color: #999;
          left: -21px;
          margin-top: 4px;
          text-indent: 21px;
          top: 138%;
          white-space: nowrap;
          word-break: keep-all;
      }
      .pwd,.user_name,.sms_t{
          display: inline-block;
          vertical-align: middle;
          position: relative;
      }
      
     .sms_t .invalid,.sms_t .valid,.spo .valid,.pwd .valid,.user_name .valid,.pwd .invalid i,.user_name .invalid i{
      height: 20px;
      margin-top: -10px;
      width: 20px;
     }
     .sms_t .valid,.spo .valid,.pwd .valid,.user_name .valid{
        background-image: url("/Public/images/sign.png?2");
        background-repeat: no-repeat;
     }
     .spo .invalid i{
        height: 20px;
        margin-top: -10px;
        width: 20px;
        background-image: url("/Public/images/wrong1.png");
        background-repeat: no-repeat;
        background-position: 0 5px;
        left: -19px;
        position: absolute;
        top: 43%;
     }
     .sms_t .invalid i{
        height: 20px;
        margin-top: -10px;
        width: 20px;
        background-image: url("/Public/images/wrong1.png");
        background-repeat: no-repeat;
        background-position: 0 5px;
        left: 2px;
        position: absolute;
        top: 43%;
     }

     .sms_t .valid,.pwd .invalid i ,.user_name .invalid i{
      background-image: url("/Public/images/wrong1.png");
      background-repeat: no-repeat;
     }

    .sms_t .valid,.pwd .invalid i,.user_name .invalid i{
      background-position: 0px 5px;
      left: -20px;
      position: absolute;
      top: 34%;
    }
 
    .sms_t .valid,.spo .valid,.pwd .valid ,.user_name .valid{
      background-position: 0 -125px;
      line-height: 1.5;
      position: absolute;
      left: 90%;
      margin-top: -0.75em;
      top: 45%;
    }

      .footer {
          heihgt: 200px ;
          background: black;
          width: 100%;
          float: left;
          padding: 20px;
          text-align: center;
          color: white;
          display: none;
      }

      .spo{
        display: inline-block;
        position: relative;
        vertical-align: middle;
      }

    @media screen and (-webkit-min-device-pixel-ratio:0) {
      .spo input{
        width:350px;
        height:40px;
        padding-left:10px;
        float:left;
        border:#ccc 1px solid;
      }
    }
      
    .spo input{
        width:350px;
        height:40px;
        padding-left:10px;
        float:left;
        border:#ccc 1px solid;
      }

        
   
      .layui-layer-btn{
        background:#fff
      }
      .sms_t input{
        width:240px;
        height:40px;
        padding-left:10px;
        border:#ccc 1px solid;
      }
      #send_sms{
        color:#fff;
        border:solid #00d8ff 1px;
        width:150px;
        margin-left:20px;
        background:#00d8ff;
        height:40px
      }
      .mam_m{
        margin-top:20px
      }
      .mam_m a{
        color:#00d8ff;
        cursor:pointer
      }

      

      .once_m{
        margin-left:20px
        border:none;
        background:#fff;
        color:#00d8ff;
        border:transparent 1px solid;
      }
      .once_m:disabled{
        color:#999;
        margin-left:20px
        border:transparent 1px solid;
        background:#fff;
        cursor: not-allowed;
      }
      .inputer{
        width:100%;
        height:40px;
        border:#ccc 1px solid;
        padding-left:10px
      }
      #npassword{
        margin-top:5px;
      }
      #repassword{
        margin-top:30px
      }
      #restore{
          color:#fff;
          border:solid #00d8ff 1px;
          width:100%;
          background:#00d8ff;
          height:40px;
          font-size:16px
      }
      .inputOuter{
        vertical-align: middle;
        position: relative;
    }

    .inputOuter .error{
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
    .layui-layer-title {
      background-color: #edefed;
      border-bottom: 1px solid #ccc;
      height:40px;
      font-size:16px;
      color:#333;

    }
    .msm_intro{
      font-size:14px;
      color:#585858;
      margin-bottom:20px
    }
    .zone{
      width:58px;
      border:1px #ccc solid;
      border-right:none;
      text-align:center;
      height:40px;
      line-height:40px;
      font-size:16px;
      color:#333;
      float: left;
      background:#edefed
    }
    .icon_phone{
      position:absolute;
      top:10px;
      right:20px;
      width:20px;
      height:20px;
      background:url(/Public/images/icon_phone.png) no-repeat;
      z-index:100000000;
    }
    .icon_lock{
      position:absolute;
      top:15px;
      right:20px;
      width:20px;
      height:20px;
      background:url(/Public/images/icon_lock.png) no-repeat;
    }
    #repassword~.icon_lock{
      top:39px;
    }
    .layui-layer-btn0{
      float:left;

    }
    #send_code{
      background-color:#00d8ff;
      color:#fff;
      height:40px;
      width:150px;
      font-size:14px;
      border:none;
    }
    .line_a{
      margin-top:40px;
      margin-bottom:20px;
      background:#ccc;
      height:1px
    }

  .choice_login{
    overflow: hidden;
    margin-top: 30px;
  }
  .choice_login img{
    margin-right: 10px;
  }
  .phone_login,.normal_login{
    float: left;
    font-size: 12px;
    color: #fff;
    cursor: pointer;
  }
  .normal_login{
    margin-right: 20px;
  }
  .user_name input,.pwd input{
    height:40px;
    width:266px;
    float:left;
    padding-left: 20px;
    color:#999999;
    border:#cccccc 1px solid;
  }
  .p_get_pwd{
    width: 125px;
    height: 40px;
    margin-left: 16px;
    float: left;
  }
  .p_get_pwd button{
    width: 125px;
    height: 40px;
    text-align: center;
    font-size: 12px;
    color: #777;
    /*background-color: #7febff;*/
    background-color: #ccc;
    border:none;
    cursor: not-allowed;
    outline: none;
  }
  .phone_module{
    display: none;
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
  <div class="clear"></div>
  <div class="content">
    <div class="con_left">
      <div class="logo_text"></div>
    </div>
    <div class="con_right">
      <div class="login">
        <div class="supplier_login">门市/销售登录</div>
        <div class="choice_login">
          <div class="normal_login"><img src="/Public/images/choice_ok.png" alt=""><span>普通登录</span></div>
          <div class="phone_login"><img src="/Public/images/choice_no.png" alt=""><span>手机动态密码登录</span></div>
        </div>
        <div class="phone_module">
              <div class="user_name">
                <i class="icon_01"></i>
                <input type="text" value="" placeholder="手机号" id="p_phone">
                <div class="focus_text">请输入手机号</div>
                <div class="invalid" style="display:none;margin-left:20px">
                    <i></i>
                    <div class="msg">您输入的手机号格式有误，请重新输入</div>
                 </div>
                  <i class="valid" style="display: none;"></i>
              </div>
              <div class="pwd">
                <i class="icon_02"></i>
                <input type="password" value="" placeholder="动态密码" id="p_password" style="width:125px;">
                <div class="p_get_pwd"><button id="get_code" disabled>获取手机动态密码</button></div>
                <div class="focus_text">请输入密码</div>
                        <div class="invalid" style="display:none;margin-left:20px">
                          <i></i>
                            <div class="msg">您输入的密码格式有误，请重新输入</div>
                          </div>
                        <i class="valid" style="display: none;"></i>
              </div>    
              <div class="clear"></div>
              <div class="sub"><button class="p_bt">登录</button></div>
        </div>

        <div class="normal_module">
              <div class="user_name">
                <i class="icon_01"></i>
                <input type="text" value="" placeholder="手机号" id="phone">
                <div class="focus_text">请输入手机号</div>
                <div class="invalid" style="display:none;margin-left:20px">
                    <i></i>
                    <div class="msg">您输入的手机号格式有误，请重新输入</div>
                 </div>
                  <i class="valid" style="display: none;"></i>
              </div>
              <div class="pwd">
                <i class="icon_02"></i>
                <input type="password" value="" placeholder="密码" id="password">
                <div class="focus_text">请输入密码</div>
                        <div class="invalid" style="display:none;margin-left:20px">
                          <i></i>
                            <div class="msg">您输入的密码格式有误，请重新输入</div>
                          </div>
                        <i class="valid" style="display: none;"></i>
              </div>    
              <div class="clear"></div>
              <div class="other_info">
                <div class="rem normal">下次自动登录</div>
                <a><div class="forgot_pwd">忘记密码</div></a>
              </div>
          <div class="sub"><button class="bt">登录</button></div>
        </div>
        <div class="clear"></div>
        <!-- <div class="reg">暂无账号?<a href="/user/register">立即注册</a></div> -->
      </div>
    </div>
  </div>


  <script type="text/javascript">
      // --------------------------登录方式-------------------------
      var is_hidden;//判断登录方式
        is_hidden=$(".normal_module").is(':hidden');
      $(".choice_login div").click(function() {
        var name=$(this).find('span').text();
        if (name=="手机动态密码登录") {
         $(this).find('img').attr("src","/Public/images/choice_ok.png");
         $(this).siblings('div').find('img').attr("src","/Public/images/choice_no.png");
         $(".phone_module").show();
         $(".normal_module").hide();
        }else{
          $(this).find('img').attr("src","/Public/images/choice_ok.png");
          $(this).siblings('div').find('img').attr("src","/Public/images/choice_no.png");
          $(".phone_module").hide();
          $(".normal_module").show();
        }
        is_hidden=$(".normal_module").is(':hidden');
      });
      $('.rem').click(function(){
        if($(this).attr('class') == 'rem normal'){
          $(this).addClass('seled');
        }else{
          $(this).removeClass('seled');
        }
      })
      //验证
       var is_email_exist = false;

        $('body').delegate('input','focus',function(){
           
            $(this).parent().find('.invalid').css('display','none');
            $(this).parent().find('.valid').css('display','none');
            $(this).val();
            $(this).parent().find('.error').css('display','none');
        })
        var ISPASS = false;
        var ISSPHONE = false;

        //正确的ui
        function ui_false(e,i){
            e.parent().addClass('error_ui');
            e.parent().find('.invalid').css('display','block');
            e.parent().find('.msg').html(i);
            e.parent().find('.focus_text').css('display','none');
            e.parent().find('.valid').css('display','none');
        }
        //错误的ui
        function ui_true(e){
            e.parent().removeClass('error_ui');
            e.parent().find('.invalid').css('display','none');
            e.parent().find('.valid').css('display','block');
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
        function phone_exist(){
            var inp = $('#phone');
            var phone = $('#phone').val();
            // 发送ajax检测用户名是否已经存在
            $.ajax({
                url:'/user/check_user_exists',
                data:{uname:phone,utype:2},
                type:'post',
                // async:false,//设置同步
                success:function(data){
                    //如果用户名不可用
                    if(data.result.err==5022){
                        ui_true(inp);
                        inp.val();
                        is_email_exist = true;
                    }else{
                        var str = "该手机号未注册请先<a href='/user/register'>注册</a>";
                        ui_false(inp,str);
                        is_email_exist = false;
                    }
                }
            },'json')
        }
        //动态密码登录检查手机号是否已经注册----------------------------------------------------------------------------------------------------------
        function p_phone_exist(){
            var inp = $('#p_phone');
            var phone = $('#p_phone').val();
            // 发送ajax检测用户名是否已经存在
            $.ajax({
                url:'/user/check_user_exists',
                data:{uname:phone,utype:2},
                type:'post',
                // async:false,//设置同步
                success:function(data){
                    //如果用户名不可用
                    if(data.result.err==5022){
                        ui_true(inp);
                        inp.val();
                        is_email_exist = true;
                        //可以发送短信
                        $("#get_code").removeAttr('disabled');
                        $("#get_code").css({
                          "background-color": '#7febff',
                          "cursor": 'pointer'
                        });
                    }else{
                        var str = "该手机号未注册请先<a href='/user/register'>注册</a>";
                        ui_false(inp,str);
                        is_email_exist = false;
                        $("#get_code").attr('disabled',"disabled");
                        $("#get_code").css({
                          "background-color": '#ccc',
                          "cursor": 'not-allowed'
                        });
                    }
                }
            },'json')
        }
            //手机登录动态信息 倒计时60秒
            var login_countdown;
            function login_settime(obj) { 
              login_countdown=getCookieValue("login_time");
              if (login_countdown == 0) { 
                obj.removeAttr("disabled");
                obj.css({
                  "background-color": '#7febff',
                  "cursor": 'pointer'
                });  
                obj.html("获取手机动态密码"); 
                return;
              } else { 
                obj.attr("disabled", true); 
                obj.html("重新发送(" + login_countdown + ")"); 
                login_countdown--;
                editCookie("login_time",login_countdown,login_countdown+1);
              } 
              setTimeout(function() { login_settime(obj) },1000) //每1000毫秒执行一次
            }
         var v = getCookieValue("login_time");//获取cookie值
          if(v>0){
            settime($("#get_code"));//开始倒计时
          }
          //点击获取动态密码按钮
        $("#get_code").click(function() {

            var inp=$("#p_password");
            var phone = $('#p_phone').val();
            if ( !is_phone(phone) || (!is_email_exist)) {//去掉disabled 得注册并且验证码正确才能提交
                return false;
            }
            $.post('/user/send_sms_login_code', {phone: phone}, function(data) {
              if (data.result.err==0) {
                  addCookie("login_time",60,60);//添加cookie记录,有效时间60s

                  login_settime($('#get_code'));//开始倒计时
                  $(".p_get_pwd button").css({
                    "background-color": '#ccc',
                    "cursor": 'not-allowed'
                  });
              }
              else{
                var str='获取动态密码失败，请重新获取';
                ui_false(inp,str);
              }
            });
        });
        //回车登录判断
       $("body").keyup(function (event) {
              if (event.which == 13){  
                    if (  is_hidden) {
                      $(".p_bt").click();
                    }else{
                      $('.bt').click();
                    }
                }
          }); 
        //普通登录=--------点击登录按钮
          $('.bt').click(function(event){
               var user =$('#phone').val();
               if(!is_phone(user)) {
                   ui_false($('#phone'),'您输入的手机号格式有误，请重新输入');
                   return;
               }
               var pass = $('#password').val();
               if(pass == '') {
                   ui_false($('#password'),'请输入密码');
                   return;
               } else if(!is_pass(pass)) {
                   ui_false($('#password'),'密码格式不正确');
                   return;
               }
               var pwd = hex_md5(pass);
               event.stopPropagation();
               $.ajax({
                   url:'/user/dologin',
                   data:{krecjde:user,orlzne:pwd},
                   type:'post',
                   success:function(data){
                       if(data.result.err==0){
                          //清除手机号

                           $('#password').parent().find('.valid').css('display','inline');
                           var info = new Array();
                           var userinfo = data.content;
                            info.push(userinfo);
                           var strContent = JSON.stringify(info);
                           setCookie('user_info',strContent,30) ;
                           if(data.content.status === '0'){
                               document.location.href="/user/info_verify";
                           }else{
                               if(data.content.backto == 1){
                                   document.location.href="/mall/search?act=z";
                               }else{
                                   document.location.href="/user/verify_status";
                               }
                           }
                       }else if(data.result.err==5005){
                           var str="输入密码错误"
                           ui_false($('#password'),str);
                       }else{
                         alert(data.result.err);
                       }
                   }
               },'json')
          }) ;
        //手机动态密码登录------点击登录按钮
       $('.p_bt').click(function(event){
                   var user =$('#p_phone').val();
                   var code = $('#p_password').val();
                   if(!is_phone(user)) {
                       ui_false($('#p_phone'),'您输入的手机号格式有误，请重新输入');
                       return;
                   }
                   if(code == '') {
                       ui_false($('#p_password'),'请输入动态密码');
                       return;
                   } else if(!code_six(code)) {
                       ui_false($('#p_password'),'密码格式不正确');
                       return;
                   }
                   event.stopPropagation();
                   $.ajax({
                       url:'/user/phone_login',
                       data:{phone:user,code:code},
                       type:'post',
                       success:function(data){
                           if(data.result.err==0){
                                $("#p_phone").val('');
                               var info = new Array();
                               var userinfo = data.content;
                                info.push(userinfo);
                               var strContent = JSON.stringify(info);
                               setCookie('user_info',strContent,30) ;
                               if(data.content.status === '0'){
                                   document.location.href="/user/info_verify";
                               }else{
                                   if(data.content.backto == 1){
                                       document.location.href="/mall/search?act=z";
                                   }else{
                                       document.location.href="/user/verify_status";
                                   }
                               }
                              
                           }else if(data.result.err==1001){
                               var str="手机号不存在或短信验证码错误"
                               ui_false($('#p_password'),str);
               
                           }else if(data.result.err==2001){
                              var str="验证码已过期，请重新获取"
                              ui_false($('#p_password'),str);
                           }
                       }
                   },'json')
           }) ;
        //用户名丧失焦点事件
        $('#phone').blur(function(){
            var phone = $('#phone').val();
            if(is_phone(phone)) {
                 phone_exist();
            } else {
                ui_false($('#phone'),'您输入的手机号格式有误，请重新输入');
            }
        })
        //动态密码登录用户名keyup事件--------------------------------------------------------------------------------------------------------------------
        $('#p_phone').keyup(function(){
            var phone = $('#p_phone').val();
            if(is_phone(phone)) {
                 p_phone_exist();
            } else {
                ui_false($('#p_phone'),'您输入的手机号格式有误，请重新输入');
                $(".p_get_pwd button").attr('disabled',"disabled");
                $(".p_get_pwd button").css({
                  "background-color": '#ccc',
                  "cursor": 'not-allowed'
                });
            }
        })
        var mobile = '';
        //用户名丧失焦点事件  
        $('body').delegate('#sphone','blur',function(){
            var sphone = $('#sphone').val();
            inp = $('#sphone');
            if(is_phone(sphone)) {
              ISSPHONE = true;
            } else {
                ui_false($('#sphone'),'您输入的手机号格式有误，请重新输入');
                ISSPHONE = false;
            }
        })
        //密码验证
        $('#password').blur(function(){
            var inp=$('#password');
            var pass = $('#password').val();
            if(pass == '') {
                ui_false(inp,'请输入密码');
            } else if(!is_pass(pass)) {
                ui_false(inp,'密码格式不正确');
            } else {
                ui_true(inp);
                inp.val();
                inp.parent().find('.valid').css('display','none');
            }
        })

        //密码格式是否正确
        function is_pass(pwd){
            //声明正则
            var reg = /^\S{8,16}$/;
            //检测失败的话
            return reg.test(pwd);
        }
         
        
        $('.forgot_pwd').click(function(){
            var msg = "<div class='msm_intro'>请输入与您的账号关联的电话号码,我们会给您发送验证码来重置密码</div><div class='spo'><div class='zone'>+86</div><input id='sphone' type='text' placeholder='手机号'><div class='icon_phone'></div><div class='invalid' style='display:none;margin-left:20px'><i></i><div class='msg'>您输入的密码格式有误，请重新输入</div></div><i class='valid' style='display: none;'></i></div><div class='line_a'></div><div><button id='send_code'>发送验证码</button></div>";
             layer.open({
                         title:'重置密码',
                         btn: false,
                         content: msg,
                         area: ['450px','290px'],
                         success: function(index){
                           $('#send_code').click(function(){
                              var uname = $('#sphone').val();
                               if(!ISSPHONE){
                                 $('#sphone').trigger('blur');
                                 return false;
                              }
                              $.ajax({
                                  url:'/user/send_find_sms_code',
                                  data:{uname:uname},
                                  type:'post',
                                  success:function(data){
                                   var msg1 = '<div><div class="msm_intro">我们发送了一条短信到'+uname+'请输入短信中的验证码。</div><div class="sms_t"><input type="text" id="sms_code" placeholder="请输入验证码"><div class="invalid" style="display:none;margin-left:20px"><i></i><div class="msg">验证码格式有误</div></div><i class="valid"style="display: none;"></i><button id="send_sms">确认</button></div><div class="line_a"></div><div class="mam_m"><a class="shift_m">更改电话号码</a><button class="once_m">再次发送验证码</button></div></div>';
                                      if(data.result.err==0){
                                          layer.open({
                                           title:'密码重置',
                                           content: msg1,
                                           btn: false,
                                           area: ['450px','260px'],
                                           success: function(index){
                                                addCookie("secondsremained",60,60);//添加cookie记录,有效时间60s
                                                settime($(".once_m"));
                                               $('#send_sms').click(function(){
                                                  var sms_code = $('#sms_code');
                                                   if(!code_six(sms_code.val())){
                                                        ui_false(sms_code);
                                                   }else{
                                                      var sms_code =  $('#sms_code').val();
                                                      $.ajax({
                                                          url:'/user/find_sms_by_smscode',
                                                          data:{code:sms_code,mobile:uname},
                                                          type:'post',
                                                          success:function(data){
                                                             console.log(data);
                                                              if(data.result.err==0){
                                                                  var msg2 = '<form action="/user/doreset_pwd_phone" method="post"><div class="inputOuter"><input type="password" placeholder="新密码(8-16位)" class="inputer" id="npassword" name="pwd"><div class="icon_lock"></div><div class="error"></div></div><div class="inputOuter"><input type="password" placeholder="确认密码" class="inputer" id="repassword" name="repwd"><div class="icon_lock"></div><div class="error"></div></div><hr><div><button id="restore">保存并继续</button></div></form>';
                                                                    layer.open({
                                                                       title:'密码重置',
                                                                       content: msg2,
                                                                       btn: false,
                                                                       area: ['450px','285px'],
                                                                       success: function(index){
                                                                              $('#restore').click(function(){
                                                                                var pass=  $('#npassword').val();
                                                                                  var mdpass = hex_md5(pass);
                                                                                if(is_password() && is_repass()){
                                                                                  $('#npassword').val(mdpass);
                                                                                  $('#repassword').val(mdpass);
                                                                                  return true;
                                                                                }
                                                                                return false;
                                                                              })
                                                                        }
                                                                    })
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
                                                      })
                                                    
                                                   }
                                               })
                                               $('.shift_m').click(function(){
                                                 $('.forgot_pwd').trigger('click');
                                               })
                                               $('.once_m').click(function(){
                                                  $.ajax({
                                                          url:'/user/send_find_sms_code',
                                                          data:{uname:uname},
                                                          type:'post',
                                                          success:function(data){
                                                                 addCookie("secondsremained",60,60);//添加cookie记录,有效时间60s
                                                                settime($(".once_m"));
                                                          }
                                                  },'json')        
                                               })
                                           }
                                         })
                                       }else if(data.result.err==5030){
                                          var str = "该手机号未注册请先<a href='/user/register'>注册</a>";
                                          ui_false(inp,str);
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

                           })

                         }
             })
        })

      //密码格式是否正确
        function is_password(){
            //获取密码的值
            var pass = $('#npassword').val();
            //声明正则
            var reg = /^\S{8,16}$/;
             inp=$('#npassword');
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
              var pass = $('#npassword').val();
              if(rePass != pass){
                  inp.parent().find('.error').html('两次密码不一致').css('display','block');
                  return false;
              }else{
                  inp.val();
                return true;
              }
          }
          //开始倒计时
            var countdown;
            function settime(obj) { 
              countdown=getCookieValue("secondsremained");
              if (countdown == 0) { 
                obj.removeAttr("disabled");  
                obj.html("再次发送验证码"); 
                return;
              } else { 
                obj.attr("disabled", true); 

                obj.html("再次发送验证码(" + countdown + "s)"); 
                countdown--;
                editCookie("secondsremained",countdown,countdown+1);
              } 
              setTimeout(function() { settime(obj) },1000) //每1000毫秒执行一次
            }

         var v = getCookieValue("secondsremained");//获取cookie值
          if(v>0){
            settime($(".once_m"));//开始倒计时
          }

  </script>




</body>
</html>