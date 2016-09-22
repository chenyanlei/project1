<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>七牛云存储 - JavaScript SDK 测试</title>
    <link rel="stylesheet" href="/public/js/jquery-1.9.0.min.js">
    <link rel="stylesheet" href="/public/js/bootstrap.min.css">

<!--    <script src="/public/js/plupload/moxie.js"></script>-->
<!--    <script src="/public/js/plupload/plupload.dev.js"></script>-->

    <script src="/public/js/plupload/plupload.full.min.js"></script>
    <script src="/public/js/qiniu/qiniu.js"></script>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">七牛云存储 - JavaScript SDK</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">上传示例</a></li>
                <li><a href="http://developer.qiniu.com/code/v6/sdk/javascript.html">SDK 文档</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="padding-top: 60px;">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#demo" id="demo-tab" role="tab" data-toggle="tab" aria-controls="demo" aria-expanded="true">示例</a>
        </li>
        <li role="presentation">
            <a href="#code" id="code-tab" role="tab" data-toggle="tab" aria-controls="code">代码</a>
        </li>
        <li role="presentation">
            <a href="#log" id="log-tab" role="tab" data-toggle="tab" aria-controls="log">日志</a>
        </li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="demo" aria-labelledby="demo-tab">

            <div class="row" style="margin-top: 20px;">
                <input type="hidden" id="domain" value="<%= domain %>">
                <input type="hidden" id="uptoken_url" value="<%= uptoken_url %>">
                <ul class="tip col-md-12 text-mute">
                    <li>
                        <small>
                            JavaScript SDK 基于 Plupload 开发，可以通过 Html5 或 Flash 等模式上传文件至七牛云存储。
                        </small>
                    </li>
                    <li>
                        <small>临时上传的空间不定时清空，请勿保存重要文件。</small>
                    </li>
                    <li>
                        <small>Html5模式大于4M文件采用分块上传。</small>
                    </li>
                    <li>
                        <small>上传图片可查看处理效果。</small>
                    </li>
                    <li>
                        <small>本示例限制最大上传文件100M。</small>
                    </li>
                </ul>
                <div class="col-md-12">
                    <div id="container">
                        <a class="btn btn-default btn-lg " id="pickfiles" href="#" >
                            <span>选择文件</span>
                        </a>
                    </div>
                </div>
                <div style="display:none" id="success" class="col-md-12">
                    <div class="alert-success">
                        队列全部文件处理完毕
                    </div>
                </div>
                <div class="col-md-12 ">
                    <table class="table table-striped table-hover text-left"   style="margin-top:40px;display:none">
                        <thead>
                        <tr>
                            <th class="col-md-4">Filename</th>
                            <th class="col-md-2">Size</th>
                            <th class="col-md-6">Detail</th>
                        </tr>
                        </thead>
                        <tbody id="fsUploadProgress">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




</body>
</html>

<script>
    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',    //上传模式,依次退化
        browse_button: 'pickfiles',       //上传选择的点选按钮，**必需**
        //                        uptoken_url: '/token',            //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
        uptoken : 'ZKh3You5caRZRrMK9-iz5iG6y3QjdEdzZNuBMwH3:5m9qCoifqtR-RBUfqbed_cWcyss=:eyJzY29wZSI6InFzY3RyaXAiLCJkZWFkbGluZSI6MTQ2MzMxMTMzNn0=', //若未指定uptoken_url,则必须指定 uptoken ,uptoken由其他程序生成
         unique_names: true, // 默认 false，key为文件名。若开启该选项，SDK为自动生成上传成功后的key（文件名）。
        // save_key: true,   // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK会忽略对key的处理
        domain: 'http://qiniu-plupload.qiniudn.com/',   //bucket 域名，下载资源时用到，**必需**
        get_new_uptoken: false,  //设置上传文件的时候是否每次都重新获取新的token
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
            },
            'FileUploaded': function(up, file, info) {
                console.log('FileUploaded') ;

//                console.log(file) ;
                console.log(info) ;
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
                // do something with key here
                return key
            }
        }
    });

    // domain 为七牛空间（bucket)对应的域名，选择某个空间后，可通过"空间设置->基本设置->域名设置"查看获取

    // uploader 为一个plupload对象，继承了所有plupload的方法，参考http://plupload.com/docs
</script>