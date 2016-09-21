<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css">
    <style>
        *{
            margin:0;
            padding:0;
        }
        a:link,a:hover,a:active,a:visited{
            text-decoration: none !important;
        }
        ul li{
            list-style: none;
        }
        button{
            outline: none;
        }
        body,html{
            font-size: 14px;
            font-family:"Microsoft YaHei";
            height: 100%;
            background-color: #f5f5f5;
        }
        .pay-mian{
            width: 1200px;
            margin:0 auto;
            padding-bottom: 200px;
        }
        .headpay{
            width: 1119px;
            height: 40px;
            background-color:#fff;
            color:#585858;
            overflow: hidden;
            margin-top:30px;
        }
        .heada,.headb,.headc{
            float: left;
        }
        .heada{
            background: url("/Public/images/firsted.png") no-repeat;
            text-align: center;
            font-size: 16px;
            width: 373px;
            height: 40px;
            line-height: 40px;

        }
        .headb{
            background: url("/Public/images/seconding.png") no-repeat 0px 0px;
            text-align: center;
            font-size: 16px;
            width: 373px;
            height: 40px;
            color:#fff;
            line-height: 40px;
        }
        .headc{
            background: url("/Public/images/three.png") no-repeat 0px 0px;
            text-align: center;
            font-size: 16px;
            width: 373px;
            height: 40px;
            line-height: 40px;
        }
        .zone{
            height: 20px;
            background-color: #f5f5f5;
        }
        .paymassage{
            font-size: 20px;
        }
        .paymassageb{
            color:#0097d6;
        }
        .paynumber{
            margin-top: 30px;
            font-size: 16px;
        }
        .paynumberb{
            font-family: "Arial Black", arial-black;
            color:#585858;
        }
        .paymoney{
            margin-top: 30px;
        }
        .paymoneya{
            font-size: 16px;
            color:#585858;
        }
        .paymoneyb{
            font-size: 30px;
            color:#ff9500;
        }
        .payway{
            margin-top: 30px;
        }
        .paywaya{

            font-size: 14px;
            color:#585858;
        }
        .paywayb{
            margin-top: 5px;
            width: 1058px;
            border: 1px solid #CCCCCC;
            border-radius: 4px;
        }
        .paywayba{
            margin-top: 30px;
            height: 80px;
            width: 1000px;
            //border-bottom: 1px dashed #CCCCCC;
            margin-left:30px
        }
        #inlineRadio1{
            margin-top: 20px;
            font-size: 10px;
        }
        #inlineRadio2{
            margin-top: 20px;
            font-size: 10px;
        }
        #Radio3{
            margin-top: 20px;
            font-size: 10px;
        }

        .paywayba1{
            margin-left: 20px;
        }
        .paywayba2{
            width: 50px;
            height: 50px;
            margin-left: 10px;
            margin-right: 50px;
        }
        .paywayba3{
            width: 85px;
            height: 53px;
            margin-right: 50px;
        }
        .paywaybb{
            margin-left: 30px;
            margin-top: 30px;
            height: 50px;
        }
        .paywaybb1{
            height: 20px;
            font-size: 14px;
            color:#585858;
            margin-left: 20px;
            margin-top: 30px;
        }

        .nextdiv{
            height: 80px;
            margin-top: 30px;
        }
        .next{
            text-align: center;
            width: 150px;
            height: 50px;
            border-radius: 40px;
            border: 1px solid #0097d6;
            background-color: #0097d6;
            font-size: 16px;
            margin-left: 475px;
            color:#ffffff;
        }
        .image-circle1{
            background: url("/Public/images/icon_choose_01.png");
            width: 10px;
            height: 10px;
        }
        .diveder{
            border:solid #cccccc 1px;
            margin:30px 0px
        }
        .top{
            background-color: #fff;
            width: 1119px;
            padding: 30px;
        }

        .pro_intro{
            color:#585858;
            font-size:18px;
            font-weight:bold;
        }
        .pro_title{
            font-size:16px;
            color:#585858;
            margin:20px 0px 10px
        }
        .pro_price{
            font-size:14px;
            color:#585858;
        }
        .pro_price span{
            font-size:18px
        }
        .pro_detail{
            font-size:14px;
            color:#585858
        }
        .pro_detail div{
            margin-top:10px
        }
        .contact_info{
            font-size:14px;
            color:#585858;
        }
        .contact_info,.cus_info{
            color:#585858;
            margin-top:10px;
            font-size:14px
        }
        .customer{
            font-size:16px;
            color:#585858;
            margin-top:20px;
        }
        .detail{
            margin-top:30px;
            height:40px;
            background:#cccccc;
            color:#585858;
            line-height:40px;
            font-size:16px;
            text-align:center;
            cursor:pointer;
        }
       .up{
            background:#cccccc url(/Public/images/up.png) no-repeat 583px 12px;
        }
        .down{
             background:#cccccc url(/Public/images/down.png) no-repeat 583px 12px;
        }
        .productinfo{
            display:none;
        }
        .image-circle{
            width: 20px;
            height: 20px;
            opacity: 0;
        }
        .radio-inline{
            background: url("/Public/images/icon_choose_02.png")no-repeat 0px 15px;
        }

        .pactive{
             background: url("/Public/images/icon_choose_01.png")no-repeat 0px 15px;
        }
        .clear{
            clear:both;
        }
    </style>
    <script>

    </script>
<div class="clear"></div>   
<div class="pay-mian" style="padding-bottom:300px">
        <form action="/pay/alipay_create_direct_pay_by_user" method="post"  target="_blank">
        <div class="headpay">
            <div class="heada">立即预定</div>
            <div class="headb">在线支付</div>
            <div class="headc">完成预定</div>
        </div>
        <div class="zone"></div>
        <div class="top">
            <div class="paymassage">
                <span>您预定的一</span>
                <span class="paymassageb"><?=$title;?></span>
                <span>预定成功</span>
            </div>

            <div class="paynumber">
                订单号：<span class="paynumberb"><?=$order_id;?></span>
            </div>

            <div class="paymoney">
                <span class="paymoneya">应付金额:</span>
                <span class="paymoneyb"><?=$total_fee;?>元</span>
            </div>
            <div class="productinfo">
            <div class="diveder"></div> 
            <div class="pro_intro">产品信息</div>
            <div class="pro_title">产品名称： <?=$title;?></div>
            <div class="pro_price">价格： ￥ <span><?=$unit_price;?></span>/人</div>
            <div class="pro_detail">    
                <div>日期： <?=date('Y/m/d',$travel_date);?></div>
                <div>人数： <?=$num;?>人</div>
            </div>
             <div class="diveder"></div> 
            <div class="pro_intro">联系人</div>
            <?php 
               $i=0;
            foreach($contact as $v){
                if($v['is_contact']==1){
            ?>
            <div class="contact_info">姓名:<?=$v['name'];?></div>
            <div class="contact_info">邮箱： <?=$v['email'];?></div>
            <div class="contact_info">联系电话： <?=$v['phone'];?></div>
            <div class="diveder"></div> 
            <div class="pro_intro">游客信息</div>
            <?php }else{

                
                    $i++;
             
                
             ?>
       
            <div class="customer">游客<?=$i;?></div>
            <div class="cus_info">姓名：<?=$v['name'];?></div>
            <div class="cus_info">性别：<?=$v['sex']=='1'?'女':'男';?></div>
            <div class="cus_info">身份证号：<?=$v['id_card'];?></div>
            <div class="cus_info">护照号码：<?=$v['passport'];?></div>
            <?php 
            }

             }
             ?>
            </div>
            <div class="detail down">查看详情</div> 
            <div class="payway">
                <div class="paywaya">支付方式</div>
                <div class="paywayb">
                    <div class="paywayba">
                        <label class="radio-inline pactive">
                            <input class="image-circle " type="radio" name="payway"  value="/pay/alipay_create_direct_pay_by_user">
                            <span class="paywayba1">支付宝支付</span>
                            <img class="paywayba2" src="/Public/images/zhifu.png"/>
                        </label>
                        <label class="radio-inline">
                            <input class="image-circle" type="radio" name="payway"  value="option2">
                            <span class="paywayba1">微信支付</span>
                            <img class="paywayba3" src="/Public/images/weixin3.jpg"/>
                        </label>
                    </div>
                      
                    <input type="hidden" name="out_trade_no" value="<?=$order_id;?>">
                    <input type="hidden" name="total_fee" value="<?=$total_fee;?>">
                    <input type="hidden" name="subject" value="<?=$title;?>">   
                <!--    <div class="paywaybb">
                      
                        <label><input type="radio" id="Radio3" disabled value="option3"> <span class="paywaybb1">银联支付</span>
                        </label>
                     
                    </div>-->

                </div>
               
            </div>

            <div class="nextdiv">
                <input class="next" type="submit" value="下一步" style="outline:none">
            </div>
            
        </div>
        </form>
</div>
<script>
    $('.detail').click(function(){
       var e = $(this);
       if(e.attr('class') == 'detail down'){
            e.attr('class','detail up');
            $('.productinfo').css('display','block');
            e.html('收起详情');
       }else{
            e.attr('class','detail down');
            $('.productinfo').css('display','none');
            e.html('查看详情');
       }
    })

     $(".image-circle").click(function () {
        if(!$(this).attr('checked')) {
            $(this).parent().addClass('pactive').siblings().removeClass('pactive');
        }
   })

  

</script>
