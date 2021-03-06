<style type="text/css">
		.fillorder-main{
			width: 1200px;
			margin:0 auto;
			padding-bottom: 200px;
			overflow: hidden;
		}
		.progress{
			overflow: hidden;
			margin:20px 0;
			background-color: #fff;
			width: 1119px;
		}
		.progress1,.progress2,.progress3{
			width: 373px;
			height: 40px;
			float: left;
			line-height: 40px;
			text-align: center;
		}
		.progress1{
			background-image: url(/Public/images/first.png);
			background-repeat: no-repeat;
			background-size: 373px 40px;
			color: #fff;
		}
		.progress2{
			background-image: url(/Public/images/second.png);
			background-repeat: no-repeat;
		}
		.progress3{
			background-image: url(/Public/images/three.png);
			background-repeat: no-repeat;
		}
		.content{
			width:683px;
			padding: 30px;
			background: #fff;
			float: left;
		}
		.custip{
			font-size:15px;
			color:#585858;
			text-indent: 2.7em;
			background: url(/Public/images/pen.png) no-repeat;
			height:22px;
		}
		.pro_info,.contact,.customer{
			font-size:16px;
			color:#ffffff;
			height:40px;
			background: #b1f2fe;
			margin-top:20px;
			line-height: 40px;
			padding-left:40px; 
		}
		.pinfo{
			padding-left:40px; 
			font-size: 14px;
			color:#585858;
			margin:30px 0px;
		}
		.con_info,.cusinfo{
			margin-top:20px;
			font-size: 14px;
			color:#585858;
			position:relative;
			padding-left: 40px;

		}
		.con_info input,.cusinfo input,.cusinfo select{
			width:210px;
			height:36px;
		}
		.cusinfo #info-man,.cusinfo #info-female{
			width:50px;
			height:18px;
			margin-left:0px;
		}
		#info-man,#info-female {
			vertical-align:top;
		}
		.cusinfo label,.con_info label{
			display: inline-block;
			width:100px;
			font-weight:normal;
			color:#585858;
			font-size: 14px
		}
		.cus_title{
			margin-top:20px;
			color:#585858;
			padding-left: 40px;
		}
		.order{
			padding:0px 0px 0px 30px;
			float: left;
		}
		.order_title{
			color:#ffffff;
			background-color: #00d8ff;
			height:50px;
			line-height: 50px;
			font-size: 14px;
			text-align: center;
		}
		.uprice,.pnum{
			color:#585858;
			font-size: 12px
		}
		.uprice b{
			margin-left: 30px
		}
		.pnum b{
			font-size: 16px;
			color:#585858;
			margin-left: 235px
		}
		.orderinfo{
			padding:30px;
			background: #fff;
		}
		.sdivider{
			border-bottom:1px solid  #cccccc;
			margin:30px 0px;
		}
		.total{
			margin:30px 0px 40px;
			font-size: 12px;
			color:#585858;
		}
		.total b{
			font-size: 30px;
			color:#ff9500;
			margin-left: 30px
		}
		.sub{
			height:40pxs;
		}

		.order_error .triangle {
		    border-bottom: 2px solid transparent;
		    border-right: 20px solid rgba(51, 153, 204, 0.8);
		    border-top: 10px solid transparent;
		    display: none-block;
		    height: 0;
		    margin-left: -20px;
		    margin-right: 5px;
		    width: 0;
		}
		.order_error {
		    background-color:rgba(51, 153, 204, 0.8);
		    border-radius: 3px;
		    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
		    color: #fff;
		    font-size: 12px;
		    line-height:0px;
		    margin-left: 25px;
		    padding: 2px 0px;
		    height:25px;
		    border:green;
		    position:absolute;
		    top:0px;
		}
		button{
			outline: none;
		}
		.text-center{
			text-align: center;
		}
		#sub{
			width: 150px;
			height: 40px;
			font-size: 16px;
			font-weight: bold;
			color: #fff;
			background-color: #00d8ff;
			border: none;
			cursor: pointer;
		}
		.clear{
			clear:both;
		}
		input[type="radio"]:focus{
			outline:none
		}
	</style>
<div class="clear"></div>	
<div class="fillorder-main">
		<div class="progress">
			<div class="progress1">立即预定</div>
			<div class="progress2">在线支付</div>
			<div class="progress3">完成预定</div>
		</div>
		<div class="content">
			<form action="/order/addorder" method="post">
				<input type="hidden" class="required" value="<?=$pid;?>" name="pid">
				<input type="hidden" class="required" value="<?=$aid;?>" name="aid">
				<input type="hidden" class="required" value="<?=$pnum;?>" name="num">
				<input type="hidden" class="required" value="<?=$p_type;?>" name="p_type">
				<input type="hidden" class="required" value="<?=$date;?>" name="date">						
				<div class="conleft">
					<div class="custip">
						请填写游客信息后提交订单
					</div>
					<div class="pro_info">产品信息</div>
					<div class="pinfo">产品名称:&nbsp;<?=$title;?></div>
					<div class="pinfo">价格:&nbsp; ￥ &nbsp; <?=$price1;?> /人(人民币)</div>
					<div class="pinfo">日期:&nbsp; <?=$date;?></div>
					<div class="pinfo">人数:&nbsp; <?=$pnum;?>人</div>
					<div class="contact">联系人</div>
					<div class="contact_info">
						<div class="con_info">
							<label>姓名</label><input class="required" type="text"  name="nameo">
							<div class="order_error" style="display:none;">
								<div class="triangle"></div>
								<span>请输入汉字或字母！</span>
							</div>
						</div>	
						<div class="con_info"><label>联系人邮箱</label><input class="required" type="text" id="email" name="email[]">
						<div class="order_error" style="display:none;">
							<div class="triangle"></div>
							<span>邮箱格式错误！</span>
						</div>	
						</div>
						<div class="con_info"><label>联系人电话</label><input class="required" type="text" id="phone" name="phone[]">
						<div class="order_error" style="display: none;">
							<div class="triangle"></div>
							<span>电话格式错误！</span>
						</div>
						</div>
					</div>
					<div class="customer">旅客信息</div>
					<div class="customer_info">

						<?php 
						for($i=1;$i<$pnum+1;$i++){
							?>
						<div class="cuslist">
							<div class="cus_title">旅客<?=$i;?></div>
							<div class="cusinfo"><label>姓名</label><input class="required" type="text" name="name[]">
							<div class="order_error" style="display: none;">
							<div class="triangle"></div>
							<span>请输入汉字或字母！</span>
							</div>
							</div>
							<div class="cusinfo">
							<label>性别</label>
							<label style="font-size:18px;"><input id="info-man" type="radio" name="sex<?=$i;?>" checked value="0" class="required"> 男</label>
							<label style="font-size:18px;"><input id="info-female" type="radio" name="sex<?=$i;?>"  value="1" class="required"> 女</label>
								
							</div>
							<div class="cusinfo"><label>身份证号码</label><input class="required" type="text" name="id_card[]">
							<div class="order_error" style="display: none;">
							<div class="triangle"></div>
							<span>身份证号格式错误！</span>
							</div>
							</div>
							<div class="cusinfo"><label>护照号码</label><input class="required" type="text" name="passport[]">
							<div class="order_error" style="display: none;">
							<div class="triangle"></div>
							<span>护照号码格式不正确！</span>
							</div>
							</div>
						</div>
						<div class="divider"></div>
					   <?php }?>
					</div>
				</div>
		</div>
			<div class="order">
				<div class="order_title">订单结算</div>
				<div class="orderinfo">
					<div class="uprice">单价:<b>￥<?=$price1;?></b>(人民币)</div>
					<div class="sdivider"></div>
					<div class="pnum">数量:	<b>X<?=$pnum;?></b></div>
					<div class="total">总价:<b>￥<?=$pnum*$price1;?></b> (人民币)</div>
					<div class="text-center sub"><button id="sub">立即支付</button></div>
				</div>
			</div>
		</form>
</div>

<script type="text/javascript">
		 var top1=$(window).height();
		 var Top=$('.order').offset().top;
		 var Left=$('.order').offset().left;
		$(window).scroll(function(){
		  var sTop=$(window).scrollTop();
		  var sLeft=$(window).scrollLeft();
		 if(sTop > Top){
		 	$('.order').css({'position':'fixed','top':'0px','left':Left+'px','z-index':1});
		 }else{
		 	$('.order').css({
		 		'position':'relative','top':0,'left':0,'z-index':1
		 	});
		 }
		})



	//检查邮箱格式
    function is_email(email){
        //检测用户名的格式是否ok
        var reg = /^[0-9A-Za-zd]+([-_.][A-Za-zd]+)*@([0-9A-Za-zd]+[-.])+[A-Za-zd]{2,5}$/;
        //获取用户名的值
        //检测   exec
        return reg.test(email);
    }

    //检查手机号格式
    function is_phone(phone){
    	var reg = /^1[3-9][0-9]{9}$/; 
    	//检测   exec
        return reg.test(phone);
    }
    function is_name(name){
    	var reg =/^[^\d]+$/;
    	//检测   exec
        return reg.test(name); 
    }

    function is_idnumber(idnum){
    	var reg = /(^\d{15}$)|(^\d{17}(\d|X)$)/;
    	//检测   exec
        return reg.test(idnum);  
    }
    function is_passport(pass){
    	var reg = /^1[45][0-9]{7}$|E[0-9]{8}$|G[0-9]{8}$|P[0-9]{7}$|S[0-9]{7,8}$|D[0-9]+$/;
    	//检测   exec
        return reg.test(pass);
    }
    function checkemail(){

    	var email = $('#email').val();
    	if(is_email(email)){
    		ui_true($('#email'));

    		return true;
    	}else{
    		ui_false($('#email'));
    		$('#email').trigger('focus');
    		return false;
    	}
    }
    function checkphone(){
    	var phone = $('#phone').val();
    	if(is_phone(phone)){
    		ui_true($('#phone'));
    		return true;
    	}else{
    		ui_false($('#phone'));
    		$('#phone').trigger('focus');
    		return false;
    	}
    }

    function checkname(a){
    	var name = a;
    	if(is_name(name.val())){
    		ui_true(name);
    		return true;
    	}else{
    		ui_false(name);
    		return false;
    	}
    }

    function checkidnum(b){

    	var idnum= b;
    	if(is_idnumber(idnum.val())){
    		ui_true(idnum);
    		return true;
    	}else{
    		ui_false(idnum);
    		return false;
    	}
    }

    function checkpass(c){
		var passport = c;
    	if(is_passport(passport.val())){
    		ui_true(passport);
    		return true;
    	}else{
    		ui_false(passport);
    		return false;
    	}
    }
    function ui_false(e){
    	e.next().css('display','inline');
    	e.addClass('error');
    	e.trigger('focus');
    }

    function ui_true(e){
       e.next().css('display','none');
       e.removeClass('error');

    }

    $('#email').blur(function(){
    	checkemail();
    })
    $('#phone').blur(function(){
    	checkphone();
    })
    $('input[name="name[]"]').blur(function(){
    	var a = $(this);
    	checkname(a);
    })

    $('input[name="nameo"]').blur(function(){
    	var a = $(this);
    	checkname(a);
    })
    $('input[name="id_card[]"]').blur(function(){
    	var b = $(this);
    	checkidnum(b);
    })

    $('input[name="passport[]"]').blur(function(){
    	var c = $(this);
    	checkpass(c);
    })

    function checkallname(){

    	var allname = $('input'); 
    	var is_passall = new Array();
    	var IS_PASS = false;
    	allname.each(function(index,el) {
    		if(this.getAttribute('class')!='required'){
    			is_passall.push(false);		
    		}else{
    			is_passall.push(true);
    		}
    	})

    	if(is_passall.contains(false)){
    		IS_PASS = false;
    	}else{
    		IS_PASS = true;
    	}	
    	console.log(is_passall);
    	return IS_PASS;
    }

    Array.prototype.contains = function (element) {
	    for (var i = 0; i < this.length; i++) {
	        if (this[i] == element) {
	            return true;
	        }
	    }
	    return false;
	} 
    $('#sub').click(function(){
    	$('input').trigger('blur');
    	if(checkallname()){
    		return true;
    	}

    	return false;
    })
	</script>