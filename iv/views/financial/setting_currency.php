<style type="text/css">
	.mainbd{
		margin-top:20px;
		height:20px;
	}
	.m_label,.o_label{
		color:#585858;
		font-size: 14px;
		margin-top: 20px
	}
	.m_list{
		margin-top:20px;
		padding: 0px
	}
	.m_list ul{
		padding: 0px
	}
	.m_list ul li{
		float:left;
		list-style: none;
		width:80px;
		margin-right: 30px;
		text-align: center;
		height:40px;
		line-height: 40px;
		font-size: 14px;
		color:#585858;
	}
	.m_normal{
		border:solid 1px #cccccc;
	}
	.mactive{
		border:solid 2px #0097d6;
	}
	.clear{
		clear: both
	}
	#o_money{
		width:200px;
		height:40px;
		border:solid #cccccc 1px;
		margin-top: 20px
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
		font-size: 14px
	}
</style>
<div class="container">
	<div class="row">
		<form action="/personal/doset_currency" method="post">

			<div class="col-sm-10 col-sm-push-2 mainbd">
				<div class="m_label">主流货币</div>
				<div class="m_list">
					<ul>
						<li <?php if($currency == '人民币'){?> class="m_normal mactive"  <?php }else{ ?>class="m_normal" <?php }?>>人民币</li>
						<li <?php if($currency == '美元'){?> class="m_normal mactive"  <?php }else{ ?>class="m_normal" <?php }?>>美元</li>
						<li <?php if($currency == '欧元'){?> class="m_normal mactive"  <?php }else{ ?>class="m_normal" <?php }?>>欧元</li>
						<li <?php if($currency == '韩币'){?> class="m_normal mactive"  <?php }else{ ?>class="m_normal" <?php }?>>韩币</li>
						<li <?php if($currency == '日元'){?> class="m_normal mactive"  <?php }else{ ?>class="m_normal" <?php }?>>日元</li>
					</ul>
				</div>
				<div class="clear"></div>
				<!--<div class="o_label">其他货币</div>
                <div class="o_select">
                    <select name="" id="o_money">
                        <option value="">英镑</option>
                        <option value="">比索</option>
                        <option value="">加币</option>
                        <option value="">澳元</option>
                        <option value="">新币</option>
                    </select>
                </div>-->
				<input type="hidden" name="currency" value="<?=$currency ? $currency :'';?>" id="cur">
				<div class="subtn">
					<button class="sub" type="submit">确定</button>
				</div>
			</div>

		</form>
	</div>
</div>
<script type="text/javascript">

	$('.m_list ul li').click(function(){
		$(this).addClass('mactive').siblings().removeClass('mactive');
		var cur = $(this).html();
		$('#cur').val(cur);
	})

	$('.sub').click(function(){
		if($('#cur').val()!=''){
			return true;
		}

		alert('请选择货币');
		return false;
	})

</script>