<link href="/Public/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
           
        <style>
            body{
                background-color: #f5f5f5;
            }
            .mine_info{
                width: 1200px;
                overflow:hidden;
                margin:0 auto;
                min-height: 600px;
                padding-bottom:200px;
                background-color: #fff;
                margin-top: 30px;
                padding: 0 30px;
            }
            .mine_left{
                float: left;
                margin-top: 30px;
                cursor: pointer;

            }
            .left-list{
                padding: 10px;
                border-bottom: 2px solid transparent;
                margin-bottom: 20px;
            }
            .left-list:hover{
                border-bottom: 2px solid #00d8ff;
                font-weight: bold;
            }
            .active{
                border-bottom: 2px solid #00d8ff;
                font-weight: bold;
            }
        </style>

        <?php
        function is_active($cur, $data) {
            if($cur == $data) {
                return "active" ;
            }
        }

        function tree_expand($min, $max, $value) {
            if($value >= $min && $value <= $max) {
                return 'true' ;
            } else {
                return 'false' ;
            }
        }

        function tree_item_collapse_in($min, $max, $value) {
            if($value >= $min && $value <= $max) {
                return 'in' ;
            } else {
                return '' ;
            }
        }

        function tree_item_right_arrow($min, $max, $value) {
            if($value >= $min && $value <= $max) {
                return '03' ;
            } else {
                return '04' ;
            }
        }
        ?>

        <div class="mine_info">
            <div class="mine_left">
                <div class="left-list <?php echo is_active(0,$menu_data);?>" data="0">我的信息</div>
                <div class="left-list <?php echo is_active(2,$menu_data);?>" data="2">修改密码</div>
            </div>

<script>
    function isContains(str, substr) {
        return str.indexOf(substr)  >=0;
    }

    $(function(){
        get_index_type() ;
        
        $(".left-list").click(function () {
            console.log("list-group-item).click") ;
            $(".left-list").removeClass('active') ;
            $(this).addClass('active') ;
//            load_content() ;
            var page = $(this).attr('data') ;
            to_page(page) ;
        }) ;
    }) ;

    function to_page(page) {
        if(page == '0') {
            window.location.href = '/personal/home';
        } else if(page == '1') {
            window.location.href = '/personal/receive_account';
        } else if(page == '2') {
            window.location.href = '/personal/modify_pwd';
        } else if(page == '3') {
            window.location.href = '/personal/setting_currency';
        } else if(page == '4') {
            window.location.href = '/personal/msg_all?msg_type=0';
        } else if(page == '5') {
            window.location.href = '/personal/msg_all?msg_type=1';
        } else if(page == '6') {
            window.location.href = '/personal/msg_all?msg_type=2';
        } else if(page == '7') {
            window.location.href = '/personal/msg_all?msg_type=3';
        } else if(page == '8') {
            window.location.href = '/personal/commition?c_type=1';
        } else if(page == '9') {
            window.location.href = '/personal/commition?c_type=2';
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

    function load_content() {
        $("#frame_content").attr("src","http://www.baidu.com");
        $('#frame_content').load(function(){

        }) ;
    }

    function get_index_type() {
        <?php $ci = & get_instance() ;
            $current = $ci->session->order_menu_select;
            if($current == Constant::ORDER_MENU_TRAVEL) { ?>
            $("#product_mng_0").addClass("active");
            $("#product_mng_0 img").attr('src','/Public/images/order_menu_select.png') ;
        <?php } else if($current == Constant::ORDER_MENU_SHOP) { ?>
            $("#product_mng_1 img").attr('src','/Public/images/order_shop_select.png') ;
            $("#product_mng_1").addClass("active");
        <?php } ?>
    }
</script>