<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>由html5实现的文件上传预览功能</title>
<!-- 引用控制层插件样式 -->
<link rel="stylesheet" href="/Public/filepic/css/zyUpload.css" type="text/css">

<script src="/Public/filepic/js/jquery.min.js"></script>

<!-- 引用核心层插件 -->
<script src="/Public/filepic/js/zyFile.js"></script>

<!-- 引用控制层插件 -->
<script src="/Public/filepic/js/zyUpload.js"></script>



</head>
<body>



<div id="demo" class="demo"></div>
<script type="text/javascript">
	$(function(){
	$("#demo").zyUpload({
		width            :   "650px",                 // 宽度
		height           :   "400px",                 // 宽度
		itemWidth        :   "120px",                 // 文件项的宽度
		itemHeight       :   "100px",                 // 文件项的高度
		url              :   "<?php echo U('Home/Tpic/uppic');?>",  // 上传文件的路径
		dragDrop         :   true,                    // 是否可以拖动上传文件
		del              :   true,                    // 是否可以删除文件
		finishDel        :   false,  				  // 是否在上传文件完成后删除预览
		
	});
});



</script>
</body>
</html>