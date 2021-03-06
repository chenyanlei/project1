<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="qc:admins" content="56207406376255516375">
        <title>
            购物车 - 聚美优品
        </title>
        <link rel="dns-prefetch" href="http://f0.jmstatic.com/">
        <link rel="dns-prefetch" href="http://f1.jmstatic.com/">
        <link rel="dns-prefetch" href="http://f2.jmstatic.com/">
        <link rel="dns-prefetch" href="http://f3.jmstatic.com/">
        <link rel="dns-prefetch" href="http://f4.jmstatic.com/">
        <link rel="dns-prefetch" href="http://f5.jmstatic.com/">
        <link rel="stylesheet" href="/Public/Home/cart/cart.css">

    </head>
    
    <body>
        <div style="display: none;" id="cboxOverlay">
        </div>
        <div style="padding-bottom: 50px; padding-right: 50px; display: none;"
        class="" id="colorbox">
            <div id="cboxWrapper">
                <div>
                    <div style="float: left;" id="cboxTopLeft">
                    </div>
                    <div style="float: left;" id="cboxTopCenter">
                    </div>
                    <div style="float: left;" id="cboxTopRight">
                    </div>
                </div>
                <div style="clear:left">
                    <div style="float: left;" id="cboxMiddleLeft">
                    </div>
                    <div style="float: left;" id="cboxContent">
                        <div class="" id="cboxLoadedContent" style="width: 0px; height: 0px; overflow: hidden;">
                        </div>
                        <div class="" id="cboxLoadingOverlay">
                        </div>
                        <div class="" id="cboxLoadingGraphic">
                        </div>
                        <div class="" id="cboxTitle">
                        </div>
                        <div class="" id="cboxCurrent">
                        </div>
                        <div class="" id="cboxNext">
                        </div>
                        <div class="" id="cboxPrevious">
                        </div>
                        <div class="" id="cboxSlideshow">
                        </div>
                        <div class="" id="cboxClose">
                        </div>
                    </div>
                    <div style="float: left;" id="cboxMiddleRight">
                    </div>
                </div>
                <div style="clear:left">
                    <div style="float: left;" id="cboxBottomLeft">
                    </div>
                    <div style="float: left;" id="cboxBottomCenter">
                    </div>
                    <div style="float: left;" id="cboxBottomRight">
                    </div>
                </div>
            </div>
            <div style="position:absolute; width:9999px; visibility:hidden; display:none">
            </div>
        </div>
       
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
                        <a href="http://www.jumei.com/?from=cart_add" target="_blank" id="home">
                            <img src="/Public/Home/cart/cart_logo.jpg" alt="化妆品团购">
                        </a>
                    </h1>
                    <div class="order_path order_path_1
                    " >
                    </div>
                </div>
            </div>
        </div>
        <div id="container" style="width: auto;">
            <link rel="stylesheet" href="/Public/Home/cart/show.css">
            <?php if($_SESSION['cart']){ ?>
            <div class="content_show_wrapper">
                <div class="cart_notification cart_error" style="">
                    <div class="message">
                        <p>
                        </p>
                    </div>
                </div>
                <div id="group_show">
                    <div class="content_header clearfix">
                        <div class="cart_timer_wrapper">
                            <i class="icon_small png">
                            </i>
                            <span class="cart_timer_counting">
                                请在
                                <span class="cart_timer_text">
                                    18分40秒
                                </span>
                                内去结账，并在下单后
                                <span class="pink">
                                    20
                                </span>
                                分钟内完成支付
                            </span>
                            <span class="cart_timer_out">
                                已超过购物车商品保留时间，请尽快结算。
                            </span>
                            [
                            <a class="cart_timer_tip float_box" href="javascript:void(0)">
                                ?
                                <div class="pop_box">
                                    <span class="arrow_t_1">
                                        <span class="arrow_t_2">
                                        </span>
                                    </span>
                                    <div class="timer_tip_text">
                                        由于商品库存有限，我们只能暂为您最多保存20分钟，
                                        <br>
                                        20分钟后购物车将被清空，请尽快结算订单。
                                    </div>
                                </div>
                            </a>
                            ]
                        </div>
                        <div class="top_banner">
                            <ul class="header_icons">
                                <li>
                                    <span>
                                        <i class="icon_zhenpin header_icon png">
                                        </i>
                                        真品防伪码
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <i class="icon_tuihuo header_icon png">
                                        </i>
                                        30天无条件退货
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <i class="icon_baoyou header_icon png">
                                        </i>
                                        美妆满2件或299元包邮
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="common_shippment">
                            <i class="icon_small icon_baoyou png">
                                包邮
                            </i>
                            新用户首单全场满39元包邮,自营非食品类满两件或满299元包邮
                        </div>
                    </div>
                    <div class="groups_wrapper">
                        <table class="cart_group_item  cart_group_item_product">
                            <thead>
                                <tr>
                                    <th class="cart_overview">
                                    </th>
                                    <th class="cart_price">
                                        聚美价（元）
                                    </th>
                                    <th class="cart_num">
                                        数量
                                    </th>
                                    <th class="cart_total">
                                        小计（元）
                                    </th>
                                    <th class="cart_option">
                                        操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($good)): foreach($good as $key=>$vo): ?><tr class="cart_item " hashid="d151009p647307zc" gid="<?php echo ($vo['id']); ?>"
                                product_id="647307" item_price="29.00" category_v3_3="19" brand_id="245"
                                product_type="product">
                                    <td valign="top">
                                        <div class="cart_item_desc clearfix">
                                            <input class="js_item_selector cart_item_selector" data-item-key="1049989_d151009p647307zc"
                                            data-app="all" checked="checked" type="checkbox">
                                            <div class="cart_item_desc_wrapper">
                                                <a class="cart_item_pic" href="<?php echo U('Home/Details/index',array('cate'=>$vo['id']));?>"
                                                target="_blank">
                                                    <img src="<?php echo ($vo['spic']); ?>" alt="御泥坊红石榴矿物洁面乳100ml">
                                                    <span class="sold_out_pic png">
                                                    </span>
                                                </a>
                                                <a class="cart_item_link" title="御泥坊红石榴矿物洁面乳100ml" href="<?php echo U('Home/Details/index',array('cate'=>$vo['id']));?>"
                                                target="_blank">
                                                    <?php echo ($vo['title']); ?>
                                                </a>
                                                <p class="sku_info">
                                                    型号：
                                                    <span class="cart_item_attribute">
                                                        100ml
                                                    </span>
                                                    &nbsp;
                                                </p>
                                                <div class="sale_info clearfix">
                                                    <div class="tips_pop_full float_box JS_tips_pop_full">
                                                        <div>
                                                            <a class="sale_tag gift JS_sale_tag" data-promo-type="gift">
                                                                满赠
                                                                <i class="icon_small png">
                                                                </i>
                                                            </a>
                                                        </div>
                                                        <div class="pop_box JS_pop_box">
                                                            <div>
                                                                <span class="arrow_t_1">
                                                                    <span class="arrow_t_2">
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <a class="clearfix promo_sale_item promo_has_url" target="_blank" href="http://yunifang.jumei.com/">
                                                                    <span class="title">
                                                                        1.御泥坊满159送159
                                                                    </span>
                                                                    <span class="tips">
                                                                        查看活动
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            <div class="underline">
                                                            </div>
                                                            <div>
                                                                <a class="clearfix promo_sale_item promo_has_url" target="_blank" href="http://yunifang.jumei.com/">
                                                                    <span class="title">
                                                                        2.御泥坊满259送259
                                                                    </span>
                                                                    <span class="tips">
                                                                        查看活动
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tips_pop_full float_box JS_tips_pop_full">
                                                        <div>
                                                            <a class="sale_tag reduce_no_cap JS_sale_tag" data-promo-type="reduce_no_cap">
                                                                满减
                                                                <i class="icon_small png">
                                                                </i>
                                                            </a>
                                                        </div>
                                                        <div class="pop_box JS_pop_box">
                                                            <div>
                                                                <span class="arrow_t_1">
                                                                    <span class="arrow_t_2">
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <div>
                                                                <a class="clearfix promo_sale_item promo_has_url" target="_blank" href="http://hd.jumei.com/act/4-1-13760-ppt_yunifang_151009.html">
                                                                    <span class="title">
                                                                        御泥坊品牌团满259减100上不封顶
                                                                    </span>
                                                                    <span class="tips">
                                                                        查看活动
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart_item_price">
                                            <p class="jumei_price">
                                                <?php echo ($vo['price']); ?>
                                            </p>
                                            <p class="market_price">
                                                <?php echo ($vo['cprice']); ?>

                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart_item_num ">
                                            <div class="item_quantity_editer clearfix" data-item-key="1049989_d151009p647307zc">
                                                <span class="decrease_one ">
                                                    -
                                                </span>
                                                <input class="item_quantity" value="<?php echo ($vo['num']); ?>" type="text">
                                                <span class="increase_one ">
                                                    +
                                                </span>
                                            </div>
                                            <div class="item_shortage_tip">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart_item_total">
                                            <p class="item_total_price">
                                                 <?php echo intval($vo['price'])*$vo['num'];?>
                                            </p>
                                            <p>
                                                省
                                                <span class="item_saved_price">
                                                <?php echo intval($vo['cprice']-$vo['price'])*$vo['num'];?>
                                                  
                                                </span>
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="cart_item_option">
                                            <a class="icon_small delete_item png" data-item-key="1049989_d151009p647307zc"
                                            href="javascript:void(0)" title="删除">
                                            </a>
                                        </div>
                                    </td>
                                </tr><?php endforeach; endif; ?>
                                
                            </tbody>

                            <tfoot  class='yong'>
                                <tr data-for="1069553_" class="cancel_delete" style="display:none;" gid=""> <td colspan="5"> <div class="cancel_delete_wrapper"> 您已删除  <a target="_blank" href="" class="deleted_item_url"></a> ，如有误， 可<a href="javascript:void(0)" data-add-args="1069553,,1" class="do_cancel_delete">撤销删除</a>  </div> </td> </tr>
                                <tr>
                                    <td colspan="5">
                                        商品金额：<font color="#ed145b"> ￥</font>
                                        <span class="group_total_price">
                                              0.0
                                        </span>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="common_handler_anchor">
                    </div>
                    <div class="common_handler">
                        <div class="right_handler">
                            共
                            <span class="total_amount">
                                0
                            </span>
                            &nbsp;件商品 &nbsp;&nbsp; 商品应付总额：<font color="#ed145b">￥</font>
                            <span class="total_price">
                                 0.0
                            </span>
                            <a id="go_to_order" class="btn" href="javascript:;">
                                去结算
                            </a>
                        </div>
                        <label for="js_all_selector" class="cart_all_selector_wrapper">
                            <input checked="checked" id="js_all_selector" class="js_all_selector all_selector"
                            type="checkbox">
                            全选
                        </label>
                        <a class="go_back_shopping" href="http://search.jumei.com/">
                            继续购物
                        </a>
                        <span class="seperate_line">
                            |
                        </span>
                        <a class="clear_cart_all" href="">
                            清空选中商品
                        </a>
                        <form id="form_to_order" action="" method="post" style="display: none;">
                            <input name="items_key" type="hidden">
                        </form>
                    </div>
                    <div class="content_footer clearfix">
                        <div class="cart_timer_wrapper">
                            <i class="icon_small png">
                            </i>
                            <span class="cart_timer_counting">
                                请在
                                <span class="cart_timer_text">
                                    00分00秒
                                </span>
                                内去结账，并在下单后
                                <span class="pink">
                                    20
                                </span>
                                分钟内完成支付
                            </span>
                            <span class="cart_timer_out">
                                已超过购物车商品保留时间，请尽快结算。
                            </span>
                            [
                            <a class="cart_timer_tip float_box" href="javascript:void(0)">
                                ?
                                <div class="pop_box">
                                    <span class="arrow_t_1">
                                        <span class="arrow_t_2">
                                        </span>
                                    </span>
                                    <div class="timer_tip_text">
                                        由于商品库存有限，我们只能暂为您最多保存20分钟，
                                        <br>
                                        20分钟后购物车将被清空，请尽快结算订单。
                                    </div>
                                </div>
                            </a>
                            ]
                        </div>
                    </div>
                </div>
                <div id="cart_side_nav">
                    <a href="javascript:void(0)">
                    </a>
                </div>
            </div>
            <?php }else{ ?>
                <div class="content_show_wrapper"> <div style="" class="cart_notification cart_error"> <div class="message"> <p></p> </div> </div> <div id="group_show"> <div class="content_header clearfix">  </div>  <div class="cart_empty clearfix"> <img alt="" src="/Public/Home/cart/empty_icon.jpg" class="cart_empty_logo"> <div class="cart_empty_right"> <h2>您的购物车中没有商品，请先去挑选心爱的商品吧！</h2> <p class="cart_empty_backtip"> 您可以 <a href="<?php echo U('Home/index/index');?>" class="btn">  返回首页  </a> 挑选喜欢的商品,或者 </p> <div class="search_block"> <form pos="top" method="get" action="<?php echo U('Home/Search/index');?>"><button class="btn_cart_search" type="submit">搜索</button> <input type="text" autocomplete="off" placeholder="搜搜您想要的商品" class="search_input" name="title"> </form> </div> </div> </div>  <div class="content_footer clearfix">  </div>   </div> <div id="cart_side_nav"> <a href="javascript:void(0)"></a> </div> </div>
            <?php } ?>
            <div class="recommend_box" id="JS_recommend_box">
                <div class="nav_tips">
                    <a href="javascript:;" class="JS_recommend_nav active">
                        购买的还买了
                        <i class="right_border">
                        </i>
                    </a>
                    <a href="javascript:;" class="JS_recommend_nav">
                        今日最受欢迎
                        <i class="right_border">
                        </i>
                    </a>
                    <a href="javascript:;" class="JS_recommend_nav">
                        最近查看过
                    </a>
                </div>
                <div>
                    <ul class="clearfix JS_recommend_cont">
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p1095430zc.html?from=r_c_a_0_1-1"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1095430_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p1095430zc.html?from=r_c_a_0_1-1"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            1.7折/
                                        </span>
                                        御泥坊蚕丝面膜超值套装21片，补水、紧致、亮颜一片搞定！
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥79.9
                                    </span>
                                    <span class="grey">
                                        ￥462
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="79.9" category_id="14"
                                    brand_id="245" type_id="recent" product_id="1095430" hash_id="d151009p1095430zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p1747485zc.html?from=r_c_a_0_1-2"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1747485_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p1747485zc.html?from=r_c_a_0_1-2"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            2.1折/
                                        </span>
                                        【满259减100上不封顶】肌肤黯哑、粗糙 ? 让红酒来拯救你！御泥坊红酒蚕丝21片,补水亮泽更超值。
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥129.9
                                    </span>
                                    <span class="grey">
                                        ￥627
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="129.9"
                                    category_id="14" brand_id="245" type_id="recent" product_id="1747485" hash_id="d151009p1747485zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p656894zc.html?from=r_c_a_0_1-3"
                                    target="_blank">
                                        <img src="/Public/Home/cart/656894_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p656894zc.html?from=r_c_a_0_1-3"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            2.1折/
                                        </span>
                                        御泥坊光感亮肤睡眠面膜套装，让你告别“黄脸婆”，封榜万人迷！
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥139.9
                                    </span>
                                    <span class="grey">
                                        ￥656
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="139.9"
                                    category_id="23" brand_id="245" type_id="recent" product_id="656894" hash_id="d151009p656894zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p647303zc.html?from=r_c_a_0_1-4"
                                    target="_blank">
                                        <img src="/Public/Home/cart/647303_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p647303zc.html?from=r_c_a_0_1-4"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            6.1折/
                                        </span>
                                        【满259减100上不封顶】御泥坊玫瑰滋养矿物洁面乳100ml,令洗后肌肤柔滑净畅、舒适润泽。
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥29.9
                                    </span>
                                    <span class="grey">
                                        ￥49
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="29.9" category_id="19"
                                    brand_id="245" type_id="recent" product_id="647303" hash_id="d151009p647303zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p1623951zc.html?from=r_c_a_0_1-5"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1623951_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p1623951zc.html?from=r_c_a_0_1-5"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            2.9折/
                                        </span>
                                        【259减100上不封顶】【满139送139】以黑吸黑,清洁控油！御泥坊黑面膜(21片)重磅来袭,明星推荐！
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥129.9
                                    </span>
                                    <span class="grey">
                                        ￥447
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="129.9"
                                    category_id="14" brand_id="245" type_id="recent" product_id="1623951" hash_id="d151009p1623951zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p1262926zc.html?from=r_c_a_0_1-6"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1262926_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p1262926zc.html?from=r_c_a_0_1-6"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            5.2折/
                                        </span>
                                        【满259减100上不封顶】御泥坊红石榴鲜活矿物睡眠面膜180g,去黄提亮,红润鲜活透出来！
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥99.0
                                    </span>
                                    <span class="grey">
                                        ￥189
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="99.0" category_id="14"
                                    brand_id="245" type_id="recent" product_id="1262926" hash_id="d151009p1262926zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p1352241zc.html?from=r_c_a_0_1-7"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1352241_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p1352241zc.html?from=r_c_a_0_1-7"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            3折/
                                        </span>
                                        【满139送139】美白效果好,全靠基础打的牢！御泥坊美白嫩肤亮肌礼盒,开启白皙美肌之旅。
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥99.9
                                    </span>
                                    <span class="grey">
                                        ￥337
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="99.9" category_id="23"
                                    brand_id="245" type_id="recent" product_id="1352241" hash_id="d151009p1352241zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p720351zc.html?from=r_c_a_0_1-8"
                                    target="_blank">
                                        <img src="/Public/Home/cart/720351_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p720351zc.html?from=r_c_a_0_1-8"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            6.1折/
                                        </span>
                                        【满259减100上不封顶】御泥坊清爽平衡矿物洁面乳100ml,平衡净肤,洁净自然！
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥29.9
                                    </span>
                                    <span class="grey">
                                        ￥49
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="29.9" category_id="19"
                                    brand_id="245" type_id="recent" product_id="720351" hash_id="d151009p720351zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p1747484zc.html?from=r_c_a_0_1-9"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1747484_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p1747484zc.html?from=r_c_a_0_1-9"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            1.9折/
                                        </span>
                                        【满139送139】以黑吸黑,清洁控油更彻底！御泥坊清爽平衡矿物蚕丝黑面膜28片,重磅来袭！
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥109.9
                                    </span>
                                    <span class="grey">
                                        ￥594
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="109.9"
                                    category_id="14" brand_id="245" type_id="recent" product_id="1747484" hash_id="d151009p1747484zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p647314zc.html?from=r_c_a_0_1-10"
                                    target="_blank">
                                        <img src="/Public/Home/cart/647314_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p647314zc.html?from=r_c_a_0_1-10"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            5.8折/
                                        </span>
                                        【满259减100上不封顶】御泥坊美白嫩肤矿物洁面100ml,温和清洁,美白淡黑！
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥39.9
                                    </span>
                                    <span class="grey">
                                        ￥69
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="39.9" category_id="19"
                                    brand_id="245" type_id="recent" product_id="647314" hash_id="d151009p647314zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="clearfix JS_recommend_cont" style="display:none;">
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151011p1098605zc.html?from=r_c_p_0_1-1"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1098605_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151011p1098605zc.html?from=r_c_p_0_1-1"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            3.3折/
                                        </span>
                                        欧诗漫(OSM)营养美肤 晶彩无瑕礼盒，5效“盒”1 ，一套养成水润透亮肌！
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥129.0
                                    </span>
                                    <span class="grey">
                                        ￥396
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="129.0"
                                    category_id="23" brand_id="6116" type_id="recent" product_id="1098605"
                                    hash_id="d151011p1098605zc" product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://mall.jumei.com/product_905688.html?from=r_c_p_0_1-2" target="_blank">
                                        <img src="/Public/Home/cart/905688_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://mall.jumei.com/product_905688.html?from=r_c_p_0_1-2" target="_blank"
                                    class="tips_info">
                                        <span class="discount">
                                            9折/
                                        </span>
                                        美宝莲(MAYBELLINE) 眼部及唇部卸妆液 70ml
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥26.0
                                    </span>
                                    <span class="grey">
                                        ￥29.00
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="26.0" category_id="18"
                                    brand_id="623" type_id="recent" product_id="905688" hash_id="" product_type="mall">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://mall.jumei.com/product_230856.html?from=r_c_p_0_1-3" target="_blank">
                                        <img src="/Public/Home/cart/230856_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://mall.jumei.com/product_230856.html?from=r_c_p_0_1-3" target="_blank"
                                    class="tips_info">
                                        <span class="discount">
                                            8折/
                                        </span>
                                        新柔皙亮肤补水套装（洗颜霜120ml+保湿水120ml+保湿乳100ml ）
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥155.0
                                    </span>
                                    <span class="grey">
                                        ￥193.00
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="155.0"
                                    category_id="23" brand_id="3660" type_id="recent" product_id="230856" hash_id=""
                                    product_type="mall">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://mall.jumei.com/product_1602226.html?from=r_c_p_0_1-4"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1602226_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://mall.jumei.com/product_1602226.html?from=r_c_p_0_1-4"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            9.6折/
                                        </span>
                                        美宝莲(MAYBELLINE) 好气色轻唇膏咬唇妆
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥85.0
                                    </span>
                                    <span class="grey">
                                        ￥89.00
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="85.0" category_id="388"
                                    brand_id="623" type_id="recent" product_id="1602226" hash_id="" product_type="mall">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://mall.jumei.com/product_1606776.html?from=r_c_p_0_1-5"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1606776_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://mall.jumei.com/product_1606776.html?from=r_c_p_0_1-5"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            7.2折/
                                        </span>
                                        魔法城堡聚拢文胸贴（黑色
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥86.3
                                    </span>
                                    <span class="grey">
                                        ￥120.00
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="86.3" category_id="414"
                                    brand_id="1367" type_id="recent" product_id="1606776" hash_id="" product_type="mall">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/bj151011p15228.html?from=r_c_p_0_1-6"
                                    target="_blank">
                                        <img src="/Public/Home/cart/15228_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/bj151011p15228.html?from=r_c_p_0_1-6"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            5.1折/
                                        </span>
                                        玻儿我爱摩登唇膏3.5g(8色可选)，变身人见人爱花见花开的摩登俏女郎！
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥39.9
                                    </span>
                                    <span class="grey">
                                        ￥79
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="39.9" category_id="388"
                                    brand_id="1089" type_id="recent" product_id="15228" hash_id="bj151011p15228"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="clearfix JS_recommend_cont" style="display:none;">
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p312zc.html?from=r_c_h_0_1-1"
                                    target="_blank">
                                        <img src="/Public/Home/cart/312_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p312zc.html?from=r_c_h_0_1-1"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            3.8折/
                                        </span>
                                        伊丽莎白雅顿经典润泽唇膏 3.7g
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥69.9
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="69.9" category_id="0"
                                    brand_id="0" type_id="recent" product_id="312" hash_id="d151009p312zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d151009p1095430zc.html?from=r_c_h_0_1-2"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1095430_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d151009p1095430zc.html?from=r_c_h_0_1-2"
                                    target="_blank" class="tips_info">
                                        <span class="discount">
                                            1.8折/
                                        </span>
                                        御泥坊蚕丝面膜超值套装21片
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥79.9
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="79.9" category_id="0"
                                    brand_id="0" type_id="recent" product_id="1095430" hash_id="d151009p1095430zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="list">
                            <div>
                                <div>
                                    <a href="http://bj.jumei.com/i/deal/d150926p1970zc.html?from=r_c_h_0_1-3"
                                    target="_blank">
                                        <img src="/Public/Home/cart/1970_160_160.jpg" height="160" width="160">
                                    </a>
                                </div>
                                <div class="tips_info_box">
                                    <a href="http://bj.jumei.com/i/deal/d150926p1970zc.html?from=r_c_h_0_1-3"
                                    target="_blank" class="tips_info">
                                        相宜本草红景天幼白洁面膏
                                    </a>
                                </div>
                                <div class="price_grey">
                                    <span class="price">
                                        ￥35.0
                                    </span>
                                </div>
                                <div>
                                    <a href="javascript:;" class="cart_btn JS_add_cart_btn" price="35.0" category_id="0"
                                    brand_id="0" type_id="recent" product_id="1970" hash_id="d150926p1970zc"
                                    product_type="deal">
                                        加入购物车
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
<script type="text/javascript" charset="utf-8" src="/Public/Home/search/imgs/jquery-1.8.3.min.js"></script>
 <script type="text/javascript">
    $(function(){

        //减少数量绑定事件
       $('.decrease_one ').each(function(){
            
                $(this).click(function(){
                    
                    var nv=$(this).next().val()-1;//获取value值减1

                    var gid=$(this).parents('.cart_item').attr('gid');//获取商品id
                    //如果大于1 才执行减少做临界判断
                    if(nv >= 1){

                        $(this).next().val(nv);//改变value值
                        //请求ajax在服务器端执行删除
                        $.ajax({
                                type: "POST",
                                url: "<?php echo U('Home/Cart/decrease');?>",
                                data:{gid:gid},
                                success:function(data){
                                        console.log(data);
                                }
                        })     
                        
                        var np=Number($(this).parents('td').prev().find('.jumei_price').html());//获取商品单价
                        var ncp=Number($(this).parents('td').prev().find('.market_price').html());//获取商品的原价
                        var nt=Number($(this).parents('td').next().find('.item_total_price').html());//获取商品的总价
                        var nct=Number($(this).parents('td').next().find('.item_saved_price').html());//获取节省总价
                        //执行价格减少
                        $(this).parents('td').next().find('.item_total_price').html(nt-np);
                        $(this).parents('td').next().find('.item_saved_price').html(nct-ncp+np);
                        var total1=Number($('.group_total_price').html());//获取应付总价
                        var total_amount=Number($('.total_amount').html())-1;//商品数量执行减少
                        //只有在前面复选框处于选中的状态时才执行减少
                        if($(this).parents('.cart_item').find('.cart_item_selector').attr('checked')){
                            $('.group_total_price').html(total1-np);
                            $('.total_price').html(total1-np);
                            $('.total_amount').html(total_amount);
                        }
                        

                    }
                })
       })
        //数量增加绑定事件
        $('.increase_one ').each(function(){
                    $(this).click(function(){
                        var nv=Number($(this).prev().val())+1;//获取value加1
                        var gid=$(this).parents('.cart_item').attr('gid');//获取商品的id
                        $(this).prev().val(nv);//执行value增加
                        //发送ajax执行增加
                        $.ajax({
                                type: "POST",
                                url: "<?php echo U('Home/Cart/insert');?>",
                                data:{gid:gid},
                                success:function(data){
                                        console.log(data);
                                }
                            })          

                       
                        var np=Number($(this).parents('td').prev().find('.jumei_price').html());//获取商品的单价
                        var ncp=Number($(this).parents('td').prev().find('.market_price').html());//获取原价商品
                        var nt=Number($(this).parents('td').next().find('.item_total_price').html());//获总价取商品的
                        var nct=Number($(this).parents('td').next().find('.item_saved_price').html());//获取商品节省总价
                        //执行价格增加
                        $(this).parents('td').next().find('.item_total_price').html(nt+np);//
                        $(this).parents('td').next().find('.item_saved_price').html(nct+ncp-np);
                        var total1=Number($('.group_total_price').html());//获取商品应付总价
                        var total_amount=Number($('.total_amount').html())+1;//获取商品总数目加1
                        //当前面的复选框处于选中状态执行增加
                        if($(this).parents('.cart_item').find('.cart_item_selector').attr('checked')){
                            $('.group_total_price').html(total1+np);
                            $('.total_price').html(total1+np);
                            $('.total_amount').html(total_amount);
                        }
                       
                    })
           })
        //全选事件
         $('#js_all_selector').click(function(){

            if(this.checked){
                var total_price=0;
                $('.item_total_price').each(function(){
                    total_price += Number($(this).html());
                    $('.group_total_price').html(total_price);
                    $('.total_price').html(total_price);
                })
                var total_amount=0;
                $('.item_quantity').each(function(){
                     total_amount += Number($(this).val());   
                    $('.total_amount').html(total_amount);
                })
                $('.cart_item_selector').attr('checked', true);
            }else{
                $('.group_total_price').html(0);
                $('.total_price').html(0);
                $('.total_amount').html(0);

                $('.cart_item_selector').attr('checked', false);
            }

         if($('input:checked').length){
                 $('#go_to_order').removeClass('disabled');
          }else{
                $('#go_to_order').addClass('disabled');
          }

        })

         //全选修复
        $('.cart_item_selector').each(function(){

            $(this).click(function(){
                
                if(!$(this).attr('checked')){
                     $('#js_all_selector').attr('checked', false);

                 }
                var all=$('.js_item_selector').length;
                var nal=$('.js_item_selector:checked').length;
                if(all==nal || all==0){
                    $('.js_all_selector').attr('checked', true);
                }
             })
        })

        //根据复选框状态修改总价和数量
        $('.cart_item_selector').click(function(){ 
              if($('input:checked').length){
                     $('#go_to_order').removeClass('disabled');
              }else{
                    $('#go_to_order').addClass('disabled');
              }
            var total_price=0;
            var total_amount=0;

            $('.item_total_price').each(function(){
                if(!$(this).parents('.cart_item').find('.cart_item_selector').attr('checked')){
                    total_price -= Number($(this).html());  

                }
                total_price += Number($(this).html());
                $('.group_total_price').html(total_price);
                $('.total_price').html(total_price);
            })
            var total_amount=0;
            $('.item_quantity').each(function(){
                if(!$(this).parents('.cart_item').find('.cart_item_selector').attr('checked')){
                    total_amount -= Number($(this).val());   
                }
                 total_amount += Number($(this).val());   
                $('.total_amount').html(total_amount);
             })

        })

        //页面加载完成总数量
        if($('input:checked').length){

            var total_amount=0;
             $('input:checked').parents('.cart_item').find('.item_quantity').each(function(){
                 total_amount += Number($(this).val());   
                $('.total_amount').html(total_amount);
            })
            //页面加载完成总价格
            var total_price=0;
            $('input:checked').parents('.cart_item').find('.item_total_price').each(function(){
                total_price += Number($(this).html());
                $('.group_total_price').html(total_price);
                $('.total_price').html(total_price);
            })
         }else{
            $('.total_amount').html(0);
            $('.group_total_price').html(0);
            $('.total_price').html(0);

         }   
        //绑定删除事件
        $('.delete_item').click(function(){
            //获取商品id和商品名称
            var that=$(this),
                gid=Number(that.parents('.cart_item').attr('gid')),
                num=Number(that.parents('.cart_item').find('.item_quantity').val()),
                title=that.parents('.cart_item').find('.cart_item_link').html();
            //执行服务器端删除
             $.ajax({
                    type: "POST",
                    url: "<?php echo U('Home/Cart/delete');?>",
                    data:{gid:gid},
                    success:function(data){
                        var da=parseInt(data);
                        if(da){

                            //隐藏删除的商品信息显示提示信息
                            that.parents('.cart_item ').hide();
                            var deinfo=$('.cancel_delete').clone();
                            deinfo.show();
                            deinfo.removeClass('cancel_delete').addClass('reback').css({'text-align':'left',' text-indent':'10em','background':'#fffef5 none repeat scroll 0 0','border':'1px solid #fabf7b'});
                            deinfo.attr({'gid':gid,'num':num,'title':title});

                            deinfo.find('.deleted_item_url').attr('href','<?php echo U("Home/Detail/index");?>?cate='+gid).html(title);
                            $('.yong').prepend(deinfo);
                            var itp=Number(that.parents('.cart_item').find('.item_total_price').html());
                            var iq=Number(that.parents('.cart_item').find('.item_quantity').val());
                            var gtp=Number($('.group_total_price').html());
                            var ta=Number($('.total_amount').html());
                            $('.group_total_price').html(gtp-itp);
                            $('.total_price').html(gtp-itp);
                            $('.total_amount').html(ta-iq);
                           
                        }else{
                            document.location.href="";
                        }
                    }
            })          

        })
        //恢复删除
        $('.do_cancel_delete').live('click',function(){
            //获取商品的id和数量
            var that=$(this),
                gid=that.parents('.reback').attr('gid'),
                title=that.parents('.reback').attr('title'),
                num=Number(that.parents('.reback').attr('num')),
                itp=Number($("tr[gid='"+gid+"']").find('.item_total_price').html());
            //请求服务器端执行恢复   
            $.ajax({
                    type: "POST",
                    url: "<?php echo U('Home/Cart/insert');?>",
                    data:{gid:gid,num:num},
                    success:function(data){
                        if(data){
                                that.parents('.reback').remove();
                               $("tr[gid='"+gid+"']").show();

                               var gtp=Number($('.group_total_price').html());
                               var ta=Number($('.total_amount').html());
                                $('.group_total_price').html(gtp+itp);
                                $('.total_price').html(gtp+itp);
                                $('.total_amount').html(ta+num);
                            
                        }
                    }   
                  })                 
        })
        //提交订单
        var arrgid=[];
        var arrnum=[];
        $('#go_to_order').click(function(){
            var that=$(this);
            if($('input:checked').length){
                $('input:checked').each(function(){

                   var gid=$(this).parents('.cart_item').attr('gid');
                   arrgid.push(gid);
                   var num=$(this).parents('.cart_item').find('.item_quantity').val();
                   arrnum.push(num);
                   <?php if($_SESSION['id']){ ?>
                        document.location.href='<?php echo U('Home/Confirm/confirm');?>?gid='+arrgid+'&gum='+arrnum;
                   <?php }else{ ?>
                        document.location.href="<?php echo U('Home/User/login');?>";
                   <?php } ?>     

                })
            }else{
              return false;
            }
        })
        //结算条固定common_handler_fixed
       var gTop=$('.common_handler').offset().top;
        var top=$(window).height();
        $(window).scroll(function(){
            
            var sTop=$(window).scrollTop();
            if(sTop<gTop-top){
                $('.common_handler').addClass('common_handler_fixed');
             }else{
                $('.common_handler').removeClass('common_handler_fixed');
            }
        })
        //购物车倒计时
        var addtime=<?php echo session('addtime');?>;
        var ntime=<?php echo NOW_TIME;?>;
        var intDiff = parseInt(1200+addtime-ntime);//倒计时总秒数量
            function timer(intDiff){
                window.setInterval(function(){
                var minute=0,
                    second=0;//时间默认值
                if(intDiff > 0){
                    minute = Math.floor(intDiff / 60);
                    second = Math.floor(intDiff) - (minute * 60);
                }
                if (minute <= 9) minute = '0' + minute;
                if (second <= 9) second = '0' + second;
                    if(!intDiff){                   
                        $('.cart_timer_counting').hide();
                        $('.cart_timer_out').show();
                    }
                    $('.cart_timer_text').html('<s></s>'+minute+'分'+second+'秒');

                intDiff--;
                }, 1000);
            } 
            $(function(){
                timer(intDiff);
            }); 


    })
 </script>  
        <div id="footer_container">
            <div id="footer_textarea">
                <div class="footer_con" id="footer_copyright">
                    <p class="footer_copy_con">
                        © 2013 北京创锐文化传媒有限公司 Jumei.com 保留一切权利。客服热线：400-123-8888
                        <br>
                        京公网安备 11010102001226 |
                        <a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow">
                            京ICP证111033号
                        </a>
                        | 食品流通许可证 SP1101051110165515（1-1） |
                        <a href="http://p2.jmstatic.com/activity/2013_chuangrui.jpeg" target="_blank">
                            营业执照
                        </a>
                    </p>
                    <p>
                        <a href="javascript:void(0)" class="footer_copy_logo logo01">
                        </a>
                        <a href="https://www.itrust.org.cn/yz/pjwx.asp?wm=1693268180" target="_blank"
                        class="footer_copy_logo logo02">
                        </a>
                        <a href="javascript:void(0)" class="footer_copy_logo logo03">
                        </a>
                        <a href="javascript:void(0)" class="footer_copy_logo logo04">
                        </a>
                        <a href="https://ss.cnnic.cn/verifyseal.dll?sn=e12070911010031011307708&amp;ct=df&amp;pa=453163"
                        target="_blank" class="footer_copy_logo logo05">
                        </a>
                    </p>
                </div>
            </div>
        </div>
        \
        <iframe id="emar_box_pv" src="/Public/Home/cart/_adw.htm" style="width: 1px; border: 0px none; position: absolute; left: -100px; top: -100px; height: 1px;">
        </iframe>
        <img style="display: none; width: 0px; height: 0px;" src="/Public/Home/cart/pv.gif">
        <img style="display: none; width: 0px; height: 0px;" src="/Public/Home/cart/tker.gif">
        <div style="display: none;" id="criteo-tags-div">
            <iframe src="/Public/Home/cart/dis.htm" style="display: none;" height="0"
            width="0">
            </iframe>
        </div>
    </body>

</html>