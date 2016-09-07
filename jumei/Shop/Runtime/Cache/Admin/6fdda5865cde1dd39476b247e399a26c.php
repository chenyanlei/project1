<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>聚美优品后台</title>

    <!-- Bootstrap Core CSS -->
    <link href="/jumei/Public/Admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/jumei/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/jumei/Public/Admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/jumei/Public/Admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/jumei/Public/Admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/jumei/Public/Admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background: rgba(0, 0, 0, 0) url('/jumei/Public/Admin/imgs/footer_dy.jpg') no-repeat scroll center top;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">聚美优品后台管理</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('Admin/Login/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-bottom: 0;background: rgba(0, 0, 0, 0) url('/jumei/Public/Admin/imgs/background.jpg') no-repeat scroll center top;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                       
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 用户管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/User/index');?>">会员列表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Admin/index');?>">管理员列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 分类管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Cate/add');?>">分类添加</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Cate/index');?>">分类列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 商品管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Goods/add');?>">商品添加</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Goods/index');?>">商品列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>品牌管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Brand/add');?>">品牌添加</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Brand/index');?>">品牌列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>品牌活动<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Activity/add');?>">添加品牌店铺</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Activity/index');?>">品牌店铺列表</a>
                                </li> 
                                <li>
                                    <a href="<?php echo U('Admin/Activity/invalid');?>">过期店铺列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>用户收货管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Address/add');?>">用户地址添加</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Address/index');?>">用户地址列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>订单管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Order/order');?>">订单列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> 口碑管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Comment/add');?>">口碑添加</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Comment/index');?>">口碑列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>回复管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Reply/index');?>">回复列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>精品管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Bestcomment/add');?>">精品添报告添加</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Bestcomment/index');?>">精品报告列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>会员等级<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Grade/index');?>">等级列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>友情链接管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Link/add');?>">友情链接添加</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Link/index');?>">友情链接列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>网站配置<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Web/index');?>">配置列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>加入聚美<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Join/index');?>">职位列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>权限管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li>
                                    <a href="<?php echo U('Admin/Group/index');?>">用户组管理</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Rules/index');?>">规则管理</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="background: rgba(0, 0, 0, 0) url('/jumei/Public/Admin/imgs/background.jpg') no-repeat scroll center top;">
            <!-- 内容区 -->
            
<script type="text/javascript" src="/jumei/Public/Admin/js/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" href="/jumei/Public/Admin/pickadate/pickadate.js-3.5.6/lib/themes/default.css">
<link rel="stylesheet" href="/jumei/Public/Admin/pickadate/pickadate.js-3.5.6/lib/themes/default.date.css">
<link rel="stylesheet" href="/jumei/Public/Admin/pickadate/pickadate.js-3.5.6/lib/themes/default.time.css">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">品牌添加</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>  
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                    <div style="width:430px;height:auto;float:right;margin-top:30px">
                    <img src="/jumei/Public/Images/2015-09-27_200521.jpg" width="90%">
                    </div>
                        <div class="col-lg-6">

                            <form role="form" action="<?php echo U('Admin/Activity/insert');?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>品牌类别</label>
                                	<!-- <input type="hidden" name="con" value="<?php echo ($con); ?>"> -->
                                    <select id="gname" class="form-control" name="bid">
											<option value="请选择">请选择</option>
									<?php if(is_array($res)): foreach($res as $key=>$vo): ?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['bname']); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>选择品牌</label>
                                    <input type="hidden" name="pid" value="0">
                                    <select id="pname" class="form-control" name="pname">
											<option id="rem" value="请选择">请选择</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>优惠条件</label><br>
                                    满:<input style="width:100px;" name="full" type="text" class="form-control" placeholder="优惠条件" maxlength="10">
                                    立减:<input style="width:100px;" name="subtract" type="text" class="form-control" placeholder="优惠价格" maxlength="10">
                                </div>
								<div class="form-group">
                                    <label>活动时间</label><br>
                                    开始日期:<input
							                    id="input_01"
							                    class="datepicker"
							                    name="sdate"
							                    type="text"
							                    autofocuss
							                    value="14 9, 2015"
							                    data-valuee="2015-08-08">
							        结束日期:<input
							                    id="input"
							                    class="datepicker"
							                    name="edate"
							                    type="text"
							                    autofocuss
							                    value="14 9, 2015"
							                    data-valuee="2015-08-08">

	

												<div id="container"></div>
												
							                    <script src="/jumei/Public/Admin/pickadate/pickadate.js-3.5.6/tests/jquery.1.7.0.js"></script>
											    <script src="/jumei/Public/Admin/pickadate/pickadate.js-3.5.6/lib/picker.js"></script>
											    <script src="/jumei/Public/Admin/pickadate/pickadate.js-3.5.6/lib/picker.date.js"></script>
											    <script src="/jumei/Public/Admin/pickadate/pickadate.js-3.5.6/lib/legacy.js"></script>
							                   	<script type="text/javascript">

											        var $input = $( '.datepicker' ).pickadate({
											            formatSubmit: 'yyyymmdd',
											            // min: [2015, 7, 14],
											            container: '#container',
											            // editable: true,
											            closeOnSelect: false,
											            closeOnClear: false,
											        })

											        var picker = $input.pickadate('picker')
											        // picker.set('select', '14 October, 2014')
											        // picker.open()

											        // $('button').on('click', function() {
											        //     picker.set('disable', true);
											        // });

											    </script>
								<fieldset>
					                开始时间:<input
					                    id="input_from"
					                    class="datepicker"
					                    type="time"
					                    name="stime"
					                    autofocuss>
						           	结束时间:<input
					                    id="input_efrom"
					                    class="datepicker"
					                    type="time"
					                    name="etime"
					                    autofocuss>
					                    <!-- valuee="2:30 AM"
					                    data-value="0:00" -->
					            </fieldset>
					           
					            <script src="/jumei/Public/Admin/pickadate/pickadate.js-3.5.6/tests/jquery.1.9.1.js"></script>
							    <script src="/jumei/Public/Admin/pickadate/pickadate.js-3.5.6/lib/picker.js"></script>
							    <script src="/jumei/Public/Admin/pickadate/pickadate.js-3.5.6/lib/picker.time.js"></script>

							    <script type="text/javascript">

							        var $input = $( '.datepicker' ).pickatime({
							        })
							        var picker = $input.pickatime('picker')
							        picker.open()

							    </script>
	
                                </div>
                                <div class="form-group">
                                    <label>品牌BANNER</label>
                                   <span style="color:red;">（品牌LOGO尺寸为535*250像素）</span> <input type="file" name="img" >
                                    
                                </div>

                                <div class="form-group">
                                    <label>品牌显示</label><br>
                                    <input type="hidden" name="expired" value="1">
                                    <label class="radio-inline">
                                        <input type="radio" name="power" id="optionsRadiosInline1" value="1">显示
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="power" id="optionsRadiosInline2" value="0" checked="">关闭
                                    </label>
                                </div>

                                <button class="btn btn-outline btn-primary">添加</button>
                                <button class="btn btn-outline btn-danger">重置</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                       
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <script type="text/javascript">

    $(function(){

    	$('#gname').change(function(){

    		//获取id为gname的value值
    		var val = $('#gname').val();
    		//移除二级下拉菜单的选项
    		$('#rem').siblings().remove();
	    	//加载顶级分类
	    	//发送ajax
	    	$.ajax({
	    		url:"<?php echo U('Admin/Activity/ajax');?>", //请求地址
	    		type:"get", //发送方式
	    		data:{type:val}, //请求数据
	    		async:true, //同步更新
	    		dataType:"json", //影响数据格式
	    		success:function(data){ //成功回调函数

	    			// console.log(typeof(data)); 

	    			for(var i in data){
	    				data[i]['id'];
	    				var info = '<option value="'+data[i]['id']+'">'+data[i]['bname']+'</option>';
	    				$('#pname').append(info);
	    			}

	    		}
	    	})

    	})
    })

    $(function(){
    	$('#pname').change(function(){
    		var pid = $(this).val();
    		$('input[name=pid]').val(pid);

    	})
    })
    	



    </script>



    
    

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

   <!--/data-->
    
    <!-- jQuery -->
    <script src="/jumei/Public/admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/jumei/Public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/jumei/Public/admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/jumei/Public/admin/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/jumei/Public/admin/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/jumei/Public/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    

    

</body>

</html>