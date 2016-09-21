<script type="text/javascript" charset="utf-8" src="../../../third_party/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../../../third_party/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="../../../third_party/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript" charset="utf-8" src="../../../Public/js/zxxFile.js"></script>
<style type="text/css">
    .upload_box{width:480px; margin:0 auto; clear: both; margin-top:20px; }
    .upload_main{border-width:1px 1px 2px; border-style:solid; border-color:#ccc #ccc #ddd; background-color:#fbfbfb;}
    .upload_choose{padding:1em;}
    .upload_drag_area{display:inline-block; width:60%; padding:4em 0; margin-left:.5em; border:1px dashed #ddd; background:#fff url(http://rescdn.qqmail.com/zh_CN/htmledition/images/func/dragfile07bf38.gif) no-repeat 20px center; color:#999; text-align:center; vertical-align:middle;}
    .upload_drag_hover{border-color:#069; box-shadow:inset 2px 2px 4px rgba(0, 0, 0, .5); color:#333;}
    .upload_preview{border-top:1px solid #bbb; border-bottom:1px solid #bbb; background-color:#fff; overflow:hidden; _zoom:1;}
    .upload_append_list{height:300px; padding:0 1em; float:left; position:relative;}
    .upload_delete{
        clear: both;
        margin: 0 auto;
    }
    .upload_image{max-height:250px; padding:5px;}
    .upload_submit{padding-top:1em; padding-left:1em;}
    .upload_submit_btn{display:none; height:32px; font-size:14px;}
    .upload_loading{height:250px; background:url(http://www.zhangxinxu.com/study/image/loading.gif) no-repeat center;}
    .upload_progress{display:none; padding:5px; border-radius:10px; color:#fff; background-color:rgba(0,0,0,.6); position:absolute; left:25px; top:45px;}
    .upload_suc_img{width: 200px; height:200px; padding:5px}
</style>

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:block">
    <div class="modal-dialog">
        <div class="modal-content">   
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
                <h4 class="modal-title" id="myModalLabel">图片上传</h4>
            </div>

            <div class="modal-body">
                <div class="upload_box" id="uploadForm" action="http://test.aijuba.com/app.php?callback=kk">
                    <div class="upload_main">
                        <div class="upload_choose">
                            <input id="fileImage" type="file" size="30" name="fileselect[]" multiple />
                            <span id="fileDragArea" class="upload_drag_area">或者将图片拖到此处</span>
                        </div>
                        <div id="preview" class="upload_preview"></div>
                    </div>
                    <div class="upload_submit">
                        <button type="button" id="fileSubmit" class="upload_submit_btn">确认上传图片</button>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <!--				<button type="button" class="btn btn-primary">提交更改</button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    
    $('#fileSubmit').click(function(){
        seturl();
    });
    function seturl(){
        var s= document.createElement('script');
        s.src=$("#uploadForm").attr("action");
        document.body.appendChild(s);
    };
    function kk(json){
        console.log(json);
    };
    var ueEditor = UE.getEditor('travel_introduction') ;
    ueEditor.ready(function() {
        ueEditor.setContent(<?php if(isset($travel_introduction)) echo json_encode($travel_introduction);?>) ;
    }) ;

    //图片列表
    var m_upload_imgs = new Array() ;
    //封面
    var m_face_img = "";
    var face_image_url = "";

    <?php if(isset($imgs)) {
            foreach($imgs as $img) { ?>
                var img_url = <?php echo json_encode($img['url']);?> ;
                 console.log(img_url) ;
                 m_upload_imgs.push(img_url) ;
    <?php }} ?>


    function getUEditorContent() {

    }

    function preview() {
        document.oneday.action="http://yakejiao.com/product/preview";
        //document.onday.ueditor_content1.value = UE.getEditor('editor_ue').getContent() ;
        document.oneday.submit() ;
    }

    function rental_car() {
        alert("跳转到选车页面，可以引入租车平台数据") ;
    }

    function airport_pick_up_onchange(obj) {
        var index = obj.options[obj.options.selectedIndex].value ;
        index = parseInt(index) ;
        switch (index) {
            case 1:
                $("#airport_pick_up_service_content").html("服务内容：接送");
                break;
            case 2:
                $("#airport_pick_up_service_content").html("服务内容：接送、搬行李");
                break;
            case 3:
                $("#airport_pick_up_service_content").html("服务内容：接送、搬行李、导游介绍");
                break;
            default:
                break;
        }
    }

    function commit() {


        if(m_upload_imgs.length <= 0 ) {
            alert("请先上传图片") ;
            return ;
        }

        var title = $("#title").val() ;
        if(title.length <= 0 ) {
            alert('请输入名称') ;
            return;
        }

        var language = $("#language").val() ;
        if(language.length <= 0 ) {
            alert('请选择语言') ;
            return;
        }


        var price_sel = $("#price_sel").val() ;
        if(price_sel == null || price_sel.length <= 0) {
//            alert() ;

        }

        var country = $("#country").val() ;
        if(country ==null || country.length <= 0 ) {
//            alert('请输入国家名称') ;
//            return;
        }

        var city = $("#city").val() ;
        if(city==null || city.length <= 0 ) {
//            alert('请输入城市名称') ;
//            return;
        }

        var feature = $("#feature").val() ;
        if(feature ==null || feature.length <= 0 ) {
//			alert('请输入城市名称') ;
        }

        var recommend_reason = "推荐理由" ;//UE.getEditor('recommend_reason').getContent();//$("#recommend_reason").val() ;
        var preferential = "暂无优惠" ;//UE.getEditor('preferential').getContent();//$("#preferential").val() ;
        var travel_brief = "简介";//UE.getEditor('travel_brief').getContent();//$("#travel_brief").val() ;
        var fee_brief = "费用简介";//UE.getEditor('fee_brief').getContent();//$("#fee_brief").val() ;
        var contact_tel = "15210150725";//$("#contact_tel").val() ;
        var editor_ue = "备注";//UE.getEditor('editor_ue').getContent();//$("#editor_ue").val() ;
        var travel_introduction = UE.getEditor('travel_introduction').getContent();//$("#recommend_reason").val() ;


        console.log("222222222222222") ;

        $.post("http://yakejiao.com/product/commit",
            {
//				$("#oneday_form").serialize(),
                imgs: m_upload_imgs,
                title: title,
                language:language,
                country:country,
                city:city,
                feature:feature,
                recommend_reason:recommend_reason,
                preferential:preferential,
                travel_brief:travel_brief,
                fee_brief:fee_brief,
                contact_tel:contact_tel,
                editor_ue:editor_ue,
                travel_introduction:travel_introduction
            },
            function(data) {
                alert("data:" + data) ;
//                var jObj = jQuery.parseJSON(data) ;
//				var str = JSON.stringify(jObj);
//				alert("err:" + jObj.result.err) ;
                if(data != null && data.result.err == 0 ) {
                    alert('产品提交成功') ;
                }
            }) ;
    }

//alert("token" + get_token()) ;

    var params = {
        fileInput: $("#fileImage").get(0),
        dragDrop: $("#fileDragArea").get(0),
        upButton: $("#fileSubmit").get(0),
        url: $("#uploadForm").attr("action"),
        dataType:'jsonp',
        token:get_token(),
        filter: function(files) {
            var arrFiles = [];
            for (var i = 0, file; file = files[i]; i++) {
                if (file.type.indexOf("image") == 0) {
                    if (file.size >= 512000) {
                        alert('您这张"'+ file.name +'"图片大小过大，应小于500k');
                    } else {
                        arrFiles.push(file);
                    }
                } else {
                    alert('文件"' + file.name + '"不是图片。');
                }
            }
            return arrFiles;
        },
        onSelect: function(files) {
            var html = '', i = 0;
            $("#preview").html('<div class="upload_loading"></div>');
            var funAppendImage = function() {
                file = files[i];
                if (file) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
//						html = html + '<div id="uploadList_'+ i +'" class="upload_append_list"><p><strong>' + file.name + '</strong>'+
//							'<a href="javascript:" class="upload_delete" title="删除" data-index="'+ i +'">删除</a><br />' +
//							'<img id="uploadImage_' + i + '" src="' + e.target.result + '" class="upload_image" /></p>'+
//							'<span id="uploadProgress_' + i + '" class="upload_progress"></span>' +
//							'</div>';

                        html = html + '<div id="uploadList_'+ i +'" class="upload_append_list"><p>'+
                            '<img id="uploadImage_' + i + '" src="' + e.target.result + '" class="upload_image" /></p><p>' +
                            '<a href="javascript:" class="upload_delete" title="删除" data-index="'+ i +'">删除</a>' +'</p>'+
                            '<span id="uploadProgress_' + i + '" class="upload_progress"></span>' +
                            '</div>';

                        i++;
                        funAppendImage();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $("#preview").html(html);
                    if (html) {
                        //删除方法
                        $(".upload_delete").click(function() {
                            ZXXFILE.funDeleteFile(files[parseInt($(this).attr("data-index"))]);
                            return false;
                        });
                        //提交按钮显示
                        $("#fileSubmit").show();
                    } else {
                        //提交按钮隐藏
                        $("#fileSubmit").hide();
                    }
                }
            };
            funAppendImage();
        },
        onDelete: function(file) {
            $("#uploadList_" + file.index).fadeOut();
        },
        onDragOver: function() {
            $(this).addClass("upload_drag_hover");
        },
        onDragLeave: function() {
            $(this).removeClass("upload_drag_hover");
        },
        onProgress: function(file, loaded, total) {
            var eleProgress = $("#uploadProgress_" + file.index), percent = (loaded / total * 100).toFixed(2) + '%';
            eleProgress.show().html(percent);
        },
        onSuccess: function(file, response) {
            alert(response) ;
            var obj = jQuery.parseJSON(response) ;
            $("#uploadInf").append("<img src=" + obj.content.url + " name='uploaded_img' class='upload_suc_img' onclick='setfaceimg(\"" + obj.content.url + "\"," + m_upload_imgs.length + ")'></img>");
//			$('.upload_suc_img').onclick(function() {
//				var url = $(this).attr("src") ;
//				alert(url) ;
//			}) ;

            if(m_face_img == "") {
                m_face_img = obj.content.url;
            }

            m_upload_imgs.push(obj.content.url) ;
        },
        onFailure: function(file) {
            $("#uploadInf").append("<p>图片" + file.name + "上传失败！</p>");
            $("#uploadImage_" + file.index).css("opacity", 0.2);
        },
        onComplete: function() {
            //提交按钮隐藏
            $("#fileSubmit").hide();
            //file控件value置空
            $("#fileImage").val("");
//			$("#uploadInf").append("<p>当前图片全部上传完毕，可继续添加上传。</p>");
        }
    };
    ZXXFILE = $.extend(ZXXFILE, params);
    ZXXFILE.init();

    function setfaceimg(url, index){
        alert('setfaceimg:' + url) ;
//		var src = $("#upload_suc_img").src ;
        m_face_img = url ;

//        var src = document.getElementById('uploadInf').getElementsByTagName('img')[0].src;
//		var src = document.getElementsByTagName("uploaded_img")[0].src;
//        alert('src=' + src) ;
    }

</script>