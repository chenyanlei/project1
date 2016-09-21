<link rel="stylesheet" href="/Public/css/trip-calendar.css">
<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<style type="text/css">
	*{
		margin:0;
		padding: 0;
	}
	body{
		background-color:#f5f5f5;
		font-family: "Microsoft Yahei";
	}
	ul{
		padding:0px;
	}
	.proDetail-main{
		width: 1200px;
		margin:0 auto;
		padding-bottom: 200px;
	}
	.mainbd-left{
		float: left;
		width: 650px;
		margin:0 30px 0 20px;
	}
	.mainbd-right{
		float: left;
		width: 480px;
	}
	.big_img img{
		margin:0 auto;
		width:650px;
		height:327px;
	}
	.small_img{
		width:586px;
		position: relative;
		overflow: hidden;
		height:100px;
		margin-left: 34px;
	}
	..small_img ul{
		position: absolute;
		width: 1000px;
		height: 82px;
	}
	.small_img .normal{
		float:left;
		list-style: none;
		 margin-right:6px;
		 cursor: pointer;
		 opacity:.8;
		 border:2px  solid  transparent;
		 width:141px;
		 height:84px;
	}
	.small_img li:hover{
		 opacity:1;
		 border-color:blue
	}
	.small_img  .selected{
		 border-color:blue;
		 opacity:1;
	}
	.small_img li img{
		width:137px;
		height:80px;
	}
	.pre{
		background: url("/Public/images/next_left.png") no-repeat ;
		width:20px;
		height:80px;
		position:absolute;
		top:2px; 
		left: 0;
	}
	.back{
		background: url("/Public/images/next.png") no-repeat;
		width:20px;
		height:80px;
		position:absolute;
		top:2px;
		right:0px; 
	}
	i:hover{
	 cursor: pointer;
	}
	.mainbd{
		background:#ffffff;
		/*margin-top:10px;*/
		padding:40px 0;
		overflow: hidden;
	}
	.title{
		font-size: 20px;
		font-weight:bold;	
		min-height: 28px;
		margin-bottom: 30px;
	}

	.same_pri{
		height:50px;
		line-height:50px;
		color:#fe9500;
		font-size: 16px;
	}
	.same_pri span{
		margin-left: 20px;
		font-size: 30px;
		font-weight: bold;
		padding-left: 30px
	}
	.pri_type{
		background: url(/Public/images/cny_big.png) no-repeat 6px 7px;
		font-size: 16px;
		color: #fe9500;
	}
	.advise_pri{
		height:24px;
		line-height:24px;
		color:#585858;
		font-size: 14px;
	}
	.advise_pri span{
		margin-left: 27px;
		font-size: 18px;
		font-weight: bold;
		padding-left: 30px
	}
	.advise_pri b{
		margin-left: 10px;
		font-size: 12px
	}
	.pri_type1{
		background: url(/Public/images/cny_small.png) no-repeat 11px 3px;
		font-size: 14px;
		color: #585858;
	}
	.label{
		height:190px;
		background: #ffffff;
		margin-top: 40px;
	}

	.intro{
		height:auto;
		background: #ffffff;
		margin-top:40px
	}
	
	.label_t{
		width:160px;
		height:40px;
		margin:-2px auto 0px;
		background:#7FCCEB;
		font-size:14px;
		color:#ffffff;
		line-height: 60px;
	}
	.intro .label_t{
		margin:0px auto 0px;
	}
	.label_top{
		border-top:20px solid #7FCCEB;
		width:0;
	    height:0;
	    border-left:80px solid transparent;
	    border-right:80px solid transparent;
		margin:0 auto;
	}
	.expire{
		font-size: 14px;
		color:#777;
		margin-top: 20px
	}
	.divider_line{
		margin-top: 40px;
		border:1px dotted #cccccc;
	}
	.group_n{
		color: #585858;
		font-size: 16px;
		padding-left: 35px;
		margin-top: 20px;
		background: url(/Public/images/attention.png) no-repeat 0px 2px;
		height: 22px;
	}

	.lange{
		color:#585858;
		font-size: 14px;
		margin-top: 40px
	}
	ul li{
		list-style: none
	}
	.ibar{
         width:60px;
         height:400px;
         position:fixed;
         right:-2px;
         top:141px;
         z-index:10000   
    }
    .travel_intro{
    	margin-top:20px;
    	padding:10px
    }
    .apply{
    	margin-top:30px;
    }
    .apply .apply-btn{
    	background-color:#fe9500;
    	width:200px;
    	height:50px;
    	color:#fff;
    	border:none;
    	font-size:16px;
    	font-weight: bold;
    	cursor: pointer;
    	border-radius: 2px;
    	margin-right: 20px;
    }
    .apply .putStore-btn{
    	width: 200px;
    	height: 50px;
    	border:2px solid #fe9500;
		background-color: #fef8ef;
		border-radius: 2px;
		font-size: 16px;
		font-weight: bold;
		color: #f4930b;
		cursor: pointer;
    }
    .apply .apply-btn:hover{
		background-color: #f4930b; 
    }
	.apply .putStore-btn:hover{
		background-color: #fef3e3;
	}
	.selectdate{
	    text-align:left;
	    text-indent:5em;
	    color:#0097d6;
	    background: url(/Public/images/22.png) no-repeat 41px 7px;
	    height:30px;
	    line-height: 30px
	}
	#J_Calendar{display:inline-block;width:400px;}

	.disabled{
		background: #f1f1f1;
	}
	th{
		background: #f1f1f1;
		text-align:center
	}
	.order input[type="submit"]{
	    background: #0097d6;
	    height:40px;
	    width:150px;
	    border:none;
	    color:#ffffff;
	    border-radius: 4px;
	    font-size:16px;
	}
	.order{
		text-align:center
	}
	#C_calender{
	   width:700px;
	   margin:15px auto;
	   z-index:-100;
	   position:absolute;
	   top:-100000px;
	}

	.calender_info{
	    width:160px;
	    height:200px;
	    float:right;
	    margin-top:4px;
	    text-align:left;
	}

	.cal_h{
	    height:30px
	}
	.cal_m_h{
	    height:30px;
	    width:126px
	}
	.cal_top{
	    width:15px;
	    height:15px;
	    background:#f1f1f1;
	    float:left
	}
	.cal_n,.cal_m{
	    float:left;
	    margin-left:10px;
	    font-size: 12px
	}

	.cal_middle{
	    width:15px;
	    height:15px;
	    border:#cccccc 1px solid;
	    float:left
	}
	.cal_bottom{
	    width:15px;
	    height:15px;
	    background:#0097d6;
	    float:left
	}
	.cal{
		height:30px;
		margin-top:10px 
	}
	.cal .add,.cal .reduce {
	    width: 24px;
	    height: 24px;
	    line-height: 24px;
	    display: block;
	    float: left;
	    cursor: pointer;
	    text-align: center;
	    border: 1px solid #D5D5D5;
	    font-size: 22px;
	    color: #999;
	    background: #cccccc
	}
	.cal input {
	    float: left;
	    margin: 0 6px;
	    line-height: 20px;
	    width: 40px;
	    border: 1px solid #d9d9d9;
	    font-size: 16px;
	    height: 24px;
	    vertical-align: top;
	    outline: 0;
	    text-align: center;
	}
	.cal .add:hover,.cal .reduce:hover {
	    color: #fff;
	    background: #ff63b1;
	    border: 1px solid #fa139b;
	}
	.sel_num{
		color:#0097d6;
		font-size: 14px
	}
	.subprice{
		color: #585858;
		font-size: 14px;
		margin-top:10px
	}
	.num1{
		font-size: 14px;
		color: #585858;
		margin-top:10px;
	}
	.num2{
		margin-left: 15px;

	}
	.subtotal{
		margin-top: 10px;
		color:#585858;
		font-size: 14px
	}
	#total{
		font-size: 16px;
		color: #ff9500;
		margin-left: 15px;
	}
	.divider{
		margin:20px 0px;
		border:dashed 1px #cccccc;
	}
	.earnings{
		color:green;
		margin-top:10px
	}
	.pri_type2{
		font-weight: bold;
	    margin-left: 27px;
	    padding-left: 30px;
		background: url(/Public/images/cny_small.png) no-repeat 11px 1px;
	}
	.clear{
		clear:both;
	}
	.text-center{
		text-align: center;
	}
	.extend-tree{
		width: 1200px;
		padding: 20px 0;
		overflow: hidden;
	}
	.extend-tree a{
		font-size: 14px;
		color: #585858;
		float: left;		
	}
	.special{
		color: #777;
		font-size: 14px;
		margin-top: 10px;
		overflow:hidden
	}
	.special span{
		color:#777;
		float:left
	 }
	.special li{
		float:left;
		color:#fff;
		padding:0 5px;
		margin-left:10px
	}
	.special li:nth-child(1){
		background:#FFAEAD;
	}
	.special li:nth-child(2){
		background:#7EEB89;
	}

	.special li:nth-child(3){
		background:#E4A8FF;
	}

	.special li:nth-child(4){
		background:#F77F7C;
	}

	.special li:nth-child(5){
		background:#94B5FF;
	}

	.special li:nth-child(6){
		background:#FFCA7F;
	}
	/*产品详情 样式--begin*/
	.pro_detail{
		margin-top: 30px;
	}
	#pro_detail_route,#pro_detail_cost,#pro_detail_reserve,#pro_detail_visa{
		padding: 0px 20px 0 20px;
		background-color: #fff;
		width: 1200px;
		border-bottom: 1px solid #ccc;
	}
	#pro_detail_cost,#pro_detail_reserve,#pro_detail_visa{
		padding-top: 20px;
	}
	#pro_detail_route{
		padding-top: 20px;
	}
	.pro_detail_nav{
		width: 1200px;
		background-color: #f5f5f5;
		border-bottom:2px solid #00d8ff;
		height: 60px;
	}
	.pro_detail_nav_left{
		float: left;
	}
	.pro_detail_nav_right{
		float: right;
		display: none;
	}
	.pro_detail_apply{
		background-color:#fe9500;
		width:200px;
		height:40px;
		color:#fff;
		border:none;
		font-size:16px;
		font-weight: bold;
		cursor: pointer;
		border-radius: 2px;
		margin-right: 20px;
		margin-top: 10px;
	}
	.pro_detail_route,.pro_detail_cost,.pro_detail_reserve,.pro_detail_visa{
		list-style-type: none;
		float: left;
		height: 60px;
		line-height: 60px;
		width: 150px;
		text-align: center;
		font-size: 16px;
		color: #fff;
		cursor: pointer;
		border:2px solid #00d8ff;
		border-bottom: none;
		background-color: #00d8ff;
	}
	#pro_detail_cost,#pro_detail_reserve,#pro_detail_visa{
		padding-bottom: 20px;
	}
	.pro_detail_nav_active{
		height: 60px;
		line-height: 60px;
		background-color: #fff;
		border-bottom: none;
		color: #00d8ff;
		border-bottom: 2px solid #fff;
	}
	.pro_detail_nav ul .pro_detail_nav_active a{
		color: #fff;
	}
	.pro_detail_moudel{
		padding-bottom: 30px;
	}
	#pro_detail_route{
		overflow: hidden;
		padding-bottom: 50px;
	}
	.route_left{
		float: left;
	}
	.route_left ul li{
		margin-bottom: 10px;
	}
	.route_left ul li a{
		display:inline-block;
		width: 101px;
		height: 34px;
		border-radius: 4px;
		background-color: #e5e5e5;
		line-height: 34px;
		text-align: center;
		color: #777;
		font-size: 14px;
	}
	.route_left ul li a:hover{
		background-color: #7febff;
		color: #fff;
	}
	.route_left ul .on{
		background-color: #7febff;
		color: #fff;
	}
	.route_right{
		float: right;
		margin-right: 35px;
		width: 1000px;
	}
	.apply .apply-btn[disabled]{
		background-color:#ccc;
		cursor:not-allowed;
	}
	.imgs_li{
		float:left;
		margin-right:20px;
		margin-bottom:20px;
		width:400px;
		height:300px;
		display:inline-block
	}
	.clear{
		clear:both
	}
	.calendar-bounding-box .content-box .inner table td span{
		line-height:14px;
		width:25px;
		font-size: 13px;
	}
	.date_pri{
		display:block;
		color:#fe9500
	}
	.date_fix{
		display:block;
		text-indent:2px;
	}
	.day_list{
		font-size: 20px;
		color: #00d8ff;
	}
	.pro_cost_img,.pro_reserve_img,.pro_visa_img,.pro_route_img{
		width: 1200px;
		height: 70px;
		line-height: 70px;
		margin-left: -20px;
		margin-bottom: 20px;
	}
	.pro_route_img{
		background-image: url(/Public/images/feiyong.png);
		background-repeat: no-repeat;
		background-position: 20px center;
	}
	.pro_cost_img{
		background-image: url(/Public/images/feiyong.png);
		background-repeat: no-repeat;
		background-position: 20px center;
	}
	.pro_reserve_img{
		background-image: url(/Public/images/yuding.png);
		background-repeat: no-repeat;
		background-position: 20px center;
	}
	.pro_visa_img{
		background-image: url(/Public/images/qianzheng.png);
		background-repeat: no-repeat;
		background-position: 20px center;
	}
	.pro_other_img{
		background-image: url(/Public/images/qianzheng.png);
		background-repeat: no-repeat;
		background-position: 20px center;
	}
	.pro_moudel_title{
		font-size: 20px;
		color: #333;
		margin-left: 80px;
	}
	.hand{
		display: none;
	}
	.back_top{
		position:fixed;
		right: 20px;
		bottom: 20px;
		z-index: 1;
		cursor: pointer;
		width: 52px;
		height: 52px;
		background-image: url(/Public/images/back_top1.png);
		display: none;
	}
	.back_top:hover{
		background-image: url(/Public/images/back_top.png);
	}
	.pro_xian{
		float: left;
		height: 58px;
		list-style: none;
		width: 1px;
		background-color: #fff;
	}
	.pro_detail_padding{
		padding-left:55px;
		line-height: 25px;
	}
	.des_f_t{
		font-size: 20px;
		color: #00d8ff;
		margin-bottom: 30px;
	}
	.cir{
		position: relative;
	}
	.pro_detail_img img{
		width: 360px;
	}
</style>
<?php

$CI = & get_instance() ;
	$CI->load->library('commen') ;
	if(!$CI->commen->is_weixin()) {
		$share_data = array('qr_url' => $qr_url, 'edit_url' => $edit_url) ;
		$CI->load->view('product/components/com_share_weixin', $share_data) ;
	}
	$p_type = intval($p_type);
	if($p_type === Ptype::ONE_DAY){
		$a = 'y';
	}elseif($p_type ===  Ptype::LOCAL_GROUP || Ptype::GROUP_TRAVEL){
		$a = 'z';
	}elseif($p_type === Ptype::GROUP_TRAVEL_IN){
		$a = 'zi';
	}elseif($p_type === Ptype::ONE_DAY_IN){
		$a = 'yi';
	}
?>
<div class="clear"></div>
<div class="proDetail-main">
		<div class="extend-tree">
			<a href="/mall/recommend">产品商城 ></a>
			<a href="/mall/search?act=<?=$a;?>&continent=<?=$continent?>"><?=$continent_zh?>></a>
			<?php

				$arr_c = json_decode($country,true);
				if($arr_c !== null) {
					$num = count($arr_c);
					$c_list = '';
					for ($i = 0; $i < $num; $i++) {
						if ($i + 1 != $num) {
							$c_list .= '<a href="/mall/search?act='.$a.'&country=' . $arr_c[$i] . '&continent=' . $continent . '">' . $arr_c[$i] . '-</a>';
						} else {
							$c_list .= '<a href="/mall/search?act='.$a.'&country=' . $arr_c[$i] . '&continent=' . $continent . '">' . $arr_c[$i] . '</a>';
						}
					}
					echo $c_list;
				}else{
					echo  '<a href="/mall/search?act='.$a.'&country=' . $country . '&continent=' . $continent . '">' . $country . '</a>';
				}
			?>
		</div>		
		<div class="mainbd">
			<div class="mainbd-left">
				<div class="big_img">
					<img src="<?=$face_img?>" alt="">
				</div>
				<div style="position:relative;margin-top:20px;">
					<i class="pre"></i>
					<i class="back"></i>
					<div class="small_img">
			            <ul style="position: absolute;width:10000px;" id="s_img">
			            	<?php 

			            	foreach($imgs as $v){?>
			            	<li class="normal"><img src="<?=$imgs_url.$v['url']?>" alt=""></li>
			          		<?php }?>
			            </ul>
			        </div>
				</div>
			</div>
			<div class="mainbd-right">
				<div class="title">
					<?=$title?>
				</div>

				<?php
				function get_price1_tip($price_type) {
					switch($price_type) {
						case Ptype::PRICE_TYPE_0:
							return "同行销售价" ;
							break ;
						case Ptype::PRICE_TYPE_1:
							return "建议零售价" ;
							break ;
						default;
							return "err" ;
							break ;
					}
				}

				function get_price2_tip($price_type) {
					switch($price_type) {
						case Ptype::PRICE_TYPE_0:
							return "建议零售价";
							break;
						case Ptype::PRICE_TYPE_1:
							return "佣金";
							break;
						default:
							return "err";
							break;
					}
				}

				function get_single_price($price_type, $prices) {
					if(isset($prices[0]['price2'])) {
						switch($price_type) {
							case Ptype::PRICE_TYPE_0:
								return $prices[0]['price2'];
								break;
							case Ptype::PRICE_TYPE_1:
								return $prices[0]['price1'];
								break;
							default:
								return $prices[0]['price1'];
								break;
						}
					} else {
						return $prices[0]['price1'];
					}
				}
				if($p_status == '4'){
					$single_price = get_single_price($price_type, $prices) ;
				}

				require_once 'libraries/commen_user.php' ;

				$same=get_same_price($display_prices);
				$sale=get_sale_price($display_prices);
				
				?>

				<?php if(isset($sale)) { ?>
					<div class="advise_pri">
						<?php echo get_price2_tip($price_type);?>:<span class="pri_type1"><?=$sale;?></span><b>起</b>
					</div>
					<div class="same_pri">
						<?php echo get_price1_tip($price_type);?>:<span class="pri_type"><?=$same;?></span>
					</div>
				<?php } else { ?>
					<div class="same_pri">
						价格:<span class="pri_type"><?=$same;?></span><b>元</b>
					</div>
				<?php } ?>
				<?php
				$arr = json_decode($tagname);
				if(count($arr)!=0){

				?>
				<ul class="special">
					<span>产品特色:</span>
					<?php
					foreach($arr as $v){

					?>
					<li><?=$v;?></li>
					<?php }?>
				</ul>
				<?php }

				?>

				<div class="apply">
					<?php
					if($p_status === '5'){
					?>
						<button class="apply-btn" disabled>已下线</button>
					<?php
					}else{
					?>
						<button class="apply-btn">立即预定</button>
					<?php
					}
				if($p_status =='4') {
					if ($is_onsale == 1) {

						?>
						<button class="putStore-btn" rel="<?= $is_onsale; ?>" data="<?= $id; ?>" type="<?= $p_type ?>">
							<span>正在销售</span></button>
						<?php

					} else if ($is_onsale ==-1) {

						?>
						<button class="putStore-btn" rel="<?= $is_onsale ?>" data="<?= $id ?>" type="<?= $p_type; ?>">
							<span>放入店铺</span></button>

						<?php

					} else {

						?>
						<button class="putStore-btn" rel="<?= $is_onsale; ?>" data="<?= $id ?>" type="<?= $p_type ?>">
							<span>产品上架</span></button>
					<?php }
				}
				?>
				

				</div>
				<div class="divider_line"></div>
				<div class="lange">
				<span style="margin-right:20px;">语言服务:</span>
					<span>
						<?php $CI = & get_instance() ;
						$CI->load->library('commen') ;
						echo $CI->commen->get_lang_txt($lang) ;?>
					</span>
				</div>
				<div class="group_n">成团人数至少<?=$min_num?>人</div>
			</div>
		</div>

		<div class="pro_detail">
		
			<?php
			if($p_type === Ptype::GROUP_TRAVEL_IN || $p_type === Ptype::LOCAL_GROUP || $p_type === Ptype::GROUP_TRAVEL){
			?>

			<div class="pro_detail_nav">
				<div class="pro_detail_nav_left">
					<ul>
						<li class="pro_detail_route" data="pro_detail_route">行程介绍</li>
						<li class="pro_xian"></li>
						<li class="pro_detail_cost" data="pro_detail_cost">费用</li>
						<li class="pro_xian"></li>
						<li class="pro_detail_reserve" data="pro_detail_reserve">预订须知</li>
						<li class="pro_xian"></li>
						<li class="pro_detail_visa" data="pro_detail_visa">签证</li>
					</ul>
				</div>
				<div class="pro_detail_nav_right">
					<button class="pro_detail_apply">立即预定</button>
				</div>
			</div>


			<div class="pro_detail_moudel">
				<div id="pro_detail_route">
					<div class="pro_route_img"><span class="pro_moudel_title">行程介绍</span></div>
					<div class="day_parent" style="overflow:hidden">
						<div class="route_left" id='route_left'>
							<ul>
								<?php
								$i = 0;
								foreach ($travel_intro as $v) {
									$i++;
									?>
									<li><a class="left<?= $i ?>" href="javascript:;">第<?= $i ?>天</a><img class="hand" src="/Public/images/hand.png" alt=""></li>

									<?php
								}
								?>
							</ul>
						</div>


						<div class="route_right">
							<?php
							$i = 0;
							foreach ($travel_intro as $v) {
								$i++;
								?>
								<div id="right<?= $i; ?>" style="overflow:hidden">	
									<div  style="float:left;width:100px">
										<p class="day_list">Day<?= $i; ?></p>
									</div>
									<div class="cir" style="float:left;width:850px;padding-left:50px;border-left:1px solid #ccc">
											<img src="/Public/images/cir_1.png" alt="" style="position:absolute;top:0px; left:-14px;">
											<p class="des_f_t">
												<span><?= $v['start_name'] ?></span>-<span><?= $v['end_name'] ?></span>
											</p>
											<p style="overflow:hidden" class="pro_detail_img">
											<?php
												if($v['start_img'] != ''){ ?>
													<img class="imgs_li" src="<?= $imgs_url . $v['start_img'] ?>" alt="">
											<?php }
											?>
											<?php
											if($v['end_img'] != '' ){ ?>
												<img class="imgs_li" src="<?= $imgs_url . $v['end_img'] ?>" alt="">
											<?php }
											?>
											</p>

											<p><?= $v['travel_intro']; ?></p>
									</div>


								</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<div  id="pro_detail_cost">
					<div class="pro_cost_img"><span class="pro_moudel_title">费用</span></div>
					<div class="pro_detail_padding"><?= $fee_desc; ?></div>
				</div>
				<div  id="pro_detail_reserve">
				<div class="pro_reserve_img"><span class="pro_moudel_title">预订须知</span></div>
					<div class="pro_detail_padding"><?=$booking_policy;?></div>
				</div>
				<div  id="pro_detail_visa">
				<div class="pro_visa_img"><span class="pro_moudel_title">签证</span></div>
					<div class="pro_detail_padding"><?= $visa ?></div>
				</div>
				<!-- <div  id="pro_detail_other">
				<div class="pro_other_img"><span class="pro_moudel_title">您可能感兴趣的线路</span></div>
					<div style="height:300px;"><?= $visa ?></div>
				</div> -->
			</div>
		</div>
	<?php
	}else {
		?>
		<div class="travel_intro"><?= $travel_intro[0]['travel_intro'] ?></div>
		<?php
	}
	?>
		<div >
			<div >
				<div id="C_calender">
					<div>
						<div class="selectdate">选择日期</div>
					</div>
					<div>
						<div id="J_Calendar" class="calendar"></div>
						<div class="calender_info">
							<div class="sel_num">选择人数</div>
							<div class="cal">
							<span class="reduce">-</span>
							<input class="nums" value="1" readonly>
							<span class="add">+</span>
							</div>
							<div class="subprice">
								单价:&nbsp;&nbsp;&nbsp;&nbsp;<span class="single">未选择</span>(元)
							</div>
							<div class="num1">数量:<span class="num2">X1</span></div>
							<div class="subtotal">
								合计:<span id="total">未选择</span>(元)
							</div>
							<div class="divider"></div>
							<div class="cal_h">
								<div class="cal_top"></div>
								<div class="cal_n">不可选日期</div>
							</div>
							<div class="cal_m_h">
								<div class="cal_middle"></div>
								<div class="cal_m">可选日期</div>
							</div>
							<div class="cal_h">
								<div class="cal_bottom"></div>
								<div class="cal_n">已选日期</div>
							</div>
						</div>
					</div>

					<form action="/order/fillorder" method="get">
						<input type="hidden" name="date" value="" id="date">
						<input type="hidden" name="pid" value="<?=$pid;?>">
						<input type="hidden" name="aid" value="<?php if(isset($aid)) echo $aid; else echo '' ;?>">
						<input type="hidden" name="title" value="<?=urlencode($title);?>">
						<input type="hidden" name="pnum" value="1" id="pnum">
						<input type="hidden" name="p_type" value="<?=$p_type;?>">
						<input type="hidden" name="totalprice" value="" id="totalprice">
						<input type="hidden" name="price1" value="" id="price1">
						<div class="order"><input type="submit" value="立即预定" id="orderbtn"></div>
					</form>
			   </div>
	       </div>
       </div>
</div>
<div class="back_top" title="回到顶部"></div>
<div class="clear"></div>
<script src="/Public/js/layer.js"></script>
<script src="/Public/js/yui-min.js"></script>
<script src="/Public/js/trip-calendar.js"></script>
<script src="/Public/js/date_fomat.js"></script>
<script>
	$(".back_top").click(function() {
			$("body,html").animate({
				scrollTop: 0
				},
				500);
		});
	<?php
		if($p_type === Ptype::GROUP_TRAVEL_IN || $p_type === Ptype::LOCAL_GROUP || $p_type === Ptype::GROUP_TRAVEL){
	?>
	$(function () {
		$(".left1").addClass('on');
		$(".left1+.hand").css({
					display: 'inline-block'
				});
		$(".pro_detail_route").addClass('pro_detail_nav_active');
		var day_parent=Math.ceil($(".day_parent").offset().top-90);
		var pro_detail_nav = Math.ceil($(".pro_detail_nav").offset().top);//分类导航距离文档顶部的高度
		var route = Math.ceil($("#pro_detail_route").offset().top - 80);//行程模块距离文档顶部的距离 80是分类导航的高度
		var cost = Math.ceil($("#pro_detail_cost").offset().top - 60);//费用模块距离文档顶部的距离 80是分类导航的高度
		var reserve = Math.ceil($("#pro_detail_reserve").offset().top - 60);//预定模块距离文档顶部的距离 80是分类导航的高度
		var visa = Math.ceil($("#pro_detail_visa").offset().top - 60);//签证模块距离文档顶部的距离 80是分类导航的高度
		var route_nav = Math.ceil($("#pro_detail_route").offset().top);//行程模块距离文档顶部的距离 80是分类导航的高度
		var pro_detail_left = [];//左边天数数组
		var pro_detail_right = [];//右边天数数组

		var arr = [];//scrolltop值 数组
		var num = $(".route_left ul li");
		//获取左右天数距离文档顶部的高度值 分别存入数组
		for (var i = 1; i < num.length + 1; i++) {
			var h = Math.ceil($(".left" + i).offset().top);
			var r =Math.ceil($("#right" + i).offset().top);

			pro_detail_left.push(h);
			pro_detail_right.push(r);
		}
		for (var i = 1; i < pro_detail_right.length + 1; i++) {
			var gaodu = Math.ceil(pro_detail_right[i - 1] - 80 - (i - 1) * 44);
			arr.push(gaodu)
		}

		//行程天数点击事件
		$(".route_left ul li a").click(function () {
			var index = $(this).parent("li").index() + 1;
			//console.log(index)点击左边天数  点击第几个输出几
			var scroll_Top = Math.ceil(pro_detail_right[index - 1] - 80 - (index - 1) * 44);
			$("body,html").animate({
					scrollTop: scroll_Top
				},
				1000);
		});


		//分类导航条点击事件
		$(".pro_detail_nav_left ul li").click(function () {
			var name = "#" + $(this).attr('data');
			// console.log(name);// 输出对应的class 前面加上#
			var nav_Top = Math.ceil($(name).offset().top - 60);
			
			$("body,html").animate({
					scrollTop: nav_Top
				},
				1000);
		});
		function remove_nav_class() {
			$(".pro_detail_nav_left ul li").removeClass('pro_detail_nav_active');
		}

		function remove_left_class() {
			$(".route_left ul li a").removeClass('on');
			$(".hand").css({
					display: 'none'
				});
		}
		
		$(window).scroll(function () {
			var top = $(document).scrollTop();
			//回到顶部
			if (top>0) {
				$(".back_top").show();
			}else{
				$(".back_top").hide();

			}
			// 分类滚动监听
			if (top >= route && top < cost) {
				remove_nav_class();
				$(".pro_detail_route").addClass('pro_detail_nav_active');
			}
			else if (top >= cost && top < reserve) {
				remove_nav_class();
				$(".pro_detail_cost").addClass('pro_detail_nav_active');
			} else if (top >= reserve && top < visa) {
				remove_nav_class();
				$(".pro_detail_reserve").addClass('pro_detail_nav_active');
			} else if (top >= visa) {
				remove_nav_class();
				$(".pro_detail_visa").addClass('pro_detail_nav_active');
			}
			// nav和天数固定 随滚动条滚动移动
			if (top >= pro_detail_nav) {
				$(".pro_detail_nav").css({
					position: 'fixed',
					top: '0',
					'z-index':'1'
				});
				$(".pro_detail_nav_right").css({
					display: 'block'
				});
				$("#pro_detail_route").css({
					'padding-top': '80px',
				});
			} else {
				$(".pro_detail_nav").css({
					position: 'relative'
				});
				$(".pro_detail_nav_right").css({
					display: 'none'
				});
				$("#pro_detail_route").css({
					'padding-top': '20px',
				});
				// $(".pro_detail_route").css('pro_detail_nav_active');
				// $('.left1').addClass('on');
			}

			// 天数的固定
			if (top>=day_parent) {
				$(".route_left").css({
					position: 'fixed',
					top: '80px'
				});
			}else{
				$(".route_left").css({
					position: 'relative',
					top: '0px'
				});
				$('.left1').addClass('on');
				$(".left1+.hand").css({
					display: 'inline-block'
				});
			}
			//判断滚动到哪天
			if (top >= arr[0] && top < arr[1]) {
				remove_left_class();
				$(".left1").addClass('on');
				
				$(".left1+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[1] && top < arr[2]) {
				remove_left_class();
				$(".left2").addClass('on');
				$(".left2+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[2] && top < arr[3]) {
				remove_left_class();
				$(".left3").addClass('on');
				$(".left3+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[3] && top < arr[4]) {
				remove_left_class();
				$(".left4").addClass('on');
				$(".left4+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[4] && top < arr[5]) {
				remove_left_class();
				$(".left5").addClass('on');
				$(".left5+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[5] && top < arr[6]) {
				remove_left_class();
				$(".left6").addClass('on');
				$(".left6+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[6] && top < arr[7]) {
				remove_left_class();
				$(".left7").addClass('on');
				$(".left7+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[7] && top < arr[8]) {
				remove_left_class();
				$(".left8").addClass('on');
				$(".left8+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[8] && top < arr[9]) {
				remove_left_class();
				$(".left9").addClass('on');
				$(".left9+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[9] && top < arr[10]) {
				remove_left_class();
				$(".left10").addClass('on');
				$(".left10+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[10] && top < arr[11]) {
				remove_left_class();
				$(".left11").addClass('on');
				$(".left11+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[11] && top < arr[12]) {
				remove_left_class();
				$(".left12").addClass('on');
				$(".left12+.hand").css({
					display: 'inline-block'
				});
			} else if (top >= arr[12] && top < arr[13]) {
				remove_left_class();
				$(".left13").addClass('on');
				$(".left13+.hand").css({
					display: 'inline-block'
				});
			} else if(top >= arr[13] && top < arr[14]){
				remove_left_class();
				$(".left14").addClass('on');
				$(".left14+.hand").css({
					display: 'inline-block'
				});
			} else if(top >= arr[14] && top < arr[15]){
				remove_left_class();
				$(".left15").addClass('on');
				$(".left15+.hand").css({
					display: 'inline-block'
				});
			} else if(top >= arr[15] && top < arr[16]){
				remove_left_class();
				$(".left16").addClass('on');
				$(".left16+.hand").css({
					display: 'inline-block'
				});
			} else if(top >= arr[16] && top < arr[17]){
				remove_left_class();
				$(".left17").addClass('on');
				$(".left17+.hand").css({
					display: 'inline-block'
				});
			} else if(top >= arr[17] && top < arr[18]){
				remove_left_class();
				$(".left18").addClass('on');
				$(".left18+.hand").css({
					display: 'inline-block'
				});
			} else if(top >= arr[18] && top < arr[19]){
				remove_left_class();
				$(".left19").addClass('on');
				$(".left19+.hand").css({
					display: 'inline-block'
				});
			} else if(top >= arr[19] && top < arr[20]){
				remove_left_class();
				$(".left20").addClass('on');
				$(".left20+.hand").css({
					display: 'inline-block'
				});
			} else if(top >= arr[20] && top < arr[21]){
				remove_left_class();
				$(".left21").addClass('on');
				$(".left21+.hand").css({
					display: 'inline-block'
				});
			} 
			//最后一个的判断
			else if (top >= arr[arr.length - 1] && top < arr[arr.length - 1] + 150) {
				remove_left_class();
				$(".left" + arr.length).addClass('on');
				$(".left" + arr.length).parent('li').find('.hand').css({
					display: 'inline-block'
				});
			} else if (top > arr[arr.length - 1] + 150) {
				$(".route_left").css({
					position: 'absolute',
					'top': 0
				});
			}
		});
	})


	<?php
	}
	if($p_status === '4') {
	?>
		var startdate = new Date();
		var enddate = null;
		var is_arr = 1;
		var start = '';
		var arraydate = null;
		var arrp = null;
		var p_type = '<?=$p_type;?>' - 0;
		var prices = '<?=json_encode($prices);?>';
		var arrayPrice = JSON.parse(prices);

		<?php
			
		if($calendar_type == Ptype::CALENDAR_TYPE_DATE){ ?>
			start = arrayPrice[0]['calendar_from']*1000;

			if (start < startdate) {

				startdate = new Date();
			} else {
				startdate = (new Date(start-0)).Format("yyyy-MM-dd");
			}


			enddate = (new Date(start-0+15552000000)).Format("yyyy-MM-dd");
			arraydate = new Array();
			var arrPrice = '[{';
			var num = arrayPrice.length;
			for (var n in arrayPrice) {
				var date = new Date(parseInt(arrayPrice[n]['calendar_from']) * 1000);
				arraydate.push(date.Format("yyyy-MM-dd"));
				arrPrice += '"' + date.Format('yyyy-MM-dd') + '":"' + arrayPrice[n]['price1'] + '"';
				if ((n - 0 + 1) != num) {
					arrPrice += ',';
				}
			}
			arrPrice += '}]';
			arrp = (JSON.parse(arrPrice))[0];
	        is_arr = 3;
		<?php }elseif($calendar_type == Ptype::CALENDAR_TYPE_A_PERIOD){ ?>
			start = arrayPrice[0]['calendar_from']*1000;
//			alert(start);
			if (start < startdate) {
				startdate = new Date();
			} else {
				startdate = (new Date(start-0)).Format("yyyy-MM-dd");
			}
			var len = arrayPrice.length-0;
			end = arrayPrice[len-1]['calendar_to']*1000;
			enddate = (new Date(end-0)).Format("yyyy-MM-dd");

			var perPrice = '[{';
			for (var n in arrayPrice) {
				var from = new Date(arrayPrice[n]['calendar_from']*1000).Format("yyyy-MM-dd");
				var to = new Date(arrayPrice[n]['calendar_to']*1000).Format("yyyy-MM-dd");
				arrayPrice[n]['calendar_from'] = from;
				arrayPrice[n]['calendar_to'] = to;
				var key = arrayPrice[n]['id'];
				var value = arrayPrice[n]['price1']
				perPrice += '"'+key+'":"'+value+'"';
				if ((n - 0 + 1) != len) {
					perPrice += ',';
				}
			}
			perPrice +='}]';
			var pPrice = JSON.parse(perPrice)[0];
			is_arr = 2;
			arraydate = arrayPrice;
//			console.log(arraydate);
//			console.log(pPrice);
			arrp = pPrice;
		<?php }elseif($calendar_type == Ptype::CALENDAR_TYPE_FULL_YEAR){ ?>
//			alert(start);
			enddate = null;
	        arrp = arrayPrice[0]['price1'];
		<?php } ?>
//	console.log(arrp);
//	console.log(is_arr);
//	console.log(arraydate);
	var nowdate = new Date();
	var min_date = nowdate.getFullYear() +''+ ((nowdate.getMonth()+1)>9 ? (nowdate.getMonth()+1) : '0'+(nowdate.getMonth()+1))+''+ nowdate.getDate();
	function toNumber(dat){
		return dat.toString().replace(/-|\//g, '');
	}
	if(toNumber(startdate) < toNumber(min_date)){
		startdate = min_date;
	}
	var selectedDate =null;
		YUI().use('trip-calendar', function (Y) {

			/**
			 * 非弹出式日历实例
			 * 直接将日历插入到页面指定容器内
			 */
			var oCal = new Y.TripCalendar({
				contain: '#J_Calendar', //非弹出式日历时指定的容器（必选）
				// selectedDate: new Date,       //指定日历选择的日期
				count: 1,
				date:startdate,
				minDate: startdate,
				maxDate: enddate,
				isArrayDate: is_arr,
				arrayDate: arraydate,
				arrayPrice: arrp,
			});

			//日期点击事件
			oCal.on('dateclick', function () {
				selectedDate = this.get('selectedDate');
				var price = this.get('arrayPrice');
				var Dates = this.get('arrayDate');
				var isarr = this.get('isArrayDate');

				if(isarr === 1){
					var  single_p = price;

				}else if(isarr === 2){
					function test_price(dat,Date){
						for(var n in Dates){
							if(toNumber(dat) >= toNumber(Dates[n]['calendar_from'])  &&　toNumber(dat) <= toNumber(Dates[n]['calendar_to'])){
								return Dates[n]['id'];
							}
						}
					}

					var id = test_price(selectedDate);
					var  single_p = price[id];
				}else if(isarr === 3){
					var single_p = price[selectedDate];
				}
				$('.single').html(single_p);
				$('#total').html(single_p);
				$('#price1').val(single_p);
				$('#totalprice').val(single_p);
				$('#date').val(selectedDate);
			});
		})
	<?php
		}
	?>


</script>

<script type="text/javascript">
	var num_img = "<?php echo count($imgs);?>";
	var img_l=0;
	var i = 0;
	$('.pre').click(function(){	
		if(i>0){
			img_l +=147;
			i--;
		}
		$('ul').css('left',img_l+'px');
	});
	$('.back').click(function(){
		if(i<(num_img-4)){
		   img_l -=147;
		   i++;
		}
		$('ul').css('left',img_l+'px');
	});

	$('ul li img').click(function(){
		$(this).parent().addClass('selected').siblings().removeClass('selected');
		var img = $(this).attr('src');
		$('.big_img img').attr('src',img);

	});

	$('.apply .apply-btn').click(function(){
		layer.open({
			  title:false,
			  type: 1,
			  //skin: 'layui-layer-rim', //加上边框
			  area: ['750px', '450px'], //宽高
			  content:$('#C_calender'),
			  maxmin:false,
		 });
		 $('#C_calender').css({'top':'0px','z-index':'0'});
	})
	
	$('.pro_detail_apply').click(function(){
		layer.open({
			  title:false,
			  type: 1,
			  //skin: 'layui-layer-rim', //加上边框
			  area: ['750px', '450px'], //宽高
			  content:$('#C_calender'),
			  maxmin:false,
		 });
		 $('#C_calender').css({'top':'0px','z-index':'0'});
	 })
	$('.add').click(function(){
		var num = parseInt($('.nums').val());
		var price = $('.single').html();
		if(num<10){
			num =num + 1;
			$('.nums').val(num);
			$('.num2').html('X'+num);
			var total = num*price;
			$('#total').html(total);
			$('#totalprice').val(total);
			$('#pnum').val(num);
			
		}	
	})
	$('.reduce').click(function(){
		var num = parseInt($('.nums').val());
		var price = $('.single').html();
		if(num>1){
			num =num - 1;
			$('.nums').val(num);
			$('.num2').html('X'+num);
			var total = num*price;
			$('#total').html(total);
			$('#totalprice').val(total);
			$('#pnum').val(num);

		}
	})
	$('#orderbtn').click(function(){
		var date = $('#date').val();
		if(!date){
			alert('请选择日期');
			return false;
		}

		return true;
	})
	var imgWidth = num_img*154;
	$('#s_img').css('width',imgWidth+'px');
	$(function(){
		var top1=$(window).height();//窗口高度
		var top3=$(document).height();//文档高度
		var top2=$('.main-footer').offset().top;
	    var Top=$('.proDetail-main').height();
	    $(window).scroll(function(){
	        var sTop= $(window).scrollTop();//滚动条高度
	         if(Top +300> sTop){
	            $('.ibar').css({'position':'fixed','top':'170px','right':'-2px','display':'block'});
	         }else{
	            $('.ibar').css({'display':'none','position':'fixed','top':'75px','right':'-2px'});
	         }
	    })
	})
	$('.tra_detail img').parents('.slides').css('width','100%');
	$(".putStore-btn").click(function(){
				var sell = $(this);
				if(sell.attr('rel') === 1){
					var res = confirm('您确定要取消销售该产品么？');
					if(!res){
						return false;
					}
				}
				var url = "/product/operation";
				var id = $(this).attr('data');
				var p_type = $(this).attr('type');
				var p_status = $(this).attr('rel');
		        $.get(url, {
		            id:id,
		            p_type:p_type,
		            p_status:p_status
		        }, function(data) {
		            if(data['result']['err'] == 0) {
		            	p_status=data['content']['p_status'];
		              	sell.attr('rel',p_status);
		              	if(p_status==="1"){
		              		sell.removeClass('init');
		              		sell.html('正在销售');
		              	}else{
		              		sell.addClass('init');
		              		sell.html('产品上架');
		              	}
		            } else {

		            }
		         })
		});
  </script>