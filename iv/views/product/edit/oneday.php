<link rel="stylesheet" href="/Public/css/bootstrap-datetimepicker.min.css"/>
<script type="text/javascript" src="/Public/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/Public/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>

<!--<script type="text/javascript" charset="utf-8" src="/third_party/ueditor/ueditor.config.js"></script>-->
<!--<script type="text/javascript" charset="utf-8" src="/third_party/ueditor/ueditor.all.min.js"></script>-->
<!--<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<!--<script type="text/javascript" charset="utf-8" src="/third_party/ueditor/lang/zh-cn/zh-cn.js"></script>-->

<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/third_party/qiniu_ueditor/ueditor.all.min.js"></script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/third_party/ueditor/lang/zh-cn/zh-cn.js"></script>


<script type="text/javascript" src='/Public/js/qsctag.js'></script>
<link rel="stylesheet" type="text/css" href="/Public/css/qsctag.css">

<script src="/Public/js/plupload/plupload.full.min.js"></script>
<script src="/Public/js/qiniu/qiniu.js"></script>

<style>
    @import url("/Public/css/bootstrap-glyphicons.css");
    .destination select~i{
        margin-right:20px;
    }
    .control-label{
        font-size:14px;
        color:#0097d6;
        padding-top: 0px;
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
        /*margin-top: 40px;*/
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
    #myTab .active{
        background:#0097d6;
        color:#ffffff;
        margin-bottom:10px;
        border-radius:0px;
        margin-right:0px;
        padding:0px ;
    }
    #myTab a:hover{
        border:0px;
        border-radius:0px;
    }
    .price{
        border:solid #cccccc 1px;
        padding:0px;
        margin-bottom:10px;
        padding-bottom: 50px;
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
        width:50%;
        height:40px;
    }
    .pri_on select{
        height:40px;
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
        padding: 15px;
        width:100%;
        height:50px;
        margin:30px auto
    }

    .time_zone{
        margin-left: -35px;
        font-size:16px;
        color:#585858;
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
        margin:0px auto;
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

    #otherlang{
        float: right;
        left: -150px;
        position: relative;
        margin-top: -15px;
    }
    #onther~i{
        margin-top:-85px
    }
    #otherlang~i{
        margin-right: -37px;
        margin-top: 51px;
    }
    .icon_momey{
        width:40px;
        height:40px;
        float:left;
        background:#cccccc url(/Public/images/icon_02.png) no-repeat center center;
    }
    .alp_momey{
        color:#ffffff;
        width:80px;
        background:#cccccc;
        height:40px;
        float:left;
        line-height:40px;
        text-align:center
    }

    .input_pri{
        float:left
    }

    .btn-eclipse {
        border-radius: 25px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        height: 40px;
        width: 150px;
    }

    ul {
        display: block;
        list-style-type: disc;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        -webkit-padding-start: 0px;
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

    #pickfiles:hover {
        background: #00cd2a;
    }

    #specialtime {
        margin-top: 20px;
    }
</style>

<?php

function selected_continent($cur, $continent) {
    if($cur === $continent) {
        echo 'selected' ;
    }
}

function selected_country($cur,$country) {
    echo '<option value="'.$country.'" selected>'.$country.'</option>';
}

function checked($cur, $lang) {
    if($cur == $lang) {
        echo 'checked="checked"' ;
    }
}

function get_prices1($price) {
    if($price != null) {
        echo $price['price1'];
    }
}

function get_prices2($price) {
    if($price != null) {
        echo $price['price2'];
    }
}

function format_datatime($datetime) {
//    date_default_timezone_set('UTC');
    echo Date('Y/m/d' , $datetime) ;
}

function to_en_name($chn) {
    switch($chn) {
        case '亚洲':
            return 'asia' ;
        case '欧洲':
            return 'europe' ;
        case '北美洲':
            return 'north_america' ;
        case '南美洲':
            return 'south_america' ;
        case '非洲':
            return 'africa' ;
        case '大洋洲':
            return 'oceania' ;
        case '南极洲':
            return 'antarctica' ;
    }
}

function to_ch_name($chn) {
    switch($chn) {
        case 'asia':
            return '亚洲' ;
        case 'europe':
            return '欧洲' ;
        case 'north_america':
            return '北美洲' ;
        case 'south_america':
            return '南美洲' ;
        case 'africa':
            return '非洲' ;
        case 'oceania':
            return '大洋洲' ;
        case 'antarctica':
            return '南极洲' ;
    }
}


?>

<div class="col-sm-8 col-sm-push-3" style="margin-top:30px;padding-left:0px">
    <span><a href="/publish/product_select">产品编辑</a></span> > <span>一日游</span>
</div>
<div class="col-sm-8 col-sm-push-3" style="border: solid #f1f1f1 1px;margin-top:30px">
    <div class="form-horizontal y-margin-bottom-10px">
        <div class="form-group destination">
            <label class="col-sm-2 control-label">目的地</label>
            <div class="col-sm-3">
                <select class="form-control" name="continent" id="continent">
                    <option value="">--请选择一个洲--</option>
                    <option value="asia" <?php $en_name = $detail['continent']; selected_continent('asia', $en_name); ?>>亚洲</option>
                    <option value="europe"  <?php selected_continent('europe', $en_name); ?>>欧洲</option>
                    <option value="north_america"  <?php selected_continent('north_america', $en_name); ?>>北美洲</option>
                    <option value="south_america"  <?php selected_continent('south_america', $en_name); ?>>南美洲</option>
                    <option value="africa"  <?php selected_continent('africa', $en_name); ?>>非洲</option>
                    <option value="oceania"  <?php selected_continent('oceania', $en_name); ?>>大洋洲</option>
                    <option value="antarctica"  <?php selected_continent('antarctica', $en_name); ?>>南极洲</option>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="form-control" name="country" id="country">
                    <option value="">--请选择一个国家--</option>
                    <?php selected_country('',$detail['country']) ;?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">产品名称</label>
            <div class="col-sm-10">
                <textarea rows="2" type="text" id="title" class="form-control" placeholder="产品的标题,用一句话来描述该产品。列如:威尼斯水上一日游"><?php echo $detail['title'];?></textarea>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">产品特色</label>
            <div class="col-sm-10">
                <div id="slt_tags">
                </div>
                <div class="pre_tags">
                    <ul id="pre_tags">
                        <?php
                        $tagname = $detail['tagname'] ;
//                        var_dump($tagname) ;
                        if(isset($tagname) && strlen($tagname) > 3) {
                        $tags1 = json_decode($tagname) ;
                        foreach($tags1 as $tag_item) { ?>
                            <li class="tag_selected"><?php echo $tag_item ;?></li>
                        <?php } }?>
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
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">上传图片</label>
            <div class="col-sm-10">
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
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">语言服务</label>
            <div class="col-sm-8">
                <div class="radio">
                    <label>
                        <input type="radio" name="lang" <?php checked('中文', $detail['lang']); ?> value="中文" />能够提供中文服务
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="lang" <?php checked('英语', $detail['lang']); ?> value="英语" />提供英文服务
                    </label>
                </div>
                <div class="radio">
                    <label id="onther">
                        <input type="radio" name="lang" <?php checked('other', $detail['lang']); ?> value="other"/>仅提供本地语言服务
                    </label>
                    <input type="text" name="otherlang" class="form-control" style="display:none;width: 200px" id="otherlang" disabled="disabled">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label" for="travel_introduction">旅程描述</label>
            <div class="col-sm-10">
                <script id="travel_introduction" name="travel_intro" style="min-height:500px;"></script>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">价格设置</label>
            <div class="col-sm-10">
                <div class="col-sm-12 price">
                    <ul id="myTab" class="nav nav-tabs" style="margin-top:0px">
                        <li id="li_price1" class="col-sm-6 text-center active">同行价</li>
                        <li id="li_price2" class="col-sm-6 text-center">销售价</li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="tonh">
                            <div class="pri_out">
                                <div class="pri_item">
                                    <div id="tip_price1" class="sale_on">同行销售价</div>
                                    <div class="col-lg-12 pri_on">
                                        <div class="icon_momey"></div>
                                        <?php
                                            $prices = $detail['prices'] ;
                                            if($prices != null) {
                                                $price = $prices[0] ;
                                            }
                                        ?>
                                        <input type="text" name="price1" class="form-control input_pri" id="price1" value="<?php get_prices1($price);?>">
                                        <div class="alp_momey">美元</div><br>
                                    </div>
                                </div>
                                <div class="pri_item">
                                    <div id="tip_price2" class="sale_on">建议零售价</div>
                                    <div class="col-lg-12 pri_on">
                                        <div class="icon_momey"></div>
                                        <input type="text" name="price2" class="form-control input_pri" id="price2" value="<?php get_prices2($price);?>">
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
            <label  class="col-sm-2 control-label">接待设置</label>
            <div class="col-sm-8 time_zone sel" id="alltime">总是可以接待,每天都可以接待</div>
            <div class="col-sm-8 time_zone" id="specialtime">特定时间可以接待</div>
        </div>

        <div class="form-group">
            <div class="date">
                <label  class="col-sm-2">出发日期</label>
                <div class="col-sm-4">
                    <input size="16" type="text" value="2016/06/15" readonly class="form-control form_datetime" id="start" name="date_start" disabled="disabled">
                </div>
                <label  class="col-sm-2">返程日期</label>
                <div class="col-sm-4">
                    <input size="16" type="text" value="2016/06/15" readonly class="form-control form_datetime" id="date_end" name="date_end" disabled="disabled">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">最低成团人数</label>
            <div class="col-sm-5">
                <input type="text" id="min_num" value="<?php echo $detail['min_num'];?>" class="form-control" placeholder="输入最低成团人数" />
            </div>

            <label class="col-sm-2" style="height: 34px;line-height: 34px">人</label>
        </div>

        <div class="form-group ">
            <button type="submit" class="col-sm-4 btn btn-default btn-eclipse col-sm-offset-2" id="subBtn">预览</button>
            <button type="submit" class="col-sm-4 col-sm-offset-1 btn btn-primary btn-eclipse"  id="validateBtn">提交</button>
        </div>

        <div class="y-margin-bottom-100px"></div>

        <input type="hidden" name="calendar_type" value="0" id="calendar_type">
        <input type="hidden" name="p_type" value="<?=$p_type?>">
        <input type="hidden" name="price_type" value="0" id="price_type">
        <input type="hidden" name="imgs_id" class="form-control" value="" id="array_pic">
<!--        <input type="hidden" name="face_img" value="" id="face_img">-->
        <input type="hidden" name="tagname" value="" id="tag">
        <input type="hidden" name="p_status" value="" id="p_status">
    </div>
</div>

<style>
    #global_tip {
        height: 50px;
        width: 100%;
        background: deepskyblue;
        position: fixed;
        z-index: 999999 ;
        text-align: center;
    }
    #global_tip_content {
        clear: both;
        color: #ffffff;
        line-height: 50px;
    }
    #global_tip_close {
        cursor: pointer;
        text-align: center;
        float: right;
        width: 10%;
        color: #ffffff;
        line-height: 50px;
    }
</style>
<div id="global_tip" style="display: none">
    <div id="global_tip_close">关闭</div>
    <div style="width: 90%; float: right">
        <div id="global_tip_content">修改成功</div>
    </div>

    <div style="clear: both"></div>
</div>

<script>
    function show_gloable_tip(content) {
        if(content != null) {
            $("#global_tip_content").innerHTML = content ;
        }
        $("#global_tip").show() ;
    }
    function hide_gloable_tip() {
        $("#global_tip").hide() ;
    }
</script>

<script type="text/javascript">
    var ary_added_tags = new Array() ;
    var ary_tagname = new Array();
    ary_tagname.push('tt');
    ary_tagname.push('t2');
    ary_added_tags.push('test') ;
    ary_added_tags.push('hello') ;
    var container = $("#pre_tags") ;
    var params = {
        container:container,
        ary_added_tags:ary_added_tags,
        onTagSelect:function(tag_name){
            console.log("onTagSelect:" + tag_name) ;
            ary_tagname.push(tag_name) ;
        },
        onTagSelectCancel:function(tag_name) {
            console.log("onTagSelectCancel:" + tag_name) ;
            ary_tagname.remove(tag_name) ;
        }
    } ;
    QSCtagBox = $.extend(QSCtagBox, params) ;
    QSCtagBox.init() ;

    var price_id = <?php echo $price['id'];?> ;
    var pid=<?=$detail['id']?> ;
    var p_type = <?=$p_type?> ;
    var price_type = <?=$detail['price_type']?> ;
    var calendar_type = <?php echo $detail['calendar_type'];?> ;
    var ueditor ;
    var m_attach_img = new Array() ;
    var tagval = new Array();

    $(document).ready(function() {
        $("#global_tip_close").click(function(){
            hide_gloable_tip() ;
        }) ;
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

//        setdefaulttime();

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
                alert(continent.result.msg+'请尝试重新新登录');
            }
        }

        $('#continent').change(function(){
            $('#country').val('');
            getCountry($(this).val());
        })


        if(calendar_type == 1){
            $("#specialtime").addClass('sel') ;
            $("#alltime").removeClass('sel') ;
            $('#calendar_type').val('1');
            $('.date').css('display','block');
            $('#start').attr('disabled',false);
            $('#date_end').attr('disabled',false);
            $("#start").val('<?php format_datatime($price['calendar_from']) ;?>' ) ;
            $("#date_end").val('<?php format_datatime($price['calendar_to']) ;?>') ;
        }else{
            $("#alltime").addClass('sel') ;
            $("#specialtime").removeClass('sel') ;
            $('.date').css('display','none');
            $('#start').attr('disabled',true);
            $('#date_end').attr('disabled',true);
            $('#calendar_type').val('0');
        }

        ueditor = UE.getEditor('travel_introduction');
        ueditor.addListener("ready", function () {
            // editor准备好之后才可以使用
            ueditor.setContent(<?php echo json_encode($detail['travel_intro']);?>);

        });
        $('#validateBtn').click(function(){
            $('#defaultForm').bootstrapValidator('validate');
            var travel_introduction = UE.getEditor('travel_introduction').getContent();
            if(travel_introduction ==null || travel_introduction.length <= 0 ) {
                alert('请输入行程介绍') ;
                return false;
            }

//            if(m_upload_imgs.length <6){
//                alert('请至少上传6张图片') ;
//                return false;
//            }

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

//            if(m_upload_imgs.length <6){
//                alert('请至少上传6张图片') ;
//                return false;
//            }

            $('#p_status').val(0);
            return true;
        })

        $('#pickfiles').click(function(){
//            if(m_upload_imgs.length ==6) {
//                alert('最多只能上传6张图片');
//                return false;
//            }
        })


        <?php $imgs_url = $detail['imgs_url'] ;
              foreach($detail['imgs'] as $img_item) {
                $item_img_url = $imgs_url . $img_item['url'] ;
         ?>
                add_image('<?php echo $item_img_url; ?>', '<?php echo $img_item['id']; ?>', true) ;
        <?php } ?>


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

        if(price_type == 0) {
            $("#tip_price1").html('同行价') ;
            $("#tip_price2").html('建议零售价') ;
            $("#li_price1").addClass('active') ;
            $("#li_price2").removeClass('active') ;
        } else {
            $("#tip_price1").html('建议零售价') ;
            $("#tip_price2").html('佣金') ;
            $("#li_price1").removeClass('active') ;
            $("#li_price2").addClass('active') ;
        }
    });

    function remove_img(item) {
        item.parent().remove();
        var id= item.prev().attr('id');

        //TODO remove relation link
        $.get('/image/del_img', {
            id:id,
            pid: pid,
            p_type:p_type
        }, function(data){
            console.log(data) ;
        }) ;
    }

    function add_image(img_url,id, attached) {
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
            m_attach_img.push(id) ;
        }
    }

    $('.time_zone').click(function(){
        $(this).addClass('sel').siblings().removeClass('sel');
        if($('#specialtime').hasClass('sel')){
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

    $('#li_price1').click(function(){
        if(price_type == 0) {
            return ;
        }
        price_type = 0 ;
        $("#tip_price1").html('同行价') ;
        $("#tip_price2").html('建议零售价') ;
        $("#li_price1").addClass('active') ;
        $("#li_price2").removeClass('active') ;
    }) ;

    $('#li_price2').click(function(){
        if(price_type == 1) {
            return ;
        }
        price_type = 1 ;
        $("#tip_price1").html('建议零售价') ;
        $("#tip_price2").html('佣金') ;
        $("#li_price1").removeClass('active') ;
        $("#li_price2").addClass('active') ;
    }) ;




    $('input[name="lang"]').click(function(){
        if($(this).val()=='other'){
            $('#otherlang').css('display','block');
            $('#otherlang').attr('disabled',false);
        }else{
            $('#otherlang').css('display','none');
            $('#otherlang').attr('disabled',true);
        }
    })

    /** *js数组转json */
    function arrayToJson (ary2) {
        var jsonstr ='{' ;
        jsonstrTmp ='';
        for(var i in ary2) {
            if(i != 'remove' && i != 'indexOf') {
                jsonstrTmp += "\"" + i + "\""+ ":" + "\"" + ary2[i] + "\",";
            }
        }
        jsonstr += jsonstrTmp.substring(0,jsonstrTmp.lastIndexOf(',')) + "}";
        return jsonstr;
    }

    function get_json_str(ary) {
        if(ary != null) {
            return JSON.stringify(ary) ;
        }
        return '' ;
    }

    function get_prices_str() {
        var calendar_from = $("#start").val() ;
        var calendar_to = $("#date_end").val() ;

        var price1 = $("#price1").val();
        var price2 = $("#price2").val() ;

        // 生成一组价格
        var price_item = new Array() ;
        price_item['id'] = price_id ;
        price_item['price1'] = price1 ;
        price_item['price2'] = price2 ;
        price_item['calendar_from'] = calendar_from ;
        price_item['calendar_to'] = calendar_to ;

        // 一组价格转成json字符串
        var price = arrayToJson(price_item) ;

        // 放入数组
        var ary_prices = new Array() ;
        ary_prices.push(price) ;
//        ary_prices.push(price) ;

        // 数组转成字符串
        return JSON.stringify(ary_prices) ;
    }

    $("#validateBtn").click(function() {
        var travel_intro = ueditor.getContent() ;
        var continent = $("#continent").val();
        var country = $("#country").val();
        var title = $("#title").val();
        var lang = $("input[name='lang']:checked").val(); //$("#lang").val();
        var min_num = $("#min_num").val() ;
        var city = "test" ;

        var prices = get_prices_str() ;
        $.post('/product_edit/commit',{
            id:pid,
            p_type:p_type ,
            continent:continent,
            country:country,
            city:city,
            title:title,
            lang:lang,
            tagname:get_json_str(ary_tagname) ,//ary_tagname.join(','), //JSON.stringify(ary_tagname),
            min_num:min_num,
            is_customer:0,
            price_type:price_type,
            calendar_type:calendar_type,
            prices:prices,
            travel_intro:travel_intro,
        },function(data){
            console.log(JSON.stringify(data)) ;

            if(data['result']['err'] == 0) {
//                history.back();
                show_gloable_tip() ;
            } else {
                show_gloable_tip("修改失败") ;
            }

//            var jsonObj = JSON.parse(data) ;
//            var str_prices = data['prices'] ;
//            console.log(prices) ;
//            var prices = JSON.parse(str_prices) ;
//            console.log('111111111111111111111111111111') ;
//            console.log(prices[0]) ;
//            var str_price_item = prices[0] ;
//            var price_item = JSON.parse(str_price_item) ;
//            console.log(price_item) ;



        }) ;
    }) ;
</script>