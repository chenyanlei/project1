<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<style>
	.err_info{
		width:500px;
		background:url(/Public/images/error_icon.png) no-repeat top left;
		margin: 100px auto;
		height:100px;
		line-height:100px;
		font-size:14px;
		color:#585858;
		padding-bottom: 180px;
	}

</style>
<div class="container">
	<div class="row">
		<div class="text-center err_info">
			<?=$err_msg;?>
		</div>	
	</div>
</div>