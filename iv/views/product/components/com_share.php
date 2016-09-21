<script src="/Public/js/jquery-1.11.3.js"></script>
<div class="ibar">
    <div class="pyq">
        <div class="ewm">
            <div class="share">分享到微信</div>
            <img src="<?php echo $qr_url;?>">
            <div class="help1"><a href="/help/home">分享帮助</a></div>
        </div>
    </div>
    <div class="outline"></div>
    <!-- <a  href=""><div class="qq"></div></a> -->
    <!-- <a  href=""><div class="online"></div></a> -->
    <a  href="<?=$edit_url?>"><div class="edit"></div></a>
</div>

<script>
    $('.pyq').mouseover(function(){
//        $('.ewm').css({'display':'block', 'background':'url()'});
        $('.ewm').css({'display':'block'});
    }).mouseout(function(){
        $('.ewm').css('display','none');
    })
     $('.outline').mouseover(function(){
        $('.ewm').css({'display':'block'});
    }).mouseout(function(){
        $('.ewm').css('display','none');
    })
</script>

<style>

    ul {
        -webkit-padding-start: 0px;
    }
    ul>li{
        list-style: none;
    }
    .share{
        text-align:center;
        margin:10px auto 10px;
        font-size:15px;
        color:#fff;
    }
    .help1{
        text-align:center;
        color:#0097d6;
        font-size:11px;
        margin-top:7px
    }
    .share_bar{
        width:60px;
        height:400px;
        position:fixed;
        right:-2px;
        top:141px;
        margin-right: 60px;
        z-index:10000
    }
    .weixin{
        background: url(/Public/images/quan.png) no-repeat;
        width:60px;
        height:70px;
        margin-right: 100px
    }
    .weixin:hover{
        background: url(/Public/images/quan02.png) no-repeat;
    }

    .weibo{
        background: url(/Public/images/quan.png) no-repeat;
        width:60px;
        height:70px;
        margin-right: 100px
    }
    .weibo:hover{
        background: url(/Public/images/quan02.png) no-repeat;
    }


    .ibar{
        width:60px;
        height:400px;
        position:fixed;
        right:-2px;
        top:130px;
        z-index:10000;
        margin-right: 20px;
    }
  .pyq{
        background: url(/Public/images/friend1.png) no-repeat;
        width:200px;
        height:80px;
        margin-right: 100px
    }
    .pyq:hover{
        background: url(/Public/images/friend2.png) no-repeat;
    }
    .edit{
        background:url(/Public/images/bianji.png) no-repeat;
        width:100px;
        height:80px;
    }
    .edit:hover{
        background:url(/Public/images/bianjifont.png) no-repeat;
    }
    .qq{
        background:url(/Public/images/qq1.png) no-repeat;
        width:100px;
        height:80px;
    }
    .qq:hover{
        background:url(/Public/images/qq2.png) no-repeat;
    }
    .online{
        background:url(/Public/images/weibo1.png) no-repeat;
        width:100px;
        height:80px;
    }
    .online:hover{
        background:url(/Public/images/weibo2.png) no-repeat;
    }
    .outline{
        background:url(/Public/images/weixin1.png) no-repeat;
        width:100px;
        height:80px;
    }
    .outline:hover{
        background:url(/Public/images/weixin2.png) no-repeat;
    }
    .ewm{
        display:none;
        background-color:#7eecfe;
        width: 200px;
        height: 200px;
        max-width: 200px;
        position: absolute;
        right:60px;  
    }
    .ewm img {
        width: 130px;
        height: 130px;
        margin:0 auto;
        display:block
    }

</style>