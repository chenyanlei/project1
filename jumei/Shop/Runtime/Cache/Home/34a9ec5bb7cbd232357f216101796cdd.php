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
                        
 <meta name="keywords" content="御泥坊,面膜" />
<meta name="description" content="引爆沙漠补水力，全新升级御泥坊玫瑰滋养矿物睡眠面膜180g，精选沙漠蔷薇，多倍抓水力，补水更锁水，深入肌肤底层，激发肌肤源源水润动力。柔滑水润质地，一敷沁润肌底，特别添加国家专利提取矿物泥浆精华，补水护肤的同时，增强肌肤抵御力。" />
 <title><?php echo ($details['title']); ?></title>

<link rel="stylesheet" type="text/css" href="/spl/jumei/Public/Home/srcs/common.css">
<link rel="stylesheet" type="text/css" href="/spl/jumei/Public/Home/srcs/detail.css">
<link rel="stylesheet" type="text/css" href="/spl/jumei/Public/Home/srcs/app.css">
<link rel="stylesheet" type="text/css" href="/spl/jumei/Public/Home/srcs/deal.css" />
<script type="text/javascript" src="/spl/jumei/Public/Home/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/spl/jumei/Public/Home/details/js/fdj.js"></script>
<script type="text/javascript" src="/spl/jumei/Public/Home/details/js/highcharts.js"></script>
<!-- <script type="text/javascript" src="/spl/jumei/Public/Home/details/js/mall_main.js"></script> -->
<!-- <script src="http://www.lanrenzhijia.com/ajaxjs/1.4.2/jquery-1.4.2.min.js"></script> -->
<script type="text/javascript" src="/spl/jumei/Public/Home/details/js/jquery.imagezoom.min.js"></script>
<style type="text/css">
        *{margin:0px;padding:0px;list-style:none;}
        #small{width:350px;height:350px;overflow:hidden;position:relative;}
        #big{width:350px;height:350px;position:absolute;left:380px;top:20px;overflow:hidden;display:none;z-index: 100;}
        #move{width:100px;height:100px;position:absolute;background:url('/spl/jumei/Public/Home/details/fdjpic/bg.png');left:0px;top:0px;visibility:hidden;/*display:none;*/}
        /*#imgs{width:300px;height:100px;position:absolute;top:450px;left:200px;border:1px solid red;}
       #imgs li{width:100px;height:100px;float:left;margin-right:10px;border:dashed 1px #444;padding:10px;}*/
        
            #newlife{
                width:30px;
                height:30px;
                position:absolute;
                z-index:1000000;
                border-radius:50%;
            }

    </style>


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
                            
                            
                            <link rel="stylesheet" type="text/css" href="/spl/jumei/Public/Home/srcs/common.css">
                            <link rel="stylesheet" type="text/css" href="/spl/jumei/Public/Home/srcs/app.css">
                            <script src="/spl/jumei/Public/Home/srcs/s.js" async="" type="text/javascript">
                            </script>
                            <script data-owner="criteo-tag" src="/spl/jumei/Public/Home/srcs/event.js" type="text/javascript"
                            async="true">
                            </script>
                            </script>
                            <script src="/spl/jumei/Public/Home/srcs/ld.js" async="" type="text/javascript">
                            </script>
                            </script>
                            <script src="/spl/jumei/Public/Home/srcs/h.js" async="" type="text/javascript">
                            </script>
                            <script src="/spl/jumei/Public/Home/srcs/dc.js" async="" type="text/javascript">
                            </script>
                            <script src="/spl/jumei/Public/Home/srcs/adw.js" async="" type="text/javascript">
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
                                document.domain = 'www.myshop.com';
                                var JM = JM || {};
                                JM.SITE_MAIN_TOPLEVELDOMAINNAME = 'www.myshop.com';
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
                            <link rel="stylesheet" type="text/css" href="/spl/jumei/Public/Home/srcs/index.css">
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
                                            <img src="/spl/jumei/Public/Home/srcs/sina_er.png">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" class="er_box" rel="nofollow">
                                        聚美微信
                                        <span style="display: none;">
                                            <img src="/spl/jumei/Public/Home/srcs/jumei_weixin_header1.png">
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
                                            <img src="/spl/jumei/Public/Home/srcs/qq_er.png">
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="http://page.renren.com/601021070" class="er_box" rel="nofollow"
                                    target="_blank">
                                        人人公众主页
                                        <span style="display: none;">
                                            <img src="/spl/jumei/Public/Home/srcs/renren_er.png">
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
                    <img src="/spl/jumei/Public/Home/srcs/cart.gif" class="cart_gif" height="28"
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
                                    <img src="/spl/jumei/Public/Home/srcs/muy1.gif">
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
                                    <img src="/spl/jumei/Public/Home/srcs/lux2.jpg">
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
                                    <img src="/spl/jumei/Public/Home/srcs/30573_254_135_003-web.jpg">
                                </a>
                                <a target="_blank" href="http://mall.jumei.com/xihu?from=all_null_index_top_nav_cosmetics&amp;lo=3481&amp;mat=30573">
                                    <img src="/spl/jumei/Public/Home/srcs/30573_254_135_005-web.jpg">
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
    
 <!-- 子系统内容区域代码 start -->
<!--团购详情-->
<div class="layout_1090 white_background">
    <!--商城互导流量-->
    <div id="mall_product_box_deal"></div>
    <!--商城互导流量 end-->
    <!--面包屑导航-->
    <div class="subpage_menu">
        <div class="subpage_menu_l fl">
            <a href="http://www.jumei.com/" target="_blank" rel="nofollow">聚美优品首页</a> >
                <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E5%BE%A1%E6%B3%A5%E5%9D%8A&amp;from=home_deal_detail_breadcrumbs_brand" target="_blank"><?php echo ($details['bname']); ?></a> >
                <a href="http://search.jumei.com/?filter=0-11-1&amp;search=%E9%9D%A2%E8%86%9C&amp;from=home_deal_detail_breadcrumbs_category" target="_blank"><?php echo ($cname['name']); ?></a> >
                <span><?php echo ($details['gname']); ?></span>
        </div>
    </div>
    <!--面包屑导航 end-->
    <div class="deal_content">
        <div class="clearfix">
            <!--气泡-->
            <div class="air_bubble">
                <div class="air_bubble_cn">
                    <i class="arc_bubble_icon1"></i>
                    <div class="air_bubble_list">
      

                        <div class="air_bubble_ul_list">
                            <ul class="air_bubble_ul">
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--气泡 end-->
            <div class="mall_detail_wrap white_bg">
                <h1 class="mall_main_title"><?php echo ($details['title']); ?></h1>
                <div class="mall_detail_all clearfix">
                    <div id="albums" class="mall_detail_l jqZoomContent fl">
                        <div class="jqSlide">
                            <!-- <span class="jqzoom_btn prev"><i></i></span> -->
                            <div class="jqSlide_list">
                                <ul>
                                <?php $__FOR_START_20327__=0;$__FOR_END_20327__=4;for($i=$__FOR_START_20327__;$i < $__FOR_END_20327__;$i+=1){ ?><li class="hover">
                                        <img src="<?php echo ($pdss[$i]); ?>" big="<?php echo ($pdss[$i]); ?>" jqimg="<?php echo ($pdss[$i]); ?>" height="60" width="60" class="imgs" style="border:1px solid #eee">
                                    </li><?php } ?> 
                                </ul> 
                            </div>
                            <!-- <span class="jqzoom_btn next"><i class="disabled"></i></span> -->
                        </div>
                        <div style="position: relative;" class="pro_img">
                            <div class="jqzoom small" id = "small">
                                <img src="<?php echo ($pdss['0']); ?>" alt="御泥坊玫瑰滋养矿物睡眠面膜（升级版）" height="350" width="350" id="sImg">
                                <div id="move"></div>
                            </div>
                            <div id="big">
                                <img src="<?php echo ($pdss['0']); ?>" alt="" style="position:absolute;" id="bImg">
                            </div>
                        </div>
                    </div>
       
                
                    <div class="mall_detail_r fl">
                        <div class="mall_price_detail">
                            <div id="mall_price_detail" class="mall_price clearfix">
                                <em class="yen">¥</em>
                                <span class="price_num"><?php echo ($details['price']); ?></span>
                                <span class="label">聚美价</span>
                                <span class="discount_price">(参考价<del>￥<span class="info_market_price"><?php echo ($details['cprice']); ?></span></del>,为您节省<label>￥</label><?php echo ($details['cprice']-$details['price']); ?>)</span>
                                <span class="newuser_shop_free"></span>
                            </div>
                            <dl class="mall_sale_rules" id="mall_sale_rules"><dd><span class="sale_rules_l fl">满赠</span><a class="sale_rules_m fl" href="http://yunifang.jumei.com"><?php echo ($details['bname']); ?>满159送159</a></dd><dd><span class="sale_rules_l fl">满赠</span><a class="sale_rules_m fl" href="http://yunifang.jumei.com"><?php echo ($details['bname']); ?>满259送259</a></dd></dl>
                        </div>
                        
                        <input id="mall_product_id" value="1067353" type="hidden">
                        <div id="mall_sku_list" class="mall_detail_common mall_sku_list mar_t15 clearfix">
                        </div>
                        <div class="mall_detail_common mall_product_num mar_t15 clearfix">
                            <span class="label">数量</span>
                            <div class="num_detail" id="num_detail" style="background:url(/spl/jumei/Public/Home/details/images/number.png)">
                                <em title="减少" class="number_reduce fl"></em>
                                <input value="1" id="buy_number" class="buy_number fl" maxlength="2" type="text">
                                <em title="增加" class="number_add fl"></em>
                            </div>
                        </div>
                        <div class="mall_info_button mar_t20 clearfix">
                            <a href="javascript:;" class="mall_addcart_up" style="background:url(/spl/jumei/Public/Home/details/images/mall_product_v4_03.png)" gid="<?php echo ($id); ?>"></a>
                            <div class="mall_like_all">
                                <div class="fav_ibtn_back"></div>
                                <a class="mall_like_fav" href="<?php echo U('Home/Cart/index',array('id'=>$details['id']));?>;" style="background:url(/spl/jumei/Public/Home/details/images/mall_product_v4_03_sc.png)">
                                    <span id="ilike_text">收藏</span>
                                    <span class="ilike_num">(<em id="ilike_num">4041</em>)</span>
                                </a>
                            </div>
                        </div>
                        <div class="mall_detail_common mall_product_service mar_t20 clearfix">
                            <span class="label">服务</span>
                            <div class="mall_serce_list">
                                <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html" target="_blank" title="正品保证" class="con">正品保证</a>
                                <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html#quality_assurance" target="_blank" class="con" title="质量保险">质量保险</a>
                                <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html#unconditionally_backtrack" target="_blank" title="30天退货" class="con">30天无条件退货</a>
                                <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html#goods_more" target="_blank" class="con" title="官方授权">官方授权</a>                    
                                <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?from=header#bold_consignment" target="_blank" class="con" title="闪电发货">闪电发货</a>
                            </div>
                        </div>
                        <div class="shopname_self mar_t15">
                            <span class="shopname_icon fl">聚美自营</span>
                            <span class="shopname_word fl">本商品由<em class="self_mar">聚美优品</em>拥有和销售</span>
                        </div>
                    </div>
                </div>
                <!--产品保证-->
                <div class="deal_agree">
            <ul>
                <li class="first_width1">
                <a style="cursor:default;">
                    <i class="show_agree_icon1"></i>
                    <div class="deal_agree_detail">
                        <p class="deal_agree_tt">值得信赖美妆电商</p>
                        <p class="deal_agree_dd">四千万注册用户 / 已在美上市</p>
                    </div>
                </a>
                </li>
                        <li class="first_width2">
                <a style="cursor:default;">
                    <i class="show_agree_icon2"></i>
                    <div class="deal_agree_detail">
                        <p class="deal_agree_tt">聚美自营</p>
                        <p class="deal_agree_dd">由聚美优品拥有并销售</p>
                    </div>
                </a>
                </li>
                        <li class="first_width3" style="display: list-item;">
                <a href="http://hd.jumei.com/act/6-478-2230-aca.html" target="_blank">
                    <i class="show_agree_icon3"></i>
                    <div class="deal_agree_detail">
                        <p class="deal_agree_tt">品牌防伪码</p>
                        <p class="deal_agree_dd">支持品牌官网验真</p>
                    </div>
                </a>
            </li>
            <li class="first_width4">
                                <a style="cursor:default;">
                    <i class="show_agree_icon41"></i>
                    <div class="deal_agree_detail">
                        <p class="deal_agree_tt">不支持拆封退货</p>
                        <p class="deal_agree_dd">特殊商品</p>
                    </div>
                </a>
                            </li>           
                </ul>
        </div>
                <!--产品保证 end-->
            </div>
        </div>
    </div>
</div>
<!--团购详情end-->

<!--产品推荐组合购买-->
    <div class="layout_1090">
        <div class="deal_group_buy" id="deal_group_buy" style="display: block;">
            <h2 class="deal_group_tt"><span>大家经常这样购买</span></h2>
            <div class="group_list clearfix" id="fit_tit01">
            <div class="newdeal_fit_singles">
            <div class="newdeal_fit_single">
                <a href="<?php echo U('Home/details/Index',array('id'=>$details['id']));?>" target="_blank" class="pic">
                    <img id="firstGroupImg" alt="<?php echo ($details['title']); ?>" src="<?php echo ($details['spic']); ?>" width="100%" class="idds" ids="<?php echo ($details['id']); ?>">
                </a>
                <p class="name">
                    <a href="<?php echo U('Home/details/Index',array('id'=>$details['id']));?>" target="_blank"><?php echo ($details['title']); ?></a>
                </p>
                <p class="checkbox" style=""><input type="checkbox" class="J_CheckBox" name="related_index" value="d151009p1339077zc" original_price="<?php echo ($details['cprice']); ?>" discounted_price="<?php echo ($details['price']); ?>" checked="checked"><span class="check_price en">¥<?php echo ($details['price']); ?></span></p>
                <p class="type">
                    <select id="fit_tit01_d151009p1339077zc" style="display:none;">
                        <option value="1067353,d151009p1339077zc,1"></option>
                    </select>
                </p>
            </div>
            <div class="newdeal_fit_add">+</div>
            <div class="newdeal_fit_single">
                <a href="<?php echo U('Home/details/Index',array('id'=>$like['0']['id']));?>" target="_blank" class="pic">
                    <img id="firstGroupImg" alt="<?php echo ($like['0']['title']); ?>" src="<?php echo ($like['0']['spic']); ?>" width="100%" >
                </a>
                <p class="name">
                    <a href="<?php echo U('Home/details/Index',array('id'=>$like['0']['id']));?>" target="_blank"><?php echo ($like['0']['title']); ?></a>
                </p>
                <p class="checkbox">
                    <input type="checkbox" class="J_CheckBox" name="related_index" value="d151009p1095430zc" original_price="<?php echo ($like['0']['cprice']); ?>" discounted_price="<?php echo ($like['0']['price']); ?>" checked="checked" ids="<?php echo ($gid1); ?>">
                    <span class="check_price en" like="<?php echo ($gid1); ?>">¥<?php echo ($like['0']['price']); ?></span>
                </p>
                <p class="type">
                    <select id="fit_tit01_d151009p1095430zc" style="display:none;">
                        <option value="1061218,d151009p1095430zc,1"></option>
                    </select>
                </p>
            </div>
            <div class="newdeal_fit_add">+</div>
                <div class="newdeal_fit_single">
                    <a href="<?php echo U('Home/details/Index',array('id'=>$like['1']['id']));?>" target="_blank" class="pic">
                        <img id="firstGroupImg" lazy-src="http://p1.jmstatic.com/product/001/352/1352241_std/1352241_100_100.jpg" alt="<?php echo ($like['1']['title']); ?>" src="<?php echo ($like['1']['spic']); ?>" width="100%">
                    </a>
                    <p class="name">
                        <a href="<?php echo U('Home/details/Index',array('id'=>$like['1']['id']));?>" target="_blank"><?php echo ($like['1']['title']); ?></a>
                    </p>
                    <p class="checkbox">
                        <input type="checkbox" class="J_CheckBox" name="related_index" value="d151009p1352241zc" original_price="<?php echo ($like['1']['cprice']); ?>" discounted_price="<?php echo ($like['1']['price']); ?>" checked="checked" ids="<?php echo ($gid2); ?>">
                        <span class="check_price en" like="<?php echo ($gid2); ?>">¥<?php echo ($like['1']['price']); ?></span>
                    </p>
                    <p class="type">
                        <select id="fit_tit01_d151009p1352241zc" style="display:none;">
                            <option value="1067710,d151009p1352241zc,1"></option>
                        </select>
                    </p>
                </div>
                <div class="newdeal_fit_add">+</div>
                    <div class="newdeal_fit_single">
                        <a href="<?php echo U('Home/details/Index',array('id'=>$like['2']['id']));?>" target="_blank" class="pic">
                            <img id="firstGroupImg" lazy-src="http://p3.jmstatic.com/product/000/647/647333_std/647333_100_100.jpg" alt="<?php echo ($like['2']['title']); ?>" src="<?php echo ($like['2']['spic']); ?>" width="100%" >
                        </a>
                        <p class="name">
                            <a href="<?php echo U('Home/details/Index',array('id'=>$like['2']['id']));?>" target="_blank"><?php echo ($like['2']['title']); ?></a>
                        </p>
                        <p class="checkbox">
                            <input type="checkbox" class="J_CheckBox" name="related_index" value="d151009p647333zc" original_price="<?php echo ($like['2']['cprice']); ?>" discounted_price="<?php echo ($like['2']['price']); ?>" checked="checked" ids="{gid3}">
                            <span class="check_price en" like="<?php echo ($gid3); ?>">¥<?php echo ($like['2']['price']); ?></span>
                        </p>
                        <p class="type">
                            <select id="fit_tit01_d151009p647333zc" style="display:none;">
                                <option value="1049963,d151009p647333zc,1"></option>
                            </select>
                        </p>
                    </div>
                     <script type="text/javascript" src="/spl/jumei/Public/Home/js/jquery-1.8.3.min.js"></script>
                    <script type="text/javascript">
                        // var CHECK = true;
                        var sum = 0;
                        var csum = 0;
                        var arr = [];
                        var newarr = [];
                        $(function(){
                            var num = $('input[name=related_index]:checked').length;
                            $('#select_count_01').html(num);
                            $('input[name=related_index]').next().each(function(){
                                var a = Number($(this).html().substr(1,$(this).html().length));
                                sum += a; 
                            })
                            $('#discounted_price_sum_01').html('¥'+sum);
                            $('input[name=related_index]').each(function(){
                                var b = Number($(this).attr('original_price'));
                                csum += b; 
                               
                            })
                            $('#original_price_sum_01').html('¥'+csum);
                            $('#save_price_sum_01').html('¥'+(csum-sum));
                            // console.log(sum);
                            // console.log('¥'+(csum-sum));
                       
                        // console.log(sum);
                       
                        //绑定单价选中事件
                        $('input[name=related_index]').each(function(){

                            $(this).click(function(){
                                if($(this).attr('checked')){
                                    $(this).attr('checked',false);
                                    //总价格
                                    sum -= Number($(this).next().html().substr(1,$(this).next().html().length));
                                    $('#discounted_price_sum_01').html('¥'+sum);
                                    //总个数
                                    var num = $('input[name=related_index]:checked').length;
                                    $('#select_count_01').html(num);
                                    //参考价格
                                    csum -= Number($(this).attr('original_price'));
                                    $('#original_price_sum_01').html('¥'+csum);
                                    //获取选中的id
                                    newarr = arr.push($('input[name=related_index]:checked').attr('ids'));
                                    console.log(newarr);

                                }else{
                                    $(this).attr('checked',true);
                                     sum += Number($(this).next().html().substr(1,$(this).next().html().length));
                                    $('#discounted_price_sum_01').html('¥'+sum);
                                    var num = $('input[name=related_index]:checked').length;
                                    $('#select_count_01').html(num);
                                    csum += Number($(this).attr('original_price'));
                                    $('#original_price_sum_01').html('¥'+csum);
                                    newarr = arr.push($('input[name=related_index]:checked').attr('ids'));
                                    console.log(newarr);
                                }
                                $('#save_price_sum_01').html('¥'+(csum-sum));
                                // console.log(csum-sum);
                            })

                        })
                    })   
                    </script>
                </div>
                <div class="newdeal_fit_add">=</div>
                <div class="newdeal_fit_all">
                    <p><b>已选择<span class="num" id="select_count_01"></span>个产品</b></p>
                    <div class="newdeal_fit_allinfo">
                        <p>聚美总价：<span class="price en" id="discounted_price_sum_01"></span>
                        </p>
                        <p>参考总价：<span style="text-decoration: line-through;" id="original_price_sum_01"></span>
                        </p>
                        <p>为您节省：<span id="save_price_sum_01"></span>
                        </p>
                    </div>
                    <a href="<?php echo U('Home/Cart/index',array('gid'=>$details['id'],'lid'=>$lid));?>" class="group_buy_button" id="groupBuyBtn" rel="nofollow" tab="recommendation" pid="1339077">
                        <img src="/spl/jumei/Public/Home/details/images/fit_btn.jpg">
                    
                    </a>
                </div>
            </div>
        </div>
    </div>
<!--产品推荐组合购买 end-->

<!--产品信息-->
    <div class="layout_1090 product_detail clearfix">
        <!--left-->
        <div class="product_detail_l fl" style="float:left">
            <!--导航-->
            <div class="product_tabs">
                <div class="product_tabs_content" id="product_move">
                    <ul id="product_deal_tabs" class="new_tabs">
                        <li class="product_tabs_right">
                            <span class="price">
                                <em>¥</em><span id="tabs_price"><?php echo ($details['price']); ?></span>
                            </span>
                            <a href="<?php echo U('Home/Cart/index',array('id'=>$details['id']));?>" class="buy deal_add_cart" id="foot_car_btn"></a>
                        </li>
                        <li class="tabs-detail-title"><?php echo ($details['title']); ?><i class="icons-abt"></i></li>
                        <li class="p_tabs_menu"><a href="#product_parameter">商品参数</a></li>
                        <li class="p_tabs_menu"><a href="#product_story">商品详情</a></li>
                        <li class="p_tabs_menu report_deal_type" id="report_deal_type" style="display:block"><a href="#report_deal_show">用户口碑</a></li>
                        <li class="p_tabs_menu" style="display:block"><a href="#real_new">为您推荐</a></li>
                        <li class="p_tabs_menu"><a href="#product_promise">聚美优势</a></li>
                                                
                    </ul>
                </div>
            </div><!--导航 end--><!--内容区域-->
   
            <div style="left: 0px; position: fixed; top: 0px; z-index: 1001; width: 100%;display:none;" class="product_tabs_content nav_bar_fixed" id="_show">
                    <ul id="product_deal_tabs" class="new_tabs">
                        <li class="product_tabs_right">
                            <span class="price">
                                <em>¥</em><span id="tabs_price"><?php echo ($details['price']); ?></span>
                            </span>
                            <a class="buy deal_add_cart" id="foot_car_btn"></a>
                        </li>
                        <li style="display: list-item;" class="tabs-detail-title"><?php echo ($details['title']); ?><i class="icons-abt"></i></li>
                        <li class="p_tabs_menu"><a href="#product_parameter" class="tab_menu_a">商品参数</a></li>
                        <li class="p_tabs_menu"><a href="#product_story" class="tab_menu_a">商品详情</a></li>
                        <li style="display: list-item;" class="p_tabs_menu report_deal_type" id="report_deal_type"><a href="#report_deal_show" class="tab_menu_a" style="display:block">用户口碑</a></li>
                        <li class="p_tabs_menu"><a href="#real_new" class="tab_menu_a">为您推荐</a></li>
                        <li class="p_tabs_menu"><a href="#product_promise" class="tab_menu_a">聚美优势</a></li>
                                                
                    </ul>
                </div>
            <script type="text/javascript">
                $(function(){
                    
                    $(window).scroll(function(){
                        //导航条事件
                        var _top = $('#product_move').offset().top+50;

                        var _scroll = $(window).scrollTop();
                        // console.log(_top);
                        // console.log(_scroll);
                        if(_top >= _scroll){
                            $('#_show').css('display','none').slideUp(500);
                        }
                        if(_top <= _scroll){
                            $('#_show').css('display','block').slideDown(500);
                        }
                        //锚点事件
                        //商品参数
                        var pa_top = $('#shoppingParameter').offset().top;
                        if(pa_top <= _scroll){
                            $('#product_deal_tabs li:nth-child(3) a').addClass('current');
                        }
                        if(pa_top >= _scroll){
                            $('#product_deal_tabs li:nth-child(3) a').removeClass('current');
                        }
                        //商品详情
                        var de_top = $('#shoppingDetail').offset().top;
                        if(de_top <= _scroll){
                            $('#product_deal_tabs li:nth-child(3) a').removeClass('current');
                            $('#product_deal_tabs li:nth-child(4) a').addClass('current');
                        }
                        if(de_top >= _scroll){
                            $('#product_deal_tabs li:nth-child(4) a').removeClass('current');
                        }
                        //用户口碑
                        var user_top = $('#userKoubei').offset().top;
                        if(user_top <= _scroll){
                            $('#product_deal_tabs li:nth-child(4) a').removeClass('current');
                            $('#product_deal_tabs li:nth-child(5) a').addClass('current');
                        }
                        if(user_top >= _scroll){
                            $('#product_deal_tabs li:nth-child(5) a').removeClass('current');
                        }
                        //为您推荐
                        var re_top = $('#recommendYou').offset().top;
                        if(re_top <= _scroll){
                            $('#product_deal_tabs li:nth-child(5) a').removeClass('current');
                            $('#product_deal_tabs li:nth-child(6) a').addClass('current');
                        }
                        if(re_top >= _scroll){
                            $('#product_deal_tabs li:nth-child(6) a').removeClass('current');
                        }
                        //聚美优势
                        var ju_top = $('#jumeiAdvantage').offset().top;
                        if(ju_top <= _scroll){
                            $('#product_deal_tabs li:nth-child(6) a').removeClass('current');
                            $('#product_deal_tabs li:nth-child(7) a').addClass('current');
                        }
                        if(ju_top >= _scroll){
                            $('#product_deal_tabs li:nth-child(7) a').removeClass('current');
                        }
                    })
                })
            </script>
            <div class="product_info_border">
                <div class="product_info_detail">
                    
<!-- 新人有礼 -->
<div style="display: none;" id="new_user_imgshow" class="w_700">
    <img src="/spl/jumei/Public/Home/details/images/baoxian.jpg" style="margin:10px 14px 0;" id＝"new_user_img02">
</div>
<div class="deal_newuser_view" id="deal_newuser_view" style="display: none;">
    <div class="clearfix">
        <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?#quality_stock" target="_blank">
            <strong>正品采购</strong>
            <span></span>
            <span> 品牌商直供 </span>
            <span>专业入库检验</span>
        </a>
        <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?#brand_con" target="_blank">
            <strong>质量保证</strong>
            <span></span>
            <span>真品联盟</span>
            <span>质量保险</span>
        </a>
        <a href="http://hd.jumei.com/act/6-478-2232-guarantee.html?#unconditionally_backtrack" style="width:150px" target="_blank">
            <strong>30天无条件退货</strong>
            <span>即使拆封</span>
            <span>只要您不满意</span>
            <span>30天内我们退货</span>
        </a>
        <a href="http://www.jumei.com/activity_shangshi_140516.html?from=all_top_banner_all_null_null&amp;lo=2250&amp;mat=20783" target="_blank">
            <strong>上市公司保证</strong>
            <span>美国纽交所上市</span>
            <span>获得国际的</span>
            <span>信任和监管</span>
        </a>
        <a href="http://bj.jumei.com/act/10-478-2179-spet_newusers.html" target="_blank">
            <strong>新人专享福利</strong>
            <span>最多165元现金券</span>
            <span>满39元包邮</span>
            <span>首单返现金券礼包</span>
            <!--<span>最多165元现金券</span>
            <span>满39元包邮</span>-->
        </a>
    </div>
</div>
<!-- 新人有礼 end -->
                    
<!-- 品牌授权及防伪 -->
<div id="introduction" class="padding_18 w_700">
    <div id="title_product_authorize" class="deal_block_title title_product_authorize">
        <h2 class="detail_title"><img src="/spl/jumei/Public/Home/details/images/title_01.png"></h2>
    </div>
    <div class="deal_con_content">
                        <p style="text-align:center;margin-top:10px;"><img src="/spl/jumei/Public/Home/details/images/authorization_245.jpg"></p>
                                        <p style="text-align:center;margin-top:10px;"><img src="/spl/jumei/Public/Home/details/images/authorization_245_2.jpg"></p>
                                <div style="display: block;" class="product-validate">
                    <p class="product-validate-title">
                        <?php echo ($details['bname']); ?>                            防伪码<span id="zhenpin_flag_brand">品牌官网</span>验真流程
                    </p>
                    <ul class="product-validate-tab  product-validate-tab1">
                        <li class="current">
                            <a>
                                <span>1</span>
                                <div class="product-tab-title">
                                    <p>SECURITY CODE</p>
                                    <p class="product-tab-tt1">找到品牌防伪码</p>
                                </div>
                                <i class="product-tab-icon"></i>
                            </a>
                            <i class="product-tab-bottom"></i>
                        </li>
                        <li>
                            <a>
                                <span>2</span>
                                <div class="product-tab-title">
                                    <p>CHECK</p>
                                    <p class="product-tab-tt1">登录<b id="zhenpin_flag_login">品牌</b>官网查询</p>
                                </div>
                                <i class="product-tab-icon"></i>
                            </a>
                            <i class="product-tab-bottom"></i>
                        </li>
                        <li>
                            <a>
                                <span>3</span>
                                <div class="product-tab-title">
                                    <p>RESULT</p>
                                    <p class="product-tab-tt1">查看结果</p>
                                </div>
                                <i class="product-tab-icon"></i>
                            </a>
                            <i class="product-tab-bottom"></i>
                        </li>
                    </ul>
                    <div class="product-validate-content" style="display:none">
                        <?php echo ($shouquan['shouquan']); ?>
                    </div>
                   <!--  <div class="product-validate-content">
                        <img src="/spl/jumei/Public/Home/details/images/245_2.jpg">
                    </div>
                    <div class="product-validate-content">
                        <img src="/spl/jumei/Public/Home/details/images/245_3.jpg">
                    </div> -->
                </div>
                                        <p style="text-align:center;margin-top:10px;"><img src="/spl/jumei/Public/Home/details/images/authorization_245_3.jpg"></p>
                                    <div style="width:700px;margin:15px auto 0"></div>
    </div>
</div>
<!-- 品牌授权及防伪 end -->
                    
<!--商品参数-->
<div loaded="loaded" id="shoppingParameter" class="shopping_parameter w_700">
    <a name="product_parameter"></a>
    <h2 class="detail_title"><img src="/spl/jumei/Public/Home/details/images/title_03.png"></h2>
    <div class="mall_detail_des">            <p class="mar_t15"><?php echo ($details['intro']); ?></p>
            <table class="parameter_table" border="0" cellpadding="0" cellspacing="0" width="700">
                <tbody>
                <tr>
                    <td width="85"><b>商品名称：</b></td>
                    <td width="250">
                        <span><?php echo ($details['title']); ?></span>
                    </td>
                    <td rowspan="7" align="right" valign="bottom"><img src="<?php echo ($details['spic']); ?>" alt="<?php echo ($details['title']); ?>" border="0"></td>
                </tr>
                <tr>
                    <td><b>品&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;牌：</b></td>
                    <td><span itemprop="brand"><?php echo ($details['bname']); ?></span></td>
                </tr>
                <tr>
                    <td><b>功&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;效：</b></td>
                    <td><span><?php echo ($details['effect']); ?></span></td>
                </tr>
                                <tr>
                    <td><b>产品包装</b></td>
                    <td><span><?php echo ($details['box']); ?></span></td>
                </tr>
                                <tr>
                    <td><b>产品规格</b></td>
                    <td><span>180g</span></td>
                </tr>
                                <tr>
                    <td><b>保质期限</b></td>
                    <td><span><?php echo ($details['year']); ?></span></td>
                </tr>
                                <tr>
                    <td><b>原产国家</b></td>
                    <td><span><?php echo ($details['made']); ?></span></td>
                </tr>
                                <tr>
                    <td><b>温馨提示</b></td>
                    <td><span><?php echo ($details['notice']); ?></span></td>
                </tr>
                                <tr>
                    <td><b>适合肤质</b></td>
                    <td><span><?php echo ($details['toface']); ?></span></td>
                </tr>
                                </tbody>
            </table>
        </div>
</div>
<!--商品参数 end-->
<!--商品详情-->
<div id="shoppingDetail" class="shopping_detail w_700">
    <a name="product_story"></a>
    <h2 class="detail_title"><img src="/spl/jumei/Public/Home/details/images/title_05.png"></h2>
    <div class="mall_detail_des">
                    <!-- <a href="http://mall.jumei.com/yunifang" target="_blank"><img src="/spl/jumei/Public/Home/details/images/14411725743800.jpg" width="660" height="94" alt="" /></a><br /><a href="http://item.jumei.com/1095430.html" target="_blank"><img src="/spl/jumei/Public/Home/details/images/14411725745953.jpg" width="330" height="230" alt="" /></a><a href="http://item.jumei.com/1623951.html" target="_blank"><img src="/spl/jumei/Public/Home/details/images/14411725753554.jpg" width="330" height="230" alt="" /></a><br /><a href="http://item.jumei.com/1095430.html" target="_blank"><img src="/spl/jumei/Public/Home/details/images/14411725755255.jpg" width="330" height="223" alt="" /></a><a href="http://item.jumei.com/1747485.html" target="_blank"><img src="/spl/jumei/Public/Home/details/images/14411725829629.jpg" width="330" height="223" alt="" /></a><br /><a href="http://item.jumei.com/1352241.html" target="_blank"><img src="/spl/jumei/Public/Home/details/images/14411725831288.jpg" width="221" height="303" alt="" /></a><a href="http://item.jumei.com/647331.html" target="_blank"><img src="/spl/jumei/Public/Home/details/images/14411725833217.jpg" width="219" height="303" alt="" /></a><a href="http://item.jumei.com/988254.html" target="_blank"><img src="/spl/jumei/Public/Home/details/images/144117258475.jpg" width="220" height="303" alt="" /></a><img src="/spl/jumei/Public/Home/details/images/1443099157.6774.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279217.5795.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279217.7021.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279217.8328.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1443098946.2478.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/14395442365846.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279218.3631.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279218.4983.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279218.6493.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279218.8386.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279218.9681.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279219.1008.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279219.2511.jpg" alt="" /><img src="/spl/jumei/Public/Home/details/images/1439279219.365.jpg" alt="" />  -->    
                    <?php if(is_array($bigpics)): foreach($bigpics as $key=>$vo): echo ($vo); endforeach; endif; ?> 
    </div>
</div>
<!--商品详情 end-->
<!-- 使用方法 -->
<!-- <div id="useMethod" class="use_method w_700 ">
    <a name="product_make"></a>
    <h2 class="detail_title"><img src="/spl/jumei/Public/Home/details/images/title_07.png"></h2>
    <div class="mall_detail_des">        <span style="white-space:normal;font-family:SimSun;">洁面后，取适量面膜均匀敷在肌肤上(请注意避开眼睛及嘴唇周围)，适当按摩片刻后即可安睡，次日起床用温水洗净即可。&nbsp;</span><br style="white-space:normal;">
    <strong style="white-space:normal;"><span style="font-family:SimSun;">温馨提示：</span></strong><span style="white-space:normal;font-family:SimSun;">护肤品成分各有不同，敏感性肌肤的人士请先在耳后进行测试后再使用哦！</span>        
    </div>
</div> -->
<!-- 使用方法 end -->
<!--商品实拍-->
<!-- <div loaded="loaded" id="goodsReality" class="goods_reality w_700">
    <a name="real_photo"></a>
    <h2 class="detail_title"><img src="/spl/jumei/Public/Home/details/images/title_09.png"></h2>
    <div class="mall_detail_des">                        <p>
    <img src="/spl/jumei/Public/Home/details/images/1443099694.5886.jpg" alt=""> 
    </p>
    <p>
        <span style="color:#000000;font-size:16px;font-family:'Microsoft YaHei';">御泥坊玫瑰滋养矿物睡眠面膜180g，沙漠蔷薇精粹，多倍抓水力，补水更锁水，深入肌肤底层，激发肌肤源源水润动力。</span> 
    </p>
    <p>
        <img src="/spl/jumei/Public/Home/details/images/1436861953.007.jpg" alt=""> 
    </p>
    <p>
        <span style="color:#000000;font-size:16px;font-family:'Microsoft YaHei';"><span style="font-family:'Microsoft YaHei';font-size:15.555556297302246px;line-height:26.666667938232422px;white-space:normal;">蕴含天然矿物泥浆，</span>柔滑水润质地。</span> 
    </p>
    <p>
        <img src="/spl/jumei/Public/Home/details/images/1436861962.4234.jpg" alt=""> 
    </p>
    <p>
        <span style="font-family:'Microsoft YaHei';font-size:16px;"><span style="font-family:'Microsoft YaHei';font-size:16px;line-height:24px;white-space:normal;">打开密封盖，可见晶莹的粉色膏体。</span></span> 
    </p>
    <p>
        <img src="/spl/jumei/Public/Home/details/images/1436861970.7167.jpg" alt=""> 
    </p>
    <p>
        <span style="color:#000000;font-size:16px;font-family:'Microsoft YaHei';">添加国家专利提取矿物泥浆精华，补水护肤的同时，增强肌肤抵御力。<span style="font-family:'Microsoft YaHei';font-size:15.555556297302246px;line-height:26.666667938232422px;white-space:normal;"></span></span> 
    </p>
    <p>
        <img src="/spl/jumei/Public/Home/details/images/1436861978.2968.jpg" alt=""> 
    </p>
    <p>
        <span style="font-family:'Microsoft YaHei';font-size:16px;line-height:24px;white-space:normal;">现有两种包装（有刮板和无刮板），两者随机发货。外包装有详细产品介绍，方便查阅。</span>
    </p>                                    <div class="deal_sorts_main" style="border-top:none;border-bottom:none;">
                <div style="background:#fff;padding:20px 20px 0;">
                    <div style="background:#f5f5f5; border:solid 1px #e4e4e4;padding:10px;">
                        <p style="color:#333;">本商品由 聚美优品 拥有和销售</p>
                    </div>
                </div>
            </div>
                </div>
</div> -->
<!--商品实拍 end-->
                            
                            
                            
                </div>
<!-- 用户口碑 -->
<div loaded="loaded" id="userKoubei" class="user_koubei w_700">
    <a name="report_deal_show"></a>
    <h2 class="detail_title"><img src="/spl/jumei/Public/Home/details/images/title_11.png"></h2>
    <div id="script_koubei"><div class="rp_bigimg_wrap"><div class="rp_bigimg_wrap_bg"></div><div class="rp_bigimg_wrap_con"><div class="img_wrap"></div></div></div><div id="product_report" class="deal_con product_report"><div id="reportwrap"><div id="product_report_title" class="block_title"><span style="display:none;">口碑报告</span></div><ul style="display: none;" id="reportload"><li class="loading"><img src="/spl/jumei/Public/Home/details/images/loading.gif"><span>正在加载，请稍候...</span></li></ul><div class="deal_con_content" style=""><div class="product_report_ranks"><div class="rp_score_l"><span class="tit"></span><div><h2 class="record_num">5.0/5</h2></div><p class="pink"><a target="_blank" title="查看全部口碑" href="http://koubei.jumei.com/report_list-252730.html" class="reda"><?php echo ($numm); ?></a>口碑&nbsp;&nbsp;</p><div class="report_share_btn"><a href="<?php echo U('Home/Comment/add',array('title'=>$details['title'],'id'=>$id,'uid'=>$uid));?>" target="_blank" style="background:url('/spl/jumei/Public/Home/details/images/pink_mid_btn.png')">我要写口碑</a></div></div><div class="rp_score_right"><h2 class="use_tit">使用者印象：</h2><div class="score_wrap"><div>抗衰老 5<br>高于同类35.14%</div><div>美白度 5<br>高于同类25%</div><div>收缩毛孔 5<br>高于同类21.95%</div><div>粉刺护理 5<br>高于同类19.05%</div><div>保湿度 5<br>高于同类16.28%</div><div>低刺激 5<br>高于同类8.7%</div></div></div><div class="clear"></div></div><h2 class="use_tit renqun_tit"></h2><ul style="display: none;" id="con_loading"><li class="loading"><img src="/spl/jumei/Public/Home/details/images/loading.gif"><span>正在加载，请稍候...</span></li></ul>
    <?php if(is_array($coms)): foreach($coms as $key=>$vo): ?><ul id="reports_list_wrap" class="reports_list_wrap"><li class="pfTrends"><div class="arrow"></div><div class="avatar user_info_wrap"><a target="_blank" rel="nofollow" class="userHeadImg" href="http://koubei.jumei.com/user/Ud9a39c955f5cb568"><img alt="JM139CENB1858" src="<?php echo ((isset($coms['pic']) && ($coms['pic'] !== ""))?($coms['pic']):"/spl/jumei/Public/Home/Comment/images/liyugang.png"); ?>"></a><div class="user_name_wrap" style="width:55px;overflow:hidden;"><a title="JM139CENB1858" target="_blank" class="user_name" href="http://koubei.jumei.com/user/Ud9a39c955f5cb568" style="font-size:10px;font-family:'微软雅黑';width:50px;overflow:hidden"><?php echo ((isset($vo["username"]) && ($vo["username"] !== ""))?($vo["username"]): $coms[$key][phone]); ?></a><br></div><span class="user_attr"><div></div></span></div><div class="report"><div class="user_info"><div class="rp_tit"><a title="<?php echo ($details['title']); ?>" target="_blank" class="tit" href="<?php echo U('Home/Reply/index',array('uid'=>$coms[$key][uid],'gid'=>$coms[$key][gid]));?>"><?php echo ($details['title']); ?></a></div></div><div class="report_content" style="height:150px;overflow:hidden"><div class="desc"><a target="_blank" href="<?php echo U('Home/Reply/index',array('uid'=>$coms[$key][uid],'gid'=>$coms[$key][gid]));?>"><?php echo ($vo["content"]); ?></a></div></div><div class="gray_f1 pt10"><div class="txtL"><div style="float:left;">52阅读<em>|</em><span class="redtxt">1</span><b>回复</b>&nbsp;&nbsp;<a href="<?php echo U('Home/Reply/index',array('uid'=>$coms[$key][uid],'gid'=>$coms[$key][gid]));?>" target="_blank">我要回复</a></div></div><div class="cl"></div></div></div></li></ul><?php endforeach; endif; ?>

    <div class="clearfix" style="clear:both;"><div style="display: none;" id="pageSplit" class="pageSplit"></div></div></div></div></div></div>
</div>
<!-- 用户口碑end -->

<!-- 为您推荐 -->
<div loaded="loaded" id="recommendYou" class="recommend_you w_700">
    <a name="real_new"></a>
    <h2 class="detail_title"><img src="/spl/jumei/Public/Home/details/images/title_13.png"></h2>
    <div class="mall_detail_des">
        <h2 class="mar_t20"><div>买了此商品的用户还买了</div></h2>
        <ul class="mar_t20 clearfix">
            <?php if(is_array($also)): foreach($also as $key=>$vo): ?><li>
                    <a href="<?php echo U('Home/Details/index',array('id'=>$like[$vo]['id']));?>" title="<?php echo ($like[$vo]['title']); ?>" target="_blank" class="pic">
                        <img src="<?php echo ($like[$vo]['spic']); ?>" alt="" height="100" width="100">
                    </a>
                    <p class="tit">
                        <a href="http://item.jumei.com/1352241.html?from=r_m_da_1339077_1-1" title="<?php echo ($like[$vo]['title']); ?>" target="_blank"><?php echo ($like[$vo]['title']); ?></a>
                    </p>
                    <p class="price">¥<?php echo ($like[$vo]['price']); ?></p>
                    
                </li><?php endforeach; endif; ?>
        </ul>
    </div>
</div>
<!-- 为您推荐end -->

<!-- 聚美优势 -->
<div id="jumeiAdvantage" class="jumei_advantage w_700">
    <a name="product_promise"></a>
    <h2 class="detail_title"><img src="/spl/jumei/Public/Home/details/images/title_15.png"></h2>
    <div class="selector ecope_tab product_promise_tabs mar_t20" id="product_promise_tabs">
        <ul class="tab_menu">
            <li data-index="0" class="" style="height:80px;border:none;padding:0px;">
                <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/goods_icon.jpg" src="/spl/jumei/Public/Home/details/images/goods_icon.jpg">
            </li>
            <li class="" data-index="1" style="height:80px;border:none;padding:0px;">
                <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/backtrack_icon.jpg" src="/spl/jumei/Public/Home/details/images/backtrack_icon.jpg"></li>

            <li class="" data-index="2" style="height:80px;border:none;padding:0px;">
                <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/storage_icon.jpg" src="/spl/jumei/Public/Home/details/images/storage_icon.jpg">
            </li>
            <li class="" data-index="3" style="height:80px;border:none;padding:0px;">
                <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/consignment_icon.jpg" src="/spl/jumei/Public/Home/details/images/consignment_icon.jpg">
            </li>
            <li class="" data-index="4" style="height:80px;border:none;padding:0px;">
                <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/packaging_icon.jpg" src="/spl/jumei/Public/Home/details/images/packaging_icon.jpg">
            </li>
            <li class="" data-index="5" style="height:80px;border:none;padding:0px;">
                <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/serving_icon.jpg" src="/spl/jumei/Public/Home/details/images/serving_icon.jpg">
            </li>
            <li class="current" data-index="6" style="height:80px;border:none;padding:0px;">
                <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/star_icon.jpg" src="/spl/jumei/Public/Home/details/images/star_icon.jpg">
            </li>
            <li class="" data-index="7" style="height:80px;border:none;padding:0px;">
                <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/evaluate_icon.jpg" src="/spl/jumei/Public/Home/details/images/evaluate_icon.jpg">
            </li>
        </ul>
        <div class="tab_wrapper">
            <div class="tab_content">
                <div id="goods" class="tab_box" style="display: none;">
                    <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/goods_content.jpg" usemap="#goodsMap" src="/spl/jumei/Public/Home/details/images/goods_content.jpg">
                    <map name="goodsMap" id="goodsMap">
                        <area shape="rect" coords="7,709,652,769" href="http://www.jumei.com/activity_guarantee.html" target="_blank" rel="nofollow">
                    </map>
                </div>
                <div id="backtrack" class="tab_box" style="display: none;">
                        <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/backtrack_content.jpg?v=1" usemap="#backtrackMap" src="/spl/jumei/Public/Home/details/images/backtrack_content.jpg?v=1">
                        <map name="backtrackMap" id="backtrackMap">
                            <area shape="rect" coords="7,709,652,769" href="http://www.jumei.com/activity_guarantee.html#unconditionally_backtrack" target="_blank" rel="nofollow">
                        </map>
                    </div>
                <div id="storage" class="tab_box" style="display: none;">
                    <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/storage_content.jpg?v=1" usemap="#storageMap" src="/spl/jumei/Public/Home/details/images/storage_content.jpg?v=1">
                    <map name="storageMap" id="storageMap">
                        <area shape="rect" coords="7,709,652,769" href="http://www.jumei.com/activity_guarantee.html#finial_storage" target="_blank" rel="nofollow">
                    </map>
                </div>
                <div id="consignment" class="tab_box" style="display: none;">
                    <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/consignment_content.jpg?v=1" usemap="#consignmentMap" src="/spl/jumei/Public/Home/details/images/consignment_content.jpg?v=1">
                    <map name="consignmentMap" id="consignmentMap">
                        <area shape="rect" coords="7,709,652,769" href="http://www.jumei.com/activity_guarantee.html#bold_consignment" target="_blank" rel="nofollow">
                    </map>
                </div>
                <div id="package" class="tab_box" style="display: none;">
                    <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/packaging_content.jpg" usemap="#packagingMap" src="/spl/jumei/Public/Home/details/images/packaging_content.jpg">
                    <map name="packagingMap" id="packagingMap">
                        <area shape="rect" coords="7,709,652,769" href="http://www.jumei.com/activity_guarantee.html#finial_storage" target="_blank" rel="nofollow">
                    </map>
                </div>
                <div id="serving" class="tab_box" style="display: none;">
                    <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/serving_content.jpg" usemap="#servingMap" src="/spl/jumei/Public/Home/details/images/serving_content.jpg">
                    <map name="servingMap" id="servingMap">
                        <area shape="rect" coords="7,709,652,769" href="http://www.jumei.com/activity_guarantee.html#gold_service" target="_blank" rel="nofollow">
                        <area shape="rect" coords="358,566,632,611" id="serving_fav_tell" rel="nofollow" style="cursor: pointer;">
                        <area shape="rect" coords="360,615,630,657" href="http://e.weibo.com/tuanmei" target="_blank" rel="nofollow">
                        <area shape="rect" coords="15,660,346,702" href="http://www.meilishuo.com/person/u/4469963" target="_blank" rel="nofollow">
                        <area shape="rect" coords="360,661,630,704" href="http://www.mogujie.com/jumei" target="_blank" rel="nofollow">
                    </map>
                </div>
                <div id="star" class="tab_box" style="display: block;">
                    <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/star_content.jpg" usemap="#starMap" src="/spl/jumei/Public/Home/details/images/star_content.jpg">
                    <map name="starMap" id="starMap">
                        <area shape="rect" coords="6,705,651,765" href="http://www.jumei.com/activity_guarantee.html#star_commend" target="_blank" rel="nofollow">
                        <area shape="rect" coords="12,104,321,302" href="http://v.youku.com/v_show/id_XNDMxNzI3NDAw.html" target="_blank" rel="nofollow">
                        <area shape="rect" coords="334,102,641,301" href="http://v.youku.com/v_show/id_XNDMxNzI3NjEy.html" target="_blank" rel="nofollow">
                        <area shape="rect" coords="13,314,323,510" href="http://v.youku.com/v_show/id_XNDMxNzI3MDc2.html" target="_blank" rel="nofollow">
                        <area shape="rect" coords="331,312,641,510" href="http://v.youku.com/v_show/id_XNDMxNzI4MTg0.html" target="_blank" rel="nofollow">
                    </map>
                </div>
                <div id="evaluate" class="tab_box" style="display: none;">
                    <img class="deal_lazy_img" data-lazysrc="http://p0.jmstatic.com/templates/jumei/images/detail/evaluate_content.jpg" usemap="#evaluateMap" src="/spl/jumei/Public/Home/details/images/evaluate_content.jpg">
                    <map name="evaluateMap" id="evaluateMap">
                        <area shape="rect" coords="6,705,651,765" href="http://www.jumei.com/activity_guarantee.html#user_confide" target="_blank" rel="nofollow">
                        <area shape="rect" coords="73,580,568,689" href="http://koubei.jumei.com" target="_blank" rel="nofollow">
                    </map>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 聚美优势end -->
            </div>
            <!--内容区域 end-->
        </div>
        <!--left end-->
        <!--right-->
        <div class="product_detail_r fr" style="display:block">
            <!--同品牌推荐-->
            <div class="slideBar" id="same_band_introduce" style="display:block">
                <h3 class="slideBar_title">同品牌推荐</h3>
                <div class="slidebar_brand_img"><img style="width:120px; height:60px;" src="<?php echo ($logo["logo"]); ?>" onerror="$(this).parent().hide()"></div>
                <ul class="slideBar_ul">
                    <?php $__FOR_START_24852__=3;$__FOR_END_24852__=13;for($i=$__FOR_START_24852__;$i < $__FOR_END_24852__;$i+=1){ ?><li><div class="left_part"><a target="_blank" title="<?php echo ($like[$i]['gname']); ?>" href="<?php echo U('Home/details/Index',array('id'=>$like[$i]['id']));?>"><img src="<?php echo ($like[$i]['spic']); ?>" lazy-src="http://p2.jmstatic.com/product/000/811/811427_std/811427_60_60.jpg"></a></div><div class="right_part"><p class="name"><a target="_blank" title="<?php echo ($like[$i]['gname']); ?>" href="<?php echo U('Home/details/Index',array('id'=>$like[$i]['id']));?>"><?php echo ($like[$i]['title']); ?></a></p><p class="price">¥<?php echo ($like[$i]['price']); ?><span> (<?php echo ($like[$i]['discount']); ?>折)</span></p></div></li><?php } ?>
                </ul>
            </div>
            <!--同品牌推荐 end-->
            <!--同类型推荐-->
            <div class="slideBar" id="same_type_introduce" style="display:block">
                <h3 class="slideBar_title">同类型推荐</h3>
                <div class="slideBar_content">
                    <ul class="slideBar_ul">
                        <?php $__FOR_START_7613__=12;$__FOR_END_7613__=21;for($i=$__FOR_START_7613__;$i < $__FOR_END_7613__;$i+=1){ ?><li><div class="left_part"><a target="_blank" title="<?php echo ($same[$i]['gname']); ?>" href="<?php echo U('Home/details/Index',array('id'=>$same[$i]['id']));?>"><img src="<?php echo ($same[$i]['spic']); ?>" lazy-src="http://p3.jmstatic.com/product/000/003/3848_std/3848_60_60.jpg"></a></div><div class="right_part"><p class="name"><a target="_blank" title="<?php echo ($same[$i]['gname']); ?>" href="<?php echo U('Home/details/Index',array('id'=>$same[$i]['id']));?>"><?php echo ($same[$i]['title']); ?></a></p><p class="price">¥<?php echo ($same[$i]['price']); ?><span> (<?php echo ($same[$i]['discount']); ?>折)</span></p></div></li><?php } ?>
                    </ul>
                </div>
            </div>
            <!--同类型推荐 end-->
            <!--新品爆款-->
            <div class="slideBar" id="same_new_introduce" style="display:block">
                <h3 class="slideBar_title">新品爆款</h3>
                <div class="slideBar_content">
                    <ul class="slideBar_ul">
                        <?php $__FOR_START_28594__=0;$__FOR_END_28594__=9;for($i=$__FOR_START_28594__;$i < $__FOR_END_28594__;$i+=1){ ?><li><div class="left_part"><a target="_blank" title="<?php echo ($hot[$i]['gname']); ?>" href="<?php echo U('Home/details/Index',array('id'=>$hot[$i]['id']));?>"><img src="<?php echo ($hot[$i]['spic']); ?>" lazy-src="http://p2.jmstatic.com/product/000/811/811427_std/811427_60_60.jpg"></a></div><div class="right_part"><p class="name"><a target="_blank" title="<?php echo ($hot[$i]['gname']); ?>" href="<?php echo U('Home/details/Index',array('id'=>$hot[$i]['id']));?>"><?php echo ($hot[$i]['title']); ?></a></p><p class="price">¥39<span> (<?php echo ($hot[$i]['discount']); ?>折)</span></p></div></li><?php } ?>
                    </ul>
                </div>
            </div>
                <!-- </div> 
            <!--新品爆款 end-->
            <!-- 手机客户端 -->
            <a href="http://www.jumei.com/i/activity/download_app" rel="nofollow" style="margin-bottom:15px;display:inline-block;" target="_blank">
                <img src="/spl/jumei/Public/Home/details/images/mobile_sidebar_v3.png" border="0" alt="手机客户端"/>
            </a>
            <!-- 手机客户端 end-->
        </div>
        <!--right end-->
        
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
    <script src="/spl/jumei/Public/Home/srcs/lib.js">
    </script>
    <script src="/spl/jumei/Public/Home/srcs/monitor.js">
    </script>
    <script src="/spl/jumei/Public/Home/srcs/ui.js">
    </script>
    <script src="/spl/jumei/Public/Home/srcs/app.js">
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
                    jm_tj.src = 'http://p0.jmstatic.com/templates/jumei//spl/jumei/Public/Home/images/jquery/Jumei.AdStatistics.js';
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
    <script type="text/javascript" src="/spl/jumei/Public/Home/srcs/adw_002.js">
    </script>
    <iframe id="emar_box_pv" src="/spl/jumei/Public/Home/srcs/_adw.htm" style="width: 1px; border: 0px none; position: absolute; left: -100px; top: -100px; height: 1px;">
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
        //获取元素
        var small = $('#small');
        var big = $('#big');
        var move = $('#move');
        var bImg = $('#bImg');
        var sImg = $('#sImg');
        // big.css('border','1px solid red');
        //给小图div绑定鼠标移动事件
        small.mousemove(function(e){
            //修改鼠标的样式
            small.css('cursor','move');
            big.css('display','block');
            move.css('visibility','visible');
            //获取鼠标的位置
            var x = e.pageX;//获取当前鼠标相对于文档的偏移量
            var y = e.pageY;

            //获取小div相对于文档的偏移量
            // var _l = small.offsetLeft;
            // var _t = small.offsetTop;
            var _t = small.offset().top;
            var _l = small.offset().left;
            
            //获取移动div宽度的一般
            var _w = move.width()/2;
            var _h = move.height()/2;

            //计算新的left值
            var newL = x-_l-_w;
            var newT = y-_t-_h;

            //检测越界
            if(newL <= 0){
                newL = 0;
            }
            var maxLeft = small.width() - move.width();
            if(newL >= maxLeft){
                newL = maxLeft;
            }

            if(newT <= 0){
                newT = 0;
            }
            var maxTop = small.height() - move.height();
            if(newT >= maxTop){
                newT = maxTop;
            }
            //设置css
            move.css('left',newL + 'px');
            move.css('top',newT + 'px');


            //计算移动的比例
            var sW = small.width();
            var mL = newL;
            var p = mL/sW;

            //Y轴的比例
            var yP = newT/small.height();

            //获取右侧大图的宽度
            var bW = bImg.width();
            var bH = bImg.height();

            //计算右侧图片移动的距离
            var nL = bW*p;
            var nT = bH*yP;

            //设置css样式
            bImg.css('left',-nL+'px');
            bImg.css('top',-nT + 'px');

            //计算移动div的宽度和高度
            var Bp = big.width()/bImg.width();
            var sW = small.width();

            var Bpp = big.height()/bImg.height;
            var sH = small.height;

            //计算新的宽度值
            var mW = sW*Bp;
            var mH = sH*Bpp;

            move.css('width',mW + 'px');
            move.css('height',mH + 'px');
        })

        //绑定鼠标离开事件
        small.mouseout(function(){
            //visibility
            move.css('visibility','hidden');
            big.css('display','none');
        })

        
        //获取img
        $('.imgs').each(function(){

            $(this).mouseover(function(){
                $(this).css('border','1px solid #ed145a');
                var big = $(this).attr('big');
                var jqimg = $(this).attr('jqimg');
                bImg.attr('src',jqimg);
                sImg.attr('src',big);
            })
            $(this).mouseout(function(){
                $(this).css('border','1px solid #eee');
            })
        })


        //购物车
        var SUMS = '';
        $('.number_reduce').click(function(){
            var num = $('input[id=buy_number]').val();
            var jian = num - 1;
            if(jian <= 1){
                jian = 1;
            }
            $('input[id=buy_number]').val(jian);
            SUMS = $('input[id=buy_number]').val();
            // console.log(SUMS);
        })
        $('.number_add').click(function(){
           num = Number($('input[id=buy_number]').val());
            var jian = num + 1;
            // if(jian <= 0){
            //     jian = 0;
            // }
            $('input[id=buy_number]').val(jian);
            SUMS = $('input[id=buy_number]').val();
            // console.log(SUMS);
        })

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
        $(".mall_info_button").delegate(".mall_addcart_up", "click",
        function(){

            var that = $(this);
            var gid = that.attr("gid");
            var num =$('#buy_number').val();
            $.ajax({
                type: "POST",
                url: "<?php echo U('Home/Cart/insert');?>",
                data: {gid:gid,num:num},
                success: function(data) {
                    if (data) {
                         var Top=parseInt(that.offset().top);
                var Left=parseInt(that.offset().left);
                var carTop=$('.mpbtn_cart').find('s').offset().top;
                var carLeft=$('.mpbtn_cart').find('s').offset().left;

              
                var flygood=$('#sImg').clone();
                flygood.removeAttr('id');
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
    })


</script>



    <!-- 晶赞 -->
    <!-- 公共JS end -->
    
   
    
    
    <img style="display: none; width: 0px; height: 0px;" src="/spl/jumei/Public/Home/srcs/pv.gif">
    <div style="display: none;" id="criteo-tags-div">
        <iframe src="/spl/jumei/Public/Home/srcs/dis.htm" style="display: none;" height="0"
        width="0">
        </iframe>
    </div>

</body>

</html>