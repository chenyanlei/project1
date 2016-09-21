<style>
    ul {
        display: block;
        list-style-type: disc;
        /*-webkit-margin-before: 1em;*/
        /*-webkit-margin-after: 1em;*/
        /*-webkit-margin-start: 0px;*/
        /*-
        webkit-margin-end: 0px;*/
        /*-webkit-padding-start: 0px;*/
    }
    #pre_tags li{
        cursor: pointer;
    }
    #pre_tags li:hover{
        background-color: #585858 !important;
        color:#fff;
    }
    #pre_tags:after{
        content: '';
        display: block;
        clear:both;
    }
    .self_inp:after{
        content: '';
        display: block;
        clear:both;
    }
    .tag_selected{
        background-color:#585858 !important; 
        color:#fff;
    }
</style>
<div >
    <div style="margin-bottom: 20px">
        请选择该产品的主题类别
    </div>
    <div id="slt_tags">
    </div>
    <div class="pre_tags">
        <div id="pre_tags">
            <?php
            if(isset($com_tags_mng_data) && strlen($com_tags_mng_data) > 0) {
                $tags = json_decode($com_tags_mng_data, true) ;
                foreach($tags as $tag_item) { ?>
                    <div class="qsctag_item tag_selected"><?php echo $tag_item?></div>
                <?php }
            } ?>
        </div>
        <div class="self_inp" >
            <div style="float:left;margin-right:10px;">
                <input id="customer_tag_id" type="text" name="customer_tag" class=" form"  
             placeholder="自定义标签" />
            </div>  
            <div onclick="add_customer_tag()" name="customer_tag" class="qsc-btn" 
            style="float:left;margin-top:2px;">添加</div>
        </div>
        <div style="clear:both"></div>
    </div>
</div>
<script type="text/javascript" src='/Public/js/qsctag.js'></script>
<link rel="stylesheet" type="text/css" href="/Public/css/qsctag.css">
<script>
    var ary_added_tags = new Array();
    var com_tags_mng_selected = new Array() ;

    function com_tags_mng_get_selected_tags(){
        return com_tags_mng_selected;
    }

    function com_tags_mng_is_validate() {
        return com_tags_mng_selected.length>0 ;
    }

    $(function(){
        var init_tags = '<?php if(isset($com_tags_mng_data)) echo $com_tags_mng_data; else echo '' ; ?>';
        if(init_tags != null && init_tags.length > 0) {
            var tags_obj = JSON.parse(init_tags) ;
            for(var i=0;i<tags_obj.length;i++) {
                com_tags_mng_selected.push(tags_obj[i]) ;
            }
        }

//        console.log("com_tags_mng") ;

        ary_added_tags.push('海外婚礼') ;
        ary_added_tags.push('运动乐活') ;
        ary_added_tags.push('亲子优选') ;
        ary_added_tags.push('环球自驾') ;
        ary_added_tags.push('探索野奢') ;
        ary_added_tags.push('健康悦活') ;
        ary_added_tags.push('顶级蜜月') ;
        var container = $("#pre_tags") ;
        var params = {
            container:container,
            ary_added_tags:ary_added_tags,
            onTagSelect:function(tag_name){
                console.log("onTagSelect:" + tag_name) ;
                com_tags_mng_selected.push(tag_name) ;
                $("#tag_name").val(JSON.stringify(com_tags_mng_selected)) ;
            },
            onTagSelectCancel:function(tag_name) {
                console.log("onTagSelectCancel:" + tag_name) ;
                com_tags_mng_selected.remove(tag_name) ;
                $("#tag_name").val(JSON.stringify(com_tags_mng_selected)) ;
            }
        } ;
        QSCtagBox = $.extend(QSCtagBox, params) ;
        QSCtagBox.init() ;
    }) ;


</script>