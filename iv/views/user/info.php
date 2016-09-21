<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>信息认证</title>
	<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
	<script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<script src="/Public/js/plupload/plupload.full.min.js"></script>
	<script src="/Public/js/layer.js"></script>
	<script src="/Public/js/qiniu/qiniu.js"></script>
	<style type="text/css">

		.d_logo {
			float: left;
		}
		.logo{
			margin: 20px 20px 20px 80px;
		}

		.header{
			height:80px;
			background: #0097d6;
			padding:0px;
		}
		.header_logo{
			background: url(/Public/images/nlogo.png) no-repeat 0px 20px;
			width:170px;
			height: 90px;
			margin:0px 0px 20px 80px;
			float:left;
		}
		.header_right{
			float:right;
			padding:25px 80px;
		}
		.header_right select{
			width:150px;
			height:30px;
		}
		
		.content{
			background:#f1f1f1;
			padding:30px 80px;
		}
		.con{
			background: #ffffff;
			margin:0 auto;
			width:900px;
			min-height: 740px
		}
		.con_title{
			text-align: center;
			padding-top: 40px;
			font-size: 16px;
			color:#585858;
		}
		
		.con_list{
			margin:25px 0px 0px 50px;
		}
		.con_list label{
			font-weight: normal;
			width:102px;
			text-align: right;
			margin-right:20px;
			font-size: 14px;
			color: #585858 
		}
		.con_list input{
			width:330px;
			height:30px;
			padding-left: 10px;
			border:solid 1px #cccccc;
			font-size: 14px;
			color:#cccccc;
		}
		.con_list input[type='radio']{
			width:20px;
			font-size: 14px;
			height:10px;
			line-height: 10px
		}
		.con_list input:focus,.con_list input:hover{
			border-color:#0097d6;
			color:#000000;
		}
		
		.is_agree{
			margin-left:269px;
			padding:30px 0px;
			height:50px;
		}
		.is_agree i{
			
			width:20px;
			height:60px;
			display: inline-block;
			float:left;
		}
		
		
		.ag_text{
			color:#585858;
			font-size: 14px;
			margin-left:10px;
			float:left;
		}
		.sub{
			margin:20px auto 0px;
			width:150px;
			padding-bottom: 84px
		}
		.bt{
			display: inline-block;
			background: #0097d6;
			color: #ffffff;
			width:150px;
			height: 40px;
			border:none;
		}
		.proccess{
			padding: 0px;
			height: 38px;
			border-bottom: solid #cccccc 1px;
			clear: both;
			display: block;
		}
		.proccess li{
			list-style: none;
			float:left;
			height:38px;
			line-height: 38px;
			width:300px;
			text-align: center;
		}
		.current{
			background: #0097d6;
			color:#ffffff;
		}
		.nnext{
			background: url(/Public/images/icon-left.png) no-repeat;
			color:#585858;
		}
		.next{
			background: url(/Public/images/icon-angle.png) no-repeat;
			color:#585858;
		}
		.con_right{
			width:500px;
			float: left;
			text-align: center;
			margin-top: 100px
		}
		.inner_con{
			width:700px;
			float:left;
			border-right:1px solid #cccccc;
			margin-top: 20px
		}
		.clear{
			clear: both
		}
		.con_add{
			clear:both;
		}
		.current_foot{
			background: url(/Public/images/icon-right.png) no-repeat center right;
		}
		.nexta{
			background: url(/Public/images/icon-angle.png) center right no-repeat;
			color:#585858;
			position: relative;
			width:250px;
		}
		.info{
			width:580px;
			border:solid 1px #cccccc;
			margin:0 auto;
			height:auto;
			margin-top: 40px
		}
		.item{
			padding:0px;
		}
		.item li{
			width:289px;
			list-style: none;
			float: left;
			text-align: center;
			height:40px;
			line-height: 40px
		}
		.norm{
			background: #e5e5e5;
			color: #585858;
		}
		.mactive{
			background: #7fcbea;
			color:#ffffff;
		}
	
		.company{
			display: none
		}
		.person,.company{
			margin-top: 80px;
			padding-bottom:30px 
		}
		.protocol{
			padding:10px;
			border:solid 1px #cccccc;
			margin: 20px auto 0;
		    width: 580px;
			margin-bottom: 20px;
			background: #f8f8f8
		}
		.bt{
			display: block;
			margin: 0 auto
		}
		.upload{
			float: left;
		}
		.img_circle{
            width: 20px;
            height: 20px;
            opacity: 0;
        }
		
        .radion{
            background: url("/Public/images/icon_choose_02.png") no-repeat 0px 0px;
        }

        .pactive{
             background: url("/Public/images/icon_choose_01.png") no-repeat  0px 0px;
        }
        .imgup{
        	float:left;
        	width: 210px;
        	position: relative;
        }
        .imgup span{
        	left: 211px;
		    position: absolute;
		    top: 107px;
		    width: 35px;
        }
        .upbtn{
        	width:60px;
        	height:30px;
        	color:#ffffff;
        	line-height: 30px;
        	background: #00bc00;
        	display: block;
        	text-align: center;
        	font-size: 14px;
        }
        .img_rq{
        	font-size: 12px;
        	color:#cccccc;
        }
        .upload1{
        	margin: 20px 0 0 122px;
        }
        .agree{
        	margin: 20px auto 0;
		    width: 580px;
		    color:#585858;
		    text-indent: 2em;
		    background: url(/Public/images/bcheck_01.png) no-repeat;
        }
        .seled{
			background: url(/Public/images/bcheck_02.png) no-repeat 0px 0px;
		}
		button[disabled]{
			background: #cccccc
		}
		.con_list{
            display: inline-block;
            vertical-align: middle;
            position: relative;
        }
        .valid,.invalid{
            display: none;
            line-height: 1.5;
            position: absolute;
        }
        .invalid {
            color: #999;
            left: 123px;
            margin-top: 4px;
            top:95%;
            white-space: nowrap;
            word-break: keep-all;
        }
        .valid {
            background-position: 0 -125px;
            line-height: 1.5;
            position: absolute;
            left: 93%;
            margin-top: -0.75em;
            top: 45%;
         }
        .invalid i{
            background-position: 0 5px;
            left: -20px;
            position: absolute;
            top: 34%;
        }
        .invalid i {
            background-image: url("/Public/images/wrong1.png");
            background-repeat: no-repeat;
        }
        .valid{
           background-image: url("/Public/images/sign.png?2");
           background-repeat: no-repeat;
       }
       .valid,.invalid i {
            height: 20px;
            margin-top: -10px;
            width: 20px;
       }
       .loadimg{
       		float:left;
       }
       .loadimg a:hover,.loadimg a:focus{
       		text-decoration: none;
       		color: #ffffff
       }
       .layui-layer-dialog .layui-layer-content {
       		text-align: center;
       		font-size: 12px;
       		color:#585858;
       		background: url("/Public/images/wrong1.png") no-repeat 28px 25px;
    		
       }
	</style>
</head>
<body>

	<div class="header">
		<a class="pull-left" href="">
			<div class="d_logo">
				<img class="logo" src="/Public/images/logo-white.png">
			</div>
		</a>
		<div class="header_right">
			<select name="" id="">
				<option value="中文">中文（简体）</option>
				<option value="English">English</option>
			</select>
		</div>
	</div>
	<div class="content">
		<div class="con">
			<ul class="proccess">
				<li class="current_foot">1 账号信息</li>
				<li class="current">2 完善信息</li>
				<li class="nnext">3 审核结果</li>
			</ul>
			<div class="info">
<!--				<ul class="item">-->
<!--					<li class="norm mactive" data="person">旅行顾问</li>-->
<!--					<li class="norm" data="company">旅行社</li>-->
<!--				</ul>-->
				<div class="con_info">
					<div class="person">
						<form action="/user/add_agent_info" method="post">
						<input type="hidden" name="agent_type" value="0">
						<input type="hidden" name="id_card_0" value="" class="id_up">
						<input type="hidden" name="id_card_1" value="" class="id_back">
						<input type="hidden" name="id_card_2" value="" class="con_up">


						<div class="con_list">
						<label for="">邀请码:</label><input type="text" placeholder="请输入邀请码" name="recommend_code1" class="recommend_code1">
						</div>
						<div class="con_list">
						<label for="">姓名:</label><input type="text" placeholder="请输入姓名" name="username" class="username">
						</div>
						<div class="con_list">
							<label for="">性别:</label>
							<label class="radion" style="width:42px"><input class="img_circle" type="radio" value="1" name="sex">男</label>
							<label class="radion pactive" style="width:42px;margin-left:35px"><input class="img_circle" type="radio" name="sex" value="0" checked>女</label>
						</div>
						<div class="con_list">
							<label for="">联系方式:</label><input type="text" placeholder="请填写手机号(必填)" name="usercontact" class="usercontact">
						</div>
						<div class="con_list">
							<label for="">联系地址:</label><input type="text" placeholder="请填写联系地址(选填)" name="address">
						</div>
						<div class="con_list">
							<label for="">工作单位:</label><input type="text" placeholder="请填写工作单位(选填)" name="employer">
						</div>
						<div class="con_list">
							<label for="">旅游从业人员:</label>
							<label class="radion pactive" style="width:42px"><input class="img_circle" type="radio" value="1" name="travel" checked>是</label>
							<label class="radion" style="width:42px;margin-left:35px"><input class="img_circle" type="radio" name="travel" value="0">否</label>
						</div>
						<div class="con_list">
							<label style="float:left">手持身份证照片:</label>
							<div class="upload">
								<div class="imgup">
									<img src="/Public/images/identy.jpg" alt="" width="200px"
								height="125px" style="border:solid 1px #cccccc">
									<div class="img_rq">身份证信息及面部区域清晰可见。支持jpg、jpeg格式图片,图片大小不能超过5M。</div>
								</div>
								<div id="con_up" class="loadimg">
									<a id="pickfiles" href="#" class="upbtn">上传</a>
								</div>
								
							</div>
						</div>
						<div class="clear"></div>
						<div class="con_list">
							<label style="float:left">身份证照片:</label>
							<div class="upload">
								<div class="imgup">
									<img src="/Public/images/identy.jpg" alt="" width="200px"
								height="125px" style="border:solid 1px #cccccc">
								<span>正面</span>
								</div>
								<div id="id_up" class="loadimg">
									<a id="pickfiles1" href="#" class="upbtn">上传</a>
								</div>
								
							</div>
							<div class="clear"></div>
							<div class="upload1">
								<div class="imgup">
									<img src="/Public/images/identy.jpg" alt="" width="200px"
								height="125px" style="border:solid 1px #cccccc">
								<span>反面</span>
								</div>
								<div id="id_back" class="loadimg">
									<a id="pickfiles2" href="#" class="upbtn">上传</a>
								</div>
								
							</div>
						</div>
						<div class="clear"></div>
						<input type="submit" id="person" style="display:none">
						</form>
					</div>
					<div class="company">
						<form action="/user/add_agent_info" method="post">
						<input type="hidden" name="agent_type" value="1">
						<input type="hidden" name="bussiness_licence" value="" class="bussiness_licence">
						<input type="hidden" name="orgnization_code" value="" class="orgnization_code">
						<div class="con_list">
						<label for="">邀请码:</label><input type="text" placeholder="请输入邀请码" name="recommend_code2" class="recommend_code2">
						</div>
						<div class="con_list">
						<label for="">企业名称:</label><input type="text" placeholder="请输入企业名称(必填)" name="company">
						</div>
						
						<div class="con_list">
							<label for="">营业执照编号:</label><input type="text" placeholder="请填写营业执照编号(必填)" name="ccode">
						</div>
						<div class="con_list">
							<label for="">组织机构代码:</label><input type="text" placeholder="请填写组织机构代码(必填)" name="ocode">
						</div>
						<div class="con_list">
							<label for="">公司地址:</label><input type="text" placeholder="请填写企业地址(必填)" name="caddress">
						</div>
						<div class="con_list">
							<label style="float:left">上传营业执照</label>
							<div class="upload">
								<div class="imgup">
									<img src="/Public/images/identy.jpg" alt="" width="200px"
								height="125px" style="border:solid 1px #cccccc">
								</div>
								<div id="bussiness_licence" class="loadimg">
									<a id="pickfiles3" href="#" class="upbtn">上传</a>
								</div>
								
							</div>
						</div>
						<div class="clear"></div>
						<div class="con_list">
							<label style="float:left">组织机构代码证</label>
							<div class="upload">
								<div class="imgup">
									<img src="/Public/images/identy.jpg" alt="" width="200px"
								height="125px" style="border:solid 1px #cccccc">
									
								</div>
								<div id="orgnization_code" class="loadimg">
									<a id="pickfiles4" href="#" class="upbtn">上传</a>
								</div>
								
							</div>
						</div>
						<div class="clear"></div>
						<div class="con_list">
						<label for="">法人:</label><input type="text" placeholder="请输入企业法人(必填)" name="legal">
						</div>
						
						<div class="con_list">
							<label for="">法人身份证号:</label><input type="text" placeholder="请填写法人身份证号(必填)" name="idcard">
						</div>
						<div class="con_list">
							<label for="">联系人:</label><input type="text" placeholder="请填写联系人(必填)" name="contact">
						</div>
						<div class="con_list">
							<label for="">联系人电话:</label><input type="text" placeholder="请填写联系人手机号(必填)" name="contact_phone">
						</div>
						
					</div>
				</div>
				<input type="submit" id="company" style="display:none">

				</form>
			</div>
			<div class="protocol">
				逍品旅行服务协议

				我保证不把逍品旅行投放到有采集互联网上高度重复内容、有版权以及其他违法行为的网页上

				我已经阅读并接受<a href="/help/service_protocol" target="_blank">逍品旅行用户协议</a>

			</div>
			<div class="agree seled"><a href="/help/service_protocol" target="_blank">我同意并遵守协议内容</a></div>
			<div class="sub">
			<button class="bt" type="submit" disabled="disabled">下一步</button>
			</div>
		</div>
	
	</div>
	
	<script type="text/javascript">
		$('.bt').attr('disabled',false);
		//验证ui
		var USER = false;
		var PHONE　 = false;
		var COM = false;
		var CCODE = false;
		var OCODE = false;
		var CADD = false;
		var LEGAL = false;
		var IDCARD = false;
		var CONT = false;
		var CONTP = false;
		var RECOM2 = false;
		var RECOM1 = false;

		//正确的ui 
        function ui_false(e){
            e.parent().find('.invalid').css('display','block');
             // e.focus();
        }
        //错误的ui
        function ui_true(e){
            e.parent().find('.invalid').css('display','none');
            e.parent().find('.valid').css('display','inline');
        }

        function error_ui(e,i){
            var error_info = '<div class="invalid" style="display:none;margin-left:20px"><i></i><div class="msg">'+i+'</div></div><i class="valid" style="display: none;"></i>';
            if(e.parent().find('.invalid').attr('class') != 'invalid'){
                e.parent().append(error_info);
            }else{
                e.parent().find('.msg').html(i);
            }
            
        }
        //邀请验证码
        function is_recommend_code(re_code){
        	var reg = /^[0-9A-Za-z]{4}$/; 
	    	//检测   exec
	        return reg.test(re_code);
        }
        //检查手机号格式
	    function is_phone(phone){
	    	var reg = /^1[3-9][0-9]{9}$/; 
	    	//检测   exec
	        return reg.test(phone);
	    }
	    //非数字非空
	    function is_name(name){
	    	var reg =/^[^\d]+[^\s]$/;
	    	//检测   exec
	        return reg.test(name); 
	    }
	 	//身份证号
	    function is_idnumber(idnum){
	    	var reg = /(^\d{15}$)|(^\d{17}(\d|X)$)/;
	    	//检测   exec
	        return reg.test(idnum);  
	    }
	    //企业营业执照
	    function is_comcode(ccode){
	    	var reg = /(^\d{15}$)/;
	    	//检测   exec
	        return reg.test(ccode);
	    }
	    //组织机构代码
	    function is_orgcode(ocode){
	    	var reg=/^[0-9A-Za-z]{9}$/;
	    	//检测   exec
	        return reg.test(ocode);
	    }
	    //名称
	    function user_pass(e){

	    	if(is_name(e.val())){
	    		error_ui(e,'');
	    		ui_true(e);
	    		USER = true;
	    	}else{
	    		error_ui(e,'请输入字母或汉字');
	    		ui_false(e);
	    		USER = false;
	    	}
	    }
	    $('.username').blur(function(){
	    	var e = $(this);
	    	user_pass(e);
	    });
	    //联系方式
	    function phone_pass(e){
	    	if(is_phone(e.val())){
	    		error_ui(e,'');
		    	ui_true(e);
		    	PHONE　= true;
	    	}else{
	    		error_ui(e,'手机号格式不正确');
		    	ui_false(e);
		    	PHONE　= false;
	    	}
	    	
	    }
	     $('.usercontact').blur(function(){
	    	var e = $(this);
	    	phone_pass(e);
	    });

	     //企业名称
	     function is_company(e){
	     	if(e.val()!=''){
	     		error_ui(e,'');
	    		ui_true(e);
	    		COM = true;
	     	}else{
	     		error_ui(e,'企业名称不能为空');
		    	ui_false(e);
		    	COM　= false;
	     	}
	     }

	     $("input[name='company']").blur(function(){
	     	var e = $(this);
	     	is_company(e);
	     })
	     //企业营业执照
	     function is_ccode(e){
	     	if(is_comcode(e.val())){
	     		error_ui(e,'');
	    		ui_true(e);
	    		CCODE = true;
	     	}else{
	     		error_ui(e,'企业营业执照格式错误');
		    	ui_false(e);
		    	CCODE　= false;
	     	}
	     }
	     $("input[name='ccode']").blur(function(){
	     	var e = $(this);
	     	is_ccode(e);
	     })
	     //组织机构代码
	     function is_ocode(e){
	     	if(is_orgcode(e.val())){
	     		error_ui(e,'');
	    		ui_true(e);
	    		OCODE = true;
	     	}else{
	     		error_ui(e,'组织机构代码错误');
		    	ui_false(e);
		    	OCODE　= false;
	     	}
	     }
	     $("input[name='ocode']").blur(function(){
	     	var e = $(this);
	     	is_ocode(e);
	     })
	     //公司地址
	     function is_caddress(e){
	     	if(e.val()!=''){
	     		error_ui(e,'');
	    		ui_true(e);
	    		CADD = true;
	     	}else{
	     		error_ui(e,'公司地址不能为空');
		    	ui_false(e);
		    	CADD　= false;
	     	}
	     }
	     $("input[name='caddress']").blur(function(){
	     	var e = $(this);
	     	is_caddress(e);
	     })
	     //公司法人
	      function legal_pass(e){

	    	if(is_name(e.val())){
	    		error_ui(e,'');
	    		ui_true(e);
	    		LEGAL = true;
	    	}else{
	    		error_ui(e,'请输入字母或汉字');
	    		ui_false(e);
	    		LEGAL = false;
	    	}
	    }
	     $("input[name='legal']").blur(function(){
	     	var e = $(this);
	     	legal_pass(e);
	     })
	     //身份证号
	     function is_idcard(e){
	     	if(is_idnumber(e.val())){
	     		error_ui(e,'');
	    		ui_true(e);
	    		IDCARD = true;
	     	}else{
	     		error_ui(e,'身份证号格式错误');
	    		ui_false(e);
	    		IDCARD = false;
	     	}
	     }
	     $("input[name='idcard']").blur(function(){
	     	var e = $(this);
	     	is_idcard(e);
	     })
	     //联系人
	     function is_contact(e){
	     	if(is_name(e.val())){
	    		error_ui(e,'');
	    		ui_true(e);
	    		CONT = true;
	    	}else{
	    		error_ui(e,'请输入字母或汉字');
	    		ui_false(e);
	    		CONT = false;
	    	}
	     }
	      $("input[name='contact']").blur(function(){
	     	var e = $(this);
	     	is_contact(e);
	     })
	      //联系人电话
	      function contact_phone(e){
	      	if(is_phone(e.val())){
	    		error_ui(e,'');
		    	ui_true(e);
		    	CONTP　= true;
	    	}else{
	    		error_ui(e,'手机号格式不正确');
		    	ui_false(e);
		    	CONTP　= false;
	    	}
	      }
	      $("input[name='contact_phone']").blur(function(){
	     	var e = $(this);
	     	contact_phone(e);
	     })
	     //邀请验证码验证
	     function recommend_code(e){
	     	if(is_recommend_code(e.val())){
		    	recommend_code_ture(e);
	     	}else{
	     		error_ui(e,'邀请码格式不正确');
		    	ui_false(e);
		    	RECOM1　= false;
	     	}
	     }
	     $('.recommend_code1').blur(function(){
	     	var e = $(this);
	     	recommend_code(e);
	     })
	     function recommend_code1(e){
	     	if(is_recommend_code(e.val())){
	     		
		    	recommend_code_ture1(e);
	     	}else{
	     		error_ui(e,'邀请码格式不正确');
		    	ui_false(e);
		    	RECOM2　= false;
	     	}
	     }
	     $('.recommend_code2').blur(function(){
	     	var e = $(this);
	     	recommend_code1(e);
	     })
	     //验证码是否正确
        function recommend_code_ture(e){
            var inp = e;
            var recommend_code = e.val();
            $.ajax({
                url:'/user/recommend_code',
                data:{recommend_code:recommend_code},
                type:'post',
               // async:false,//设置同步
                success:function(data){
                 console.log(data);
                    if(data.result.err==0){
                         
                        error_ui(e,'');
                        ui_true(inp);
                        inp.val();
                        RECOM1 = true;
                    }else{
                        error_ui(e,'邀请验证码错误');
                        ui_false(inp);
                        RECOM1  = false;
                    }
                }
            },'json')
        }

        function recommend_code_ture1(e){
            var inp = e;
            var recommend_code = e.val();
            $.ajax({
                url:'/user/recommend_code',
                data:{recommend_code:recommend_code},
                type:'post',
               // async:false,//设置同步
                success:function(data){
                 console.log(data);
                    if(data.result.err==0){
                         
                        error_ui(e,'');
                        ui_true(inp);
                        inp.val();
                        RECOM2 = true;
                    }else{
                        error_ui(e,'邀请验证码错误');
                        ui_false(inp);
                        RECOM2  = false;
                    }
                }
            },'json')
        }

		$('.agree').click(function(){
		
			if($(this).attr('class') == 'agree'){
				$(this).addClass('seled');
				$('.bt').attr('disabled',false);
			}else{
				$(this).removeClass('seled');
				$('.bt').attr('disabled','disabled');
			}
		})
		var subway = $('#person');

		$('.norm').click(function(){
			if($(this).attr('class') == 'norm'){
				$(this).addClass('mactive').siblings().removeClass('mactive');
			}

			var turn = $(this).attr('data');
			$('.'+turn).css('display','block').siblings().css('display','none');
			subway = $('#'+turn);
		});

		$('.bt').click(function(){
			subway.trigger('click');
		})

		 $(".img_circle").click(function () {
	        if(!$(this).attr('checked')) {
	            $(this).parent().addClass('pactive').siblings().removeClass('pactive');
	            $(this).attr('checked',true).parent().siblings().find('.img_circle').attr('checked',false);
	        }
  		 })
  		 function tip_info(msg){
  		 	layer.open({
                     title:false,
                     content: msg,
                     area: '240px',
                     closeBtn: false
            });
  		 }
  		 $('#person').click(function(){
  		 	if($('.con_up').val() == ''){
  		 		tip_info('请上传手持身份证照片');
  		 		return false;
  		 	}
  		 	if($('.id_up').val() == ''){
  		 		tip_info('请上传身份证正面照片');
  		 		return false;
  		 	}
  		 	if($('.id_back').val() == ''){
  		 		tip_info('请上传身份证背面照片');
  		 		return false;
  		 	}
  		 	if(!USER){
  		 		$('.username').trigger('blur');
  		 	}
  		 	if(!PHONE){
  		 		$('.usercontact').trigger('blur');
  		 	}
  		 	
  		 	if(!RECOM1){
  		 		$('.recommend_code1').trigger('blur');

  		 	}

  		 	if(USER && PHONE && RECOM1){
  		 		return true;
  		 	}
  		 	return false;
  		 })

  		 $('#company').click(function(){
  		 	if($('.bussiness_licence').val() == ''){
  		 		tip_info('请上传营业执照扫描件照片');
  		 		return false;
  		 	}
  		 	if($('.orgnization_code').val() == ''){
  		 		tip_info('请上传组织机构扫描件照片');
  		 		return false;
  		 	}

  		 	if(!COM){
  		 	  $("input[name='company']").trigger('blur');
  		 	}
  		 	if(!CCODE){
  		 		$("input[name='ccode']").trigger('blur');
  		 	}
  		 	if(!OCODE){
  		 		$("input[name='ocode']").trigger('blur');
  		 	}
  		 	if(!CADD){
  		 		$("input[name='caddress']").trigger('blur');
  		 	}
  		 	if(!LEGAL){
  		 		$("input[name='legal']").trigger('blur');
  		 	}
  		 	if(!IDCARD){
  		 		$("input[name='idcard']").trigger('blur');
  		 	}
  		 	if(!CONT){
  		 		$("input[name='contact']").trigger('blur');
  		 	}
  		 	if(!CONTP){
  		 		$("input[name='contact_phone']").trigger('blur');
  		 	}
  		 	if(!RECOM2){
  		 		$(".recommend_code2']").trigger('blur');
  		 	}
  		 	if(COM && CCODE　&& OCODE && CADD && LEGAL && IDCARD && CONT　&&　CONTP && RECOM2){
  		 		return true;
  		 	}

  		 	return false;
  		 })
  		 upload('con_up','pickfiles');
  		 upload('id_up','pickfiles1');
  		 upload('id_back','pickfiles2');
  		 upload('bussiness_licence','pickfiles3');
  		 upload('orgnization_code','pickfiles4');
  		 function upload(e,i){
		  		 //上传七牛图片
		  		 var uploader = Qiniu.uploader({
		        runtimes: 'html5,flash,html4',    //上传模式,依次退化
		        browse_button: i,       //上传选择的点选按钮，**必需**
		        uptoken_url: '/image/get_general_qiniu_uptoken',   //get_private_qiniu_uptoken //Ajax请求upToken的Url，**强烈建议设置**（服务端提供）

		        unique_names: false, // 默认 false，key为文件名。若开启该选项，SDK为自动生成上传成功后的key（文件名）。
		        save_key: false,   // 默认 false。若在服务端生成uptoken的上传策略中指定了 `sava_key`，则开启，SDK会忽略对key的处理
		        domain: 'http://qiniu-plupload.qiniudn.com/',   //bucket 域名，下载资源时用到，**必需**
		        get_new_uptoken: true,  //设置上传文件的时候是否每次都重新获取新的token
		        container: e,           //上传区域DOM ID，默认是browser_button的父元素，
		        max_file_size: '100mb',           //最大文件体积限制
		        flash_swf_url: 'js/plupload/Moxie.swf',  //引入flash,相对路径
		        max_retries: 3,                   //上传失败最大重试次数
		        dragdrop: true,                   //开启可拖曳上传
		        drop_element: e,        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
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
		                // console.log('BeforeUpload') ;
		                index = layer.load(1,{offset:['200px','800px'],shade: [0.4, '#393D49']});
		            },
		            'UploadProgress': function(up, file) {
		                // 每个文件上传时,处理相关的事情
		                // console.log('UploadProgress' ) ;
		                // console.log(up) ;
		                // console.log(file) ;
		            },
		            'FileUploaded': function(up, file, info) {
		                // console.log('FileUploaded') ;
		                // console.log(info) ;
		                var json_info = JSON.parse(info) ;
		                // com_img_upload.add_image('http://img.qsctrip.com/' + json_info.key, json_info.id, json_info.attached) ;
		                $('#'+e).prev().find('img').attr('src','http://img.qsctrip.com/' + json_info.key, json_info.id, json_info.attached);
		                $('.'+e).val('http://img.qsctrip.com/' + json_info.key, json_info.id, json_info.attached);

		            },
		            'Error': function(up, err, errTip) {
		                //上传出错时,处理相关的事情
		                // console.log('UploadComplete') ;
		                // console.log(up) ;
		                // console.log(err) ;
		                // console.log(errTip) ;
		            },
		            'UploadComplete': function() {
		                //队列文件处理完毕后,处理相关的事情
		                // console.log('UploadComplete') ;
		                layer.close(index);
		                
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
		                        // console.log(data) ;
		                        key = data['content']['key'];
		                    }
		                }) ;

		                // do something with key here
		                return key + '_' + file.name ;
		            }
		        }
		    });
		}
  		
  		if($('.id_up').val()){
			$('#id_up').parent().find('img').attr('src',$('.id_up').val());  		 
  		}
  		if($('.id_back').val()){
			$('#id_back').parent().find('img').attr('src',$('.id_back').val()); 	 
  		}
  		if($('.con_up').val()){
			$('#con_up').parent().find('img').attr('src',$('.con_up').val()); 	 	 
  		}
	</script>

</body>
</html>