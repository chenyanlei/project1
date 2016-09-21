<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <title>完善信息</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/aui.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/iconfont.css" />
    <style>
        #next{
            width: 100%;
            padding: 10px 0;
            background-color: #00d8ff;
            font-size: 16px;
            color: #fff;
            font-weight: bold;
        }
        .contact_font:before{
            font-family:"iconfont" !important;
            font-style:normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
            content: "\e608";
            color:#777;
            font-size:21px;
            position:absolute;
            top:8px;
            left:5px
        }
        .contact_font{
           font-size:17px;
            margin-left:20px
        }
        .aui-btn-row:after {
            border-bottom:0;
        }
        .aui-btn {
            border-radius:0;
        }
    </style>
</head>
<body>
    <!-- <header class="aui-bar aui-bar-nav aui-bar-warning" id="aui-header">
        <a class="aui-btn aui-btn-warning aui-pull-left" tapmode onclick="closeWin()">
            <span class="aui-iconfont aui-icon-left"></span>
        </a>
        <div class="aui-title">完善信息</div>
        <a class="aui-iconfont aui-icon-menu aui-pull-right"></a>
    </header> -->
    <div class="aui-content">
        <p class="aui-padded-10 contact_font">&nbsp;联系人</p>
        <div class="aui-form">
            <form action="/webapp_order/fillcustomer" id="sub" method="post">
                <input type="hidden" name="date" value="<?=$date;?>" id="date">
                 <input type="hidden" name="pid" value="<?=$pid;?>">
                <input type="hidden" name="aid" value="<?php if(isset($aid)) echo $aid; else echo '' ;?>">
                <input type="hidden" name="title" value="<?=urlencode($title);?>">      
                <input type="hidden" name="pnum" value="<?=$pnum;?>" id="pnum">
                <input type="hidden" name="p_type" value="<?=$p_type;?>">
                <div class="aui-input-row">
                    <label class="aui-input-addon">姓名</label>
                    <input type="text" class="aui-input" value="" name="name"/>
                </div>
                <div class="aui-input-row">
                    <label class="aui-input-addon">手机号</label>
                    <input type="text" class="aui-input" value="" name="phone"/>
                </div>
                <div class="aui-input-row">
                    <label class="aui-input-addon">邮箱</label>
                    <input type="text" class="aui-input" value="" name="email"/>
                </div>
            </form>
        </div>
        <div class="aui-btn-row">
            <div class="aui-btn" id="next">下一步</div>
        </div>
    </div>
     <script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>
     <script type="text/javascript" src="/Public/js/layer.js"></script>
    <script type="text/javascript">
    //检查手机号格式
    function is_phone(phone){
        var reg = /^1[3-9][0-9]{9}$/; 
        //检测   exec
        return reg.test(phone);
    }
    //检测姓名
    function is_name(name){
        var reg =/^[^\d]+$/;
        //检测   exec
        return reg.test(name); 
    }
    //检查邮箱格式
    function is_email(email){
        //检测用户名的格式是否ok
        var reg = /^[0-9A-Za-zd]+([-_.][A-Za-zd]+)*@([0-9A-Za-zd]+[-.])+[A-Za-zd]{2,5}$/;
        //获取用户名的值
        //检测   exec
        return reg.test(email);
    }
    $('#next').click(function() {
       var name = $('input[name="name"]').val();
       var phone = $('input[name="phone"]').val();
       var email = $('input[name="email"]').val();
       if(name == ''){
            layer.msg('名字不能为空');
            return false;
       }
       if(!is_name(name)){
         layer.msg('名字格式不正确');
         return false;
       }

       if(phone == ''){
            layer.msg('手机号不能为空');
            return false;
       }
       if(!is_phone(phone)){
         layer.msg('手机号格式不正确');
         return false;
       }

       if(email == ''){
            layer.msg('邮箱不能为空');
            return false;
       }
       if(!is_email(email)){
         layer.msg('邮箱格式不正确');
         return false;
       }

       $('#sub').trigger('submit');

    })
    </script>  
</body>
</html>