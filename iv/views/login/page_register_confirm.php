<div class="main-body text-center">

	<div class="container-fluid y-margin-top-80px">
		<div class="row">
			<div class="col-sm-12">
				已发送验证邮件到<?php echo $email;?>,请您进入邮箱中点击链接完成验证
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<div class="col-sm-2 col-sm-offset-5">
					<a class="btn btn-success btn-block y-btn y-margin-top-10px" href="<?php echo $email_url;?>">去邮箱验证</a>
				</div>
			</div>
		</div>
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
			} else {
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
