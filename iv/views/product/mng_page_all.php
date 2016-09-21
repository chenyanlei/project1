<script src="/Public/js/layer.js"></script>
<div class="col-sm-offset-2 col-sm-10">
    <style>
        ol>li {
            display: block;
            float: left;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            list-style: none;
            margin-right: 20px;
            font-size: 14px;
        }

        ol>li:hover, ol .active{
            background: #0097d6;
            color: #ffffff;
            padding: 5px;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 2px;
            border-bottom-left-radius: 2px;
            border-bottom-right-radius: 2px;
            -moz-border-radius: 2px;
        }

        .item{
            width: 300px;
        }
        .item img {
            width: 300px;
            height: 200px;
            min-height:100%;
        }

        .li_div {
            position: relative;
            padding: 0px;
            /*background: rgba(0, 0, 0, 0.2);;*/
            float:left;
            margin-left:60px;
            margin-top:40px ;
            background: #f1f1f1;
        }

        .product-item {
            position: relative;
            _zoom: 1;
            width: 300px;
            height: 200px;
            float: left;
            _display: inline;
            overflow: hidden;
        }

        .item-msg {
            position: absolute;
            z-index: 2;
            top: 50%;
            margin: -40px 0 0 0;
            width: 300px;
            overflow: hidden;
            color:white;
            background: rgba(0, 0, 0, 0.0);
            text-align: center;
            transition: all .3s;
        }

        .msg-country {
            font-size: 30px;
        }

        .msg-title {
            margin-top: 10px;
            font-size: 18px;
        }

        .msg-img {
            position: absolute;
            top: 60px;
            width: 80px;
            height: 30px;
            margin-left: -17px;
        }

        .msg-img-bg-on-sale {
            background: url("/Public/images/tag_01.png");
        }

        .msg-img-bg-other {
            background: url("/Public/images/tag_02.png");
        }

        .msg-img>p{
            color:white;
            font-size:12px;
            line-height:26px ;
        }

        .item_price {
            /*position: absolute;*/
            /*z-index: 2;*/
            /*bottom: 0px;*/
            /*width: 300px;*/
            /*height: 60px;*/
            /*overflow: hidden;*/
            /*color:white;*/
            /*background: rgba(0, 0, 0, 0.5);*/
            /*text-align: center;*/
            /*transition: all .3s;*/

            clear: both;
            bottom: 0px;
            width: 300px;
            height: 60px;
            overflow: hidden;
            color:white;
            /*background: black;*/
            text-align: center;
        }

        .item_price1 {
            padding-left: 20px;
            line-height: 60px;
            width: 138px;
            float: left;
            text-align: left;
            color: #585858;
            font-size: 14px;
        }

        .item_price2 {
            padding-right: 20px;
            line-height: 60px;
            width: 138px;
            float: right;
            text-align: right;
            color: #0097d6;
            font-size: 14px;
        }

        .item_op {
            padding-top: 0px;
            clear: both;
            bottom: 0px;
            width: 300px;
            height: 60px;
            overflow: hidden;
            text-align: center;
        }

        .btn-left {
            width: 100px;
            height: 40px;
            background: #0097d6;
            color: #fff;
            margin-right: 30px;
        }

        .btn-right{
            width: 100px;
            height: 40px;
            margin-left: 30px;
            background: #ffffff;
            color: #0097d6;
            border: 2px #0097d6 solid;
        }

        #no_result {
            margin-top: 100px;
            font-size: 30px;
        }

        .p_type{
            background: #f1f1f1;
            padding: 10px;
            margin-top: 40px;
            margin-left: 60px;
        }

        ol {
            /*-webkit-margin-before: 0px;*/
            /*-webkit-margin-after: 0px;*/
            /*-webkit-margin-start: 0px;*/
            /*-webkit-margin-end: 0px;*/
            /*-webkit-padding-start: 0px;*/
        }

        .li_div:hover {
            background: #CCCCCC;
        }

        .product-item>img:hover{
            opacity: 0.5;
        }

        .placeholders{
            width: 1120px;
        }

    </style>
    <link href="/Public/css/page_footer.css" rel="stylesheet" type="text/css"/>

    <div class="row placeholders">
        <ul id="product_list">
        </ul>
        <div id="no_result" style="display: none;">
            您当前还没有上传该类别的产品
        </div>

    </div>
    <ul class="center pagination pagination-lg" id="ul_pages"></ul>
</div>

<script>

    var m_aid= "<?=$aid?>" ;
    //当前页
    var m_current_page = 0 ;
    //每页个数
    var m_page_record =3 ;
    //总页数
    var m_total_page = 0 ;
    // 产品状态
//    var m_product_status = <?php //echo $p_status;?>//;   // 0 销售中  1 已下线
    //产品类型
    var m_product_type = <?=$p_type?> ;//默认一日游

    var index ;

    $(function() {
        index = layer.load(1,{offset:['200px','800px'],shade: [0.4, '#393D49']});
        get_all_product_by_page(m_current_page,m_page_record) ;

        $("#p_type li").click(function(){
            $("#p_type li").removeClass('active') ;
            $(this).addClass('active') ;

            $type = $(this).attr('data') ;
            if($type != m_product_type) {
                m_product_type = $type ;
                m_current_page = 0 ;
            }

            console.log('data:' + $type) ;
            get_all_product_by_page(m_current_page,m_page_record) ;
        }) ;


        $("#product_list").delegate("input","click",function() {
            var op_type = $(this).attr('op_type') ;
            var data = $(this).attr('data') ;
            var p_type = $(this).attr('p_type') ;
            console.log('op_type:' + op_type + ",id:" + data + ",p_type:" + p_type) ;
            if(op_type == 1) {  //edit
                edit_click(data,p_type) ;
            } else if(op_type == 2) { //online
                var p_status = $(this).attr('p_status') ;
                op_click($(this),data,p_type,p_status) ;
            }
        }) ;
    });

    function get_all_product_by_page(page, record) {
        var p_url="/product/get_list" ;
        console.log(p_url) ;
        $.get(p_url,
            {
                rn:record,
                pn:page,
//                p_status:m_product_status,
                p_type:m_product_type,
            },
            function(data) {

//                if(index != -1)
                {
                    layer.close(index) ;
                    index = -1 ;
                }
                console.log(data) ;
                // var dataObj = JSON.parse(data) ;
                if(data.result.err == 0) {
                    if(data.content != null) {
                        update_list(data.content)
                    } else {
                        update_no_result();
                    }
                } else {
                    update_no_result();
                    alert(data.result.msg) ;
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

        console.log('content.data.length:' + content.data.length) ;
        if(content.data.length == 0 ) {
            update_no_result();
        } else {
            $("#no_result").hide() ;
            $("#ul_pages").show() ;
            $("#product_list").show() ;

            //reset product list
            $("#product_list").html("") ;
            for(var i=0;i<content.data.length;i++) {
                add_item(content.data[i]) ;
            }

            add_pages(content.total, m_current_page) ;
        }
    }

    /**
     * 添加页码
     * @param total
     */
    function add_pages(total, current) {
        m_total_page = Math.ceil(total /m_page_record);
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

                html += "<a onclick=\"on_page_click(" + (i+1) + ")\">" + (i+1) + "</a></li>" ;
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

    function get_price1(item) {
        if(item.prices != null) {
            return item.prices[0].price1 ;
        }
        return 'err' ;
    }

    function get_price2(item) {
        if(item.prices != null) {
            return item.prices[0].price2 ;
        }
        return 'err' ;
    }

    function get_status_text(a_status) {
        var i_status = parseInt(a_status);
        switch (i_status) {
            case 0:
                txt = '可销售';
                break ;
            case 1:
                txt = '销售中';
                break ;
            default :
                txt = 'err';
                break ;
        }

        return txt ;
    }

    function get_operation_txt(a_status) {
        var i_status = parseInt(a_status);
        switch (i_status) {
            case 0:
                txt = '选择';
                break ;
            case 1:
                txt = '取消选择';
                break ;
            default :
                txt = 'err';
                break ;
        }

        return txt ;
    }

    function add_item(item) {
        var li = document.createElement('li') ;
        var a = document.createElement('a') ;

        var div = document.createElement('div') ;
        var div_t = document.createElement('div') ;
        div_t.className = 'product-item' ;

        var item_price = document.createElement('div') ;
        item_price.className = 'item_price' ;

        var div_c = document.createElement('div');
        div_c.setAttribute('style', 'clear:both') ;

        li.setAttribute('style', 'display:block') ;

        // item
        var img = document.createElement('img') ;
        var div1 = document.createElement('div') ;
        div1.className = 'item-msg' ;

        var div_op = document.createElement('div') ;
        div_op.className = 'item_op';

        // div - country
        var country = document.createElement('p');
        country.className = 'msg-country' ;
        country.innerHTML = item.country ;

        // div - title
        var title = document.createElement('p');
        country.className = 'msg-title' ;
        title.innerHTML = item.title ;

        // div_b 同行价
        var price1 = document.createElement('div') ;
        var price2 = document.createElement('div') ;
        if(item.price_type == 0) {
            price1.innerHTML = '同行价:' +  get_price1(item);
            price2.innerHTML = '建议零售价:' +  get_price2(item);
        } else {
            price1.innerHTML = '建议零售价:' +  get_price1(item);
            price2.innerHTML = '佣金:' +  get_price2(item);
        }

        price1.className='item_price1';
        item_price.appendChild(price1) ;
        price2.className='item_price2';
        item_price.appendChild(price2) ;

        // div_op - 编辑
        var btn_edit = document.createElement('input') ;
        btn_edit.setAttribute('value', '编辑') ;
        btn_edit.setAttribute('data', item.id) ;
        btn_edit.setAttribute('op_type', '1') ;
        btn_edit.setAttribute('p_type', item.p_type) ;
        btn_edit.setAttribute('type', 'button') ;
//        btn_edit.setAttribute('onclick', 'edit_click(this)') ;
        btn_edit.className = 'btn button-default btn-left';

        // div_op - 下线、上线
        var btn_op = document.createElement('input') ;
        btn_op.setAttribute('value', get_operation_txt(item.a_status)) ;
        btn_op.setAttribute('data', item.id) ;
        btn_op.setAttribute('op_type', '2') ;
        btn_op.setAttribute('p_type', item.p_type) ;
        btn_op.setAttribute('p_status', item.a_status) ;
        btn_op.className = 'btn button-default btn-right';
//        if(item.p_status == 0 || item.p_status == 4 || item.p_status == 5) {
//            btn_op.setAttribute('type', 'button') ;
//        } else {
//
//        }
        btn_op.setAttribute('type', get_oparetion_button_type(item.a_status)) ;

        // img
        img.setAttribute('src', item.face_img==null?"http://img.yakejiao.com/1.jpg":item.face_img) ;
        var div_tag = document.createElement('div');

        console.log("item.a_status=" +item.a_status) ;
        if(item.a_status == 1) {
            div_tag.className = 'item-msg msg-img msg-img-bg-on-sale' ;
        } else {
            div_tag.className = 'item-msg msg-img msg-img-bg-other' ;
        }

        var span=document.createElement('p') ;
        span.innerHTML=get_status_text(item.a_status);
        div_tag.appendChild(span) ;

        // li
        div_t.appendChild(img) ;
        div_t.appendChild(div1) ;
//        div_t.appendChild(div) ;

        a.appendChild(div_t) ;
        a.appendChild(item_price) ;
        div.appendChild(a) ;
        div.appendChild(div_op) ;

        div.appendChild(div_tag) ;
        div.appendChild(div_c) ;

        // div
        div1.appendChild(country) ;
        div1.appendChild(title) ;

        // div_op
        div_op.appendChild(btn_edit) ;
        div_op.appendChild(btn_op) ;
        div.className = 'li_div' ;
//        a.appendChild(div) ;
        a.setAttribute('href', '/product/product_detail?pid=' + item.id + '&p_type=' + item.p_type + '&aid=' + m_aid) ;
//        li.appendChild(a) ;
        li.appendChild(div) ;

        $("#product_list").append(li) ;
    }

    function edit_click(id, p_type){
        var url = "/product_spread/spread?&id=" + id + "&p_type=" + p_type;
        console.log(url) ;
        window.location.href=url ;
    }

    function op_click(control, id, p_type, p_status) {
        var url = "/product/operation";
        console.log(p_status) ;

        $.get(url, {
            id:id,
            p_type:p_type,
            p_status:p_status
        }, function(data) {
            console.log(data) ;
            if(data['result']['err'] == -1) {
                window.location.href = '/user/login'
            } else {
                control.attr({
                    'value':get_operation_txt(data['content']['p_status']),
                    'p_status':data['content']['p_status'],
                    'type':get_oparetion_button_type(parseInt(data['content']['p_status']))
                }) ;

                var control_parent = control.parent() ;
                var item_msg = control_parent.next() ;
//                if(item_msg.className.has('item_msg'))
                {
                    var p = item_msg.children() ;
                    item_msg.removeClass('msg-img-bg-on-sale') ;
                    item_msg.removeClass('msg-img-bg-other') ;
                    if(data['content']['p_status'] == 0) {
                        item_msg.addClass('msg-img-bg-on-sale') ;
                        p.html(get_status_text(data['content']['p_status'])) ;
                    } else {
//                        item_msg.addClass('msg-img-bg-other') ;
                        item_msg.addClass('msg-img-bg-on-sale') ;
                        p.html(get_status_text(data['content']['p_status'])) ;
                    }
                }
            }
        }) ;
    }

    function get_oparetion_button_type(a_status) {
        if(a_status == 0 || a_status == 1) {
            return 'button' ;
        } else {
            return 'hidden' ;
        }
    }

    var ary = Array() ;

</script>
