<style>
</style>
<script src="/Public/js/plupload/plupload.full.min.js"></script>
<script src="/Public/js/layer.js"></script>
<script src="/Public/js/qiniu/qiniu.js"></script>
<link rel="stylesheet" href="/Public/css/img_up.css">
<div class="col-sm-12" style="border:solid #cccccc 1px;height:auto;">
    <ul id="div_upload">
        <div style="margin-top:20px">
            <div id="container">
                <a id="pickfiles" href="#">选择文件</a>
            </div>
            <div style="clear: both"></div>
            <div id="uploaded">

            </div>
        </div>
    </ul>
</div>

<script>
    var p_type = <?php echo $p_type ; ?> ;
    var pid = <?php echo $pid ;?> ;
    var index = '';
    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',    //上传模式,依次退化
        browse_button: 'pickfiles',       //上传选择的点选按钮，**必需**
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
                index = layer.load(1,{offset:['200px','800px'],shade: [0.4, '#393D49']});
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
                com_img_upload.add_image('http://img.qsctrip.com/' + json_info.key, json_info.id, json_info.attached) ;

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
                console.log('UploadComplete') ;
                console.log(up) ;
                console.log(err) ;
                console.log(errTip) ;
            },
            'UploadComplete': function() {
                //队列文件处理完毕后,处理相关的事情
                console.log('UploadComplete') ;
                layer.close(index);
                
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

    $('#uploaded').delegate('.qsc-upload-setface','click',function(){
        com_img_upload.remove_img($(this)) ;
    }) ;

    var com_img_upload = {
        com_img_upload_img_ids:new Array(),
        get_com_img_upload_img_ids:function() {
            return this.com_img_upload_img_ids ;
        } ,
        remove_img: function(item) {
            var id= item.prev().attr('id');
            console.log('id' + id) ;
            item.parent().remove();
            this.com_img_upload_img_ids.remove(id) ;
            $("#array_pic").val(JSON.stringify(this.com_img_upload_img_ids)) ;
        } ,
        add_image : function(img_url,id, attached) {
            // 默认设置第一张图片为封面
            var uploaded = document.getElementById('#uploaded') ;
            console.log(uploaded) ;
            if(uploaded == null) {
                $("#face_img").val(img_url) ;
            }

            var div= document.createElement('li') ;
            $('#uploaded').append(div) ;
            div.className='list';

            var img = document.createElement('img') ;
            img.setAttribute("src", img_url) ;
            img.setAttribute("id", id) ;
            img.className='qsc-upload-img' ;
            div.appendChild(img) ;
            var div_bottom = document.createElement('div') ;
            div_bottom.innerHTML = '删除图片';
            div_bottom.className = 'qsc-upload-setface' ;
            div.appendChild(div_bottom) ;

            var div_clear = document.createElement('div') ;
            div_clear.className = 'clear' ;
            div.appendChild(div_clear) ;

            if(!attached) {
                this.com_img_upload_img_ids.push(id) ;
                $("#array_pic").val(JSON.stringify(this.com_img_upload_img_ids)) ;
            }
        }
    } ;

//    var com_img_upload_img_ids = new Array() ;
//    function remove_img(item) {
//        var id= item.prev().attr('id');
//        console.log('id' + id) ;
//        item.parent().remove();
//        com_img_upload_img_ids.remove(id) ;
//        $("#array_pic").val(JSON.stringify(com_img_upload_img_ids)) ;
//    }

//    function add_image(img_url,id, attached) {
//        // 默认设置第一张图片为封面
//        var uploaded = document.getElementById('#uploaded') ;
//        console.log(uploaded) ;
//        if(uploaded == null) {
//            $("#face_img").val(img_url) ;
//        }
//
//        var div= document.createElement('li') ;
//        $('#uploaded').append(div) ;
//        div.className='list';
//
//        var img = document.createElement('img') ;
//        img.setAttribute("src", img_url) ;
//        img.setAttribute("id", id) ;
//        img.className='qsc-upload-img' ;
//        div.appendChild(img) ;
//        var div_bottom = document.createElement('div') ;
//        div_bottom.innerHTML = '删除图片';
//        div_bottom.className = 'qsc-upload-setface' ;
//        div.appendChild(div_bottom) ;
//
//        var div_clear = document.createElement('div') ;
//        div_clear.className = 'clear' ;
//        div.appendChild(div_clear) ;
//
//
//        if(!attached) {
//            com_img_upload_img_ids.push(img_url) ;
//            $("#array_pic").val(JSON.stringify(com_img_upload_img_ids)) ;
//        }
//    }

</script>