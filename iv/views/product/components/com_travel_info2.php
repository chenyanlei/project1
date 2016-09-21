<?php
//旅程描述
?>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.all.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/lang/zh-cn/zh-cn.js"></script>

<div>
    <div>
        请添加行程信息
    </div>
  
    <div id="travel_detail_add">
        <div class="y-margin-top-20px">
            <script id="com_travel_introduction" style="min-height:500px;"></script>
        </div>
    </div>
    <div class="diliver_line"></div>
</div>

<script>
    var m_arr_days_travel = new Array() ;
    var mUEditor = null;
    function com_travel_info_get_days_travel() {
        arr = new Array() ;
        arr.push(mUEditor.getContent());
        return arr ;
    }

    function com_travel_info_is_validate() {
        return mUEditor.getContent().length>0 ;
    }


    $(function(){
        mUEditor = UE.getEditor('com_travel_introduction');
        mUEditor.addListener("ready", function () {
            // editor准备好之后才可以使用
            mUEditor.setContent("<span style=\"color:#ccc\">【详细行程】<br/> ... ... <br /><br />【景点介绍】<br/> ... ...</span>");

        });
    }) ;


</script>
