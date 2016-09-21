<link rel="stylesheet" href="/Public/css/bootstrapValidator.min.css"/>
<link rel="stylesheet" href="/Public/css/bootstrap-datetimepicker.min.css"/>
<link rel="stylesheet" href="/Public/css/zino.upload.css">
<link rel="stylesheet" href="/Public/css/jquery.tagbox.css">
<script type="text/javascript" src="/Public/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/Public/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script src="/Public/js/zino.upload.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery.tagbox.js"></script>

<!--<script type="text/javascript" charset="utf-8" src="../../../third_party/ueditor/ueditor.config.js"></script>-->
<!--<script type="text/javascript" charset="utf-8" src="../../../third_party/ueditor/ueditor.all.min.js"></script>-->
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<!--<script type="text/javascript" charset="utf-8" src="../../../third_party/ueditor/lang/zh-cn/zh-cn.js"></script>-->

<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.all.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/third_party/ueditor/lang/zh-cn/zh-cn.js"></script>


<style>
    /*@import url("http://netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css");*/
    @import url("/Public/css/bootstrap-glyphicons.css");
   .destination select~i{
        margin-right:20px;
    }
    .control-label{
        font-size:16px;
        color:#0097d6;
    }
    .destination .form-control{
        width:140px;
        height:30px;
        border:#cccccc 1px solid;
        padding:1px;
    }
    .form-control{
        border-radius:0px;
    }
    label{
        font-weight:normal;
    }

    .form-group {
        margin-top: 40px;
    }

   .zui-upload {
            background: #00cb2a;
            font-size: 16px;
            color: white;
            width: 151px;
            height: 50px;
            margin-left: -30px;
        }

        .zui-upload:hover, .zui-upload-hover {
            background: #e3e3e3; /* Old browsers */
            background: -moz-linear-gradient(top,  #e3e3e3 0%, red 100%); /* FF3.6+ */
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,red), color-stop(100%,red)); /* Chrome,Safari4+ */
            background: -webkit-linear-gradient(top,  #e3e3e3 0%,red 100%); /* Chrome10+,Safari5.1+ */
            background: -o-linear-gradient(top,  #e3e3e3 0%,red 100%); /* Opera 11.10+ */
            background: -ms-linear-gradient(top,  #e3e3e3 0%,red 100%); /* IE10+ */
            background: linear-gradient(to bottom,  red 0%,red 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e3e3e3', endColorstr='#ddd',GradientType=0 ); /* IE6-9 */
        }
        .zui-upload-label {
            line-height: 50px;
            width: 151px;
            height: 50px;
            background: transparent;
        }

        .zui-upload-item {
            float: left;
        }

        .zui-upload-img {
            width: 200px;
            height: 114px;
        }

        .zui-upload-img1 {
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

        .clear {
            clear: both;
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
        #myTab .active a{
            background:#0097d6;
            color:#ffffff;
            margin-bottom:10px;
            border-radius:0px;
            margin-right:0px
        }
         #myTab a:hover{
            border:0px;
             border-radius:0px;
        }
        .price{
            border:solid #cccccc 1px;
            padding:0px;
            margin-bottom:10px
        }
         .tab-pane .fade p{
            border:#ffffff solid 1px
        }
        #myTab{
          border:0px
        }
        .sale_on{
            color:#0097d6;
            font-size:14px;
            margin-bottom:10px
        }
        .pri_on input{
           width:120px;
           height:25px;
        }
        .pri_on select{
            height:25px;
        }
        .pri_on input,.pri_on select{
            border:#cccccc 1px solid;
            color:#585858;
        }
        .pri_item{
            width:50%;
            float:left
        }

        .pri_out{
            width:500px;
            height:50px;
            margin:30px auto
        }
        
        .time_zone{
            margin-left: -35px;
            font-size:16px;
            color:#585858;
            margin-top:10px;
            text-indent:4em;
            background:url('/Public/images/sign-in_icon02_1.png') no-repeat  49px 1px;
        }
        .sel{
            background:url('/Public/images/sign-in_icon_2.png') no-repeat  49px 1px;
        }
        #start{
            width:200px;
            height:40px;
            color:#585858;
            font-size:16px;
            padding-left:70px;
            background:url('/Public/images/icon_calender.png') no-repeat  18px 6px;
        }
        #date_end{
            width:200px;
            height:40px;
            color:#585858;
            font-size:16px;
            padding-left:70px;
            background:url('/Public/images/icon_calender.png') no-repeat  18px 6px;
        }
        .date{
            width:580px;
            margin:20px auto;
            display:none
        }
        .date label{
            height:40px;
            line-height:40px;
            padding:0px;
            text-align:right
        }

        .date i{
            padding-left:35px
        }
        .pri_on{
            float:left;
            padding:0px
        }
        .payway{
            float:left;
            margin-left: 20px;
        }
        .pri_on input~i{
            margin-right:-8px;
            margin-top:-3px
        }
        .tagBox-item-content{
        position: relative
        }
        .tagBox-remove{
            position: absolute;
            right: -8px;
            top: -9px;
        }
        .tagBox-input,.tagBox-add-tag{
            margin-bottom: 10px;
        }
        #otherlang{
            float:right;
            left: 134px;
            position: absolute;
            top: 59px;
        }
        #onther~i{
            margin-top:-85px
        }
        #otherlang~i{
            margin-right: -37px;
            margin-top: 51px;
        }
        .icon_momey{
           width:30px;
           height:25px;
           float:left;
           background:#cccccc url(/Public/images/icon_02.png) no-repeat center center;
        }
        .alp_momey{
           color:#ffffff;
           width:60px;
           background:#cccccc;
           height:25px;
           float:left;
           line-height:25px;
           text-align:center
        }

        .input_pri{
           float:left
        }

        .btn-eclipse {
            border-radius: 50px;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
        }

    /*.tagbox-input {*/
        /**/
    /*}*/
        
</style>

<div class="col-sm-8 col-sm-push-3" style="margin-top:30px;padding-left:0px">
    <span><a href="/publish/product_select">添加产品</a></span> > <span>一日游</span>
</div>
<div class="col-sm-8 col-sm-push-3" style="border:solid #cccccc 1px;margin-top:30px">
    
    <form method="post" name="oneday" id="oneday_form" class="form-horizontal y-margin-bottom-10px" action="/publish/add_product">
         <div class="form-group destination">
            <label class="col-lg-2 control-label">目的地　</label>
            <div class="col-lg-3">
                 <select class="form-control" name="continent" id="continent">
                        <option value="">--请选择一个洲--</option>
                        <option value="asia">亚洲</option>
                        <option value="europe">欧洲</option>
                        <option value="north_america">北美洲</option>
                        <option value="south_america">南美洲</option>
                        <option value="africa">非洲</option>
                        <option value="oceania">大洋洲</option>
                        <option value="antarctica">南极洲</option>
                 </select>       
            </div>
            <div class="col-lg-3">
                 <select class="form-control" name="country" id="country">
                        <option value="">--请选择一个国家--</option>
                 </select>       
            </div>
        </div>
       
         <div class="form-group">
            <label class="col-lg-2 control-label">产品名称</label>
            <div class="col-lg-8">
                <textarea rows="2" type="text" name="title" class="form-control" placeholder="产品的标题,用一句话来描述该产品    列如:威尼斯水上一日游"></textarea>
            </div>             
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">产品特色</label>
            <div class="col-lg-8">

                <input type="text" id="jquery-tagbox-text" class="jQTagBox" style="display: none;">
                <span class="tagBox-container">
                </span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label">上传图片</label>
            <div class="col-lg-8">
                <div class="col-lg-12" style="border:solid #cccccc 1px;height:auto;">
                    <ul id="div_upload">
                        <div style="margin-top:20px">
                            <div class="zui-upload-item" id="upload"></div>
                            <div style="clear: both"></div>
                            <div id="uploaded"></div>
                        </div>
                    </ul>
                </div> 
            </div> 
        </div> 
        <div class="form-group">
                <label class="col-lg-2 control-label">语言服务</label>
                <div class="col-lg-4">
                   <div class="radio">
                        <label>
                            <input type="radio" checked="checked" name="lang" value="中文" />  能够提供中文服务
                        </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="lang" value="英语" /> 提供英文服务
                    </label>
                </div>
                <div class="radio">
                    <label id="onther">
                        <input type="radio" name="lang" value="other"/> 仅提供本地语言服务
                    </label>
                </div>
                 <input type="text" name="otherlang" value="" style="display:none" id="otherlang" disabled="disabled">
                </div>
        </div>
        <div class="row y-margin-top-10px" style="margin-bottom:20px">

            <label class="col-sm-2 control-label" for="travel_introduction">旅程描述</label>
            <div class="col-sm-10">
                <script id="travel_introduction" name="travel_intro" style="min-height:500px;"></script>
            </div>
        </div>
        <div class="form-group">

            <label class="col-sm-2 control-label">价格设置</label>
            <div class="col-sm-10">
                <div class="col-sm-12 price">
                    <ul id="myTab" class="nav nav-tabs">
                       <li class="col-sm-6 text-center active" style="padding:0px">
                          <a href="#tonh" data-toggle="tab">
                                同行价
                          </a>
                       </li>
                       <li class="col-sm-6 text-center" style="padding:0px"><a href="#sale" data-toggle="tab">销售价</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                       <div class="tab-pane fade in active" id="tonh">
                           <div class="pri_out">
                                <div class="pri_item">
                                    <div class="sale_on">同行销售价</div>
                                    <div class="col-lg-12 pri_on">
                                        <div class="icon_momey"></div>
                                        <input type="text" name="same_price" class="form-control input_pri" id="same_price">
                                        <div class="alp_momey">美元</div><br>
                                    </div>
                                </div>
                                <div class="pri_item">
                                     <div class="sale_on">建议零售价</div>
                                     <div class="col-lg-12 pri_on">
                                        <div class="icon_momey"></div>
                                        <input type="text" name="advise_price" class="form-control input_pri" id="advise_price">
                                         <div class="alp_momey">美元</div><br>
                                    </div>
                                  
                                </div>
                           </div>
                       </div>
                       <div class="tab-pane fade" id="sale">
                            <div class="pri_out">
                                <div class="pri_item">
                                    <div class="sale_on">销售价</div>
                                    <div class="col-lg-12 pri_on">
                                        <div class="icon_momey"></div>
                                        <input type="text" name="sale_price"  class="form-control input_pri" id="sale_price" disabled="disabled">
                                         <div class="alp_momey">美元</div><br>
                                    </div>
                                </div>
                                <div class="pri_item">
                                     <div class="sale_on">同行佣金</div>
                                     <div class="col-lg-12 pri_on">
                                        <div class="icon_momey"></div>
                                        <input type="text" name="commission" class="form-control input_pri" id="commission" disabled="disabled">
                                        <div class="alp_momey">美元</div><br>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-8 col-sm-push-2 time_zone sel" id="alltime">总是可以接待,每天都可以接待</div>
            <div class="col-sm-8 col-sm-push-2 time_zone" id="specialtime">特定时间可以接待</div>
        </div>
        <div class="form-group">
            <div class="date">
                <label  class="col-lg-2">出发日期</label>
                <div class="col-lg-4">
                    <input size="16" type="text" value="2016/06/15" readonly class="form-control form_datetime" id="start" name="date_start" disabled="disabled">
                </div>
                <label  class="col-lg-2">返程日期</label>
                <div class="col-lg-4">
                    <input size="16" type="text" value="2016/06/15" readonly class="form-control form_datetime" id="date_end" name="date_end" disabled="disabled">
                </div>
            </div>
        </div>
        <div class="form-group">
                <label class="col-lg-2 control-label">最低成团人数</label>
                <div class="col-lg-4">
                    <select name="min_num" class="form-control" data-bv-field="language">
                        <option value="">--请选择人数 --</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
        </div>
        <input type="hidden" name="calendar_type" value="0" id="calendar_type">   
        <input type="hidden" name="p_type" value="<?=$p_type?>">   
        <input type="hidden" name="price_type" value="0" id="price_type">   
        <input type="hidden" name="imgs_id" class="form-control" value="" id="array_pic">   
        <input type="hidden" name="face_img" value="" id="face_img">   
        <input type="hidden" name="tagname" value="" id="tag">   
        <input type="hidden" name="p_status" value="" id="p_status">   
        <div class="row col-sm-offset-2  y-margin-top-20px y-margin-bottom-10px">
            <button type="submit" class="col-sm-2 btn btn-default btn-eclipse" id="subBtn">预览</button>
            <button type="submit" class="col-sm-2 col-sm-offset-1 btn btn-primary btn-eclipse"  id="validateBtn">提交</button>
        </div>

        <div class="row y-margin-top-10px y-margin-bottom-10px"></div>
    </form>
</div>

<script type="text/javascript">
$(document).ready(function() {
   
    $('#oneday_form').bootstrapValidator({
        ignore: ':none',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            title: {
                validators: {
                    notEmpty: {
                        message: '产品名称不能为空'
                    }
                }
            },
            lang:{
                validators: {
                    notEmpty: {
                        message: '请选择一种语言'
                    }
                }
            },
            price_sel:{
                validators: {
                    notEmpty: {
                        message: '价格不能为空'
                    },
                   
                }
            },
            price_sel_1:{
                validators: {
                      notEmpty: {
                        message: '价格不能为空'
                    },
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/,
                        message: '价格必须为数字'
                    },
                }
            },
            date_end:{
                validators: {
                    callback:{
                        message: '产品失效截止时间不能早于产品有效开始时间',
                        callback: function () {
                            var res = true;
                            var stime=$('#start').val();
                            var etime=$('#date_end').val();
                            if(new Date(stime) > new Date(etime)){
                                res = false;
                            }

                            return res;
                        }   
                    }
                }   
            },
            continent:{
                validators: {
                    notEmpty: {
                        message: '请选择一个洲'
                    }
                }
            },
            country:{
                validators: {
                    notEmpty: {
                        message: '请选择一个国家'
                    }
                }
            },
            featrue:{
                validators: {
                    notEmpty: {
                        message: '请填写产品特色'
                    }
                }
            },
            same_price:{
                validators: {
                    notEmpty: {
                        message: '请填写同行销售价'
                    },
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/,
                        message: '价格必须为数字'
                    },
                }
            },
            advise_price:{
                validators: {
                    notEmpty: {
                        message: '请填写建议零售价'
                    },
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/,
                        message: '价格必须为数字'
                    }
                }
            },
            sale_price:{
                validators: {
                    notEmpty: {
                        message: '请填写销售价'
                    },
                    regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/,
                        message: '价格必须为数字'
                    },
                }
            },
            commission:{
                validators: {
                    notEmpty: {
                        message: '请填写佣金'
                    },
                     regexp: {
                        regexp: /^\d+(\.\d{1,2})?$/,
                        message: '价格必须为数字'
                    },
                }
            },
            min_num:{
                validators: {
                    notEmpty: {
                        message: '请选择最低成团人数'
                    }
                }    
            },
            otherlang:{
                validators: {
                    notEmpty: {
                        message: '请填写其他语言'
                    }
                }    
            },
            imgs_id:{
                validators: {
                    notEmpty: {
                        message: '请上传图片'
                    }
                }    
            },
        }
    });

    // Validate the form manually
    // $('#validateBtn').click(function() {
    //     $('#oneday_form').bootstrapValidator('validate');
    // });

    $(".form_datetime").datetimepicker({
        format: 'yyyy/mm/dd',
        language:  'zh-CN',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
       }).on('changeDate show', function(e) {
        // Revalidate it
       $('#oneday_form').bootstrapValidator('revalidateField','date_end'); 
     });
    
        
 
     Date.prototype.Format = function(fmt)   
    {
      var o = {   
        "M+" : this.getMonth()+1,                 //月份   
        "d+" : this.getDate(),                    //日   
        "h+" : this.getHours(),                   //小时   
        "m+" : this.getMinutes(),                 //分   
        "s+" : this.getSeconds(),                 //秒   
        "q+" : Math.floor((this.getMonth()+3)/3), //季度   
        "S"  : this.getMilliseconds()             //毫秒   
      };   
      if(/(y+)/.test(fmt))   
        fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));   
      for(var k in o)   
        if(new RegExp("("+ k +")").test(fmt))   
      fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));   
      return fmt;   
    }  

    function setdefaulttime(){
        var time_now = new Date().Format("yyyy/MM/dd");
        $('#start').val(time_now);
   }    
   
   setdefaulttime();

   var continent = new Array();  
  
   <?php  if($continent){?>
            continent =JSON.parse('<?php echo $continent;?>');
   <?php }?>
    
   function getCountry(e){
        if(continent.result!=undefined && continent.result.err==0){
            var country=continent.content[e];
        
            var op='<option value="">--请选择一个国家--</option>'; 
            for(i in country){

                op +="<option value='" +country[i]['name'] + "'> " + country[i]['name'] + " </option>";
            
            }
            $("#country").html(op);
        }else{
            alert(continent.result.msg+'请尝试从新登录');
        }
   }
   $('#continent').change(function(){
             $('#country').val('');     
         $('#oneday_form').bootstrapValidator('revalidateField','country');
         getCountry($(this).val());
   })

    UE.getEditor('travel_introduction');
   $('#validateBtn').click(function(){
     $('#defaultForm').bootstrapValidator('validate');
      var travel_introduction = UE.getEditor('travel_introduction').getContent();
        if(travel_introduction ==null || travel_introduction.length <= 0 ) {
            alert('请输入行程介绍') ;
            return false;
        }

        if(m_upload_imgs.length <1){
            alert('请至少上传6张图片') ;
            return false;
        }

        $('#p_status').val(1);
        return true;
    })

     $('#subBtn').click(function(){
     $('#defaultForm').bootstrapValidator('validate');
      var travel_introduction = UE.getEditor('travel_introduction').getContent();
        if(travel_introduction ==null || travel_introduction.length <= 0 ) {
            alert('请输入行程介绍') ;
            return false;
        }

        if(m_upload_imgs.length <1){
            alert('请至少上传6张图片') ;
            return false;
        }

      $('#p_status').val(0);  
      return true;
    })

   
});
</script>
<script type="text/javascript">

    var m_upload_imgs = new Array() ;
    var face_img = new Array() ;
    function get_upload_imgs() {
        return m_upload_imgs;
    }

    $(function () {
        $('#upload').click(function(){
            if(m_upload_imgs.length ==6) {
                alert('最多只能上传6张图片');
                return false;
            }
        })

        var info = JSON.parse(getCookie('user_info'));
        
        var tokeninfo = info.token;
        $("#upload").zinoUpload({
            url: "/upload/set_upload?token="+tokeninfo+"&type=0",
            label:"上传图片",
            complete: function (event, ui) {
                // $("#console").html(JSON.stringify(ui.response));
                var info= JSON.parse(ui.response);

                console.log(ui.response) ;
              if(info.result.err==0){
                  add_image(info.content.url,info.content.id) ;
                  if(face_img.length == 0){
                     face_img.push(info.content.url);
                     $('#face_img').val(info.content.url);
                  }
              }
            }
        });
    });


    $('div').delegate('.zui-upload-setface','click',function(){
        $(this).parent().remove();
        var b= $(this).prev().attr('src');
         m_upload_imgs.splice(jQuery.inArray(b,m_upload_imgs),1); 
    })
    function add_image(img_url,id) {
         
        var div= document.createElement('li') ;
        
        $('#uploaded').append(div) ;
         div.className='list';
       
        var img = document.createElement('img') ;
        img.setAttribute("src", img_url) ;
        img.className='zui-upload-img' ;
        div.appendChild(img) ;
        var div_bottom = document.createElement('div') ;
        div_bottom.innerHTML = '删除图片';
        div_bottom.className = 'zui-upload-setface' ;
        div.appendChild(div_bottom) ;
 

        var div_clear = document.createElement('div') ;
        div_clear.className = 'clear' ;
        div.appendChild(div_clear) ;
        m_upload_imgs.push(id) ;
        $('#array_pic').val(m_upload_imgs);
    }

    $('.time_zone').click(function(){
        $(this).addClass('sel').siblings().removeClass('sel');
        var select = $('#specialtime').attr('class');
        if(select == 'col-sm-8 col-sm-push-2 time_zone sel'){
            $('#calendar_type').val('1');
            $('.date').css('display','block');
            $('#start').attr('disabled',false);
            $('#date_end').attr('disabled',false);
        }else{
             $('.date').css('display','none');
             $('#start').attr('disabled',true);
             $('#date_end').attr('disabled',true);
             $('#calendar_type').val('0');
        }
    })

    $('#myTab li a').click(function(){
        var active = $(this).attr('href');
      if(active == '#tonh'){
        $('#price_type').val('0');
        $('#same_price').attr('disabled',false);
        $('#advise_price').attr('disabled',false);
        $('#sale_price').attr('disabled',true);
        $('#commission').attr('disabled',true);
      }else{
        $('#price_type').val('1');
        $('#same_price').attr('disabled',true);
        $('#advise_price').attr('disabled',true);
        $('#sale_price').attr('disabled',false);
        $('#commission').attr('disabled',false);
      }

    })


    var  tagval = new Array();

  $("#jquery-tagbox-text").tagBox({
    tagInputClassName: 'form-control',
    tagButtonClassName:'col-sm-2 btn btn-default',
    arraytag:tagval,
    maxTags:5,
  });

  $('.tagBox-container').delegate('.tagBox-add-tag','click',function(){
        $('#tag').val(tagval);
  })

  $('input[name="lang"]').click(function(){
    if($(this).val()=='other'){
        $('#otherlang').css('display','block');
        $('#otherlang').attr('disabled',false);
    }else{
        $('#otherlang').css('display','none');
        $('#otherlang').attr('disabled',true);
    }
  })
</script>