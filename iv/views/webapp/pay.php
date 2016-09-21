<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	<meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
	<title>订单确认</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/aui.css">
	<style type="text/css">
		img.aui-img-object {
			border-radius: 50%;
		}
		.laud {
			font-size: 14px;
			color: #999;
		}
		p {
			margin: 5px 0 !important;
			display: table;
		}
        .helper-tag {
            color: #666666;
            font-size: 12px;
        }
        #sub{
            width:100%;
            padding:10px 0;
            font-size:16px;
            font-weight:bold;
        }
        .aui-btn{
            border-radius:0px;
        }
        .aui-btn-row:after {
            border-bottom:0;
        }
        .aui-list-view-cell:after{
            border-bottom:0;
        }
        .aui-list-view-cell:last-child:after {
            border-bottom:0;
        }
        .aui-list-view:after {
            border-top:0;
        }
        .aui-content,.aui-list-view,.aui-content > .aui-list-view:last-child{
            margin-bottom:0;
        }
        
	</style>
</head>
<body>

<p class="aui-text-center aui-padded-10 ">订单信息</p>
	<section class="aui-content">
		<ul class="aui-list-view">
            <li class="aui-list-view-cell">
            		<p class='aui-ellipsis-1'>
                    订单号：<?=$order_id;?>
                    </p> 
                    <p class='aui-ellipsis-1'>
                     应付金额: <?=$unit_price;?>元 
                    </p>
              		<p class='aui-ellipsis-1'>
                    <?=$title;?>
                    </p>
                    <p class='aui-ellipsis-2'>
                    	出发日期：<?=date('Y/m/d',$travel_date);?>
                    </p>
                   
            </li>       
           
        </ul>
	</section>
<p class="aui-text-center aui-padded-10 ">联系人信息</p>
	<section class="aui-content">
		<ul class="aui-list-view">
        <?php 
               $i=0;
            foreach($contact as $v){
                if($v['is_contact']==1){
            ?>
              <li class="aui-list-view-cell">
                    <p class='aui-ellipsis-2'>
                    	联系人：<?=$v['name'];?>
                    </p>
                    <p class='aui-ellipsis-2'>
                    	邮箱：<?=$v['email'];?>
                    </p>
                    <p class='aui-ellipsis-2'>
                    	联系电话：<?=$v['phone'];?>
                    </p>
             </li>

        </ul>
	</section>
<p class="aui-text-center aui-padded-10 customer_info">旅客信息</p>
	<section class="aui-content customer_info">
		<ul class="aui-list-view">
        <?php }else{

                if($v) {
                    $i++;


                    ?>
                    <li class="aui-list-view-cell sign">
                        <h4>旅客<?= $i; ?></h4>
                        <p class='aui-ellipsis-2'>
                            姓名： <?= $v['name']; ?>
                        </p>
                        <p class='aui-ellipsis-2'>
                            性别：<?= $v['sex'] == '1' ? '女' : '男'; ?>
                        </p>
                        <p class='aui-ellipsis-2'>
                            身份证号：<?= $v['id_card']; ?>
                        </p>
                        <p class='aui-ellipsis-2'>
                            护照号码：<?= $v['passport']; ?>
                        </p>
                    </li>
                    <?php
                }
            }

             }
             ?>
        </ul>
	</section>
<p class="aui-text-center aui-padded-10 ">结算信息</p>
	<section class="aui-content">
		<ul class="aui-list-view">
              <li class="aui-list-view-cell">
              		<h4 class="aui-text-right">单价：￥<?=$unit_price;?></h4>
                    <p class='aui-ellipsis-2 aui-text-right'>
                    	数量：X<?=$num;?>
                    </p>
                    <h2 class="aui-text-right">总金额：￥<?=$total_fee;?>元</h2>
            </li> 
           
        </ul>
	</section> 
    <form action="http://api.qsctrip.com/wx_pay/pay" method="post"  target="_blank">
        <input type="hidden" name="out_trade_no" value="<?=$order_id;?>">
        <input type="hidden" name="total_fee" value="0.01">
        <input type="hidden" name="subject" value="<?=$title;?>">
        <input type="hidden" name="openid" value="<?=$openid;?>">
        <input type="hidden" name="redirect_url" value="<?=urlencode("http://a.qsctrip.com/webapp_order/get_order_detail?order_id=$order_id");?>">
    </form>     
	<div class="aui-btn-row">
            <div class="aui-btn aui-btn-success" id="sub">去支付</div>  
    </div>
<input type="hidden" value="<?=$aid;?>" id="aid">
</body>
<script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>
<script>
    $(function () {
        stopDrop();
        //禁止下拉回弹
        function stopDrop() {
            var lastY;//最后一次y坐标点
            $(document.body).on('touchstart', function(event) {
                lastY = event.originalEvent.changedTouches[0].clientY;//点击屏幕时记录最后一次Y度坐标。
            });
            $(document.body).on('touchmove', function(event) {
                var y = event.originalEvent.changedTouches[0].clientY;
                var st = $(this).scrollTop(); //滚动条高度  
                if (y >= lastY && st <= 10) {//如果滚动条高度小于0，可以理解为到顶了，且是下拉情况下，阻止touchmove事件。
                    lastY = y;
                    event.preventDefault();
                }
                lastY = y;
         
            });
        }
        var aid = $('#aid').val();
        $('body').delegate('.page_home','click',function() {
            window.location.href="/webapp_product/get_a_product_list?aid="+aid
        });
         $("#sub").click(function () {
          $('form').trigger('submit');
        })

        $('.sign').length === 0 && $('.customer_info').css('display','none');
        
    })
</script>

</html>