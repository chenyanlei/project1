<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>选择目的地</title>
	<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
	<script type="text/javascript" src="/Public/js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
	<link rel="icon" href="/Public/images/ico.png">
	<style type="text/css">
		
		.header{
			height:80px;
			background: #0097d6;
			padding:0px;
		}
		.header_logo{
			background: url("/Public/images/header_logo.png") no-repeat;
			width:152px;
			height: 40px;
			margin:20px 20px 20px 80px;
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
			width:1200px;
			min-height: 640px
		}
		.con_title{
			text-align: center;
			padding-top: 40px;
			font-size: 16px;
			color:#585858;
		}
		
		.con_list{
			margin:35px 0px 0px 150px;
		}
		.con_list label{
			font-weight: normal;
			width:100px;
			text-align: right;
			margin-right:20px;
			font-size: 14px;
			color: #585858 
		}
		.con_list input{
			width:250px;
			height:30px;
			padding-left: 10px;
			border:solid 1px #cccccc;
			font-size: 14px;
			color:#cccccc;
		}
		.con_list input:focus,.con_list input:hover{
			border-color:#0097d6;
			color:#000000;
		}
		.con_list:last-child input{
			width:150px;
			height: 40px
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
			width:200px;
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
		.nexta{
			background: url(/Public/images/icon-angle.png) center right no-repeat;
			color:#585858;
			position: relative;
			width:250px;
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
			clear: both;
		}
		.divider{
			background: #cccccc;
			height:1px;
			margin-bottom: 20px
		}
		.con_add{
			clear:both;
		}
		.current_foot{
			width:190px;
			background: url(/Public/images/icon-right.png) no-repeat center right;

		}
		.detination{
			padding:40px 100px;
		}
		.detination label{
			text-indent: 1em;
		}
		.detination li{
			width:100px;
			list-style: none;
			float:left;
			padding:8px 10px; 
			text-align: center;
			margin-right: 10px;
			margin-bottom: 10px
		}
		.normal{
			border:solid transparent 1px;
		}
		.europe{
			margin-top: 20px
		}
		.detination li:hover{
			border:solid 1px #0097d6;
		}
		.cactive{
			background:#0097d6;
			color:#ffffff;
		}
		.state{
			border:solid 1px #cccccc;
			height:auto;
			padding:30px;
			color:#585858;
		}
		.state .headi{
			width:50px;
			float:left;
			height:40px;
			line-height: 40px
		}
		.state ul{
			float:left;
			padding: 0px;
			width:880px;
		}
		.state_sel{
			margin-bottom: 30px;
			color:#585858;
		}
		.radion{
            background: url("/Public/images/icon_choose_02.png") no-repeat 7px 6px;
        }

        .pactive{
             background: url("/Public/images/icon_choose_01.png") no-repeat  7px 6px;
        }
        .img_circle{
            width: 20px;
            height: 20px;
            opacity: 0;
        }
        .state_sel label{
        	font-weight: normal;
        }
        .layui-layer-dialog .layui-layer-content {
       		text-align: center;
       		font-size: 12px;
       		color:#585858;
       		background: url("/Public/images/wrong1.png") no-repeat 28px 25px;
    		
       }

		.d_logo {
			float: left;
		}
		.logo{
			margin: 20px 20px 20px 30px;
		}

	</style>
	<script src="/Public/js/layer.js"></script>
</head>
<body>

	<div class="header">
		<a class="pull-left" href="">
			<div class="d_logo">
				<img class="logo" src="/Public/images/header_logo.png">
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
		<form action="/user/set_destinate" method="post">
		<input type="hidden" name="product_destinations_id" value="" id="dest">
		<input type="hidden" name="p_dest_id" value="1" id="dest_id">
		<div class="con">
			<ul class="proccess">
				<li class="nexta">1 账号信息</li>
				<li class="nexta">2 注册激活</li>
				<li class="current_foot">3 信息认证</li>
				<li class="current">4 选择目的地</li>
				<li class="nnext">5 选择类别</li>
				<li class="next">6 审核结果</li>
			</ul>
			<div class="detination">
				<div class="state_sel">
				选择您比较熟悉的目的地
				<label class="radion" style="width:120px;margin-left:10px"><input class="img_circle" type="radio" value="0" name="product_destinations_type">全部国家地区</label>
							<label class="radion  pactive" style="width:120px;margin-left:35px"><input class="img_circle" type="radio" name="product_destinations_type" checked value="1">部分国家地区</label>
				</div>
				<div class="state">
				<div class="asia">
					<div class="headi">亚洲:</div>
					<ul>
						<?php foreach($asia as $v){?>
						<li class="normal" data="<?=$v['id']?>"><?=$v['name']?></li>
						<?php }?>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="divider"></div>
				<div class="asia">
				<div class="headi">欧洲:</div>
			
					<ul>
						<?php foreach($europe as $v){?>
						<li class="normal" data="<?=$v['id']?>"><?=$v['name']?></li>
						<?php }?>
					</ul>
				
				</div>
				<div class="clear"></div>
				<div class="divider"></div>
				<div class="asia">
					<div class="headi">北美洲:</div>
					<ul>
						<?php foreach($north_america as $v){?>
						<li class="normal" data="<?=$v['id']?>"><?=$v['name']?></li>
						<?php }?>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="divider"></div>
				<?php if($south_america){ ?>
				<div class="asia">
					<div class="headi">南美洲:</div>
					<ul>
						<?php foreach($south_america as $v){?>
						<li class="normal" data="<?=$v['id']?>"><?=$v['name']?></li>
						<?php }?>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="divider"></div>
				<?php }?>
				<div class="asia">
					<div class="headi">非洲:</div>
					<ul>
						<?php foreach($africa as $v){?>
						<li class="normal" data="<?=$v['id']?>"><?=$v['name']?></li>
						<?php }?>
					</ul>
				</div>
				<div class="clear"></div>
				<div class="divider"></div>
				<div class="asia">
					<div class="headi">大洋洲:</div>
					<ul>
						<?php foreach($oceania as $v){?>
						<li class="normal" data="<?=$v['id']?>"><?=$v['name']?></li>
						<?php }?>
					</ul>
				</div>
				<div class="clear"></div>
				</div>
			</div>
			<div class="sub">
			<button class="bt" type="submit">下一步</button>
			</div>
			</form>
		</div>
	</div>
	
	<script type="text/javascript">
		var dest_id = new Array();
		$('.detination li').click(function(){
			$(this).addClass('cactive');
			dest_id.push($(this).attr('data'));
			var dest =JSON.stringify(dest_id);
			$('#dest').val(dest);
		})

		$(".img_circle").click(function () {
	        if(!$(this).attr('checked')) {
	            $(this).parent().addClass('pactive').siblings().removeClass('pactive');
	            $(this).attr('checked',true).parent().siblings().find('.img_circle').attr('checked',false);
	        }
	        if($(this).val() === '0'){
	        	$('.state').css('display','none');
	        	$('#dest_id').val('0');
	        }else{
	        	$('.state').css('display','block');
	        	$('#dest_id').val('1');
	        }
  		 })


		$('.bt').click(function(){

			if($('#dest_id').val()==='1' && dest_id.length === 0){
				layer.open({
                     title:false,
                     content: '请至少选择一个国家',
                     area: '240px',
                     closeBtn: false
            	});
				return false;
			}else{
				return true;
			}

			
		})
	</script>

</body>
</html>