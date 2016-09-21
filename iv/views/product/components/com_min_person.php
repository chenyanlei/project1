<?php
//地接信息
?>
<div>
    <div>
        请输入最少成团人数
    </div>
    
    <div class="y-margin-top-20px">
        <input id="com_min_person_data" class="form" placeholder="请输入人数" type="number" value="<?php if(isset($min_person)) echo $min_person; else echo '1';?>" min="1" max="20">
    </div>
    
</div>

<script>

    function com_min_person_is_validate() {
        return $("#com_min_person_data").val() > 0 ;
    }

    function com_min_person_get_data() {
        return $("#com_min_person_data").val() ;
    }

</script>
