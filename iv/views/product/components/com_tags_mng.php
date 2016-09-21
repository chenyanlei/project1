
<div class="col-sm-10">
    <div id="slt_tags">
    </div>
    <div class="pre_tags">
        <ul id="pre_tags">
            <?php
            if(isset($tagname) && strlen($tagname) > 0) {
                $tags = json_decode($tagname, true) ;
                foreach($tags as $tag_item) { ?>
                    <li class="tag_selected"><?php echo $tag_item?></li>
                <?php }
            } ?>
        </ul>
        <div class="form-group form-horizontal" style="clear:both">
            <div class="col-sm-6">
                <input id="customer_tag_id" type="text" name="customer_tag" class="form-control" placeholder="自定义标签" />
            </div>
            <div class="col-sm-2">
                <input onclick="add_customer_tag()" type="button" name="customer_tag" class="btn btn-default" value="添加" />
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
</div>
<script type="text/javascript" src='/Public/js/qsctag.js'></script>
<link rel="stylesheet" type="text/css" href="/Public/css/qsctag.css">
<script>
    var ary_added_tags = new Array();
    var com_tags_mng_selected = new Array() ;

    var init_tags = "<?php if(isset($tagname)) echo $tagname; else echo '' ; ?>";
    if(init_tags != null && init_tags.length > 0) {
        var tags_obj = JSON.parse(init_tags) ;
        for(var i=0;i<tags_obj.length;i++) {
            com_tags_mng_selected.push(tags_obj[i]) ;
        }
    }

    ary_added_tags.push('test') ;
    ary_added_tags.push('hello') ;
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
</script>