<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta property="qc:admins" content="56207406376255516375" />
    <title>请尽快付款！-聚美优品</title>
        <link rel="stylesheet" href="/Public/Home/pay/css/jumei_static_jumei.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="/Public/Home/pay/css/jumei_cart_new.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="/Public/Home/pay/css/jumei_lightbox.css" type="text/css" media="screen" charset="utf-8" />
    <script type="text/javascript">
with(window) {
    RM_SITE_MAIN_WEBBASEURL='http://www.jumei.com/';
RM_SITE_MAIN_TOPLEVELDOMAINNAME='jumei.com';
RM_SERVER_TIME=1445691522;
RM_IMGDIR='http://p0.jmstatic.com/templates/jumei/images';
RM_SITE_MAIN_PASSPORTURL='http://passport.jumei.com/';
RM_SITE='bj';
RM_CURRENT_SITE_MAIN_WEBBASEURL='http://bj.jumei.com';
RM_RECOMMEND_GLOBAL_SITE_DOMAIN='www.jumeiglobal.com';
RM_RECOMMEND_MEDIA_SITE_DOMAIN='www.jumei.com';
RM_RECOMMEND_PRODUCT_SITE_DOMAIN='www.jumei.com';
RM_CURRENT_SITE_DOMAIN='cart.jumei.com';
RM_GLOBAL_CART_SITE_DOMAIN='cart.jumeiglobal.com';
RM_JUMEI_CART_SITE_DOMAIN='cart.jumei.com';
RM_CONTROL='Cart';
RM_ACTION='pay';
    RM_CLIENT_TIME = parseInt((new Date()).getTime() / 1000);
            GA_ACCOUNT = "UA-10208510-1";
    }
var screen_wide = document.documentElement.clientWidth > 1200 ? true : false ;
function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
    if(arr=document.cookie.match(reg))
        return (arr[2]);
    else
        return null;
}
RM_UID = getCookie('uid');
RM_NICKNAME = null;
if ( getCookie('nickname') != null ){
    RM_NICKNAME = decodeURIComponent(getCookie('nickname'));
}
var is_semwinner = false;

window._gaq = window._gaq || [];
_gaq.push(['_setAccount', GA_ACCOUNT]);
_gaq.push(['_addOrganic', 'baidu', 'wd']);
_gaq.push(['_addOrganic', 'image.baidu', 'word']);
_gaq.push(['_addOrganic', 'soso', 'w']);
_gaq.push(['_addOrganic', 'vnet', 'kw']);
_gaq.push(['_addOrganic', 'sogou', 'query']);
_gaq.push(['_addOrganic', 'youdao', 'q']);
_gaq.push(['_addIgnoredOrganic', 'jumei.com']);
_gaq.push(['_addIgnoredOrganic', 'www.jumei.com']);
_gaq.push(['_addIgnoredOrganic', 'jumei']);
_gaq.push(['_addIgnoredOrganic', '聚美']);
_gaq.push(['_addIgnoredOrganic', '聚美优品']);
_gaq.push(['_addIgnoredOrganic', 'tuanmei.net']);
_gaq.push(['_addIgnoredOrganic', 'www.tuanmei.net']);
_gaq.push(['_addIgnoredOrganic', 'tuanmei']);
_gaq.push(['_addIgnoredOrganic', '团美']);
_gaq.push(['_addIgnoredRef', 'jumei']);
_gaq.push(['_addIgnoredRef', 'tuanmei']);
_gaq.push(['_setDomainName', '.jumei.com']);
_gaq.push(['_setAllowHash', false]);
_gaq.push(['_trackPageview']);

</script>
<script type="text/javascript" charset="utf-8" src="/Public/Home/pay/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Home/pay/js/jquery.all_plugins_v1.js"></script>
</head>
<body>
<style type="text/css">
.cart_header{
    width: 960px;
    margin: 0 auto;
}
.cart_header_box{
    border-bottom: 2px solid #e5e5e5;
    box-shadow: 0px 1px 2px rgba(0,0,0,0.1);
    padding-bottom: 15px;
}
.cart_header .logo_box{
    float: left;
}
.cart_header .order_path{
    float: right;
    width: 392px;
    height: 50px;
}
.cart_header .order_path_1{
    background: url(/Public/Home/pay/images/order_path.jpg) no-repeat;
    background-position: 0 0;
}
.cart_header .order_path_2{
    background: url(/Public/Home/pay/images/order_path.jpg) no-repeat;
    background-position: 0 -50px;
}
.cart_header .order_path_3{
    background: url(/Public/Home/pay/images/order_path.jpg) no-repeat;
    background-position: 0 -100px;
}
.cart_top{
    position: relative;
    height: 32px;
    line-height: 32px;
    color: #999999;
    width: 960px;
    margin: 0 auto;
}
.cart_top .user_box{
    position: absolute;
    right: 0;
    top: 0;
}
.cart_top .user_box .tips{
    font-style: normal;
    color: #dddddd;
    padding: 0 5px;
}
.cart_top .user_box .out,.cart_top .user_box .query{
    color: #999999;
}
.cart_top .user_box a:hover{text-decoration: none;color: #ed145b;}
</style>

<div style="background: white;">

   <div class="cart_top">
                <div class="user_box" id="JS_user_box">
                    <?php if(session('id') == null): ?><div>
                            聚美优品欢迎您，
                            <a href="<?php echo U('Home/User/login');?>">
                                登录
                            </a>
                            <i class="tips">
                                |
                            </i>
                            <a href="<?php echo U('Home/User/register');?>">
                                免费注册
                            </a>
                        </div>
                    <?php else: ?>
                    <div>欢迎您，<a href="<?php echo U('Home/User/index',array('id'=>session('id'),'cname'=>'order'));?>"><?php echo preg_replace('/^(\d{3})\d{4}(\d{4})$/',"JM$1EPPA$2",$_SESSION['phone']); ?></a>&nbsp;<a class="out" href="<?php echo U('Home/User/loginout');?>">[退出]</a><i class="tips">|</i><a class="query" href="<?php echo U('Home/User/index',array('id'=>session('id'),'cname'=>'order'));?>">订单查询</a></div><?php endif; ?>
                </div>
            </div>


    <div class="cart_header_box">
        <div class="cart_header clearfix">
            <h1 class="logo_box">
                <a href="http://www.jumei.com?from=cart_add" target="_blank" id="home">
                    <img src="/Public/Home/pay/picture/cart_logo.jpg" alt="化妆品团购">
                </a>
            </h1>
            <div class="order_path order_path_3
                                    ">
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
(function () {
    var html = '';
    if (RM_NICKNAME !== null) {
        html = '<div>欢迎您，<a href="'+RM_SITE_MAIN_WEBBASEURL+'/i/order/list">'+RM_NICKNAME+'</a>&nbsp;<a href="'+RM_SITE_MAIN_PASSPORTURL+'i/account/logout" class="out">[退出]</a><i class="tips">|</i><a href="'+RM_SITE_MAIN_WEBBASEURL+'i/order/list" class="query">订单查询</a></div>';
        document.getElementById('JS_user_box').innerHTML = html;
    }
})()
</script>

<div id="container" style="width: auto;"><link rel="stylesheet" href="/Public/Home/pay/css/jumei_cart_new_1.css" type="text/css" media="screen" charset="utf-8">
<style>
    .btn_pink_big{float: left; margin-left: 0}
    .cart_notice p{font-weight: 700; line-height: 16px; padding: 10px 0 5px}
    .time_wrapper{
        font-weight: 400; line-height: 16px; margin: 15px 0 30px 0; height: 16px;width: 275px;overflow: hidden;
        padding: 5px 10px;
        background: #FFEDED;
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
    }
    #tomorrow_timer {
        font-size: 14px;
        color: #666;
    }
    #cart .pay_container .cart_notice h2 {
        font-size: 26px;
        font-family: "Microsoft YaHei","黑体";
        color: #333;
    }
    #cart .pay_container .cart_notice {
        background: #fffae6;
        padding: 30px 40px;
    }
    #cart .pay_container .cart_left {
        float: none;
        width: auto;
    }
    #cart .cart_left {
        width: 890px;
        padding: 0 35px;
        color: #000;
        background: #FFF;
        zoom: 1;
    }
    #cart .cart_left .gateway_list li{
        padding: 0;
    }
    #cart .pay_container .cart_left .option {
        width: auto;
        border: 1px solid #dcdcdc;
        border-bottom: 0;
        border-top: 1px dotted #dcdcdc;
        padding: 25px 40px;
        font-size: 14px;
    }
    #cart .pay_container .cart_left .border_top{
        border-top: 1px solid #dcdcdc;
    }
    .pay_img{
        padding-top: 20px;
        float: right;
        border-left: 1px solid #dcdcdc;
        width: 350px;
        text-align: center;
    }
    .pay_info{
        float: left;
        padding-top: 25px;
        padding-bottom: 25px;
        width: 385px;
    }
    body{
        background: #EEEEEE;
    }
    #header_container{background: #fff}
    .back-to-select {
        font-size: 18px;
        border-top:none !important;
        padding:10px 40px 20px !important;
    }
    .back-to-select a {
        color:black;
        text-decoration: none;
        font-size: 14px;
    }
    .back-to-select a:hover{
        text-decoration: none;
    }
    .back-to-select a:active{
        text-decoration: none;
    }
</style>
<script type="text/javascript">
    function setHeight(){
        if($(window).height() > 748){
            $('#container').height($(window).height() - 253);
        }
    }


</script>

<div id="cart" class="pay">
    <div class="pay_container">
                    <input type="hidden" order_info='{"status":1,"order":{"order_id":"586546925","total_price":"367.00","delivery_fee":"0.00","item_details":[{"order_id":"586546925","deal_hash_id":"","deal_price":"69.00","quantity":"1","product_id":"647334","attribute_selections":"60g","deal_short_name":"u5fa1u6ce5u574au77ffu7269u6ce5u6d46u9f3bu819c60g"},{"order_id":"586546925","deal_hash_id":"d151021p1663546hg","deal_price":"0.00","quantity":"1","product_id":"1663546","attribute_selections":"20ml+20g+1u7247","deal_short_name":"u76f8u5b9cu672cu8349u56dbu500du4f53u9a8cu5957u88c5"},{"order_id":"586546925","deal_hash_id":"","deal_price":"298.00","quantity":"1","product_id":"1805686","attribute_selections":"30ml+150ml+100g","deal_short_name":"u76f8u5b9cu672cu8349u7761u83b2u6ee2u6cfdu4fddu6e7fu7cfbu5217u4e09u4ef6u5957uff08u7761u83b2u4fddu6e7fu7cbeu8403u6cb930ml+u7761u83b2u6ee2u6cfdu4fddu6e7fu6c34150ml+u7761u83b2u6ee2u6cfdu4fddu6e7fu4e73100guff09"}]}}' class="order_info_val"/>
        
        <div class="cart_left">
            <div class="cart_notice">
                <h2>还差最后一步，请尽快付款！</h2>
                <div id="tomorrow_timer" diff="1689" style="margin: 15px 0;">请于<span class="bold"></span>时<span class="bold"></span>分<span class="bold"></span>秒内，在新开的页面完成支付</div>
                
                <p class="pink" style="font-weight: 300; padding: 0">
                    请尽快完成付款，否则团购结束或商品售光后您的交易单将被取消。
                </p>
            </div>
            <div class="option border_top">
                <div class="content">
                    <p>
                        收货信息：哈鲁西&nbsp;&nbsp;-&nbsp;&nbsp;北京市-市辖区-朝阳区 东直门西里，133****7845</p>
                    <p>
                        送货时间：
                        <span>
                                                            工作日/周末/假日均可
                                                    </span>
                    </p>
                </div>
            </div>

            <div class="option clearfix" style="padding-top:0;padding-bottom:0;">
                <div class="pay_info">
                
                
                    <div class="paytype_balance_info">
                                                                                    <br/>
                                                </div>
                        <div class="gateway_list" style="background: none; padding: 0; margin:0">
                            <ul>
                                <li cname="" style="margin-bottom: 0px">
                                    <span class="left">支付方式：</span>
                                    <label class="Bfb_CEB-EXPRESS-CREDIT bg" for="check-Bfb_CEB-EXPRESS-CREDIT"></label>
                                </li>
                            </ul>
                            <div class="clear"></div>
                            <p style="margin-top:20px;">
                                应付金额：<span class="pink" style="font-size: 28px;font-family: Arial">¥<span style="font-size: 28px">367.00</span></span>
                            </p>
                        </div>
                                            
                </div>

                                
                            </div>

                     <div class="option clearfix paytype">
                <form id="order-pay-form" method="post" action="http://pay.jumei.com/gateway/forward"
                     target="_blank"                      sid="s2610126-14456914111394"
                      address_id="87105749"
                      order_ids="586546925"
                      is_balance_payment="0">
                                            <input type="hidden" name="bankno" value="3008" />
                                            <input type="hidden" name="cardtype" value="1" />
                                            <input type="hidden" name="goods_name" value="聚美优品 - 购物车编号 s2610126-14456914111394" />
                                            <input type="hidden" name="jm_paymethod" value="Baifubao" />
                                            <input type="hidden" name="order_create_time" value="1445691411" />
                                            <input type="hidden" name="out_trade_no" value="s2610126-14456914111394" />
                                            <input type="hidden" name="pay_type" value="2" />
                                            <input type="hidden" name="timestamp" value="1445691522" />
                                            <input type="hidden" name="total_fee" value="367.00" />
                                            <input type="hidden" name="user" value="JMCart" />
                                            <input type="hidden" name="sign" value="36fd192d203e82decf680edb1530a56e" />
                                    </form>
                                    <a onclick="$('#order-pay-form').submit();" class="btn_pink_big" style="float:none;">立即付款</a>
                            </div>
                        <div class="back-to-select option">
                        <a href="/i/cart/check/?order_id=s2610126-14456914111394&address_id=87105749"><i>>></i><span>选择其它支付方式</span></a>
            </div>

            <div id="an_trigger" style="border-bottom: 1px solid #dcdcdc;">
                            </div>
        </div>
    </div>
</div>


<!-- Google Code for &#20184;&#27454;&#25104;&#21151;&#39029; Conversion Page -->
<div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/991625942/?label=QxzdCKq5hAIQ1oXs2AM&amp;guid=ON&amp;script=0"/>
</div>
<!-- Google Code for 下单成功 Conversion Page -->
<div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="/Public/Home/pay/picture/9753b9b36c9545359fcff6b723d71997.gif"/>
</div>
<script type="text/javascript">
        
        $(function(){
            var b = (new Date()).getTime(),tomorrow_timer = $('#tomorrow_timer'),spans=tomorrow_timer.find("span");
            var a = Math.abs(tomorrow_timer.attr('diff'))*1000;
            var e = function() {
                var c = (new Date()).getTime();
                var ls = a+b-c;
                if (ls > 0) {
                    var ld = parseInt(ls / 86400000).toString();
                    ld = ld.length > 1 ? ld : '0' + ld;
                    ls = ls % 86400000;
                    var lh = parseInt(ls / 3600000).toString();
                    lh = lh.length > 1 ? lh : '0' + lh;
                    ls = ls % 3600000;

                    var lm = parseInt(ls / 60000).toString();
                    lm = lm.length > 1 ? lm : '0' + lm;

                    var lms = parseInt((ls % 60000) / 100);
                    ls = parseInt(lms / 10);
                    //var tms = lms - ls * 10;

                    ls = ls.toString().length > 1 ? ls : '0' + ls;
                    spans.eq(0).html(lh);spans.eq(1).html(lm);spans.eq(2).html(ls);
                } else {
                    spans.eq(0).html("00");spans.eq(1).html("00");spans.eq(2).html("00");
                    $("#tomorrow_timer").stopTime('timer');
                    $("#tomorrow_timer").css({"visibility":"hidden", "margin":0}).height(20);
                }
            };
            e();
            $("#tomorrow_timer").everyTime(1000, 'timer', e);

            //点击流需要order_id->订单号
            try{
                if (typeof (setCart.pay_order_id) == "function"){
                    var subtype = $('#order-pay-form').attr('order_ids').replace(',', '|');
                    setCart.pay_order_id(subtype, true);
                }
            }catch(e){}
        });
</script>
<script type="text/javascript" src="/Public/Home/pay/js/website.min.js"></script><!--http://f0.jmstatic.com/static_lib/dist/20141111/website.min.js-->
<script type="text/javascript" src="/Public/Home/pay/js/boot.js"></script>
<script>
    var ordersElements = $('.order_info_val');
    var orders = [];
    var batch_trade_number = 's2610126-14456914111394';
    var weixinURL = '';
    $.each(ordersElements,function(i,item){
        orders.push($(item).attr('order_info'));
    });
    seajs.use("views/pay/index.js", function(index){
        index.init(orders,batch_trade_number,weixinURL);
    });
</script>
</div>
<div id="footer_container">
    <div id="footer_textarea">
        <div class="footer_con" id="footer_copyright">
            <p class="footer_copy_con">
                &copy; 2013 北京创锐文化传媒有限公司 Jumei.com 保留一切权利。客服热线：400-123-8888 <br/>
                京公网安备 11010102001226 | <a href="http://www.miibeian.gov.cn" target="_blank" rel="nofollow">京ICP证111033号</a> | 食品流通许可证 SP1101051110165515（1-1）
                | <a href="http://p2.jmstatic.com/activity/2013_chuangrui.jpeg" target="_blank">营业执照</a>
            </p>
            <p>
                <a href="javascript:void(0)" class="footer_copy_logo logo01"></a>
                <a href="https://www.itrust.org.cn/yz/pjwx.asp?wm=1693268180" target="_blank" class="footer_copy_logo logo02"></a>
                <a href="javascript:void(0)" class="footer_copy_logo logo03"></a>
                <a href="javascript:void(0)" class="footer_copy_logo logo04"></a>
                <a href="https://ss.cnnic.cn/verifyseal.dll?sn=e12070911010031011307708&ct=df&pa=453163" target="_blank" class="footer_copy_logo logo05"></a>
            </p>
            <script>function change_urlknet(eleId){var str= document.getElementById(eleId).href;var str1 =str.substring(0,(str.length-6));str1+=RndNum(6);document.getElementById(eleId).href=str1;}function RndNum(k){var rnd="";for (var i=0;i<k;i++){rnd+=Math.floor(Math.random()*10);}return rnd;}</script>
            <script type="text/javascript" charset="utf-8" src="/Public/Home/pay/js/jumei.clickmap_static_jumei.js"></script>
        </div>
    </div>
</div>        <script type="text/javascript" charset="utf-8" src="/Public/Home/pay/js/jumei.core_static_jumei.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Home/pay/js/jumei.ordernew_static_jumei.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Home/pay/js/cart_clk_jumei_static_jumei.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Home/pay/js/jumei.account.js"></script>
    <script type="text/javascript">
$(document).ready(function () {
        Jumei.Core.init();
        Jumei.OrderNew.init();
        cart_clk_jumei.init();
        Jumei.Account.init();
        for(var i in Jumei.Core.afterInitFunctions)
        Jumei.Core.afterInitFunctions[i].call();
});
</script>

<script type="text/javascript">
    //ga
(function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = 'http://s0.jmstatic.com/templates/jumei/js/jquery/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    
})();

    
//baidu tongji
(function() {
    var baidu_tongji = document.createElement('script'); baidu_tongji.type = 'text/javascript';
    baidu_tongji.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'hm.baidu.com/h.js?884477732c15fb2f2416fb892282394b';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(baidu_tongji, s);
})();
</script>



</body>
</html>