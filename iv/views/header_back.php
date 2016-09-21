<!DOCTYPE HTML>
<!--PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<!--xmlns="http://www.w3.org/1999/xhtml"-->
<html lang="zh-CN">
<head>
    <title><?=$tip_title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Public/images/ico.png">
    <script src="/Public/js/jquery-1.11.3.js"></script>
    <script src="/Public/js/ichart.1.2.1.beta.20140329.min.js"></script>
    <link rel="stylesheet" href="/Public/css/bootstrap.min.css">
    <script src="/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href=<?php echo "'".base_url()."/Public/css/welcome.css"."'";?>/>
    <link rel="stylesheet" type="text/css" href=<?php echo "'".base_url()."/Public/css/common.css"."'";?>/>
    <link rel="stylesheet" type="text/css" href=<?php echo "'".base_url()."/Public/css/normalize.css"."'";?>/>
    <script src=<?php echo "'".base_url()."Public/js/my_cookie.js"."'";?>></script>


    <style>
        .logo{
            /*width: 40px;*/
            /*height: 40px;*/
            /*margin-top: 10px;*/
            /*margin-left: 30px;*/
            margin: 20px 20px 20px 30px;
        }

        #body-header .container {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .navbar {
            height: 80px;
        }

        .d_logo {
            float: left;
        }

        .d_logo_text{
            color: white;
            font-size: 24px;
            font-weight:bold;
            margin-left: 10px;
            margin-top: 10px;
        }

        .navbar_content{
            margin-left: 200px;
            height: 80px;
            /*margin-top: 30px;*/
        }
        .main-header {
            background-color: #0097d6;
            opacity: 1.0;
        }

        .navbar-nav>li>a {
            padding-top: 30px;
            padding-bottom: 29px;
        }
        .navbar-nav>li:hover {
            background: #0188c0;
            /*font-size: 24px;*/
            /*font-weight: bold;*/
        }

        .navbar-inverse {
            border-color: transparent;
        }

        .navbar-inverse .navbar-nav>.active>a, .navbar-inverse .navbar-nav>.active>a:focus, .navbar-inverse .navbar-nav>.active>a:hover
        {
            /*background-color: transparent;*/
            background-color: #0188c0;
            /*color: #000;*/
            font-size: 24px;
            font-weight: bold;
            /*border-bottom:6px solid #003144;*/
        }

        .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
            color: #fff;
            background-color: #0188c0;

        }

        .dropdown-menu {
            background-color: #6ab1cf;
            /*background-color: #0097d6;*/
        }

        .dropdown-menu>li>a{
            color: #ffffff;
        }

        .navbar-inverse .navbar-nav>li>a {
            color: #ffffff;
        }

        #header_right {
            margin-right: 100px;
        }

        #header_username img {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<nav id="body-header" class="navbar navbar-inverse main-header navbar-fixed-top">
    <div class="container mouse_pointer">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="pull-left" href="">
                <div class="d_logo">
                    <img class="logo" src="/Public/images/header_logo.png">
                </div>
<!--                <div class="d_logo d_logo_text">-->
<!--                    逍品旅行-->
<!--                </div>-->
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul id="header_left" class="nav navbar-nav navbar-left navbar_content">
                <li id="navli_home" onclick="header_onclick_item_home()"><a><?php echo "首页"; ?></a></li>
                <li id="navli_pro_mng" onclick="header_onclick_item_promng()"><a><?php echo "产品管理"; ?></a></li>
                <li id="navli_order_mng" onclick="header_onclick_item_ordermng()"><a><?php echo "订单管理"; ?></a></li>
                <li id="navli_customer_mng" onclick="header_onclick_item_customermng()"><a><?php echo "客户管理"; ?></a></li>
                <!--<li id="navli_user_mng" onclick="header_onclick_item_usermng()"><a><?php echo "用户管理"; ?></a></li>-->
            </ul>

            <ul id="header_right" class="nav navbar-nav navbar-right">
                <li class="mouse_pointer"><a id="header_register" style="display: none" onclick="header_onclick_register()"><?php echo $txt_register_title; ?></a><li>
                <li class="divider-vertical"></li>
                <li class="mouse_pointer"><a id="header_login" style="display: none" onclick="header_onclick_login()"><?php echo $txt_login_title; ?></a><li>
                <li class="dropdown mouse_pointer" style="width:158px;text-align:right">
                    <a href="#" id="header_username" style="display: none" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <ul class="dropdown-menu">
                        <li><a href="/personal/home">我的信息</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/help/home">使用帮助</a></li>
                        <li><a href="/user/logout" onclick="logout()">退出账号</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="main-body <?php if($tip_title == '首页' || $tip_title == 'Home') echo "main_body_bg" ; ?>">

<script>

//    var test = '<?php //echo $txt_register_title; ?>//' ;
//    console.log("register_title:" + test) ;
    function header_onclick_item_home() {
        var pathname = window.location.pathname ;
        if(pathname != "/page/home") {
            window.location = "/index/home" + window.location.search ;
        }
    }

    function header_onclick_item_usermng() {
        var pathname = window.location.pathname ;
       var pathsearch = window.location.search;
        console.log(pathsearch);
        if(pathname != "/user_mng/user_mng") {
            window.location = "/user_mng/user_mng" + window.location.search ;
        }
    }


    function header_onclick_item_customermng() {
        var pathname = window.location.pathname ;
        if(pathname != "/customer/customer_mng") {
            window.location = "/customer/customer_mng" + window.location.search ;
        }
    }


    function header_onclick_item_promng() {
        var pathname = window.location.pathname ;
        if(pathname != "/product/product_lib_oneday_travel") {
            window.location = "/product/product_lib_oneday_travel" + window.location.search ;
        }
    }

    function header_onclick_item_ordermng() {
        var pathname = window.location.pathname ;
        if(pathname != "/order/order_mng") {
            window.location = "/order/order_mng" + window.location.search ;
        }
    }



    //注册
    function header_onclick_register(){
        if(window.location.pathname != "/page/register")  {
            window.location = "/user/register" + window.location.search ;
        }
    }

    //登录
    function header_onclick_login() {
        if(window.location.pathname != "/page/login")  {
            window.location = "/user/login"  + window.location.search ;
        }
    }

    //用户信息
    function onclick_user() {

    }

    //提交产品
    function onclick_commit() {

    }

    //退出登录
    function logout() {
        clearCokie();
        window.location.href = "/user/login" ;
    }

    //切换语言
    function onclick_change_lang(lang_value,control) {
//        console.log("onclick_change_lang click") ;
//        console.log("value=" + lang_value) ;
        var lang = getCookie("language") ;
        if(lang == lang_value) {
            return ;
        }

        control.options[control.options.selectedIndex].selected=true;

        var lang = lang_value ;
        setCookie("language",lang) ;

        var search = window.location.search;
        console.log(search) ;
        if(search.length > 1) {
            if(search.match("lang=") == null) {
                window.location.href= this.location.host+this.location.pathname + "?lang=" + lang ;
            } else {
                var new_search = "?";
                search = search.slice(1) ;
                var arr = search.split("&") ;
                for(var i=0;i<arr.length;i++) {
                    var vals = arr[i] ;
                    if(vals.length > 0 && vals.match("lang=") != null) {
                        var arrItems = vals.split("=",2) ;
                        if(arrItems.length == 2 && arrItems[0] == "lang") {
                            new_search += arrItems[0] ;
                            new_search += "=" ;
                            new_search += lang ;
                        } else {
                            new_search += "&" + vals ;
                        }
                    } else {
                        new_search += "&" + vals ;
                    }
                }
            }
            console.log(new_search) ;
            window.location.href = this.location.pathname  + new_search ;
        } else {
            window.location.href= this.location.pathname + "?lang=" + lang ;
        }
    }



    function isContains(str, substr) {
        return str.indexOf(substr) >= 0;
    }

    //退出登录
    function logout() {
        clearCokie();
        window.location.href = "/user/login" ;
    }

$(function() {

    <?php $current_page = $this->session->current_page ;
    if($current_page == 1) { ?>
        $("#navli_home").addClass("active") ;
    <?php } else if ($current_page == 2) { ?>
        $("#navli_pro_mng").addClass("active") ;
    <?php } else if ($current_page == 3) { ?>
        $("#navli_order_mng").addClass("active") ;
    <?php }else if($current_page == 4){?>
         $("#navli_customer_mng").addClass("active") ;

    <?php } ?>

//    setCookie('user_info',"") ;
    var data = getCookie('user_info') ;

    // console.log("header:"+data) ;
     var jObj = jQuery.parseJSON(data) ;
    if(data == null || data =='') {
//        $("header_username").hide() ;
//        $("header_register").show() ;
//        $("header_seperator").show() ;
//        $("header_login").show() ;

        window.location.href = "/user/login" ;
    } else if(jObj[0]['backto'] == '0'){
        window.location.href = "/user/login" ;
    }else{
        
        // var jObj = data ;
        // var user_name = data.name ;
        var user_name = jObj[0]['name'];
        // console.log(user_name);
      
        if(user_name == null || user_name == '') {
            $("header_username").hide() ;
            $("header_register").show() ;
            $("header_seperator").show() ;
            $("header_login").show() ;
        } else {
            $("#header_username").show() ;
            $("#header_username").html("<img src=\"/Public/images/personalcenter_07.png\">" + user_name + " <span class=\"caret\"></span>" );
            $("#header_username").attr("href","/user/user_infor_page");
            $("#header_register").hide() ;
            $("#header_seperator").hide() ;
            $("#header_login").hide() ;
        }
    }
}) ;
</script>