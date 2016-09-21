<style>
    .com_group_menu{
         width: 210px;
        height: 40px;
        list-style: none;
        background: #f9f9f9;
        margin-top: 5px;
        line-height: 40px;
        text-align: center;
        color:#585858;
        font-size:14px;
        position:relative;
    }

    #ul_menu .active,.com_group_menu:hover {
        color: #fff;
        background: #585858;
    }

    #ul_menu img{
        width: 20px;
        height: 20px;
        max-width: 20px;
        float: right;
        margin: 10px;
    }
    .img_pos{
        position:absolute;
        top:0px;
        right:2px;
    }
</style>

<ul id="ul_menu">
    <div class="com_group_menu" id="mc_des" data="c_des" class="active">目的地<img style="display: none" src="/Public/images/correct2.png" class="img_pos"></div>
    <div class="com_group_menu" id="mc_name" data="c_name">产品名称<img style="display: none" src="/Public/images/correct2.png" class="img_pos"></div>
    <div class="com_group_menu" id="mc_feature" data="c_feature">产品特色<img style="display: none" src="/Public/images/correct2.png" class="img_pos"></div>
    <div class="com_group_menu" id="mc_imgupload" data="c_imgupload">上传图片<img style="display: none" src="/Public/images/correct2.png" class="img_pos"></div>
    <div class="com_group_menu" id="mc_lang" data="c_lang">语言服务<img style="display: none" src="/Public/images/correct2.png" class="img_pos"></div>
    <div class="com_group_menu" id="mc_travel" data="c_travel">旅程描述<img style="display: none" src="/Public/images/correct2.png" class="img_pos"></div>
    <div class="com_group_menu" id="mc_price" data="c_price">价格设置<img style="display: none" src="/Public/images/correct2.png" class="img_pos"></div>
    <div class="com_group_menu" id="mc_minperson" data="c_minperson">最低成团人数<img style="display: none" src="/Public/images/correct2.png" class="img_pos"></div>
    <div class="com_group_menu" id="mc_booking_policy" data="c_booking_policy">预订须知<img style="display: none" src="/Public/images/correct2.png" class="img_pos"></div>
    <div class="com_group_menu" id="mc_fee_desc" data="c_fee_desc">费用说明<img style="display: none" src="/Public/images/correct2.png" class="img_pos"></div>
</ul>

<script>
    $(function(){
        $("body").delegate('#ul_menu .com_group_menu','click',function(){
            $("#ul_menu .com_group_menu").removeClass("active") ;
            $(this).addClass("active");

            var data = $(this).attr("data") ;
            $(".content .item").hide() ;
            $("#"+data).show() ;

            menu_click(data) ;

        }) ;
    }) ;
</script>
