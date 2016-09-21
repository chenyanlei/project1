<div class="main-body">
	<div class="col-sm-6 col-sm-offset-3">
		<section class="account-register well-lg">
			<h2 class="account-register-title text-center y-margin-bottom-10px"><?php echo $tip_login_title;?></h2>
			<input type="hidden" id="url_mainpage" value=<?php echo $page_home;?>/>
			<input type="hidden" id="url_register" value=<?php echo $page_register;?>/>


			<form id="login_url" method="POST" action="<?php echo $url_login;?>" accept-charset="UTF-8" class="account-register-form">
				<div id="verify_tip" class="form-group y-margin-top-10px">
<!--					<label></label>-->
				</div>
				<div class="form-group y-margin-top-10px">
					<label for="username"><?php echo $tip_username;?></label>
					<input id="name" class="form-control input-lg" id="username" required="required" placeholder=<?php echo $tip_input_username;?> name="username" type="text">
				</div>
				<div class="form-group y-margin-top-10px">
					<label for="password"><?php echo $tip_password;?></label>
					<input id="pwd" class="form-control input-lg" id="password" required="required" placeholder="密码" name="password" type="password" value="">
				</div>
				<div class="row">
					<div class="col-sm-6">
						<input class="btn btn-success btn-block y-btn y-margin-top-10px" type="button" onclick="onclick_login()" value="<?php echo $tip_login_title;?>">
					</div>
					<div class="col-sm-6">
						<input class="btn btn-default btn-block y-btn y-margin-top-10px" type="button" onclick="onclick_register()" value="注册">
						<!--a href="http://account.shafa.com/login" class="btn btn-default btn-block y-btn">登录</a-->
					</div>
				</div>
				<div class="form-group y-margin-top-10px">
					<a class="forget_pwd" href=<?=$page_foget_password;?>>忘记密码?</a>
				</div>
			</form>

		</section>
	</div>
</div>


<script>
	//登录
	function onclick_login() {
		var name = $("#name").val() ;
		if (name==null||name=='') {
			alert("用户名不能为空") ;
			return;
		}

		var pwd = $("#pwd").val() ;
		if (pwd==null||pwd=='') {
			alert("密码不能为空") ;
			return;
		}

		var mainpage = $("#url_mainpage").val() ;
//		console.log("mainpage:" + mainpage) ;
		var login_url = $("#login_url").attr("action") ;
		console.log("login_url:" + login_url) ;
		$.post(login_url,{name:name, pwd:pwd}, function(data) {
//			alert(data) ;
			console.log(data) ;
			console.log(data.result) ;
			console.log(data.content) ;

			var strContent = JSON.stringify(data.content) ;
			console.log(strContent) ;
			setCookie('user_info', strContent,30) ;

			var cookie = getCookie('user_info') ;
			console.log("cookie:"+cookie) ;
			if(0 == data.result.err){
//				console.log(mainpage) ;
				window.location.href=mainpage;
			} else if(5006 == data.result.err) {
				$("#verify_tip").html('<label>' + data.result.msg + '</label>') ;
			} else
			{
				alert(data.result.msg) ;
			}
		}) ;
	}

	//注册
	function onclick_register() {
//		$("#url_register").val() ;
//		var value = document.getElementById("url_register").value;
//		console.log(value) ;
//		alert('hello:' + value) ;
		window.location.href = "/page/register" ;
	}
</script>
