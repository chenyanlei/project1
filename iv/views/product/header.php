<div class="container-fluid" >
    <div class="row">
        <style>
            .nav>li {
                position: relative;
                display: block;
                line-height: 54px;
            }

            .nav-sidebar>li>a{
                line-height: 54px;
            }

            .nav_side_bar {
                margin-right: 10px
            }

            .panel-heading:hover{
                background: #CCCCCC;
            }

            .panel-group .panel+.panel {
                margin-top: 0px;
            }

            .panel-group {
                margin-bottom: 0px;
            }

            .panel-group .panel {
                margin-bottom: 0;
                border-radius: 0px;
            }

            .list-group-item {
                cursor: default;
            }

            .list-group-item:hover {
                background: #CCCCCC;
            }

            .panel-heading1 {
                border-top: 0px solid transparent;
                margin-top: 0px;
            }

            .panel1 {
                border-top: 0px;
            }

            .right {
                float: right;
                margin: 2px;
            }

            .left {
                float: left;
            }

            .panel-title {
                font-size: 14px;
                font-weight: normal;
            }
            .panel-title span {
                margin-left: 10px;
            }

            .sidebar {
            // padding-top: 20px;
                padding:0px;
                min-height: 500px;
                height: 100%;
            }

            a:hover, a:visited, a:active {
                text-decoration: none;
            }

            .list-group-item {
            // background-color: #fff;
            //border: 1px solid #ddd;
                background-color: #f5f5f5;
                border: 1px solid #f5f5f5;
                display: block;
                margin-bottom: -1px;
                padding: 10px 15px;
                position: relative;
                text-indent:2em;
            }
            .panel-default {
                border-color: #f5f5f5;
            }
            .panel-group .panel-heading + .panel-collapse > .list-group, .panel-group .panel-heading + .panel-collapse > .panel-body {
            // border-top: 1px solid #ddd;
                border-top: 1px solid #f5f5f5;
            }
            .panel {
                background-color: #fff;
                border-radius: 4px;
                box-shadow: 0 0 0  #f5f5f5;
                margin-bottom: 20px;
            }
            .list-group-item.active, .list-group-item.active:focus, .list-group-item.active:hover {
                background-color: #cccccc;
                border-color: #cccccc;
                color: #585858;
                font-weight:bold;
                z-index: 2;
            }

        </style>

        <?php
        function is_active($cur, $data) {
            if($cur == $data) {
                return "active" ;
            }
        }

        if(!isset($cur_menu)){
            $cur_menu = 0 ;
        }
        ?>

        <div class="col-sm-2 sidebar panel-group" style="position: fixed; bottom: 0px;top:0px;margin-top:80px">
            <div class=" ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="collapse" href="#collapse1" aria-expanded="true" onclick="click_collapse($(this))">
                            <div class="panel-title">
                                <img class="left" src="/Public/images/icon_all_selected.png">
                                <span>产品库</span>
                                <img class="right" src="/Public/images/personalcenter-<?php if($cur_menu >=0 && $cur_menu<4) echo '03'; else echo '04'?>.png">
                            </div>
                        </a>
                    </div>

                    <div id="collapse1" class="panel-collapse collapse <?php if($cur_menu >=0 && $cur_menu<4) echo 'in';?>">
                        <ul class="list-group">
                            <li class="list-group-item <?php echo is_active(0,$cur_menu);?>" data="0">一日游</li>
                            <li class="list-group-item <?php echo is_active(1,$cur_menu);?>" data="1">组团游</li>
<!--                            <li class="list-group-item --><?php //echo is_active(2,$cur_menu);?><!--" data="2">景点门票</li>-->
<!--                            <li class="list-group-item --><?php //echo is_active(3,$cur_menu);?><!--" data="3">租车</li>-->
                        </ul>
                    </div>
                </div>

                <div class="panel panel-default panel1">
                    <div class="panel-heading">
                        <a data-toggle="collapse" href="#collapse2" aria-expanded="false" onclick="click_collapse($(this))">
                            <h5 class="panel-title">
                                <img class="left" src="/Public/images/my_prod_02.png">
                                <span>我的产品</span>
                                <img class="right" src="/Public/images/personalcenter-<?php if($cur_menu >=4 && $cur_menu<=5) echo '03'; else echo '04'?>.png">
                            </h5>
                        </a>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse <?php if($cur_menu >=4 && $cur_menu<=6) echo 'in';?>">
                        <ul class="list-group">
                            <li class="list-group-item <?php echo is_active(4,$cur_menu);?>" data="4">正在销售</li>
                            <li class="list-group-item <?php echo is_active(5,$cur_menu);?>" data="5">可销售</li>
                            <li class="list-group-item <?php echo is_active(6,$cur_menu);?>" data="6">我的分享</li>
                        </ul>
                    </div>
                </div>
<!--                <div class="panel panel-default panel1">-->
<!--                    <div class="panel-heading">-->
<!--                        <a data-toggle="collapse" href="#collapse3" aria-expanded="false" onclick="click_collapse($(this))">-->
<!--                            <h5 class="panel-title">-->
<!--                                <img class="left" src="/Public/images/my_required_02.png">-->
<!--                                <span>我的需求</span>-->
<!--                                <img class="right" src="/Public/images/personalcenter-04.png">-->
<!--                            </h5>-->
<!--                        </a>-->
<!--                    </div>-->
<!--                    <div id="collapse3" class="panel-collapse collapse">-->
<!--                        <ul class="list-group">-->
<!--                            <li class="list-group-item --><?php //echo is_active(7,$cur_menu);?><!--" data="7">历史需求</li>-->
<!--                            <li class="list-group-item --><?php //echo is_active(8,$cur_menu);?><!--" data="8">新增需求</li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="panel panel-default panel1">
                    <div class="panel-heading">
                        <a data-toggle="collapse" href="#collapse4" aria-expanded="false" onclick="click_collapse($(this))">
                            <h5 class="panel-title">
                                <img class="left" src="/Public/images/meterial_02.png">
                                <span>素材库</span>
                                <img class="right" src="/Public/images/personalcenter-04.png">
                            </h5>
                        </a>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <ul class="list-group">
                            <li class="list-group-item <?php echo is_active(9,$cur_menu);?>" data="9">文本</li>
                            <li class="list-group-item <?php echo is_active(10,$cur_menu);?>" data="10">图片</li>
                            <li class="list-group-item <?php echo is_active(11,$cur_menu);?>" data="11">模板</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<script>

    function isContains(str, substr) {
        return str.indexOf(substr)  >=0;
    }

    $(function(){
        get_index_type() ;

        $(".list-group-item").click(function () {

            console.log("list-group-item).click") ;
            $(".list-group-item").removeClass('active') ;
            $(this).addClass('active') ;
            var page = $(this).attr('data') ;
            to_page(page) ;

        }) ;
    }) ;

    function to_page(page) {
        if(page == '0') {
//            window.location.href = '/publish/product_mng/0';
            window.location.href = '/product/product_lib_oneday_travel';
        } else if(page == '1') {
//            window.location.href = '/publish/product_mng/1';
            window.location.href = '/product/product_lib_group_travel';
        } else if(page == '2') {
//            window.location.href = '/publish/product_mng/2';
        } else if(page == '3') {
//            window.location.href = '/personal/setting_currency';
        } else if(page == '4') {
            window.location.href = '/product/product_on_sale?p_status=1';
//            window.location.href = '/publish/product_mng/1';
        } else if(page == '5') {
            window.location.href = '/product/product_offline?p_status=0';
//            window.location.href = '/publish/product_mng/2';
        } else if(page == '6') {
            window.location.href = '/product/my_share?cur_menu=6';
        } else if(page == '7') {
//            window.location.href = '/personal/msg_all?msg_type=3';
        } else if(page == '8') {
//            window.location.href = '/personal/msg_all?msg_type=3';
        } else if(page == '9') {
//            window.location.href = '/personal/msg_all?msg_type=3';
        } else if(page == '10') {
//            window.location.href = '/personal/msg_all?msg_type=3';
        } else if(page == '11') {
//            window.location.href = '/product/my_share';
        }
    }

    function click_collapse(a){
        console.log(a) ;
        var expanded = a.attr('aria-expanded') ;
        console.log('expanded:' + expanded) ;
        var right = a.find('.right') ;
        if(expanded == 'true') {
            right.attr('src', '/Public/images/personalcenter-04.png');
        } else {
            right.attr('src', '/Public/images/personalcenter-03.png');
        }
        return expanded;
    }


    function get_index_type() {
        <?php $ci = & get_instance() ;
            $current = $ci->session->prodct_mng_current;
            if($current == 0) { ?>
            $("#product_mng_0").addClass("active");
            $("#product_mng_0 img").attr('src','/Public/images/icon_all.png') ;
        <?php } else if($current == 1) { ?>
            $("#product_mng_1 img").attr('src','/Public/images/icon_ing.png') ;
            $("#product_mng_1").addClass("active");
        <?php } else if($current == 2) { ?>
            $("#product_mng_2 img").attr('src','/Public/images/icon_offline_focus.png') ;
            $("#product_mng_2").addClass("active");
        <?php } else if($current == 3) { ?>
            $("#product_mng_3 img").attr('src','/Public/images/icon_ing.png') ;
            $("#product_mng_3").addClass("active");
        <?php } else if($current == 4) { ?>
            $("#product_mng_4 img").attr('src','/Public/images/icon_add_focus.png') ;
            $("#product_mng_4").addClass("active");
        <?php } ?>
    }
</script>