<div class="col-sm-10">
    <h1 class="page-header" id="h_page_header">所有产品</h1>
    <div class="row placeholders" id="product_list"></div>
    <ul class="pull-right pagination pagination-lg" id="ul_pages"></ul>
</div>

<script>

    //当前页
    var m_current_page = 0 ;
    //每页个数
    var m_page_record =8 ;
    //总页数
    var m_total_page = 0 ;
    //类型
    var m_page_type = 0;

    $(function() {
        get_product_page_type();
        get_all_product_by_page(m_current_page,m_page_record) ;
    });

    function get_product_page_type() {
        if (isContains(window.location.pathname, "/page/product_mng/0") || window.location.pathname == "/page/product_mng") {
            m_page_type = 0 ;
            $("#h_page_header").html("所有产品");
        } else if (isContains(window.location.pathname, "/page/product_mng/1")) {
            m_page_type = 1 ;
            $("#h_page_header").html("正在销售");
        } else if (isContains(window.location.pathname, "/page/product_mng/2")) {
            m_page_type = 2 ;
            $("#h_page_header").html("已下线");
        } else if (isContains(window.location.pathname, "/page/product_mng/3")) {
            m_page_type = 3 ;
            $("#h_page_header").html("已删除");
        }
    }

    function get_all_product_by_page(page, record) {
//        var p_url=this.location.origin + "/product/get_all_product_by_page" ;
        var p_url=this.location.origin + "/product/get_product" ;

        var token = get_token() ;
//        alert("token:" + token) ;
        $.get(p_url,
            {
                limit:record,
                page:page,
                type:m_page_type,
                token:token
            },
            function(data) {
                var strContent = JSON.stringify(data) ;
                console.log(strContent) ;

                if(data.result.err == 0) {
                    update_list(data.content)
                } else {
//                    alert(data.result.msg) ;
                }
        }) ;
    }

    function update_list(content) {
        if(content == null) {
            return ;
        }

        //reset product list
        $("#product_list").html("") ;
        for(var i=0;i<content.data.length;i++) {
//            add_item(content.data[i]) ;
            add_item_1(content.data[i]) ;
        }

        add_pages(content.total, m_current_page) ;
    }

    /**
     * 添加页码
     * @param total
     */
    function add_pages(total, current) {
        m_total_page = parseInt(total / m_page_record) +1;

        var html = "<li" ;

        //上一页
        if(current == 0) {
            html += " class=\"disabled\"" ;
        }
        html += "><a onclick=\"pre_page()\">&laquo;</a></li>" ;

        //中间页
        for(var i=0;i<m_total_page;i++) {
            if(i == current ) {
                html += "<li class=\"active\">" ;
            } else {
                html += "<li>";
            }

            html += "<a onclick=\"on_page_click(" + i + ")\">" + (i+1) + "</a></li>" ;
        }

        //下一页
        html += "<li" ;
        if(current == m_total_page - 1){
            html += " class=\"disabled\"";
        }
        html += "><a onclick=\"next_page()\">&raquo;</a></li>" ;

        $("#ul_pages").html(html) ;
    }

    function on_page_click(index) {
        console.log(index) ;
        var page = $("#ul_pages a")[index].innerText ;
        console.log(page) ;
        console.log("m_total_page="+m_total_page) ;
        console.log("m_current_page="+m_current_page) ;
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
    function next_page() {
        if(m_current_page < m_total_page -1) {
            m_current_page ++ ;
            get_all_product_by_page(m_current_page,m_page_record) ;
        }

    }

    function add_item(item) {
        var table = document.getElementById("my_table");
        var row = table.insertRow(-1) ;
        var cell0 = row.insertCell(0);
        var cell1 = row.insertCell(1);
        var cell2 = row.insertCell(2);
        var cell3 = row.insertCell(3);
        var cell4 = row.insertCell(4);
        var cell5 = row.insertCell(5);
        cell0.innerHTML = (table.rows.length -1) + "";
        cell1.innerHTML = item.title ;
        cell2.innerHTML = item.descr ;
        cell3.innerHTML = item.country + " " + item.city  ;
        cell4.innerHTML = item.price_current ;
        cell5.innerHTML = parseInt(item.can_book) == 1 ? "可预订":"不可预订" ;
    }

    function add_item_1(item) {
        var html = "<div class=\"col-xs-6 col-sm-3 \" onclick=\"location.href=\'http://yakejiao.com/page/product_detail?pid=" +item.id +"\'\">" ;

        if(item.face_img == null || item.face_img == "null") {
            html += "<img width=\"300px\" height=\"200px\" src=" + "\"http://img.yakejiao.com/1.jpg\"" ; //http://img.yakejiao.com//user/1/1_1450961355.771.png
            //http://img.yakejiao.com/1.jpg
        } else {
            html += "<img width=\"300px\" height=\"200px\"  src=" + "\"" + item.face_img + "\"" ;
        }

        html += "class=\"img-responsive\" alt=\"Generic placeholder thumbnail\">" ;

        html += "<h4 class=\"one_line_text\">" + item.title + "</h4>" ;
//        html += "<h4 style=\"text-overflow: -o-ellipsis-lastline;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;\">" + item.title + "</h4>" ;

//        html += "<span class=\"text-muted\">" +  item.descr + "</span>" ;
        html += "<span class=\"text-muted\">" +  item.product_feature + "</span>" ;


        var html1 = $("#product_list").html() ;
        html1 += html ;
        $("#product_list").html(html1) ;
    }

//    <div class="col-xs-6 col-sm-3 placeholder">
//        <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
//        <h4>Label</h4>
//        <span class="text-muted">Something else</span>
//    </div>




</script>