<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script src="/jumei/Public/Home/register/h.js" type="text/javascript"></script><script src="/jumei/Public/Home/register/dc.js" async="" type="text/javascript"></script><script src="/jumei/Public/Home/register/adw.js" async="" type="text/javascript"></script><script src="/jumei/Public/Home/register/mynav.txt"></script><script src="/jumei/Public/Home/register/a.txt"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="qc:admins" content="56207406376255516375">
    <title>注册 - 聚美账户</title>

<link rel="stylesheet" href="/jumei/Public/Home/register/common.css" type="text/css" media="screen" charset="utf-8">
<link rel="stylesheet" href="/jumei/Public/Home/register/jumei_sign.css" type="text/css" media="screen" charset="utf-8">



<script src="/jumei/Public/Home/register/website.js"></script>
<script src="/jumei/Public/Home/register/boot.js"></script>
<script src="/jumei/Public/Home/register/jquery.js"></script>
</head>


<!-- KEEP THIS!
<body>
-->
<body>

<style>
    .top_nav_hot{ position: absolute;left:81px;top:-4px;}

</style>
<div id="header_container">
    <!--新版的login页面没有头部 -->
    <div id="logo">
        <a href="http://www.jumei.com/" id="home" title="聚美优品" style="background:url(  https://secure3.jmstatic.com/static_passport/dist/20150902_2/images/logo_new_v1.jpg ) no-repeat top left;"> 化妆品品牌排行榜大全网站聚美优品 </a>
        <div class="header_logo_box">
            <a href="http://www.jumei.com/activity_guarantee.html?from=header#bold_consignment" rel="nofollow" class="top_link lightning" target="_blank"></a>
            <a href="http://www.jumei.com/help/two_for_freeshipping?from=header" rel="nofollow" class="top_link gild" target="_blank"></a>
            <a href="http://www.jumei.com/activity_aca.html?from=top" rel="nofollow" class="top_link credit" target="_blank"></a>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
$(".top_hot").hover(function () {
$(".top_nav_hot").css("display","none")
},
function () {
$(".top_nav_hot").css("display","block")
}
);
});
</script>

<link href="/jumei/Public/Home/register/signup.css" rel="stylesheet">
<script>
 var REDIRECT = '';
 var IS_OPEN_PASSPORT = true;
</script>
<script>
    seajs.use('signup/index', function() {});
</script>
<div class="sign">
    <div class="loginWrap">
        <div class="loginPic ">
                        <a href="http://hd.jumei.com/act/10-478-2257-newuserswelfare.html" target="_blank" class="signup_link"></a>
                        <!-- <span class="signup_link"></span> -->
            <div class="loginBord">
                <div class="loginTit">
                    <div class="tosignup">已有账号<a href="<?php echo U('Home/User/login');?>">在此登录</a></div>
                    <h1><strong>用户注册</strong></h1>
                </div>
                <form id="phone" method="post" action="<?php echo U('Home/User/insert');?>">
                    <div class="line">
                        <div class="textbox_ui">
                            <input id="mobile" placeholder="手机号" autofocus="" name="phone" autocomplete="off" type="text">
                            <div class="focus_text">请输入11位手机号码</div>
                            <div style="display: none;" class="invalid">
                                <i></i>
                                <div class="msg"></div>
                            </div>
                            <i style="display: none;" class="valid"></i>
                            <i class="loading"></i>
                        </div>
                    </div>
                        <div class="line verityWrap">
                        <div class="textbox_ui">
                            <input placeholder="验证码" id="verify_code" autocomplete="off" type="text">
                            <div class="focus_text">按右图填写，不区分大小写</div>
                            <div style="display: none;" class="invalid">
                                <i></i>
                                <div class="msg"></div>
                            </div>
                        </div>
                        <span id="change_verify_code">
                            <img src="<?php echo U('Home/Public/createVcode');?>" onclick="this.src=this.src+'?a'">
                        </span>
                    </div>
                            <!--           <div class="line verityWrap">
                        <div class="textbox_ui sms_verify_wrapper">
                            <input id="mobile_verify" placeholder="短信校验码" autocomplete="off" type="text">
                                                            <div class="focus_text">请输入6位短信校验码</div>
                                                        <div style="display: none;" class="hint"></div>
                            <div style="display: none;" class="invalid">
                                <i></i>
                                <div class="msg"></div>
                            </div>
                        </div>
                                            <a href="javascript:;" id="getPhoneCode" class="phonecode" data-verifytype="sms"><strong>获取短信校验码</strong></a>
                                        </div> -->
                    <div class="line">
                        <div class="textbox_ui">
                            <input placeholder="密码" id="password" name="password" autocomplete="off" type="password">
                            <div class="focus_text">
                                <p class="default">6-16个字符，建议使用字母加数字或符号组合</p>
                              <!--   <div class="safe">
                                    <div class="pw_isstrong clearfix">
                                        <div class="pw_level pw_success" data-class="pw_weak" data-strength="weak">弱</div>
                                        <div class="pw_level pw_success" data-class="pw_normal" data-strength="normal">中</div>
                                        <div class="pw_level pw_success" data-class="pw_strong" data-strength="strong" style="border-right:0">强</div>
                                    </div>
                                </div> -->
                            </div>
                            <i class="valid"></i>
                            <div style="display: none;" class="invalid">
                                <i></i>
                                <div class="msg"></div>
                            </div>
                        </div>
                    </div>
                    <div class="line">
                        <div class="textbox_ui">
                            <input id="password2" placeholder="重复密码" autocomplete="off" type="password">
                            <div class="focus_text">请再次输入密码</div>
                            <i class="valid"></i>
                            <div style="display: none;" class="invalid">
                                <i></i>
                                <div class="msg"></div>
                            </div>
                        </div>
                    </div>
                                        <div class="act" style="margin-left: 0px;">
                        <p>
                            <input class="submit_btn" value="同意协议并注册" name="mobileCommit" style="width: 100%;" type="submit">
                        </p>
                        <p>
                            <a href="http://www.jumei.com/help/user_terms" rel="nofollow" target="_blank" style="color:#ed145b;">《聚美优品用户协议》</a>
                        </p>
                    </div>
                    <br>
                </form>
                <div class="shadow_l"></div>
                <div class="shadow_r"></div>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>

<div id="footer_container" class="footer_white" style="padding-top:5px;background: none;border-top: none;">
    <div class="footer_con" id="footer_copyright">
        <p class="footer_copy_con">
            Copyright © 2010-2015  北京创锐文化传媒有限公司 Jumei.com 保留一切权利。客服热线：400-123-8888 <br>
            京公网安备 11010102001226 号 | <a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow">京ICP证111033号</a> | 食品流通许可证 SP1101051110165515（1-1）
            | <a href="http://p2.jmstatic.com/activity/2013_chuangrui.jpeg" target="_blank" rel="nofollow">营业执照</a>
        </p>
        <p>
            <a href="javascript:void(0)" class="footer_copy_logo logo01" rel="nofollow"></a>
            <a href="https://www.itrust.org.cn/yz/pjwx.asp?wm=1693268180" target="_blank" class="footer_copy_logo logo02" rel="nofollow"></a>
            <a href="javascript:void(0)" class="footer_copy_logo logo03" rel="nofollow"></a>
            <a href="javascript:void(0)" class="footer_copy_logo logo04" rel="nofollow"></a>
            <a href="https://ss.cnnic.cn/verifyseal.dll?sn=e12070911010031011307708&amp;ct=df&amp;pa=453163" target="_blank" class="footer_copy_logo logo05" rel="nofollow"></a>
        </p>

    </div>
</div>
<!--*连续登陆探测 -->

<!--点击流用-->
<script type="text/javascript" charset="utf-8" src="/jumei/Public/Home/register/clk_jumei.js"></script>
<script type="text/javascript" charset="utf-8" src="/jumei/Public/Home/register/Jumei.js"></script>
<script type="text/javascript" src="/jumei/Public/Home/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">

    //声明全局变量检测input的值 是否输入正确
        var CPASS = false;
        var CREPASS = false;
        var CPHONE = false;
        var CODE=false;

        $('#phone').submit(function(){

                var code = $('#verify_code').val();
                var inp=$('#verify_code');
                $.ajax({
                url:'<?php echo U('Home/User/checkVerify');?>',
                data:{code:code},
                type:'post',
                async:false,//设置同步
                success:function(data){
                    
                    //如果用户名不可用
                    if(data==0){
                        var str = "验证码错误，请从新输入";
                        inp.parent().addClass('error_ui');
                        inp.parent().find('.invalid').css('display','block');
                        inp.parent().find('.msg').html(str);
                        $('#change_verify_code').find('img').trigger('click');
                        CODE=false;
                    }else{
                        inp.parent().removeClass('error_ui');
                        inp.parent().find('.invalid').css('display','none');
                        inp.parent().find('.valid').css('display','inline');
                        inp.val();
                        CODE=true;
                       
                    }
                }
            })    

       
            //脚本中触发丧失焦点事件
            $('input').trigger('blur');

            if( CPASS && CREPASS && CPHONE && CODE){
                return true;
                location.href="";
            }

            //阻止默认行为
            return false;
        })

        $('input').focus(function(){
       
            $(this).parent().removeClass('error_ui');
            $(this).parent().find('.invalid').css('display','none');
            $(this).val();
        })

        //用户名丧失焦点事件
        $('#mobile').blur(function(){
            //检测用户名的格式是否ok
            var reg = /^1\d{10}$/;
            //获取用户名的值
            var phone = $(this).val();
            //检测   exec
            var res = reg.test(phone);
            //用户名的格式i错误
            if(!res){
                $(this).parent().addClass('error_ui');
                $(this).parent().find('.invalid').css('display','block'); 
                $(this).parent().find('.msg').html('您输入的手机号码格式有误，需为 11 位数字格式'); 
                CPHONE = false;
                return false;
            }
            var inp = $(this);
            //发送ajax检测用户名是否已经存在
            $.ajax({
                url:'<?php echo U('Home/User/checkup');?>',
                data:{phone:phone},
                type:'post',
                async:false,//设置同步
                success:function(data){
                    //如果用户名不可用
                    if(data==1){
                        var str = "该手机号已经注册";
                        inp.parent().addClass('error_ui');
                        inp.parent().find('.invalid').css('display','block');
                        inp.parent().find('.msg').html(str);
                         CPHONE = false;
               
                    }else{
                        inp.parent().removeClass('error_ui');
                        inp.parent().find('.invalid').css('display','none');
                        inp.parent().find('.valid').css('display','inline');
                        inp.val();
                        CPHONE = true;
                    }
                }
            })
        })
        
        //密码
        $('#password').blur(function(){
            //获取密码的值
            var pass = $(this).val();
            //声明正则
            var reg = /^\S{6,16}$/;
             inp=$(this);
            //检测失败的话
            if(!reg.test(pass)){
                inp.parent().addClass('error_ui');
                inp.parent().find('.invalid').css('display','block');
                inp.parent().find('.msg').html('密码格式不正确');
                CPASS = false;
            }else{
                inp.parent().removeClass('error_ui');
                inp.parent().find('.invalid').css('display','none');
                inp.parent().find('.valid').css('display','inline');

                inp.val();
                CPASS = true;
            }
        })

        // //确认密码
        $('#password2').blur(function(){
            //获取确认密码的值
            var rePass = $(this).val();
            //获取密码的值
            var pass = $('#password').val();
            if(rePass != pass){
                $(this).parent().addClass('error_ui');
                $(this).parent().find('.invalid').css('display','block');
               $(this).parent().find('.msg').html('两次密码不一致');
                CREPASS = false
            }else{
                $(this).parent().removeClass('error_ui');
                $(this).parent().find('.invalid').css('display','none');
                $(this).parent().find('.valid').css('display','inline');
                $(this).val();
                CREPASS = true;
            }
        })


     

    </script>




<iframe id="emar_box_pv" src="/jumei/Public/Home/register/_adw.htm" style="width: 1px; border: 0px none; position: absolute; left: -100px; top: -100px; height: 1px;"></iframe>

</body></html>