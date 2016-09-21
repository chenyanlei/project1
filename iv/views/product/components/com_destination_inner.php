<style>
    #province,#city,#county{
        width:120px;
        height:30px;
        margin-right:40px;
        outline:none;      
        border:1px solid #ccc;
    }
</style>
<script src="/Public/js/address.js"  type="text/javascript"></script>
<div class="t1">
    <div class="left f">
        请选择该产品的目的地
    </div>
    <div style="margin-top:20px;margin-bottom:20px;">
        <select name="province" id="province">
        </select>
        <select name="city" id="city">
        </select>
        <select name="county" id="county">
        </select>
    </div>
</div>
<script language="javascript">
    var m_select_province = $('#province').val();
    var m_select_city = $('#city').val();
    var m_select_county = $('#county').val();
    $('body').delegate('#province','change',function () {
        m_select_province = $('#province').val();
        m_select_city = $('#city').val();
        m_select_county = $('#county').val();
    })
    $('body').delegate('#city','change',function () {
        m_select_province = $('#province').val();
        m_select_city = $('#city').val();
        m_select_county = $('#county').val();
    })
    $('body').delegate('#county','change',function () {
        m_select_province = $('#province').val();
        m_select_city = $('#city').val();
        m_select_county = $('#county').val();
    })
    function com_destination_is_validate() {
        if(m_select_province === null || m_select_province === "省份" || m_select_city === "地级市" || m_select_county === "市、县级市、县" ) {
            return false ;
        }else{
            return true ;
        }
    }
    setup()
</script>