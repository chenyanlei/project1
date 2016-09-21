<link href="/Public/css/page_footer.css" rel="stylesheet" type="text/css"/>

<style>

    *{
        margin:0;
        padding:0;
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
    .myStore-main{
       width: 1135px;
       margin:0 auto;
       background-color: #fff;
       padding:0 10px;
       padding-bottom:200px;
       overflow: hidden;
    }
    table  
    {  
        border-collapse:collapse; 
        width: 100%; 
    }  
    table td  
    {  
        empty-cells : show  
    } 
    #order_table_body tr {
        text-align: center;
        border-bottom: 1px solid #ccc;
    }
    .align_left{
        text-align: left;
    }
    #order_table th {
         background: #7cebfc;
        border: medium none;
        color: #fff;
        font-size: 14px;
        font-weight: normal;
        height: 50px;
        line-height: 50px;
        text-align: center;
    }
    #order_table th{
        width:158px
    } 
    #order_table th:first-child{
        width:320px
    } 
    
    #order_table_body td{
        height:40px;
    }
    .order_mng{
        min-height:300px
        padding-bottom:200px;
    }
    .clear{
        clear:both
    }
    thead{
        border:solid 1px #ccc;
        border-bottom:none;
    }
    tbody{
        border:solid 1px #ccc;
        border-top:none;
    }
    .table > tbody > tr > td{
        padding:20px 0;
        color:#585858;
        font-size:14px;
        vertical-align: middle;
    }
     .table > tbody > tr > td:first-child{
        padding:20px 15px;
        width: 354px;
     }
   .table  tbody tr:first-child td{
        border-top:none
    }

    /*搜索条件样式*/
    .find_group{
        margin-top: 20px;
    }
    .one_line,.two_line,.three_line,.four_line,.five_line,.six_line,.sevent_line{
        margin-bottom: 20px;
    }
    .one_line:after,.two_line:after,.three_line:after,.four_line:after,.five_line:after,.six_line:after,.find_group:after,.sevent_line:after{
        content: ".";
        clear: both;
        display: block;
        height: 0;
        visibility: hidden;
    }
    /*第一行*/
    .one_input{
        float: left;
    }
    .store_order_num{
        width: 300px;
        height: 30px;
        border:1px solid #ccc;
    }
    /*第二行*/
    .two_input{
        float: left;
    }
    .weixin_order_num{
        width: 300px;
        height: 30px;
    }
    .find_title,.one_select,.two_select,.three_select,.start_time,.middle_time,.end_time,.start_money,.middle_money,.end_money{
        float: left;
    }
    .one-select,.two_select,.three_select{
        cursor: pointer;
    }
    .one_select_detail:hover,.two_select_detail:hover,.three_select_detail:hover{
        background-color: #e6e7ec;
    }
    .one_select{
        position: relative;
    }
    .two_select{
        margin-right: 20px;
        position: relative;
    }
    .three_select{
        position: relative;
        display: none;
    }
    .find_title{
        width: 110px;
        height: 30px;
        line-height: 30px;
    }
    .one_select_detail,.two_select_detail,.three_select_detail{
        width:300px;
        height: 30px;
        line-height: 30px;
        overflow: hidden;
        position: relative;
        border:1px solid #ccc;
    }
    .one_select_name,.two_select_name,.three_select_name{
        float: left;
        width: 260px;
        margin-left: 10px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .caret{
       float: right;
       margin-top:12px;
       margin-right: 10px;
       border:5px solid transparent;
       border-top: 5px solid #ccc;
    }
    .dropdown_class_one,.dropdown_class_two,.dropdown_class_three{
        display: none;
        position:absolute;
        width: 300px;
        border:1px solid #ccc;
        background-color: #fff;
        border-top:none;
        z-index: 1;

    }
    .dropdown_class_one li,.dropdown_class_two li,.dropdown_class_three li{
        background-color: #fff;
        padding-left: 10px;
        height: 30px;
        line-height: 30px;
        color: #585858;
    }
    .dropdown_class_one li:hover,.dropdown_class_two li:hover,.dropdown_class_three li:hover{
        background-color: #e6e7ec;
    }
    .start_money,.end_money{
        height: 30px;
        border:1px solid #ccc;
        width: 200px;
        line-height: 30px;
    }
    .middle_money,.middle_time{
        height: 30px;
        line-height: 30px;
        margin:0 10px;
    }
    .start_time,.end_time{
        height: 30px;
        border:1px solid #ccc;
        width: 200px;
        line-height: 30px;
        text-align: center;
        cursor: pointer;
        background-image: url(/Public/images/22.png);
        background-repeat: no-repeat;
        background-position:170px center; 
    }
    .go_find{
        width: 100px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        cursor: pointer;
        margin-left: 110px;
        background-color: #00d8ff;
        color: #fff;
        float: left;
        margin-right: 20px;
    }
    .err_message{
        float: left;
        height: 30px;
        line-height: 30px;
        color:#e15f63;
    }
    .check_detail{
        color: #00d8ff;
    }
    .table_loading{
        vertical-align: middle;
    }
    .load_one,.load_two,.load_three,.load_four{
        float: right;
    }
    .load_one,.load_two,.load_three{
        height: 19px;
        line-height: 19px;
    }
    .load_four{
        width: 2px;
        height: 12px;
        background-color: #ccc;
        margin:0 10px;
        margin-top: 4px;
    }
    .load_excel,.load_txt{
        color: #459ae9;
        cursor: pointer;
        font-size: 16px;
    }
    .load_excel:hover,.load_txt:hover{
        border-bottom: 1px solid #459ae9;
    }
    /*.load_two{
        margin-right: 10px;
    }*/
</style>

<div class="myStore-main">

    <div class="order_mng"> 
        <div class="find_group">
            <div class="one_line">
                <div class="find_title">订单号</div>
                <div class="one_input"><input class="store_order_num" type="text"></div>
            </div>
         <!--    <div class="two_line">
                <div class="find_title">微信支付订单号</div>
                <div class="two_input"><input class="weixin_order_num" type="text"></div>
            </div> -->
            <div class="three_line">
                <div class="find_title">订单状态</div>
                <div class="one_select">
                    <div class="one_select_detail">
                        <div class="one_select_name" ptype=''>请选择</div>
                        <i class="caret"></i>
                    </div>
                    <ul class="dropdown_class_one">
                        <li ptype=''>请选择</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_WILL_PAY;?>">待支付</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_PAYED;?>">已支付</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_CANCELING;?>">取消中</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_CANCELED;?>">已取消</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_AGREE;?>">已同意</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_REJECT;?>">已拒绝</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_REFUND_CHECHING;?>">退款审核中</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_REFUNDING;?>">退款中</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_REFUNDED;?>">退款完成</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_REFUND_FAILED;?>">退款失败</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_CLOSED;?>">已关闭</li>
                        <li ptype="<?=Ptype::ORDER_STATUS_END;?>">已完成</li>
                    </ul>
                </div>
            </div>
            <?php
                if($role === '0'){
            ?>
            <div class="five_line">
                <div class="find_title">订单类型</div>
                <div class="two_select">
                    <div class="two_select_detail">
                        <div class="two_select_name" id=''>所有</div>
                        <i class="caret"></i>
                    </div>
                    <ul class="dropdown_class_two">
                        <li>所有</li>
                        <li>门市</li>
                    </ul>
                </div>
                <div class="three_select">
                    <div class="three_select_detail">
                        <div class="three_select_name" id=''></div>
                        <i class="caret"></i>
                    </div>
                    <ul class="dropdown_class_three">
                    </ul>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="four_line">
                <div class="find_title">交易金额</div>
                <input class="start_money" placeholder="最小金额为1的整数">
                <div class="middle_money">至</div>
                <input class="end_money" placeholder="最大金额为100000的整数">
            </div>
            <div class="six_line">
                <div class="find_title">交易时间</div>
                <div class="start_time" id="date_start"></div>
                <div class="middle_time">至</div>
                <div class="end_time" id="date_end"></div>
            </div>
            <div class="find_group">
                <div class="go_find">查询</div>
                <div class="err_message"></div>
            </div>
            <div class="sevent_line">
              <!--   <div class="load_three"><img style="margin-right:5px" src="/Public/images/ico_txt.png" alt=""><a id="load_txt" href="javascript:;"><span class="load_txt">Txt格式</span></a></div>
                <div class="load_four"></div> -->
                <div class="load_two"><img style="margin-right:5px" src="/Public/images/ico_xls.png" alt=""><a id="load_excel" href="javascript:;"><span class="load_excel">Excel格式</span></a></div>
                <div class="load_one">下载订单：</div>
            </div>
        </div>
        <div style="margin-top:20px;">
            <table id="order_table" class="table text-center" id="order_list">
                <thead>
                <th>预定产品</th>
                <th>下单时间</th>
                <th>价钱</th>
                <th>状态</th>
                <!-- <th>佣金提成</th> -->
                <th>操作</th>
                </thead>
                <tbody id="order_table_body">
                </tbody>
            </table>
            <ul class="center pagination pagination-lg" id="ul_pages"></ul>
        </div>
    </div>
</div>
<script src="/Public/js/date_fomat.js"></script>
<script src="/Public/js/laydate/laydate.js"></script>

<script>

        var order_id='';
        var money_min='';
        var money_max='';
        var status='';
        var aid=0;
        var time_span='';
        var m_time_start = "-1" ;
        var m_time_end = "-1" ;
        var m_total = <?php if(isset($order_info['total'])) echo $order_info['total']; else echo 0 ;?> ;
        var m_current_page = <?php if(isset($order_info['cur'])) echo $order_info['cur']; else echo 0 ;?> ;
        var m_page_record = <?php if(isset($order_info['rn'])) echo $order_info['rn']; else echo 5 ;?> ;
        // 页面加载  请求订单列表
        get_all_product_by_page(m_current_page,m_page_record,order_id,money_min,money_max,status,aid) ;
        //请求门店信息
            <?php
                if($role === '0'){
            ?>
                $.ajax({
                    url: '/store/get_list',
                    type: 'get',
                    data: {rn:100,pn:0},
                    success:function (data) {
                        
                        console.log('a');
                        console.log(data);
                        if (data.result.err==0) {
                            var str='';
                            if (data.content.list.length>0) {
                                $('.three_select_name').html(data.content.list[0].name)
                                $('.three_select_name').attr('id',data.content.list[0].uid)
                                for (var i =0; i <data.content.list.length; i++) {
                                    str+='<li id='+data.content.list[i].uid+'>'+data.content.list[i].name+'</li>';
                                }
                                $('.dropdown_class_three').append(str);
                            }else{
                                $('.three_select_name').html('暂时还没有门市')
                            }
                        }else{
                            alert(data.result.msg)
                        }
                    }
                })
            <?php
                }
            ?>
         
        // 查询条件事件
        $('.one_select_detail').click(function(e) {
             e.stopPropagation() ;
            $('.dropdown_class_one').toggle();
        });
        $('.two_select_detail').click(function(e) {
             e.stopPropagation() ;
            $('.dropdown_class_two').toggle();
        });
        $('.three_select_detail').click(function(e) {
             e.stopPropagation() ;
            $('.dropdown_class_three').toggle();
        });
        $('.dropdown_class_one li').click(function() {
            var name=$(this).html();
            var ptype=$(this).attr('ptype');
            $('.one_select_name').html(name);
            $('.one_select_name').attr('ptype',ptype);
            $('.dropdown_class_one').hide();
        });
        $('.dropdown_class_two li').click(function() {
            var name=$(this).html();
            $('.two_select_name').html(name);
            if (name=='所有') {
                $('.three_select').hide();
                $('.two_select_name').attr('id',0);
                $('.dropdown_class_three').hide();
            }
            if (name=="门市") {
                $('.three_select').show();
            }
            $('.dropdown_class_two').hide();
        });
        $('body').delegate('.dropdown_class_three li', 'click', function() {
            var name=$(this).html();
            var id=$(this).attr('id');
            $('.three_select_name').html(name);
            $('.three_select_name').attr('id',id);
            $('.dropdown_class_three').hide();
            
        });
        $("body").bind('click',function() {
          $(".dropdown_class_one").hide();
          $(".dropdown_class_two").hide();
          $(".dropdown_class_three").hide();
        });

        //点击查询按钮事件
        $('.go_find').click(function() {
            m_time_start = $('#date_start').html();
            m_time_end = $('#date_end').html() ;
            if (m_time_start==''&&m_time_end=='') {
                m_time_start='-1';
                m_time_end='-1';
            }
            order_id=$('.store_order_num').val().trim();
            if ($('.one_select_name').html()=='请选择') {
                status="";
            }else{
                status=$('.one_select_name').attr('ptype');
            }
            if ($('.two_select_name').html()=='所有') {
                aid=$('.two_select_name').attr('id');
            }else{
                aid=$('.three_select_name').attr('id');
            }
            money_min=$('.start_money').val().trim();
            money_max=$('.end_money').val().trim();
            // if (order_id!=''&&!is_order(order_id)) {
            //     err_style('.err_message','订单号格式错误');
            //     return false;
            // }
            if (money_min!=''&&!min_money(money_min)) {
                err_style('.err_message','最小交易金额格式错误');
                return false;
            }
            if(money_max>100000){
                err_style('.err_message','最大交易金额100000');
                return false;
            }
            if (money_max!=''&&!max_money(money_max)) {
                err_style('.err_message','最大交易金额格式错误');
                return false;
            }
            if (money_min!=''&&min_money(money_min)&&money_max!=''&&max_money(money_max)) {
                if (money_min>money_max) {
                    err_style('.err_message','最大交易金额必须大于最小交易金额');
                    return false;
                }
            }
            if ($('#date_start').html()==''&&$('#date_end').html()!='') {
                err_style('.err_message','开始交易时间不能为空');
                return false;
            }
            if ($('#date_start').html()!=''&&$('#date_end').html()=='') {
                err_style('.err_message','结束交易时间不能为空');
                return false;
            }
            $('.err_message').hide();
           get_all_product_by_page(0,m_page_record,order_id,money_min,money_max,status,aid)
        });

        // 订单号格式验证
        function is_order(num) {
            var reg=/^\d{21}$/;
            return reg.test(num);
        }

        function min_money(money) {
            var a=/^\+?[1-9]\d*$/;
            return a.test(money)
        }
        function max_money(money) {
            var a=/^\+?[1-9]\d*$/;
            return a.test(money)
        }
        function err_style(e,m) {
            $(e).show();
            $(e).html(m)
        }
    var start = {
        elem: '#date_start',
        format: 'YYYY-MM-DD',
        min: '2016-05-10', //设定最小日期为当前日期
        max:laydate.now(),
        istime: false,
        istoday: true,
        isclear: false,
        choose: function(datas){
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
            m_time_start = datas ;
            console.log(datas) ;
        }
    };
    var end = {
        elem: '#date_end',
        format: 'YYYY-MM-DD',
        min: '2016-05-10', //设定最小日期为当前日期
        max:laydate.now(),
        istime: false,
        istoday: true,
        isclear: false,
        choose: function(datas){
            start.max = datas; //结束日选好后，重置开始日的最大日期
            m_time_end = datas ;
        }
    };
    laydate(start);
    laydate(end);

    

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
        console.log(index) ;
        var page = $("#ul_pages a")[index].innerText ;
        console.log(page) ;
        console.log("m_total_page="+m_total_page) ;
        console.log("m_current_page="+m_current_page) ;
        if(index < m_total_page) {
            m_current_page = index ;
            get_all_product_by_page(m_current_page,m_page_record,order_id,money_min,money_max,status,aid) ;
        }
    }

    /**
     * 上一页
     */
    function pre_page() {
        if(m_current_page > 0) {
            m_current_page -- ;
            get_all_product_by_page(m_current_page,m_page_record,order_id,money_min,money_max,status,aid) ;
        }
    }

    /**
     * 下一页
     */
    function next_page() {
        if(m_current_page < m_total_page -1) {
            m_current_page ++ ;
            get_all_product_by_page(m_current_page,m_page_record,order_id,money_min,money_max,status,aid) ;
        }
    }
    function update_no_result() {
        $("#ul_pages").hide() ;
        $("#order_table_body").html('<tr><td colspan="5" style="color:#585858;">暂无数据</td></tr>') ;
    }
    function update_list(content) {
        if(content == null) {
            return ;
        }
        if(content.data.length == 0 ) {
            console.log('content.data.length == 0') ;
            update_no_result();
        } else {
            $("#order_table_body").html('') ;
            for(var i=0;i<content.data.length;i++) {
                add_row(content.data[i], i) ;
            }
            add_pages(content.total, m_current_page) ;
        }
    }
    function get_all_product_by_page(page, record,order_id,money_min,money_max,status,aid) {
        var p_url="/order/get_order_list" ;
        time_span = "" ;
        if(m_time_start != '-1' && m_time_end != '-1') {
            time_span = m_time_start ;
            time_span += "@" ;
            time_span += m_time_end ;
        }
        $.ajax({
            url: p_url,
            type: 'get',
            data: {'rn':record,'pn':page,'order_id':order_id,'min_fee':money_min,'max_fee':money_max,'status':status,'aid':aid,'time_span':time_span},
            beforeSend:function () {
                $("#order_table_body").html('<tr><td colspan="5" style="font-size:16px;color:#585858;"><span>正在查询...</span><img class="table_loading" src="/Public/images/loading.gif" alt="" /></td></tr>') ;
            },
            success:function (data) {
                if(data.result.err == 0) {
                    if(data.content != null) {
                        update_list(data.content);
                    } else {
                        update_no_result();
                    }
                } else {
                        update_no_result();
                }
            }
        })

    }
    // 点击导出excl格式
    $('.load_excel').click(function() {
        var excel_param='/order/export_excel?order_id='+order_id+'&money_fee='+money_min+'&max_fee='+money_max+'&status='+status+'&aid='+aid+'&time_span='+time_span;
        $('#load_excel').attr('href',excel_param)
        $('#load_excel').click();
    });
    // 点击导出txt格式
    // $('.load_txt').click(function() {
        
    // });
    function add_row(data, row) {
        var status=data.status;
        var x = '';
        switch (status)
        {
        case '<?=Ptype::ORDER_STATUS_WILL_PAY;?>':
          x="待支付";
          break;
        case '<?=Ptype::ORDER_STATUS_PAYED;?>':
          x="已支付";
          break;
        case '<?=Ptype::ORDER_STATUS_CANCELING;?>':
          x="取消中";
          break;
        case '<?=Ptype::ORDER_STATUS_CANCELED;?>':
          x="已取消";
          break;
        case '<?=Ptype::ORDER_STATUS_AGREE;?>':
          x="已同意";
          break;
        case '<?=Ptype::ORDER_STATUS_REJECT;?>':
          x="已拒绝";
          break;
        case '<?=Ptype::ORDER_STATUS_REFUND_CHECHING;?>':
          x="退款审核中";
          break;
        case '<?=Ptype::ORDER_STATUS_REFUNDING;?>':
          x="退款中";
          break;
        case '<?=Ptype::ORDER_STATUS_REFUNDED;?>':
          x="退款完成";
          break;
        case '<?=Ptype::ORDER_STATUS_REFUND_FAILED;?>':
          x="退款失败";
          break;
        case '<?=Ptype::ORDER_STATUS_CLOSED;?>':
          x="已关闭";
          break;
        case '<?=Ptype::ORDER_STATUS_END;?>':
          x="已完成";
          break;           
        }
        var tr = document.getElementById('order_table_body').insertRow() ;
        tr.className = 'title_item' ;
        var td = tr.insertCell(0) ;
        td.className = 'align_left';
        td.innerHTML = data['title'] ;
        var td = tr.insertCell(1) ;
         td.innerHTML = data['create_time'];
        var num1 = tr.insertCell(2) ;
        num1.innerHTML = data['unit_price'];
        var num2 = tr.insertCell(3) ;
        num2.innerHTML = x;
        var num3 = tr.insertCell(4) ;
        num3.innerHTML = '<a class="check_detail" href="/order/detail?order_id=' + data['order_id']+'">查看详情</a>';
    }

</script>