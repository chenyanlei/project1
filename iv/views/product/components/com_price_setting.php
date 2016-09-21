<?php
//价格设置
?>
<script src="/Public/js/laydate/laydate.js"></script>
<style>
    .pri_item{
        float:left
    }

    .icon_momey{
        width:34px;
        height:34px;
        background:#cccccc url(/Public/images/icon_01.png) no-repeat center center;
        float: left;
        color: #585858;
    }
    .input_pri{
       float: left;
       height: 30px;
       width: 156px;
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
        margin-bottom: 15px;
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
        padding-bottom: 10px;
    }
    #start_travel_date_setting {
        float: left;
        width:178px;
    }
    .sale_on{
        color:#585858;
        font-size:14px;
        margin-bottom:20px;
    }
    .cps_clear{
        overflow:hidden;
        margin-bottom: 5px;
        padding: 10px 10px;
        background-color: #f1f1f1;
    }
    .cps_info{
        float: left;
        height: 30px;
        line-height: 30px;
    }
    .cps_delete{
        float: right;
        background-color: #6ab1cf;
        cursor: pointer;
        height: 30px;
        width: 60px;
        line-height: 30px;
        text-align: center;
        color: #fff;
        border-radius: 4px;
        font-size: 14px;
    }
    #start_travel_date_list_null{
        color: #999;
    }
   .m_cur_date,.s_p,.a_p{
        display: inline-block;
        margin-right: 100px;s
   }
   .add_title_p{
        padding: 20px 0;
   }
   #div_add_start_travel_confirm{
        width: 100px;
        background-color: #00cb2a;
        color:#fff;
        cursor: pointer;

   }
   .qsc-btn{
        float: left;
        margin-right: 40px;
   }
   .btn_next {
        margin-top:20px;
   }
</style>
<div>
    <div id="start_travel_date_list">
    <div id="start_travel_date_list_null">暂时没有价格设置</div>
        <?php
        if(isset($com_price_data)) {
        foreach($com_price_data as $price_item) { ?>
            <div class="cps_clear">
                <div class="cps_info">
                    <span class="m_cur_date"><?php echo date('Y-m-d', $price_item['calendar_from']) ;?>
                        同行价: <?php echo $price_item['price1'] ;?>
                        建议零售价:<?php echo $price_item['price2'] ;?>
                </div>
                <div class="cps_delete">删除</div>
            </div>
        <?php }
        }
        ?>
    </div>
    <div class="add_title_p">添加日期和时间</div>
    <div style="padding: 30px; border:solid 1px #ccc">
        <div id="start_travel_date">
            <div style="overflow:hidden">
                <div style="float:left;">
                    <div class="start_travel_date_title">发团日期</div>
                    <input id="start_travel_date_setting" class="laydate-icon" readonly style="height:38px;"/>
                </div>
            </div>
        </div>
        <div style="overflow:hidden;margin-top:30px;">
            <div class="pri_item" style="margin-right:30px;">
                <div class="sale_on">同行销售价</div>
                <div class="pri_on">
                    <span class="icon_momey"></span>
                    <input type="text" name="same_price" class="input_pri" id="same_price" placeholder="人民币">
                </div>
            </div>
            <div class="pri_item">
                <div class="sale_on">建议零售价</div>
                <div class="pri_on">
                    <span class="icon_momey"></span>
                    <input type="text" name="advise_price" class="input_pri" id="advise_price" placeholder="人民币">
                </div>
            </div>
        </div>
        <div style="clear: both"></div>
    </div>
    <div id="div_add_start_travel_confirm" class="qsc-btn" style="margin-top:20px">添加</div>
</div>


<script>

    var m_cur_date = '' ;
    var m_arr_prices = new Array() ;
    var m_date_arr= new Array() ;

    function com_price_setting_get_prices() {
        arr = new Array() ;
        for(var index=0;index<m_arr_prices.length;index++) {
            arr.push(JSON.stringify(m_arr_prices[index]));
        }
        return arr ;
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

        $('#div_add_start_travel_confirm').click(function() {
            $("#start_travel_date_list_null").hide() ;
            var start_travel_date_setting=$("#start_travel_date_setting").val();
            var same_price=$("#same_price");
            var advise_price=$("#advise_price");
            var one_day = new Object() ;
            one_day.start_date = m_cur_date ;
            one_day.price1 = same_price.val() ;
            one_day.price2 = advise_price.val() ;

            if (start_travel_date_setting=="") {
                confirm("日期不能为空")
            }

            else if(same_price.val()==""){
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
                var div='<div class="cps_clear"><div class="cps_info"><span class="m_cur_date">'+m_cur_date+'</span><span class="s_p">同行价:'+one_day.price1+'</span><span class="a_p">建议零售价:'+one_day.price2+'</span> </div><div class="cps_delete">删除</div></div>'
                $('#start_travel_date_list').append(div) ;
                m_arr_prices.push(one_day) ;
                m_date_arr.push(start_travel_date_setting) ;
                //清除日期插件时间
                $("#start_travel_date_setting").val("");
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
        var start = {
            elem: '#start_travel_date_setting',
            format: 'YYYY-MM-DD',
            min: laydate.now(), //设定最小日期为当前日期
//        max: '2099-06-16 23:59:59', //最大日期
//            max:laydate.now(),
            istime: false,
            istoday: true,
            choose: function(datas){
//                end.min = datas; //开始日选好后，重置结束日的最小日期
//                end.start = datas //将结束日的初始值设定为开始日
//                m_time_start = datas ;
                m_cur_date = datas ;
            }
        };

        laydate(start);
    }) ;
</script>

