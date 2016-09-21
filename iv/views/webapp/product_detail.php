<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/Public/css/aui.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/aui-flex.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/iconfont.css" />
    <style type="text/css">
    body {
        background: #f5f5f5;
        font-family: 'Microsoft Yahei','Arial';
        /*解决文字右边不对齐的情况 火狐第一个  ie第二个*/
        text-align:justify; 
        text-justify:distribute;
    }
    #pre_mark{
        visibility: hidden;
    }
    img{
        margin:0;
        padding:0;
    }
    .box [class*=aui-flex-]:not(.aui-flex-col) {
        background-color: rgba(26, 188, 156, 0.5);
        color: #ffffff;
        font-size: 12px;
    }
    .box.nobg [class*=aui-flex-]:not(.aui-flex-col){
        background: #ffffff;
    }
    .box.bottom {
        margin-bottom: 15px;
    }
    .demo-box {
        height: 300px;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
    }
    .demo-box::-webkit-scrollbar {
        width: 0px;
        height: 0px;
        visibility: hidden;
    }
    .img-list {
        padding: 2px 2px 0 2px;
    }
    .img-list > div {
        padding: 2px 2px 0 2px;
    }
    .img-list img {
        display: block;
    }
    .mbd,.obd{
        padding:5px 10px 5px 10px;
    }
    .obd{
        background-color: #fff;
        margin-top: 10px;
    }
    .face_img{
        height:280px;
        width: 100%
    }
    .pro_title{
        font-size: 18px;
        color:#333;
    }
    .expire{
        font-size:12px;
        color:#666666; 
    }
    .group_num{
        font-size: 14px;
        color:#777;
        margin:10px 0px;
        margin-top:20px;
    }
    .lang{
        font-size: 14px;
        color:#777;
        float: left;
    }
    .lang_c li{
        float: left;
        margin-left: 10px;
        color:#333;
        font-size: 14px;
        height:20px;
        line-height: 20px;
        padding:0 10px;
    }
    .clear{
        clear: both
    }
    .cus_adviser{
        font-size: 14px;
        color:#333333;
        height: 50px;
        line-height: 50px;
    }
    .contact{
        background: url(/Public/images/phone_call.png) no-repeat;
        background-position: left center;
        background-size: contain;
        height:50px;
        line-height: 50px;
        text-indent: 10px;
        width: 150px;
        font-size: 14px;
    }
    
    .label_b{
        color: #333;
        font-size: 16px;
        font-weight: bold;
    }
    .lable_c{
        overflow: hidden;
    }
    .lable_c li{
        width: 96px;           
        float: left;
        margin-top: 20px;
        margin-right: 17px;
        text-indent: 10px;
        font-size: 14px;
        color:#ffffff;
    }
    .lable_c li:nth-child(1){
        border-left: solid #FFAEAD 2px;
    }
    .lable_c li:nth-child(1) p{
            background:#FFAEAD;
    }
    .lable_c li:nth-child(1) span{
           border-left: 20px solid #FFAEAD;
    }
    .lable_c li:nth-child(2){
        border-left: solid #7EEB89 2px;
    }
    .lable_c li:nth-child(2) p{
            background:#7EEB89;
    }
    .lable_c li:nth-child(2) span{
           border-left: 20px solid #7EEB89;
    }
    .lable_c li:nth-child(3){
        border-left: solid #E4A8FF 2px;
    }
    .lable_c li:nth-child(3) p{
            background:#E4A8FF;
    }
    .lable_c li:nth-child(3) span{
           border-left: 20px solid #E4A8FF;
    }
    .lable_c li:nth-child(4){
        border-left: solid #F77F7C 2px;
    }
    .lable_c li:nth-child(4) p{
            background:#F77F7C;
    }
    .lable_c li:nth-child(4) span{
           border-left: 20px solid #F77F7C;
    }
    .lable_c li:nth-child(5){
        border-left: solid #94B5FF 2px;
    }
    .lable_c li:nth-child(5) p{
            background:#94B5FF;
    }
    .lable_c li:nth-child(5) span{
           border-left: 20px solid #94B5FF;
    }
    .lable_c li:nth-child(6){
        border-left: solid #FFCA7F 2px;
    }
    .lable_c li:nth-child(6) p{
            background:#FFCA7F;
    }
    .lable_c li:nth-child(6) span{
           border-left: 20px solid #FFCA7F;
    }
    .lable_c li p{
        width:69px;
        height:40px;
        float:left;
        margin-left:2px;
        line-height:40px;
        color:#ffffff; 
    }
    .lable_c li span{
        float: left;
         width:0; 
        height:0; 
        border-top:20px solid transparent;
        border-bottom: 20px solid transparent;
    }
    .mgtb20{
        margin:20px 0px;
    }
    .tra_detail{
        margin-top: 10px;
    }
    .tra_detail img{
        width:100%;
    }
    a .contact{
        color:#585858;
    }
    .abcd{
        display: -webkit-flex;
        background-color: #fff;
        height: 40px;
        border-bottom: 1px solid #ccc;
    }
    .a,.b,.c,.d{
        height: 41px;
        line-height: 40px;
        text-align: center;
        color: #585858;
        flex:1;
    }
    .detail_active{
        border-bottom: 2px solid #00d8ff;
        color:#00d8ff;
    }
    #aui-header{
        display: none;
    }
    .aui-btn-warning{
        background-color: rgba(0,0,0,0.8);
    }

    /*行程天数样式开始*/
    #a{
        margin-bottom: 10px;
        word-wrap:break-word;
        word-break:break-all; 
    }
    #b,#c{
        margin-bottom: 10px;
        /*字母换行*/
        word-wrap:break-word;
        word-break:break-all;
    }
    #d{
        word-wrap:break-word;
        word-break:break-all;
    }
    .day{
        padding:20px 0px;
        background-color: #fff;
        border-bottom: 1px solid #ccc;
    }
    .day_name{
        margin-bottom: 20px;
        height: 34px;
        display: -webkit-flex;
    }
    .day_title{
        flex: 1
    }
    .day_num{
        color: #fff;
        background-image: url(/Public/images/day_bg.png);
        background-repeat: no-repeat;
        width: 60px;
        height: 22px;
        line-height: 22px;
        padding-left: 12px;
        font-size: 12px;
        margin-top: 6px;
    }
    .day_title{
        margin-left: 10px;
        padding: 5px 10px 5px 0;

    }
    .day_des{
        font-size: 16px;
        color: #585858;
        padding-left:20px;
        padding-right:20px;
    }
    .img_group{
        margin-bottom: 20px;
        display: -webkit-flex;
        padding: 0 10px;
        padding-left:40px;
        height: 120px;
    }
    .begin_img{
        flex:1;
        margin-right: 10px;
        height: 120px;
    }
    .end_img{
        flex:1;
        height:120px;
    }
    .begin_img img,.end_img img{
        width: 100%;
        height: 120px;
    }
    .day_img{
        padding: 0 10px;
    }
    .moudel_title{
        font-size: 18px;
    }
    /*行程天数样式结束*/

   .cost_icon{
        background-image: url(/Public/images/icon_feiyong@2x.png);
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 30px 30px;
        font-size:18px;
        height: 50px;
        line-height: 50px;
        padding-left: 50px;
   }
   .resever_icon{
        background-image: url(/Public/images/icon_yuding@2x.png);
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 30px 30px;
        font-size:18px;
        height: 50px;
        line-height: 50px;
        padding-left: 50px;
   }
   .visa_icon{
        background-image: url(/Public/images/icon_qianzheng@2x.png);
        background-repeat: no-repeat;
        background-position: left center;
        background-size: 30px 30px;
        font-size:18px;
        height: 50px;
        line-height: 50px;
        padding-left: 50px;
   }
   .b_d,.c_d,.d_d{
       background-color:#fff;
       padding:0 10px;
       padding-bottom: 10px;
   }
   /*图片给固定高度 滚动监听需要*/
   .hei_img img{
    height: 200px;
   }
    /*底部footer*/
    #footer {
        background: url('/Public/images/pic_background02.png') no-repeat;
        background-size: 100% 100%;
        min-height: 220px;
        position: relative;
    }
    .my-info {
        position: relative;
        padding: 20px 0;
        width: 100%;
        bottom: 0;
        text-align: center;
        vertical-align: center;
    }
    .my-info img {
        width: 120px;
        height: 120px;
    }
    .my-info div.nicknames {
        margin-top: 5px;
        color: #999;
        font-size: 14px;
    }
    .my-menu {
        position: absolute;
        width: 80%;
        height: 14px;
        line-height: 14px;
        left: 10%;
        bottom: 12px;
        text-align: center;
        font-size: 14px;
    }
    .my-menu a{
        color: #585858;
    }
    .my-menu .aui-col-xs-4 {
        border-right: 1px solid #585858;
    }
    .my-menu .aui-col-xs-4:last-child {
        border-right: none;
    }
    .aui-content {
         margin-bottom: 0px; 
    }

    
    .aui-icon-check{
    	font-size: 24px;
    	color: #585858;
    }
    .pro_detail_tel{
    	margin-left: 5px;
    }
    .aui-icon-warn{
    	font-size: 26px;
    	color: #585858;
    }
    .pro_detail_name{
    	margin-left: 5px;
    	font-size: 14px;
    }
    .aui-icon-emoji{
    	font-size: 14px;
    	color: #ff9500 ;
    }
    .aui-icon-loading{
    	font-size: 14px;
    	color: #777 ;
    }
    /*修改layui加载层样式*/
    .layui-layer-loading .layui-layer-content {
        margin:0 auto;
    }



    .in_store{
        display: -webkit-flex;
        background-color: #fff;
        padding: 0 10px;
        margin-top: 10px;
        height: 50px;
        position: relative;
        border-bottom: 1px solid #f5f5f5;
    }
    .in_store_name{
        flex:1;
    }
    #warn{
    	display: inline-block;
    	margin-top: 6px;
    }
    .pro_detail_name{
    	display: inline-block;
    	color:#585858;
    	position: absolute;
    	top:15px;
    	left:40px;
    }
    .in_store_enter{
        flex:1;
        text-align: right;
        font-size: 14px;
        color:#777;
        line-height: 50px;
    }

    .tel_phone{
       background-color: #fff;
        display: -webkit-flex;
        height: 50px;
        padding:0 10px;
        position: relative;
    }
    .phone_left{
        flex: 1;
    }
    #check{
    	display: inline-block;
    	margin-top: 8px;
    }
    .pro_detail_tel{
    	display: inline-block;
    	color:#585858;
    	position: absolute;
    	top:15px;
    	left:40px;
    }
    .phone_right{
        text-align:right;
        flex: 1;
        color:#777;
        font-size: 14px;
        line-height: 50px;
    }
    .order_pri{
        display: -webkit-flex;
        background-color: #fff;
        position: fixed;
        bottom:0;
        width: 100%;
        height: 50px;
    }
    .pri{
        color:#ff9500;
        width:40%; 
        border-top:1px solid #ccc;
        position: relative;
    }
    #emoji{
    	display: inline-block;
    	margin-left:10px;
    	margin-right:5px;
    	margin-top: 14px;
    }
    .pro_detail_pri{
    	display: inline-block;
        vertical-align: middle;
        margin-top: -1px;
    	font-size: 20px;
    }
    #footer_des{
        display: inline-block;
        vertical-align: middle;
        margin-top: 2px;
    	font-size: 12px;
    	color: #777;
    }
    .apply{
        font-size: 14px;
        color:#fff;
        background-color: #ff9500;
        text-align: center;
        flex: 1;
        line-height: 50px;
    }
    .hei_bottom{
        height: 50px;
    }
    .layui-layer-loading .layui-layer-content {
        width: 60px!important;
        height: 35px!important;
        background: url(/Public/images/loading2.gif) no-repeat!important;
    }
    </style>
</head>
<body>
<div id='pre_mark'>
    <div class="aui-content">
        <div class="aui-flex-col" style="background-color:#fff">
            <div class="aui-flex-item-12">
                <img class="aui-img-object face_img" src="" alt="">
                <div class="mbd">
                     <div class="pro_title"></div>
                  
                     <div class="group_num">成团人数至少<span></span>人</div>
                     <div style="overflow:hidden;">
                          <div class="lang">可提供的语言服务:</div>
                          <ul class="lang_c">
                              <li></li>
                          </ul>
                     </div>
                     <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="in_store">
            <div class="in_store_name"><span id="warn" class="aui-iconfont aui-icon-warn"></span><span class="pro_detail_name"></span></div>
           <div class="in_store_enter"><span style="margin-right:10px;">进入店铺</span><span class="aui-iconfont aui-icon-loading"></span></div>
        </div>
        <div class="con_call">
            <a class="tel_phone" href="">
                <div class="phone_left"><span id="check" class="aui-iconfont aui-icon-check"></span><span class="pro_detail_tel"></span></div>
                <div class="phone_right"><span style="margin-right:10px;">拨打电话</span><span class="aui-iconfont aui-icon-loading"></span></div>
            </a>
        </div>
        <div class="tra_detail">
            <div class="abcd ">
                <div class="a detail_active" data="a">行程介绍</div>
                <div class="b" data="b">费用</div>
                <div class="c" data="c">预订须知</div>
                <div class="d" data="d">签证</div>
            </div>
            <div class="pro_moudel">
                <div id="a">
                </div>
                <div id="b">
                    <div class="b_d">
                        <div class="cost_icon">费用</div>
                    </div>
                </div>
                <div id="c">
                    <div class="c_d">
                        <div class="resever_icon">预订须知</div>
                    </div>
                </div>
                <div id="d">
                    <div class="d_d">
                        <div class="visa_icon">签证</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="aui-content footer"  id='footer'>
        <div class="my-info">
            <img src="/Public/images/erweima.jpg">
            <div class="nicknames">长按二维码关注逍品旅行公共账号</div>
        </div>
        <div class="my-menu">
            <div class="aui-col-xs-4"><a class="page_home">首页</a></div>
            <div class="aui-col-xs-4"><a href="/webapp_user/mycenter">个人中心</a></div>
            <div class="aui-col-xs-4"><a href="http://mp.weixin.qq.com/s?__biz=MzIwMzUwODA5NA==&mid=2247483651&idx=1&sn=52e552815d9f2e1487790429843e2e51&scene=0#rd">关注我们</a></div>
        </div>
    </div>
    <div class="hei_bottom"></div>
    <div class="order_pri">
        <div class="pri">
        	<span id="emoji" class="aui-iconfont aui-icon-emoji"></span>
        	<span id="footer_pri" class="pro_detail_pri"></span>
        	<span id="footer_des">起</span>
        </div>
        <div class="apply">立即预定</div>
    </div>
</div>
   <form action="/webapp_order/fillorder" method="post" id="sub">
       <input type="hidden" name="calendar_type" value="">
       <input type="hidden" name="pid" value="">
       <input type="hidden" name="aid" value="">
       <input type="hidden" name="title" value="">      
       <input type="hidden" name="p_type" value="">     
       <input type="hidden" name="prices" value="">       
   </form>
    <!-- form 表单隐藏域数据 -->
    <input id="data" type="hidden" value='<?=$data;?>'>

    <!-- 内容结束 -->
    <script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="/Public/js/api.js" ></script>
    <script type="text/javascript" src="/Public/js/aui-scroll.js" ></script>
    <script src="/Public/js/layer.js"></script>
    <script src="/Public/js/weixin-1.0.0.js"></script>
    <script src="/Public/js/weixin-share.js"></script>
    <script type="text/javascript">
    $(function () {
        stopDrop();
        //禁止下拉回弹
        function stopDrop() {
            var lastY;//最后一次y坐标点
            $(document.body).on('touchstart', function(event) {
                lastY = event.originalEvent.changedTouches[0].clientY;//点击屏幕时记录最后一次Y度坐标。
            });
            $(document.body).on('touchmove', function(event) {
                var y = event.originalEvent.changedTouches[0].clientY;
                var st = $(this).scrollTop(); //滚动条高度  
                if (y >= lastY && st <= 10) {//如果滚动条高度小于0，可以理解为到顶了，且是下拉情况下，阻止touchmove事件。
                    lastY = y;
                    event.preventDefault();
                }
                lastY = y;
         
            });
        }
    
        // 加载层
        var index = layer.load(0,{
            shade: [1,'#ccc']
        });
        apiready = function(){
            api.parseTapmode();
        }
        var data=JSON.parse($('#data').val());//详情数据信息
        add_pro_detail();
        add_pro_route();
        add_pro_cost();
        add_pro_reserve();
        add_pro_visa();
        // 添加产品信息1
        function add_pro_detail(){
            $('title').html(data.agent.name+'的店铺');
            $('.face_img').attr('src',data.face_img);
            $(".pro_title").html(data.title);//title信息
            $(".pro_detail_pri").html(data.display_prices.price2);//价格信息
            $(".in_store_name .pro_detail_name").html(data.agent.name);//旅行顾问
            $(".group_num span").html(data.min_num);//成团人数
            $(".lang_c li").html(lang(data.lang));//语言服务
            $('.tel_phone').attr('href','tel:'+data.agent.mobile);
            $(".phone_left .pro_detail_tel").html(data.agent.mobile);
        }
        //提供的语言服务
        function lang(){
            var arg=arguments;
            switch (arg[0]){
                case '1':
                    return "能够提供中文服务";
                case '2':
                    return "能够提供英文服务";
                case '3':
                    return "仅提供本地语言服务";
                default:
                    return "仅提供本地语言服务";
            }
        }
        //添加行程信息
        var day;
        var imgs_url=data.imgs_url;
        function add_pro_route(){//3
            var str='';
            var pro_route=data.travel_intro;
            for (var i = 0; i <pro_route.length; i++) {
                day=i+1;
                var start_name=pro_route[i].start_name;
                var end_name=pro_route[i].end_name;
                var start_img=pro_route[i].start_img;
                var end_img=pro_route[i].end_img;
                var travel_intro=pro_route[i].travel_intro;
                    str+='<div class="day">';
                    str+='<div class="day_name">';
                    str+='<div class="day_num">第<span>'+day+'</span>天</div>';
                    str+='<div class="day_title">'+start_name+' - '+end_name+'</div>';
                    str+='</div>';
                    if (start_img) {
                    str+='<div class="img_group">';
                    str+='<div class="begin_img">';
                    str+='<img  src="http://img.qsctrip.com/'+start_img+'" alt="">';
                    str+='</div>';
                    str+='<div class="end_img">';
                    str+='<img  src="http://img.qsctrip.com/'+end_img+'" alt="">';
                    str+='</div>';
                    str+='</div>';
                    }
                    str+='<div  class="day_des">';
                    str+='<div class="hei_img">'+travel_intro+'</div>';
                    str+='</div>';
                    str+='</div>';
            }
             $("#a").append(str);
        }
        //添加费用信息
        function add_pro_cost() {//4
            var cost_str=data.fee_desc;
            $("#b .b_d").append(cost_str);
        }
         //添加预定须知信息
        function add_pro_reserve() {//5
            var reserve_str=data.booking_policy;
            $("#c .c_d").append(reserve_str);
        }
         //添加签证信息
        function add_pro_visa() {//6
            var visa=data.visa;
            setTimeout(function(){
              $('#pre_mark').css({
                  visibility: 'visible'
              });
              $("#d .d_d").append(visa);
              layer.close(index); 
            }, 1000)
        }
        //立即预定提交信信息
        function submit_info() {
            $("input[name='calendar_type']").val(data.calendar_type);
            $("input[name='pid']").val(data.pid);
            $("input[name='aid']").val(data.aid);
            $("input[name='title']").val(data.title);
            $("input[name='p_type']").val(data.p_type);
            $("input[name='prices']").val(JSON.stringify(data.prices));
        }
        //点击进入店铺跳转
        $('.in_store_enter').click(function() {
            window.location.href="/webapp_product/get_a_product_list?aid="+data.agent.aid
        });
        $('body').delegate('.page_home','click',function() {
            window.location.href="/webapp_product/get_a_product_list?aid="+data.agent.aid
        });
        //底部立即预定按钮
        $('.apply').click(function () {
            submit_info();
           $('#sub').trigger('submit');
        });


        // ready参数
        var title=data.title;
        var desc="逍品旅行，出境旅游优质供应商分销平台";
        var link=window.location.href;
        var imgUrl='http://a.qsctrip.com/Public/images/travel.png';
        //ajax请求数据 
        request_share();
        //判断是否为微信内核
        var ua = navigator.userAgent.toLowerCase();//获取判断用的对象
        if (ua.match(/MicroMessenger/i) == "micromessenger") {
            weixin_config(appId,timestamp,nonceStr,signature);
            weixin_ready(title,desc,link,imgUrl);
        }           
    })
    </script>
    <script type="text/javascript" src="/Public/js/gundong.js" async="async"></script>
</body>
</html>
