<!DOCTYPE html>
<head>
<title>一日游产品提交</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
<link rel="stylesheet" type="text/css" href="../../css/welcome.css"></link>
<link rel="stylesheet" type="text/css" href="../css/page_header.css"></link>
<script src="../../third_party/ckeditor/ckeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="../../third_party/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="../../third_party/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="../../third_party/ueditor/lang/zh-cn/zh-cn.js"></script>
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
</head>
<body> 
<div class="page_header">
<a class="www">好游世界旅行网<sub class="www_sub">  --提供有品质的旅行服务</sub></a>
<a class="header">中文/英文</a>
<a class="header register">注册</a>
<a class="header login">|</a>
<a class="header login">登录</a>
</div>


<div class="commit">
<div class="div_face"><img src="http://img.yakejiao.com/1.jpg" class="face_img"></img></div>
<div class="imgs">
<ul id="img_list">
<!--<li class="img_item"><img src="http://img.yakejiao.com/1.jpg" class="img_bg"></img></li>
<li class="img_item"><img src="http://img.yakejiao.com/1.jpg" class="img_bg"></img></li>
<li class="img_item"><img src="http://img.yakejiao.com/1.jpg" class="img_bg"></img></li>
<li class="img_item"><img src="http://img.yakejiao.com/1.jpg" class="img_bg"></img></li>
<li class="img_item"><input type="file" name="select" value="选择上传图片"></input><li>-->
<?php echo $error;?>

<?php echo form_open_multipart('provider/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>
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
<span class="provider_lable">联系人</span><?php  echo $contact_name; ?>
<span class="provider_lable provider_lable2">手机号</span><?php echo $contact_name; ?>
</p>
<p class="proider_item">
<span class="provider_lable">QQ</span><?php echo $contact_name; ?>
<span class="provider_lable provider_lable2">座机</span><?php echo $contact_name;?>
</p>
<p class="proider_item">
<span class="provider_lable">备注</span>
<?php echo $ueditor_content?>
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

</body>
</html>
