<!-- <link rel="stylesheet" href="/Public/css/bootstrap.min.css"> -->

<style type="text/css">
		.payDone-main{
			width: 1200px;
			margin:0 auto;
			padding-bottom: 200px;
		}
		.Dprogres{
			margin-top: 10px;
			height:40px;
			width:1119px;
			background-color: #fff;
			overflow: hidden;
			margin-bottom: 20px;
		}
		.Dprogress1,.Dprogress2,.Dprogress3{
			float: left;
			width: 373px;
			height: 40px;
			text-align: center;
			line-height: 40px;
			font-size: 16px;
		}
		.Dprogress1{
			color:#585858;
			background-image: url(/Public/images/firsted.png);
			background-repeat: no-repeat;
		}
		.Dprogress2{
			background-image: url(/Public/images/second.png);
			background-repeat: no-repeat;
			color:#585858;
		}
		.Dprogress3{
			background-image: url(/Public/images/threeing.png);
			background-repeat: no-repeat;
			color: #fff;
		}
		.success{
			color:#0097d6;
			font-size: 24px;
		}
		.success i{
			background: url(/Public/images/correct.png) no-repeat 0px 6px;
			padding: 10px 0px
		}
		.order{
			width:233px;
			margin:0 auto;
		}
		.orderinfo{
			margin-top: 15px;
			color:#585858;
			margin-left:23px
		}

		.returninfo{
			margin-top: 20px;
			text-indent: 2em;
			font-size: 12px
		}
		.returninfo a{
			color:#0097d6;
		}
		.done-back{
			width: 1119px;
			background-color: #fff;
			padding:100px 0;
		}
		.back-center{
			margin:0 auto;
			width: 500px;
			text-align: center;
		}
		</style>

	<div class="payDone-main">
		<div class="Dprogres">
			<div class="Dprogress1">立即预定</div>
			<div class="Dprogress2">在线支付</div>
			<div class="Dprogress3">完成预定</div>
		</div>
		<div class="done-back">
			<div class="back-center">
				<div class="success"><i>　　</i>您已成功付款</div>
				<div class="orderinfo">订单号: <?=$order_id;?></div>
				<div class="orderinfo">在线支付：<?=$total_fee;?>&nbsp;</div>
				<div class="returninfo">你可以 &nbsp;<a href="/publish/product_mng">回到首页</a>  &nbsp;&nbsp;<a href="/order/detail?order_id=<?=$order_id;?>">查看订单详情</a></div>
			</div>
		</div>	
	</div>	
