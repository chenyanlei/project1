<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
	<link rel="stylesheet" href="/Public/css/trip-calendar1.css"> 
	<link rel="stylesheet" type="text/css" href="/Public/css/aui.css" />
	<link rel="stylesheet" type="text/css" href="/Public/css/iconfont.css" />
    <title>选择日期</title>

	<style> 
	body{
		margin:0;
		padding: 0;
		background-color: #f1f1f1;
		font-family: 'Microsoft Yahei';
	}
	.selectdate{
	    text-align:left;
	    color:#0097d6;
	    background: url(/Public/images/22.png) no-repeat 10px 5px;
	    height:30px;
	    line-height: 30px;
	    font-size:20px;
	    padding-left: 40px;
	    background-color:#fff;
	}
	.clear{
		clear:both;
	}
	/*------------------------修改tri-calebdar1.css样式------------------------------------------*/
	.calendar-bounding-box .content-box .inner h4{
		line-height:60px;/*line-height:60px*/
	}
	.calendar-bounding-box .content-box .arrow span.prev-btn-disabled {
		color:#ccc;
		z-index:1;
		left:25%;
		top:17px
	}
	.calendar-bounding-box .content-box .arrow span.prev-btn:before{
		content: "\e60a";
	}

	.calendar-bounding-box .content-box .arrow span.prev-btn {
		z-index:1;
		left:25%;
		top:17px
	}

	.calendar-bounding-box .content-box .arrow span.next-btn:before {
		content: "\e609";
	}
	.calendar-bounding-box .content-box .arrow span.next-btn-disabled{
		color:#ccc;
		right:25%;
		top:17px;
	}
	.calendar-bounding-box .content-box{
		padding:0;/*padding:5px 30px 15px 30px;*/
	}
	.calendar-bounding-box .content-box .inner{
		padding:0;/*padding:0 10px*/
	}


	tr{
		display: -webkit-flex;
	}
	td,th{
		flex:1;
	}
	.calendar-bounding-box .content-box .inner table td {
	    height: 50px;/*height:40px*/
	}
	.calendar-bounding-box td.disabled a{
		color:#ccc!important;}
	/*td 里的价格begin*/
	.date_fix{
		font-size: 14px;
	}
	.date_pri{
		display: block;
		font-size: 10px;
		color:#fe9500;
	}
	.calendar-bounding-box td a {
	    width: 100%;
	    display: block;
	    color: #585858;
	    text-decoration: none;
	    background: #FFF -9999px -9999px no-repeat;
	}
	.calendar-bounding-box td.selected-date a .date_pri{
		color: #fff!important;
	}
	/*td 里的价格end*/


	/*日历状态介绍*/
	.cal_intro{
		display: -webkit-flex;
		padding: 20px 0;
		border-top: 1px solid #ccc;
		border-bottom: 1px solid #ccc;
		background-color: #fff;
		padding-left: 10px;
	}
	.cal_h{
		flex:1;
	    text-align: center;
	}
	.cal_top{
	    width:16px;
	    height:16px;
	    background:#f1f1f1;
	    float:left
	}
	.cal_middle{
	    width:14px;
	    height:14px;
	    border:#cccccc 1px solid;
	    float:left
	}
	.cal_bottom{
	    width:15px;
	    height:15px;
	    background:#0097d6;
	    float:left
	}
	.cal_n,.cal_m{
	    float:left;
	    margin-left:10px;
	    font-size: 12px
	}
	/*选择人数*/
	.cal{
		height:30px;
		float:right;
		margin-left:20px;
	}
	.cal .add,.cal .reduce {
	    width: 30px;
	    height: 30px;
	    line-height: 30px;
	    display: block;
	    float: left;
	    cursor: pointer;
	    text-align: center;
	    font-size: 22px;
	    color: #fff;
	    background: #7febff
	}
	.cal input {
	    float: left;
	    margin: 0 6px;
	    line-height: 30px;
	    width: 40px;
	    border: 1px solid #d9d9d9;
	    font-size: 16px;
	    height: 29px;
	    vertical-align: top;
	    outline: 0;
	    text-align: center;
	}
	.select_num{
		margin-top:5px;
		background-color: #fff;
		overflow: hidden;
		padding: 20px 0;
		padding-left: 10px
	}
	.sel_num{
		color:#777;
		font-size: 16px;
		float:left;
		width:100px;
		line-height:30px;
		height:30px;
	}
	/*数量价格*/
	.subprice,.num1,.subtotal{
		display: -webkit-flex;
		padding: 10px 0;
	    background-color: #fff;
	}
	.calender_info{
		margin-top:20px;
		margin-bottom:70px;
	}
	.calender_info_left{
		flex: 1;
		padding-left: 10px;
		color:#ff9500;
	}
	.calender_info_right{
		flex:1;
		text-align: right;
		padding-right: 10px;
	}
	.shuliang{
		padding-right: 18px;
	}
	/*预定按钮*/
	.order button[type="submit"]{
	    background: #00d8ff;
	    border:none;
	    color:#ffffff;
	    font-size:18px;
	    width: 40%;
	    padding: 10px 0;
		float:right;
	}
	.total_money{
		float:left;
		height:45px;
		line-height:45px;
		padding-left:10px;
		width:60%;
		background-color:#fff;
	}
	.order{
		position:fixed;
		bottom:0;
		width:100%;
		color:#ff9500;
	}
	/*解决适配问题*/
	.inner{
		width: 100%;
	}
	table{
		width: 100%;
	}

	.aui-bar-color,.aui-btn-color{
		background-color: #00d8ff;
	}
	.unit{
		color:#00d8ff;
	}
	button{
		border-radius:0px;
	}
	.total_money{
		border-top:solid 1px #ccc;
	}
	#total,.single{
		font-family:"iconfont" !important;
		font-size:16px;
		font-style:normal;
		-webkit-font-smoothing: antialiased;
		-webkit-text-stroke-width: 0.2px;
		-moz-osx-font-smoothing: grayscale;
	}
	#total:before,.single:before{
		content: "\e605";
	}
	.blank{
		height:1px;
		width:100%;
	}
</style>


</head>
<body>
	<header class="aui-bar aui-bar-nav aui-bar-color" id="aui-header">
	    <a class="aui-btn aui-btn-color aui-pull-left">
	        <span class="aui-iconfont aui-icon-left"  onclick="window.history.go(-1)"></span>
	    </a>
	    <div class="aui-title"><span class="country_name">日期人数选择</span></div>
	</header>
    <!-- <div class="selectdate">选择日期</div> -->
	<div class="c_center">
    	<div id="J_Calendar" class="calendar"></div>
	</div>

	<div class="clear"></div>
	<div class="calender_info" style="display:none">
		<div class="subprice">
			<span class="calender_info_left">单价:<span class="single"></span></span>
			<div class="calender_info_right">
				<div class="cal">
					<span class="reduce">-</span>
					<input class="nums" value="1" readonly>
					<span class="add">+</span>
				</div>
			</div>
		</div>
   </div>
<div class="blank"></div>
<form action="/webapp_order/fillcontact" method="post"> 
	<input type="hidden" name="date" value="" id="date">
	<input type="hidden" name="pid" value="<?=$pid;?>">
	<input type="hidden" name="aid" value="<?php if(isset($aid)) echo $aid; else echo '' ;?>">
	<input type="hidden" name="title" value="<?=urlencode($title);?>">		
	<input type="hidden" name="pnum" value="1" id="pnum">
	<input type="hidden" name="p_type" value="<?=$p_type;?>">				
	<div class="order">
		<div class="total_money">总额:<span id="total">0</span></div>
		<button type="submit" id="orderbtn">下一步</button>
	</div>
</form>
<script src="/Public/js/jquery-1.11.3.js"></script>
<script src="/Public/js/yui-min.js"></script>
<script src="/Public/js/trip-calendar1.js"></script>
<script src="/Public/js/date_fomat.js"></script>
<script src="/Public/js/layer.js"></script>
<script src="/Public/js/weixin-1.0.0.js"></script>
<script src="/Public/js/weixin-share.js"></script>
<script type="text/javascript">
$(function () {
	

	//日历
	var startdate = new Date();
	var enddate = null;
	var is_arr = 1;
	var start = '';
	var arraydate = null;
	var arrp = null;
	var p_type = '<?=$p_type;?>' - 0;
	var prices = '<?=json_encode($prices);?>';
	var arrayPrice = JSON.parse(prices);

	<?php  if($calendar_type == Ptype::CALENDAR_TYPE_DATE){ ?>
	start = arrayPrice[0]['calendar_from']*1000;

	if (start < startdate) {

		startdate = new Date();
	} else {
		startdate = (new Date(start-0)).Format("yyyy-MM-dd");
	}


	enddate = (new Date(start-0+15552000000)).Format("yyyy-MM-dd");
	arraydate = new Array();
	var arrPrice = '[{';
	var num = arrayPrice.length;
	for (var n in arrayPrice) {
		var date = new Date(parseInt(arrayPrice[n]['calendar_from']) * 1000);
		arraydate.push(date.Format("yyyy-MM-dd"));
		arrPrice += '"' + date.Format('yyyy-MM-dd') + '":"' + arrayPrice[n]['price1'] + '"';
		if ((n - 0 + 1) != num) {
			arrPrice += ',';
		}
	}
	arrPrice += '}]';
	arrp = (JSON.parse(arrPrice))[0];
	is_arr = 3;
	<?php }elseif($calendar_type == Ptype::CALENDAR_TYPE_A_PERIOD){ ?>
	start = arrayPrice[0]['calendar_from']*1000;
	//			alert(start);
	if (start < startdate) {
		startdate = new Date();
	} else {
		startdate = (new Date(start-0)).Format("yyyy-MM-dd");
	}
	var len = arrayPrice.length-0;
	end = arrayPrice[len-1]['calendar_to']*1000;
	enddate = (new Date(end-0)).Format("yyyy-MM-dd");

	var perPrice = '[{';
	for (var n in arrayPrice) {
		var from = new Date(arrayPrice[n]['calendar_from']*1000).Format("yyyy-MM-dd");
		var to = new Date(arrayPrice[n]['calendar_to']*1000).Format("yyyy-MM-dd");
		arrayPrice[n]['calendar_from'] = from;
		arrayPrice[n]['calendar_to'] = to;
		var key = arrayPrice[n]['id'];
		var value = arrayPrice[n]['price1']
		perPrice += '"'+key+'":"'+value+'"';
		if ((n - 0 + 1) != len) {
			perPrice += ',';
		}
	}
	perPrice +='}]';
	var pPrice = JSON.parse(perPrice)[0];
	is_arr = 2;
	arraydate = arrayPrice;
	arrp = pPrice;
	<?php }elseif($calendar_type == Ptype::CALENDAR_TYPE_FULL_YEAR){ ?>
	enddate = null;
	arrp = arrayPrice[0]['price1'];
	<?php } ?>
	var nowdate = new Date();
	var min_date = nowdate.getFullYear() +''+ ((nowdate.getMonth()+1)>9 ? (nowdate.getMonth()+1) : '0'+(nowdate.getMonth()+1))+''+ nowdate.getDate();
	function toNumber(dat){
		return dat.toString().replace(/-|\//g, '');
	}
	if(toNumber(startdate) < toNumber(min_date)){
		startdate = min_date;
	}
	var selectedDate =null;
	YUI().use('trip-calendar', function (Y) {

		/**
		 * 非弹出式日历实例
		 * 直接将日历插入到页面指定容器内
		 */
		var oCal = new Y.TripCalendar({
			contain: '#J_Calendar', //非弹出式日历时指定的容器（必选）
			// selectedDate: new Date,       //指定日历选择的日期
			count: 1,
			date:startdate,
			minDate: startdate,
			maxDate: enddate,
			isArrayDate: is_arr,
			arrayDate: arraydate,
			arrayPrice: arrp,
		});
		//日期点击事件
		oCal.on('dateclick', function () {
			selectedDate = this.get('selectedDate');
			var price = this.get('arrayPrice');
			var Dates = this.get('arrayDate');
			var isarr = this.get('isArrayDate');

			if(isarr === 1){
				var  single_p = price;

			}else if(isarr === 2){
				function test_price(dat,Date){
					for(var n in Dates){
						if(toNumber(dat) >= toNumber(Dates[n]['calendar_from'])  &&　toNumber(dat) <= toNumber(Dates[n]['calendar_to'])){
							return Dates[n]['id'];
						}
					}
				}

				var id = test_price(selectedDate);
				var  single_p = price[id];
			}else if(isarr === 3){
				var single_p = price[selectedDate];
			}
			var total_price = single_p*($('#pnum').val()-0);

			$('.single').html(single_p);
			$('#total').html(total_price);
			$('#price1').val(single_p);
			$('#totalprice').val(total_price);
			$('#date').val(selectedDate);
			$('.calender_info').css('display','block');
		});
	})
$("#J_Calendar").delegate("h4","click",function(event){
	event.preventDefault();
});
$('.add').click(function(){
		var num = parseInt($('.nums').val());
		var price = $('.single').html();
		if(num<10){
			num =num + 1;
			$('.nums').val(num);
			$('.num2').html('x'+num);
			var total = num*price;
			$('#total').html(total);
			$('#totalprice').val(total);
			$('#pnum').val(num);
			
		}	
	})
	$('.reduce').click(function(){
		var num = parseInt($('.nums').val());
		var price = $('.single').html();
		if(num>1){
			num =num - 1;
			$('.nums').val(num);
			$('.num2').html('x'+num);
			var total = num*price;
			$('#total').html(total);
			$('#totalprice').val(total);
			$('#pnum').val(num);

		}
	})
	$('#orderbtn').click(function(){
		var date = $('#date').val();
		if(!date){
			layer.msg('请选择日期');
			return false;
		}

		return true;
	})

	// ready参数
	  var title='逍品旅行';
	  var desc="逍品旅行，出境旅游优质供应商分销平台";
	  var link=window.location.href;
	  var imgUrl='http://a.qsctrip.com/Public/images/travel.png';
	  //ajax请求数据 
	  request_share();
	  //判断是否为微信内核
	  var ua = navigator.userAgent.toLowerCase();//获取判断用的对象
	  if (ua.match(/MicroMessenger/i) == "micromessenger") {
	      weixin_config(appId,timestamp,nonceStr,signature);
	      weixin_ready(title,desc,link,imgUrl);
	  } 
})	  

</script>
</body>
</html>
