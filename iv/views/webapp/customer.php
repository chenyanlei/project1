<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <title>旅客信息</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/aui-win.css" />
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
        .aui-btn-row:after {
            border-bottom:0;
        }
        .aui-btn {
            border-radius:0;
        }
        .aui-content{
            position:relative;
            margin-bottom:0;
        }
        .customer_font:before{
            font-family:"iconfont" !important;
            font-style:normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
            content: "\e60c";
            color:#777;
            font-size:21px;
            position:absolute;
            top:8px;
            left:5px
        }
        .customer_font{
            font-size:17px;
            margin-left:20px;
        }
    </style>
</head>
<body>
   <form action="/webapp_order/addorder" id="sub" method="post">
                <input type="hidden" name="date" value="<?=$date;?>" id="date">
                 <input type="hidden" name="pid" value="<?=$pid;?>">
                <input type="hidden" name="aid" value="<?php if(isset($aid)) echo $aid; else echo '' ;?>">
                <input type="hidden" name="title" value="<?=urlencode($title);?>">      
                <input type="hidden" name="pnum" value="<?=$pnum;?>" id="pnum">
                <input type="hidden" name="p_type" value="<?=$p_type;?>">
                <input type="hidden" name="cname" value="<?=$name;?>">
                <input type="hidden" name="phone" value="<?=$phone;?>">
                <input type="hidden" name="email" value="<?=$email;?>">
    <?php for($i=1;$i<$pnum+1;$i++){?>
     <div class="aui-content">
        <p class="aui-padded-10 customer_font">游客<?=$i;?></p>
        <div class="aui-form">
            <div class="aui-input-row">
                <label class="aui-input-addon">姓名</label>
                <input type="text" class="aui-input" value="" name="name[]"/>
            </div>
             <div class="aui-input-row">
                <label class="aui-input-addon">性别</label>
                <div class="aui-pull-right">
                    <input class="aui-radio" type="radio" name="sex<?=$i;?>"checked value="0"><div class="aui-radio-name">男</div>
                    <input class="aui-radio" type="radio" name="sex<?=$i;?>" value="1"><div class="aui-radio-name">女</div>
                </div>
            </div>
            <div class="aui-input-row">
                <label class="aui-input-addon">身份证号码</label>
                <input type="text" class="aui-input" value="" name="id_card[]"/>
            </div>
            <div class="aui-input-row">
                <label class="aui-input-addon">护照号</label>
                <input type="text" class="aui-input" value="" name="passport[]"/>
            </div>
            

        </div>

    </div>
    <?php } ?>
    </form>
    <div class="aui-btn-row">
                <?php
                    if($p_type === '3'){
                ?>
                <div class="aui-btn" id="next">下一步</div>
                <?php
                    }else {
                        ?>
                        <div class="aui-btn" id="next">下一步</div>
                        <div class="aui-btn aui-btn-info" id="tip">跳过该步</div>
                        <?php
                    }
                ?>

    </div>
    <script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="/Public/js/layer.js"></script>
    <script type="text/javascript">
    
    //检测姓名
    function is_name(name){
        var reg =/^[^\d]+$/;
        //检测   exec
        return reg.test(name); 
    }
    //检测身份证号
    function is_idnumber(idnum){
        var reg = /(^\d{15}$)|(^\d{17}(\d|X)$)/;
        //检测   exec
        return reg.test(idnum);  
    }
    //检测护照号码
    function is_passport(pass){
        var reg = /^1[45][0-9]{7}$|E[0-9]{8}$|G[0-9]{8}$|P[0-9]{7}$|S[0-9]{7,8}$|D[0-9]+$/;
        //检测   exec
        return reg.test(pass);
    }

    Array.prototype.contains = function (element) {
        for (var i = 0; i < this.length; i++) {
            if (this[i] == element) {
                return true;
            }
        }
        return false;
    } 
    //检查姓名
    function check_name(){
        var is_passname = new Array();
        var IS_PASS = false;
        var name = $('input[name="name[]"]');
       name.each(function(){
        var um = $(this);
         var uname = $(this).val();
           if(!is_name(uname)){
             layer.msg('名字格式不正确');
             um.trigger('focus');
             is_passname.push(false); 
             return false;   
           }else{
             is_passname.push(true);
           }
       })
        if(is_passname.contains(false)){
            IS_PASS = false;
        }else{
            IS_PASS = true;
        }   
        return IS_PASS;
    }
    //检查身份证号
     function check_id(){
        var is_passid = new Array();
        var IS_PASS = false;
        var idcard = $('input[name="id_card[]"]');
       idcard.each(function(){
        var idd = $(this);
         var icard = $(this).val();
          
           if(!is_idnumber(icard)){
             layer.msg('身份证号码格式不正确');
             idd.trigger('focus');

              is_passid.push(false);
              return false;
           }else{
              is_passid.push(true);
           }
       })
        if(is_passid.contains(false)){
            IS_PASS = false;
        }else{
            IS_PASS = true;
        }   
        return IS_PASS;
    }

    function check_pass(){
        var is_passp = new Array();
        var IS_PASS = false;
          
        var passport = $('input[name="passport[]"]');
       passport.each(function(){
        var pp = $(this);
         var pass= $(this).val();
           if(!is_passport(pass)){
               layer.msg('护照号码格式不正确');
             pp.trigger('focus');
             is_passp.push(false);
             return false;
           }else{
             is_passp.push(true);
           }
       })
        if(is_passp.contains(false)){
            IS_PASS = false;
        }else{
            IS_PASS = true;
        }   
        return IS_PASS;
    }

    $('#next').click(function() {
       if(check_name() && check_id() && check_pass()){
             $('#sub').trigger('submit');
       }  

    })

    $('#tip').click(function() {
        $('#sub').trigger('submit');
    })
    </script> 
</body>
</html>