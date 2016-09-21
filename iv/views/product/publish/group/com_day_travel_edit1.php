<?php
//旅程描述
?>
<script src="/Public/js/jquery-1.11.3.js"></script>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.all.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->

<link rel="stylesheet" href="/Public/css/img_up.css">
<script src="/Public/js/plupload/plupload.full.min.js"></script>
<script src="/Public/js/layer.js"></script>
<script src="/Public/js/qiniu/qiniu.js"></script>

<style>
    #com_day_edit_travel_pickfiles_start, #com_day_edit_travel_pickfiles_end {
        width: 150px;
        height: 40px;
        line-height: 40px;
        background: #ccc;
        display:block;
        text-align:center ;
        margin: 10px;
        float: left;
    }

    #com_day_edit_travel_pickfiles_end:hover{
        background: #4c5a5f;
        color: #fff;
    }
    #com_day_edit_travel_pickfiles_start:hover{
        background: #4c5a5f;
        color: #fff;
    }

</style>
<div>
    <div>
        编辑一天的行程信息
    </div>
    <div class="diliver_line"></div>

    <div id="com_day_travel__detail">
    </div>

    <div id="com_day_travel_detail_add">
        <div class="y-margin-top-20px">
            出发地：
            <input type="text" id="com_day_travel_start_name" class="form" placeholder="请输入当天行程的出发地">
        </div>
        <div class="y-margin-top-20px">
            目的地：
            <input type="text" id="com_day_travel_end_name" class="form" placeholder="请输入当天行程的目的地">
        </div>
        <div class="y-margin-top-20px">
            <div id="com_day_edit_travel_pickfiles_start">出发地图片上传</div>
            <div id="com_day_edit_travel_pickfiles_end">目的地图片上传</div>
            <div style="clear:both;"></div>
        </div>
        <div class="y-margin-top-20px">
            行程描述:
            <script id="com_day_travel_intro" style="min-height:500px;"></script>
        </div>
        <div id="com_day_travel_confirm" class="qsc-btn y-margin-top-20px">确定</div>
    </div>
</div>

<script>
    var pid="<?php echo $pid;?>" ;
    var p_type="<?php echo $p_type;?>" ;
    var m_com_day_travel_UEditor = null;
    var m_com_day_travel_edit_start_img ='';
    var m_com_day_travel_edit_end_img  ='';
    var m_com_day_travel_id = "<?php echo $id;?>";

    $("#com_day_travel_confirm").click(function(){
        var start_name = $("#start_name").val() ;
        if(start_name == null || start_name.length==0) {
            alert("请输入起点名称") ;
            return ;
        }

        var end_name = $("#end_name").val() ;
        if(end_name == null || end_name.length==0) {
            alert("请输入目的地名称") ;
            return ;
        }

        var travel_detail = m_com_day_travel_UEditor.getContent() ;
        if(travel_detail == null || travel_detail.length==0) {
            alert("请输入当天的行程信息") ;
            return ;
        }
    }) ;

    $(function(){
        m_com_day_travel_UEditor = UE.getEditor('com_day_travel_intro');
        m_com_day_travel_UEditor.addListener("ready", function () {
            // editor准备好之后才可以使用
            m_com_day_travel_UEditor.setContent("<span style=\"color:#ccc\">【详细行程】<br/> ... ... <br /><br />【景点介绍】<br/> ... ...</span>");
        });

    var uploader1= Qiniu.uploader({
            runtimes: 'html5,flash,html4',    //上传模式,依次退化
            browse_button: 'com_day_edit_travel_pickfiles_start',       //上传选择的点选按钮，**必需**
            uptoken_url: '/image/get_qiniu_uptoken?pid='+pid + '&p_type=' + p_type,   //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
            unique_names: false, // 默认 false，key为文件名。若开启该选项，SDK为自动生成上传成功后的key（文件名）。
            save_key: false,   // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK会忽略对key的处理
            domain: 'http://qiniu-plupload.qiniudn.com/',   //bucket 域名，下载资源时用到，**必需**
            get_new_uptoken: true,  //设置上传文件的时候是否每次都重新获取新的token
            container: 'container',           //上传区域DOM ID，默认是browser_button的父元素，
            max_file_size: '100mb',           //最大文件体积限制
            flash_swf_url: 'js/plupload/Moxie.swf',  //引入flash,相对路径
            max_retries: 3,                   //上传失败最大重试次数
            dragdrop: true,                   //开启可拖曳上传
            drop_element: 'container',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
            chunk_size: '4mb',                //分块上传时，每片的体积
            auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
            init: {
                'FilesAdded': function(up, files) {
                    plupload.each(files, function(file) {
                        // 文件添加进队列后,处理相关的事情
                    });
                },
                'BeforeUpload': function(up, file) {
                    // 每个文件上传前,处理相关的事情
                    console.log('BeforeUpload') ;
                },
                'UploadProgress': function(up, file) {
                    // 每个文件上传时,处理相关的事情
                    console.log('UploadProgress' ) ;
                    console.log(up) ;
                    console.log(file) ;
                },
                'FileUploaded': function(up, file, info) {
                    console.log('FileUploaded') ;
                    console.log(info) ;
                    var json_info = JSON.parse(info) ;
                    m_com_travel_info_start_img = json_info.key ;
                },
                'Error': function(up, err, errTip) {
                    //上传出错时,处理相关的事情
                },
                'UploadComplete': function() {
                    //队列文件处理完毕后,处理相关的事情
                    console.log('UploadComplete') ;

                },
                'Key': function(up, file) {
                    // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                    // 该配置必须要在 unique_names: false , save_key: false 时才生效
                    var key = "";
                    $.ajax({
                        type:'get',
                        url:'/upload/get_upload_key?',
                        async:false,
                        success:function(data){
                            console.log(data) ;
                            key = data['content']['key'];
                        }
                    }) ;

                    // do something with key here
                    return key + '_' + file.name ;
                }
            }
        });

    var uploader2= Qiniu.uploader({
            runtimes: 'html5,flash,html4',    //上传模式,依次退化
            browse_button: 'com_day_edit_travel_pickfiles_end',       //上传选择的点选按钮，**必需**
            uptoken_url: '/image/get_qiniu_uptoken?pid='+pid + '&p_type=' + p_type,   //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
            unique_names: false, // 默认 false，key为文件名。若开启该选项，SDK为自动生成上传成功后的key（文件名）。
            save_key: false,   // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK会忽略对key的处理
            domain: 'http://qiniu-plupload.qiniudn.com/',   //bucket 域名，下载资源时用到，**必需**
            get_new_uptoken: true,  //设置上传文件的时候是否每次都重新获取新的token
            container: 'container',           //上传区域DOM ID，默认是browser_button的父元素，
            max_file_size: '100mb',           //最大文件体积限制
            flash_swf_url: 'js/plupload/Moxie.swf',  //引入flash,相对路径
            max_retries: 3,                   //上传失败最大重试次数
            dragdrop: true,                   //开启可拖曳上传
            drop_element: 'container',        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
            chunk_size: '4mb',                //分块上传时，每片的体积
            auto_start: true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
            init: {
                'FilesAdded': function(up, files) {
                    plupload.each(files, function(file) {
                        // 文件添加进队列后,处理相关的事情
                    });
                },
                'BeforeUpload': function(up, file) {
                    // 每个文件上传前,处理相关的事情
                    console.log('BeforeUpload') ;
                },
                'UploadProgress': function(up, file) {
                    // 每个文件上传时,处理相关的事情
                    console.log('UploadProgress' ) ;
                    console.log(up) ;
                    console.log(file) ;
                },
                'FileUploaded': function(up, file, info) {
                    console.log('FileUploaded') ;
                    console.log(info) ;
                    var json_info = JSON.parse(info) ;
                    m_com_travel_info_end_img = json_info.key ;
                },
                'Error': function(up, err, errTip) {
                    //上传出错时,处理相关的事情
                },
                'UploadComplete': function() {
                    //队列文件处理完毕后,处理相关的事情
                    console.log('UploadComplete') ;

                },
                'Key': function(up, file) {
                    // 若想在前端对每个文件的key进行个性化处理，可以配置该函数
                    // 该配置必须要在 unique_names: false , save_key: false 时才生效
                    var key = "";
                    $.ajax({
                        type:'get',
                        url:'/upload/get_upload_key?',
                        async:false,
                        success:function(data){
                            console.log(data) ;
                            key = data['content']['key'];
                        }
                    }) ;

                    // do something with key here
                    return key + '_' + file.name ;
                }
            }
        });
    }) ;

</script>
