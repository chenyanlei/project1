<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/> 
    <title>微信支付</title><style>
		body{
			background-color: #f1f1f1;
			font-family: 'Microsoft Yahei'
		}
		.pay_info_name,.pay_info_pri{
			/*display: -webkit-flex;*/
			padding: 20px 0;
			padding-left:10px;
			background-color: #fff;
		}
		.pay_info_pri{
			display: -webkit-flex;
		}
		.pay_order_title{
			font-size: 14px;
			color: #585858;
			/*flex:1;*/
		}
		.pay_order_price,.pay_order_name{
			/*flex: 4;*/
			font-size: 14px;
			color:#585858;
			/*font-weight: bold;*/
		}

		.pay_order_name{
			 margin-top: 10px;
		 }

		.pay_info_name{
			border-bottom:1px solid #ccc;
			/*border-radius: 4px 4px 0 0;*/
		}
		.pay_info_pri{
			/*border-radius:  0 0 4px 4px;*/
		}
		.apply_btn{
			text-align: center;
			padding: 10px 0;
			color: #fff;
			font-size: 16px;
			font-weight: bold;
			background-color: #43cb5a;
			border-radius: 0px;
			margin-top: 30px;
		}
	</style>
</head>
<body>
	<div class="pay_info">
		<div class="pay_info_name">
			<div class="pay_order_title">订单名称：</div>
			<div class="pay_order_name"><?php echo $order_name;?></div>
		</div>
		<div class="pay_info_pri">
			<div class="pay_order_title">订单价格：</div>
			<div class="pay_order_price"><span></span><?php echo $total_fee_display;?>元</div>
		</div>
		<div class='apply_btn' onclick="callpay()">微信支付</div>
	</div>

	<?php var_dump($jsApiParameters) ; ?>
</body>
</html>

<script type="text/javascript">
	var success_url = "<?php echo $redirect_url;?>" ;
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				if(res.err_msg=="get_brand_wcpay_request:ok"){
					location.href = success_url;
				}else if(res.err_msg=="get_brand_wcpay_request:cancel"){

				}else{
					alert(res.err_msg+"支付失败,请联系客服人员");
				}
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
			if( document.addEventListener ){
				document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
			}else if (document.attachEvent){
				document.attachEvent('WeixinJSBridgeReady', jsApiCall);
				document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
			}
		}else{
			jsApiCall();
		}
	}

//	callpay() ;
</script>