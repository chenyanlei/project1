<!DOCTYPE html>
<html lang="en">
<link>
<meta charset="UTF-8">
<title>商户编辑</title>
<script src="/Public/js/jquery-1.11.3.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.all.min.js"></script>
<script src="/Public/js/layer.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/third_party/ueditor/lang/zh-cn/zh-cn.js"></script>

<script src="/Public/js/plupload/plupload.full.min.js"></script>
<script src="/Public/js/qiniu/qiniu.js"></script>

<style>
    body,div,h1,h2,h3,h4,h5,h6,p,ul,li,select,input,a{
        margin: 0;
        padding:0;
    }
    a:hover, a:visited, a:link, a:active{
        text-decoration: none;
    }
    ul li{
        list-style: none;
    }
    button{
        outline: none;
    }
    body{
        font-size: 14px;
        font-family:"Microsoft YaHei";
        background-color: #f5f5f5;
    }
    /*重置初始样式--end*/
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
        clear:both;
    }
    .extend-main{
        width: 1135px;
        margin:0 auto;
        background-color: #fff
    }
    .extend-tree{
        padding: 20px 0;
        background-color: #f5f5f5;
    }
    .extend-tree a{
        font-size: 14px;
        color: #585858;

    }
    .btn-rmc{
        width:150px;
        height:40px;
        display: block !important;
        margin:0 auto; 
        border-radius: 0
    }
</style>
<body>
<?php
    $data['tip_title'] = "商户编辑";
    $CI = & get_instance() ;
    $CI->load->view("header_new", $data) ;
?> 
<div style="text-align: center;font-size: 26px;margin-top: 30px;margin-bottom: 30px">添加商户</div>
<div class="extend-main">
    <!--<div class="extend-tree">-->
        <!--<a href="#">我的店铺</a> >-->
        <!--<a href="#">素材</a> >-->
        <!--<a href="#">添加素材</a>-->
    <!--</div>-->

    <form>
        <input type="hidden" name="id" value="<?= $id ?>" id="id">   
        <div class="col-sm-12" style="margin: 50px;">        
            <div class="col-sm-12" style="margin-top: 50px">
                <label class="col-sm-1 control-label" style="text-align: right" for="travel_introduction">标题</label>
                <div class="col-sm-10">
                    <textarea rows="2" type="text"  class="form-control col-sm-12" placeholder="在这里输入一个吸引人的标题" id="ta_title" name="title"><?php echo $title?></textarea>
                </div>
            </div>
            <div class="col-sm-12" style="margin-top: 50px;">
                <label class="col-sm-1 control-label" style="text-align: right">封面</label>
                <div class="col-sm-10">
                    <div class="col-sm-12" style="border:solid #cccccc 1px;height:auto;">
                        <ul id="div_upload">
                            <div style="margin-top:20px">
                                <div id="container">
                                    <a id="pickfiles" href="#">上传图片</a>
                                </div>
                                <div style="clear: both"></div>
                                <div id="uploaded">
                                    <li class="list">
                                        <img src="<?=$img_url.$face_img?>" id="undefined" class="zui-upload-img"> 
                                        <div class="zui-upload-setface">替换图片</div>
                                        <div class="clear"></div>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-sm-12" style="margin-top: 50px;">
                <label class="col-sm-1 control-label" style="text-align: right" for="travel_introduction">推广描述</label>
                <div class="col-sm-10">
                     <!-- 1ue编辑器的使用 ，自己有疑问-->
                    <script id="content" name="content" style="min-height:500px;"></script>
                </div>
            </div>
            <div class="col-sm-12" style="padding-bottom:300px;padding-top:20px">
                <a class="btn-rmc btn btn-primary " onclick="click_upload()">确定</a>
            </div>
        </div>
    </form>
    <div class="clear"></div>
    
</div>

<?php
    $CI->load->view("footer") ;
?>
</body>
<script>

     var m_face_img ='<?php echo $face_img  ?>';
     var a='<?php echo $face_img  ?>';
    function click_upload() {
        var $content = UE.getEditor('content').getContent() ;
        var $title = $('#ta_title').val();  
        if(!$title){
            alert('请填写推广标题');
            return false;
        }
        if(!m_face_img){
            alert('请上传推广封面');
            return false;
        }
        if(!$content){
            alert('请填写推广内容');
            return false;
        } 
        

        $.post("/Publish_product_add_material/modify",
               {
                   "id":$('#id').val(),
                   "title":$title,
                   "face_img":(m_face_img==a?a:m_face_img),
                   "content":$content
               },
               function(data){
                    //console.log(data);
                    var jsonData=JSON.parse(data);
                    if(jsonData.result.err==0){
                        window.location.href="/publish/product_mng";
                    }else{

                    }                  
               }
              );
    }

    $(document).ready(function() {
        ueditor = UE.getEditor('content');
        ueditor.addListener("ready", function () {
            // editor准备好之后才可以使用
           ueditor.setContent(<?php echo json_encode($content);?>);
        });
    }) ;
    var index;
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
                // console.log('BeforeUpload') ;
                index = layer.load(1,{offset:['200px','800px'],shade: [0.4, '#393D49']});
            },
            'UploadProgress': function(up, file) {
                // 每个文件上传时,处理相关的事情
                // console.log('UploadProgress' ) ;
                // console.log(up) ;
                // console.log(file) ;
            },
            'FileUploaded': function(up, file, info) {
                // console.log('FileUploaded') ;
                // console.log(info) ;
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
                // console.log('UploadComplete') ;
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
        div_bottom.innerHTML = '替换图片';
        div_bottom.className = 'zui-upload-setface' ;
        div.appendChild(div_bottom) ;

        var div_clear = document.createElement('div') ;
        div_clear.className = 'clear' ;
        div.appendChild(div_clear) ;
    }
</script>
</html>
