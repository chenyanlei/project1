<style type="text/css">
		body{
			font-family: 'Microsoft Yahei'
		}
		.pwd{
			width:640px;
			margin-left: 300px;
			margin-top:40px;
			height:500px;
		}
		.set_pwd{
			margin-top: 20px
		}
		.set_pwd label{
			width:120px;
			font-weight: normal;
			color:#585858;
			font-size: 14px;

		}
		.set_pwd input{
			width:300px;
			height:40px;
			border-radius: 4px;
			border: #cccccc 1px solid;
			padding-left:10px;

		}
		.subtn{
		margin-top: 30px;
		width: 580px;
	}
	.sub{
		width:100px;
		height:32px;
		background-color: #ccc;
		border:0px;
		color:#ffffff;
		font-size: 14px;
		margin:0 auto;
		display: block;
	}
	.sub:hover{
		background-color: #7febff;
	}
	.set_pwd{
		position:relative;

	}
	.set_pwd label{
		text-align: right;
		margin-right: 20px;
	}
	.pass_error .triangle {
		    border-bottom: 2px solid transparent;
		    border-right: 20px solid rgba(51, 153, 204, 0.8);
		    border-top: 10px solid transparent;
		    display: none-block;
		    height: 0;
		    margin-left: -20px;
		    margin-right: 5px;
		    width: 0;
		}
		.pass_error {
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
		    top:8px;
		}
	</style>
    <script type="text/javascript" src="/Public/js/md5.js"></script>

<div class="container">
		<div class="row">
				<form action="/personal/reset_password" method="post">
				<div class="col-sm-push-2 pwd">
					<div class="set_pwd" style="margin-top:90px;">
						<label for="">旧密码</label>
						<input type="password" class="o_pwd" name="o_pwd">
						<div class="pass_error" style="display: none;">
							<div class="triangle"></div>
							<span>请输入原有密码！</span>
						</div>
					</div>
					<div class="set_pwd">
						<label for="">新密码</label>
						<input type="password" class="n_pwd" name="n_pwd">
						<div class="pass_error" style="display: none;">
							<div class="triangle"></div>
							<span>请输入8-16位新密码！</span>
						</div>
					</div>
					<div class="set_pwd">
						<label for="">再次输入新密码</label>
						<input type="password" class="o_pwd" name="rn_pwd">
						<div class="pass_error" style="display: none;">
							<div class="triangle"></div>
							<span>再次输入8-16位新密码！</span>
						</div>
					</div>
					<div class="subtn">
						<button class="sub">确认修改</button>
					</div>
				</div>
				</form> 
		</div>

	<script>

		var is_pass = false;
		function ui_false(e,err_info){
			if(err_info != ''){
				e.next().css('display','inline').find('span').html(err_info);
			}else{
				e.next().css('display','inline');
			}
	    	e.addClass('error');
	    	//e.trigger('focus');
	    }

	    function ui_true(e){
	       e.next().css('display','none');
	       e.removeClass('error');
	    }
	    function check_pwd(a){
	    	var pass = a.val();
	    	var pwd = hex_md5(pass);
	    	$.ajax({
	            url:'/personal/check_pwd',
	            data:{old_pass:pwd},
	            type:'post',
	            success:function(data){

	                if(data.result.err==0){
	                	is_pass = true;
	              		ui_true(a);

	              		return true;
	                }else if(data.result.err==5005){
	                    var str="输入密码错误！"
	                    ui_false(a,str);
	                    is_pass = false;
	                    return false;
	                }else{
	                  alert(data.result.err);
	                  return false;
	                }

	            }
        	},'json')
	    }
	    function checkpass(a){

			if(a.val() == ''){
				ui_false(a);
				is_pass = false;
			}else{
				check_pwd(a);
			}
	    }
	    //密码格式是否正确
	    function ispass(b){
	        //声明正则
	        var reg = /^\S{8,16}$/;

	        //检测失败的话
	        return reg.test(b);
	    }
	    function checknpass(b){

	    	if(!ispass(b.val())){
				ui_false(b);
				return false;
			}else{
				ui_true(b);
				return true;
			}
	    }
	    function checkrnpass(b,c){
	    	if(!ispass(c.val())){
				ui_false(c);
				return false;
			}else if(c.val() != b.val()){
				ui_false(c,'密码不一致！');
				return false;
			}else{
				ui_true(c);
				return true;
			}
	    }
		$('.set_pwd input').focus(function() {
			$(".sub").css({
				'background-color':'#00d8ff'
			});
		});
		 $('input[name="n_pwd"]').blur(function(){
			var b = $(this);
			checknpass(b);
		})

		$('input[name="rn_pwd"]').blur(function(){
			var c = $(this);
			var b = $('input[name="n_pwd"]');
			 checkrnpass(b,c);
		})

		$('.sub').click(function(){
			var a = $('input[name="o_pwd"]');
			var b = $('input[name="n_pwd"]');
			var	c = $('input[name="rn_pwd"]');
				if(!is_pass){
					checkpass(a);
				}
			if(is_pass  && checknpass(b) && checkrnpass(b,c)){
				var opwd = hex_md5(a.val());
				var npwd = hex_md5(b.val()); 
				var rpwd = hex_md5(c.val()); 
				a.val(opwd);
				b.val(npwd);
				c.val(rpwd)
				return true;
			}

			return false;
		})
	</script>
</div>