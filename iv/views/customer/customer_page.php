<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<style>
    *{
        margin:0;
        padding:0;
    }
    body,html{
        font-size: 14px;
        font-family:"Microsoft YaHei";
        height: 100%;
        background-color: #f5f5f5;
    }
    a:link,a:hover,a:active,a:visited{
        text-decoration: none !important;
    }
    ul li{
        list-style: none;
    }
    button{
        outline: none;
    }
    body,html{
        font-size: 14px;
        font-family:"Microsoft YaHei";
        height: 100%;
        background-color: #f5f5f5;
    }
    .myStore-main{
            width: 1135px;
            margin:0 auto;
            background-color: #fff;
            padding:0 15px 240px 15px;
    }
    .date_sel {
        margin-top: 30px;
        background: #e7e7e7;
        color: #333333 ;
        height: 50px;
        line-height: 50px;
    }
    .date_sel_tip {
        float: left;
    }
    .td_style {
        word-wrap:break-word;
    }

    .td_width_60 {
        width:100px;
    }
    .td_width_100 {
        width:100px;
    }
    #product_list th{
        height:40px;
        line-height:40px;
        text-align:center;
        border:none;
        font-size:14px;
        background: #7febff;
        color:#ffffff;
        font-weight:normal
    }
    #product_list thead{
        border:1px solid  #7fcbea;
    }
    #product_list td{
        height:45px;
        line-height:45px;
        width:220px
    }
    tr td{
        font-size:14px;
        color:#585858;
    }
    tr td{
        font-size:14px;
        color:#585858
    }
   tr td:nth-child(5) a{
        font-size:14px;
        color:#0097d6
    }
   .pagination-lg > li > a, .pagination-lg > li > span{
      margin-left:5px;
      font-size:14px;
       padding: 5px 10px;
    }
    .pagination-lg > li:last-child > a, .pagination-lg > li:last-child > span {
        border-bottom-right-radius: 0px;
        border-top-right-radius: 0px;
    }
    .pagination-lg > li:first-child > a, .pagination-lg > li:first-child > span {
        border-bottom-left-radius: 0px;
        border-top-left-radius: 0px;
    }
    .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
        background-color: #7fcbea;
        border-color: #7fcbea;
        color: #fff;
        cursor: default;
        z-index: 2;
    }
    .customer_list{
       min-height:500px;
       margin-top: 30px;
       padding-top:10px;
       display: none;
    }
    a:hover, a:visited, a:link, a:active{
        text-decoration: none;
    }
    .clear{
        clear:both
    }
     table
    {
        border-collapse:collapse;
    }
    table td
    {
        empty-cells : show
    }
    #no_result{
        display: none;
        text-align: center;
        font-size: 16px;
    }
</style>
<div class="myStore-main">
        <div id="no_result">
            您当前还没有客户
        </div>
    <div class="customer_list">
        <table class="table table-striped table-hover table-bordered text-center" id="product_list" style="margin-top: 10px">
            <thead>
                <th style="padding:0">客户姓名</th>
                <th style="padding:0">性别</th>
                <th style="padding:0">手机号</th>
                <th style="padding:0">邮箱</th>
                <th style="padding:0">操作</th>
            </thead>
            <tbody id="customer_table_body">
            </tbody>
        </table>

        <ul class="center pagination pagination-lg" id="ul_pages"></ul>
    </div>
</div>
<!-- <div class="clear"></div> -->
<script>

    var m_total = <?php if(isset($order_info['total'])) echo $order_info['total']; else echo 0 ;?> ;
    var m_current_page = <?php if(isset($order_info['cur'])) echo $order_info['cur']; else echo 0 ;?> ;
    var m_page_record = <?php if(isset($order_info['rn'])) echo $order_info['rn']; else echo 10 ;?> ;
    $(function() {
//        add_pages(m_total, m_current_page) ;
        get_all_product_by_page(m_current_page,m_page_record) ;

    }) ;

    /**
     * 添加页码
     * @param total
     */
    function add_pages(total, current) {
        m_total_page = Math.ceil(total /m_page_record);
        if (m_total_page==1) {
            $("#ul_pages").hide();
        }else{
            $("#ul_pages").show();
        }
        var html = "<li" ;

        //首页
        if(current == 0) {
            html += " class=\"disabled\"" ;
        }

        html += "><a onclick=\"on_page_click(0)\">首页<li>";

        html += "<li" ;

        //上一页
        if(current == 0) {
            html += " class=\"disabled\"" ;
        }
        html += "><a onclick=\"pre_page()\">上一页</a></li>" ;

        //中间页
        if(m_total_page<10){
            for(var i=0;i<m_total_page;i++) {
                if(i == current ) {
                    html += "<li class=\"active\">" ;
                } else {
                    html += "<li>";
                }

                html += "<a onclick=\"on_page_click(" + i + ")\">" + (i+1) + "</a></li>" ;
            }
        }else{
            var now_half =  m_total_page-9;

            if(current < now_half){
              for(var i=0;i<4;i++) {
                if(current + i== current ) {
                    html += "<li class=\"active\">" ;
                } else {
                    html += "<li>";
                }

                html += "<a onclick=\"on_page_click(" + (current+i) + ")\">" + (current+i+1) + "</a></li>" ;
             }
              html += "<li><a onclick=\"on_page_click(" + (current+4) + ")\">" + "..." + "</a></li>";
              for(var i=4;i>0;i--) {
                if(m_total_page-i == current ) {
                    html += "<li class=\"active\">" ;
                } else {
                    html += "<li>";
                }

                html += "<a onclick=\"on_page_click(" + (m_total_page-i)+ ")\">" + (m_total_page-i+1) + "</a></li>" ;
                }
            }else{
                for(var i= 9;i>0;i--) {
                    if(m_total_page-i == current ) {
                        html += "<li class=\"active\">" ;
                    } else {
                        html += "<li>";
                    }

                    html += "<a onclick=\"on_page_click(" + (m_total_page-i)+ ")\">" + (m_total_page-i+1) + "</a></li>" ;
                    }
            }

        }

        //下一页
        html += "<li" ;
        if(current == m_total_page - 1){
            html += " class=\"disabled\"";
        }
        html += "><a onclick=\"next_page("+current+")\">下一页</a></li>" ;

        //尾页
        html += "<li" ;
        if(current == m_total_page - 1){
            html += " class=\"disabled\"";
        }

        html += "><a onclick=\"on_page_click("+(m_total_page - 1)+")\">尾页</a></li>" ;

        $("#ul_pages").html(html) ;
    }

    function on_page_click(index) {
        // console.log(index) ;
       // var page = $("#ul_pages li a")[index].innerText ;
       // console.log(page) ;
        // console.log("m_total_page="+m_total_page) ;
        // console.log("m_current_page="+m_current_page) ;
        if(index < m_total_page) {
            m_current_page = index ;
            get_all_product_by_page(m_current_page,m_page_record) ;
        }
    }

    /**
     * 上一页
     */
    function pre_page() {
        if(m_current_page > 0) {
            m_current_page -- ;
            get_all_product_by_page(m_current_page,m_page_record) ;
        }
    }

    /**
     * 下一页
     */
    function next_page(current) {
        if(m_current_page < m_total_page -1) {
                m_current_page ++ ;

            get_all_product_by_page(m_current_page,m_page_record) ;
        }
    }

    function get_all_product_by_page(page, record) {
        var p_url="/customer/get_customer_list" ;
        // console.log(p_url) ;
        $.get(p_url,
            {
                rn:record,
                pn:page,
            },
            function(data) {
                console.log(data)
                if(data.result.err == 0) {
                    if(data.content != null) {
                        $("#no_result").hide() ;
                        $('.customer_list').show();
                        update_list(data.content);
                    } else {
                        update_no_result();
                    }
                } else {
                    $('#product_list').hide();
                    $("#no_result").show();
                    $('.myStore-main').css({
                        'padding-top': '100px'
                    });
                }
            }) ;
    }

    function update_no_result() {
        $("#no_result").show() ;
        $("#product_list").hide() ;
        $("#ul_pages").hide() ;
    }

    function update_list(content) {
        if(content == null) {
            return ;
        }
        console.log(ontent.list.length+'啦啦啦')
        if(content.list.length == 0 ) {
            update_no_result();
        } else {
            $("#no_result").hide() ;
            $("#ul_pages").show() ;
            $("#product_list").show() ;

            $("#customer_table_body").html('') ;

            //reset product list
            for(var i=0;i<content.list.length;i++) {
                add_row(content.list[i], i) ;
            }

            add_pages(content.total, m_current_page) ;
        }
    }


    // 对Date的扩展，将 Date 转化为指定格式的String
    // 月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符，
    // 年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字)
    // 例子：
    // (new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423
    // (new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18
    Date.prototype.Format = function (fmt) {
        var o = {
            "M+": this.getMonth() + 1, //月份
            "d+": this.getDate(), //日
            "h+": this.getHours(), //小时
            "m+": this.getMinutes(), //分
            "s+": this.getSeconds(), //秒
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度
            "S": this.getMilliseconds() //毫秒
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    }


    function add_row(data, row) {
        var tr = document.getElementById('customer_table_body').insertRow() ;

        var num1 = tr.insertCell(0) ;
        num1.innerHTML = data['name'];

        var num2 = tr.insertCell(1) ;
        num2.innerHTML = data['sex']==1 ? '女':' 男';

        var num3 = tr.insertCell(2) ;
        num3.innerHTML = data['phone'];

        var num4 = tr.insertCell(3) ;
        num4.innerHTML = data['email'];
        // console.log(data.id);
        var mannul= "<a href='/customer/detail?id="+data.id+"'>查看详情</a>";
        var num5 = tr.insertCell(4) ;
        num5.innerHTML = mannul;
    }
</script>