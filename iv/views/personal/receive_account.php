<style type="text/css">
	.set_account{
		width:860px;
		margin-left: 110px;
		margin-top:40px;
		border:solid #cccccc 1px;
	}
	.set_account .account{
		height:55x;
		line-height: 55px;
		margin-left: 40px;
	}
	.divider{
		height:1px;
		background: #cccccc
	}
	#account,#account_bank{
		width:300px;
		border:solid transparent 1px;
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
</style>

<div class="container">
	<div class="row">
		<form action="/personal/set_bank" method="post">
			<div class="col-sm-push-2 set_account">

				<div class="account">收款账号：<?=$bank['bank_account'];?></div>
				<div class="divider"></div>
				<div class="account">收款银行：<?=$bank['bank_name'];?></div>

			</div>
			<input type="hidden" name="account" value="<?=$bank['bank_account'];?>">
			<input type="hidden" name="name" value="<?=$bank['bank_name'];?>">
			<div class="subtn">
				<button class="sub" type="submit">修改</button>
			</div>

		</form>
	</div>

</div>