<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<style type="text/css">
		.set_account{
			width:860px;
			margin-left: 110px;
			margin-top:40px;
			border:solid #cccccc 1px;
		}
		.set_account .account{
			height: 55px;
			line-height: 55px;
			margin-left: 40px;
			position:relative
		}
		.divider{
			height:1px;
			background: #cccccc
		}
		#account,#bank_name{
			width:300px;

		}
		.subtn{
			margin-top: 30px
		}
		.sub{
			width:100px;
			height:40px;
			background: #0097d6;
			border:0px;
			color:#ffffff;
			font-size: 14px;
			margin:0 auto;
			display: block;
		}

		.bank_error .triangle {
		    border-bottom: 2px solid transparent;
		    border-right: 20px solid rgba(51, 153, 204, 0.8);
		    border-top: 10px solid transparent;
		    display: none-block;
		    height: 0;
		    margin-left: -20px;
		    margin-right: 5px;
		    width: 0;
		}
		.bank_error {
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
		    top:15px;
		}
</style>

<div class="container">
		<div class="row">
			<form action="/personal/doset_bank" method="post">
			<div class="col-sm-push-2 set_account">
		
				<div class="account">收款账号：<input type="text" name="account" id="account" value="<?=$account ? $account : '';?>">
					<div class="bank_error" style="display: none;">
						<div class="triangle"></div>
						<span>银行格式错误！</span>
					</div>
				</div>
				<div class="divider"></div>
				<div class="account">收款银行：<input type="text" name="name" id="bank_name" value="<?=$name ? $name : '';?>">
				<div class="bank_error" style="display: none;">
						<div class="triangle"></div>
						<span>银行名称格式错误！</span>
					</div>
				</div>
				
			</div> 
			<div class="subtn">
					<button class="sub" type="submit">确认</button>
			</div>
			</form>
		</div>
	
</div>

<script>
	function ui_false(e){
    	e.next().css('display','inline');
    	e.addClass('error');
    	e.trigger('focus');
    }

    function ui_true(e){
       e.next().css('display','none');
       e.removeClass('error');

    }

    function is_bankaccount(pass){
    	var reg = /^(\d{16}|\d{19})$/;
    	//检测   exec
        return reg.test(pass);
    }

    function is_bankname(name){
    	var reg =/^[^\d]+[^\s]$/;
    	//检测   exec
        return reg.test(name); 
    }

    function checkbankacc(){
		var bankaccount = $('#account');
    	if(is_bankaccount(bankaccount.val())){
    		ui_true(bankaccount);
    		return true;
    	}else{
    		ui_false(bankaccount);
    		return false;
    	}
    }

    function checkbankname(){
		var bankname = $('#bank_name');
    	if(is_bankname(bankname.val())){
    		ui_true(bankname);
    		return true;
    	}else{
    		ui_false(bankname);
    		return false;
    	}
    }
    $('#account').blur(function(){
    	checkbankacc();
    })

    $('#bank_name').blur(function(){
    	checkbankname();
    })

    $('.sub').click(function(){
    	$('input').trigger('blur');
    	if(checkbankacc() && checkbankname()){
    		console.log(111);
    		return true;

    	}

    	return false;
    })
</script>