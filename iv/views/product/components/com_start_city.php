<style>
    #startcity{
        /*background: #ccc;*/
    }

    .startcity_item{
        float: left;
        width:250px;
        height:36px;
        text-align:center;
        line-height:36px;
        margin-right: 20px;
        margin-bottom:30px;
       border:1px solid #ccc;
        cursor: pointer;
        border-radius:3px;
    }
    .startcity_item:hover{
        background-color: #585858;
        color:#fff;
    }
    .qsc-active{
        background: #4c5a5f;
    }

</style>

<?php
    function set_start_city_active($city1, $cur_city) {
        if($city1 == $cur_city) {
            return 'qsc-active' ;
        }
        return '' ;
    }
?>

<div>
    <div>
        请选择该产品的出发城市（当前仅支持一个出发城市选择）
    </div>

    <div id="startcity" class="y-margin-top-20px">
        <?php if(isset($start_city)) { ?>
            <div class="startcity_item <?php echo set_start_city_active( '北京', $start_city); ?>">北京</div>
            <div class="startcity_item <?php echo set_start_city_active( '上海', $start_city); ?>" class="">上海</div>
            <div class="startcity_item <?php echo set_start_city_active( '广州', $start_city); ?>">广州</div>
            <div class="startcity_item <?php echo set_start_city_active( '深圳', $start_city); ?>">深圳</div>
            <div class="startcity_item <?php echo set_start_city_active( '成都', $start_city); ?>">成都</div>
        <?php } else { ?>
            <div class="startcity_item">北京</div>
            <div class="startcity_item" class="">上海</div>
            <div class="startcity_item">广州</div>
            <div class="startcity_item">深圳</div>
            <div class="startcity_item">成都</div>
        <?php }?>

    </div>
    <div style="clear: both"></div>

 
</div>
<script>
    var m_startcity = '<?php echo isset($start_city)?$start_city:"";?>';
    function com_start_city_get_startcity() {
        return m_startcity;
    }

    function com_start_city_is_validate() {
        if(m_startcity != '') {
            return true;

        }
        return false ;
    }

    $(function() {
        $("#startcity .startcity_item").click(function () {
            $("#startcity .startcity_item").removeClass('qsc-active');
            $(this).addClass('qsc-active');
            m_startcity = $(this).text();
            console.log(m_startcity) ;
        });
    });
</script>
