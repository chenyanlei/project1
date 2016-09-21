<?php
//地接信息
?>
<script src="/Public/js/laydate/laydate.js"></script>
<div>
    <div>
        请选择截止报名日期
    </div>
    <div class="diliver_line"></div>

    <div class="y-margin-top-20px">
        <input id="com_date_select_date" class="laydate-icon" readonly style="height:38px;" >
    </div>

</div>

<script>

    var m_com_date_select_date = "" ;
    function com_date_select_get_date() {
        return m_com_date_select_date ;
    }

    function com_date_select_is_validate() {
        if(m_com_date_select_date.length > 0) {
            return true ;
        }
        return false ;
    }

    $(function(){
        com_date_select_date = {
            elem: '#com_date_select_date',
            format: 'YYYY-MM-DD',
            min: laydate.now(), //设定最小日期为当前日期
//        max: '2099-06-16 23:59:59', //最大日期
//            max:laydate.now(),
            istime: false,
            istoday: true,
            choose: function(datas){
                m_com_date_select_date = datas ;
            }
        };
        laydate(com_date_select_date);
    })

</script>
