<?php
//价格设置
?>
<script src="/Public/js/laydate/laydate.js"></script>
<style>
    .pri_item{
        float:left
    }

    .icon_momey{
        width:32px;
        height:32px;
        background:#cccccc url(/Public/images/icon_01.png) no-repeat center center;
        float: left;
        color: #585858;
    }
    .input_pri{
      float: left;
       height: 30px;
       width: 156px;
       border:1px solid #ccc;
       padding-left:10px;
       color:#585858;
       font-size: 14px;
       outline: none; 
    }
    .alp_momey{
        color:#ffffff;
        width:60px;
        background:#cccccc;
        height:34px;
        float:left;
        line-height:34px;
        text-align:center
    }
    .start_travel_date_title{
        margin-bottom: 10px;
    }
    #date_reduce, #date_add {
        float: left;
        width: 40px;
        height: 40px;
        text-align: center;
        line-height: 40px;
        font-size: 40px;
        color: #fff;
        cursor: pointer;
    }
     #date_reduce{
        background-color: #18C0DF ;
     }
    #date_add{
        background-color: #DA8028 ;
    }
    #input_days{
        margin: 0 5px;
    }
    #date_reduce:hover,#date_add:hover{
        border: solid blue 1px;
    }
    #start_travel_date_list{
        max-height: 600px;
        overflow-y: auto;
        border-bottom:1px solid #ccc;
        padding-bottom:15px;
        margin-bottom:20px;
    }
    #start_travel_date_setting {
        float: left;
    }
    .sale_on{
        color:#585858;
        font-size:14px;
        margin-bottom:10px;
    }
    .cps_clear{
        overflow:hidden;  
        background-color: #f1f1f1;
         margin-bottom:10px;
    }
    .cps_info{
        float: left;
        height: 40px;
        line-height: 40px;
        padding-left:20px;
    }
    .cps_delete{
        float: right;
        background-color: #585858;
        cursor: pointer;
        height: 30px;
        width:60px;
        line-height: 30px;
        text-align: center;
        color: #fff;
        border:1px solid #f1f1f1;
        border-radius:4px;
        margin-top:4px;
        margin-right:10px;
    }
    #start_travel_date_list_null{
        color: #999;
    }

    .cps_date_type_item{
        width: 150px;
        height: 200px;
        float: left;
        background: #f9f9f9;
        text-align: center;
        color: #585858;
        margin: 10px;
        font-size: 20px;
        line-height: 200px;
    }

    .qsc-active{
        background: #4c5a5f;
        color:#fff;
    }

    .cps_date_type_item:hover{
        background: #585858;
        color:#fff;
    }
    #cps_back span{
        padding: 7px 15px 7px 15px;
        background: #f9f9f9;
    }
    #cps_back span:hover{
        background: #4c5a5f;
        color: #fff;
    }
    #cps_back{
        margin-bottom: 20px;
    }
    .p_d,.p_c,.p_l{
        margin-right:100px;
    }
</style>

<div id="cps_back" style="display: none;"><span>返回</span></div>


<div id="cps_date_type">
    <div>选择时间类型</div>
    <div class="diliver_line"></div>
    <div style="clear: both"></div>
    <div class="cps_date_type_item" id="cps_total_year">全年有效</div>
    <div class="cps_date_type_item" id="cps_special_year">指定时间段有效</div>
    <div class="cps_date_type_item" id="cps_special_date">指定日期有效</div>
</div>
<div style="clear: both"></div>
<div class="diliver_line"></div>
<div id="cps_date_set1" style="display: none">
    <label id="com_price_setting_title" class="">已设定日期</label>
    <div class="diliver_line"></div>
    <div id="start_travel_date_list_null">暂时没有价格设置</div>
    <div id="start_travel_date_list"></div>
    <div style="padding: 20px; border:solid 1px #ccc">
        <div>添加一个价格</div>
        <div class="diliver_line"></div>
        <div id="start_travel_date" style="margin-bottom:20px;">
            <div style="overflow:hidden">
                <div style="float:left;">
                    <div class="start_travel_date_title">起始日期</div>
                    <input id="start_travel_date_setting" class="laydate-icon" readonly style="height:38px;"/>
                </div>
                <div id="cps_time_end" style="float:left; margin-left: 20px">
                    <div class="start_travel_date_title">终止日期</div>
                    <input id="end_travel_date_setting" class="laydate-icon" readonly style="height:38px;"/>
                </div>
            </div>
        </div>
        <div style="overflow:hidden;">
            <div>
                <div style="float: left;margin: 10px;margin-left:0px">
                    <input type="radio" value="0" name="price_type" checked >同行价
                </div>
                <div style="float: left;margin: 10px;">
                    <input type="radio" value="1" name="price_type">销售价
                </div>
                <div style="clear: both"></div>
            </div>
            <div class="pri_item" style="margin-right:20px;">
                <div class="sale_on" id="com_price_setting_price1_tips">同行销售价</div>
                <div class="pri_on">
                    <span class="icon_momey"></span>
                    <input type="text" name="same_price" class="input_pri" id="same_price" placeholder="人民币">
                </div>
            </div>
            <div class="pri_item">
                <div class="sale_on" id="com_price_setting_price2_tips">建议零售价</div>
                <div class="pri_on">
                    <span class="icon_momey"></span>
                    <input type="text" name="advise_price" class="input_pri" id="advise_price" placeholder="人民币">
                </div>
            </div>
        </div>
        <div style="clear: both"></div>
        <div class="diliver_line"></div>
        <div id="div_add_start_travel_confirm" class="qsc-btn" style="margin-top:20px">添加</div>
    </div>
    <div class="diliver_line"></div>
</div>


<script>

    var m_cur_date = '' ;
    var m_min_date = '' ;
    var m_max_date = '' ;
    var m_days = 1;
    var m_arr_prices = new Array() ;
    var m_date_arr= new Array() ;
    var m_calendar_type = 1 ;//1 全年有效 2指定时间段有效 3指定日期有效
    var m_start ;
    var m_end ;

    function com_price_setting_get_prices() {
        arr = new Array() ;
        for(var index=0;index<m_arr_prices.length;index++) {
            arr.push(JSON.stringify(m_arr_prices[index]));
        }
        return arr ;
    }

    function com_price_setting_get_calendar_type() {
        return m_calendar_type;
    }

    function com_price_setting_get_price_type(){
        return $('input:radio[name="price_type"]:checked').val();
    }

    function com_price_setting_is_validate() {
        return m_arr_prices.length > 0;
    }

    $(function(){
        //价格只能是数字的验证
        function price(p){
            var reg=/^[1-9][0-9]*$/;
            return  reg.test(p);
        }

        $('input:radio[name="price_type"]').click(function(){
            var val = $(this).val() ;
            if(val == 0) {
                $("#com_price_setting_price1_tips").text("同行销售价") ;
                $("#com_price_setting_price2_tips").text("建议零售价") ;
            } else {
                $("#com_price_setting_price1_tips").text("建议零售价") ;
                $("#com_price_setting_price2_tips").text("佣金") ;
            }
        }) ;

        $("#cps_total_year").click(function(){
            if(m_calendar_type != 1) {
                m_arr_prices.length=0;
                m_date_arr.length=0;
                $('#start_travel_date_list').text('') ;
                $("#start_travel_date_list_null").show() ;
            }
            m_calendar_type = 1 ;
            $(".cps_date_type_item").removeClass('qsc-active') ;
            $(this).addClass('qsc-active') ;
            $("#cps_back").show() ;
            $("#cps_date_type").hide() ;
            $("#cps_date_set1").show() ;
            $("#start_travel_date").hide();
            $("#com_price_setting_title").text("已设定日期-全年有效") ;
        }) ;
        $("#cps_special_year").click(function(){
            if(m_calendar_type != 2) {
                m_arr_prices.length=0;
                m_date_arr.length=0;
                $('#start_travel_date_list').text('') ;
                $("#start_travel_date_list_null").show() ;
            }
            $(".cps_date_type_item").removeClass('qsc-active') ;
            $(this).addClass('qsc-active') ;
            m_calendar_type = 2 ;
            $("#cps_back").show() ;
            $("#cps_date_type").hide() ;
            $("#cps_date_set1").show() ;
            $("#start_travel_date").show();
            $("#cps_time_end").show();
            $("#com_price_setting_title").text("已设定日期-指定时间段有效") ;
        }) ;
        $("#cps_special_date").click(function(){
            if(m_calendar_type != 3) {
                m_arr_prices.length=0;
                m_date_arr.length=0;
                $('#start_travel_date_list').text('') ;
                $("#start_travel_date_list_null").show() ;
            }
            $(".cps_date_type_item").removeClass('qsc-active') ;
            $(this).addClass('qsc-active') ;
            m_calendar_type = 3 ;
            $("#cps_back").show() ;
            $("#cps_date_type").hide() ;
            $("#cps_date_set1").show() ;
            $("#start_travel_date").show();
            $("#cps_time_end").hide();
            $("#com_price_setting_title").text("已设定日期-指定日期有效") ;
        }) ;

        $("#cps_back").click(function(){
            $("#cps_date_type").show() ;
            $("#cps_date_set1").hide() ;
            $("#cps_back").hide() ;
        }) ;

        $('#div_add_start_travel_confirm').click(function() {
            console.log('div_add_start_travel_confirm 1') ;
            var start_travel_date_setting=$("#start_travel_date_setting").val();
            var same_price=$("#same_price");
            var advise_price=$("#advise_price");
            var one_day = new Object() ;
            if(m_calendar_type == 3){
                one_day.start_date = m_cur_date ;
            } else if(m_calendar_type == 2) {
                one_day.calendar_from = m_min_date ;
                one_day.calendar_to = m_max_date ;
            }

            console.log('div_add_start_travel_confirm 2:' + m_calendar_type + " start_travel_date_setting:" + start_travel_date_setting ) ;
            one_day.days = m_days ;
            one_day.price1 = same_price.val() ;
            one_day.price2 = advise_price.val() ;

            if(m_calendar_type != 0) {
                if (start_travel_date_setting=="") {
                    confirm("日期不能为空")
                }
            }

            if(same_price.val()==""){
                confirm("同行价不能为空")
            }

            else if(!cps_price(same_price.val())){
                confirm("同行价格式不对");
            }

            else if(advise_price.val()==""){
                confirm("建议零售价不能为空")
            }

            else if(!cps_price(advise_price.val())){
                confirm("建议零售价格式不对");
            }

            else if( cps_is_exist(m_date_arr,start_travel_date_setting) ){//2016-7-16
                confirm(start_travel_date_setting+"已存在，请重新选择")
            }

            else{
                var div='<div class="cps_clear"><div class="cps_info"><span class="m_cur_date">'+m_cur_date+'</span> <span class="p_d">共'+m_days+'天 </span><span class="p_c">同行价:'+one_day.price1+'</span><span class="p_l"> 建议零售价:'+one_day.price2+'</span></div><div class="cps_delete">删除</div></div>'
                $('#start_travel_date_list').append(div) ;
                m_arr_prices.push(one_day) ;
                m_date_arr.push(start_travel_date_setting) ;
                //清除日期插件时间
                $("#start_travel_date_setting").val("");
                $("#start_travel_date_list_null").hide() ;

                if(m_calendar_type == 1) {
                    $("#end_travel_date_setting").val("");
                    var ymd = m_max_date.split("-") ;
                    console.log(m_max_date) ;
                    console.log(ymd) ;
                    var ymdObj = new Date(ymd[0], ymd[1], parseInt(ymd[2]) + 1);
                    m_start.min = ymdObj.getFullYear() + "-" + ymdObj.getMonth() + "-" + ymdObj.getDate();
                    m_start.max="2099-06-16";
                    m_end.min= m_start.min;
                    m_end.max="2099-06-16";
                }
            }
        }) ;
        //点击删除按钮
        $("#start_travel_date_list").delegate(".cps_delete","click",function () {
            var index=$(this).parent('.cps_clear').index();
            console.log("index:"+index);

            $(this).parent(".cps_clear").remove();
            m_arr_prices.splice(index,1);
            m_date_arr.splice(index,1) ;

            console.log(m_arr_prices.length);
            console.log(m_arr_prices);
            if(m_arr_prices.length == 0) {
                $("#start_travel_date_list_null").show() ;
            }
        });
        //
        function cps_is_exist(arr, date){ 
            for(var i=0; i<arr.length; i++){ 
                if(arr[i] == date){
                    return true; 
                } 
            }
            return false; 
        }

       function cps_price(p){//价格格式
            var reg=/^[1-9][0-9]*$/;
            return  reg.test(p);
       }
        function cps_empty(e){//不能为空
            return e.val();
        }
        m_start = {
            elem: '#start_travel_date_setting',
            format: 'YYYY-MM-DD',
            min: laydate.now(), //设定最小日期为当前日期
//        max: '2099-06-16 23:59:59', //最大日期
//            max:laydate.now(),
            istime: false,
            istoday: true,
            choose: function(datas){
                m_end.min = datas; //开始日选好后，重置结束日的最小日期
//                end.start = datas //将结束日的初始值设定为开始日
//                m_time_start = datas ;
                m_min_date = datas ;
            }
        };

        m_end = {
            elem: '#end_travel_date_setting',
            format: 'YYYY-MM-DD',
            min: laydate.now(), //设定最小日期为当前日期
//        max: '2099-06-16 23:59:59', //最大日期
//            max:laydate.now(),
            istime: false,
            istoday: true,
            choose: function(datas){
                m_start.max = datas; //开始日选好后，重置结束日的最小日期
//                end.start = datas //将结束日的初始值设定为开始日
//                m_time_start = datas ;
                m_max_date = datas ;
            }
        };

        laydate(m_end);
        laydate(m_start);
    }) ;
</script>

