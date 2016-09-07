<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta property="qc:admins" content="56207406376255516375" />
    <title>确认订单 - 聚美优品</title>
        <link rel="stylesheet" href="/Public/Home/css/confirmdd/jumei_static_jumei.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="/Public/Home/css/confirmdd/jumei_cart_new.css" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="/Public/Home/css/confirmdd/jumei_lightbox.css" type="text/css" media="screen" charset="utf-8" />
    <!-- <link rel="stylesheet" href="/Public/Home/js/threec/common.css" type="text/css" media="screen" charset="utf-8" /> -->
    <script src="/Public/Home/js/bthree/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/threec/jquery.js"></script>
    <script type="text/javascript" src="/Public/Home/js/threec/area.js"></script>
    <script type="text/javascript" src="/Public/Home/js/threec/location.js"></script>
    <script type="text/javascript">
with(window) {
    RM_SITE_MAIN_WEBBASEURL='localhost';
RM_SITE_MAIN_TOPLEVELDOMAINNAME='jumei.com';
RM_SERVER_TIME=1445239899;
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
RM_ACTION='confirmation';
    RM_CLIENT_TIME = parseInt((new Date()).getTime() / 1000);
            GA_ACCOUNT = "UA-10208510-1";
    }
var screen_wide = document.documentElement.clientWidth > 1200 ? true : false ;

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
<script type="text/javascript" charset="utf-8" src="/Public/Home/js/confirmdd/jquery-1.4.2.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Home/js/confirmdd/jquery.all_plugins_v1.js"></script>
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
    background: url(/Public/Home/images/confirmdd/order_path.jpg) no-repeat;
    background-position: 0 0;
}
.cart_header .order_path_2{
    background: url(/Public/Home/images/confirmdd/order_path.jpg) no-repeat;
    background-position: 0 -50px;
}
.cart_header .order_path_3{
    background: url(/Public/Home/images/confirmdd/order_path.jpg) no-repeat;
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
                    <img src="/Public/Home/picture/cart_logo.jpg" alt="化妆品团购">
                </a>
            </h1>
            <div class="order_path order_path_2
                                    ">
            </div>
        </div>
    </div>

</div>



</div>
</if>
<div id="container" style="width: auto;"><link rel="stylesheet" href="/Public/Home/css/confirmdd/jquery-ui-1.8.5.custom.css" type="text/css" media="screen" charset="utf-8">
<script type="text/javascript" charset="utf-8" src="/Public/Home/js/confirmdd/jquery-ui-1.8.7.custom.min.js"></script>
<script type="text/javascript">
//以后重构可以再定格式
// {address.nameIdNumList} 地址 -> 当前用户认证过的身份列表
window.GLOBAL =  {
    "initData" : {
        address: {
            nameIdNumList: []        },
        order: {
            list: {"retail_global/0/":{"group":"retail_global","shipping_system":{"short_name":"u805au7f8eu4f18u54c1","shipping_system_type":"warehouse"},"item_details":{"702002728_ht151019p1416581t1":{"deal_hash_id":"ht151019p1416581t1","sku_no":"702002728","is_gift":false,"item_category":"retail_global","product_id":"1416581","mall_id":"","attribute":"","size":"0.35ml*30","quantity":1,"item_price":"83.90","user_purchase_limit":1,"category_v3_2":"1","category_v3_4":"350","image_url":"http://p1.jmstatic.com/product/001/416/1416581_std/1416581_100_100.jpg","is_combined":false}},"promo_card_effect_params":"","return_cards":[],"is_pop_cosmetics":false,"delivery_fee":5,"delivery_fee_reduction":5,"order_discount_price":0,"no_promo_card":"","no_red_envelope":"","warehouse_range":""}},
            promotionCards: {"retail_global/0/":{"useableNum":0,"useableCards":[],"maxEffectParams":0,"disableNum":0,"disableCards":[]}},
            redEnvelopes: {"retail_global/0/":{"useableNum":0,"useableCards":[],"maxEffectParams":0,"disableNum":0,"disableCards":[]}},
            promoCardAndRedEnv: {"promoCard":{"retail_global/0/":{"status":true,"msg":""}},"redEnv":{"retail_global/0/":{"status":true,"msg":""}}}        },
        globalUrl: "http://cart.jumei.com",
        allowBackCart: Number("0"),
        webSite: "bj",
        TopLevelDomainName: "jumei.com",
        WebDomainName: "mall.jumei.com",
        isQuFenQiUser: Number( "" ),
        cartSummary: {"total_amount":"83.90","retail_global/0/":{"total_amount":"83.90"}},
        account: {"availableBalance":0},
        server_timestamp: "1445239899",
        hasFresh: ""
    }
}
</script>

<style type="text/css">

    input,select,textarea{vertical-align:middle; *font-size:100%;}
input{ margin:0;outline:none; padding:0;}
input::-ms-clear{display:none;}
.clearfix:after{
     content:".";        
     display:block;        
     height:0;        
     clear:both;        
     visibility:hidden;        

}
.clearfix{*zoom:1}

/* m_zlxg */
.m_zlxg{ width:93px; height:30px; line-height:30px;cursor:pointer;float:left;margin:0 10px 0 0;display:inline;background:url(/Public/Home/images/zlxg2.jpg) no-repeat;}
.m_zlxg p{ width:71px; padding-left:10px; overflow:hidden; line-height:30px; color:#333333; font-size:12px; font-family:"微软雅黑";text-overflow:ellipsis; white-space:nowrap;}
.m_zlxg2{ position:absolute; top:29px; border:1px solid #ded3c1;background:#fff; width:91px; display:none; max-height:224px;-height:224px; overflow-x:hidden; overflow-y:auto;white-space:nowrap;}
.m_zlxg2 li{line-height:28px;white-space:nowrap; padding-left:10px;font-family:"微软雅黑";color:#333333; font-size:12px;}
.m_zlxg2 li:hover{ color:#7a5a21;}


    #cart .cart_left .option p{
        margin-bottom: 0;
    }
    #cboxContent {
        background: none;
        border: none;
        overflow: visible;
    }
    #cboxLoadedContent {
        margin-top: 0;
    }
    #cboxClose {
        width: 23px;
        height: 23px;
        overflow: hidden;
        text-indent: 99em;
        padding: 0;
        margin: 0;
        display: none;
        color: #ED145B;
        top: -12px;
        right: -12px;
        background: url(/Public/Home/images/confirmdd/cart_pop_close.png) no-repeat 0 0 transparent;
        _background:none;
        _filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/Public/Home/images/confirmdd/cart_pop_close.png');
    }
    #cboxClose:hover {
        background: url(/Public/Home/images/confirmdd/cart_pop_close.png) no-repeat 0 0 transparent;
        _background:none;
        _filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='/Public/Home/images/confirmdd/cart_pop_close.png');
    }
    #cart .cart_products input.input_promo_card,#cart .cart_products input.input_red_card{
        color:#999;
        border: 1px solid #ccc;
        height: 22px;
        line-height: 24px;
        padding-left: 5px;
        display: none;
    }
    input.input_promo_card.focus,input.input_red_card.focus{
        color:#000;
    }
    .gateway_list li.type_name{
        color: #959595;
        margin:0;
        padding:0;
    }
    #cart .cart_left .gateway_list li.aplipay_more{
        margin: 0;
        padding:0;
        width:100%;
        clear:both;
    }
    .gateway_list li.aplipay_more a{
        float:right;margin-right:58px;
    }
    #cart #address_selector{
        padding-bottom: 15px;
    }
    #cart .cart_left .option .content .selected .btnEditAddress_new,#cart .cart_left .option .content .selected .btnEditAddress_del{
        display: inline;
    }
    #cart .cart_left .paytype_gateway_after ul.gateway_ul_nobefore{
        border: none;
        width: 868px;
    }
    #cart .cart_left .gateway_list #else_choose_box{
        margin-bottom: 0;
    }
    #cart .cart_products table .sale_tag_con{
        background: #0abede;
        padding: 1px 6px 2px;
        margin-right: 3px;
        color: #fff;
        width:auto;
    }
    #cart .cart_products table .reduce{
        background: #ff6f0f;
    }
    #cart .option_box .express_tit{width: auto}
    .preferDeliveryValue {
        height: 268px;
    }
    .preferDeliveryValue table {
        border: 1px solid #000;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .preferDeliveryValue th {
        border: 1px solid #000;
        text-align: center;
    } 
    .preferDeliveryValue td {
        border: 1px solid #000;
        text-align: center;
    }

    #cart .confirm_pay .disabled{
        border: 1px solid #ccc;
        background: #eee;
        color: #999;
        cursor: default;
    }
    .address_btns_wrap .has_fresh{
        color: #ED145B;
        line-height: 26px;
        margin-left: 10px;
    }

</style>
<script type="text/javascript">
    
    $(function(){

        $('.add_address_btn').click(function(){
            $('#first_add_address_wrap').slideToggle('normal');
        })
    })
</script>
<div id="cart">
    <div class="countdown_time_wrap">
        <span class="click_icon"></span> <strong>请在 <span class="cart_countdown_time">05分00秒</span> 内提交交易，并在下单后<span>30</span>分钟内完成支付。</strong>
        <a href="javascript:void(0);" class="sp_icon">
            <div class="sp_icon_pos">由于商品库存有限，我们只能暂为您最多保存20分钟，<br/>20分钟后购物车将被清空，请尽快结算交易单。<div></div></div>
        </a>
    </div>
   <form action="<?php echo U('Home/Confirm/ins');?>" method="post" id="check_pay_form" autocomplete="off" style="display:inline-block;">
   <input type="hidden" name="formToken" value="Cart_cftk_2610126033139">
<div class="cart_left" style="*overflow: hidden">
    <input type="hidden" name="order_id" value="">
<input type="hidden" name="web_site" value="bj" id="J_WebSite">
<div class="option" id="address_selector">

<div class="title">1 地址选择</div>
    <div class="site_edit site_edit_tip" id="JS_unvalidate_tips" style="display:none;">
        <div class="tips_tit tips_tit_tip">
            <p>温馨提示：海外购交易单需要实名验证身份证信息。您的身份验证未通过，需要在付款后前往“<a href="http://www.jumei.com/i/order/list">我的订单</a>”验证身份证信息！</p>
        </div>
    </div>
<div id="first_add_address_wrap" style="display:none" >
<div class="site_edit">
        <div class="tips_tit">温馨提示：收件人请使用和身份证号对应的真实姓名，否则您购买的商品将无法通过海关检查!</div>
        <div class="clearfix cow_box">
        <div class="fl receiver_name_box">
            <div class="fl lab_box"><label>收件人：<span class="tips">*</span></label></div>
            <div class="fl">
                <input type="text" class="input" autocomplete="off" id="JS_receiver_name" placeholder="不能为昵称、x先生、x小姐等"   name="name" maxlength="20" style="width: 190px;">
                                <a href="javascript:;" class="validate_btn sp_icon" id="JS_validate_btn"></a>
                            </div>
            <div class="fl error_box JS_error_box" style="display:none;"><i class="sp_icon"></i><span class="txt">请填写正确的收货人姓名</span></div>
                        <div class="through_validate" id="JS_through_validate"></div>
                    </div>
        <div class="fl" >
            <div class="fl lab_box"><label>身份证号：<span class="tips">*</span></label></div>
            <div class="fl"><input type="text" class="input" id="JS_china_id_number" name="id_card" placeholder="填写真实身份证号,否则无法通过添加" maxlength="20" style="width: 190px;"></div>
            <div class="fl error_box JS_error_box">
                <a href="javascript:;" class="sp_icon_pos_tips_box"><i class="sp_icon"></i><span class="txt">为什么要身份证</span>
                    <div class="sp_icon_pos_tips">
                        聚美极速免税店商品需清关后入境，根据海关要求，需要您填写您的身份证进行个人物品入境申报。<br/>
                        因为海关会对您的身份信息进行验证，请确保填写正确，否则商品可能无法正常通关。<br/>
                        身份证信息将加密保管，绝不对外泄露。
                        <div class="arrow_up"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="clearfix cow_box">
        <div class="fl lab_box"><label>收货地址：<span class="tips">*</span></label></div>
        <div class="fl clearfix">
            <div class="fl site_menu_box JS_site_menu_box">
                <div id="sjld" style="width:420px;margin:40px auto;position:relative;">
                    <div class="m_zlxg" id="shenfen">
                        <p title="">选择省份</p>
                        <div class="m_zlxg2">
                            <ul></ul>
                        </div>
                    </div>
                    <div class="m_zlxg" id="chengshi">
                        <p title="">选择城市</p>
                        <div class="m_zlxg2">
                            <ul></ul>
                        </div>
                    </div>
                    <div class="m_zlxg" id="quyu">
                        <p title="">选择区域</p>
                        <div class="m_zlxg2">
                            <ul></ul>
                        </div>
                    </div>
                    <input id="sfdq_num" type="hidden" value="" />
                    <input id="csdq_num" type="hidden" value="" />
                    <input id="sfdq_tj" type="hidden" value="" />
                    <input id="csdq_tj" type="hidden" value="" />
                    <input id="qydq_tj" type="hidden" value="" />
                </div>
            </div>
            
           
        </div>



        <div class="fl error_box" id="JS_error_sele_site" style="display:none;"><i class="sp_icon"></i><span class="txt">请填写完整的地址信息</span></div>
        <div class="fl error_box" id="JS_no_cod_tips" style="display:none;"><span class="txt" style="margin-left: 0;">（此地区不支持货到付款）</span></div>
    </div>
    <div class="clearfix cow_box">
        <div class="fl lab_box"><label>详细地址：<span class="tips">*</span></label></div>
        <div class="fl clearfix" style="width: 790px;">
            <div class="fl" id="JS_confirm_show_box"></div>
            <div class="fl clearfix" style="*width:660px;">
                <div class="fl"><input type="text" class="input" maxlength="100" name="address" id="JS_address" placeholder="请填写详细地址" style="width: 320px;"></div>
                <div class="fl error_box JS_error_box" style="display:none;"><i class="sp_icon"></i><span class="txt">请填写详细地址，不少于3个汉字，不能全部是数字/字母</span></div>
            </div>
        </div>
    </div>
    <div class="clearfix cow_box">
        <div class="fl lab_box"><label>手机号码：<span class="tips">*</span></label></div>
        <div class="fl"><input type="text" class="input" id="JS_phone" maxlength="11" name="phone" style="width: 115px;"></div>
        <div class="fl lab_box"><label>或固定电话：</label></div>
        <div class="fl"><input name="quhao" type="text" placeholder="区号" class="input" id="JS_phone_area_new" maxlength="4" style="width: 50px;"></div>
        <div class="fl" style="margin: 0 5px;">-</div>
        <div class="fl"><input name="haom" type="text" class="input" placeholder="电话号码" id="JS_phone_number_new" maxlength="8" style="width: 90px;"></div>
        <div class="fl" style="margin: 0 5px;">-</div>
        <div class="fl"><input name="fenj" type="text" class="input" placeholder="分机" id="JS_phone_ext_new" maxlength="8" style="width: 50px;"></div>
        <div class="fl JS_tips" style="color: #999999;margin-left: 10px;"></div>
        <div class="fl error_box JS_error_box" style="display:none;"><i class="sp_icon"></i><span class="txt">请填写正确的电话号码，手机号码为11位数字</span></div>
    </div>
    <div class="clearfix" style="margin-left: 95px;padding-top: 10px;"><a href="javascript:;" id="JS_new_address_submit_neww" class="submit_btn">确定</a><a href="javascript:;" id="add_cancel" class="cancel_btn">取消</a></div>
</div>
</div>
            
<style type="text/css">
    .editAddressForm{
        position: relative;
        background: #fff;
        display:none;
    }
    
    #cart .cart_left #address_selector .content .option_box{height: 148px;}
    #cart .cart_left #address_selector .content .address_lbl{height: 116px;}
    #cart .cart_left #address_selector .content div.selected .address_lbl{
        background: url(/Public/Home/images/confirmdd/address_bg.png) no-repeat 0px 0;
        height: 118px;
    }
</style>

<div id="default_address_wrap" >

<div class="content" id="address_wrap">
    <?php if(is_array($res)): foreach($res as $key=>$vo): ?><div  class="option_box" selector="old_address"  invalid_structure_code="false">
        <input type="radio" id="address_33745206" value="<?php echo ($vo['id']); ?>" name="id" class="rdoAddress">
        <label for="address_33745206" data_address="<?php echo ($vo['province']); ?>-<?php echo ($vo['city']); ?>-<?php echo ($vo['area']); ?>" class="address_lbl">
                <span class="btnEditAddress_new" title="修改地址" addressid="<?php echo ($vo['id']); ?>">修改</span>
                <span class="btnEditAddress_del" title="删除地址" addressid="<?php echo ($vo['id']); ?>">删除</span><p>
                <span class="addr_name"><?php echo ($vo['name']); ?></span>
                <span class="addr_con"><?php echo ($vo['location_id']); ?>-<?php echo ($vo['location_idd']); ?>-<?php echo ($vo['location_iddd']); ?> <?php echo ($vo['detail']); ?></span>
                <span class="addr_num"><?php echo ($vo['mphone']); ?> </span>
            </p><div class="id_wrap">尚未上传身份证</div><i class="pass_validate_icon JS_pass_validate_icon" style="display:none;">实名</i>        </label>
        <div class="clear"></div>
    </div><?php endforeach; endif; ?> 
    </div>

    <script type="text/javascript">
    $(function(){
        $('.btnEditAddress_new').click(function(){
            var shtml = '<div id="cboxOverlay" style="margin:0 auto; opacity: 0.2; cursor: pointer; display: block;"></div><div id="colorbox" class="" style="z-index:9999999999999; padding-bottom: 50px; display: block; width: 928px; left: 252.5px; height: 428px; top: 190px; opacity: 1; cursor: auto;"><div id="cboxWrapper" style="height: 478px; width: 960px;"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left; width: 910px;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear:left"><div id="cboxContent" style="float: left; width: 910px; height: 428px;"><div id="cboxLoadedContent" style="width: 910px; overflow: auto; height: 428px;"><div class="add_newlight selected_newlight" style="padding-left: 0px; width: auto; display: block;"><div class="cart_pop_tlt">修改地址</div><div class="site_edit"><div class="tips_tit">温馨提示：收件人请使用和身份证号对应的真实姓名，否则您购买的商品将无法通过海关检查!</div><div class="clearfix cow_box"><div class="fl receiver_name_box"><div class="fl lab_box"><label>收件人：<span class="tips">*</span></label></div><div class="fl"><input type="hidden" class="input" name="ownid"><input type="hidden" class="input" name="uid"><input type="text" class="input" autocomplete="off" id="JS_receiver_name" placeholder="不能为昵称、x先生、x小姐等" name="uname" maxlength="20" style="width: 190px;"><a href="javascript:;" class="validate_btn sp_icon" id="JS_validate_btn" style="display: inline;"></a></div><div class="fl error_box JS_error_box" style="display:none;"><i class="sp_icon"></i><span class="txt">请填写正确的收货人姓名</span></div><div class="through_validate" id="JS_through_validate" style="display: none;"><ul><li><a href="javascript:;" class="validate_list clearfix"><span class="name">宋安琪</span><span class="cn_num">2204**********002X</span></a></li></ul></div></div><div class="fl"><div class="fl lab_box"><label>身份证号：<span class="tips">*</span></label></div><div class="fl"><input type="text" class="input" id="JS_china_id_number" name="card" maxlength="20" style="width: 190px;"></div><div class="fl error_box JS_error_box"><a href="javascript:;" class="sp_icon_pos_tips_box"><i class="sp_icon"></i><span class="txt">为什么要身份证</span><div class="sp_icon_pos_tips">聚美极速免税店商品需清关后入境，根据海关要求，需要您填写您的身份证进行个人物品入境申报。<br>因为海关会对您的身份信息进行验证，请确保填写正确，否则商品可能无法正常通关。<br>身份证信息将加密保管，绝不对外泄露。<div class="arrow_up"></div></div></a></div></div></div><div class="clearfix cow_box"><div class="fl lab_box"><label>收货地址：<span class="tips">*</span></label></div><div class="fl clearfix"><div class="fl site_menu_box JS_site_menu_box"><form class="shipping_address" action="" method="post"><div class="district_selector"><select onChange="f(this)" name="province" id="loc_province" class="f-input select_province"></select><select onChange="c(this)" name="city" id="loc_city" class="f-input select_city"></select><select onChange="a(this)" name="area" id="loc_town" class="f-input select_area"></select><input type="hidden" name="location_id" /><input type="hidden" name="location_idd" /><input type="hidden" name="location_iddd" /><input type="hidden" name="sheng" /><input type="hidden" name="shi" /><input type="hidden" name="xian" /></div><div class="site_menu_cont clearfix JS_site_menu_cont" style="display: none;"></div></div><div class="fl site_menu_box JS_site_menu_box" style="margin-right: 0px; display: none;"><div><a href="javascript:;" data-name="street" class="site_menu clearfix JS_site_menu" parentcode="370303"><span class="txt fl JS_site_txt" data="乡镇/街道">乡镇/街道</span><span class="triangle_box fl"><i class="triangle_down"></i></span></a></div><div class="site_menu_cont clearfix JS_site_menu_cont" style="display: none;right: 0;left: auto;"></div></div></div><div class="fl error_box" id="JS_error_sele_site" style="display:none;"><i class="sp_icon"></i><span class="txt">请填写完整的地址信息</span></div><div class="fl error_box" id="JS_no_cod_tips" style="display:none;"><span class="txt" style="margin-left: 0;">（此地区不支持货到付款）</span></div></div><div class="clearfix cow_box"><div class="fl lab_box"><label>详细地址：<span class="tips">*</span></label></div><div class="fl clearfix" style="width: 790px;"><div class="fl" id="JS_confirm_show_box"><span class="confirm_show">山东省</span><span class="confirm_show">淄博市</span><span class="confirm_show">张店区</span></div><div class="fl clearfix" style="*width:660px;"><div class="fl"><input type="text" class="input" maxlength="100" name="detail" id="JS_address" placeholder="请填写详细地址" style="width: 320px;"></div><div class="fl error_box JS_error_box" style="display:none;"><i class="sp_icon"></i><span class="txt">请填写详细地址，不少于3个汉字，不能全部是数字/字母</span></div></div></div></div><div class="clearfix cow_box"><div class="fl lab_box"><label>手机号码：<span class="tips">*</span></label></div><div class="fl"><input type="text" class="input" id="JS_phone" maxlength="11" name="mphone" style="width: 115px;"></div><div class="fl lab_box"><label>或固定电话：</label></div><div class="fl"><input type="text" name="phone_q" placeholder="区号" class="input" id="JS_phone_area_new" maxlength="4" style="width: 50px;"></div><div class="fl" style="margin: 0 5px;">-</div><div class="fl"><input type="text" name="phone_z" class="input" placeholder="电话号码" id="JS_phone_number_new" maxlength="8" style="width: 90px;"></div><div class="fl" style="margin: 0 5px;">-</div><div class="fl"><input type="text" name="phone_h" class="input" placeholder="分机" id="JS_phone_ext_new" maxlength="8" style="width: 50px;"></div><div class="fl JS_tips" style="color: #999999;margin-left: 10px;"></div><div class="fl error_box JS_error_box" style="display:none;"><i class="sp_icon"></i><span class="txt">请填写正确的电话号码，手机号码为11位数字</span></div></div><div class="clearfix" style="margin-left: 95px;padding-top: 10px;"><a href="javascript:void(0);" id="JS_new_address_submit_new" class="submit_btn">确定</a><a href="javascript:void(0);" id="add_cancel" class="cancel_btn">取消</a></div></div></div></div><div id="cboxLoadingOverlay" class="" style="height: 428px; display: none;"></div><div id="cboxLoadingGraphic" class="" style="height: 428px; display: none;"></div><div id="cboxTitle" class="" style="display: block;"></div><div id="cboxCurrent" class="" style="display: none;"></div><div id="cboxNext" class="" style="display: none;"></div><div id="cboxPrevious" class="" style="display: none;"></div><div id="cboxSlideshow" class="" style="display: none;"></div><div id="cboxClose" class="" style="display: block;">关闭</div></div><div id="cboxMiddleRight" style="float: left; height: 428px;"></div></div><div style="clear:left"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left; width: 910px;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div>';
            $('#address_selector').after(shtml);

            //获取动态插入CLASS下面的class属性为.btnEditAddress_new的id
            var id = $('.address_lbl_hover').children('.btnEditAddress_new').attr('addressid');

            //发送ajax
            $.ajax({
                url:"<?php echo U('Home/Confirm/firm_ajax');?>",
                type: 'post',
                dataType: 'json',
                async:true,
                data:{id:id},
                success:function(data){

                    //设置修改地址中的值
                    $('input[name=ownid]').val(data['id']);

                    $('input[name=uid]').val(data['uid']);

                    $('input[name=uname]').val(data['name']);

                    $('input[name=card]').val(data['card']);

                    $('input[name=province]').val(data['loc_province']);

                    $('select[name=province]').ready(function(){

                            $('select[name=province]').val(data['province']).attr('selected');

                            $('select[name=province]').trigger('change');

                        });
                        $('select[name=city]').ready(function(){

                            $('select[name=city]').val(data['city']).attr('selected');

                            $('select[name=city]').trigger('change');

                        })

                        $('select[name=area]').ready(function(){

                            $('select[name=area]').val(data['area']).attr('selected');

                            $('select[name=area]').trigger('change');

                        })

                        $('input[name=sheng]').val(data['location_id']);

                        $('input[name=shi]').val(data['location_idd']);

                        $('input[name=xian]').val(data['location_iddd']);


                        $('input[name=detail]').val(data['detail']);

                        $('input[name=mphone]').val(data['mphone']);
                        $('input[name=phone_q]').val(data['phone_q']);
                        $('input[name=phone_z]').val(data['phone_z']);
                        $('input[name=phone_h]').val(data['phone_h']);
                        

                }
            })

            $(document).ready(function() {
            showLocation();            
            })


        })
        
       
        //点击背景关闭当前弹出的修改地址页面
        $('#cboxOverlay').live('click', function() {
            $(this).fadeOut(1000);
            $(this).next().fadeOut(1000);
        });

        //点击右上角关闭按钮关闭当前弹出的修改地址页面
        $('#cboxClose').live('click', function() {
            $(this).parents('#colorbox').fadeOut(1000);
            $(this).parents('#colorbox').prev().fadeOut(1000);
        });

        //更新地址确认按钮事件
        $('#JS_new_address_submit_new').live('click', function() {
            var id = $('input[name=ownid]').val();
            var uid = $('input[name=uid]').val();
            var name = $('input[name=uname]').val();
            var card = $('input[name=card]').val();
            var province = $('select[name=province]').attr('selected','selected').val();
            var city = $('select[name=city]').attr('selected','selected').val();
            var area = $('select[name=area]').attr('selected','selected').val();
            var location_id = $('input[name=sheng]').val();
            var location_idd = $('input[name=shi]').val();
            var location_iddd = $('input[name=xian]').val();
            var detail = $('input[name=detail]').val();
            var mphone = $('input[name=mphone]').val();
            var phone_q = $('input[name=phone_q]').val();
            var phone_z = $('input[name=phone_z]').val();
            var phone_h = $('input[name=phone_h]').val();


            $.ajax({
                url:"<?php echo U('Home/Confirm/update_ajax');?>",
                type:'post',
                dataType:'json',
                async:true,
                data:{id:id,uid:uid,name:name,card:card,province:province,city:city,area:area,location_id:location_id,location_idd:location_idd,location_iddd:location_iddd,detail:detail,mphone:mphone,phone_q:phone_q,phone_z:phone_z,phone_h:phone_h},
                success:function(data){

                    if(data == 1){
                        alert('恭喜您,收货地址更新成功!');
                        location.reload();
                    }else{
                        alert('非法请求!请重新登陆后再试!');
                        "<?php echo U('Home/Index/index');?>";
                    }

                }
            })
        });

        //更新地址取消按钮事件
        $('#add_cancel').live('click',function(){
            $(this).parents('#colorbox').fadeOut(1000);
            $(this).parents('#colorbox').prev().fadeOut(1000);
        })

        $('#JS_new_address_submit_neww').click(function(){
            $('#address_selector').after(shtml).remove();
        })



                $('.address_lbl_hover').live('click', function() {
                    var add_id = $(this).children('.btnEditAddress_new').attr('addressid');
                    $.ajax({
                        url:"<?php echo U('Home/Confirm/insert');?>",
                        type:'post',
                        dataType:'json',
                        async:true,
                        data:{add_id:add_id},
                        success:function(data){
                            $('input[name=name]').val(data['name']);
                            $('input[name=id_card]').val(data['card']);
                            $('input[name=address]').val(data['location_id']+data['location_idd']+data['location_iddd']+data['detail']);
                            $('input[name=phone]').val(data['mphone']);
                            $('input[name=quhao]').val(data['phone_q']);
                            $('input[name=haom]').val(data['phone_z']);
                            $('input[name=fenj]').val(data['phone_h']);

                        }
                    })
                });
                

    })


    function f(obj){
        for (var i=0;i<obj.length;i++){
        
            if (obj.options[i].selected){
                var a = $('input[name=sheng]').val(obj.options[i].text);
                console.log(a);
                // alert(obj.options[i].text);
            }
        }
    }

    function c(obj){
        for (var i=0;i<obj.length;i++){
        
            if (obj.options[i].selected){
                $('input[name=shi]').val(obj.options[i].text);
                // alert(obj.options[i].text);
            }
        }
    }

    function a(obj){
        for (var i=0;i<obj.length;i++){
        
            if (obj.options[i].selected){
                $('input[name=xian]').val(obj.options[i].text);
                // alert(obj.options[i].text);
            }
        }
    }

    </script>

<script src="/Public/Home/js/bthree/address.js"></script>

<div class="address_btns_wrap clearfix">
    <div class="address_more" style="display:none"><a href="javascript:void(0)" class="stri_open"><span></span>展开收货地址</a></div>
    <a class="add_address_btn" href="javascript:void(0)">添加新地址</a>
    </div>

</div>


<script type="text/javascript">
//选择地址结果
    $(function(){
        $('.address_lbl').click(function(){

            if($(this).parent().attr('ajax_check_address')){
                $(this).parent().removeAttr('ajax_check_address');
                $(this).parent().removeClass('selected');
                $(this).parent().siblings().removeClass('selected')

            }else{
                $(this).parent().attr('ajax_check_address','1');
                $(this).parent().addClass('selected');
                $(this).parent().siblings().removeClass('selected')
                $(this).parent().removeAttr('ajax_check_address');

           }

        })
    })

</script>

<script type="text/javascript">
var modify_count = 1;
var address_count = 2;
var global_authed = true;/*global授权*/
var is_need_id = 1 ? true : false;//是否有海淘商品-(需要验证身份证)
var isQuFenQiUser = false; //趣分期用户不限制增、删、改地址
var isSpecialModifyIdCart = is_need_id && modify_count > 9 && !isQuFenQiUser ? true : false; // 具有特殊权限 如果地址没有身份证 不受10次限制

var confirm_site = {province: {}, city: {}, county: {}, street: {}}, //四级地址选中值
    isStreetCode = false; //是否有第四个地址--false:没有,true：有

$(function(){

    /*global授权*/
    if(!global_authed && is_need_id){
        $.colorbox({
            html: $("#accredit_wrap").html(),
            onClosed: function(){
                if(!global_authed){
                    window.location.href = "http://cart.jumei.com/i/cart/show/?confirmation_cartshow&from=flow_conf_list_backtocart_new";
                }
            },
            onComplete: function(){

            },
            transition: 'none'
        });
        $("#cboxContent .accredit_account_info strong").html(window.RM_NICKNAME);
        $("#cboxContent .formbutton").click(function(){
            if($("#j_accredit_accept").attr("checked")){
                $.ajax({
                    url: '/i/confirmation/ajax_auth',
                    type: 'POST',
                    dataType: 'json',
                    success:function(data){
                        if(data.status){
                            global_authed = true;
                            //成功之后提示需要身份证,但是当前用户默认地址没有设置身份证信息,参数表示关闭该弹层后需要显示地址栏
                            Jumei.OrderNew.idCardNeedButNoIdCard(true);
                        }else{
                            alert(data.message);
                        }
                    }
                });
            }else{
                alert("您需要勾选「授权须知」");
            }
            return false;
        });
        $("#cboxContent .accredit_cancel").click(function(){
            if(!global_authed){
                window.location.href = "http://cart.jumei.com/i/cart/show/?confirmation_cartshow&from=flow_conf_list_backtocart_new";
            }
            return false;
        });
    }

    var Wi = [ 7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2, 1 ];    // 加权因子
    var ValideCode = [ 1, 0, 10, 9, 8, 7, 6, 5, 4, 3, 2 ];            // 身份证验证位值.10代表X
    /*检查身份证号码的日期是否是有效日期*/
    function checkBrithBy18IdCard(idCard18){
        var year =  idCard18.substring(6,10);
        var month = idCard18.substring(10,12);
        var day = idCard18.substring(12,14);
        var temp_date = new Date(year,parseFloat(month)-1,parseFloat(day));
        if(temp_date.getFullYear()!=parseFloat(year) || temp_date.getMonth()!=parseFloat(month)-1 || temp_date.getDate()!=parseFloat(day)){
            return false;
        }else{
            return true;
        }
    }
    /**
     * 判断身份证号码为18位时最后的验证位是否正确
     * @param a_idCard 身份证号码数组
     * @return
     */
    function isTrueValidateCodeBy18IdCard(a_idCard) {
        if(!checkBrithBy18IdCard(a_idCard)){return false;}
        a_idCard = a_idCard.split("");
        var sum = 0;
        var check = 0;                       // 声明加权求和变量
        if (a_idCard[17].toLowerCase() == 'x') {
            check = 10;                    // 将最后位为x的验证码替换为10方便后续操作
        } else {
            check = a_idCard[17];
        }
        for ( var i = 0; i < 17; i++) {
            sum += Wi[i] * a_idCard[i];            // 加权求和
        }
        var valCodePosition = sum % 11;                // 得到验证码所位置
        if (check == ValideCode[valCodePosition]) {
            return true;
        } else {
            return false;
        }
    }

    /*
    * 判断收货姓名：姓名用字必须是汉字字符，并且应在2个汉字（含）以上、6个汉字（含）以下，同时不含有“先生”、“女士”、“小姐”、“太太”、“男士”字符
    * */

    var filterKeywords = ["先生","女士","小姐","太太","男士"];
    function checkName(name){
        name = $.trim(name);
        // var reg = /^[\u4E00-\u9FA5]{2,6}$/;
        // if(!reg.test(name)){
        //     return false;
        // }
        /*
        if(name.length<2 || name.length>6){
            return false;
        }*/

        for(var key in filterKeywords){
            if(name.match(filterKeywords[key])){
                return false;
            }
        }
        return true;
    }

    //拼接选择的地址
    var confirmHtml = function () {
        var confirmHtml = '';
        for (var k in confirm_site) {
            if (confirm_site[k] && confirm_site[k].name) {
                confirmHtml += '<span class="confirm_show">'+confirm_site[k].name+'</span>';
            }
        }
        $('#JS_confirm_show_box').html( confirmHtml );
    }

    var validate = {
        data: GLOBAL.initData.address.nameIdNumList,
        queryData: GLOBAL.initData.address.nameIdNumList,
        isListHas: function (value) {
            var list = validate.data;
            for (var i = 0, iLen = list.length; i < iLen; i++) {
                if (list[i].id_num_encrypt == value) {
                    return true;
                }
            }
            return false;
        },
        addData: function (param) {
            if (!validate.isListHas(param.id_num_encrypt)) {
                validate.data.push(param);
            }
        },
        tpl: function (data) {
            var html = '';

            html += '<ul>';
            for (var i = 0, iLen = data.length; i < iLen; i++) {
                html += '<li><a href="javascript:;" class="validate_list clearfix">';
                html += '<span class="name">'+data[i].name+'</span><span class="cn_num">'+data[i].idNum+'</span></a></li>';
            }
            html += '</ul>';

            return html;
        },
        render: function (val) {
            if (isSpecialModifyIdCart) {
                return false;
            }
            var str = val,
                data = validate.inquiry(str),
                $box = $('#JS_through_validate');
            
            $box.html( validate.tpl(data) ).show();

            if (data.length == 0) {
                $box.hide();
            }
        },
        inquiry: function (val) {
            var _data = [],
                str = $.trim(val),
                reg = new RegExp(str),
                count = 1;

            for (var i = 0, iLen = validate.data.length; i < iLen; i++) {
                if ( reg.test( validate.data[i].name ) ) {
                    if (count >= 10) {
                        break;
                    }
                    _data.push( validate.data[i] );
                    count ++;
                }
            }
            this.queryData = _data;
            return _data;
        },
        init: function () {
            validate.render('');
            $('#JS_through_validate').hide();
            $('#JS_validate_btn').show();

            validate._bindEvent();
        },
        _bindEvent: function () {
            var $validate = $('#JS_through_validate');

            //点击查看历史验证纪录
            $('#JS_validate_btn').unbind().click( function () {
                if (!$validate.is(':visible')) {
                    validate.init();
                }

                $validate.slideToggle(100);
            });

            //点击匹配的历史身份证验证纪录
            $('#JS_through_validate').undelegate().delegate('a', 'click', function () {
//                debugger;
                var $this = $(this);
                var $list = $('#JS_through_validate a');
                var index = $list.index( $this );
                var data = validate.queryData[index];
                $('#JS_receiver_name').val(data.name);
                $('#JS_china_id_number').val(data.idNum).attr("deValue", data.idNum).attr('id_num_encrypt', data.id_num_encrypt);

                $('#JS_receiver_name').blur();
            });
        }
    }

    var streetselected = function(){
        if (is_need_id && validate.data.length && !isSpecialModifyIdCart) {
            validate.init();
        }

        $('#JS_receiver_name').blur( function () {
            var $this = $(this),
                val = $.trim( $this.val() );

            //不为空+汉子和字母 特殊字符\·
            if (val == '') {
                $this.addClass('error').parent().siblings('.JS_error_box').show();
                return
            } else {
                $this.removeClass('error').parent().siblings('.JS_error_box').hide();
            }

            //限制10字符
            var arrVal = val.split(''),
                strNum = 0;
            for (var i = 0, iLen = arrVal.length; i < iLen; i++) {
                if (/^[A-Za-z]$/.test( arrVal[i]) ) {
                    strNum += 1;
                } else {
                    strNum += 2;
                }
            }
            if (strNum > 30) {
                $this.addClass('error').parent().siblings('.JS_error_box').show();
            }

        }).keydown( function (e) {
            var code = e.keyCode || window.keyCode,
                name_space_code_num = 110,
                name_space_code_main = 190,
                $this = $(this),
                val = $.trim( $this.val() );

            if (code === name_space_code_num || code === name_space_code_main) {
                $this.val( val + '·' );
                return false;
            }
        }).keyup( function () {
            var $this = $(this),
                val = $.trim( $this.val() );

            validate.render(val);
        });

        $('#JS_address').blur( function () {
            var escapeFull = function(address) {
                address = address || '';
                address = $.trim(address)
                    .replace(/[－—]/g, '-')
                    .replace(/＃/g, '#')
                    .replace(/（/g, '(')
                    .replace(/）/g, ')')
                    .replace(/：/g, ':')
                    .replace(/，/g, ',')
                    .replace(/\s/g, '');
                return address;
            };

            var  checkDetailStreet = function(addressDetail) {
                var realLength = function (str) {
                    return str.replace(/[^\x00-\xff]/g, "^^").length;
                };
                addressDetail = escapeFull(addressDetail);

                var message = null;

                if (addressDetail == null || addressDetail == "") {
                    message = ("请输入详细地址");
                    return message;
                }
                if (realLength(addressDetail) < 6 || realLength(addressDetail) > 140) {
                    message = ("详细地址需为6-140个字符，1个汉字=2个字符");
                    return message;
                }
                if (/^\d+$/.test(addressDetail) || /^\w+$/.test(addressDetail) || !/[\u4e00-\u9fa5a]/.test(addressDetail)) {
                    message = ("详细地址不能为纯数字、字母、符号，必须含中文");
                    return message;
                }
                if (!/^[\d\w\u4e00-\u9fa5\(\)\-\s#:,]+$/.test(addressDetail)) {
                    message = ("详细地址不能为纯数字、字母、符号，必须含中文，符号仅支持-、#、（）、：、,");
                    return message;
                }
                if (/\d{7}/.test(addressDetail)) {
                    message = ("详细地址不能包含连续7位及以上的数字，如需输入手机号，请在手机号输入框内输入");
                    return message;
                }
                return message;

            };

            var $this = $(this),
                val = $.trim($this.val());
            $this.val(escapeFull(val));
            var message = checkDetailStreet(val);
            if(!!message) {
                //说明地址错误
                $this.addClass('error').parent().siblings('.JS_error_box').show().find('span').html(message);
            }else {
                $this.removeClass('error').parent().siblings('.JS_error_box').hide().find('span').html('');
            }
        });

        $('#JS_phone').blur( function () {
            var $this = $(this),
                val = $.trim( $this.val() ),
                $input = $this.parent().parent().find('input[type="text"]');

            if ( val == $this.attr('data') && val != '' ) {
                $this.removeClass('error').parent().siblings('.JS_error_box').hide();
                if (val == $this.attr('data') && $input.hasClass('error')) {
                    $this.parent().siblings('.JS_error_box').show().siblings('.JS_tips').hide();
                    return
                }
                if (!$input.hasClass('error')) return;
            }

            //不为空+长度11全部数字
            if ( val == '' || !/^[\d]{11}$/.test(val) || val.slice(0,1) != '1' ) {
                $this.addClass('error').parent().siblings('.JS_error_box').show().siblings('.JS_tips').hide();
            } else {
                $this.removeClass('error').parent().siblings('.JS_error_box').hide();
            }

            if ($input.hasClass('error')) {
                $this.parent().siblings('.JS_error_box').show().siblings('.JS_tips').hide();
            }
        });

        $('#JS_phone_area_new').blur( function () {
            var $this = $(this),
                val = $.trim( $this.val() ),
                $input = $this.parent().parent().find('input[type="text"]');

            if ( val != '' && ( ( val.slice(0,1) != '0' || !/^[\d]+$/.test(val) ) || val.length <= 2 ) ) {
                $this.addClass('error').parent().siblings('.JS_error_box').show().siblings('.JS_tips').hide();
            } else {
                $this.removeClass('error').parent().siblings('.JS_error_box').hide();
            }

            if ($input.hasClass('error')) {
                $this.parent().siblings('.JS_error_box').show().siblings('.JS_tips').hide();
            }
        });
       
        //座机号
        $('#JS_phone_number_new').blur( function () {
            var $this = $(this),
                val = $.trim( $this.val() ),
                $input = $this.parent().parent().find('input[type="text"]');

            if (val == $this.attr('data')) return

            if (!/^[\d]*$/.test(val) ) {
                $this.addClass('error').parent().siblings('.JS_error_box').show().siblings('.JS_tips').hide();
            } else {
                $this.removeClass('error').parent().siblings('.JS_error_box').hide();
            }

            if ($input.hasClass('error')) {
                $this.parent().siblings('.JS_error_box').show().siblings('.JS_tips').hide();
            }
        });

        //分机号
        $('#JS_phone_ext_new').blur( function () {
            var $this = $(this),
                val = $.trim( $this.val() ),
                $input = $this.parent().parent().find('input[type="text"]');

            if ( !/^[\d]*$/.test(val) ) {
                $this.addClass('error').parent().siblings('.JS_error_box').show().siblings('.JS_tips').hide();
            } else {
                $this.removeClass('error').parent().siblings('.JS_error_box').hide();
            }

            if ($input.hasClass('error')) {
                $this.parent().siblings('.JS_error_box').show().siblings('.JS_tips').hide();
            }
        });


        $('.JS_site_menu').unbind().click( function () {
            var $this = $(this),
                $p_div = $this.parent(),
                $p_p_div = $p_div.parent(),
                $site_txt = $this.find('.JS_site_txt'),
                $cont = $p_div.siblings('.JS_site_menu_cont'),
                _parentCode = $this.attr('parentcode'),
                name = $this.attr('data-name');

            if ( $p_p_div.hasClass('disabled') || _parentCode == '' || !_parentCode) {
                return
            }

            if ( !$cont.is(':visible') ) {
                $('.JS_site_menu_cont').hide();
                $('.JS_site_menu_box').removeClass('active');
            }

            var changeWdith = function () {
                var width = 0;
                $cont.find('.ul_box').each( function () {
                    width += $(this).width();
                });
                $cont.css('width', width + 80).find('ul:last').css('margin-right', '0');
            }

            //排序：将长度较长的单独一列
            var sortCol = function (arr) {
                var arrDataClone = $.extend([], arr),
                    arrData = [];
                //根据地址长度排序
                arrDataClone.sort( function (a, b) {
                    return a.name.length - b.name.length;
                });
                var colLen = Math.floor( arrDataClone.length / 3 ),
                    arrMaxLen = [];
                for (var i = 0; i < colLen; i++) {
                    arrMaxLen.push( arrDataClone.pop() );
                }
                arrMaxLen.sort( function (a, b) {
                    return a.name.length - b.name.length;
                });
                for (var i = 0, iLen = arrDataClone.length, j = 0; i < iLen; i++) {
                    
                    arrData.push(arrDataClone[i]);

                    if (i % 2) {
                        arrData.push(arrMaxLen[j]);
                        j++;
                    }
                }
                return arrData;
            }

            if ($this.attr('change') == 'true') {
                if ( $p_p_div.hasClass('active') ) {
                    $p_p_div.removeClass('active');
                } else {
                    $p_p_div.addClass('active');
                }

                $cont.slideToggle(50, function () {
                    if ( $p_p_div.hasClass('active') ) {
                        changeWdith();
                    }
                });
                return
            }

            //获取地址
            $.post('/Confirmation/GetAreaInfos', {
                parentCode: _parentCode
            }, function (res) {
                var data = res.data, arrData = [];

                if (name == 'street') {
                    if (data == null) {
                        $('.JS_site_menu_box:eq(3)').hide();
                    } else {
                        $('.JS_site_menu_box:eq(3)').show();
                    }
                }

                if (data == null) {
                    $p_p_div.addClass('disabled');
                    $site_txt.html( $site_txt.attr('data') );
                    return
                }

                var htmlObj = {}, html = '', width = 0, txt_cont = $site_txt.html();

                for (var k in data) {
                    arrData.push(data[k]);
                }

                if (name == 'street') {
                    html += '<div style="color: #ed145b;">选择准确的乡镇/街道可提升送货速度；如不清楚，可选择“我不清楚”。</div>';
                    arrData.push({
                        code: '-1',
                        name: '我不清楚'
                    });
                    isStreetCode = true;
                }
                
                if (name == 'county') {
                    arrData = sortCol(arrData);
                }

                //组合成3列
                for (var i = 0, ii = arrData.length; i < ii; i+=3) {
                    for (var j = 0; j < 3; j++) {
                        if (typeof htmlObj[j] == 'undefined') htmlObj[j] = '';
                        if (typeof arrData[i+j] != 'undefined') {
                            htmlObj[j] += '<li><a href="javascript:;" code="'+arrData[i+j].code+'"'
                                +(txt_cont == arrData[i+j].name ? ' class="active"' : '')+'>'+arrData[i+j].name+'</a></li>';
                        }
                    }
                }

                for (var k in htmlObj) {
                    html += '<ul class="fl ul_box">' + htmlObj[k] + '</ul>';
                }

                $cont.html(html);

                if (arrData.length > 3 * 8) {
                    $cont.addClass('site_menu_scroll');
                }

                $cont.slideToggle(0, function () {
                    changeWdith();
                    setTimeout(changeWdith, 50);//这句可以不要，但是有些就是不能自适应，先这样吧

                    $this.attr('change', 'true');
                });

                if ( $p_p_div.hasClass('active') ) {
                    $p_p_div.removeClass('active');
                } else {
                    $p_p_div.addClass('active');
                }
            }, 'json')
        });

        $(document).click( function (e) {
            if ($('#JS_receiver_name:visible').length == 0) return

            var $target = $(e.target);

            if ( $target.closest(".JS_site_menu").length || $target.closest('#JS_validate_btn').length ) {
                return false;
            }

            for (var k in confirm_site) {
                if (!confirm_site[k].name && $('.JS_site_menu[data-name="'+k+'"]').attr('change') == 'true') {
                    $('#JS_error_sele_site').show();break;
                }
            }

            $('.JS_site_menu_cont,#JS_through_validate').slideUp(100);
            $('.JS_site_menu_box').removeClass('active');
        });

        var addressStr = '';
        $('.JS_site_menu_cont').undelegate().delegate('a', 'click', function () {
            var $this = $(this),
                $box = $this.parents('.JS_site_menu_box'),
                $txt = $box.find('.JS_site_txt'),
                $next = $box.next('.JS_site_menu_box'),
                site = $this.html(),
                code = $this.attr('code'),
                key = $box.find('.JS_site_menu').attr('data-name'),
                boxIndex = 0,
                _addressStr = '';

            switch (key) {
                case 'province':
                    boxIndex = 0;break;
                case 'city':
                    boxIndex = 1;break;
                case 'county':
                    boxIndex = 2;break;
                case 'street':
                    boxIndex = 3;break;
            }

            var _initMenu = function (index) {
                var _key = $('.JS_site_menu:eq('+index+')').attr('data-name');
                confirm_site[_key] = {};

                $('.JS_site_menu:eq('+index+')').attr('change', 'false')
                    .find('.JS_site_txt').html( $('.JS_site_txt:eq('+index+')').attr('data') );

                if (index > boxIndex + 1) {
                    $('.JS_site_menu_box:eq('+index+')').addClass('disabled');
                }

                if (_key != 'street') {
                    isStreetCode = false;
                }
            }

            $next.removeClass('disabled').find('.JS_site_menu').attr('parentcode', code);

            if (confirm_site[key].name != site && key != 'street') {
                for (var i = boxIndex; i <= 3; i++) {
                    _initMenu(i);
                }
            }

            $next.find('.JS_site_menu').click();

            confirm_site[key] = {name: site, parent_code: code, code: code};

            for (var k in confirm_site) {
                if (k != 'street') {
                    _addressStr += confirm_site[k].name + '-';
                }
            }
            _addressStr = _addressStr.slice(0, -1);

            confirmHtml();

            $txt.html(site);
            $this.parents('.JS_site_menu_cont').find('a').removeClass('active');
            $this.addClass('active');
            $('#JS_error_sele_site').hide();

            if ( ( key == 'county' || key == 'street' ) &&  addressStr != _addressStr) {
                $.post('/Confirmation/LogisticsInfoAndPaymentInfo', {addressStr: _addressStr}, function (res) {
                    if (res.CodShow != 1) {
                        $('#JS_no_cod_tips').show();
                    } else {
                        $('#JS_no_cod_tips').hide();
                    }
                    addressStr = _addressStr;
                }, 'json')
            } else if (key != 'street') {
                $('#JS_no_cod_tips').hide();
            }
        });

        //身份证自动转化X -> x
        $('#JS_china_id_number').unbind('blur').blur( function () {
            var $this = $(this),
                val = $this.val();
            $this.val( val.replace(/x/g, 'X') );
        });
    };

    var debugIe6 = function () {
        //ie6 奇葩，如果不点。元素错位，
        if (!-[1,] && !window.XMLHttpRequest) {
            $('#JS_receiver_name').click();
        }
    }

    //修改次数超过10次，则删除‘修改’和‘删除’按钮
    var changeCantModifyAddressState = function () {
        if (modify_count < 10 || isQuFenQiUser) return;
        if (is_need_id) {
            isSpecialModifyIdCart = true;
            $(".option_box").each(function(key,option_box){
                option_box = $(option_box);
                var editBtn = option_box.find(".btnEditAddress_new");
                if(option_box.find(".id_wrap span").length && option_box.attr('invalid_structure_code') == 'false')else{
                    if(option_box.attr('invalid_structure_code') == 'false')
                        editBtn.css("right",10);
                }
            });
        } else {
            $('.option_box').each(function () {
                if ($(this).attr('invalid_structure_code') == 'false')
                    $(".btnEditAddress_new", $(this)).hide();
            });
        }

        $('.option_box').each(function () {
            if ($(this).attr('invalid_structure_code') == 'false')
                $(".btnEditAddress_del", $(this)).hide();
        });

    }

    var checkModify10Times = function (target) {
        if (isQuFenQiUser) return false;
        var addressErrorElement = $(target).closest('.option_box');
        var addressError = false;
        if (addressErrorElement.length) {
            addressError = addressErrorElement.attr('invalid_structure_code') == 'true' ||
            addressErrorElement.attr('ajax_check_address') == 0;
        }
        if (modify_count >= 9) {
            if (modify_count == 9) {
                if (!addressError)
                    alert("温馨提示：新增/修改地址每月最多10次，您本月操作已达9次。");
            } else if (isSpecialModifyIdCart) {
                if (!addressError)
                    alert("新增/修改地址已经达到十次，您只能添加身份证信息。");
            } else {
                if (!addressError)
                    alert("每位用户每月只能新增或修改地址10次，您本月已新增或修改10次");
                return true;
            }
        }
    };
    $(".address_more").click(function(){
        var _this = $(this),_a = _this.find("a");
        if(_a.hasClass("stri_open")){
            _a.removeClass("stri_open").addClass("stri_close").html("收起收货地址<span></span>");
            $("#address_selector .option_box:gt(3)").show();
        }else{
            _a.addClass("stri_open").removeClass("stri_close").html("展开收货地址<span></span>");
            $("#address_selector .option_box:gt(3)").hide();
        }
    });

    var addressWarpHtml = $('#first_add_address_wrap').html();
    var getColorboxContent = function(){
        return '<div class="add_newlight selected_newlight" style="padding-left: 0;width:auto;"><div class="cart_pop_tlt">修改地址</div>'+addressWarpHtml+'</div>';
    };

    var addAddressInit = function(wrap){
        streetselected();
        var addrToken = (new Date).getTime();//后端会记录，2次保存后不验证身份证
        wrap.find("#JS_new_address_submit_new").click(function(){
            var _self = $(this);
            // var id =_self.attr("address_id");
            var addForm = wrap;

            if (_self.attr('disabled') == 'true') return;

            var recipient_name = addForm.find('#JS_receiver_name').val(),
                recipient_province = confirm_site.province.name,
                recipient_city = confirm_site.city.name,
                recipient_dist = confirm_site.county.name,
                street_code = confirm_site.street.name,
                recipient_address = addForm.find('#JS_address').val(),
                recipient_hp = addForm.find('#JS_phone').val(),
                recipient_tel_area = addForm.find('#JS_phone_area_new').val(),
                recipient_tel_number = addForm.find('#JS_phone_number_new').val(),
                recipient_tel_ext = addForm.find('#JS_phone_ext_new').val(),
                china_id_number = $.trim(addForm.find('#JS_china_id_number').val()),
                china_id_num_de = addForm.find('#JS_china_id_number').attr("deValue"),
                id_num_encrypt = addForm.find('#JS_china_id_number').attr('id_num_encrypt') || '',
                recipient_structuredCode = (isStreetCode && confirm_site.street.parent_code != '-1') ? 
                    confirm_site.street.parent_code : addForm.find('.JS_site_menu:eq(3)').attr('parentcode');//区域id

            if (recipient_name == null || recipient_name == "") {
                // alert("请输入收货人姓名");
                addForm.find('#JS_receiver_name').blur();
                return false;
            }  else if (
                !recipient_province 
                || !recipient_city 
                || !recipient_dist 
                || !recipient_structuredCode ) {
                addForm.find('#JS_error_sele_site').show();
                return false;
            } else if (recipient_address == null || recipient_address == "") {
                // alert("街道地址不能为空。");
                addForm.find('#JS_address').blur();
                return false;
            } else if (! (recipient_hp)) {
                // alert("电话和手机必须填一个。");
                addForm.find('#JS_phone').blur();
                return false;
            } else if (is_need_id) {
                if(!checkName(recipient_name)){
                    alert('收件人请使用和身份证号对应的真实姓名，否则您购买的商品将无法通过海关检查');
                    return false;
                }else if(!(china_id_num_de && china_id_num_de==china_id_number)){ //默认身份证加* 如果没有修改则不判断身份证号码的正确性
                    if(!china_id_number){
                        alert("请输入您的身份证信息");
                        return false;
                    } else if(china_id_number.length!=18 || !isTrueValidateCodeBy18IdCard(china_id_number)){
                        alert('亲，您输入的身份证可能有误，请重新输入。\n姓名：'+recipient_name+'\n身份证号：'+china_id_number);
                        return false;
                    } else {
                        id_num_encrypt = '';
                    }
                }
            }

            var hasError = false;
            addForm.find('input').each( function () {
                if ($(this).hasClass('error')) {
                    hasError = true;
                    return
                }
            });
            if (hasError) {
                return false
            }

            var param = {
                recipient_name: recipient_name,
                recipient_province: recipient_province,
                recipient_city: recipient_city,
                recipient_dist: recipient_dist,
                street_code: street_code,
                recipient_address: recipient_address,
                recipient_hp: recipient_hp,
                recipient_tel_area:recipient_tel_area,
                recipient_tel_number: recipient_tel_number,
                recipient_tel_ext:recipient_tel_ext,
                recipient_id_num:china_id_number,
                is_need_id: is_need_id,
                recipient_structuredCode: recipient_structuredCode,
                addrToken: addrToken,
                id_num_encrypt: id_num_encrypt
            };
            // 防止多次点击。
            _self.attr("disabled","true").addClass('disabled_btn');
            $.ajax({
                url: '/Home/Confirm/Address',
                type: 'POST',
                dataType: 'json',
                data: param,
                success:function(data){
                    var d = {};
                    if(data.status == 1){
                        d = data.data;
                        var address_id = data.data.address_id;
                        $('#address_selector').find(".option_box").removeClass('selected');

                        var add_html = '<div class="option_box selected" selector="old_address" ' +
                            'ajax_check_address="1"  ' +
                            'invalid_structure_code="false">' +
                            '<input type="radio" id="address_'+address_id+'" value="'+address_id+'" name="address_id" class="rdoAddress" checked="checked">' +
                            '<label for="address_'+ address_id +'" data_address="'+ d.structured_address +'" class="address_lbl">' +
                            '<span><span class="addr_name">'+ data.data.receiver_name +'</span>' +
                            '<span class="addr_con">'+ d.structured_address + ' ' + data.data.address +'</span>' +
                            '<span class="addr_num">'+ data.data.hp +'&nbsp;'+ data.data.phone +'</span></span>' +
                            '<span class="btnEditAddress_new" title="修改地址" addressid="'+ address_id +'">修改</span>' +
                            '<span class="btnEditAddress_del" title="删除地址" addressid="'+ address_id +'">删除</span>';
                        if (d.id_num) {
                            add_html += '<div class="id_wrap"><span>'+d.id_num+'</span></div>';
                        }

                        if (is_need_id) {
                            add_html += '<i class="pass_validate_icon JS_pass_validate_icon"'
                            if (!d.id_num_checked) {
                                add_html += ' style="display:none;"';
                                alert('您的身份证和姓名仍未通过认证，您可先下单付款，之后再「我的订单」上传身份证照片验证身份。');
                            }
                            if (d.id_num_checked) {
                                validate.addData({
                                    name: d.receiver_name,
                                    idNum: d.id_num,
                                    id_num_encrypt: d.id_num_encrypt
                                });
                            }
                            add_html += '>实名</i>';
                        }
                        
                        add_html += '</label></div>';
                        $('#address_wrap').prepend(add_html);

                        $("#cboxClose").click();
                        $('#address_wrap .option_box:eq(0)').click();
                        //$('#address_selector').find(".option_box_new").prev().click();
                        address_count = data.data.count; //同步地址个数
                        modify_count = data.data.modify_count;
                        changeCantModifyAddressState();
                        if(address_count>4){
                            $(".address_more").show();
                            //如果没有展开，那么后面的需要隐藏
                            if($(".address_more").find("a").hasClass("stri_open")){
                                $("#address_selector .option_box:gt(3)").hide();
                            }
                        }
                        //如果没有展开收货地址，第5个地址应该被隐藏
                        if($(".address_more a").hasClass("stri_open")){
                            $('#address_wrap .option_box:eq(4)').hide();
                        }
                        //如果是第一个地址被添加，地址选择区域显示回正常状态
                        if(wrap.attr("id")=="first_add_address_wrap"){
                            wrap.hide();
                            $("#default_address_wrap").show();
                        }
                    }else {
                        alert(data.message);
                    }
                    _self.removeAttr("disabled").removeClass('disabled_btn');
                    Jumei.OrderConfirmation.on_address_changed();

                    /*if($('#address_selector').find('.option_box').length === 10){
                     $('#address_selector').find('.option_box_new').remove();
                     }*/
                }
            });
        });
    };

    $('#address_selector .add_address_btn').click(function(){
        if(address_count>=10 && !isQuFenQiUser){
            alert("抱歉，地址最多只能填写10个，如您需要添加其他地址请先删除其他地址后再添加！地址新增或者修改的次数30天内最多10次。");
            return false;
        }
        if(checkModify10Times($(this)) || isSpecialModifyIdCart){return false;}
        $('#address_table').hide();
        $.colorbox({
            html: getColorboxContent(),
            width: 960,
            onClosed: function(){
                $("#address_selector").find(".selected").find("input").attr("checked", true);
            },
            onComplete: function(){
                debugIe6();
                $(".cart_pop_tlt").html("使用新地址");
            }
        });
        $('.selected_newlight').find('.formbutton').after('<a id="add_cancel" href="#">取消</a>');
        addAddressInit($("#cboxContent"));
        $("#add_cancel").bind("click",function(e){
            e.preventDefault();
            if ( confirm('选择“关闭”将清空您的修改并返回上次选择状态，是否继续？') ){
                $("#cboxClose").click();
                $("#address_selector").find(".selected").find("input").attr("checked", true);
            }

        });

    });
    var changeToZeroAddAddress = function(){
        var _wrap = $("#first_add_address_wrap");

        //避免再次删除了所有地址 变成这种添加地址方式还有上次数据
        _wrap.find("input:text").val("");
        _wrap.find('.JS_site_txt').each( function () {
            var $this = $(this);
            $this.html( $this.attr('data') );
        });
        $('.JS_site_menu_box:last').hide();
        $('.JS_site_menu_box:not(.JS_site_menu_box:first)').addClass('disabled');
        $('#JS_confirm_show_box').html('');

        addAddressInit(_wrap.show());
        $("#default_address_wrap").hide();

        // $('#first_add_address_wrap .tips_tit').hide();//隐藏-有身份提示--只是没有地址情况，新建和修改需要

        debugIe6();
    };

    $('.btnEditAddress_new').live('click',function(){
        var oldAddressNeedEdit = $(this).closest('div.option_box').attr('invalid_structure_code') == 'true' ||
            $(this).closest('div.option_box').attr('ajax_check_address') == 0;

        if(checkModify10Times($(this)) && !oldAddressNeedEdit){
            return false;
        }
        var optionbox = $(this).parents('.option_box');
        var addressId = $(this).attr('addressId');

        var addrToken = (new Date).getTime();//后端会记录，2次保存后不验证身份证

        var header = '修改地址';
        if(oldAddressNeedEdit) {
            if($(this).closest('div.option_box').attr('invalid_structure_code') == 'true'){
                header = "修改地址<span class='f1' style='font-size: 14px;color:#000000;margin-left: 10px;" +
                "'>由于国家行政区域变更，请重新选择正确的收货地址，给您购物带来不便，还请谅解，祝您购物愉快！</span>";
            }else {
                header = "修改地址<span class='f1' style='font-size: 14px;color:#000000;margin-left: 10px;'>"+$(this)
                    .closest('div.option_box').data('address-message')+"</span>";
            }
        }

        $('#address_table').hide();
        $.colorbox({
            html:getColorboxContent(),
            width: 960,
            onComplete: function(){
                $(".cart_pop_tlt").html(header);
                debugIe6();
                $('#colorbox').data('invalid_structure_code', optionbox.attr('invalid_structure_code') == 'true');
                $('.add_newlight').hide().parents('#cboxContent').find('#cboxLoadingOverlay').show();

                ajaxHander();
            }
        });
        var editWrap = $('.add_newlight');
        editWrap.find('.formbutton').after('<a id="add_cancel" href="#">取消</a>');

        streetselected();

        var self = $(this);
        var editForm = $('.add_newlight');
        var receiver_name = editWrap.find("#JS_receiver_name"); //收货人
        var recipient_address = editWrap.find("#JS_address"); //收获地址
        var recipient_hp = editWrap.find("#JS_phone");//手机
        var recipient_tel_area = editWrap.find("#JS_phone_area_new");
        var recipient_tel_number = editWrap.find("#JS_phone_number_new");
        var recipient_tel_ext = editWrap.find("#JS_phone_ext_new");
        var china_id_number_input = editWrap.find('#JS_china_id_number');//身份证

        var ajaxHander = function () {
            $.ajax({
                url: '/Confirmation/GetOneAddress',
                type: 'POST',
                dataType: 'json',
                data: {
                    address_id: addressId
                },
                success:function(data, textStatus, xhr){
                    var status = parseInt(data.status);

                    if(status==1){
                        // 表示成功返回状态
                        var d = data.data.data;
                        // 新地址使用
                        var oldAddressNeedEdit = $('#colorbox').data('invalid_structure_code');

                        receiver_name.val(d.receiver_name);
                        recipient_address.val(d.address);
                        china_id_number_input.attr("deValue",d.id_num||'').val(d.id_num||'');

                        recipient_hp.val(d.hp).attr('data', d.hp);

                        confirm_site.province = d.province_code_info;//省
                        confirm_site.city = oldAddressNeedEdit ? '' : d.city_code_info;//市
                        confirm_site.county = oldAddressNeedEdit ? '' : d.district_code_info;//区
                        confirm_site.street = d.street_code_info || {};//街

                        //i also very depressed, i can write this bad code before;
                        confirm_site.county.code = d.district_code;
                        confirm_site.street.code = d.street_code;

                        if (!d.street_code_info) {
                            $('.JS_site_menu_box:eq(3)').hide();
                        } else {
                            $('.JS_site_menu_box:eq(3)').show();
                            isStreetCode = true;
                        }

                        confirmHtml();
                        editWrap.show().parents('#cboxContent').find('#cboxLoadingOverlay').hide();

                        $('.JS_site_menu_box').each(function () {
                            var $this = $(this),
                                $menu = $this.find('.JS_site_menu'),
                                $txt = $this.find('.JS_site_txt'),
                                key = $menu.attr('data-name'),
                                _parentcode = d.province_code;
                            if (key == 'city') {
                                _parentcode = d.city_code;
                            } else if (key == 'county') {
                                _parentcode = d.district_code;
                            }
                            if (confirm_site[key] && confirm_site[key].name) {
                                $txt.html( confirm_site[key].name );
                                $this.next('.JS_site_menu_box').removeClass('disabled')
                                    .find('.JS_site_menu').attr('parentcode', _parentcode);
                                $this.removeClass('disabled').find('.JS_site_menu').attr('parentcode', confirm_site[key].parent_code);
                            } else {
                                $txt.html( $txt.attr('data') );
                            }
                        });

                        var recipient_tel_number_val = '';

                        if(d.phone.length <= 1){
                            recipient_tel_area.val("");
                            recipient_tel_number.val("");
                            recipient_tel_ext.val("");
                        }else{
                            // 有2个 - 时
                            if (d.phone.indexOf("-") >= 0 && d.phone.indexOf("-") != d.phone.lastIndexOf("-")){
                                recipient_tel_number_val = d.phone.slice(d.phone.indexOf("-")+1, d.phone.lastIndexOf("-"))
                                recipient_tel_area.val(d.phone.indexOf("-")==0 ? "" : d.phone.slice(0, d.phone.indexOf("-")));
                                recipient_tel_ext.val(d.phone.slice(d.phone.lastIndexOf("-")+1 , d.phone.length));
                            }
                            // 只有一个 - 时,无尾号
                            else if(d.phone.indexOf("-") >= 0 && d.phone.indexOf("-") == d.phone.lastIndexOf("-") ){
                                recipient_tel_number_val = d.phone.slice(d.phone.indexOf("-")+1, d.phone.length);
                                recipient_tel_area.val(d.phone.indexOf("-")==0 ? "" : d.phone.slice(0, d.phone.indexOf("-")));
                                recipient_tel_ext.val("");
                            }else{
                                recipient_tel_number_val = d.phone;
                            }
                            recipient_tel_number.val( recipient_tel_number_val ).attr('data', recipient_tel_number_val);
                        }

                    }else{
                        try{
                            alert(data.message);
                        }catch(e){}
                    }
                }
            });
        }


        editWrap.find("#JS_new_address_submit_new").click(function(){
            var _self = $(this);
            var id =_self.attr("id");

            if (_self.attr('disabled') == 'true') return;

            var editForm = $(this).parents('.add_newlight');
            var recipient_name = editForm.find('#JS_receiver_name').val(),
                recipient_province = confirm_site.province.name,
                recipient_city = confirm_site.city.name,
                recipient_dist = confirm_site.county.name,
                street_code = confirm_site.street.name,
                recipient_address = editForm.find('#JS_address').val(),
                recipient_hp = editForm.find('#JS_phone').val(),
                recipient_tel_area = editForm.find('#JS_phone_area_new').val(),
                recipient_tel_number = editForm.find('#JS_phone_number_new').val(),
                recipient_tel_ext = editForm.find('#JS_phone_ext_new').val(),
                china_id_number = $.trim(editForm.find('#JS_china_id_number').val()),
                china_id_num_de = editForm.find('#JS_china_id_number').attr("deValue"),
                id_num_encrypt = editForm.find('#JS_china_id_number').attr('id_num_encrypt') || '',
                recipient_structuredCode = (isStreetCode && confirm_site.street.code != '-1') ? 
                    confirm_site.street.code : editForm.find('.JS_site_menu:eq(3)').attr('parentcode');//区域id

            if (recipient_name == null || recipient_name == "") {
                // alert("请输入收货人姓名");
                editForm.find('#JS_receiver_name').blur();
                return false;
            } else if (!recipient_province 
                || !recipient_city 
                || !recipient_dist 
                || !recipient_structuredCode ) {
                editForm.find('#JS_error_sele_site').show();
                return false;
            } else if (recipient_address == null || recipient_address == "") {
                // alert("街道地址不能为空。");
                editForm.find('#JS_address').blur();
                return false;
            } else if (! (recipient_hp)) {
                // alert("电话和手机必须填一个。");
                editForm.find('#JS_phone').blur();
                return false;
            } else if (is_need_id) {
                if(!checkName(recipient_name)){
                    alert('收件人请使用和身份证号对应的真实姓名，否则您购买的商品将无法通过海关检查');
                    return false;
                }else if(!(china_id_num_de && china_id_num_de==china_id_number)){ //默认身份证加* 如果没有修改则不判断身份证号码的正确性
                    if(!china_id_number){
                        alert("请输入您的身份证信息");
                        return false;
                    } else if(china_id_number.length!=18 || !isTrueValidateCodeBy18IdCard(china_id_number)){
                        alert('亲，您输入的身份证可能有误，请重新输入。\n姓名：'+recipient_name+'\n身份证号：'+china_id_number);
                        return false;
                    } else {
                        id_num_encrypt = '';
                    }
                }
            }

            var hasError = false;
            editForm.find('input').each( function () {
                if ($(this).hasClass('error')) {
                    hasError = true;
                    return
                }
            });
            if (hasError) {
                return false
            }

            var param = {
                recipient_name: recipient_name,
                recipient_province: recipient_province,
                recipient_city: recipient_city,
                recipient_dist: recipient_dist,
                recipient_address: recipient_address,
                recipient_hp: recipient_hp,
                recipient_tel_area:recipient_tel_area,
                recipient_tel_number: recipient_tel_number,
                recipient_tel_ext:recipient_tel_ext,
                recipient_structuredCode: recipient_structuredCode,
                address_id: addressId,
                recipient_id_num:china_id_number,
                is_need_id: is_need_id,
                street_code: street_code,
                addrToken: addrToken,
                id_num_encrypt: id_num_encrypt
            };

            // 防止多次点击。
            _self.attr("disabled","true").addClass('disabled_btn');
            $.ajax({
                url: '/Confirmation/EditAddress',
                type: 'POST',
                dataType: 'json',
                data: param,
                success:function(data){

                    var d = data.data;

                    if(data.status==1){
                        optionbox.attr('invalid_structure_code','false');
                        optionbox.attr('ajax_check_address',1);
                        optionbox.find(".btnEditAddress_new").attr("addressId",data.data.address_id);
                        optionbox.find(".btnEditAddress_del").attr("addressId",data.data.address_id);
                        optionbox.find(".rdoAddress").val(data.data.address_id);

                        var data_address=  recipient_province+'-'+recipient_city+'-'+recipient_dist+
                                (street_code ? '-' + street_code : '')+' '+recipient_address,
                            data_address_obj = optionbox.find(".address_lbl"),
                            full_tel = "";

                        if($.trim(recipient_tel_area)){
                            full_tel += recipient_tel_area;
                        }
                        if($.trim(recipient_tel_number)){
                            full_tel += "-" + recipient_tel_number;
                        }
                        if($.trim(recipient_tel_ext)){
                            full_tel += "-" + recipient_tel_ext;
                        }
                        data_address_obj.attr("data_address",data_address).find('.addr_name').text(recipient_name)
                            .end().find('.addr_con').text(data_address).end()
                            .find('.addr_num').text(data.data.hp+' '+data.data.phone);
                        data_address_obj.attr("data_address",data_address).find('.btnEditAddress_new').attr('addressId',data.data.address_id);
                        data_address_obj.find('.btnEditAddress_del').attr('addressId',data.data.address_id);
                        if (d.id_num) {
                            data_address_obj.find('.id_wrap').html('<span>'+d.id_num+'</span>');
                        }
                        if (is_need_id) {
                            if (d.id_num_checked) {
                                data_address_obj.find('.JS_pass_validate_icon').show();
                                validate.addData({
                                    name: recipient_name,
                                    idNum: d.id_num,
                                    id_num_encrypt: d.id_num_encrypt
                                });
                            } else {
                                data_address_obj.find('.JS_pass_validate_icon').hide();
                                alert('您的身份证和姓名仍未通过认证，您可先下单付款，之后再「我的订单」上传身份证照片验证身份。');
                            }
                        } else {
                            data_address_obj.find('.JS_pass_validate_icon').hide();
                        }
                        $("#cboxClose").click();

                         optionbox.find(".rdoAddress").trigger('click');

                        Jumei.Core.postAdhocNotification(optionbox.find("label .addr_num"), false, "append", {
                            type: "success",
                            message: "修改地址成功"
                        });
                        setTimeout(function(){
                            $(".notification_center").remove();
                        },3000);

                        /*if(data.tag != 'SAME_DATA'){
                            modify_count++;
                        }*/
                        address_count = data.data.count; //同步地址个数
                        modify_count = data.data.modify_count;

                        changeCantModifyAddressState();
                    }else {
                        alert(data.message);
                    };
                    _self.removeAttr("disabled").removeClass('disabled_btn');
                    Jumei.OrderConfirmation.on_address_changed();
                },
                error:function(){
                    alert('网络繁忙，等一下请重新试试？');
                    _self.removeAttr("disabled").removeClass('disabled_btn');
                }
            })
        });

        editWrap.find("#add_cancel").bind("click",function(e){
            e.preventDefault();

            if ( confirm('选择“关闭”将清空您的修改并返回上次选择状态，是否继续？') ){
                $("#cboxClose").click();
            }

        });
        return false;
    });
    $(".btnEditAddress_del").live('click',function(){
        if(confirm("您确认要删除该地址吗？")){
            var _this = $(this);
            $.ajax({
                url: '/i/account/remove_address?address_id='+_this.attr("addressid"),
                type: 'GET',
                dataType: 'json',
                data: {},
                success:function(data){
                    var status = parseInt(data.status);
                    if(status==1 || data.type=='unknow_address'){
                        var _par = _this.parent().parent();
                        var _classStartus = _par.hasClass("selected"),_addressWrap = $("#address_wrap");
                        _par.remove();
                        //如果地址大于4个，删除一个还剩下4个以上，把紧挨的显示出来，如果已经显示了全部收货地址再执行一遍没关系
                        if(address_count>4){
                            //删除后只剩下4个  更多收货地址隐藏
                            if(address_count==5){
                                $(".address_more").hide();
                            }
                            _addressWrap.find(".option_box:eq(3)").show();
                        }
                        address_count = data.count;
                        modify_count = data.modifyCount;
                        //如果当前删除的是被选中的收货地址，重新选一个作为默认地址
                        if(_classStartus && address_count){
                            _addressWrap.find(".option_box:eq(0)").click();
                        }
                        //如果没有了地址，切换到添加地址
                        if(!address_count){
                            changeToZeroAddAddress();
                        }
                        if(address_count<5){
                            $(".address_more").hide();
                        }
                    }else{
                        try{
                            alert(data.message);
                        }catch(e){}
                    }
                }
            });
        }
        return false;
    });

    changeCantModifyAddressState();

    if(address_count==0){
        changeToZeroAddAddress();
    }
});

</script>
</div>
<div class="clear"></div>
</div>
<div class="num_border"></div>
<div class="cart_left">
    <div class="option" id="prefer_delivery_day">
        <div class="title"><!-- if ($item['end_time'] > $time && $time >= $item['start_time']) {?> -->
            2 送货时间 
            <span style="color:#666666;font-size:12px;font-weight:normal;font-family:'宋体';">送货时间仅作参考，快递公司会尽量满足您的要求</span>        </div>
        <div class="content">
                        <div class="option_box selected">
                <input checked id="delivery_day_weekday" name="prefer_delivery_day" type="radio" value="weekday">
                <label for="delivery_day_weekday">仅工作日送货</label>
                <div class="clear"></div>
            </div>
                        <div class="option_box">
                <input id="delivery_day_weekend" name="prefer_delivery_day" type="radio" value="weekend">
                <label for="delivery_day_weekend">仅周末送货</label>
                <div class="clear"></div>
            </div>
                        <div class="option_box">
                <input id="delivery_day_" name="prefer_delivery_day" type="radio" value="delivery_day">

                <input id="gname" name="gname" type="hidden" value="">
                <input id="gid" name="gid" type="hidden" value="">
                <input id="gnum" name="gnum" type="hidden" value="">
                <input id="gprice" name="gprice" type="hidden" value="">
                <input id="totalprices" name="totalprice" type="hidden" value="">
                <input id="shipprices" name="shipprice" type="hidden" value="">
                <label for="delivery_day_">工作日/周末/假日均可</label>
                <div class="clear"></div>
            </div>
                        <div class="clb"></div>
        </div>
        <div style="color:#999;padding:20px 0 30px;clear:both;display: none;">预计发货时间：<span style="color:#000;">预计05月30日(今日)19:00 前发货，北京仓1-2天到达</span></div>

    </div>
</div>
<script type="text/javascript">
            // $("#sjld").sjld("#shenfen","#chengshi","#quyu");

    //选择送货时间
    $(function(){
        $('input[name=prefer_delivery_day]').each(function(){
            $(this).parent().click(function(){
                if($(this).attr('selected')){
                    $(this).removeClass('selected');
                }else{
                    $(this).addClass('selected');
                    $(this).siblings().removeClass('selected');
                }
            })
        })

        //获取订单信息提交到控制器中 进行数据库插入

        //获取用户名 与相对应的商品ID
        var gnames = [];
        var gids = [];

        $('.gnames').children('a').each(function(){

            var name = $(this).text();
            gnames.push(name);
            
            var ggid = $(this).attr('gid');
            gids.push(ggid);
                 
        })

       
        //获取商品数量
        var gnums = [];

        $('.number_box').each(function(){

            var gum = $(this).text();

            gnums.push(gum);

        })

   
        //获取商品小计
        var gprices = [];

        $('.count_price_box').children('span').each(function(){

            var gpr = $(this).html();

            gprices.push(gpr);

        })

       
        //获取订单总价

        var totalprice= 0;
        $('.count_price_box').find('#item-buy-total').each(function(){
            totalprice += Number($(this).html());
            $('#total_amount_product').html(totalprice);
            $('#cart_total').html(totalprice-5);
        })

        $('input[name=totalprice]').val(totalprice);


        //获取运费
        var shipprice = $('.promo_card_amount').html();

        $('input[name=shipprice]').val(shipprice);

        // $.ajax({
        //         url:"<?php echo U('Home/Confirm/ins');?>",
        //         type:'post',
        //         dataType:'json',
        //         async:true,
        //         data: {gname:gname,gid:gid,gunm:gunm,gprice:gprice,totalprice:totalprice,shipprice:shipprice},
        //         success:function(data){

        //         }
        //     })


    })

</script>
<div class="num_border"></div>
<div class="cart_left relative" style="*z-index: 5;">
    <div class="option cart_products">
        <div class="title">
            3 商品清单
        </div>
        
        <div class="cart_products_v2" cart_key="product/1570/">
                            <h2><span><b>聚美优品</b> 发货</span>
                                            <a href="http://cart.jumei.com/i/cart/show/?confirmation_cartshow&amp;from=flow_conf_list_backtocart_new" style="float: right">返回修改购物车</a>
                            </h2>
            <table border="0" cellpadding="1" cellspacing="0" id="cart_products" width="100%">
                <colgroup>
                    <col>
                    <col>
                    <col class="align_right">
                    <col class="align_right">
                </colgroup>
                <tbody><tr>
                    <th width="400" class="text_left padd_left">商品</th>
                    <th width="110">数量</th>
                    <th width="140">单价</th>
                    <th width="140">小计</th>
                </tr>
                <?php if(is_array($goodsinfo)): foreach($goodsinfo as $key=>$vo): ?><tr id="1004664_d151017p3848zc" class="cart_item" deal_hash_id="d151017p3848zc">
                    <td class="name text_left padd_left">
                    <input type="hidden" class="tijiao" name="gid[]" value="<?php echo ($goodsinfo[$key]['id']); ?>">
                    <input type="hidden" class="tijiao" name="num[]" value="<?php echo ($gum[$key]); ?>">
                        <div class="gnames" style="width:320px;position: relative;line-height: 21px">
                        <a href="http://bj.jumei.com/i/deal/d151017p3848zc.html?_new" target="_blank" gid="<?php echo ($vo['gid']); ?>" class="name_hover"><?php echo ($vo['title']); ?><span class="item_note"><?php echo ($vo[kg]); ?></span></a>
                            <div class="pic_hover">
                                <img src="<?php echo ($vo['spic']); ?>" alt="<?php echo ($vo['title']); ?>">
                            </div>
                        </div>
                    </td>
                    <?php $__FOR_START_29897__=0;$__FOR_END_29897__=1;for($i=$__FOR_START_29897__;$i < $__FOR_END_29897__;$i+=1){ ?><td class="number_box"><?php echo ($gum[$key]); ?></td>
                    <td class="price_box">
                        ￥<span id="item-buy-price"><?php echo ($vo['price']); ?></span>
                    </td>
                    <td class="count_price_box bold">
                        ￥<span id="item-buy-total"><?php echo ($vo['price']*$gum[$key]); ?></span>
                    </td><?php } ?>
                </tr><?php endforeach; endif; ?>
                <tr>
                    <td colspan="4" class="count" style="padding:10px 0 10px 30px;">
                                                <div class="content">
                            <div class="option_box">
                                <input id="Express_product/1570/" type="radio" value="Express" class="choose_delivery J_Express" name="logistic_preference[product/1570/]" delivery_fee="5" checked="checked">
                                <label for="Express_product/1570/" id="label_express" class="J_label_express">快递（5元，系统自动判断选择快递, 支持货到付款）</label>
                                <div class="clear"></div>
                            </div>
                            <div class="option_box" style="display: none;">
                                <input id="EMS_product/1570/" type="radio" value="EMS" class="choose_delivery J_EMS" name="logistic_preference[product/1570/]" delivery_fee="15">
                                <label for="EMS_product/1570/">EMS（15元，可能需要较长时间送达，新疆、西藏、宁夏、青海、内蒙古只支持EMS）</label>
                                <div class="clear"></div>
                            </div>
                            <span class="express_num">￥<span class="exp_num J_Final_Delivery">5</span></span>
                                <span class="express_tit">运费：</span>
                        </div>
                                            </td>
                </tr>
                <tr style="">
                    <td colspan="4" class="count" style="padding:10px 0 10px 30px;">
                        <div class="content">
                            <div class="option_box express_wrap">
                                <span class="express_num" id="final_delivery_fee_redunction_notice_product/1570/" delivery_reduce="5">-￥<b class="J_Delivery_reduction">5</b></span>
                                <span class="express_tit"><span>运费减免</span><b class="blue" style="font-size: 12px;font-weight: normal;">（已享受自营非食品类满两件包邮）</b>：</span>
                            </div>
                        </div>
                    </td>
                </tr>
                                                <tr>

                    <td colspan="4" class="count" style="padding:10px 0 10px 30px;">
                        <div class="content">
                            <div class="option_box">
                                <span class="express_num">-￥<b class="promo_card_amount">5.00</b></span>
                                <span class="express_tit">累计满减金额：</span>
                            </div>
                        </div>
                    </td>

                </tr>
                

                <input type="hidden" class="J_Promo_cardno" name="promo_card[product/1570/]" value="">
                <input type="hidden" class="J_Red_cardno" name="red_card[product/1570/]" value="">

                <tr class="order_amount">
                    <td colspan="4" style="padding:0;">
                        <div class="order_amount_container">
                                                        <a class="use_promo_card JS_use_promo_card" id="use_promo_card" href="#"><span class="corn">+</span>使用现金券和红包 </a>
                            <div class="use_promo_card" id="use_promo_card_show" style="float: left;margin-left: 20px;"></div>
                            <div class="promo_card_box" style="display:none">
                                <div class="hongbao_box" style="*z-index: 10">
                                    <div>
                                        <div class="tr_promo_card" style="display:none;">
                                            <span id="promo_card_reduction_notice_product/1570/" class="express_num">- ￥<span class="exp_num promo_card_amount">10</span></span>
                                            <span class="express_tit">现金券抵扣：</span>
                                        </div>
                                        <span class="promo_card_text">使用现金券：</span>
                                                                                
                                                                                            <a href="#" class="choose_promo_card">请选择您的现金券</a><span class="or">或</span><span class="pink direct_input">直接输入券号</span><input type="text" size="25" maxlength="25" class="input_promo_card" value="输入现金券号">
                                                <a class="btn_con_small confirm_promo_card" type="button" cancel="false">使用</a>
                                                                                                                        </div>
                                    <div class="choose_promo_card_box" style="visibility: visible; display: none;">
                                                                                    <p class="no_card">您没有现金券可用</p>
                                                                            </div>
                                </div>
                                                                <div class="hongbao_box" style="*z-index: 5">
                                    <div>
                                        <div class="tr_red_card" style="display:none;">
                                            <span id="promo_red_reduction_notice_product/1570/" class="express_num">- ￥<span class="exp_num promo_red_amount"></span></span>
                                            <span class="express_tit">红包抵扣</span>
                                        </div>
                                        
                                        <span class="promo_red_text">使用红包：</span>
                                                                                <a href="#" class="choose_red_card">请选择您的红包</a><span class="or">或</span><span class="pink direct_input">直接输入券号</span><input type="text" size="25" maxlength="25" class="input_red_card" value="输入红包号">
                                        <a class="btn_con_small confirm_red_card" type="button" cancel="false">使用</a>
                                                                            </div>
                                    <div class="choose_red_card_box" style="visibility: visible; display: none;">
                                                                                    <p class="no_card">您没有红包可用</p>
                                                                            </div>
                                </div>
                                                            </div>
                            
                            <div class="price_count express_num">
                                <div class="price">
                                    ￥<span id="total_amount_product" class="total_amount"> <?php echo ($vo['price']*$gum[$key]); ?></span>
                                </div>
                            </div>
                            <span class="express_tit">本单应付：</span>
                            <div class="clear"></div>
                        </div>
                    </td>
                </tr>

                </tbody></table>
        </div>
        <div class="orders_total_amount">
            应付总额：<span class="total_count">￥<span id="cart_total">245.00</span></span>
        </div>
        <script type="text/javascript">
        $(function(){
            var num= 0;
            $('.count_price_box').find('#item-buy-total').each(function(){
                num += Number($(this).html());
                $('#total_amount_product').html(num);
              
                $('#cart_total').html(num-5);
                $('#cart_total2').html(num-5);
            })
        })
        </script>
        <div class="inv_wrap">
                    <input type="checkbox" id="is_need_invoice" class="is_need_inv" name="is_need_invoice" value="1">
            <label for="is_need_invoice"> 索要发票 </label>
            <div class="inv_info" style="display: none;">
                            <div id="invoice-title">
                 <strong>发票抬头:</strong>&nbsp;&nbsp; 
                 个人&nbsp;&nbsp; <span style="display: none;">[<a class="inv_edit_btn" href="javascript:void(0)">修改</a>]</span>
                </div>
                             <div class="inv_edit_wrap" style="display: none">
                    <strong>发票抬头</strong>&nbsp;&nbsp;
                    <input type="radio" name="invoice_type" checked="true" value="1"> 个人 &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="invoice_type" value="2"> 单位 <input type="text" class="inv_type_name focus_txt" name="invoice_companyname" maxlength="200" value="" disabled="" focustxt="请输入单位名称">&nbsp;&nbsp;<span class="inv_error" style="display: none;">请输入正确的单位名称</span>
                    <br>
                </div>
                <div class="clearfix" style="_position: relative;">
                                        <div class="fl">
                        
                                            </div>
                </div>
            </div>
                </div>
    </div>
</div>

<div class="num_border"></div>

<div class="cart_left cart_left_last">
<div class="option">
<div class="paytype">
<div id="paytype_gateway" class="paytype_gateway_after">

<div id="gateway_list" class="gateway_list" style="_height: 1%">
    <div class="title">4 支付方式</div>
    <div class="adv" data-adid="all_cart_confirmation_paymethod_platform_nulljs" style="width:916px;border: none;padding:0;">
    </div>
    
        <div class="use-gift-card">

    </div>
        <div class="other-pay hide">
        剩余 <span class="jumei-pink">￥83.90</span>
        请选择以下付款方式
    </div>
    <script type="text/javascript">
    $(function(){
        $('.gateway_line').each(function(){
            $(this).click(function(){
                if($(this).attr('class')){
                    $(this).addClass('ul_on');
                    $(this).removeClass('ul_off');
                    $(this).children('input').attr('checked','checked');
                    $(this).siblings().removeClass('ul_on');
                    $(this).siblings().addClass('ul_off');
                }
            })


        })
    })
    </script>
    <div class="gateway_ul_box">
        <ul class="gateway_ul">
<!--             <li class="gateway_line ul_on" id="last_choose_mode">
                <input type="radio" name="gateway" id="choose_before" value="Bfb_CEB-EXPRESS-CREDIT"/>
                <label class="tit" for="choose_before">上次支付方式</label>
                <label class="Bfb_CEB-EXPRESS-CREDIT bg" for="choose_before"></label>
                <label class="tit no_cod"></label>
            </li> -->
            <li class="gateway_line gateway_COD hide">
                <input type="radio" name="gateway" value="COD" id="check-cod"/><label class="tit" for="check-cod">货到付款</label>
                <label class="tit no_cod"></label>
            </li>
            <li class="gateway_line ul_off gateway_bank">
                <input type="radio" id="" name="con"/>
                <label class="tit" for="">支付宝/财付通/百度钱包/微信支付/银联支付</label>
                    <ul class="third_ul clearfix g_ul">
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay" name="gateway" id="check-Alipay">
                            <label class="bg Alipay" for="check-Alipay"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="AlipayQRCode" name="gateway" id="check-AlipayQRCode">
                            <label class="bg AlipayQRCode" for="check-AlipayQRCode"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Tenpay_0" name="gateway" id="check-Tenpay_0">
                            <label class="bg Tenpay_0" for="check-Tenpay_0"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_baifubao" name="gateway" id="check-Bfb_baifubao">
                            <label class="bg Bfb_baifubao" for="check-Bfb_baifubao"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="WeixinQRCodeWeb" name="gateway" id="check-WeixinQRCodeWeb">
                            <label class="bg WeixinQRCodeWeb" for="check-WeixinQRCodeWeb"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Unionpay" name="gateway" id="check-Unionpay">
                            <label class="bg Unionpay" for="check-Unionpay"></label>
                                                </div>
                    </li>
                    </ul>
            </li>
            <li class="gateway_line ul_off ">
                <input type="radio" id="" name="con"/><label class="tit" for="">网上银行</label>
                                    <label class="tit gateway_desc cup_activity_cod gateway_desc_new">
                支持地方银行，需开通网银支付功能                                    </label>
                    <ul class="bank_ul clearfix g_ul">
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay_CCB" name="gateway" id="check-Alipay_CCB">
                            <label class="bg Alipay_CCB" for="check-Alipay_CCB"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay_ICBCB2C" name="gateway" id="check-Alipay_ICBCB2C">
                            <label class="bg Alipay_ICBCB2C" for="check-Alipay_ICBCB2C"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay_BOCB2C" name="gateway" id="check-Alipay_BOCB2C">
                            <label class="bg Alipay_BOCB2C" for="check-Alipay_BOCB2C"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay_ABC" name="gateway" id="check-Alipay_ABC">
                            <label class="bg Alipay_ABC" for="check-Alipay_ABC"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay_CMB" name="gateway" id="check-Alipay_CMB">
                            <label class="bg Alipay_CMB" for="check-Alipay_CMB"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay_COMM" name="gateway" id="check-Alipay_COMM">
                            <label class="bg Alipay_COMM" for="check-Alipay_COMM"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_CEBBANK" name="gateway" id="check-Bfb_CEBBANK">
                            <label class="bg Bfb_CEBBANK" for="check-Bfb_CEBBANK"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay_PSBC-DEBIT" name="gateway" id="check-Alipay_PSBC-DEBIT">
                            <label class="bg Alipay_PSBC-DEBIT" for="check-Alipay_PSBC-DEBIT"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay_CIB" name="gateway" id="check-Alipay_CIB">
                            <label class="bg Alipay_CIB" for="check-Alipay_CIB"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_GDB" name="gateway" id="check-Bfb_GDB">
                            <label class="bg Bfb_GDB" for="check-Bfb_GDB"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay_SPDB" name="gateway" id="check-Alipay_SPDB">
                            <label class="bg Alipay_SPDB" for="check-Alipay_SPDB"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_CMBC" name="gateway" id="check-Bfb_CMBC">
                            <label class="bg Bfb_CMBC" for="check-Bfb_CMBC"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_SPABANK" name="gateway" id="check-Bfb_SPABANK">
                            <label class="bg Bfb_SPABANK" for="check-Bfb_SPABANK"></label>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Alipay_BJBANK" name="gateway" id="check-Alipay_BJBANK">
                            <label class="bg Alipay_BJBANK" for="check-Alipay_BJBANK"></label>
                                                </div>
                    </li>
                    </ul>
            </li>
            <li class="gateway_line ul_off ">
                <input type="radio" id="" name="con"/><label class="tit" for="">快捷支付</label>
                                    <label class="tit gateway_desc cup_activity_cod gateway_desc_new">
                支持信用卡付款，无需开通网银支付功能                                    </label>
                    <ul class="speedy_ul clearfix g_ul">
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_CMB-EXPRESS-CREDIT" name="gateway" id="check-Bfb_CMB-EXPRESS-CREDIT">
                            <label class="bg Bfb_CMB-EXPRESS-CREDIT" for="check-Bfb_CMB-EXPRESS-CREDIT"></label>
                                                    <span>快捷</span>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_CCB-MOTO-CREDIT" name="gateway" id="check-Bfb_CCB-MOTO-CREDIT">
                            <label class="bg Bfb_CCB-MOTO-CREDIT" for="check-Bfb_CCB-MOTO-CREDIT"></label>
                                                    <span>快捷</span>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_BOC-MOTO-CREDIT" name="gateway" id="check-Bfb_BOC-MOTO-CREDIT">
                            <label class="bg Bfb_BOC-MOTO-CREDIT" for="check-Bfb_BOC-MOTO-CREDIT"></label>
                                                    <span>快捷</span>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_ICBC-MOTO-CREDIT" name="gateway" id="check-Bfb_ICBC-MOTO-CREDIT">
                            <label class="bg Bfb_ICBC-MOTO-CREDIT" for="check-Bfb_ICBC-MOTO-CREDIT"></label>
                                                    <span>快捷</span>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_CITIC-EXPRESS-CREDIT" name="gateway" id="check-Bfb_CITIC-EXPRESS-CREDIT">
                            <label class="bg Bfb_CITIC-EXPRESS-CREDIT" for="check-Bfb_CITIC-EXPRESS-CREDIT"></label>
                                                    <span>快捷</span>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_CEB-EXPRESS-CREDIT" name="gateway" id="check-Bfb_CEB-EXPRESS-CREDIT">
                            <label class="bg Bfb_CEB-EXPRESS-CREDIT" for="check-Bfb_CEB-EXPRESS-CREDIT"></label>
                                                    <span>快捷</span>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_SPABANK-MOTO-CREDIT" name="gateway" id="check-Bfb_SPABANK-MOTO-CREDIT">
                            <label class="bg Bfb_SPABANK-MOTO-CREDIT" for="check-Bfb_SPABANK-MOTO-CREDIT"></label>
                                                    <span>快捷</span>
                                                </div>
                    </li>
                            <li>
                        <div class="bd_wrap">
                            <input type="radio" value="Bfb_GDB-EXPRESS-CREDIT" name="gateway" id="check-Bfb_GDB-EXPRESS-CREDIT">
                            <label class="bg Bfb_GDB-EXPRESS-CREDIT" for="check-Bfb_GDB-EXPRESS-CREDIT"></label>
                                                    <span>快捷</span>
                                                </div>
                    </li>
                    </ul>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        var firstlen = $('.aplipay_first').length;
        var secondlen = $('.aplipay_second').length;

        var aplipay_click = function(name,num,ids,str1,str2){
            $('.'+ name +':gt('+ num +')').hide();
            $('.'+ name).last().after('<li class="aplipay_more"><a href="javascript:void(0)" id="'+ ids +'"><span class="stri stri_open"></span>'+ str2 +'</a></li>');
            $('#'+ ids).toggle(function(){
                $('.'+ name).show();
                $(this).html('<span class="stri stri_close"></span>'+ str1);
            },function(){
                $('.'+ name +':gt('+ num +')').hide();
                $(this).html('<span class="stri stri_open"></span>' + str2 );
            });

        };
        if( $('.aplipay_first') && firstlen > 8 ){
            var name = 'aplipay_first';
            var num = 7;
            var ids = 'aplipay_first_open';
            var str1 = '收起网银支付';
            var str2 = '更多网银支付';
            aplipay_click(name,num,ids,str1,str2);
        }
        if( $('.aplipay_second') && secondlen > 4 ){
            var name = 'aplipay_second';
            var num = 3;
            var ids = 'aplipay_second_open';
            var str1 = '收起快捷支付';
            var str2 = '更多快捷支付';
            aplipay_click(name,num,ids,str1,str2);
        }

        /*hover 样式*/
        $('#address_selector .address_lbl').live('mouseover',function(){
            if( !$(this).hasClass('address_lbl_old')){
                $(this).addClass('address_lbl_hover');
            }
            if($(this).hasClass('address_lbl_new')){
                $('.address_lbl_new').css('color','#ed145b');
            }
            //$(this).find('.btnEditAddress_new').show(); //CSS CONTROL
            //$(this).find('.btnEditAddress_del').show();
        }).live('mouseleave',function(){
            $(this).removeClass('address_lbl_hover');
            $('.address_lbl_new').css('color','#999999');
            /*if(!$(this).closest('.option_box').hasClass('selected')){ //CSS CONTROL
                $(this).find('.btnEditAddress_new').hide();
                $(this).find('.btnEditAddress_del').hide();
            }*/
        });


        $('#prefer_delivery_day .option_box').hover(function(){
            if( ! $(this).parent().hasClass('selected') && $(this).attr('disabled') != 'true'  && !$(this).parent().hasClass('weihu') ){
                $(this).addClass('now_hover');
            }
        },function(){
            $(this).removeClass('now_hover');
        });

        //确认订单验证码更换
        var codeImgSrcVal = $('#JS_code_img img').attr('src'),
            codeImgSrc = codeImgSrcVal ? codeImgSrcVal.split('&rich')[0] : '',
            $error_prompt = $('#JS_error_prompt'),
            default_tips = '按右图填写',
            default_error = '验证码输入有误',
            empty_error = '请输入验证码';
        $('#JS_code_img').click( function () {
            $(this).find('img').attr('src', codeImgSrc + '&rich=' + (new Date).getTime());
        });
        //确认订单验证码js长度验证
        $('#JS_code_input').blur( function () {
            var $this = $(this), 
                val = $.trim( $this.val() );
            if (val == '' || val.length == 4) {
                $this.removeClass('error');
                if (val == '') {
                    $error_prompt.html( empty_error );
                }
            } else {
                $this.addClass('error');
                $error_prompt.html( default_error );
            }
        }).focus( function () {
            if (!$(this).hasClass('error')) {
                $error_prompt.html( default_tips );
            }
        }).keyup( function () {
            var $this = $(this),
                val = $.trim($this.val());
            if (val != '' && $this.hasClass('error')) {
                $this.removeClass('error');
                $error_prompt.html( default_tips );
            }
        });
    });


    /*点击'确认订单'的表单验证*/
    function check_pay(){
        var address_valid = check_address();
        $("#check_pay_form #btn_confirm_pay").attr("disabled","true").val("提交中……").css("font-size","14px");
        if(!address_valid || !check_gateway() || !check_promo_card() || !verify_code()){
            $("#check_pay_form #btn_confirm_pay").removeAttr("disabled").val("确认交易").css("font-size","20px");
            return false;
        }

        //确认订单验证码ajax验证
        var $code = $('#JS_code_input'), 
            codeVal = $.trim( $code.val() );
        if ($code.length == 0) {
            check_pay_sub();
            return false;
        }
        $.post('/i/cart/confirmation/ajax_check_order_count', {
            verify_code: codeVal
        }, function (data) {
            if (data.error == '-1') {
                // $('#JS_code_img').click();
                $('#JS_code_img').find('img').attr('src', data.data.src );
                $code.val('').focus();
                $('#JS_error_prompt').html(data.message);
                $('#JS_code_input').addClass('error');
                $("#check_pay_form #btn_confirm_pay").removeAttr("disabled").val("确认交易").css("font-size","20px");
                return false;
            }

            check_pay_sub();

        }, 'json');
    }

    //确认订单验证码js基本判断
    function verify_code () {
        var $code = $('#JS_code_input'),
            codeVal = $.trim( $code.val() );

        if ($code.length == 0) {
            return true;
        }

        if (codeVal == '') {
            $code.addClass('error');
            return false;
        }
        if ($code.hasClass('error')) {
            return false;
        }

        return true;
    }

    //验证成功执行-确认订单
    function check_pay_sub () {
        try{
            if (typeof (setCart.confirmation) == "function") {
                var type_arr = ['last', 'COD', 'bank', 'platform', 'quick', 'balance'],
                    sub_type = $('#use_balance_checkbox').attr("checked") ? type_arr[type_arr.length - 1] : type_arr[$('.ul_on').index()];
                setCart.confirmation(sub_type);
            }
        }catch(e){}
        $("#check_pay_form").submit();
        return false;
    }

    function check_gateway(){
        return gift.check_payment_select();
    }

    function check_promo_card(){
        var input = $('.input_promo_card'), flag = false, curr, val;
        for(var i = 0, len = input.length; i< len; i++){
            val = $.trim(input.eq(i).val());
            if( val !='输入现金券号' && val != '' && input.eq(i).next().attr("cancel")=="false"){
                flag = true;
                curr = input.eq(i);
            }
        }

        if(flag){
            if(confirm("您输入了现金券号码，但是没有确认使用。您确定不使用该现金券，并提交订单吗？")){
                return true;
            }else{
                curr.focus();
                return false;
            }
        }else{
            return true;
        }
    }

    

    function checkObjNull(obj,msg){
        if(!checkNull(obj.value)){
            alert(msg + "不能为空");
            return false;
        }
        return true;
    }

    function checkNull(str) {
        if (null == str || str == "" )  {
            return false;
        }
        else {
            return true;
        }
    }
    function checkSelectValue(select){
        for (var i = 0; i < select.options.length; i++){
            if(select.options[i].value !="" && select.options[i].selected){
                return true;
            }
        }
        return false;
    }

    function checkRadioValue(radios){
        for(var i = 0; i < radios.length; i++){
            if(radios[i].checked){
                return radios[i].value;
            }
        }
        return null;
    }
    function trim(str){
        return str.replace(/(^\s*)|(\s*$)/g, "");
    }

</script>




</div>
</div>
</div>

</div>
<div class="sure_payinfo_wrap">
    <div class="confirm_pay_box">
        <div class="confirm_pay clearfix">
            <div class="confirm_left">
                            </div>
            <div class="confirm_right">
                                <div class="clearfix">
                    <input type="hidden" value="852e6051f6239a61bc9457a2a1e76ce8" name="token" id="JS_token_data" />
                    <input type="hidden" value="from_cart_confirmation" name="from" id="JS_form_data" />
                    <input type="submit" id="btn_confirm_pay" class="btn_pink_big" value="确认交易"/>
                    <div class="price_sum">
                        应付总额：<span class="total_count">￥<span id="cart_total2">83.90</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
    <div class="countdown_time_wrap cuntdow_foot">
    <span class="click_icon"></span> <strong>请在 <span class="cart_countdown_time">05分00秒</span> 内提交交易，并在下单后<span>30</span>分钟内完成支付。</strong>
        <a href="javascript:void(0);" class="sp_icon">
            <div class="sp_icon_pos">由于商品库存有限，我们只能暂为您最多保存20分钟，<br/>20分钟后购物车将被清空，请尽快结算交易单。<div></div></div>
        </a>
    </div>
</div>


<div id="mobile_confirm">
    <div class="header">
        <a class="close" href="#">关闭</a>
        <span class="bold">余额支付安全验证</span>
    </div>
    <div class="step">
        <p id="mobile_step1" style="display: none;"><img src="/Public/Home/picture/cart_step1.jpg" alt=""></p>
        <p id="mobile_step2" style="display: none;"><img src="/Public/Home/picture/cart_step2.jpg" alt="" ></p>
    </div>
    <div class="body">
        <p style="margin:5px 0  10px 20px;">为保证您的余额资金安全，请进行手机验证</p>
        <form id="subscribe_form" action="post" class="mobile_subscribe">
            <div class="mobile_form">
                <p style="margin-left: 36px;">
                    <span class="step1 step2 is_bind">已绑定</span>手机号：
                    <span class="step1 step2 is_bind bold"></span>
                    <input name="mobile" id="mobile" type="text" class="not_bind" maxlength="11"/>
                    <input name="get_confirm_code" id="get_confirm_code" type="button" value="获取校验码" class="get_confirm_code">
                    <p class="step1 grey" style="margin: 0 0 15px 87px;width: 230px;">如原手机无法收到短信校验码，请联系聚美客服400-123-8888</p>
                </p>

                <p class="step2 not_bind grey" style="margin: 0px 0 15px 118px;">请输入正确的11位手机号码</p>
                <p class="is_bind" style="margin:10px 0 15px 87px;">换号了？ <a href="#" class="bind_new_mobile" id="bind_new_mobile">绑定新手机号</a></p>
                <p style="padding-left: 36px;">
                    <span>校验码：</span>
                    <input name="confirm_code" id="confirm_code" class="input-mobile default_value" type="text" maxlength="6" style="color: #000">
                </p>

                <p style="margin-left: 36px;" class="is_bind step1">
                    <span>验证码：</span>
                    <input name="verify_code" id="verify_code" type="text" maxlength="4">
                </p>

                <p style="margin-left: 77px;" class="is_bind step1">
                    <img id="code" style=" margin-left:10px;" >
                    <a id="change_code" href="javascript:void(0)">换一张</a>
                </p>

                <p style="margin-left: 87px;">
                    <input type="button" value="确认" class="submit_subscribe is_bind step1" id="rebindcheck" name='rebindcheck'/>
                    <input type="button" value="提交手机绑定" class="submit_subscribe not_bind" id="bind" name='bind'/>
                    <input type="button" value="绑定手机" class="submit_subscribe step2" id="rebind" name="rebind">
                </p>

                <p class="bind_tip not_bind grey" style="margin: 0 0 15px 15px;">如原手机无法收到短信验证码，请联系聚美客服400-123-8888</p>

                <input type="hidden" id="go_to_success" value="false">
                <input type="hidden" id="cart_confirmation" name="cart_confirmation" value="true">
                <input type="hidden" id="is_confirm_to_clear" value="false">
                <input type="hidden" id="go_to_subscribe" value="false">
                <input type="hidden" id="wait_time" value="60">
                <input type="hidden" id="go_to_rebind" value="false">
            </div>
        </form>
    </div>
</div>
<style type="text/css">
    :focus{
        outline: none;
    }
    .cart_popd_yj {
        display: none;
    }
    .cart_pop_tlt {
        height: 52px;
        padding-left: 22px;
        background: #faf7f8;
        border-bottom: 1px solid #ede9ea;
        font: 18px/52px Microsoft Yahei;
        color: #e31256;
        margin-bottom: 25px;
    }
    .cart_pop_wrap .cart_pop_form {
        padding: 25px 0 0 25px;
    }
    .cart_pop_wrap .cart_pop_form p {
        width: 100%;
        margin-bottom: 14px;
        overflow: hidden;
        _zoom: 1;
    }
    .cart_pop_form p label,
    .cart_pop_form p textarea,
    .cart_pop_form p .cart_popd_text,
    .cart_pop_form p img,
    .cart_pop_form p span {
        float: left;
    }
    .cart_pop_form p textarea,
    .cart_pop_form p .cart_popd_text {
        box-shadow: 2px 2px 3px rgba(81,68,68,.08) inset;
    }
    .cart_pop_form p label {
        width: 66px;
        display: inline-block;
        font-size: 14px;
        color: #231916;
        margin-top: 8px;
    }
    .cart_pop_form p textarea {
        width: 340px;
        height: 130px;
        resize: none;
        padding: 10px;
        border: 1px solid #cfcfcf;
        font: 12px/22px '宋体';
        color: #ccc;
    }
    .cart_pop_form p .cart_popd_text {
        width: 100px;
        height: 34px;
        overflow: hidden;
        padding-left: 4px;
        border: 1px solid #cfcfcf;
        font: 12px/34px '宋体';
        color: #333;
        margin-right: 10px;
    }
    .cart_pop_form p img {
        width: 88px;
        height: 34px;
        border: 1px solid #cfcfcf;
        margin-right: 10px;
    }
    .cart_pop_form p span {
        font: 12px/34px '宋体';
        color: #7f7f7f;
        cursor: pointer;
    }
    .cart_pop_form p span b {
        color: #e7306b;
        font-weight: normal;
    }
    .cart_pop_form p .btn_pink_big {
        width: 107px;
        overflow: hidden;
        float: left;
        margin-left: 0;
    }
    .cart_pop_tip {
        margin-top: 10px;
        margin-left: 89px;
        color:#ed145b;

    }
</style>
<div id="cart_side_nav"><a href="javascript:;"></a></div>

<div class="cart_popd_yj">
    <div style="width:600px;height:480px;" class="cart_pop_wrap">
        <div class="cart_pop_tlt">意见反馈</div>
        <div class="cart_pop_form">
            <form action="">
                <p>
                    <label>您的称呼</label>
                    <input type="text" name="name" class="cart_popd_text cart_popd_name" style="width: 200px"/>
                </p>
                <p>
                    <label>联系方式</label>
                    <input type="text" name="email" class="cart_popd_text cart_popd_email" style="width: 200px"> <label style="width: auto; color: #aaa">请留下您的手机、QQ号或邮箱，方便联系</label>
                </p>
                <p>
                    <label style="height:130px;">提交信息</label>
                    <textarea name="content" id="cart_survey_textarea" note="您对当前页面有何建议，小美洗耳恭听哟:)"></textarea>
                    <input type="hidden" name="name" value="匿名" />
                    <input type="hidden" name="email" value="" />
                </p>
                <p>
                    <label>验证码</label>
                    <input class="cart_popd_text cart_popd_hash" type="text" name="hash_code" size="4" maxlength="4">
                    <img id="uf_code" />
                    <span id="uf_change_code">看不清楚？<b>换一张</b></span>
                </p>
                <p style="padding-left: 65px; width: auto">
                    <input type="submit" class="btn_pink_big" name="commit" value="提 交">
                </p>
            </form>
        </div>
        <p class="cart_pop_tip"></p>
    </div>
</div>
<div id="cart_popd_cjTenpay" class="cart_popd_cj cart_popd_cjTenpay">
    <div style="width:510px;height:380px;">
        <div class="cart_pop_tlt">活动规则</div>
        <div class="cart_pop_form cart_pop_form_Tenpay">
            <p>1. 在聚美优品首次开通财付通快捷支付并支付成功，即享工行储蓄卡等11家银行满10元（不包含代金券）立减5元优惠；</p>
            <p>2. 立减优惠在您进入财付通支付中心后，在开通快捷支付并付款步骤，验证身份和手机信息成功后直接减免，若您并非在订单支付过程中成功绑定银行卡，将无法享受立减优惠；</p>
            <p>3. 同一用户仅可享受一次满减优惠（同一身份证、银行卡、财付通账户、手机号满足任一条件均视为同一用户）。若发生退款，满减优惠的金额将不予退回；</p>
            <p>4. 平安银行、宁波银行暂不支持满减，敬请谅解；</p>
            <p>5. 在法律许可的合法范畴内，本活动最终解释权归财付通与聚美优品所有，财付通客服电话：0755-86013860。</p>
        </div>
    </div>
</div>
<div id="preferDeliveryLayer" class="cart_popd_cj cart_popd_cjTenpay">
    <div style="width:510px;height:420px;">
        <div class="cart_pop_tlt">春节期间发货时间小调整</div>
        <div class="cart_pop_form cart_pop_form_Tenpay preferDeliveryValue">
            亲爱的，春节期间聚美可如常下单，正常配货。但因为快递哥哥们春节要回家休假，故发货时间做如下调整。给您带来不便请谅解，春节快乐哦！            <table><th style="width:170px;">配送区域（省/市）</th><th style="width:140px;">停止配送时间</th><th style="width:140px;">恢复配送时间</th><tr><td 0>北京市五环内</td><td 1>1月29日</td><td 2>2月2日</td></tr><tr><td 0>北京市五环外郊区</td><td 1>1月29日</td><td 2>2月4日</td></tr><tr><td 0>天津市</td><td 1>1月29日</td><td 2>2月4日</td></tr><tr><td 0>河北省</td><td 1>1月29日</td><td 2>2月4日</td></tr><tr><td 0>河南省</td><td 1>1月29日</td><td 2>2月4日</td></tr><tr><td 0>山东省</td><td 1>1月29日</td><td 2>2月2日</td></tr><tr><td 0>山西省</td><td 1>1月29日</td><td 2>2月4日</td></tr><tr><td 0>吉林省</td><td 1>1月29日</td><td 2>2月2日</td></tr><tr><td 0>辽宁省</td><td 1>1月29日</td><td 2>2月4日</td></tr><tr><td 0>内蒙古自治区</td><td 1>1月29日</td><td 2>2月4日</td></tr><tr><td 0>陕西省</td><td 1>1月29日</td><td 2>2月4日</td></tr><tr><td 0>上述区域以外的省份</td><td 1>EMS无休</td><td 2>EMS无休</td></tr></table>        </div>
        <div style="width:100%;text-align:center;">
            <input type="button" class="formbutton" onclick="$('#cboxClose').click();" value="知道啦">
        </div>
    </div>
</div>

<script type="text/javascript">

    $(function(){
        var layerTenpay = $("#cart_popd_cjTenpay").html();
        $('#tenpayDetail').click(function(){
            $.colorbox({html:layerTenpay, title:true,previous:"previous",overlayClose:true});
            return false;
        });

        var layer = $(".cart_popd_yj").html();
        $('#cart_side_nav').click(function(){
            $.colorbox({html:layer, title:true,previous:"previous",overlayClose:true,onComplete:function(){
                var _self = $(this);
                var cart_survey_textarea = $('#cart_survey_textarea'),
                    surveyNote = cart_survey_textarea.attr('note'),
                    cart_pop_tip = $('.cart_pop_tip'),
                    cart_popd_text = $('.cart_popd_hash'),
                    email_text = $('.cart_popd_email'),
                    name_text = $('.cart_popd_name');


                var hide_tip = function(){
                    setTimeout(function(){
                        cart_pop_tip.hide();
                    },1000);
                };


                cart_survey_textarea.val( surveyNote );
                // 填调查内容
                cart_survey_textarea.focus(function(){
                    $(this).css('color','#000');
                    if( $(this).val() == surveyNote){
                        $(this).val('');
                    }
                }).blur(function(){
                        var content = $(this).val();
                        if( content == '' ) {
                            $('#cart_survey_textarea').val(surveyNote);
                            $(this).css('color','#ccc');
                        }
                    });

                // 验证码
                $('#uf_change_code').click(function(){
                    var d = new Date();
                    var src = '/i/cart/hash_code?from=user_feedback&'+d.getTime();
                    $('#uf_code').attr('src',src);
                });

                $('#uf_change_code').click();

                // 提交表单
                $('.cart_pop_form').submit(function(e){
                    e.preventDefault();

                    var content = cart_survey_textarea.val(),
                        hash_code = cart_popd_text.val(),
                        email = email_text.val(),
                        name = name_text.val();

                    if($.trim(name) == ''){
                        cart_pop_tip.text('请填您的称呼。').show();
                        hide_tip();
                        return false;
                    }

                    if($.trim(email) == ''){
                        cart_pop_tip.text('请填写联系方式。').show();
                        hide_tip();
                        return false;
                    }

                    if ($.trim(content) == '' || content == surveyNote ){
                        cart_pop_tip.text('请填写建议内容。').show();
                        hide_tip();
                        return false;
                    }

                    if ($.trim(hash_code) == ''){
                        cart_pop_tip.text('请填写验证码。').show();
                        hide_tip();
                        return false;
                    }

                    $.ajax({
                        url: '/i/feedback/addfeedback',
                        type: 'post',
                        dataType: 'json',
                        data:{
                            feedback_from: 'confirmation',
                            name: name,
                            content: content,
                            verify_code: hash_code,
                            email: email
                        },
                        success:function(data){
                            if(data.error == 'success'){
                                cart_pop_tip.text('提交成功，感谢您的参与！').show();
                                hide_tip();
                                setTimeout(function(){
                                    $('#cboxClose').click();
                                },1000);
                            }else{
                                cart_pop_tip.text(data.message).show();
                                hide_tip();
                                $('#uf_change_code').click();
                            }
                        }
                    });

                    return false;
                });

            }});
        });

        // 弹出2014春节期间送货时间调整详情 chengjinw_28536 2014.1.23
        var preferDelivery = $("#preferDeliveryLayer").html();
        $("#preferDeliveryShow").click(function(){
            $.colorbox({html:preferDelivery, title:true,previous:"previous",overlayClose:true});
            return false;
        });
    });

    //默认的收货地址和支付网关
    var currentPageDefaultValue = {
        address_id: '33745206',
        payment_method: 'alipay',
        prefer_delivery_day: '',
        should_show_cod: '2',
        has_luxury_deal: false
    };

            $("#mobile_confirm").hide();
        $("#cboxOverlay").hide();
        $("#use_balance_checkbox").attr('checked', false).attr("is_mobile_checked","true");
        $("#rebindcheck").show();
     
    allowedAddresses = null;
    province_ids = null;
    city_ids = null;
    county_ids = null;
    currentPageDefaultValue.Cod = new Object();
                        province_ids = [120000];
                            city_ids = [610100,130100,410100];
                            county_ids = [1100000];
                            allowedAddresses = ["北京市","天津市","陕西省-西安市","河北省-石家庄市","河南省-郑州市"];
                //alert message
    var alert_message = false;
        var no_cod_msg = '';
            no_cod_msg = '因您的订单中含有海外购商品，恕不支持货到付款，请您选择在线支付。';
    </script>
<script type="text/javascript" src="/Public/Home/js/confirmdd/sea.min.js"></script><!--js/sea.min.js-->
<script type="text/javascript" src="/Public/Home/js/confirmdd/boot.js"></script>
    <script type="text/javascript">
	$(function () {
		seajs.use('views/confirmation/index.js', function (confir) {
			confir.init(window.GLOBAL.initData)
		});
	});
</script><script type="text/javascript">
$('.name_hover').hover(function(){
    $(this).parent().find('.pic_hover').addClass('pic_hover_now');
},function(){
    $(this).parent().find('.pic_hover').removeClass('pic_hover_now');
});
var info = {"allNotAllow":1,"giftCardBalance":"0.00","giftCardBalanceCanUsed":"0.00","forbiddenProducts":{"702002728_ht151019p1416581t1":{"item_short_name":"u4e3du5f97u59ffu5f39u529bu7cbeu534eu80f6u56cau9762u819c"}},"totalAmount":"83.90","balance":"0.00","balanceCanUsed":"0.00"};
window._selfInfo = info;
var recentPayMethod = 'Bfb_CEB-EXPRESS-CREDIT';
seajs.use('views/confirmation/giftCardFun.js', function (gift) {
    var source = info;
    gift.init({
        source:source,
        onUseMoneyCheckBoxClick:function(){
            //todo 点击checkbox事件
        }
    });
    var html = gift.getElement();
    $('.use-gift-card').html(html);
    gift.updateGiftCardDiv();
    if(recentPayMethod == 'COD') {
        gift.disableAll();
    }
    window.gift = gift;

});
//gift.updateGiftCardDiv();  //实时更新礼品卡的代码
</script>
<script type="text/javascript" src="/Public/Home/js/confirmdd/loader.js" async="true"></script>

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
            <script type="text/javascript" charset="utf-8" src="/Public/Home/js/confirmdd/jumei.clickmap_static_jumei.js"></script>
        </div>
    </div>
</div>        <script type="text/javascript" charset="utf-8" src="/Public/Home/js/confirmdd/jumei.core.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Home/js/confirmdd/jumei.account.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Home/js/confirmdd/jumei.ordernew.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Home/js/confirmdd/jumei.orderconfirmation.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Home/js/confirmdd/jumei.mobilebind.js"></script>
        <script type="text/javascript" charset="utf-8" src="/Public/Home/js/confirmdd/cart_clk_jumei.js"></script>
    <script type="text/javascript">
$(document).ready(function () {
        Jumei.Core.init();
        Jumei.Account.init();
        Jumei.OrderNew.init();
        Jumei.OrderConfirmation.init();
        Jumei.MobileBind.init();
        cart_clk_jumei.init();
        for(var i in Jumei.Core.afterInitFunctions)
        Jumei.Core.afterInitFunctions[i].call();
});
</script>


<script type="text/javascript">
        $(document).ready(function() {
            showLocation();
        });
</script> 
</body>
</html>