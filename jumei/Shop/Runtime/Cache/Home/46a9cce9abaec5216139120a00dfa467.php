<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><script src="/Public/Home/login/h.js" type="text/javascript"></script><script src="/Public/Home/login/dc.js" async="" type="text/javascript"></script><script src="/Public/Home/login/adw.js" async="" type="text/javascript"></script><script src="/Public/Home/login/a.txt"></script><script src="/Public/Home/login/ub.htm"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="qc:admins" content="56207406376255516375">
    <title>登录聚美</title>

<link rel="stylesheet" href="/Public/Home/login/common.css" type="text/css" media="screen" charset="utf-8">
<link rel="stylesheet" href="/Public/Home/login/jumei_sign.css" type="text/css" media="screen" charset="utf-8">
<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>


</head>

<body>  
 
<style>
     .invalid{display:none;}
    .top_nav_hot{ position: absolute;left:81px;top:-4px;}
</style>
<div id="header_container">
    <!--新版的login页面没有头部 -->
    <div id="logo">
        <a href="http://www.jumei.com/" id="home" title="聚美优品" style="background:url(  https://secure2.jmstatic.com/static_passport/dist/20150902_2/images/logo_new_v1.jpg ) no-repeat top left;"> 化妆品品牌排行榜大全网站聚美优品 </a>
        <div class="header_logo_box">
            <a href="http://www.jumei.com/activity_guarantee.html?from=header#bold_consignment" rel="nofollow" class="top_link lightning" target="_blank"></a>
            <a href="http://www.jumei.com/help/two_for_freeshipping?from=header" rel="nofollow" class="top_link gild" target="_blank"></a>
            <a href="http://www.jumei.com/activity_aca.html?from=top" rel="nofollow" class="top_link credit" target="_blank"></a>
        </div>
    </div>
</div>



<link href="/Public/Home/login/login.css" rel="stylesheet">


<div class="sign">
    <div style="height: 499px; margin-bottom: 50px;" class="loginWrap loginWrapVerify">
        <div class="loginBoardWrap">
            <div class="loginImage"></div>
            <div class="loginBord">
                <div class="loginTit">
                    <div class="tosignup">还没有聚  美账号？<a href="<?php echo U('Home/User/register');?>">30秒注册</a></div>
                    <h1><strong>登录聚美</strong></h1>
                </div>
            
                <form  id="login-user-form" method="post" action="<?php echo U('Home/User/loginin');?>">
                  
                    <div class="textbox_ui user">

                        <input placeholder="已验证手机"   name="username" id="username" autofocus="" autocomplete="off" type="text">
                        <div class="focus_text">   请输入登录名，登录名可能是您的手机号、邮箱或用户名</div>
                        <div style="display: none;" class="invalid">
                            <i></i>
                            <div class="msg"></div>
                        </div>
                    </div>
                    <div class="textbox_ui pass">
                        <input placeholder="密码" id="login_password"  name="password" autocomplete="off" type="password">
                        <div class="focus_text">请输入您的密码，您的密码可能为字母、数字或符号的组合</div>
                        <div style="display:none;" class="invalid">
                            <i></i>
                            <div class="msg">您输入的密码错误，请核对后重新输入或<a href="https://passport.jumei.com/i/account/resetreq?signup">找回密码</a></div>
                        </div>
                    </div>
                    <p>
                        <a href="https://passport.jumei.com/i/account/resetreq?=login" class="fr">忘记密码?</a>
                        <!-- <label for="auto_login">
                            <input id="auto_login" checked="checked" type="checkbox">
                            &nbsp;自动登录
                        </label> -->
                    </p>
                    <input class="loginbtn submit_btn" value="登 录" style=" display: block;width: 100%;" type="submit">
                    <div id="errorMsg"></div>
                </form>
                <div class="iconAccout">
                    <div>你也可以使用以下账号登录</div>
                    <p>
                        <a href="https://passport.jumei.com/i/extconnect/?site_name=cb_qq&amp;redirect=" class="a1" title="QQ">QQ</a>
                        <a href="https://passport.jumei.com/i/extconnect/?site_name=alipay&amp;redirect=" class="a2" title="支付宝">支付宝</a>
                        <a href="https://passport.jumei.com/i/extconnect/?site_name=sina_weibo&amp;redirect=" class="a3" title="新浪微博">新浪微博</a>
                        <a href="https://passport.jumei.com/i/extconnect/?referer=360tuan_dh&amp;site_name=site_360&amp;redirect=" class="a4" title="360">360</a>
                        <a href="https://passport.jumei.com/i/extconnect/?site_name=baidu&amp;redirect=" class="a5" title="百度">百度</a>
                        <span>更多<i></i></span>
                    </p>
                    <p class="icon-p" style="display: none;">
                        <a href="https://passport.jumei.com/i/extconnect/?site_name=weixin&amp;redirect=" class="a6" title="微信">微信</a>
                        <a href="https://passport.jumei.com/i/extconnect/?site_name=renren&amp;redirect=" class="a7" title="人人">人人</a>
                        <a href="https://passport.jumei.com/i/extconnect/?site_name=mogujie&amp;redirect=" class="a8" title="蘑菇街">蘑菇街</a>
                        <a href="https://passport.jumei.com/i/extconnect/?site_name=tuan800&amp;redirect=" class="a9" title="团800">团800</a>
                        <a href="https://passport.jumei.com/i/extconnect/?site_name=xunlei&amp;redirect=" class="a10" title="迅雷">迅雷</a>
                    </p>
                </div>
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


 

 <script type="text/javascript">
        
    
        $('input').focus(function(){
            $(this).parent().removeClass('error_ui');
            $(this).parent().find('.invalid').css('display','none');
            $(this).val();
        })
       

        $('#login-user-form').submit(function(){
            var password = $('#login_password').val();
            var username = $('#username').val();
             $.ajax({
                url:"<?php echo U('Home/User/loginin');?>",
                data:{username:username,password:password},
                type:'post',
                async:false,
                success:function(data){
                    
                    if(data){
                       return ture;
                    }else{
                        $('#username').parent().addClass('error_ui');
                        $('#login_password').parent().find('.invalid').css('display','block');
                        $('#login_password').parent().find('.msg').html('您输入的账户或密码有误，请重新输入');
                        $('#login_password').parent().addClass('error_ui');
                        
                    }     
                }
            },'json')
            return false; 
           
           
        })
     
    </script>
</body>
</html>