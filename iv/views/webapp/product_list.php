<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/Public/css/aui.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/aui-slide.css" />
</head>
<style type="text/css">
body { 
  background: #f1f1f1;
  font-family: 'Microsoft Yahei';
}
/*重新定义*/
.aui-list-view { border-radius: 6px;}
.aui-list-view:after { border-top: 0;}
.aui-list-view:before { border-top: 0;}
.aui-grid-sixteen li .aui-iconfont {
    background: #ff9900;
    color: #ffffff;
    width: 38px;
    height: 38px;
    line-height: 38px;
    border-radius: 50%;
    font-size: 20px;
}
#pre_mark{
    display: none;
}
/*自定义*/
.icons { margin-top: 15px;}
.image img { width: 100%}
p { font-size: 12px; margin-bottom: 5px;}
.content { font-size: 8px;}
#tag li{
    float: left;
    margin-right:10px;
    border:solid 1px #00d8ff;
    padding:3px 5px;
}
a #tag li {
  color:#00d8ff;
}
a .title{
  color:#333;
  padding: 0 5px;
}
.aui-bar{
    position: fixed;
    top:0;
}
.pro_loading{
    display: none;
    text-align: center;
    padding: 30px 0;
}
.store_name{
    margin-bottom:10px;
    overflow:hidden;
    text-align:center;
}
.store_name li{
    float: left;
    height: 30px;
    border: 0px solid #6c6;
    width: 100%;
}

.store_name .list1{
    border-bottom: 1px solid #ccc;
    width: 100%;
    margin-bottom: -15px;
}

.store_name span{
    color: #666;
    padding: 0 10px;
    background-color:#f1f1f1;
}

.price_font{
    font-size:18px;
    color:#ff9500;
    margin-right:2px;
}
.price_font:before{
    background:url(/Public/images/icon_cny_02@2x.png) no-repeat;
    background-size:12px 12px;
    background-position:left 4px;
    content:'　';
}
#aui-footer{
    border-top:1px solid #ccc;
}
.aui-bar-color,.aui-btn-color{
    background-color: #00d8ff;
}
.aui-grid-sixteen li {
    float: left;
    position: relative;
    padding: 5px 10px;
}
/*修改layui加载层样式*/
.layui-layer-loading .layui-layer-content {
    margin:0 auto;
}
.hei_bottom{
    height: 50px;
}
.aui-list-view {
     border-radius: 0; 
}
.text_color{
  color:777;
}
.aui-grid-sixteen li .aui-iconfont {
    background: #fff;
    color: #585858;
    font-size: 30px;
}
.aui-icon-close{
  font-size: 30px;
  color: #585858;
}
.custom_banner{
  height: 60px;
  margin:10px 0;
}
.custom_banner a{
  display: block;
  width: 100%;
  height: 60px;
  background: url(/Public/images/custom_enter.jpg) no-repeat;
  background-size: 100% 60px;
  background-repeat: no-repeat;
}
.layui-layer-loading .layui-layer-content {
    width: 60px!important;
    height: 35px!important;
    background: url(/Public/images/loading2.gif) no-repeat!important;
}
</style>
<body>
    <div id="aui-slide3">
      <div class="aui-slide-wrap" >
     <!--    <div class="aui-slide-node bg-dark">
          <a href="/webapp_global/introduce_shopping"><img src="/Public/images/l1.jpg" /></a>
        </div> -->
        <div class="aui-slide-node bg-dark">
          <a href="/webapp_global/introduce_hotel"><img src="/Public/images/l3.jpg" /></a>
        </div>
      </div>
      <div class="aui-slide-page-wrap"><!--分页容器--></div>
    </div>
<div id="pre_mark">
    
    <div class="aui-searchbar-wrap demo" id="search" style="margin-top:45px;display:none">
        <div class="aui-searchbar aui-border-radius"  onclick="doSearch()">
            <i class="aui-iconfont aui-icon-search"></i>
            <div class="aui-searchbar-text">请输入搜索内容</div>
            <div class="aui-searchbar-input">
                <form action="javascript:search();">
                <input type="text" placeholder="请输入搜索内容" id="search-input">
                </form>
            </div>
            <i class="aui-iconfont aui-icon-roundclosefill"  onclick="clearInput()"></i>
        </div>
        <div class="aui-searchbar-cancel aui-text-info"  onclick="cancelSearch()">取消</div>
    </div>  
    <div class="aui-content" style="margin-bottom:0">
        <ul class="aui-grid-sixteen">

            <a href="/webapp_product/pro_list?act=r">
            <li class="aui-col-xs-3 aui-text-center">
                <span class="aui-iconfont aui-icon-close"></span>
                <p class="text_color">推荐</p>
            </li>
            </a>
            <a href="/webapp_product/pro_list?act=h">

            <li class="aui-col-xs-3 aui-text-center">
                <span class="aui-iconfont aui-icon-edit"></span>
                <p class="text_color">热门</p>
            </li>
            </a>
            <a href="/webapp_product/group_travel?act=z">
                <li class="aui-col-xs-3 aui-text-center">
                    <span class="aui-iconfont aui-icon-favorfill"></span>
                    <p class="text_color">跟团游</p>
                </li>
            </a>
            <a href="/webapp_product/group_travel?act=y">
                <li class="aui-col-xs-3 aui-text-center">
                    <span class="aui-iconfont aui-icon-favor"></span>
                    <p class="text_color">自助游</p>
                </li>
            </a>
        </ul>
    </div>
    <!-- 定制入口 begin-->
    <div class="custom_banner">
      <a href="/custom/index"></a>
    </div>
    <!-- 定制入口 end-->
    <div class="aui-content-padded">

        <ul id="list">
        </ul>
        <div class="pro_loading" style="text-align:center;padding:20px 0;"><img src="/Public/images/pro_load.jpg"  alt="" style="width:50px;height:50px;margin-right:20px;background-color:#f5f5f5"><span>加载中...</span></div>
    </div>
    <div class="hei_bottom"></div>
     <footer class="aui-nav" id="aui-footer">
        <ul class="aui-bar-tab">
            <li id="mall"  class="active-danger">
                <a href="">
                    <span class="aui-iconfont aui-icon-cartfill"></span>
                    <p>商城</p>
                </a>
            </li>
            <li id="my">
            <a href="/webapp_user/mycenter/">
                <span class="aui-iconfont aui-icon-peoplefill"></span>
                <p>我的</p>
            </a>    
            </li>
        </ul>
    </footer>
    <!-- 数据包 -->
</div>
    <script src="/Public/js/jquery-1.11.3.js"></script>
    <script src="/Public/js/my_cookie.js"></script>
    <script src="/Public/js/yui-min.js"></script>
    <script src="/Public/js/api.js"></script>
    <script src="/Public/js/aui-scroll.js"></script>
    <script src="/Public/js/layer.js"></script>
    <script src="/Public/js/weixin-1.0.0.js"></script>
    <script src="/Public/js/weixin-share.js"></script>
    <script src="/Public/js/aui-slide.js"></script>

    <script>
    var slide3 = new auiSlide({
          container:document.getElementById("aui-slide3"),
          // "width":300,
          "height":200,
          "speed":500,
          "autoPlay": 3000, //自动播放
          "loop":true,
          "pageShow":true,
          "pageStyle":'dot', //分页为点
          'dotPosition':'center'
        })
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
        var index=layer.load(0,{
            shade: [1,'#ccc']
        })
        //lddd
        apiready = function(){
            api.parseTapmode();
        }
        function doSearch(){
            $api.addCls($api.dom(".aui-searchbar-wrap"),"focus");
            $api.dom('.aui-searchbar-input input').focus();
        }
        function cancelSearch(){
            $api.removeCls($api.dom(".aui-searchbar-wrap.focus"),"focus");
            $api.val($api.byId("search-input"),'');
            $api.dom('.aui-searchbar-input input').blur();
        }
        function clearInput(){
            $api.val($api.byId("search-input"),'');
        }
        function search(){
            var content = $api.val($api.byId("search-input"));
            if(content){
                api.alert({
                    title: '搜索提示',
                    msg: '您输入的内容为：'+content
                });
            }else{
                api.alert({
                    title: '搜索提示',
                    msg: '您没有输入任何内容'
                });
            }
            cancelSearch();
        }
        //获取url参数
       function GetQueryString(name)
       {
            var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if(r!=null)return  decodeURI(r[2]); return null;
       }
       var aid=GetQueryString('aid');
       var rn=10;
       var page=0;
       var go_on=false;
       var name;
       var total;
       var show_msg=true;
       //请求代理名称
       request_agent();
       function request_agent() {
           $.ajax({
                type:'get',
                url:'/webapp_user/get_agent_detail',
                data:{'aid':aid},
                async:false,
                success:function (data) {
                    if (data.result.err==0) {
                        name=data.content.name;
                    } else {
                        alert(data) ;
                    }
                }
            })  
       }
       //请求数据
       if(aid !=null && aid.toString().length>0){
            add_recommend();
       }
       //第一次加载成功一秒后关闭加载层
       if (go_on) {
        setTimeout(function(){
          $("#pre_mark").show();
          layer.close(index);
        }, 500)
       }
       //name aid 存入cookie
       var cookie_arr={};
       cookie_arr.name=name;
       cookie_arr.aid=aid;
       setCookie('store_name',JSON.stringify(cookie_arr),'365');
        $('title').html(name+'的店铺');
        // $('.store_name span').html(name+'的推荐');
        $("#mall a").attr('href','/webapp_product/get_a_product_list?aid='+aid)
        // 存入cookie结束 取出name

        //滚动事件  
        var scroll = new auiScroll({
           listen:false, //是否监听滚动高度，开启后将实时返回滚动高度
           distance:0,//判断到达底部的距离，isToBottom为true
       },function(ret){
        if (ret.isToBottom) {
            if (go_on) {
                if (Math.ceil(total/rn)>page){
                    add_recommend();
                }else{
                  if (show_msg) {
                    layer.msg('没有更多内容了',{time:1000,offset:'80%'});
                    show_msg=false;
                  }
                }
            }
        }else{
            return false;
        }
       });
       //请求数据 请求成功调用模板
       function add_recommend() {
           $.ajax({
                type:'get',
                url:'/webapp_product/agent_recommond',
                data:{'page':page,'rn':rn,'aid':aid},
                async: false,
                beforeSend: function () {
                    $(".pro_loading").show();
                    go_on=false;
                },
                success: function (data) {

                    total=data.total; 
                    add_pro_list(data);                 
                }
           })
       }
       //添加模板
       function add_pro_list(data){
            var pro=data.list;
            var str='';
            var tagname;
            var time;
            var a;
            var year;
            var month;
            var day;
            for (var i = 0; i <pro.length; i++) {
                if (pro[i].p_status=='4') {
                  tagname=JSON.parse(pro[i].tagname);
                  time=pro[i].prices[0].calendar_from*1000;//把php时间转为js时间
                  a=new Date(time);
                  year=a.getFullYear();
                  month=a.getMonth()+1;
                  day=a.getDate();
                  str+='<a href="/webapp_product/product_detail?pid='+pro[i].id+'&aid='+aid+'&p_type='+pro[i].p_type+'">'
                  str+='<li class="aui-list-view">'
                  str+='<div class="aui-col-xs-12 image">'
                  str+='<img src="'+pro[i].face_img+'?imageView2/1/w/380/h/200">'
                  str+='</div>'
                  str+='<div class="aui-col-xs-12 aui-padded-5 title">'+pro[i].title+'</div>'
                  str+='<div class="aui-col-xs-12 aui-ellipsis-2 aui-padded-5 content">'
                  str+='<ul id="tag">'
                  for (var n = 0; n<tagname.length; n++) {
                      str+='<li>'+tagname[n]+'</li>'
                  }
                  str+='</ul>'
                  str+='</div>'
                  str+='<p class="aui-padded-5">'
                  str+='<span class="aui-pull-left">出发日期: <span style="color:#333">'+year+'-'+month+'-'+day+'</span></span>'
                  str+='<span class="aui-pull-right"><span class="price_font">'+pro[i].display_prices.price2+'</span><span style="margin-left:5px;">起</span></span>'
                  str+='</p>'
                  str+='</li>'
                  str+='</a>'
              }
              page++;
              go_on=true;
              $(".pro_loading").hide();
              $("#list").append(str);
                }
       }
       //搜索框获取焦点事件
       $("#search-input").focus(function() {
            window.location.href="/webapp_product/pro_country_search?act="+data.act
       });

       // ready参数
         var title='逍品旅行';
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
</body>
</html>