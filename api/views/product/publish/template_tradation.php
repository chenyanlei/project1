<div class="col-sm-10">
	<?php $this->load->view('product/publish/image_upload'); ?>
	<form method="post" name="oneday" id="oneday_form" class="form-horizontal y-margin-bottom-10px">

		<input type="hidden" id="edit_type" value="<?php if(isset($edit_type)) echo $edit_type;?>">
		<div class="row form_group y-margin-top-10px">
			<div id="uploadInf" class="upload_inf col-sm-10 col-sm-offset-2">

			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label class="col-sm-2 control-label" for="btn_upload_img">选择图片</label>
			<div class="col-sm-10">
				<button id="btn_upload_img" type="button" class="col-sm-2 btn btn-primary" data-toggle="modal" data-target="#myModal">上传图片</button>
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="title" class="col-sm-2 control-label">产品名称</label>
			<div class="col-sm-10">
				<input id="title" type="text" name="title" class="form-control" value="<?php if(isset($title)) echo $title;?>">
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="language" class="col-sm-2 control-label">语言服务</label>
			<div class="col-sm-2">
				<select id="language" name="language" class="col-sm-10 form-control">
					<option value="1" <?php if(isset($language) && $language == 1) echo "selected";?>>中文</option>
					<option value="2" <?php if(isset($language) && $language == 2) echo "selected";?>>英文</option>
					<option value="3" <?php if(isset($language) && $language == 3) echo "selected";?>>中文/英文</option>
				</select>
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="price_sel" class="col-sm-2 control-label">销售价</label>
			<div class="col-sm-4">
				<input id="price_sel" type="text" name="price_sel" class="form-control" value="<?php if(isset($price_current)) echo $price_current; ?>">
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="price_sel_1" class="col-sm-2 control-label">同行价</label>
			<div class="col-sm-4">
				<input id="price_sel_1" type="text" name="price_sel_1" class="form-control" value="<?php if(isset($price_normal)) echo $price_normal ;?>" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="date_start">产品有效期</label>
			<div class="col-sm-4">
				<input id="date_start" type="date" name="date_start" class="form-control" value="<?php if(isset($start_time)) echo $start_time;?>">
			</div>
			<div class="col-sm-1 text-center">
				<label class="control-label col-center-block">--</label>
			</div>
			<div class="col-sm-4">
				<input id="date_end" type="date" name="date_end" class="form-control" value="<?php if(isset($end_time)) echo $end_time;?>">
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="start_city">地接始发城市(或出发城市)</label>
			<div class="col-sm-10">
				<input id="start_city" type="text" name="start_city" class="form-control" value="<?php if(isset($city)) echo $city ;?>">
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="feature">产品特色</label>
			<div class="col-sm-10">
				<textarea rows="5" id="feature" type="text" name="featrue" class="form-control" value="<?php if(isset($product_feature)) echo $product_feature ;?>"></textarea>
			</div>
		</div>

		<div class="row y-margin-top-10px">

			<label class="col-sm-2 control-label" for="travel_introduction">行程介绍</label>
			<div class="col-sm-10">
				<script id="travel_introduction" name="travel_introduction" style="min-height:500px;"></script>
			</div>
		</div>

		<div class="row col-sm-offset-2  y-margin-top-20px y-margin-bottom-10px">
			<button type="button" class="col-sm-2 btn btn-default" onclick="preview()">预览</button>
			<button type="button" class="col-sm-2 col-sm-offset-1 btn btn-primary" onclick="commit1()">提交</button>
		</div>

		<div class="row y-margin-top-10px y-margin-bottom-10px"></div>
	</form>
</div>

<style>
	.col-center-block {
		float: none;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}
</style>
<script>
	document.getElementById('date_start').valueAsDate = new Date();
	document.getElementById('date_end').valueAsDate = new Date();

//	$(function) {
//		$type = $("#edit_type").val() ;
//		if($type == 1) {
//
//
//		}
//	} ;

//	var content = $("#travel_introduction_value").val() ;
//	UE.getEditor('travel_introduction').setContent(content) ;
//	$("#travel_introduction_value").val('') ;


	<?php if(isset($imgs)) {
        foreach($imgs as $img) { ?>
		var img_url = <?php echo json_encode($img['url']);?> ;
		$("#uploadInf").append("<img src=" + img_url + " name='uploaded_img' class='upload_suc_img' onclick='setfaceimg(\"" + img_url + "\"," + m_upload_imgs.length + ")'></img>")

	<?php }} ?>

	function commit1() {

		if(m_upload_imgs.length <= 0 ) {
			alert("请先上传图片") ;
			return ;
		}

		var title = $("#title").val() ;
		if(title.length <= 0 ) {
			alert('请输入名称') ;
			return;
		}

		var language = $("#language").val() ;
		if(language.length <= 0 ) {
			alert('请选择语言') ;
			return;
		}

		var price_sel = $("#price_sel").val() ;
		if(price_sel == null || price_sel.length <= 0) {
            alert('请输入销售价格') ;
			return;
		}

		var price_sel_1 = $("#price_sel_1").val() ;
		if(price_sel_1 == null || price_sel_1.length <= 0) {
			alert('请输入同行价') ;
			return;
		}

		var date_start = $("#date_start").val() ;
		if(date_start == null || date_start.length <= 0) {
			alert('请选择起始日期') ;
			return;
		}

		var date_end = $("#date_end").val() ;
		if(date_end == null || date_end.length <= 0) {
			alert('请选择终止日期') ;
			return;
		}

		var feature = $("#feature").val() ;
		if(feature ==null || feature.length <= 0 ) {
			alert('请输入产品特色') ;
			return;
		}

//		var recommend_reason = "推荐理由" ;//UE.getEditor('recommend_reason').getContent();//$("#recommend_reason").val() ;
//		var preferential = "暂无优惠" ;//UE.getEditor('preferential').getContent();//$("#preferential").val() ;
//		var travel_brief = "简介";//UE.getEditor('travel_brief').getContent();//$("#travel_brief").val() ;
//		var fee_brief = "费用简介";//UE.getEditor('fee_brief').getContent();//$("#fee_brief").val() ;
//		var contact_tel = "15210150725";//$("#contact_tel").val() ;
//		var editor_ue = "备注";//UE.getEditor('editor_ue').getContent();//$("#editor_ue").val() ;

		var travel_introduction = UE.getEditor('travel_introduction').getContent();//$("#recommend_reason").val() ;
		if(travel_introduction ==null || travel_introduction.length <= 0 ) {
			alert('请输入行程介绍') ;
			return;
		}

		var data = getCookie('user_info') ;
		console.log("header:"+data) ;
		var jObj = jQuery.parseJSON(data) ;
//		var user_name = jObj.login_name ;
		var token  = jObj.token ;
//		alert("token" + token) ;
		$.post("http://yakejiao.com/product/commit",
			{
				type:1,
				title: title,
				language:language,
				imgs: m_upload_imgs,
				face_img:m_face_img,
				date_start:date_start,
				date_end:date_end,
				feature:feature,
				travel_introduction:travel_introduction,
				token:token
			},
			function(data) {
				alert("data:" + data) ;
//                var jObj = jQuery.parseJSON(data) ;
//				var str = JSON.stringify(jObj);
//				alert("err:" + jObj.result.err) ;
				if(data != null && data.result.err == 0 ) {
					alert('产品提交成功') ;
				}
			}) ;
	}

</script>
