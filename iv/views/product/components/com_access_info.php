<?php
//地接信息
?>
<div>
    <div>
        请输入地接信息
    </div>
    <div class="diliver_line"></div>


    <div class="y-margin-top-20px">
        <textarea id="com_access_info_text" class="form" placeholder="请输入名称" type="textarea" rows="5" cols="120"></textarea>
    </div>
    <div class="diliver_line"></div>
</div>

<script>

    function com_access_info_get_text() {
        return $("#com_access_info_text").val() ;
    }

    function com_access_info_is_validate() {
        return $("#com_access_info_text").val().length > 0 ;
    }
</script>
