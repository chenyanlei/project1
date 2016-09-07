<?php if (!defined('THINK_PATH')) exit(); if(!$webinfo['switch']){ ?>
<script>window.location.href="<?php echo U('Home/Web/index');?>";</script>;
<?php exit; } ?>
<!DOCTYPE html>
    <!--[if lt IE 7 ]>
        <html class="ie6" lang="zh-cn">
        <![endif]-->
        <!--[if IE 7 ]>
            <html class="ie7" lang="zh-cn">
            <![endif]-->
            <!--[if IE 8 ]>
                <html class="ie8" lang="zh-cn">
                <![endif]-->
                <!--[if IE 9 ]>
                    <html class="ie9" lang="zh-cn">
                    <![endif]-->
                    <!--[if (gt IE 9)|!(IE)]>
                        <!-->
                        <html style="height: 100%;" lang="zh-cn">
                        <!--<![endif]-->
                        
                        <head>
                        
                        
                            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                            <meta charset="utf-8">
                            <link rel="dns-prefetch" href="http://a0.jmstatic.com/">
                            <link rel="dns-prefetch" href="http://a1.jmstatic.com/">
                            <link rel="dns-prefetch" href="http://a2.jmstatic.com/">
                            <link rel="dns-prefetch" href="http://a3.jmstatic.com/">
                            <link rel="dns-prefetch" href="http://a4.jmstatic.com/">
                            <link rel="dns-prefetch" href="http://a5.jmstatic.com/">
                            <meta name="renderer" content="webkit">
                            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                            <meta property="qc:admins" content="56207406376255516375">
                            <meta name="keywords" content="<?php echo ($webinfo['keyword']); ?>">
                            <title>
                                <?php echo ($webinfo['title']); ?>
                            </title>
                            
<link rel="stylesheet" href="/Public/Home/search/imgs/jumei.css" type="text/css"
        media="screen" charset="utf-8">
        <link rel="stylesheet" href="/Public/Home/search/imgs/app.css" type="text/css"
        media="screen" charset="utf-8">
        <link rel="stylesheet" href="/Public/Home/search/imgs/common.css" type="text/css"
        media="screen" charset="utf-8">
        <link rel="stylesheet" href="/Public/Home/search/imgs/jumei_search.css"
        type="text/css" media="screen" charset="utf-8">
        <link type="text/css" rel="stylesheet" href="/Public/Home/search/imgs/jumei_newmall_wide_new.css">
        <style type="text/css">
            #newlife{
                width:30px;
                height:30px;
                position:absolute;
                z-index:10000000;
                border-radius:50%;
            }

        </style>

                            <link rel="stylesheet" type="text/css" href="/Public/Home/srcs/common.css">
                            <link rel="stylesheet" type="text/css" href="/Public/Home/srcs/app.css">
                            <script src="/Public/Home/srcs/s.js" async="" type="text/javascript">
                            </script>
                            <script data-owner="criteo-tag" src="/Public/Home/srcs/event.js" type="text/javascript"
                            async="true">
                            </script>
                            </script>
                            <script src="/Public/Home/srcs/ld.js" async="" type="text/javascript">
                            </script>
                            </script>
                            <script src="/Public/Home/srcs/h.js" async="" type="text/javascript">
                            </script>
                            <script src="/Public/Home/srcs/dc.js" async="" type="text/javascript">
                            </script>
                            <script src="/Public/Home/srcs/adw.js" async="" type="text/javascript">
                            </script>
                            <script type="text/javascript">

                                    // 获取当前页面事件以活期的元素
                                    $(function(){
                                            
                                    var ServerTime = new Date();

                                    var T = ServerTime.getTime();


                                    $('.count_time').each(function(){

                                        //检测时间是否过期,将过期的id用ajax传递给控制器        
                                        if($(this).attr('diff')*1000 - T <= 0){

                                            //来了 就去获取先辈级元素的连接 id
                                            var id = $(this).parents('a').attr('href');
                                            //正则匹配

                                            var reg = /^.+\/(\d+)\.\w+$/;

                                            var res = reg.exec(id);
                                            for(i=0;i<res.length;i++){
                                                var aid = res[1];
                                                $.ajax({
                                                    url:"<?php echo U('Home/Index/test');?>",
                                                    type:"get",
                                                    data:{id:aid},
                                                    async:true,
                                                    dataType:"json",
                                                    success:function(data){
                                                        // alert(data);
                                                        /*
                                                            <pre class='xdebug-var-dump' dir='ltr'><small>string</small> <font color='#cc0000'>'30'</font> <i>(length
                                                                =2)</i>
                                                            </pre>
                                                        */
                                                    }

                                                })

                                            }
                                            console.log(aid);
                                            
                                        }

                                    });

                                    })
                            </script>
                            <script type="text/javascript">
                                document.domain = 'test.ci.com';
                                var JM = JM || {};
                                JM.SITE_MAIN_TOPLEVELDOMAINNAME = 'test.ci.com';
                                JM.SITE = 'bj';
                                JM.CONTROL = 'Mall';
                                JM.ACTION = 'Mall';
                                JM.JMC_DEBUG = false;
                                JM.DEBUG = false;
                                JM.ASYNCAD = false;
                                JM.SERVER_TIME = 1443520045;
                                JM.CLIENT_TIME = parseInt((new Date()).getTime() / 1000);
                                JM.DEGRADATION = false;
                                // 兼容在jquery加载之前就开始使用$的代码
                                window.__domReadyCallbacks__ = [];
                                window.jQuery = window.$ = function(callback) {
                                    if (typeof callback === 'function') {
                                        window.__domReadyCallbacks__.push(callback);
                                    }
                                };
                            </script>
                            <!-- 子系统的样式 start -->
                            <link rel="stylesheet" type="text/css" href="/Public/Home/srcs/index.css">
                            <!-- 子系统的样式 end -->
                            <style type="text/css">
                                .ibar .ibar_sub_panel .ibar_plugin_content{height:600px;overflow-y:auto;}
                            </style>
                        </head>

<body style="height: 100%;">
    <iframe style="display: none;" src="javascript:false;">
    </iframe>
    <style type="text/css">
        .newuser_text{display:none;} .newuser0424{width:920px;height:612px;overflow:hidden;background:url(http://p0.jmstatic.com/banner/3512/43840_920_612_001-web.jpg)
        top center no-repeat;} .newuser0424 .link_btm{display:block;height:178px;overflow:hidden;margin-top:434px;}
        .newuser0424 .user_btn{background: none; width:38px;height:38px;top:0px;right:0px;position:
        absolute;cursor: pointer;} .new_user_clorbox #cboxClose { background: none;
        width:38px;height:38px;top:0px;right:0px;}
    </style>
    <textarea id="newuser_text" class="newuser_text">
        &lt;div class="newuser0424" id="newuser0424"&gt; &lt;a class="link_btm"
        href="http://www.jumei.com/i/account/signup?from=all_top_banner_all_html_null&amp;lo=3512&amp;mat=43840"
        target="_blank"&gt;&lt;/a&gt; &lt;span class="user_btn" id="user_btn"&gt;&lt;/span&gt;
        &lt;/div&gt;
    </textarea>
    <div class="header header_wide_lv2">
        <!--header top-->
        <div class="header_top">
            <div class="header_top_box">
                <!--login-->
                <?php if(session('id') == null): ?><ul class="header_top_left" id="headerTopLeft">
                        <li>
                            欢迎来到聚美！
                        </li>
                        <li>
                            <a href="<?php echo U('Home/User/login');?>" rel="nofollow">
                                请登录
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/User/register');?>" rel="nofollow">
                                快速注册
                            </a>
                        </li>
                    </ul>
                    <?php else: ?>
                    <ul class="header_top_left" id="headerTopLeft">
                        <li class="signin">
                            欢迎您，
                            <span class="col_jumei">
                                <a target="_blank" href="<?php echo U('Home/User/index',array('id'=>session('id'),'cname'=>'order'));?>">
                                    <?php echo preg_replace('/^(\d{3})\d{4}(\d{4})$/',"JM$1EPPA$2",$_SESSION['phone']); ?>
                                </a>
                            </span>
                            [
                            <a href="<?php echo U('Home/User/loginout');?>" class="signout">
                                退出
                            </a>
                            ]
                        </li>
                    </ul><?php endif; ?>
                <!--login end-->
                <!--city choose-->
                <div style="visibility: visible;" class="default-city fl">
                    <span class="add-city-icons">
                        送至
                        <span class="add-default-city">
                            北京
                        </span>
                        <s class="icon_arrow_down">
                        </s>
                        <i class="user-local-icon">
                        </i>
                    </span>
                    <div class="header-city-list">
                        <dl class="user-local-city">
                            <dd class="noborder">
                                <span class="sheng">
                                    华北
                                </span>
                                <div class="city-list">
                                    <a class="city user-hover" href="javascript:;" data-id="bj" data-city="beijing">
                                        北京
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="tianjin">
                                        天津
                                    </a>
                                    <a href="javascript:;" class="city" data-city="hebei" data-id="bj">
                                        河北
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="shanxi1">
                                        山西
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="neimenggu">
                                        内蒙古
                                    </a>
                                </div>
                            </dd>
                            <dd>
                                <span class="sheng">
                                    华东
                                </span>
                                <div class="city-list">
                                    <a href="javascript:;" class="city" data-id="sh" data-city="shanghai">
                                        上海
                                    </a>
                                    <a href="javascript:;" class="city" data-id="sh" data-city="zhejiang">
                                        浙江
                                    </a>
                                    <a href="javascript:;" class="city" data-id="sh" data-city="jiangsu">
                                        江苏
                                    </a>
                                    <a href="javascript:;" class="city" data-id="gz" data-city="fujian">
                                        福建
                                    </a>
                                    <a href="javascript:;" class="city" data-id="gz" data-city="jiangxi">
                                        江西
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="shandong">
                                        山东
                                    </a>
                                    <a href="javascript:;" class="city" data-id="sh" data-city="anhui">
                                        安徽
                                    </a>
                                </div>
                            </dd>
                            <dd>
                                <span class="sheng">
                                    华南
                                </span>
                                <div class="city-list">
                                    <a href="javascript:;" class="city" data-id="gz" data-city="guangdong">
                                        广东
                                    </a>
                                    <a href="javascript:;" class="city" data-id="gz" data-city="hainan">
                                        海南
                                    </a>
                                    <a href="javascript:;" class="city" data-id="gz" data-city="guangxi">
                                        广西
                                    </a>
                                </div>
                            </dd>
                            <dd>
                                <span class="sheng">
                                    华中
                                </span>
                                <div class="city-list">
                                    <a href="javascript:;" class="city" data-id="sh" data-city="hubei">
                                        湖北
                                    </a>
                                    <a href="javascript:;" class="city" data-id="gz" data-city="hunan">
                                        湖南
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="henan">
                                        河南
                                    </a>
                                </div>
                            </dd>
                            <dd>
                                <span class="sheng">
                                    东北
                                </span>
                                <div class="city-list">
                                    <a href="javascript:;" class="city" data-id="bj" data-city="liaoning">
                                        辽宁
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="jilin">
                                        吉林
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="heilongjiang">
                                        黑龙江
                                    </a>
                                </div>
                            </dd>
                            <dd>
                                <span class="sheng">
                                    西南
                                </span>
                                <div class="city-list">
                                    <a href="javascript:;" class="city" data-id="cd" data-city="chongqing">
                                        重庆
                                    </a>
                                    <a href="javascript:;" class="city" data-id="cd" data-city="sichuan">
                                        四川
                                    </a>
                                    <a href="javascript:;" class="city" data-id="cd" data-city="yunnan">
                                        云南
                                    </a>
                                    <a href="javascript:;" class="city" data-id="cd" data-city="guizhou">
                                        贵州
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="xizang">
                                        西藏
                                    </a>
                                </div>
                            </dd>
                            <dd>
                                <span class="sheng">
                                    西北
                                </span>
                                <div class="city-list">
                                    <a href="javascript:;" class="city" data-id="bj" data-city="shanxi">
                                        陕西
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="gansu">
                                        甘肃
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="ningxia">
                                        宁夏
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="qinghai">
                                        青海
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="xinjiang">
                                        新疆
                                    </a>
                                </div>
                            </dd>
                            <dd>
                                <span class="sheng">
                                    更多
                                </span>
                                <div class="city-list">
                                    <a href="javascript:;" class="city" data-id="bj" data-city="xianggang">
                                        香港
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="aomen">
                                        澳门
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="taiwan">
                                        台湾
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="diaoyudao">
                                        钓鱼岛
                                    </a>
                                    <a href="javascript:;" class="city" data-id="bj" data-city="haiwai">
                                        海外
                                    </a>
                                </div>
                            </dd>
                        </dl>
                        <div class="city-loading hidden">
                            <i>
                            </i>
                            正在切换至
                            <span>
                                上海
                            </span>
                            ...
                        </div>
                    </div>
                </div>
                <!--city choose end-->
                <!--right list-->
                <ul class="header_top_right" id="headerTopRight">
                    <li>
                        <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=Mall_show_nav_fresh_new_2">
                            正品保证
                        </a>
                    </li>
                    <li>
                        <a href="http://i.jumei.com/i/order/list" rel="nofollow">
                            订单查询
                        </a>
                    </li>
                    <li>
                        <a href="http://i.jumei.com/i/product/fav_brands" rel="nofollow">
                            <s class="icon_favorite">
                            </s>
                            收藏的品牌
                        </a>
                    </li>
                    <li class="item_ijumei">
                        <a href="http://i.jumei.com/i/order/list" rel="nofollow">
                            我的聚美
                            <s class="icon_arrow_down">
                            </s>
                        </a>
                        <i class="icon_arrow_back">
                        </i>
                        <div class="sub_nav">
                            <ul>
                                <li>
                                    <a href="http://i.jumei.com/i/order/list" rel="nofollow">
                                        我的订单
                                    </a>
                                </li>
                                <li>
                                    <a href="http://i.jumei.com/i/membership/show_promocards" rel="nofollow">
                                        我的现金券
                                    </a>
                                </li>
                                <li>
                                    <a href="http://i.jumei.com/i/membership/show_red_envelope" rel="nofollow">
                                        我的红包
                                    </a>
                                </li>
                                <li>
                                    <a href="http://i.jumei.com/i/account/balance" rel="nofollow">
                                        我的余额
                                    </a>
                                </li>
                                <li>
                                    <a href="http://i.jumei.com/i/account/balance_record" rel="nofollow">
                                        我的提现退款
                                    </a>
                                </li>
                                <li>
                                    <a href="http://i.jumei.com/i/product/fav_products" rel="nofollow">
                                        我的收藏
                                    </a>
                                </li>
                                <li>
                                    <a href="http://i.jumei.com/i/wishdeal/onsale" rel="nofollow">
                                        我的心愿单
                                    </a>
                                </li>
                                <li>
                                    <a href="http://i.jumei.com/i/membership" rel="nofollow">
                                        会员中心
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.jumei.com/i/membership/gift_card" rel="nofollow">
                                        兑换礼品卡
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="item_mobile">
                        <a href="http://hd.jumei.com/act/9-478-1477-download_app.html?from=Mall_top_nav_fresh_mobile_tab_new"
                        rel="nofollow">
                            <span class="line">
                            </span>
                            <s class="icon_mobile">
                            </s>
                            手机聚美
                        </a>
                    </li>
                    <li class="item_koubei">
                        <a href="<?php echo U('Home/Comment/house');?>">
                            <s class="icon_koubei">
                            </s>
                            口碑中心
                        </a>
                    </li>
                    <li id="see_more">
                        <span class="line">
                        </span>
                        <!--查看更多 (广告位) star-->
                        <div class="look_all_box" id="look_all_box">
                            <a class="look_all">
                                <span>
                                    查看分类
                                </span>
                                <b class="grid png">
                                </b>
                                <b class="close png">
                                </b>
                            </a>
                            <div class="class_list_wrap clearfix">
                                <div class="pop_item_wrap">
                                    <div class="pop_item clearfix current">
                                        <textarea>
                                            &lt;dl&gt; &lt;dt&gt;面部护肤&lt;/dt&gt; &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%81%E9%9D%A2&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;洁面&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%88%BD%E8%82%A4%E6%B0%B4&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;爽肤水&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%B9%B3%E6%B6%B2&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;乳液&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E9%9C%9C&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;面霜&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E8%86%9C&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;面膜&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8A%A4%E8%82%A4%E5%A5%97%E8%A3%85&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;护肤套装&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;眼部护理&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E9%9C%9C&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;眼霜&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E9%83%A8%E7%B2%BE%E5%8D%8E&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;眼部精华&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E8%86%9C&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;眼膜&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;唇部护理&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B6%A6%E5%94%87%E8%86%8F&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;润唇膏&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%94%87%E9%83%A8%E7%B2%BE%E5%8D%8E&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;唇部精华&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%94%87%E8%86%9C&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;唇膜&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;欧美品牌&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9B%85%E8%AF%97%E5%85%B0%E9%BB%9B&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;雅诗兰黛&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%80%A9%E7%A2%A7&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;倩碧&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%85%B0%E8%94%BB&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;兰蔻&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%AC%A7%E8%8E%B1%E9%9B%85&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;欧莱雅&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%96%87%E5%A7%BF&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;薇姿&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%8E%89%E5%85%B0%E6%B2%B9&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;玉兰油&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%8E%AB%E7%90%B3%E5%87%AF&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;玫琳凯&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;日韩品牌&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=SK-II&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;SK-II&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%B5%84%E7%94%9F%E5%A0%82&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;资生堂&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%85%B0%E8%8A%9D&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;兰芝&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%AB%98%E4%B8%9D&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;高丝&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%8F%B2%E8%AF%97%E5%B0%8F%E9%93%BA&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;菲诗小铺&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%9B%BC%E7%A7%80%E9%9B%B7%E6%95%A6&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;曼秀雷敦&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9B%AA%E8%82%8C%E7%B2%BE&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;雪肌精&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;国货品牌&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%BD%B0%E8%8D%89%E9%9B%86&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;佰草集&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9F%A9%E6%9D%9F&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;韩束&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9B%B8%E5%AE%9C%E6%9C%AC%E8%8D%89&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;相宜本草&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%99%BE%E9%9B%80%E7%BE%9A&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;百雀羚&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%BE%8E%E5%8D%B3&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;美即&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%B8%B9%E5%A7%BF&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;丹姿&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%B8%B8%E7%BE%8E&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;丸美&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt;
                                        </textarea>
                                    </div>
                                    <div class="pop_item clearfix">
                                        <textarea>
                                            &lt;dl&gt; &lt;dt&gt;面部底妆&lt;/dt&gt; &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=BB%E9%9C%9C&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;BB霜&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9A%94%E7%A6%BB%E9%9C%9C&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;隔离霜&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%89%E5%BA%95%E6%B6%B2&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;粉底液&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%89%E9%A5%BC&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;粉饼&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%95%A3%E7%B2%89&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;散粉&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%85%AE%E7%BA%A2&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;腮红&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8D%B8%E5%A6%86&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;卸妆&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;眼唇彩妆&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E7%BA%BF&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;眼线&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E5%BD%B1&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;眼影&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E7%BA%BF%E6%B6%B2&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;眼线液&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9D%AB%E6%AF%9B%E8%86%8F&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;睫毛膏&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%89%E7%AC%94&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;眉笔&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8F%A3%E7%BA%A2&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;口红&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;香水&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%A5%B3%E5%A3%AB%E9%A6%99%E6%B0%B4&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;女士香水&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E9%A6%99%E6%B0%B4&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;男士香水&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%B8%AD%E6%80%A7%E9%A6%99%E6%B0%B4&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;中性香水&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=Q%E7%89%88%E9%A6%99%E6%B0%B4&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;Q版香水&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E6%B0%B4%E5%A5%97%E8%A3%85&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;香水套装&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%BE%E6%B2%B9&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;精油&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;欧美品牌&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%B4%9D%E7%8E%B2%E5%A6%83&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;贝玲妃&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E5%A5%88%E5%84%BF&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;香奈儿&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%BE%8E%E5%AE%9D%E8%8E%B2&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;美宝莲&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%AE%89%E5%A8%9C%E8%8B%8F&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;安娜苏&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%BF%AA%E5%A5%A5&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;迪奥&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%9C%9C%E4%B8%9D%E4%BD%9B%E9%99%80&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;蜜丝佛陀&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;日韩品牌&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%A4%8D%E6%9D%91%E7%A7%80&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;植村秀&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%B0%9C%E5%B0%9A&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;谜尚&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=ZA&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;ZA&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%A2%A6%E5%A6%86&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;梦妆&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=DHC&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;DHC&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%A8%A5%E4%BD%A9%E5%85%B0&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;娥佩兰&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;国货品牌&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8D%A1%E5%A7%BF%E5%85%B0&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;卡姿兰&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%8E%9B%E4%B8%BD%E9%BB%9B%E4%BD%B3&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;玛丽黛佳&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%87%A1%E8%8C%9C&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;凡茜&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%8E%BB%E5%84%BF&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;玻儿&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%86%9C%E7%8E%89&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;膜玉&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%87%AF%E7%AD%A3%E4%B8%9D%E6%B1%80&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;凯筣丝汀&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt;
                                        </textarea>
                                    </div>
                                    <div class="pop_item clearfix">
                                        <textarea>
                                            &lt;dl&gt; &lt;dt&gt;洗发护发&lt;/dt&gt; &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%97%E5%8F%91%E6%B0%B4&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;洗发水&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8A%A4%E5%8F%91%E7%B4%A0&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;护发素&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8A%A4%E5%8F%91%E7%B2%BE%E5%8D%8E&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;护发精华&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8F%91%E8%86%9C&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;发膜&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%BE%8E%E5%8F%91%E9%80%A0%E5%9E%8B&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;美发造型&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%97%E6%8A%A4%E5%A5%97%E8%A3%85&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;洗护套装&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;沐浴润肤&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B2%90%E6%B5%B4%E9%9C%B2&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;沐浴露&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E7%9A%82&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;香皂&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B5%B4%E5%AE%9D&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;浴宝&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B6%A6%E8%82%A4%E4%B9%B3&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;润肤乳&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8A%A4%E6%89%8B%E9%9C%9C&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;护手霜&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%97%E6%89%8B%E6%B6%B2&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;洗手液&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;口腔护理&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%89%99%E5%88%B7&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;牙刷&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%89%99%E8%86%8F&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;牙膏&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%BC%B1%E5%8F%A3%E6%B0%B4&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;漱口水&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;欧美品牌&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A3%98%E6%9F%94&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;飘柔&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B5%B7%E9%A3%9E%E4%B8%9D&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;海飞丝&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%A4%9A%E8%8A%AC&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;多芬&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%96%BD%E5%8D%8E%E8%94%BB&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;施华蔻&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%AC%A7%E8%8E%B1%E9%9B%85&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt; 欧莱雅&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B2%99%E5%AE%A3&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;沙宣&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%BD%98%E5%A9%B7&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;潘婷&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B8%85%E6%89%AC&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;清扬&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%B8%9D%E8%95%B4&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;丝蕴&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;日韩品牌&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%B8%9D%E8%93%93%E7%BB%AE&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;丝蓓绮&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%90%95&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;吕&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%BA%B7%E7%BB%AE%E5%A2%A8%E4%B8%BD&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;康绮墨丽&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%8B%AE%E7%8E%8B&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;狮王&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9A%93%E4%B9%90%E9%BD%BF&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;皓乐齿&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%88%B1%E6%95%AC+&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;爱敬&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;国货品牌&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8D%9A%E5%80%A9&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;博倩&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%AE%A3%E7%90%AA&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;宣琪&lt;/a&gt; &lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%A6%87%E7%82%8E%E6%B4%81&amp;from=all_null_index_nav_right_null&amp;cat=&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;妇炎洁&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt;
                                        </textarea>
                                    </div>
                                    <div class="pop_item clearfix">
                                        <textarea>
                                            &lt;dl&gt; &lt;dt&gt;女士上装&lt;/dt&gt; &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=784&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;T恤&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=786&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;衬衫&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=789&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;雪纺衫&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=791&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;毛衣/针织衫&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=796&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;马夹&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=798&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;吊带/背心&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=800&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;卫衣/绒衫&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;女士下装&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=804&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;连衣裙&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=807&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;短裙&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=810&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;牛仔裤&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=812&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;长裤&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=815&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;短裤/热裤&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=817&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;打底裤&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;女士外套&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=820&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;小西装&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=2081&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;短外套&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=824&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;风衣&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=826&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;羽绒服&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=828&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;毛呢外套&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=830&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;棉衣棉服&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=832&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;皮衣&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;男士上装&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=544&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;T恤/Polo衫&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=547&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;衬衫&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=550&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;背心/马甲&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=555&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;卫衣/帽衫&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=558&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;毛衣/针织衫&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=570&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;夹克&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=572&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;皮衣&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=576&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;风衣&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=578&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;羽绒服&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=580&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;棉衣&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=582&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;毛呢大衣&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=584&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;西服&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;男士下装&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=562&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;牛仔裤&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=564&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;长裤&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=567&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;短裤&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;女士内衣&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=949&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;内衣&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=966&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;内裤&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=979&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;睡衣/家居服&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=994&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;保暖内衣&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1003&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;袜子&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1021&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;塑身/美体&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt;
                                        </textarea>
                                    </div>
                                    <div class="pop_item clearfix">
                                        <textarea>
                                            &lt;dl&gt; &lt;dt&gt;女鞋&lt;/dt&gt; &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=751&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;清凉凉鞋&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=757&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;时尚单鞋&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=766&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;休闲帆布鞋&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=769&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;魅力女鞋&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;男鞋&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=742&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;商务正装&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=744&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;商务休闲&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=746&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;日常休闲&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=748&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;运动休闲&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;时尚包&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=487&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;钱包/卡包&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=499&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;单肩包/挎包/手包&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=630&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;双肩背包&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;功能包&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=518&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;旅行箱包&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=527&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;商务公文包&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=534&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;电脑包/摄影包&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt;
                                            &lt;dt&gt;珠宝&lt;/dt&gt; &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=878&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;手链/手镯&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=883&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;项链/吊坠&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=888&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;戒指&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=868&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;耳环&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;饰品&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=919&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;手表&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=924&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;眼镜&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=929&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;腰带&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=934&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;帽子&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=941&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;围巾&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt;
                                        </textarea>
                                    </div>
                                    <div class="pop_item clearfix">
                                        <textarea>
                                            &lt;dl&gt; &lt;dt&gt;小家电&lt;/dt&gt; &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1049&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;3C配件&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1055&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;厨房电器&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1066&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;生活电器&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1076&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;影音电器&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1084&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;护理按摩&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1094&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;灯具&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;厨具&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1100&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;烹饪厨具&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1110&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;烹饪工具&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1120&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;收纳保鲜&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1126&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;水具酒具&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1136&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;餐具&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;家居日用&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1142&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;打火机&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1146&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;指甲剪&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1148&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;收纳用品&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1158&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;雨伞雨具&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1162&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;卫浴用品&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1168&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;净化除味&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1173&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;家居饰品&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1440&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;清洁用品&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1364&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;家纺&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;食品零售&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=440&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;小零食&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1877&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;饼干蛋糕&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1923&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;冲饮谷物&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=441&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt; 冲饮&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;幼儿奶粉&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1374&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;一段奶粉&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1376&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;二段奶粉&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1378&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;三段奶粉&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1380&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;四段奶粉&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1314&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;驱蚊用品&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt&gt;母婴&lt;/dt&gt;
                                            &lt;dd&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1629&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;童鞋&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1549&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;玩具&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1587&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;童装&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1664&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;妈妈专区&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1690&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;儿童寝具&lt;/a&gt; &lt;a href="http://pop.jumei.com/list?filter=0-11-1&amp;cat=1403&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank"&gt;纸尿裤&lt;/a&gt; &lt;/dd&gt; &lt;/dl&gt;
                                        </textarea>
                                    </div>
                                </div>
                                <div class="pop_list_wrap">
                                    <ul class="pop_list">
                                        <li class="t1 current">
                                            <a href="http://search.jumei.com/?filter=0-11-1&amp;search=&amp;cat=1&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            target="_blank">
                                                面部护理
                                            </a>
                                            <b>
                                            </b>
                                        </li>
                                        <li class="t2">
                                            <a href="http://search.jumei.com/?filter=0-11-1&amp;search=&amp;cat=3,34&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            class="t2_link" target="_blank">
                                                彩妆香氛
                                            </a>
                                            <b>
                                            </b>
                                        </li>
                                        <li class="t3">
                                            <a href="http://search.jumei.com/?filter=0-11-1&amp;search=&amp;cat=21&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            class="t3_link" target="_blank">
                                                身体护理
                                            </a>
                                            <b>
                                            </b>
                                        </li>
                                        <li class="t4">
                                            <a href="http://pop.jumei.com/dress_sport?&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            class="t4_link" target="_blank">
                                                服饰/内衣
                                            </a>
                                            <b>
                                            </b>
                                        </li>
                                        <li class="t5">
                                            <a href="http://pop.jumei.com/shoe_bag?&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            class="t5_link" target="_blank">
                                                鞋包/配饰
                                            </a>
                                            <b>
                                            </b>
                                        </li>
                                        <li class="t6">
                                            <a href="http://pop.jumei.com/home_baby?&amp;from=all_null_index_nav_right_null&amp;lo=3478&amp;mat=37918"
                                            class="t6_link" target="_blank">
                                                居家/母婴
                                            </a>
                                            <b>
                                            </b>
                                        </li>
                                    </ul>
                                    <div class="header_searchbox">
                                        <form action="http://search.jumei.com" method="get" pos="top" class=""
                                        onsubmit="return mall_search_validate(this)">
                                            <input name="filter" value="0-11-1" type="hidden">
                                            <input value="面膜" name="search" class="header_search_input" id="mall_search_input"
                                            default_val="面膜" autocomplete="off" x-webkit-speech="" x-webkit-grammar="builtin:search"
                                            lang="zh" type="text">
                                            <input name="from" type="hidden">
                                            <input name="cat" type="hidden">
                                            <button type="submit" class="header_search_btn">
                                                搜美妆
                                            </button>
                                        </form>
                                        <div class="search_result_pop_a" id="top_search_pop_div">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 查看分类(广告位) end -->
                    </li>
                    <li class="item_more">
                        <a href="javascript:void(0)">
                            更多
                            <s class="icon_arrow icon_arrow_down">
                            </s>
                        </a>
                        <i class="icon_arrow_back">
                        </i>
                        <div class="sub_nav">
                            <ul>
                                <li>
                                    <a href="http://i.jumei.com/i/account/referrals/" target="_blank" rel="nofollow">
                                        邀请好友
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" rel="nofollow" id="bookmark_us">
                                        <span class="bottomline">
                                            加入收藏
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://weibo.com/tuanmei" class="er_box" rel="nofollow" target="_blank">
                                        新浪微博
                                        <span style="display: none;">
                                            <img src="/Public/Home/srcs/sina_er.png">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="er_box" rel="nofollow">
                                        聚美微信
                                        <span style="display: none;">
                                            <img src="/Public/Home/srcs/jumei_weixin_header1.png">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://tieba.baidu.com/f?kw=%BE%DB%C3%C0%D3%C5%C6%B7&amp;fr=ala0"
                                    class="er_box" target="_blank">
                                        百度贴吧
                                    </a>
                                </li>
                                <li>
                                    <a href="http://t.qq.com/jumei_tuangou" class="er_box" rel="nofollow"
                                    target="_blank">
                                        腾讯微博
                                        <span style="display: none;">
                                            <img src="/Public/Home/srcs/qq_er.png">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://page.renren.com/601021070" class="er_box" rel="nofollow"
                                    target="_blank">
                                        人人公众主页
                                        <span style="display: none;">
                                            <img src="/Public/Home/srcs/renren_er.png">
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <!--right list end-->
            </div>
        </div>
        <!--header top end-->
        <!--header middle-->
        <div class="header_center">
            <h1 class="logo">
                <a href="http://www.jumei.com/" id="home" title="聚美优品" style="background:url(<?php echo ($webinfo["logo"]); ?>) no-repeat top left;">
                    化妆品品牌排行榜大全网站聚美优品
                </a>
            </h1>
            <!-- 活动、节日入口广告位 -->
            <!-- 活动、节日入口广告位 end -->
            <!--商城页面加 -->
            <!-- <h2 class="sub_mall_logo"><a href="http://mall.jumeihmy.com" title="聚美优品美妆商城">聚美优品美妆商城</a></h2>-->
            <div class="header_searchbox header_out_searchbox">
                <form action="<?php echo U('Home/Search/index'.$url);?>" method="get">
                
                <input value="补水" name="gname" class="header_search_input" id="mall_search_input1" lang="zh" type="text" onfocus="this.value=''">
                
                <button type="submit" class="header_search_btn">搜索</button>
                </form>
                <div class="search_result_pop_a" id="top_out_search_pop_div">
                </div>
                <ul class="hot_word">
                    <li>
                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%BF%9D%E6%B9%BF"
                        target="_blank">
                            保湿
                        </a>
                        <s class="line">
                        </s>
                    </li>
                    <li>
                        <a target="_blank" href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E8%86%9C">
                            面膜
                        </a>
                        <s class="line">
                        </s>
                    </li>
                    <li>
                        <a target="_blank" href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%97%E9%9D%A2%E5%A5%B6">
                            洗面奶
                        </a>
                        <s class="line">
                        </s>
                    </li>
                    <li>
                        <a target="_blank" href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%A1%A5%E6%B0%B4">
                            补水
                        </a>
                        <s class="line">
                        </s>
                    </li>
                    <li>
                        <a target="_blank" href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E6%B0%B4">
                            香水
                        </a>
                        <s class="line">
                        </s>
                    </li>
                    <li>
                        <a target="_blank" href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E9%9C%9C">
                            眼霜
                        </a>
                        <s class="line">
                        </s>
                    </li>
                    <li>
                        <a target="_blank" href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8F%A3%E7%BA%A2">
                            口红
                        </a>
                        <s class="line">
                        </s>
                    </li>
                    <li>
                        <a target="_blank" href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8A%A4%E8%82%A4%E5%A5%97%E8%A3%85">
                            护肤套装
                        </a>
                        <s class="line">
                        </s>
                    </li>
                    <li>
                        <a target="_blank" href="http://search.jumei.com/?filter=0-11-1&amp;search=BB%E9%9C%9C">
                            BB霜
                        </a>
                    </li>
                </ul>
            </div>
            <div id="cart_box" class="cart_box">
                <a id="cart" class="cart_link" href="<?php echo U('Home/Cart/index');?>"
                rel="nofollow">
                    <img src="/Public/Home/srcs/cart.gif" class="cart_gif" height="28"
                    width="28">
                    <span class="text">
                        去购物车结算
                    </span>
                    <?php if($_SESSION['cart']){ ?>
                    <span class="num">

                    <?php } foreach($_SESSION['cart'] as $k=>$v){ $totalnum1 +=$v['num']; } echo $totalnum1; ?>
                    </span>
                    <s class="icon_arrow_right">
                    </s>
                </a>
                <div class="cart_content" id="cart_content">
                    <i class="cart-icons">
                    </i>
                    <div class="cart_content_null">
                        购物车中还没有商品，
                        <br>
                        快去挑选心爱的商品吧！
                    </div>
                    <div class="cart_content_all">
                        <div class="cart_left_time">
                            已超过购物车商品保留时间，请尽快结算。
                        </div>
                        <div class="cart_content_center">
                        </div>
                        <div class="con_all">
                            <div class="price_whole">
                                <span>
                                    共
                                    <span class="num_all">
                                    </span>
                                    件商品
                                </span>
                            </div>
                            <div>
                                <span class="price_gongji">
                                    共计
                                    <em>
                                        ￥
                                    </em>
                                    <span class="total_price">
                                        69
                                    </span>
                                </span>
                                <a href="http://cart.jumei.com/i/cart/show/?from=header_cart" class="cart_btn"
                                rel="nofollow">
                                    去购物车结算
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middle end-->
        <!--header bottom-->
        
            <div class="header_bottom">
                <div class="channel_nav_box">
                    <div class="channel_nav_list_wrap">
                        <ul class="channel_nav_list">
                            <li>
                                <a href="<?php echo U('Home/Index/index');?>" class="home">
                                    首页
                                </a>
                            </li>
                            <li class="haitao_li">
                                <a href="#">
                                    极速免税店
                                </a>
                            </li>
                            <li class="gif_301_wrap">
                                <a target="_blank" href="#"
                                class="gif_301">
                                    <img src="/Public/Home/srcs/muy1.gif">
                                </a>
                            </li>
                            <li class="current">
                                <a href="<?php echo U('Home/Index/index');?>">
                                    美妆商城
                                    <b>
                                    </b>
                                </a>
                                <textarea class="pop_act_area hide">
                                    &lt;div class="mz_imglist"&gt; &lt;a target="_blank" href="http://beauty.jumei.com?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"&gt;&lt;img
                                    src="http://p0.jmstatic.com/banner/3481/30573_254_135_003-web.jpg" /&gt;&lt;/a&gt;
                                    &lt;a target="_blank" href="http://mall.jumei.com/xihu?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"&gt;&lt;img
                                    src="http://p0.jmstatic.com/banner/3481/30573_254_135_005-web.jpg" /&gt;&lt;/a&gt;
                                    &lt;/div&gt; &lt;div class="mz_inner clearfix"&gt; &lt;dl style="border-left:none"&gt;
                                    &lt;dt class="item_int png"&gt;&lt;a&gt; 国际大牌&lt;/a&gt;&lt;/dt&gt; &lt;dd&gt;&lt;a
                                    href="http://lancome.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;兰蔻&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://clarins.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;娇韵诗&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9B%85%E8%AF%97%E5%85%B0%E9%BB%9B&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;雅诗兰黛&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://loreal.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;欧莱雅&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://laneige.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;兰芝&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://clinique.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;倩碧&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://skii.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;SK-II&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9B%85%E6%BC%BE&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;雅漾&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://jurlique.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;茱莉蔻&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://innisfree.jumei.com?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;悦诗风吟&lt;/a&gt;&lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt
                                    class="item_hufu png"&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=护肤&amp;
                                    from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573" target="_blank"&gt;
                                    护肤&lt;/a&gt;&lt;/dt&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%81%E9%9D%A2&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;洁面&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%88%BD%E8%82%A4%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;爽肤水&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%BE%E5%8D%8E&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;精华&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%B9%B3%E6%B6%B2&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;乳液&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E9%9C%9C&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;面霜&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E9%9C%9C&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;眼霜&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E8%86%9C&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;面膜&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8A%A4%E8%82%A4%E5%A5%97%E8%A3%85&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;护肤套装&lt;/a&gt;&lt;/dd&gt; &lt;/dl&gt; &lt;dl&gt; &lt;dt
                                    class="item_caizhuang png"&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%BD%A9%E5%A6%86&amp;from=all_null_index_top_nav_cosmetics&amp;cat=&amp;bid=1&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;彩妆&lt;/a&gt;&lt;/dt&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8D%B8%E5%A6%86&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;卸妆&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=BB%E9%9C%9C&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;BB霜&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%89%E5%BA%95%E6%B6%B2&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;粉底液&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%89%E9%A5%BC&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;粉饼&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E5%BD%B1&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;眼影&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E7%BA%BF%E7%AC%94&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;眼线笔&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9D%AB%E6%AF%9B%E8%86%8F&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;睫毛膏&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%89%E7%AC%94&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;眉笔&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8F%A3%E7%BA%A2&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;口红&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%85%AE%E7%BA%A2&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;腮红&lt;/a&gt;&lt;/dd&gt; &lt;/dl&gt; &lt;dl style="border-bottom:none;border-left:none"&gt;
                                    &lt;dt class="item_xiangfen png"&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;香氛&lt;/a&gt;&lt;/dt&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%A5%B3%E5%A3%AB%E9%A6%99%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;女士香水&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E9%A6%99%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;男士香水&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%B8%AD%E6%80%A7%E9%A6%99%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;中性香水&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E6%B0%B4+5ml&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;Q版香水&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E6%B0%B4%E5%A5%97%E8%A3%85&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;香水套装&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%BE%E6%B2%B9&amp;cat=197&amp;bid=2_c&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;精油&lt;/a&gt;&lt;/dd&gt; &lt;/dl&gt; &lt;dl style="border-bottom:none"&gt;
                                    &lt;dt class="item_nanshi png"&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=男士护理&amp;
                                    from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573" target="_blank"&gt;男士专区&lt;/a&gt;&lt;/dt&gt;
                                    &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%81%E9%9D%A2&amp;cat=418&amp;bid=2_c&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;洁面&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E7%88%BD%E8%82%A4%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;爽肤水&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E9%9C%9C&amp;cat=418&amp;bid=2_c&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;面霜&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%BE%E5%8D%8E&amp;cat=418&amp;bid=2_c&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;精华&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E5%A5%97%E8%A3%85&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;护肤套装&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E6%B4%97%E5%8F%91&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;洗发&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E6%B2%90%E6%B5%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;沐浴&lt;/a&gt;&lt;/dd&gt; &lt;/dl&gt; &lt;dl style="border-bottom:none"&gt;
                                    &lt;dt class="item_hot png"&gt;&lt;a&gt;热门搜索&lt;/a&gt;&lt;/dt&gt; &lt;dd&gt;&lt;a
                                    href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E8%86%9C%E8%B4%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;面膜贴&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%97%E9%9D%A2%E5%A5%B6&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;洗面奶&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%94%87%E8%86%8F&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;唇膏&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8E%BB%E9%BB%91%E5%A4%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;去黑头&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%A5%9B%E6%96%91&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;祛斑&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9A%94%E7%A6%BB&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;隔离&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%A5%9B%E7%97%98&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;祛痘&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8E%BB%E8%A7%92%E8%B4%A8&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;去角质&lt;/a&gt;&lt;/dd&gt; &lt;dd&gt;&lt;a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8C%87%E7%94%B2%E6%B2%B9&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                    target="_blank"&gt;指甲油&lt;/a&gt;&lt;/dd&gt; &lt;/dl&gt; &lt;/div&gt;
                                </textarea>
                            </li>
                            <li class="gif_301_wrap">
                                <a target="_blank" href="#"
                                class="gif_301">
                                    <img src="/Public/Home/srcs/lux2.jpg">
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    服装运动
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="#">
                                    鞋包配饰
                                </a>
                            </li>
                        </ul>
                        <div style="display: none;" class="header_pop_subAtc box-shadow" id="header_pop_subAct">
                            <div class="mz_imglist">
                                <a target="_blank" href="http://beauty.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573">
                                    <img src="/Public/Home/srcs/30573_254_135_003-web.jpg">
                                </a>
                                <a target="_blank" href="http://mall.jumei.com/xihu?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573">
                                    <img src="/Public/Home/srcs/30573_254_135_005-web.jpg">
                                </a>
                            </div>
                            <div class="mz_inner clearfix">
                                <dl style="border-left:none">
                                    <dt class="item_int png">
                                        <a>
                                            国际大牌
                                        </a>
                                    </dt>
                                    <dd>
                                        <a href="#"
                                        target="_blank">
                                            兰蔻
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="#"
                                        target="_blank">
                                            娇韵诗
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9B%85%E8%AF%97%E5%85%B0%E9%BB%9B&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            雅诗兰黛
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://loreal.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            欧莱雅
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://laneige.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            兰芝
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://clinique.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            倩碧
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://skii.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            SK-II
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9B%85%E6%BC%BE&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            雅漾
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://jurlique.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            茱莉蔻
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://innisfree.jumei.com/?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            悦诗风吟
                                        </a>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt class="item_hufu png">
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8A%A4%E8%82%A4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            护肤
                                        </a>
                                    </dt>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%81%E9%9D%A2&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            洁面
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%88%BD%E8%82%A4%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            爽肤水
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%BE%E5%8D%8E&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            精华
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%B9%B3%E6%B6%B2&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            乳液
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E9%9C%9C&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            面霜
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E9%9C%9C&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            眼霜
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E8%86%9C&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            面膜
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8A%A4%E8%82%A4%E5%A5%97%E8%A3%85&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            护肤套装
                                        </a>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt class="item_caizhuang png">
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%BD%A9%E5%A6%86&amp;from=all_null_index_top_nav_cosmetics&amp;cat=&amp;bid=1&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            彩妆
                                        </a>
                                    </dt>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8D%B8%E5%A6%86&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            卸妆
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=BB%E9%9C%9C&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            BB霜
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%89%E5%BA%95%E6%B6%B2&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            粉底液
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%89%E9%A5%BC&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            粉饼
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E5%BD%B1&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            眼影
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%BC%E7%BA%BF%E7%AC%94&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            眼线笔
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9D%AB%E6%AF%9B%E8%86%8F&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            睫毛膏
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%9C%89%E7%AC%94&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            眉笔
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8F%A3%E7%BA%A2&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            口红
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E8%85%AE%E7%BA%A2&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            腮红
                                        </a>
                                    </dd>
                                </dl>
                                <dl style="border-bottom:none;border-left:none">
                                    <dt class="item_xiangfen png">
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            香氛
                                        </a>
                                    </dt>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%A5%B3%E5%A3%AB%E9%A6%99%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            女士香水
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E9%A6%99%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            男士香水
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E4%B8%AD%E6%80%A7%E9%A6%99%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            中性香水
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E6%B0%B4+5ml&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            Q版香水
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E6%B0%B4%E5%A5%97%E8%A3%85&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            香水套装
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%BE%E6%B2%B9&amp;cat=197&amp;bid=2_c&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            精油
                                        </a>
                                    </dd>
                                </dl>
                                <dl style="border-bottom:none">
                                    <dt class="item_nanshi png">
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E6%8A%A4%E7%90%86&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            男士专区
                                        </a>
                                    </dt>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%81%E9%9D%A2&amp;cat=418&amp;bid=2_c&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            洁面
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E7%88%BD%E8%82%A4%E6%B0%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            爽肤水
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E9%9C%9C&amp;cat=418&amp;bid=2_c&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            面霜
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%B2%BE%E5%8D%8E&amp;cat=418&amp;bid=2_c&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            精华
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E5%A5%97%E8%A3%85&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            护肤套装
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E6%B4%97%E5%8F%91&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            洗发
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%94%B7%E5%A3%AB%E6%B2%90%E6%B5%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            沐浴
                                        </a>
                                    </dd>
                                </dl>
                                <dl style="border-bottom:none">
                                    <dt class="item_hot png">
                                        <a>
                                            热门搜索
                                        </a>
                                    </dt>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E8%86%9C%E8%B4%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            面膜贴
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%B4%97%E9%9D%A2%E5%A5%B6&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            洗面奶
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%94%87%E8%86%8F&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            唇膏
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8E%BB%E9%BB%91%E5%A4%B4&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            去黑头
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%A5%9B%E6%96%91&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            祛斑
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9A%94%E7%A6%BB&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            隔离
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E7%A5%9B%E7%97%98&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            祛痘
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%8E%BB%E8%A7%92%E8%B4%A8&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            去角质
                                        </a>
                                    </dd>
                                    <dd>
                                        <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8C%87%E7%94%B2%E6%B2%B9&amp;from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573"
                                        target="_blank">
                                            指甲油
                                        </a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <!--导航icon 动画-->
                        <ul id="icon_wrap" class="icon_Wrap">
                            <li>
                                <div class="divlist divlist01">
                                    <a href="http://hd.jumei.com/act/6-478-2230-aca.html?from=top">
                                        <span class="">
                                        </span>
                                        <b>
                                            品牌防伪码
                                        </b>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="divlist divlist02">
                                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=header#unconditionally_backtrack">
                                        <span class="th">
                                        </span>
                                        <b>
                                            美妆30天无理由退货
                                        </b>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div class="divlist divlist03">
                                    <a href="http://www.jumei.com/help/two_for_freeshipping?from=header">
                                        <span class="by">
                                        </span>
                                        <b>
                                            美妆满2件或299包邮
                                        </b>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <!--导航icon 动画 end-->
                    </div>
                </div>
            </div>
            <!--header bottom end-->
    </div>
    <!-- 子系统内容区域代码 start -->
    <div class="mall_nav_list_wrap_new" id="mall_nav_box">
        <div class="mall_nav_list_wrap w1090">
            <ul class="mall_nav_list clearfix">
                <li class="current">
                    <a href="http://mall.jumei.com/?form=Mall_show_nav_fresh_index">
                        美妆商城首页
                    </a>
                </li>
                <li>
                    <a href="http://mall.jumei.com/xihu?form=Mall_show_nav_fresh_new_2">
                        个人护理
                    </a>
                </li>
                <li id="Mall_shepingmeizhuang">
                    <a href="http://mall.jumei.com/luxury?form=Mall_show_nav_fresh_luxury">
                        奢品美妆
                    </a>
                </li>
                <li class="">
                    <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E6%8A%A4%E8%82%A4">
                        护肤
                    </a>
                </li>
                <li>
                    <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%BD%A9%E5%A6%86">
                        彩妆
                    </a>
                </li>
                <li>
                    <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%A6%99%E6%B0%B4">
                        香氛
                    </a>
                </li>
            </ul>
            <span style="width: 112px; left: 26px;" class="mall_line">
                &nbsp;
            </span>
        </div>
    </div>
    
    <div id="container">
            <div id="bread_container">
                <a id="bread_prev" href="javascript:void(0);">
                </a>
                <div class="bread_container_con">
                    <div class="search_crumb clearfix" style="width:1090px">
                        <?php if($lay['layer'] == 1): ?><ul class="clearfix fl bread_ul">
                                <li class="bread_first_item">
                                    <a href="<?php echo U('Home/Index1/index');?>">
                                        化妆品首页
                                    </a>
                                </li>
                                <li>
                                    <span>
                                        &gt;
                                    </span>
                                </li>
                            </ul>
                            <div class="selected_panel">
                                <p style="display: none;" id="cat_id">
                                    1
                                </p>
                                <p id="<?php echo ($lay['id']); ?>">
                                    <?php echo ($lay['name']); ?>
                                    </a>
                                </p>
                                <div style="width: 242px; display: none;" class="sub_selected_panel clearfix"
                                id="J_sub_selected_panel">
                                    <ul class="clearfix">
                                        <?php if(is_array($lay1)): foreach($lay1 as $key=>$vo): ?><li>
                                                <a href="<?php echo U('Home/Search/index',array('cate'=>$vo['id']));?>">
                                                    <?php echo ($vo['name']); ?>
                                                </a>
                                            </li><?php endforeach; endif; ?>
                                    </ul>
                                    <ul class="clearfix">
                                        <?php if(is_array($cateinfo)): foreach($cateinfo as $key=>$vo): ?><li>
                                                <a href="<?php echo U('Home/Search/index',array('cate'=>$vo['id']));?>">
                                                    <?php echo ($vo['name']); ?>
                                                </a>
                                            </li><?php endforeach; endif; ?>
                                    </ul>
                                    <i class="arrow_tri1">
                                    </i>
                                    <i class="arrow_tri">
                                    </i>
                                </div>
                                <div style="width: 242px;" class="hover_mask">
                                </div>
                            </div>
                                <?php if($price == null): else: ?>
                                <p class="search_gt">
                                    >
                                </p><?php endif; ?>
                            <div class="filter_choosed_item_wrap">
                                <?php if($price == null): else: ?>

                                    <div id='effect_warp' class='filter_choosed_item'>
                                        <span title='价格:0-139' class='next_selected_bor'>价格:<?php echo ($price); ?></span><a href="<?php echo U('Home/Search/index'.$url,array('delete'=>'1'));?>"></a>
                                        <div class='clear'></div>
                                    </div><?php endif; ?>
                            </div>
                            <?php elseif($lay['layer'] == 2): ?>
                            <ul class="clearfix fl bread_ul">
                                <li class="bread_first_item">
                                    <a href="<?php echo U('Home/Index1/index');?>">
                                        化妆品首页
                                    </a>
                                </li>
                                <li>
                                    <span>
                                        &gt;
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a href="<?php echo U('Home/Search/index',array('cate'=>$layp['id']));?>">
                                            <?php echo ($layp['name']); ?>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        &gt;
                                    </span>
                                </li>
                            </ul>
                            <div class="selected_panel">
                                <p style="display: none;" id="cat_id">
                                    1
                                </p>
                                <p id="<?php echo ($lay['id']); ?>">
                                    <?php echo ($lay['name']); ?>
                                    </a>
                                </p>
                                <div style="width: 242px; display: none;" class="sub_selected_panel clearfix"
                                id="J_sub_selected_panel">
                                    <ul class="clearfix">
                                        <?php if(is_array($lays)): foreach($lays as $key=>$vo): ?><li>
                                                <a href="<?php echo U('Home/Search/index',array('cate'=>$vo['id']));?>">
                                                    <?php echo ($vo['name']); ?>
                                                </a>
                                            </li><?php endforeach; endif; ?>
                                    </ul>
                                    <ul class="clearfix">
                                        <?php if(is_array($cateinfo)): foreach($cateinfo as $key=>$vo): ?><li>
                                                <a href="<?php echo U('Home/Search/index',array('cate'=>$vo['id']));?>">
                                                    <?php echo ($vo['name']); ?>
                                                </a>
                                            </li><?php endforeach; endif; ?>
                                    </ul>
                                    <i class="arrow_tri1">
                                    </i>
                                    <i class="arrow_tri">
                                    </i>
                                </div>
                                <div style="width: 242px;" class="hover_mask">
                                </div>
                            </div>
                            <?php if($price == null): else: ?>
                                <p class="search_gt">
                                    >
                                </p><?php endif; ?>
                            <div class="filter_choosed_item_wrap">
                                <?php if($price == null): else: ?>
                                    <div id='effect_warp' class='filter_choosed_item'>
                                        <span title='价格:0-139' class='next_selected_bor'>价格:<?php echo ($price); ?></span><a href="<?php echo U('Home/Search/index'.$url,array('delete'=>'1'));?>"></a>
                                        <div class='clear'></div>
                                    </div><?php endif; ?>
                            </div>
                            <?php elseif($lay['layer'] == 3): ?>
                            <ul class="clearfix fl bread_ul">
                                <li class="bread_first_item">
                                    <a href="<?php echo U('Home/Index1/index');?>">
                                        化妆品首页
                                    </a>
                                </li>
                                <li>
                                    <span>
                                        &gt;
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <a href="<?php echo U('Home/Search/index',array('cate'=>$layp['id']));?>">
                                            <?php echo ($layp['name']); ?>
                                        </a>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        &gt;
                                    </span>
                                </li>
                            </ul>
                            <div class="selected_panel">
                                <p style="display: none;" id="cat_id">
                                    1
                                </p>
                                <p id="<?php echo ($lay['id']); ?>">
                                    <?php echo ($lays2['name']); ?>
                                    </a>
                                </p>
                                <div style="width: 242px; display: none;" class="sub_selected_panel clearfix"
                                id="J_sub_selected_panel">
                                    <ul class="clearfix">
                                        <?php if(is_array($lays)): foreach($lays as $key=>$vo): ?><li>
                                                <a href="<?php echo U('Home/Search/index',array('cate'=>$vo['id']));?>">
                                                    <?php echo ($vo['name']); ?>
                                                </a>
                                            </li><?php endforeach; endif; ?>
                                    </ul>
                                    <ul class="clearfix">
                                        <?php if(is_array($layg)): foreach($layg as $key=>$vo): ?><li>
                                                <a href="<?php echo U('Home/Search/index',array('cate'=>$vo['id']));?>">
                                                    <?php echo ($vo['name']); ?>
                                                </a>
                                            </li><?php endforeach; endif; ?>
                                    </ul>
                                    <i class="arrow_tri1">
                                    </i>
                                    <i class="arrow_tri">
                                    </i>
                                </div>
                                <div style="width: 242px;" class="hover_mask">
                                </div>
                            </div>
                            <p class="search_gt">
                                >
                            </p>
                            <div class="filter_choosed_item_wrap">
                                <!--当前选择的分类-->
                                <div id="classification_warp" class="filter_choosed_item">
                                    <span title="分类:面膜贴" class="next_selected_bor">
                                        分类:<?php echo ($lay['name']); ?>
                                    </span>
                                    <a href="<?php echo U('Home/Search/index',array('cate'=>$lays2['id']));?>">
                                    </a>
                                    <div class="clear">
                                    </div>
                                </div>
                                <?php if($price == null): else: ?>
                                    <div id='effect_warp' class='filter_choosed_item'>
                                        <span title='价格:0-139' class='next_selected_bor'>价格:<?php echo ($price); ?></span><a href="<?php echo U('Home/Search/index'.$url,array('delete'=>'1'));?>"></a>
                                        <div class='clear'></div>
                                    </div><?php endif; ?>
                            </div>
                        <?php else: ?>
                             <ul class="clearfix fl bread_ul">
                                <li class="bread_first_item">
                                    <a href="<?php echo U('Home/Index1/index');?>">
                                        化妆品首页
                                    </a>
                                </li>
                              </ul><?php endif; ?>
                        <!----右侧搜索框 start ---->
                        <div class="right_search" id="J_bread_search">
                            <form action="/" method="get" target="_self">
                                <span class="search_gt_1">
                                    &gt;
                                </span>
                                <span class="bread_search_title" id="J_bread_search_title">
                                </span>
                                <input class="bread_search_input" name="search" id="J_bread_search_input"
                                type="text">
                                <input value="" class="bread_search_img" id="J_right_search_submit" type="submit">
                            </form>
                        </div>
                        <!----右侧搜索框 end---->
                    </div>
                </div>
                <a id="bread_next" href="javascript:void(0);">
                </a>
            </div>
            <div id="body">
                <div id="search_result_wrap">
                    <!--存在搜索结果显示的 页面内容 start-->
                    <div class="search_info" id="J_search_info">
                    </div>
                    <div class="search_filter_title">
                        <div class="search_filter_top">
                            <strong>
                                在
                                <span>
                                    面部护肤
                                </span>
                                中筛选
                                <label>
                                    （多选模式，每个属性最多可同时选5个选项）
                                </label>
                            </strong>
                        </div>
                    </div>
                   <?php if($lay['layer'] != null): ?><div class="search_filter">
                      
                        <div class="filter_con">
                            <div class="filter_tit">
                                <p class="filter_brand_span clearfix">
                                    <span class="filter_brand_span_keyword">
                                        <?php echo ($lay['name']); ?>&nbsp;
                                    </span>
                                    下
                                </p>
                                <span>
                                    分类:
                                </span>
                            </div>
                            <div style="height: auto;" class="filter_attrs" id="filter_cat">
                                <ul>
                                    <?php if(is_array($cateinfo)): foreach($cateinfo as $key=>$vo): ?><li class="" title="面膜">
                                            <a name="14" id="item_1_14" href="<?php echo U('Home/Search/index'.$url,array('cate'=>$vo['id']));?>">
                                                <?php echo ($vo['name']); ?>
                                            </a>
                                        </li><?php endforeach; endif; ?>
                                </ul>
                                <div class="placeholder_line">
                                </div>
                                <div class="bottom_multi_selecteds">
                                    <label class="filter_tit_wide">
                                        已选分类:
                                    </label>
                                    <div class="bms_container">
                                        <span style="display: none;" class="search_current_item">
                                            1
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="multi_buttons clearfix">
                                <p class="btn_multi_hint">
                                    提示:最多可同时选5个选项
                                </p>
                                <div class="multi_area">
                                    <a href="javascript:;" class="btn_multi_submit" title="确定" id="btn_multi_submit"
                                    name="1">
                                    </a>
                                    <a href="#container" title="重选" class="btn_multi_reset J_btn_multi_reset"
                                    id="btn_multi_reset">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <?php if($price == null): ?><div style="border-bottom: medium none;" class="filter_con">
                            <div class="filter_tit">
                                价格:
                            </div>
                            <div style="height: auto;" class="filter_attrs" id="filter_price">
                                <ul>
                                    <li title="">
                                        <a name="0-139" id="item_3_0-139" href="<?php echo U('Home/Search/index'.$url,array('price'=>'0-139元'));?>">
                                            0-139元
                                        </a>
                                    </li>
                                    <li title="">
                                        <a name="140-329" id="item_3_140-329" href="<?php echo U('Home/Search/index'.$url,array('price'=>'140-329元'));?>">
                                            140-329元
                                        </a>
                                    </li>
                                    <li title="">
                                        <a name="330-809" id="item_3_330-809" href="<?php echo U('Home/Search/index'.$url,array('price'=>'330-809元'));?>">
                                            330-809元
                                        </a>
                                    </li>
                                    <li title="">
                                        <a name="810-1399" id="item_3_810-1399" href="<?php echo U('Home/Search/index'.$url,array('price'=>'810-1399元'));?>">
                                            810-1399元
                                        </a>
                                    </li>
                                    <li title="">
                                        <a name="1400" id="item_3_1400" href="<?php echo U('Home/Search/index'.$url,array('price'=>'1400元以上'));?>">
                                            1400元以上
                                        </a>
                                    </li>
                                </ul>
                                <div class="placeholder_line">
                                </div>
                                <div class="bottom_multi_selecteds">
                                    <label class="filter_tit_wide">
                                        已选价格:
                                    </label>
                                    <div class="bms_container">
                                        <span style="display: none;" class="search_current_item">
                                            3
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="multi_buttons clearfix">
                                <div class="multi_area">
                                    <a href="javascript:;" class="btn_multi_submit" title="确定" id="btn_multi_submit"
                                    name="3">
                                    </a>
                                    <a href="#container" title="重选" class="btn_multi_reset J_btn_multi_reset"
                                    id="btn_multi_reset">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php else: endif; ?>
                    </div>
                   <?php else: endif; ?> 
                    <div id="search_list_wrap">
                        <div style="display:none" id="s_r_t" name="搜索点击流用">
                            1
                        </div>
                        <div class="search_list_head_fiex">
                            <div style="position: static; top: auto; width: 100%;" class="search_list_head">
                                <div class="slh_label">
                                    排序:
                                </div>
                                <ul>
                                    <li <?php if($sort == null): ?>class="selected"<?php else: endif; ?> >
                                        <a class="down" href="<?php echo U('Home/Search/index'.$url,array('sort'=>null));?>">
                                            默认
                                        </a>
                                    </li>
                                    <li  <?php if($sort == null): else: ?>class="selected"<?php endif; ?> >
                                        <a <?php if($sort == 'up'): ?>href="<?php echo U('Home/Search/index'.$url,array('sort'=>'down'));?>"  class="price_sort up"<?php else: ?>href="<?php echo U('Home/Search/index'.$url,array('sort'=>'up'));?>" class="price_sort down"<?php endif; ?>>
                                            价格
                                        </a>
                                    </li>
                                    <li>
                                        <a class="down" href="http://search.jumei.com/?filter=0-41-1&amp;search=&amp;cat=1#search_list_wrap">
                                            销量
                                        </a>
                                    </li>
                                    <li>
                                        <a class="down" href="http://search.jumei.com/?filter=0-01-1&amp;search=&amp;cat=1#search_list_wrap">
                                            人气
                                        </a>
                                    </li>
                                    <li>
                                        <a class="add_time" href="http://search.jumei.com/?filter=0-31-1&amp;search=&amp;cat=1#search_list_wrap">
                                            上架时间
                                        </a>
                                    </li>
                                    <li>
                                        <a class="show_check">
                                            只看特卖
                                        </a>
                                    </li>
                                </ul>
                                <div class="have_stock">
                                    <a href="">
                                        仅显示有货
                                    </a>
                                </div>
                                <!--头部分页-->
                                <div class="head_pagebtn">
                                    <a class="dis prev" href="<?php echo ($url); ?>">
                                        上一页
                                    </a>
                                    <a class="enable next" href="">
                                        下一页
                                    </a>
                                </div>
                                <div class="head_pageInfo">
                                    <span style="color:#ed154b;margin-left: 8px;">
                                        <?php echo ($nowPage); ?>
                                    </span>
                                    /<?php echo ($totalPages); ?>页
                                </div>
                                <div class="head_pagecount">
                                    共
                                    <span>
                                        <?php echo ($count); ?>
                                    </span>
                                    个商品
                                </div>
                            </div>
                        </div>
                        <div class="products_wrap">
                            <ul>
                                <!--deal start-->
                                <?php if(is_array($goods)): foreach($goods as $key=>$vo): ?><li class="hai item" gid="<?php echo ($vo['id']); ?>" price="<?php echo ($vo['price']); ?>" bid="<?php echo ($vo['bid']); ?>"
                                    cate="<?php echo ($vo['cate']); ?>" search_product_type="global_deal" h_p_m_id="ht150604p1299685t2"
                                    product_type="global_deal">
                                        <div class="item_wrap clearfix  ">
                                            <!--商品的hover展示-->
                                            <div class="item_wrap_right">
                                                <div class="s_l_pic">
                                                    <div class="icon_wrap clearfix">
                                                       
                                                    </div>
                                                    <a href="<?php echo U('Home/Details/index',array('id'=>$vo['id']));?>" target="_blank">
                                                        <img src="<?php echo ((isset($vo['spic'] ) && ($vo['spic'] !== ""))?($vo['spic'] ):'./Public/Uploads/avatar_nonesign.jpg'); ?>" style="display: inline;" height="255" width="255">
                                                    </a>
                                                </div>
                                                <div class="s_l_name">
                                                    <a href="<?php echo U('Home/Details/index',array('id'=>$vo['id']));?>" target="_blank">
                                                        <span class="disc">
                                                            <?php echo ($vo["discount"]); ?>折
                                                            <em>
                                                                +包邮
                                                            </em>
                                                            /
                                                        </span>
                                                        <?php echo ($vo["title"]); ?>
                                                    </a>
                                                </div>
                                                <div class="s_l_view_bg">
                                                    <div class="icon_wrap_bot clearfix">
                                                    </div>
                                                    <div class="search_list_price">
                                                        <label>
                                                            ¥
                                                        </label>
                                                        <span>
                                                            <?php echo ($vo["price"]); ?>
                                                        </span>
                                                        <del>
                                                            ¥<?php echo ($vo["cprice"]); ?>
                                                        </del>
                                                    </div>
                                                </div>
                                                <div class="search_deal_buttom_bg clearfix">
                                                </div>
                                                <div class="search_list_button">
                                                    <a class="track_click  zuhe_zhifu_dingjing" title="加入购物车" href="javascript:;">
                                                    </a>
                                                    <a title="收藏商品" <?php if(in_array($vo['id'],$collid)): ?>class="collected" <?php else: ?> class="btn_fav"<?php endif; ?> href="javascript:;"></a>
                                                </div> 
                                                <!--功效-->
                                                <p class="search_list_tags">
                                                    <span>
                                                        保湿
                                                    </span>
                                                    <span>
                                                        补水
                                                    </span>
                                                    <span>
                                                        滋润
                                                    </span>
                                                    <span>
                                                        清爽
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </li><?php endforeach; endif; ?>
                                <!--global deal end-->
                            </ul>
                            <div class="clear">
                            </div>
                        </div>
                        <div style="display:none;">
                            <i id="brand_id">
                            </i>
                            <i id="search_keywords">
                            </i>
                        </div>
                        <div class="page-nav-wrapper">
                            <ul class="page-nav">
                                <li class="current">
                                    <?php echo ($pages); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--存在搜索结果显示的 页面内容 end-->
                    <!--可能喜欢-->
                    <!--最终购买 异步ajax-->
                    <div style="display: none;" class="search_last_buy" search="">
                    </div>
                    <div class="search_footer ">
                        <p class="sf_other">
                        </p>
                        <div class="search_foot_label">
                            搜索全部
                        </div>
                        <div class="search_footer_wrap">
                            <form action="#" method="get">
                                <input name="search" class="" value="补水" id="search_footer_input" default_val="补水"
                                lang="zh" type="text">
                                <button type="submit">
                                    搜索
                                </button>
                            </form>
                            <!--搜索结果容器-->
                            <div class="search_result_pop_a" id="foot_search_pop_div">
                            </div>
                        </div>
                        <div class="clear">
                        </div>
                        <p style="padding: 10px 0 0 76px;" class="bottom_othersearch">
                            <a href="http://search.jumei.com/?filter=4-0-0-0-11-1&amp;search=" target="_blank">
                                去口碑中心搜索
                            </a>
                        </p>
                    </div>
                    <div style="display: block;" class="browse_history_wide" id="browse_history">
                        <div class="title">
                            您最近查看的商品
                            <em>
                                RECENTLY VIEWD ITEMS
                            </em>
                        </div>
                        <div class="bh_content">
                            <!--浏览记录-->
                            <div class="browse_list_wrap fl">
                                <h2 class="browse_tit">
                                    查看记录
                                </h2>
                                <div class="browse_list">
                                    <p style="text-align:center;margin-top: 120px;">
                                        你最近没有浏览过聚美商品，
                                        <br>
                                        快去逛逛吧~
                                    </p>
                                </div>
                            </div>
                            <div class="browse_Recommend fr">
                                <h2 class="browse_tit">
                                    根据查看记录推荐
                                    <span>
                                        第
                                        <em id="br_curpage">
                                            0
                                        </em>
                                        页,共
                                        <em id="br_pagecount">
                                            0
                                        </em>
                                        页
                                    </span>
                                </h2>
                                <div class="br_slide_container">
                                    <em style="display: none;" class="slidearrow slidearrow_l">
                                        &lt;
                                    </em>
                                    <div class="br_slide" id="br_slide">
                                        <p style="text-align:center;margin-top:120px;">
                                            对不起，暂时没有数据！
                                        </p>
                                    </div>
                                    <em style="display: none;" class="slidearrow slidearrow_r">
                                        &gt;
                                    </em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="ibar" id="iBar" style="z-index: 9990; right: 0px; position: fixed; top: 0px; display: block; height: 626px;">
    <div class="ibar_main_panel" style="left: 0px;">
        <ul class="ibar_mp_center">
            <li class="mpbtn_login">
                <a href="http://passport.localhost/i/account/login">
                    <s>
                    </s>
                    登录
                </a>
            </li>
            <li class="mpbtn_cart" style="left: 0px;">
                <a href="#" data-plugin="iBarCart">
                    <s>
                    </s>
                    <span class="text">
                        购物车
                    </span>
                    <span class="cart_num">
            <?php foreach($_SESSION['cart'] as $k=>$v){ $totalnum +=$v['num']; } if(!$totalnum){ echo 0; } echo $totalnum; ?>
                    </span>
                </a>
            </li>
            <li class="mpbtn_asset">
                <a href="#" data-judgelogin="1" data-plugin="iBarAsset">
                    <s>
                    </s>
                    我的财产
                </a>
                <div class="mp_tooltip" style="visibility: hidden;">
                    我的财产
                    <s class="icon_arrow_right_black">
                    </s>
                </div>
            </li>
            <li class="mpbtn_favorite">
                <a href="#" data-judgelogin="1" data-plugin="iBarFavorite">
                    <s>
                    </s>
                    我的心愿单
                </a>
                <div class="mp_tooltip" style="visibility: hidden;">
                    我的心愿单
                    <s class="icon_arrow_right_black">
                    </s>
                </div>
            </li>
            <li class="mpbtn_histroy">
                <a href="#" data-plugin="iBarHistroy">
                    <s>
                    </s>
                    我看过的
                </a>
                <div class="mp_tooltip" style="visibility: hidden;">
                    我看过的
                    <s class="icon_arrow_right_black">
                    </s>
                </div>
            </li>
            <!-- <li class="mpbtn_recharge"><a href="#" data-plugin="iBarRecharge"><s></s><span class="text">充</span></a><div class="mp_tooltip">我要充值<s class="icon_arrow_right_black"></s></div></li> -->
        </ul>
        <ul class="ibar_mp_bottom">
            <li class="mpbtn_qrcode">
                <a href="#">
                    <s>
                    </s>
                    手机聚美
                </a>
                <div class="mp_qrcode" style="display: none;">
                    <img src="http://p0.jmstatic.com/assets/qrcode.png?v=2" width="148" height="175">
                    <s class="icon_arrow_white">
                    </s>
                </div>
            </li>
            <li class="mpbtn_support">
                <a href="#" data-plugin="iBarFaq">
                    <s>
                    </s>
                    客服中心
                </a>
                <div class="mp_tooltip" style="visibility: hidden;">
                    客服中心
                    <s class="icon_arrow_right_black">
                    </s>
                </div>
            </li>
            <li class="mpbtn_gotop" id="gotop" style="visibility: hidden; display: block;">
                <a href="#" class="btn_gotop">
                    <s>
                    </s>
                    返回顶部
                </a>
                <div class="mp_tooltip">
                    返回顶部
                    <s class="icon_arrow_right_black">
                    </s>
                </div>
            </li>
        </ul>
    </div>
    <div class="ibar_login_box  status_logout" style="top: 131.5px; display: none;">
        <div class="avatar_box">
            <p class="avatar_imgbox">
                <img src="http://p0.jmstatic.com/assets/avatar_nonesign.jpg" alt="头像"
                width="62" height="62">
            </p>
            <p>
                你好！请&nbsp;
                <a href="http://passport.localhost/i/account/login">
                    登录
                </a>
                &nbsp;|&nbsp;
                <a href="http://passport.localhost/i/account/signup">
                    注册
                </a>
            </p>
        </div>
        <div class="login_btnbox">
            <a href="http://www.localhost/i/order/list" class="login_order" target="_blank">
                我的订单
            </a>
            <a href="http://www.localhost/i/product/fav_products" class="login_favorite"
            target="_blank">
                我的收藏
            </a>
        </div>
        <s class="icon_arrow_white">
        </s>
        <a href="javascript:;" class="ibar_closebtn" title="关闭">
        </a>
    </div>
        <?php if(session('cart') == null): ?><div class="ibar_sub_panel">
        <a href="javascript:;" class="ibar_closebtn" title="关闭">
        </a>
        <span class="ibar_loading_text">
            正在为您努力加载数据！
        </span>
        <div class="ibar_plugin ibar_cart_content" id="iBarCart" style="display: block;">
        <div class="ibar_plugin_title">
            <span class="ibar_plugin_name">
                购物车
            </span>
        </div>
        <div class="ibar_plugin_content" style="height: 443px; overflow-y: auto;">
        <div class="ibar_cart_group_container ibar_cart_empty">
            <p class="ibar_cart_loading_text">正在为您努力地加载数据！</p>
        </div>
        <?php else: ?>
        <div class="ibar_sub_panel">
        <a href="javascript:;" class="ibar_closebtn" title="关闭">
        </a>
        <span class="ibar_loading_text">
            正在为您努力加载数据！
        </span>
        <div class="ibar_plugin ibar_cart_content" id="iBarCart" style="display: block;">
        <div class="ibar_plugin_title">
            <span class="ibar_plugin_name">
                购物车
                <span class="ibar_cart_timer" style="display: inline;">
                    已超时，请尽快结算
                </span>

            </span>
        </div>
        <div class="ibar_plugin_content" style="height: 443px; overflow-y: auto;">
        <div class="ibar_cart_group_container" style="position: absolute;">
            <div class="ibar_cart_group ibar_cart_product">
            <div class="ibar_cart_group_header clearfix">
                <span class="ibar_cart_group_title">
                    聚美优品
                </span>
                <span class="ibar_cart_group_shop ibar_text_ellipsis">
                </span>
                <span class="ibar_cart_group_baoyou ibar_pink">
                    自营非食品类满两件包邮
                </span>
            </div>
                <ul class="ibar_cart_group_items">
                    <?php if(is_array($cartgood)): foreach($cartgood as $key=>$vo): ?><li class="ibar_cart_item clearfix">
                        <div class="ibar_cart_item_pic">
                            <a target="_blank" title="倩碧 (Clinique)焕妍活力精华露50ml（特卖）" href="<?php echo U('Home/Details/index',array('cate'=>$vo['id']));?>">
                                <img alt="倩碧 (Clinique)焕妍活力精华露50ml（特卖）" src="<?php echo ($vo['spic']); ?>">
                                <span class="ibar_cart_item_tag png">
                                </span>
                            </a>
                        </div>
                        <div class="ibar_cart_item_desc">
                            <span class="ibar_cart_item_name_wrapper">
                                <span class="ibar_cart_item_global">
                                    [极速免税店]
                                </span>
                                <a target="_blank" class="ibar_cart_item_name" title="倩碧 (Clinique)焕妍活力精华露50ml（特卖）"
                                href="<?php echo U('Home/Details/index',array('cate'=>$vo['id']));?>">
                                   <?php echo ($vo['gname']); ?>
                                </a>
                            </span>
                           <!--  <div class="ibar_cart_item_sku ibar_text_ellipsis">
                                <span title="50ml">
                                    型号：50ml
                                </span>
                            </div> -->
                            <div class="ibar_cart_item_price ibar_pink">
                                <span class="unit_price">
                                    <em>
                                        ￥
                                    </em>
                                    <?php echo ($vo['price']); ?>
                                </span>
                                <span class="unit_plus">
                                    x
                                </span>
                                <span class="ibar_cart_item_count">
                                    <?php echo ($vo['num']); ?>
                                </span>
                            </div>
                        </div>
                    </li><?php endforeach; endif; ?>
                </ul>
            </div>
            <p class="ibar_cart_loading_text">
                正在为您努力地加载数据！
            </p>
        </div>
        <div class="ibar_cart_handler ibar_cart_handler_fixed" style="display: block; top: auto;">
            <div class="ibar_cart_handler_header clearfix">
                <span class="ibar_cart_handler_header_left">
                    共
                    <span class="ibar_cart_total_quantity ibar_pink">
                        <?php echo $totalnum; ?>
                    </span>
                    件商品
                </span>
                <span class="ibar_cart_total_price ibar_pink">
                    <?php foreach($cartgood as $k=>$v){ $num +=$v['num']*$v['price']; } echo $num; ?>
                </span>
            </div>
            <a target="_blank" href="<?php echo U('Home/Cart/index');?>"
            class="ibar_cart_go_btn">
                去购物车结算
            </a>
        </div><?php endif; ?>
        
        </div>
    </div>
    </div>
    <div class="ibar_tips_box">
        <div class="tips_customer_box">
            <div class="olduser_cash">
                <h3>
                    这里查看百元现金券
                </h3>
                <p>
                    有效期24小时
                </p>
            </div>
            <s class="icon_arrow_white">
            </s>
            <a href="javascript:;" class="ibar_closebtn" title="关闭">
            </a>
        </div>
    </div>
</div>
    <div id="footer" class="footer">
        <div id="footer_textarea">
            <div class="footer_top">
                <div class="footer_con footer_credit" id="footer_credit">
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer"
                    class="foot_link mostmall" target="_blank" rel="nofollow">
                        <span class="first corn">
                        </span>
                        <span class="con">
                            <b>
                                值得信赖美妆电商
                            </b>
                        </span>
                        四千万用户信赖
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#jumei_ipo"
                    class="foot_link quality" target="_blank" rel="nofollow">
                        <span class="corn">
                        </span>
                        <span class="con">
                            <b>
                                成功在美上市
                            </b>
                        </span>
                        股票代码NYSE:JMEI
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#brand_con"
                    class="foot_link back" rel="nofollow" target="_blank">
                        <span class="corn">
                        </span>
                        <span class="con">
                            <b>
                                品牌防伪码
                            </b>
                        </span>
                        支持品牌官网验真
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#unconditionally_backtrack"
                    class="foot_link depot" target="_blank" rel="nofollow">
                        <span class="corn">
                        </span>
                        <span class="con">
                            <b>
                                30天无理由退货
                            </b>
                        </span>
                        只要不满意无理由退货
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#user_confide"
                    class="foot_link consignment" target="_blank" rel="nofollow">
                        <span class="corn">
                        </span>
                        <span class="con">
                            <b>
                                百万用户口碑
                            </b>
                        </span>
                        帮你只选对的,不选贵的
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#bold_consignment"
                    class="foot_link packaging" target="_blank" rel="nofollow">
                        <span class="corn">
                        </span>
                        <span class="con">
                            <b>
                                订单闪电发货
                            </b>
                        </span>
                        1.5小时订单急速出库
                    </a>
                    <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#star_commend"
                    class="foot_link confide" target="_blank" rel="nofollow">
                        <span class="corn">
                        </span>
                        <span class="con">
                            <b>
                                大牌明星热荐
                            </b>
                        </span>
                        打造精致明星脸
                    </a>
                </div>
            </div>
            <div class="footer_top_sen">
                <div class="footer_con footer_links" id="footer_links">
                    <ul class="linksa">
                        <li class="links">
                            服务保障
                        </li>
                        <li>
                            <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer&amp;site=bj#brand_con"
                            target="_blank" rel="nofollow">
                                品牌真品防伪码
                            </a>
                        </li>
                        <li>
                            <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer"
                            target="_blank" rel="nofollow">
                                100%正品保证
                            </a>
                        </li>
                        <li>
                            <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer#unconditionally_backtrack"
                            target="_blank" rel="nofollow">
                                30天无条件退货
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/faq?from=footer" target="_blank" rel="nofollow">
                                7×24小时客服服务
                            </a>
                        </li>
                        <li>
                            <span class="footer_zcemail">
                                总裁邮箱ceo@jumei.com
                            </span>
                        </li>
                    </ul>
                    <ul class="linksb">
                        <li class="links">
                            使用帮助
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/guidebook" target="_blank" rel="nofollow">
                                新手指南
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/faq" target="_blank" rel="nofollow">
                                常见问题
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/main" target="_blank" rel="nofollow">
                                帮助中心
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/i/help/user_terms" target="_blank" rel="nofollow">
                                用户协议
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/activity_qiye_tuangou.html" target="_blank"
                            rel="nofollow">
                                企业用户团购
                            </a>
                        </li>
                    </ul>
                    <ul class="linksc">
                        <li class="links">
                            支付方式
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/pay_cod" target="_blank" rel="nofollow">
                                货到付款
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/pay_online" target="_blank" rel="nofollow">
                                在线支付
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/pay_balance" target="_blank" rel="nofollow">
                                余额支付
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/pay_promocards?from=footer" target="_blank"
                            rel="nofollow">
                                现金券支付
                            </a>
                        </li>
                    </ul>
                    <ul class="linksd">
                        <li class="links">
                            配送方式
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/two_for_freeshipping?from=footer" target="_blank"
                            rel="nofollow">
                                包邮政策
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/delivery_state?from=footer" target="_blank"
                            rel="nofollow">
                                配送说明
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/delivery_fee?from=footer" target="_blank"
                            rel="nofollow">
                                运费说明
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/check_goods?from=footer" target="_blank"
                            rel="nofollow">
                                验货签收
                            </a>
                        </li>
                    </ul>
                    <ul class="linkse">
                        <li class="links">
                            售后服务
                        </li>
                        <li>
                            <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=footer"
                            target="_blank" rel="nofollow">
                                正品承诺
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/faq?from=footer" target="_blank" rel="nofollow">
                                售后咨询
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/refund_policies" target="_blank" rel="nofollow">
                                退货政策
                            </a>
                        </li>
                        <li>
                            <a href="http://www.jumei.com/help/refund_handle" target="_blank" rel="nofollow">
                                退货办理
                            </a>
                        </li>
                    </ul>
                    <div class="links_er_box">
                        <ul class="linksf">
                            <li class="links">
                                手机聚美
                            </li>
                            <li>
                                <span class="link_bottom_pic">
                                </span>
                            </li>
                            <li>
                                下载移动客户端
                            </li>
                        </ul>
                        <ul class="linksg">
                            <li class="links">
                                聚美微信
                            </li>
                            <li>
                                <span class="link_bottom_pic">
                                </span>
                            </li>
                            <li>
                                聚美官方微信
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer_dy" id="footer_dy">
                <div class="play_box">
                    <span class="play">
                    </span>
                </div>
            </div>
            <div class="footer_center">
                <div class="footer_con" id="footer_link">
                    <a href="http://www.jumei.com/about/about_us?from=footer" target="_blank"
                    rel="nofollow">
                        关于聚美优品
                    </a>
                    <a href="http://jumei.investorroom.com/?from=footer" target="_blank" rel="nofollow">
                        INVESTOR RELATIONS
                    </a>
                    <a href="http://hd.jumei.com/act/9-478-2448-pop_invite_business_page.html?site=%7B$current_site%7D&amp;from=footer"
                    target="_blank" rel="nofollow">
                        商家入驻
                    </a>
                    <a href="http://www.jumei.com/help/get_update?from=footer" target="_blank"
                    rel="nofollow">
                        获取更新
                    </a>
                    <a href="<?php echo U('Home/Join/index');?>" target="_blank"
                    rel="nofollow">
                        加入聚美
                    </a>
                    <a href="http://www.jumei.com/i/market/cooperation?from=footer" target="_blank"
                    rel="nofollow">
                        品牌合作专区
                    </a>
                    <a href="http://cps.jumei.com/?from=footer" target="_blank" rel="nofollow">
                        网站联盟
                    </a>
                    <a href="http://www.jumei.com/about/news_center?from=footer" target="_blank"
                    rel="nofollow">
                        媒体报道
                    </a>
                    <a href="<?php echo U('Home/Link/index');?>" target="_blank"
                    rel="nofollow">
                        商务合作
                    </a>
                </div>
            </div>
            <div id="footer_copyright" class="footer_copyright">
                <div class="footer_con">
                    <p class="footer_copy_con">
                        COPYRIGHT <?php echo ($webinfo["copyright"]); ?> 客服热线：400-123-8888
                        <br>
                        京公网安备 11010102001226 |
                        <a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow">
                            京ICP证111033号
                        </a>
                        | 食品流通许可证 SP1101051110165515（1-1） |
                        <a href="http://p2.jmstatic.com/activity/2013_chuangrui.jpeg" target="_blank"
                        rel="nofollow">
                            营业执照
                        </a>
                    </p>
                    <p>
                        <a href="javascript:void(0)" class="footer_copy_logo logo01" rel="nofollow">
                        </a>
                        <a href="https://www.itrust.org.cn/yz/pjwx.asp?wm=1693268180" target="_blank"
                        class="footer_copy_logo logo02" rel="nofollow">
                        </a>
                        <a href="javascript:void(0)" class="footer_copy_logo logo03" rel="nofollow">
                        </a>
                        <a href="javascript:void(0)" class="footer_copy_logo logo04" rel="nofollow">
                        </a>
                        <a href="https://ss.knet.cn/verifyseal.dll?sn=e12070911010031011307708&amp;ct=df&amp;pa=453163"
                        target="_blank" class="footer_copy_logo logo05" rel="nofollow">
                        </a>
                    </p>
                    <script>
                        function change_urlknet(eleId) {
                            var str = document.getElementById(eleId).href;
                            var str1 = str.substring(0, (str.length - 6));
                            str1 += RndNum(6);
                            document.getElementById(eleId).href = str1;
                        }
                        function RndNum(k) {
                            var rnd = "";
                            for (var i = 0; i < k; i++) {
                                rnd += Math.floor(Math.random() * 10);
                            }
                            return rnd;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/Home/srcs/lib.js">
    </script>
    <script src="/Public/Home/srcs/monitor.js">
    </script>
    <script src="/Public/Home/srcs/ui.js">
    </script>
    <script src="/Public/Home/srcs/app.js">
    </script>
    <!-- 子系统的页脚脚本 start -->
    


    <!-- 子系统的页脚脚本 end -->
    <!-- 公共JS start -->
    <!-- 第三方脚本 -->
    <script type="text/javascript">
        // 兼容在jquery加载之前就开始使用$的代码
        $(function() {
            var callbacks = window.__domReadyCallbacks__,
            len = callbacks.length,
            i = 0;

            for (; i < len; i++) {
                callbacks[i]();
            }
        });

        window._adwq = window._adwq || [];
        _adwq.push(['_setAccount', '1ng4e']);
        _adwq.push(['_setDomainName', '.jumei.com']);
        _adwq.push(['_trackPageview']);

        GA_ACCOUNT = 'UA-19889655-1';

        window._gaq = window._gaq || [];
        _gaq.push(['_setAccount', GA_ACCOUNT]);
        _gaq.push(['_addOrganic', 'baidu', 'wd']);
        _gaq.push(['_addOrganic', 'baidu', 'word']);
        _gaq.push(['_addOrganic', 'm.baidu', 'word']);
        _gaq.push(['_addOrganic', 'wap.baidu', 'word']);
        _gaq.push(['_addOrganic', 'baidu', 'kw']);
        _gaq.push(['_addOrganic', 'baidu', 'q1']);
        _gaq.push(['_addOrganic', 'baidu', 'q2']);
        _gaq.push(['_addOrganic', 'baidu', 'q3']);
        _gaq.push(['_addOrganic', 'baidu', 'q4']);
        _gaq.push(['_addOrganic', 'baidu', 'q5']);
        _gaq.push(['_addOrganic', 'baidu', 'q6']);
        _gaq.push(['_addOrganic', 'so.com', 'q']);
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

        window.jumeiSstatistics = window.jumeiSstatistics || [];
        window.jumeiSstatisticsAction = '';

        jumeiSstatistics.push(['log', '']);
        jumeiSstatistics.push(['lo', '']);
        jumeiSstatistics.push(['sid', '']);
        jumeiSstatistics.push(['cl', '']);
        jumeiSstatistics.push(['mat', '']);
        jumeiSstatistics.push(['bs', '[]']);
        jumeiSstatistics.push(['ps', '[]']);
        jumeiSstatistics.push(['uid', '']);
        jumeiSstatistics.push(['tm', '']);
        jumeiSstatistics.push(['act', '']);
        jumeiSstatistics.push(['aci', '[]']);
        jumeiSstatistics.push(['ip', '']);
        if (!JM.JMC_DEBUG) {
            // adwq
            (function() {
                var getCookie = function(name) {
                    var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
                    if (arr = document.cookie.match(reg)) return (arr[2]);
                    else return null;
                },
                uid = getCookie('uid') || 0,
                new_signup = getCookie('new_signup');

                if (new_signup !== null) {
                    _adwq.push(['_setAction', '20rf07', uid, // 扩展参数, 可填 用户名 或 用户ID(可选)
                    'new_signup' // 事件价值 (可选)
                    ]);

                    document.cookie = 'new_signup=null; path=/; domain=' + JM.SITE_MAIN_TOPLEVELDOMAINNAME;
                }

                var adw = document.createElement('script');
                adw.type = 'text/javascript';
                adw.async = true;
                adw.src = ('https:' == document.location.protocol ? 'https://ssl': 'http://s') + '.emarbox.com/js/adw.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(adw, s);
            })();

            //ga
            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = 'http://s0.jmstatic.com/templates/jumei/js/jquery/dc.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

            //baidu tongji
            (function() {
                var baidu_tongji = document.createElement('script');
                baidu_tongji.type = 'text/javascript';
                baidu_tongji.async = true;
                baidu_tongji.src = ('https:' == document.location.protocol ? 'https://': 'http://') + 'hm.baidu.com/h.js?884477732c15fb2f2416fb892282394b';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(baidu_tongji, s);
            })();

            (function(d) {
                window.bd_cpro_rtid = "rjfzrHc";
                var s = d.createElement("script");
                s.type = "text/javascript";
                s.async = true;
                s.src = location.protocol + "//cpro.baidu.com/cpro/ui/rt.js";
                var s0 = d.getElementsByTagName("script")[0];
                s0.parentNode.insertBefore(s, s0);
            })(document);

            (function() {
                if (jumeiSstatisticsAction == 1) {
                    //调用方式，调用必须在参数设置之后
                    var jm_tj = document.createElement('script');
                    jm_tj.type = 'text/javascript';
                    jm_tj.async = true;
                    jm_tj.src = 'http://p0.jmstatic.com/templates/jumei//Public/Home/images/jquery/Jumei.AdStatistics.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(jm_tj, s);
                }
            })();
            //第三方 CRITEO 标签(TAG)跟踪器 代码
            (function() {
                var criteo = document.createElement('script');
                criteo.type = 'text/javascript';
                criteo.async = true;
                criteo.src = '//static.criteo.net/js/ld/ld.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(criteo, s);
                var isDetail = JM.ACTION === 'Detail',
                //详情页
                isHome = JM.CONTROL === 'Home',
                //首页
                isHd = JM.ACTION === 'View',
                //act专场页面
                item_id = '',
                eventName;
                window.criteo_q = window.criteo_q || [];

                if (isHome || isHd) {
                    eventName = 'viewHome';
                } else if (isDetail) {

                    item_id = window.JM_CRITEO_ID || "";
                    eventName = 'viewItem';

                }
                window.criteo_q.push({
                    event: "setAccount",
                    account: 16779
                },
                {
                    event: "setHashedEmail",
                    email: ""
                },
                {
                    event: "setSiteType",
                    type: "d"
                },
                {
                    event: eventName,
                    item: item_id,
                    user_segment: ""
                });

            })();
            //第三方 金源互动（百度推广相关）代码
            var _agt = _agt || [];
            _agt.push(['_atscu', 'AG_774222_DMOV']);
            _agt.push(['_atsdomain', 'jumei.com']); (function() {
                var ag = document.createElement('script');
                ag.type = 'text/javascript';
                ag.async = true;
                ag.src = (document.location.protocol == 'https:' ? 'https': 'http') + '://' + 't.agrantsem.com/js/ag.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ag, s);
            })();
        }
    </script>
    <!-- 第三方 品友-->
    <script>
        var getCookie = function(n) {
            var m = document.cookie.match(new RegExp("(^| )" + n + "=([^;]*)(;|$)"));
            return ! m ? "": unescape(m[2]);
        };
        window.user_id = getCookie("last_reg");
        var isDetail = JM.ACTION === 'Detail';
        _py = _py || [];
        if (isDetail) {
            var _goodsData = window.PingY;
            var _py = _py || [];
            _py.push(['a', '_d..wY1itoZJBOFwMNeSVmLboP']);
            _py.push(['domain', 'stats.ipinyou.com']);
            _py.push(['pi', _goodsData]);
            _py.push(['e', '']); -
            function(d) {
                var s = d.createElement('script'),
                e = d.body.getElementsByTagName('script')[0];
                e.parentNode.insertBefore(s, e),
                f = 'https:' == location.protocol;
                s.src = (f ? 'https': 'http') + '://' + (f ? 'fm.ipinyou.com': 'fm.p0y.cn') + '/j/adv.js';
            } (document);
        } else {
            _py.push(['a', '_d..wY1itoZJBOFwMNeSVmLboP']);
            _py.push(['domain', 'stats.ipinyou.com']);
            _py.push(['e', '']); -
            function(d) {
                if (window.user_id && window.user_id != "") { (new Image()).src = "http://openapi.ipinyou.com/openapi/dmp/v1/pushprofile?advid=5174a9e9e4c637af4a518a9d9a1338ed&u=" + window.user_id;
                }
                var s = d.createElement('script'),
                e = d.body.getElementsByTagName('script')[0];
                e.parentNode.insertBefore(s, e),
                f = 'https:' == location.protocol;
                s.src = (f ? 'https': 'http') + '://' + (f ? 'fm.ipinyou.com': 'fm.p0y.cn') + '/j/adv.js';
            } (document);

        }
    </script>
    <noscript>
        <img src="//stats.ipinyou.com/adv.gif?a=_d..wY1itoZJBOFwMNeSVmLboP&e="
        style="display:none;" />
    </noscript>
    <!-- 第三方 亿玛-->
    <script type="text/javascript" src="/Public/Home/srcs/adw_002.js">
    </script>
    <iframe id="emar_box_pv" src="/Public/Home/srcs/_adw.htm" style="width: 1px; border: 0px none; position: absolute; left: -100px; top: -100px; height: 1px;">
    </iframe>
    <script type="text/javascript">
        $(function() {
            var isMall = JM.CONTROL == 'Mall' && JM.ACTION == 'Mall';
            var isAct = JM.CONTROL == 'Special' && JM.ACTION == 'View';
            if (isDetail) { //详情页部署
                var _items = window.PingY;
                _adwq.push(['_setDataType', 'view']);
                _adwq.push(['_setCustomer', window.user_id]);
                _adwq.push(['_setItem', _items['id'], //商品ID
                _items['name'], //商品名称
                _items['price'], //商品现价
                '1', _items['categoryId'], //商品分类ID
                _items['category'], //商品分类名称
                _items['origPrice'], //商品原价
                _items['imgUrl'], //图片地址
                _items['soldOut'] == '1' ? 'Y': 'N', _items['productUrl']]);
                _adwq.push(['_trackTrans']);
            } else if (isAct) { //活动页部署
                (function() {
                    var adw = document.createElement('script');
                    adw.type = 'text/javascript';
                    adw.async = true;
                    adw.src = ('https:' == document.location.protocol ? 'https://ssl': 'http://s') + '.emarbox.com/js/adw.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(adw, s);
                })();
            }
        });
    </script>
    <!--第三方 亿玛 end -->
    <!-- MediaV -->
    <script type="text/javascript">
        /*var _mvq = _mvq || [];
_mvq.push(['$setAccount', 'm-183-0']);
_mvq.push(['$logConversion']);
(function() {
    var mvl = document.createElement('script');
    mvl.type = 'text/javascript'; mvl.async = true;
    mvl.src = ('https:' == document.location.protocol ? 'https://static-ssl.mediav.com/mvl.js' : 'http://static.mediav.com/mvl.js');
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(mvl, s);
})();
if(isDetail){
    _mvq.push(['$setAccount', 'm-183-0']);
    _mvq.push(['$setGeneral', 'goodsdetail', window.user_id]);
    _mvq.push(['$logConversion']);
    _mvq.push(['$addGoods',  window.PingY]);
    _mvq.push(['$logData']);
}*/
        
    </script>
     
    <!-- MediaV end-->
    <!-- 晶赞 -->
    <script type="text/javascript">
        (function() {
            var isMall = JM.CONTROL == 'Mall' && JM.ACTION == 'Mall',
            chanelName;
            var isAct = JM.CONTROL == 'Special' && JM.ACTION == 'View';
            //pop and baby
            if (isMall) {
                chanelName = '美妆商城';
                window.__zp_tags_params = {
                    chanelName: chanelName
                };
            } else if (isDetail) {
                var _datas = window.PingY;
                window.__zp_tags_params = {
                    pagetype: 'detail',
                    productId: _datas['id'],
                    stock: _datas['soldOut'],
                    p_zp_prodstype: '53e29afa958a394f21589229dc6613ed',
                    p_zp_prods: {
                        "outerid": _datas['id'],
                        //商品id
                        "name": _datas['name'],
                        //商品名称
                        "brand": _datas['brand'],
                        //品牌 如: 蝶翠诗 (DHC)
                        "category": _datas['category'],
                        //一级分类 如: 化妆品
                        "subCategory": " ",
                        //二级分类 如: 彩妆
                        "thirdCategory": " ",
                        //三级分类 如: 卸妆
                        "price": _datas['price'],
                        //商品现价,如 890 , 不包含币种
                        "value": _datas['origPrice'],
                        //商品原价，若无则同原价
                        "image": _datas['imgUrl'],
                        //商品图片示例：http: //p0.jmstatic.com/product/000/000/3_std/3_350_350.jpg?_ut=1432795445",
                        "loc": window.location.href,
                        //商品点击地址 "http://item.jumei.com/3.html?utm_source=jz"
                        "stock": _datas['soldOut'] //是否在售 1:在售 、0:下线
                    }
                };
            } else if (isAct) {
                window.__zp_tags_params = {
                    pagetype: "actPage"
                }
            }
        })(); (function(param) {
            var c = {
                query: [],
                args: param || {}
            };
            c.query.push(["_setAccount", "428"]);
            c.query.push(["_setSiteID", "1"]); (window.__zpSMConfig = window.__zpSMConfig || []).push(c);
            var zp = document.createElement("script");
            zp.type = "text/javascript";
            zp.async = true;
            zp.src = ("https:" == document.location.protocol ? "https:": "http:") + "//cdn.zampda.net/s.js";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(zp, s);
        })(window.__zp_tags_params);
    </script>
    
<script type="text/javascript">

$(function(){
      //右侧工具条登录框
         $('.mpbtn_login').mouseover(function(){
            $('.status_logout').css('display','block');
            
         })
         //添加点击事件
        $('.status_logout .ibar_closebtn').click(function(){
           
            $('.status_logout').css('display','none');
        })
        //添加hover事件显示隐藏的内容
        $('.ibar_mp_center > li').hover(function(){

            $(this).find('.mp_tooltip').css('visibility','visible');

            },function(){

             $(this).find('.mp_tooltip').css('visibility','hidden');
        })

        $('.mpbtn_cart').click(function(){
            $.ajax({
                type: "POST",
                url: "<?php echo U('Home/Cart/checkGoods');?>",
                success: function(data) {
            
                    if(data){
                        $('.disp').show();
                    }else{
                        $('.shownone').show();

                    }
                }
            })

            $('.ibar_sub_panel').css({'display':'block','left':'-287px'});
      
        })
    $('.ibar_sub_panel a').click(function(){
         $('.ibar_sub_panel').css({'display':'none','left':'0px'});
    });
    <?php $addtime=session('addtime'); if($addtime){ ?> 
    var addtime=<?php echo session('addtime');?>;  
    var ntime=<?php echo NOW_TIME;?>;
    var intDiff = parseInt(12000+addtime-ntime);//倒计时总秒数量
    function timer(intDiff){
        window.setInterval(function(){
        var minute=0,
            secosnd=0,
            minsecond;//时间默认值
        if(intDiff > 0){
            minute = Math.floor(intDiff / 600);
            second = Math.floor(intDiff/10) - (minute * 60);
            minsecond = Math.floor(intDiff) - (minute * 60*10)-(second*10);
        }
        if (minute <= 9) minute = '0' + minute;
        if (second <= 9) second = '0' + second;
        $('.ibar_cart_timer').html('<span class="ibar_pink">'+minute+'分'+second+'.'+minsecond+'秒后清空</span>');
        
        intDiff--;
        }, 100);
    } 
                
    timer(intDiff);          
    <?php } ?>

     //商品的阴影效果
    $('li.item').each(function() {

        $(this).hover(function() {
            $(this).addClass('hover_sm');

        },
        function() {
            $(this).removeClass('hover_sm');
        })

      
      

    })
    //二级导航的分类下拉选项
    $('.selected_panel').mouseover(function() {

        $('#J_sub_selected_panel').css('display', 'block');
        $(this).addClass('selected_panel_hover');
    }).mouseout(function() {
        $('#J_sub_selected_panel').css('display', 'none');
        $(this).removeClass('selected_panel_hover');
    })

    //添加购物车
    $(".search_list_button").delegate(".zuhe_zhifu_dingjing", "click",
    function() {

        var that = $(this);
        var gid = that.parent().parent().parent().parent().attr("gid");
        $.ajax({
            type: "POST",
            url: "<?php echo U('Home/Cart/insert');?>",
            data: {
                gid: gid
            },
            success: function(data) {
                if (data) {
                     var Top=parseInt(that.offset().top)-200;
            var Left=parseInt(that.offset().left)+40;
            var carTop=$('.mpbtn_cart').find('s').offset().top;
            var carLeft=$('.mpbtn_cart').find('s').offset().left;

          
            var flygood=that.parents('.item_wrap_right').find('.s_l_pic img').clone();
            flygood.attr('id','newlife');
            flygood.css({left:Left+'px',top:Top+'px'});
            $("body").append(flygood);
            $("body").find('#newlife').animate({width: "40px",height: "40px","top":carTop+'px', "left": carLeft+'px', "opacity": 1 },1800, function(){$(this).remove()});
                    var num = Number($('.cart_num').html());
                    $('.cart_num').html(num + 1);
                    
                    <?php sleep(2); ?>
                    document.location.href='';
                }
            }
        })

           

    })
    

    //添加收藏
   $('.track_click').next().click(function(){
        <?php $uid=session('id'); if(!$uid){ ?>
        document.location.href="<?php echo U('Home/User/login');?>";
        <?php }else{ ?>
        var that = $(this);
        var gid = that.parent().parent().parent().parent().attr("gid");
        $.ajax({
            type: "POST",
            url: "<?php echo U('Home/Collect/insert');?>",
            data: {
                gid: gid
            },
            success: function(data) {
              
                da=parseInt(data);
                if (da==1) {
                  that.removeClass('btn_fav').addClass('collected');
                }else if(da==2){
                    that.removeClass('collected').addClass('btn_fav');
                }else if(da==3){
                    alert('取消收藏失败');
                }else if(da==4){
                    alert('失败添加收藏');
                }
            }
        })
        <?php } ?>    
   })
   
    
})


</script> 
    

    <!-- 晶赞 -->
    <!-- 公共JS end -->
    

    
    <img style="display: none; width: 0px; height: 0px;" src="/Public/Home/srcs/pv.gif">
    <div style="display: none;" id="criteo-tags-div">
        <iframe src="/Public/Home/srcs/dis.htm" style="display: none;" height="0"
        width="0">
        </iframe>
    </div>

</body>

</html>