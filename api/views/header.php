<!DOCTYPE HTML>
<!--PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<!--xmlns="http://www.w3.org/1999/xhtml"-->
<html lang="zh-CN">
<head>
    <title><?=$tip_title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src=<?php echo URL_THIRD.'jquery-2.1.4/jquery.min.js' ;?>></script>
    <link rel="stylesheet" href=<?php echo URL_THIRD."bootstrap-3.3.5/css/bootstrap.min.css";?>>
    <script src=<?php echo URL_THIRD."bootstrap-3.3.5/js/bootstrap.min.js";?>></script>
    <link rel="stylesheet" type="text/css" href=<?php echo "'".base_url()."css/welcome.css"."'";?>/>
    <link rel="stylesheet" type="text/css" href=<?php echo "'".base_url()."css/common.css"."'";?>/>
    <link rel="stylesheet" type="text/css" href=<?php echo "'".base_url()."css/normalize.css"."'";?>/>
    <script src=<?php echo "'".base_url()."/js/my_cookie.js"."'";?>></script>
</head>
<body>

<!--section class="top-bar-element">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="http://www.shafa.com" class="top-bar-logo" onclick="ga('send', 'event', 'Web', 'Nav', 'logo');">
                    <img src="http://static.sfcdn.org/images/logo.jpg?logo" alt="沙发网" title="沙发网">
                </a>
                <div class="top-bar-link">
                    <span><i class="fa fa-volume-up"></i></span>
                    <a href="http://bbs.shafa.com/thread-341769-1-1.html" target="_blank" onclick="ga('send', 'event', 'Web', 'Nav', 'ad');">2016优秀内容奖励计划</a>
                </div>
                <div class="top-bar-login">
                    <a href="#" data-target="#loginModal" data-toggle="modal" onclick="ga('send', 'event', 'Web', 'Nav', 'login');" data-shafa-login="button" data-url="http://account.shafa.com/oauth/js-authorize" data-style="css/account/qrcode.css">登录</a>
                    <span>|</span>
                    <a href="http://account.shafa.com/register" onclick="ga('send', 'event', 'Web', 'Nav', 'signup');">注册</a>
                </div>
                <div class="top-bar-search">
                    <form method="GET" action="http://app.shafa.com/search" accept-charset="UTF-8" class="form-inline" onsubmit="ga('send', 'event', 'Web', 'Nav', 'search')">

                        <div class="form-group">
                            <input class="form-control" placeholder="搜索电视应用" name="kw" type="text">
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section-->

<!---->
<nav id="body-header" class="navbar navbar-inverse main-header navbar-fixed-top">
    <div class="container mouse_pointer">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
<!--            <a class="navbar-brand pull-left" href="#">好游世界旅行网<sub class="header_www_sub">  --提供有品质的旅行服务</sub></a> 好游世界-->
<!--            <a class="navbar-brand pull-left" href="">聚吧</a>-->
            <a class="navbar-brand pull-left" href="">逍品旅行网</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul id="header_left" class="nav navbar-nav navbar-left">
                <li id="navli_home" onclick="header_onclick_item_home()"><a><?php echo "首页"; ?></a></li>
                <li id="navli_pro_mng" onclick="header_onclick_item_promng()"><a><?php echo "产品管理"; ?></a></li>
                <li id="navli_order_mng" onclick="header_onclick_item_ordermng()"><a><?php echo "订单管理"; ?></a></li>
                <li id="navli_user_mng" onclick="header_onclick_item_usermng()"><a><?php echo "用户管理"; ?></a></li>
            </ul>

            <ul id="header_right" class="nav navbar-nav navbar-right">
                <li class="mouse_pointer"><a id="header_register" onclick="header_onclick_register()"><?php echo $txt_register_title; ?></a><li>
                <li class="divider-vertical"></li>
                <li class="mouse_pointer"><a id="header_login"  onclick="header_onclick_login()"><?php echo $txt_login_title; ?></a><li>
<!--                <li class="mouse_pointer"><a id="header_username" onclick="onclick_user()"></a><li>-->
<!--                <li class="mouse_pointer"><a id="header_username" href="#"></a><li>-->
                <li class="dropdown mouse_pointer">
                    <a href="#" id="header_username" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">我的信息</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">使用帮助</a></li>
                        <li><a onclick="logout()">退出账号</a></li>
                    </ul>
                </li>
                <li class="mouse_pointer"><a id="header_change_lang" onclick="onclick_change_lang()"><?php echo $header_lang; ?></a><li>
            </ul>
        </div>
    </div>
</nav>
<div class="main-body">

<script>

//    var test = '<?php //echo $txt_register_title; ?>//' ;
//    console.log("register_title:" + test) ;
    function header_onclick_item_home() {
        var pathname = window.location.pathname ;
        if(pathname != "/page/home") {
            window.location = "/page/home" + window.location.search ;
        }
    }

    function header_onclick_item_usermng() {
        var pathname = window.location.pathname ;
        if(pathname != "/page/user_mng") {
            window.location = "/page/user_mng" + window.location.search ;
        }
    }


    function header_onclick_item_promng() {
        var pathname = window.location.pathname ;
        if(pathname != "/page/product_mng") {
            window.location = "/page/product_mng" + window.location.search ;
        }
    }

    function header_onclick_item_ordermng() {
        var pathname = window.location.pathname ;
        if(pathname != "/page/order_mng") {
            window.location = "/page/order_mng" + window.location.search ;
        }
    }



    //注册
    function header_onclick_register(){
        if(window.location.pathname != "/page/register")  {
            window.location = "/page/register" + window.location.search ;
        }
    }

    //登录
    function header_onclick_login() {
        if(window.location.pathname != "/page/login")  {
            window.location = "/page/login"  + window.location.search ;
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
        window.location.href = "/page/login" ;
    }

    //切换语言
    function onclick_change_lang() {
        console.log("onclick_change_lang click") ;
        var lang = getCookie("language") ;
        if(lang == "0") {
            lang = "1" ;
        } else {
            lang = "0" ;
        }
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

    function get_token() {
        var data = getCookie('user_info') ;
        if(data == null) {
            return null ;
        }
        var jObj = jQuery.parseJSON(data) ;
        return jObj.token ;
    }

$(function() {

//
//    $("#header_left").each(function(){
//        var y = $(this).children().last();
////        alert(y.text());
//        y.removeClass("");
//    });

    if( isContains(window.location.pathname , "/page/home") ) {
        $("#navli_home").addClass("active") ;
    } else if( isContains(window.location.pathname,"/page/user_mng" )) {
        $("#navli_user_mng").addClass("active") ;
    } else if( isContains(window.location.pathname,"/page/product_mng" )) {
        $("#navli_pro_mng").addClass("active") ;
    } else if( isContains(window.location.pathname,"/page/order_mng" )) {
        $("#navli_order_mng").addClass("active") ;
    }

//    setCookie('user_info',"") ;
    var data = getCookie('user_info') ;

    console.log("header:"+data) ;

    if(data == null || data =='') {
//        $("header_username").hide() ;
//        $("header_register").show() ;
//        $("header_seperator").show() ;
//        $("header_login").show() ;
        window.location.href = "/page/login" ;
    } else {
        var jObj = jQuery.parseJSON(data) ;
        var user_name = jObj.login_name ;
        var nick_name = jObj.nick_name ;
        console.log("user_name:" + user_name) ;
        if(user_name == null || user_name == '') {
            $("header_username").hide() ;
            $("header_register").show() ;
            $("header_seperator").show() ;
            $("header_login").show() ;
        } else {
            $("#header_username").show() ;
            $("#header_username").html(user_name + " <span class=\"caret\"></span>" );
            $("#header_username").attr("href","/user/user_infor_page");
            $("#header_register").hide() ;
            $("#header_seperator").hide() ;
            $("#header_login").hide() ;
            console.log("aaaaaaaaaaa") ;
        }
    }
}) ;
</script>