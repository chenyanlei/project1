<style>
    .com_group_menu{
        width: 200px;
        height: 40px;
        list-style: none;
        background: #ccc;
        margin-top: 1px;
        line-height: 40px;
        padding-left: 10px;
        display: block;
        text-align: left;
    }

    .com_group_menu:hover{
        background: #4c5a5f;
    }

    #ul_menu .active {
        color: #fff;
        font-style: oblique;
        background: #4c5a5f;
    }

    #ul_menu img{
        width: 20px;
        height: 20px;
        max-width: 20px;
        float: right;
        margin: 10px;
    }

</style>

<ul id="ul_menu">
    <div class="com_group_menu" id="mc_des" data="c_des" class="active">目的地<img style="display: none" src="/Public/images/correct.png"></div>
    <div class="com_group_menu" id="mc_name" data="c_name">产品名称<img style="display: none" src="/Public/images/correct.png"></div>
    <div class="com_group_menu" id="mc_end" data="c_end">截止报名日期<img style="display: none" src="/Public/images/correct.png"></div>
    <div class="com_group_menu" id="mc_feature" data="c_feature">特色主题<img style="display: none" src="/Public/images/correct.png"></div>
    <div class="com_group_menu" id="mc_imgupload" data="c_imgupload">上传图片<img style="display: none" src="/Public/images/correct.png"></div>
    <div class="com_group_menu" id="mc_lang" data="c_lang">语言服务<img style="display: none" src="/Public/images/correct.png"></div>
    <div class="com_group_menu" id="mc_travel" data="c_travel">旅程描述<img style="display: none" src="/Public/images/correct.png"></div>
    <div class="com_group_menu" id="mc_price" data="c_price">价格设置<img style="display: none" src="/Public/images/correct.png"></div>
    <div class="com_group_menu" id="mc_minperson" data="c_minperson">最低成团人数<img style="display: none" src="/Public/images/correct.png"></div>
    <div class="com_group_menu" id="mc_booking_policy" data="c_booking_policy">预订须知<img style="display: none" src="/Public/images/correct.png"></div>
    <div class="com_group_menu" id="mc_fee_desc" data="c_fee_desc">费用说明<img style="display: none" src="/Public/images/correct.png"></div>
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
