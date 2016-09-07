<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no">
    <meta http-equiv="cleartype" content="on">
    <title>聚美优品</title>
    <link rel="stylesheet" type="text/css" href="/jumei/Public/Home/join/jumei.css">
    <link rel="stylesheet" type="text/css" href="/jumei/Public/Home/join/comm.css">
  
    </style>
</head>
<body>
<div class="about_page_wrap">
    <div class="top">
        <img src="/jumei/Public/Home/join/jm.png">
    </div>
    <div class="jm_tl clear">
        <ul>
            <li>
                
            </li>
            <li>
                
            </li>
            <li class="active">
                
            </li>
        </ul>
    </div>
    <div class="warp" id="positionList">
<div class="banner">
    <img src="/jumei/Public/Home/join/banner.jpg">
</div>
<div class="job">
    <ul class="clear">
        <li>
            职位名称
        </li>
        <li>
            工作地点
        </li>
        <li>
            招聘人数
        </li>
        <li>
            开始时间
        </li>
    </ul>
</div>
<div class="list" id="projectDiv">
        <?php if(is_array($works)): foreach($works as $key=>$vo): ?><ul class="clear list_h" jid="<?php echo ($vo["id"]); ?>">
            <li>
               <?php echo ($vo["jname"]); ?>
            </li>
            <li>
                <?php echo ($vo["place"]); ?>
            </li>
            <li>
               <?php echo ($vo["num"]); ?>
            </li>
            <li>
               <?php echo ($vo["startime"]); ?>
                <img src="/jumei/Public/Home/join/up.png" class="up">
            </li>
        </ul>
        <div class="station clear" style=" display: none;width: 100%;" name="<?php echo ($vo["id"]); ?>">
        <div class="ke-content" style="width:820px;background:white">
        <p style="text-indent: 2em;padding-top:10px">
            ■职位介绍:
           <?php echo ($vo["introduce"]); ?>
        </p>
        <a target="_blank" href="" class="btn" style="margin-top:30px"><p>职位申请</p></a>

        </div>
        
        </div><?php endforeach; endif; ?>
        
    
</div>

    <div class="pager p_bottom fr">
        <span class="total fl">共<b><?php echo ($count); ?></b>条</span>
        <div class="page">
            <div class="page"> <a class="arr_rg" href="javascript:void(0)" name="hrNextHref" update="#positionList" link="/outterSupport/jumeiPositionList?lang=zh&amp;offset=10&amp;max=10"></a><span class="nums"><?php echo ($nowPage); ?>/ <?php echo ($totalPages); ?></span></a><span><?php echo ($pages); ?></span></div>
        </div>
    </div>

</div>


    <div class="bottom clear">
        <div id="footer_link">
            <p>
                <a href="http://www.jumei.com/about/about_us?from=footer" target="_blank" rel="nofollow">关于聚美优品</a>
                <a href="http://jumei.investorroom.com/?from=footer" target="_blank" rel="nofollow">INVESTOR RELATIONS</a>
                <a href="http://hd.jumei.com/act/9-478-2448-pop_invite_business_page.html?site=%7B$current_site%7D&amp;from=footer" target="_blank" rel="nofollow">商家入驻</a>
                <a href="http://www.jumei.com/help/get_update?from=footer" target="_blank" rel="nofollow">获取更新</a>
                <a href="http://www.jumei.com/i/market/cooperation?from=footer" target="_blank" rel="nofollow">品牌合作专区</a>
                <a href="http://cps.jumei.com/?from=footer" target="_blank" rel="nofollow">网站联盟</a>
                <a href="http://www.jumei.com/about/news_center?from=footer" target="_blank" rel="nofollow">媒体报道</a>
                <a href="http://www.jumei.com/about/business?from=footer" target="_blank" rel="nofollow">商务合作</a>
            </p>
        </div>

        <p>
            COPYRIGHT © 2010-2015 北京创锐文化传媒有限公司 JUMEI.COM 保留一切权利。客服热线：400-123-8888
            <br>
            京公网安备 11010102001226 | <a href="http://www.miibeian.gov.cn/" target="_blank" rel="nofollow">京ICP证111033号</a> | 食品流通许可证 SP1101051110165515（1-1） | <a href="http://p2.jmstatic.com/activity/2013_chuangrui.jpeg" target="_blank" rel="nofollow">营业执照</a>
        </p>
    </div>
</div>  
    <script type="text/javascript" src="/jumei/Public/Home/join/jquery-1.8.3.min.js"></script>
    <script type="text/javascript">
    $(function(){
        $('.up').live('click',function(){
            var that = $(this);
            that.click(function() {
                    $(this).attr('src','/jumei/Public/Home/join/down.jpg').css({'height':'20px','margin-left':'20px','width':'20px'});
                $(this).parents('.list_h').siblings().find('img').attr('src',"/jumei/Public/Home/join/up.png");
                var jid =that.parents('.list_h').attr('jid');
               $('.station[name='+jid+']').css('display','block').siblings('.station').css('display','none');
               $(this).removeClass('up').addClass('down');
            })
            
        })


        $('.down').live('click',function(){
            
            var that=$(this);
             that.click(function(){
                 $(this).attr('src','/jumei/Public/Home/join/up.png').css({'height':'20px','margin-left':'20px','width':'20px'});
                   $(this).removeClass('down').addClass('up');
                    var jid =that.parents('.list_h').attr('jid');
                    $('.station[name='+jid+']').css('display','none');
             })
            
            
            
        })
    })

    </script>

</body></html>