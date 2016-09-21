<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.all.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/third_party/ueditor/lang/zh-cn/zh-cn.js"></script>

<script src="/Public/js/plupload/plupload.full.min.js"></script>
<script src="/Public/js/qiniu/qiniu.js"></script>
<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<style>
    body,html{
            font-size: 14px;
            font-family:"Microsoft YaHei";
            height: 100%;
            background-color: #f5f5f5;
        }
    .myShare-main{
        width: 1140px;
        margin:0 auto;
    }
    .title {
        font-size: 16px;
        font-weight: bold;
    }

    .destination {
        margin-top: 20px;
    }

    .validate {
        margin-top: 20px;
    }


    ul {
        display: block;
        list-style-type: disc;
        /*-webkit-margin-before: 1em;*/
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        -webkit-padding-start: 0px;
    }

    .list{
        position: relative;
        float: left;
        list-style:none;
        margin-left:60px;
        margin-bottom:20px
    }

    #uploaded {
        margin-top: 20px;
        margin-left:-60px;
        margin-bottom:20px
    }

    #pickfiles {
        background: #00cb2a;
        color: #ffffff;
        width: 150px;
        height: 50px;
        line-height: 50px;
        border: none;
        display: block;
        text-align: center;
        text-decoration: none;
    }

    .zui-upload-img {
        width: 200px;
        height: 114px;
    }

    .zui-upload-setface {
        padding-top: 4px;
        width: 200px;
        height: 24px;
        text-align: center;
        background: #000000;
        opacity: 0.6;
        font-size: 16px;
        color: #ffffff;
        position: absolute;
        bottom: 0px;
    }

    .zui-upload-setface:hover {
        opacity: 1.0;
    }
    .clear{
        clear:both
    }
    .control-label{
        margin-left:20px
    }
</style>
<div class="myShare-main">
<div class="col-sm-12" style="margin-top: 50px;padding-bottom:300px;background-color:#fff">
    <div class="col-sm-12" style="margin-top: 50px">
        <label class="col-sm-1 control-label" style="text-align: left" for="travel_introduction">标题</label>
        <div class="col-sm-10">
            <textarea rows="2" type="text"  class="form-control col-sm-12" placeholder="在这里输入一个吸引人的标题" id="ta_title" ></textarea>
        </div>
    </div>

    <div class="col-sm-12" style="margin-top: 50px;">
        <label class="col-sm-1 control-label" style="text-align: left">封面</label>
        <div class="col-sm-10">
            <div class="col-sm-12" style="border:solid #cccccc 1px;height:auto;">
                <ul id="div_upload">
                    <div style="margin-top:20px">
                        <div id="container">
                            <a id="pickfiles" href="#">上传图片</a>
                        </div>
                        <div style="clear: both"></div>
                        <div id="uploaded">
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-12" style="margin-top: 50px">
        <label class="col-sm-1 control-label" style="text-align: left" for="travel_introduction">推广描述</label>
        <div class="col-sm-10">
            <script id="travel_introduction" name="travel_intro" style="min-height:500px;"></script>
        </div>
    </div>

    <div class="col-sm-12" style="margin-top: 50px;margin-bottom: 50px">
        <?php

        require_once 'libraries/commen_user.php' ;
        $sale=get_sale_price($p_detail['display_prices']);
        $same=get_same_price($p_detail['display_prices']);

        ?>
        <label class="col-sm-1 control-label" style="text-align: left" for="travel_introduction">推荐产品</label>
        <div class="col-sm-10">
            <div style="float: left"><img width="200" height="150" src="<?php echo $p_detail['face_img'] ;?>"></div>
            <div style="float: left; margin-left: 20px">
                <div class="title">
                    <a href="/product/product_detail?pid=<?php echo $p_detail['id'] ;?>&p_type=<?php echo $p_detail['p_type'] ;?>"><?php echo $p_detail['title'] ;?></a>
                </div>
                <div class="destination">
                    目的地：<?php echo $p_detail['continent'].'  '.$p_detail['country'] ;?>
                </div>
                <div class="validate">
                   价格: ￥<?php
                    if($agent){
                        echo $same;
                    }else {
                        echo $sale;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <label class="col-sm-1 control-label"></label>
        <div class="col-sm-10" style="margin-top: 50px; margin-bottom: 50px">
            <a class="btn btn-default" onclick="click_preview()">预览</a>
            <a class="btn btn-primary" onclick="click_upload()">提交</a>
        </div>

    </div>
</div>
</div>
<div class="clear"></div>
<script>


    function click_preview() {

    }

    var m_id= "<?=$id;?>";
    var m_face_img = "<?=$face_img;?>";
    var m_pid = "<?php echo $p_detail['id'] ;?>" ;
    var m_mid = "<?php echo $mid ;?>" ;
    var m_p_type = "<?php echo $p_detail['p_type'] ;?>" ;


    function click_upload() {
        console.log('click_upload 1') ;
        $content = UE.getEditor('travel_introduction').getContent() ;
        $title = $('#ta_title').val();
//        console.log($content) ;
//        console.log($title) ;
//        console.log(m_face_img) ;
//        console.log(m_pid) ;

        console.log('click_upload 2') ;

        $.post('/product_spread/modify',
            {
                'id':m_id,
                'face_img':m_face_img,
                'title': $title,
                'pid':m_pid,
                'mid':m_mid,
                'content':$content,
                'p_type':m_p_type
            }, function(data){
                console.log(data) ;
            }
        ) ;
    }

    $(document).ready(function() {
        ueditor = UE.getEditor('travel_introduction');
        ueditor.addListener("ready", function () {
            // editor准备好之后才可以使用
            ueditor.setContent(<?php echo json_encode($content);?>) ;
        });

        $("#ta_title").html("<?=$title;?>") ;

        if(m_face_img != ''){
            add_image("http://img.qsctrip.com/" + m_face_img, m_pid, true) ;
        }

    }) ;

    var uploader = Qiniu.uploader({
        runtimes: 'html5,flash,html4',    //上传模式,依次退化
        browse_button: 'pickfiles',       //上传选择的点选按钮，**必需**
        uptoken_url: '/image/get_general_qiniu_uptoken',   //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）
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
                add_image('http://img.qsctrip.com/' + json_info.key, json_info.id, json_info.attached) ;

                m_face_img = json_info.key ;
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

    $('#uploaded').delegate('.zui-upload-setface','click',function(){
        remove_img($(this)) ;
    })

    function add_image(img_url,id, attached) {
        $('#uploaded').html("") ;
        var div= document.createElement('li') ;
        $('#uploaded').append(div) ;
        div.className='list';

        var img = document.createElement('img') ;
        img.setAttribute("src", img_url) ;
        img.setAttribute("id", id) ;
        img.className='zui-upload-img' ;
        div.appendChild(img) ;
        var div_bottom = document.createElement('div') ;
        div_bottom.innerHTML = '删除图片';
        div_bottom.className = 'zui-upload-setface' ;
        div.appendChild(div_bottom) ;

        var div_clear = document.createElement('div') ;
        div_clear.className = 'clear' ;
        div.appendChild(div_clear) ;
        if(!attached) {
//            m_attach_img.push(id) ;
        }
    }
</script>