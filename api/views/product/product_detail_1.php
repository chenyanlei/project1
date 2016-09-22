<div class="col-sm-12" style="border: 1px solid">

	<form method="post" name="oneday" id="oneday_form" class="form-horizontal y-margin-bottom-10px">

		<div class="row form_group y-margin-top-10px">
			<div id="uploadInf" class="upload_inf col-sm-10 col-sm-offset-2"></div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<img class="col-sm-offset-2" <?php
									if(isset($face_img)) echo "width=\"400px\"". "height=\"400px\""."src=\"". $face_img."\"";
									else echo "src=\"http://img.yakejiao.com/1.jpg\"";  ?>"/>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="title" class="col-sm-2 control-label">标题</label>
			<div class="col-sm-10">
				<label class="control-label"><?php echo $title; ?></label>
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="language" class="col-sm-2 control-label">语言服务</label>
			<div class="col-sm-10">
				<label class="control-label"><?php echo $language; ?></label>
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="price_sel" class="col-sm-2 control-label">销售价</label>
			<div class="col-sm-10">
				<label class="control-label"><?php if(isset($price_current)) { echo $price_current;}  ?></label>
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="price_sel_1" class="col-sm-2 control-label">同行价</label>
			<div class="col-sm-4">
				<label class="control-label"><?php if(isset($price_normal)) { echo $price_normal;}  ?></label>
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="date_start">产品有效期</label>
			<div class="col-sm-10">
				<label class="control-label"><?php if(isset($start_time)) { echo $start_time;}
				if(isset($end_time)) { echo "--".$end_time;} ?></label>
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="feature">产品特色</label>
			<div class="col-sm-10">
				<label class="control-label"><?php if(isset($feature)) { echo $feature;}  ?></label>
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="travel_introduction">行程介绍</label>
			<div class="col-sm-10">
<!--				<label class="control-label">--><?php //if(isset($travel_introduction)) { echo $travel_introduction;}  ?><!--</label>-->
				<p class="text-left" id="content_id"></p>
			</div>
		</div>

		<div class="row y-margin-top-10px y-margin-bottom-10px"></div>
	</form>

	<div class="row col-sm-offset-2  y-margin-top-20px y-margin-bottom-10px" style="margin-bottom: 50px">
		<button type="button" class="col-sm-2 col-sm-offset-1 btn btn-primary" onclick="edit_product()">编辑</button>
	</div>

	<div style="clear: both"></div>
</div>

<script>

	$("#content_id").html(<?php if(isset($travel_introduction)) { echo json_encode($travel_introduction);}  ?>) ;

	function edit_product(){
		window.location.href = window.location.protocol + "//" + window.location.host + "/page/product_edit" + "?pid=" + <?php echo $id; ?> ;

		console.log("protocol:" +window.location.protocol) ;
		console.log("host:" +window.location.host) ;
		console.log("href:" + window.location.href) ;
	}
</script>