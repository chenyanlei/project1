<div class="container-fluid" >
    <div class="row">
        <style>
            .nav>li {
                position: relative;
                display: block;
                line-height: 54px;
            }

            .nav-sidebar>li>a{
                line-height: 28px;
            }

            .nav_side_bar {
                margin-right: 10px
            }
        </style>
        <div class="col-sm-2 sidebar"  style="position: fixed; bottom: 0px;top:152px">
            <ul class="nav nav-sidebar">
                <li id="product_mng_0"><a href="/order/order_mng"><img src="/Public/images/order_menu_normal.png" class="nav_side_bar">旅游订单<span class="sr-only">(current)</span></a></li>
<!--                <li id="product_mng_1"><a href="/order/shop_mng"><img src="/Public/images/order_shop_normal.png" class="nav_side_bar">购物订单</a></li>-->
            </ul>
        </div>

        <div class="col-sm-10 col-sm-offset-2">
<script>
    function isContains(str, substr) {
        return str.indexOf(substr)  >=0;
    }

    $(function(){
        get_index_type() ;
    }) ;

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