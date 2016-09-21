<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	<meta name="format-detection" content="telephone=no,email=no,date=no,address=no">
	<title>订单详情</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/aui.css">
	<style type="text/css">
    body{
      font-family: 'Microsoft Yahei';
    }
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
        .aui-pull-left{
            width:250px;
        }
        .aui-img-body p{
            padding-left:20px
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
        .aui-btn-success {
            color: #ffffff;
            background-color: #00d8ff;
            border: 1px solid #00d8ff;
        }
        button, .aui-btn {
            width: 100%;
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
                        <a href="/webapp_product/product_detail?pid=<?=$pid;?>&p_type=<?=$p_type;?>&aid=<?=$aid;?>" style="color:#00d8ff"><?=$title;?> </a>
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
<p class="aui-text-center aui-padded-10 " id="customer">旅客信息</p>
	<section class="aui-content">
		<ul class="aui-list-view">
        <?php }else{

                
                    $i++;
             
                
             ?>
            <li class="aui-list-view-cell customer">
              		<h4>旅客<?=$i;?></h4>
                    <p class='aui-ellipsis-2'>
                    	姓名： <?=$v['name'];?>
                    </p>
                    <p class='aui-ellipsis-2'>
                    	性别：<?=$v['sex']=='1'?'女':'男';?>
                    </p>
                    <p class='aui-ellipsis-2'>
                    	身份证号：<?=$v['id_card'];?>
                    </p>
                    <p class='aui-ellipsis-2'>
                    	护照号码：<?=$v['passport'];?>
                    </p>
            </li> 
           <?php 
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
 <p class="aui-text-center aui-padded-10 ">订单状态</p>
    <section class="aui-content">
        <ul class="aui-list-view">
              <li class="aui-list-view-cell">
                    <h4 class="aui-text-right">
        <?php      
        $status = (int)$order_cur_status['status'];
              
        switch ($status)
        {
        case Ptype::ORDER_STATUS_WILL_PAY:
          echo "待支付";
          break;
        case  Ptype::ORDER_STATUS_PAYED:
          echo "已支付";
          break;
        case Ptype::ORDER_STATUS_CANCELING:
          echo "取消中";
          break;
        case Ptype::ORDER_STATUS_CANCELED:
          echo "已取消";
          break;
        case Ptype::ORDER_STATUS_AGREE:
          echo "已同意";
          break;
        case Ptype::ORDER_STATUS_REJECT:
          echo "已拒绝";
          break;
        case Ptype::ORDER_STATUS_REFUND_CHECHING:
          echo "退款审核中";
          break;
        case Ptype::ORDER_STATUS_REFUNDING:
          echo "退款中";
          break;
        case Ptype::ORDER_STATUS_REFUNDED:
          echo "退款完成";
          break;
        case Ptype::ORDER_STATUS_REFUND_FAILED:
          echo "退款失败";
          break;
        case Ptype::ORDER_STATUS_CLOSED:
          echo "已关闭";
          break;
        case Ptype::ORDER_STATUS_END:
          echo "已完成";
          break;           
        }
       ?>
                    
                    </h4>
            </li> 
           
        </ul>
    </section>    
   <div class="aui-btn-row">
            <div  class="aui-btn aui-btn-success" onclick="javascript:location.href='/webapp_user/mycenter?aid=<?=$aid;?>'">去首页</div>  
    </div>
</body>
<script src="/Public/js/jquery-1.11.3.js"></script>
<script>
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
    $('.customer').length === 0 && $('#customer').css('display','none');
</script>
</html>