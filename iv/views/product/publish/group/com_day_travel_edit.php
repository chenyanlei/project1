<script src="/Public/js/jquery-1.11.3.js"></script>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.all.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<link rel="stylesheet" type="text/css" href="/Public/css/common.css"/>
<link rel="stylesheet" href="/Public/css/img_up.css">
<script src="/Public/js/plupload/plupload.full.min.js"></script>
<script src="/Public/js/layer.js"></script>
<script src="/Public/js/qiniu/qiniu.js"></script>

<style>

    body{
        padding:20px ;
    }
    #com_travels_info_pickfiles_start, #com_travels_info_pickfiles_end {
        width: 150px;
        height: 40px;
        line-height: 40px;
        background: #ccc;
        display:block;
        text-align:center ;
        margin: 10px;
        float: left;
    }

    #com_travels_info_pickfiles_end:hover{
        background: #4c5a5f;
        color: #fff;
    }
    #com_travels_info_pickfiles_start:hover{
        background: #4c5a5f;
        color: #fff;
    }

    .com-travel-info-img {
        width: 300px;
        height: 200px;
        float: left;
        margin: 5px;
    }
</style>
<div>
    <div>
        编辑第<?php echo $cur_edit_index + 1;?>天的行程信息
    </div>
    <div class="diliver_line"></div>

    <div id="travel_detail">
    </div>

    <div id="travel_detail_add">
<!--        <div id="date_num">第--><?php //echo $cur_edit_index + 1;?><!--天</div>-->
        <div class="y-margin-top-20px">
            出发地：
            <input type="text" id="start_name" class="form" placeholder="请输入当天行程的出发地">
        </div>
        <div class="y-margin-top-20px">
            目的地：
            <input type="text" id="end_name" class="form" placeholder="请输入当天行程的目的地">
        </div>
        <div class="y-margin-top-20px">
            <div id="container">
                <a class="btn btn-default btn-lg " id="com_travels_info_pickfiles_start" href="#" >
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>出发地图片上传</span>
                </a>
                <a class="btn btn-default btn-lg " id="com_travels_info_pickfiles_end" href="#" >
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>目的地图片上传</span>
                </a>
            </div>

            <div style="clear:both;"></div>
        </div>
        <div class="y-margin-top-20px">
            行程描述:
            <script id="com_day_travel_introduction" style="min-height:500px;"></script>
        </div>
        <div id="travel_confirm" class="qsc-btn y-margin-top-20px">确定</div>
    </div>
    <div class="diliver_line"></div>
    <div id="travel_add_more" style="display: none" class="qsc-btn y-margin-top-20px">添加更多</div>
</div>

<script>
    var mDayUEditor = null;
    var m_com_travel_info_start_img ="<?php echo $start_img?>";
    var m_com_travel_info_end_img  ="<?php echo $end_img?>";
    var pid = "<?php if(isset($pid)) echo $pid; else echo ""?>";
    var p_type = "<?php if(isset($p_type)) echo $p_type; else echo ""?>";
    var id="<?php echo $id;?>"
    var travel_intro = <?php echo json_encode($travel_intro);?>;

    var layer_index = parent.layer.getFrameIndex(window.name) ;
    var cur_edit_index = <?php echo $cur_edit_index;?> ;

    $("#travel_confirm").click(function(){
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

        var travel_detail = mDayUEditor.getContent() ;
        if(travel_detail == null || travel_detail.length==0) {
            alert("请输入当天的行程信息") ;
            return ;
        }
        console.log(travel_detail) ;
        $.post("/product_edit/commit_day_data",
        {
            'id':id,
            'start_name':start_name,
            'start_img':m_com_travel_info_start_img,
            'end_name':end_name,
            'end_img':m_com_travel_info_end_img,
            'travel_intro':travel_detail
        }, function(data) {
            console.log(data) ;
            var item = parent.$('#travel_detail').children().eq(cur_edit_index) ;
            item.children(".div_title").html(start_name + "-" + end_name);
            item.children(".div_intro").html(travel_detail);

            parent.layer.close(layer_index);

        }) ;
    }) ;

    $("#travel_add_more").click(function(){
        $("#travel_detail_add").show() ;
        $("#travel_add_more").hide();
    }) ;

    $(function(){
        $("#start_name").val("<?php echo $start_name;?>") ;
        $("#end_name").val("<?php echo $end_name;?>") ;

        mDayUEditor = UE.getEditor('com_day_travel_introduction');
        mDayUEditor.addListener("ready", function () {
            // editor准备好之后才可以使用
            mDayUEditor.setContent(travel_intro);
        });

        var uploader1 = Qiniu.uploader({
            runtimes: 'html5,flash,html4',    //上传模式,依次退化
            browse_button: 'com_travels_info_pickfiles_start',       //上传选择的点选按钮，**必需**
            uptoken_url: '/image/get_qiniu_uptoken?pid='+pid + '&p_type=' + p_type,   //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
//        uptoken : 'ZKh3You5caRZRrMK9-iz5iG6y3QjdEdzZNuBMwH3:pgQgH0hBuZfUJgQUm6qyox5DbaU=:eyJzY29wZSI6InFzY3RyaXAiLCJkZWFkbGluZSI6MTQ2MjYxODAzM30=', //若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
//        uptoken:'cT-t2FmJAbM8DBVUHRAxZpI-vHlmxD0A5tXusecA:OUtBZGZVlleq_I7zdynJmWG0aSE=:eyJzY29wZSI6InFzY3RyaXAiLCJkZWFkbGluZSI6MTQ2MzMxNzgyM30=',
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
//                    add_image('http://img.qsctrip.com/' + json_info.key, json_info.id, json_info.attached) ;
                    m_com_travel_info_start_img = json_info.key ;

                    // 每个文件上传成功后,处理相关的事情
                    // 其中 info 是文件上传成功后，服务端返回的json，形式如
                    // {
                    //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                    //    "key": "gogopher.jpg"
                    //  }
                    // 参考http://developer.qiniu.com/docs/v6/api/overview/up/response/simple-response.html
                    // var domain = up.getOption('domain');
                    // var res = parseJSON(info);
                    // var sourceLink = domain + res.key; 获取上传成功后的文件的Url
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

        var uploader2 = Qiniu.uploader({
            runtimes: 'html5,flash,html4',    //上传模式,依次退化
            browse_button: 'com_travels_info_pickfiles_end',       //上传选择的点选按钮，**必需**
            uptoken_url: '/image/get_qiniu_uptoken?pid='+pid + '&p_type=' + p_type,   //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
//        uptoken : 'ZKh3You5caRZRrMK9-iz5iG6y3QjdEdzZNuBMwH3:pgQgH0hBuZfUJgQUm6qyox5DbaU=:eyJzY29wZSI6InFzY3RyaXAiLCJkZWFkbGluZSI6MTQ2MjYxODAzM30=', //若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
//        uptoken:'cT-t2FmJAbM8DBVUHRAxZpI-vHlmxD0A5tXusecA:OUtBZGZVlleq_I7zdynJmWG0aSE=:eyJzY29wZSI6InFzY3RyaXAiLCJkZWFkbGluZSI6MTQ2MzMxNzgyM30=',
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
//                    add_image('http://img.qsctrip.com/' + json_info.key, json_info.id, json_info.attached) ;
                    m_com_travel_info_end_img = json_info.key ;

                    // 每个文件上传成功后,处理相关的事情
                    // 其中 info 是文件上传成功后，服务端返回的json，形式如
                    // {
                    //    "hash": "Fh8xVqod2MQ1mocfI4S4KpRL6D98",
                    //    "key": "gogopher.jpg"
                    //  }
                    // 参考http://developer.qiniu.com/docs/v6/api/overview/up/response/simple-response.html
                    // var domain = up.getOption('domain');
                    // var res = parseJSON(info);
                    // var sourceLink = domain + res.key; 获取上传成功后的文件的Url
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