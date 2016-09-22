<div class="col-sm-10">
	<?php $this->load->view('product/publish/image_upload'); ?>
	<form method="post" name="oneday" id="oneday_form" class="form-horizontal y-margin-bottom-10px">

		<div class="row form_group y-margin-top-10px">
			<label for="person_num" class="col-sm-2 control-label">人数（必填）</label>
			<div class="col-sm-10">
				<input id="person_num" type="text" name="person_num" class="form-control">
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label for="person_price" class="col-sm-2 control-label">人均预算（可选）</label>
			<div class="col-sm-10">
				<input id="person_price" type="text" name="person_price" class="form-control">
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<label class="col-sm-2 control-label" for="country">目的地国家（必填）</label>
			<div class="col-sm-9">
				<input class="form-control" id="country" type="text" name="country">
			</div>
			<button type="button" class="col-sm-1 btn btn-primary" data-toggle="modal" data-target="#myModal">选择</button>
		</div>

		<div class="row form_group y-margin-top-10px">
			<div>
				<label class="col-sm-2 control-label" for="city">目的地城市（必填）</label>
				<div class="col-sm-9">
					<input id="city" type="text" name="city" class="form-control">
				</div>
			</div>
			<button type="button" class="col-sm-1 btn btn-primary" data-toggle="modal" data-target="#myModal">选择</button>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="date_start">时间（必填）</label>
			<div class="col-sm-4">
				<input id="date_start" type="date" name="date_start" class="form-control">
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="date_num">天数（必填）</label>
			<div class="col-sm-4">
				<input id="date_num" type="number" name="date_num" class="form-control">
			</div>
		</div>

		<div class="row y-margin-top-10px">
			<label class="col-sm-2 control-label" for="travel_introduction">旅程需求（可选），请添加旅游、度假、出国考察等需求，我们可以提供更合适的产品和服务</label>
			<div class="col-sm-10">
				<script id="travel_introduction" name="travel_introduction" style="min-height:500px;"></script>
			</div>
		</div>

		<div class="row form_group y-margin-top-10px">
			<div>
				<label class="col-sm-2 control-label" for="contact_person">联系人</label>
				<div class="col-sm-4">
					<input id="contact_person" type="text" name="contact_person" class="form-control">
				</div>
			</div>
			<div>
				<label class="col-sm-2 control-label" for="contact_phone">联系电话</label>
				<div class="col-sm-4">
					<input id="contact_phone" type="text" name="contact_phone" class="form-control">
				</div>
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

		var person_num = $("#person_num").val() ;
		if(person_num.length <= 0 ) {
			alert('请输入人数') ;
			return;
		}

		var person_price = $("#person_price").val() ;
		if(person_price == null || person_price.length <= 0) {
			alert('请输入人均预算价格') ;
			return;
		}

		var country = $("#country").val() ;
		if(country == null || country.length <= 0) {
			alert('请输入想要去的国家') ;
			return;
		}

		var city = $("#city").val() ;
		if(city == null || city.length <= 0) {
			alert('请输入想要去的城市') ;
			return;
		}

		var date_start = $("#date_start").val() ;
		if(date_start == null || date_start.length <= 0) {
			alert('请选择起始日期') ;
			return;
		}

		var travel_introduction = UE.getEditor('travel_introduction').getContent();//$("#recommend_reason").val() ;
		if(travel_introduction ==null || travel_introduction.length <= 0 ) {
			alert('请输入您的旅程需求') ;
			return;
		}


		var contact_person = $("#contact_person").val() ;
		if(contact_person == null || contact_person.length <= 0) {
			alert('请输入联系人') ;
			return;
		}
		var contact_phone = $("#contact_phone").val() ;
		if(contact_phone == null || contact_phone.length <= 0) {
			alert('请输入联系电话') ;
			return;
		}

		$.post("http://yakejiao.com/product/commit",
			{
				type:4,
				person_num: person_num,
				person_price:person_price,
				country:country,
				city:city,
				contact_person:contact_person,
				contact_phone:contact_phone,
				date_start:date_start,
				travel_introduction:travel_introduction
			},
			function(data) {
				alert("data:" + data) ;
				if(data != null && data.result.err == 0 ) {
					alert('需求提交成功') ;
				}
			}) ;
	}

</script>
