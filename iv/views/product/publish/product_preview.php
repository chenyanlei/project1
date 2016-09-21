<style type="text/css">

.div_face{
width: 780px;
margin: 0 auto;
	text-align: center;
	margin-top: 50px;
}
.face_img {
width: 500px;
height: 300px;
}

.imgs {
width: 780px;
margin: 0 auto;
	text-align: center;
	margin-top: 5px;
	margin-bottom: 15px;
}

.img_item{
display: block;
float: left;
}

.img_bg {
margin: 5px;
width:250px;
height:150px;
background: no-repeat;
}

.edit_area{
clear: both;
width: 780px;
margin: 0 auto;
	margin-top: 20px;
}

.edit_item {
	text-align: left;
	margin-top: 10px;
}

input {
width: 400px;
height: 30px;
}

.lable1 {
display: inline-block;
display:-moz-inline-box;
width: 100px;
}

.provider_info {
	margin-top: 20px;
padding: 5px;
	 margin-bottom: 30px;
background: gray;
}

.provider_info input {
width: 200px;
}

.proider_item {
margin: 20px;
	padding-left: 20px;
}

.provider_lable {
width: 60px;
display: inline-block;
display: -moz-inline-box;
	 text-align: top;
}

.provider_lable2 {
	margin-left: 100px;
}

.commit_area {
width: 780px;
       margin-bottom: 250px;
}

.commit_area input {
width: 200px ;
height: 44px;
background: blue;
	    text-align: center;
	    line-height: 44px;
display: block;
float: left;
}

.btn_preview {
	text-align: left;	
}

.btn_commit {
	margin-left: 380px;
}
</style>

<div class="commit">
<div class="div_face">
	<img src="http://img.yakejiao.com/1.jpg" class="face_img"/>
</div>
<div class="imgs">
<ul id="img_list">
</ul>
</div>

<div class="edit_area">
<p class="edit_item"><span class="lable1">标题</span><?php echo $title; ?></p>
<p class="edit_item"><span class="lable1">语言服务</span><?php echo $language; ?></p>
<p class="edit_item"><span class="lable1">国家</span><?php echo $country; ?></p>
<p class="edit_item"><span class="lable1">城市</span><?php echo $city; ?></p>
<p class="edit_item"><span class="lable1">产品特色</span><?php if(isset($featrue)) { echo $featrue;}  ?></p>
<p class="edit_item"><span class="lable1">推荐理由</span><?php if(isset($recommend_reason))echo $recommend_reason;?></p>
<p class="edit_item"><span class="lable1">优惠活动</span><?php if(isset($preferential)) { echo $preferential;} ?></p>
<p class="edit_item"><span class="lable1">行程介绍</span><?php if(isset($travel_brief))echo $travel_brief; ?></p>
<p class="edit_item"><span class="lable1">费用说明</span><?php if(isset($fee_brief))echo $fee_brief; ?></p>

<div class="provider_info">
	<p class="proider_item">
		<span class="provider_lable">联系人</span><?php if(isset($contact_name)) echo $contact_name; ?>
		<span class="provider_lable provider_lable2">手机号</span><?php if(isset($contact_name)) echo $contact_name; ?>
	</p>
	<p class="proider_item">
		<span class="provider_lable">QQ</span><?php if(isset($contact_name)) echo $contact_name; ?>
		<span class="provider_lable provider_lable2">座机</span><?php if(isset($contact_name)) echo $contact_name;?>
	</p>
	<p class="proider_item">
		<span class="provider_lable">备注</span>
		<?php if(isset($contact_name)) echo $ueditor_content?>
	</p>
</div>
</div>
</div>

<script type="text/javascript">

function preview() {
	document.oneday.action="http://yakejiao.com/provider/preview";
	document.oneday.submit() ;
}

function commit() {
	document.oneday.action="http://yakejiao.com/provider/commit";
	document.oneday.submit() ;
}
</script>
