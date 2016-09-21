<?php
//语言服务
function com_lang_service_checked($lang, $cur_lang) {
    if($lang == $cur_lang){
        return "checked" ;
    }
    return "";
}

?>
<div>
    <div>请选择该产品能够提供的语言服务</div>
    

    <div id="com_lang_service_container" class="y-margin-top-20px">
        <?php
        if(isset($lang)) { ?>
            <div class="radio">
                <label>
                    <input type="radio" <?php echo com_lang_service_checked(1, $lang);?> name="lang" value="1" />  能够提供中文服务
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" <?php echo com_lang_service_checked(2, $lang);?> name="lang" value="2" /> 提供英文服务
                </label>
            </div>
            <div class="radio">
                <label id="onther">
                    <input type="radio" <?php echo com_lang_service_checked(3, $lang);?> name="lang" value="3"/> 仅提供本地语言服务
                </label>
            </div>
            <input type="text" name="otherlang" value="" style="display:none" id="otherlang" disabled="disabled">
        <?php } else { ?>
            <div class="radio">
                <label>
                    <input type="radio" checked="checked" name="lang" value="1" />  能够提供中文服务
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="lang" value="2" /> 提供英文服务
                </label>
            </div>
            <div class="radio">
                <label id="onther">
                    <input type="radio" name="lang" value="3"/> 仅提供本地语言服务
                </label>
            </div>
            <input type="text" name="otherlang" value="" style="display:none" id="otherlang" disabled="disabled">
        <?php } ?>
    </div>
   
</div>

<script>
    function com_lang_service_get_lang_service(){
        return $("#com_lang_service_container input[type='radio']:checked").val();
    }

    function com_lang_service_is_validate() {
        return true ;
    }

</script>