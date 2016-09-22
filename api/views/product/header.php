<div class="container-fluid">
    <div class="row">
        <!--        <div class="col-sm-3 col-md-2 sidebar">-->
        <div class="col-sm-2 sidebar">
            <ul class="nav nav-sidebar">
                <li id="product_mng_0"><a href="/page/product_mng/0">所有产品<span class="sr-only">(current)</span></a></li>
                <li id="product_mng_1"><a href="/page/product_mng/1">正在销售</a></li>
                <li id="product_mng_2"><a href="/page/product_mng/2">已下线</a></li>
                <li id="product_mng_3"><a href="/page/product_mng/3">已删除</a></li>
                <li id="product_mng_4"><a href="/page/product_mng/4">新增产品</a></li>
            </ul>
        </div>


<script>

    function isContains(str, substr) {
        return str.indexOf(substr)  >=0;
    }

    $(function(){
        get_page_type() ;
    }) ;

    function get_page_type() {
        if (isContains(window.location.pathname, "/page/product_mng/0") || window.location.pathname == "/page/product_mng") {
            $("#product_mng_0").addClass("active");
        } else if (isContains(window.location.pathname, "/page/product_mng/1")) {
            $("#product_mng_1").addClass("active");
        } else if (isContains(window.location.pathname, "/page/product_mng/2")) {
            $("#product_mng_2").addClass("active");
        } else if (isContains(window.location.pathname, "/page/product_mng/3")) {
            $("#product_mng_3").addClass("active");
        } else if (isContains(window.location.pathname, "/page/product_mng/4")) {
            $("#product_mng_4").addClass("active");
        }
    }
</script>