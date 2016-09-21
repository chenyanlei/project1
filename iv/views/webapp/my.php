<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
    <link rel="stylesheet" type="text/css" href="/Public/css/aui.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/iconfont.css" />
</head>
<style>
.my-header {
    background-color: #3c3c3c;
    position: relative;
    margin-bottom: 0;
    height:180px;
}
.my-info {
    position: relative;
    padding: 30px 0;
    width: 100%;
    bottom: 0;
    vertical-align: center;
    padding-left:16px;
    overflow:hidden
}
.my-info img {
    display:inline-block;
    float:left;
    width: 60px;
    height: 60px;
    border-radius:6px;
}
.my-info p.nickname {
    margin-top: 2px;
    color: #ffffff;
    font-size: 18px;
    font-weight:bold;
    padding-left:70px;
}
.my-info p.nickname1 {
    margin-top: 2px;
    color: #999;
    font-size: 14px;
    padding-left:70px;
}
.my-info i{

    font-family:"iconfont" !important;
    font-size:20px;
    font-style:normal;
    -webkit-font-smoothing: antialiased;
    -webkit-text-stroke-width: 0.2px;
    -moz-osx-font-smoothing: grayscale;
    width:43px;
    height:39px;
    display:inline-block;
    position:absolute;
    right:-10px;
    top:30px;
    color:#ccc
}
.my-info i:before{
    content:"\e624";
}
.aui-list-view-cell {
    line-height: 26px;
}
.amount-info {
    background-color: #ffffff;
    overflow: hidden;
}
.amount-info p {
    font-size: 0.75em;
}
.amount-info p strong {
    font-size: 18px;
}
.aui-list-view-cell {
    line-height: 26px;
}
.amount-info .aui-col-xs-4 {
    padding: 15px 0;
    position: relative;
    height: 80px;
}
.amount-info .aui-col-xs-4:after {
    border-left: 1px solid #ddd;
    display: block;
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    -webkit-transform-origin: 0 0;
    -webkit-transform: scale(1);
    pointer-events: none;
}
.amount-info .aui-col-xs-4:first-child:after {
    border:none;
}
@media only screen and (-webkit-min-device-pixel-ratio: 1.5) {
    .amount-info .aui-col-xs-4:after {
        right: -100%;
        bottom: -100%;
        -webkit-transform: scale(0.5);
    }
}
.icon_angle_right{
    display:inline-block;
    width:20px;
    height:20px;
    background:url(/Public/images/icon_angle_left.png) no-repeat;
    background-size:50%;
    float:right;
    margin-top:10px;
}
#aui-footer{
    border-top:1px solid #ccc;
}
.customer:before{
    content:"\e621";
    color:#585858
}
.myorder:before{
    content:"\e622";
    color:#585858
}
.mycustomize:before {
    content:"\e61f";
    color:#585858
}
</style>
<body>
    <div class="aui-content my-header">
        <div class="my-info">

            <img src="<?=(isset($face_img))? $face_img : '/Public/images/noavatar.gif';?>" />
            <p class="nickname"><?=$name;?></p>
            <?php
                if($mobile){
                    ?>
                    <p class="nickname1"><?= $mobile; ?></p>
                    <?php
                }
            ?>
            <i onclick="javacript:location.href='/webapp_user/register'"></i>
        </div>
    </div>
    <div class="aui-content">
        <ul class="aui-list-view aui-in">
            <?php
            if($level) {
                ?>
                <li class="aui-list-view-cell list" onclick="javascript:location.href='/webapp_order/order_list'">
                    <i class="aui-iconfont customer"></i>客户订单<span class="icon_angle_right"></span>
                </li>
                <?php
            }
            ?>
            <li class="aui-list-view-cell list" onclick="javascript:location.href='/webapp_order/my_order_list'">
                <i  class="aui-iconfont myorder"></i>我的订单<span class="icon_angle_right"></span>
            </li>
            <li class="aui-list-view-cell list" onclick="javascript:location.href='/custom/customize_list'">
                <i  class="aui-iconfont mycustomize"></i>我的定制<span class="icon_angle_right"></span>
            </li>
        </ul>
    </div>
    <footer class="aui-nav" id="aui-footer">
    <ul class="aui-bar-tab">
        <li id="mall">
            <a href="/webapp_product/get_a_product_list?aid=<?=$aid;?>">
            <span class="aui-iconfont aui-icon-cartfill"></span>
            <p>商城</p>
            </a>
        </li>
        <li id="my" class="active-danger">
            <span class="aui-iconfont aui-icon-peoplefill"></span>
            <p>我的</p>
        </li>
    </ul>
</footer>
<script src="/Public/js/jquery-1.11.3.js"></script>
<script>
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
    })
</script>
</body>
</html>