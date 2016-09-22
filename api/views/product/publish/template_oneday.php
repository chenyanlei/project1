<div class="col-sm-10">
	<?php $this->load->view('product/publish/image_upload'); ?>
	<form method="post" name="oneday" id="oneday_form" class="form-horizontal y-margin-bottom-10px">

		<div class="row form_group y-margin-top-10px">
			<div id="uploadInf" class="upload_inf col-sm-10 col-sm-offset-2"></div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label class="col-sm-2 control-label" for="btn_upload_img">选择图片</label>
			<div class="col-sm-10">
				<button id="btn_upload_img" type="button" class="col-sm-2 btn btn-primary" data-toggle="modal" data-target="#myModal">上传图片</button>
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="title" class="col-sm-2 control-label">标题</label>
			<div class="col-sm-10">
				<input id="title" type="text" name="title" class="form-control">
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="language" class="col-sm-2 control-label">语言服务</label>
			<div class="col-sm-2">
				<select id="language" name="language" class="col-sm-10 form-control">
					<option value="1">中文</option>
					<option value="2">英文</option>
					<option value="3">中文/英文</option>
				</select>
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label class="col-sm-2 control-label" for="country">目的地国家</label>
			<div class="col-sm-9">
				<input class="form-control" id="country" type="text" name="country">
			</div>
			<button type="button" class="col-sm-1 btn btn-primary" data-toggle="modal" data-target="#myModal">选择</button>
		</div>

		<div class="row form_group y-margin-top-10px">
			<div>
				<label class="col-sm-2 control-label" for="city">目的地城市</label>
				<div class="col-sm-9">
					<input id="city" type="text" name="city" class="form-control">
				</div>
			</div>
			<button type="button" class="col-sm-1 btn btn-primary" data-toggle="modal" data-target="#myModal">选择</button>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="date_start">产品有效期</label>
			<div class="col-sm-4">
				<input id="date_start" type="date" name="date_start" class="form-control">
			</div>
			<div class="col-sm-1 text-center">
				<label class="control-label col-center-block">--</label>
			</div>
			<div class="col-sm-4">
				<input id="date_end" type="date" name="date_end" class="form-control">
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="price_sel" class="col-sm-2 control-label">销售价</label>
			<div class="col-sm-2">
				<input id="price_sel" type="text" name="price_sel" class="form-control">
			</div>
			<label for="price_sel_1" class="col-sm-1 control-label">同行价</label>
			<div class="col-sm-2">
				<input id="price_sel_1" type="text" name="price_sel_1" class="form-control" onKeypress="if (event.keyCode < 48 || event.keyCode > 57) event.returnValue = false;">
			</div>
			<label for="person_num" class="col-sm-1 control-label">人数</label>
			<div class="col-sm-2">
				<select id="person_num" name="person_num" class="col-sm-2 form-control">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-default" onclick="more_price()">更多价格</button>
			</div>
		</div>

		<div id="more_prices" class="row form_group y-margin-top-10px">
		</div>

		<div class="sr-only row form_group y-margin-top-10px">
			<label for="price_more" class="col-sm-2 control-label">更多价格</label>
			<div class="col-sm-4">
				<button type="button" class="col-sm-4 btn btn-default" onclick="more_price()">增加价格</button>
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="feature">产品特色</label>
			<div class="col-sm-10">
				<textarea rows="5" id="feature" type="text" name="featrue" class="form-control"></textarea>
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

<script>
	document.getElementById('date_start').valueAsDate = new Date();
	document.getElementById('date_end').valueAsDate = new Date();


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

		var country = $("#country").val() ;
		if(country ==null || country.length <= 0 ) {
			alert('请输入目的地国家') ;
			return;
		}

		var city = $("#city").val() ;
		if(city ==null || city.length <= 0 ) {
			alert('请输入目的地城市') ;
			return;
		}

		var feature = $("#feature").val() ;
		if(feature ==null || feature.length <= 0 ) {
			alert('请输入产品特色') ;
			return;
		}

		var travel_introduction = UE.getEditor('travel_introduction').getContent();//$("#recommend_reason").val() ;
		if(travel_introduction ==null || travel_introduction.length <= 0 ) {
			alert('请输入行程介绍') ;
			return;
		}

		$.post("http://yakejiao.com/product/commit",
			{
//				$("#oneday_form").serialize(),
				type:2,
				imgs: m_upload_imgs,
				title: title,
				language:language,
				country:country,
				city:city,
				feature:feature,
				travel_introduction:travel_introduction
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
