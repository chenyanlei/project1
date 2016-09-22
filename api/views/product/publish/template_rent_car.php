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
			<label for="title" class="col-sm-2 control-label">车型</label>
			<div class="col-sm-9">
				<input id="title" type="text" name="title" placeholder="例如：别克6座商务" class="form-control">
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="price_sel" class="col-sm-2 control-label">价格</label>
			<div class="col-sm-4">
				<input id="price_sel" type="text" name="price_sel" class="form-control">
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="date_start">价格有效期</label>
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
			<label for="language" class="col-sm-2 control-label">语言服务</label>
			<div class="col-sm-4">
				<select id="language" name="language" class="col-sm-4 form-control">
					<option value="1">中文</option>
					<option value="2">英文</option>
					<option value="3">中文/英文</option>
				</select>
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="feature">产品说明</label>
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



		var date_start = $("#date_start").val() ;
		if(date_start == null || date_start.length <= 0) {
			alert('请选择起始日期') ;
			return;
		}

		var travel_introduction = UE.getEditor('travel_introduction').getContent();//$("#recommend_reason").val() ;
		if(travel_introduction ==null || travel_introduction.length <= 0 ) {
//			alert('请输入行程介绍') ;
//			return;
		}

		$.post("http://yakejiao.com/product/commit",
			{
				type:4,
				imgs: m_upload_imgs,
				title: title,
				date_start:date_start,
				language:language,
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
