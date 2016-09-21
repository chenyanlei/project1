<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <title>订单</title>
    <link rel="stylesheet" type="text/css" href="/Public/css/aui.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/aui-flex.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/iconfont.css" />
	<script src="/Public/js/jquery-1.11.3.js"></script>
	<script src="/Public/js/layer.js"></script>
        <script src="/Public/js/lib/require.js"></script> 
          <script>
            var i =1;
            var url=window.location.pathname;
			if(url === '/webapp_order/my_order_list'){
				var p_url = '/webapp_order/get_myorder_list';
			}else if(url === '/webapp_order/order_list'){
				var p_url = '/webapp_order/get_order_list';
			}
			console.log(p_url);
            require(['/Public/js/common.js'], function (common) { 
                
              require(['/Public/js/app/main2.js']);
            });
        </script>
       

         <style type="text/css" media="all">
		body,ul,li {
			padding:0;
			margin:0;
			border:0;
		}

		.ddd{
			position:fixed;
			height:45px;
			width:100%;
			z-index:100;
			line-height:40px;
			font-size:14px;
			vertical-align:middle;
			background-color:red;
		}
		</style>
		<style type="text/css">
		body{
			background:#f1f1f1;
			font-family: 'Microsoft Yahei';
		}
		.order {
			background: #ffffff;
		}
		.order-info  {
			font-size: 0.875em;
			width: 100%;
		}
		.order-info span {
			color: #777;
			margin-right: 5px;
		}
		.order-info time {
			color: #999999;
			font-size: 0.75em;
		}
		.order-info i.aui-iconfont {
			color: #999;
			font-size: 0.875em;
		}
		.order-icon img {
			width: 80%;
			border-radius: 5px;
		}
		.order-title {
			font-size: 1em;
			color: #333;
			padding-bottom: 10px;
			margin-bottom: 10px;
		}
		.order-title > i.aui-iconfont {
			font-size: 0.87em;
			color: #999999;
		}
		p.goods-list {
			font-size: 0.75em;
			color: #999;
			margin-bottom: 8px;
		}
		p.count-info {
			font-size: 0.75em;
			color: #999;
			padding-bottom: 5px;
		}
		p.count-info span {
			margin: 0 3px;
		}
		p.count-info strong {
			color: #666;
			font-size: 1em;
			font-weight: 700;
		}
		.btn {
			/*margin: 5px;*/
		}
		.btn .aui-btn {
			font-size: 0.75em;
		}
		.btn .aui-btn:first-child {
			margin-right: 10px;
		}
		.aui-border-b:after {
			border-color: #ddd;
		}
		#thelist .aui-btn-danger:active {
			background: #c0392b;
			color: #ffffff;
		}
		#thelist .aui-btn-info:active {
			background: #2980b9;
			color: #ffffff;
		}
		.aui-btn-warning:active {
			background: #faa732;
			color: #ffffff;
		}
		.aui-content {
			margin-bottom:15px
		}
		.aui-content section:last-of-type{
			margin-bottom:0px
		}
		.scroller ul {
			background: #fff none repeat scroll 0 0;
			list-style: outside none none;
			margin: 0;
			padding: 0;
			text-align: left;
			width: 100%;
		}
		.aui-icon-delete:before {
			content: "\e61e";
			color:#585858
		}
		.pay{
			margin-left:10px;
			color:#00d8ff;
			border-color:#00d8ff
		}
		.delete,.cancel{
			color:#585858;
			border-color:#585858;
		}
	.aui-btn {
	    border-radius: 0px;
	}
	</style>
    </head>
    <body>
	<?php
	if(isset($data)) {

	?>
  <div id="wrapper">
	<div class="scroller">
		<div id="scroller-pullDown" style="display:none">
			<span class="pullDownLabel">Pull down to refresh...</span>
		</div>
		<div id="thelist">
		 <?php

			 foreach ($data as $v) {
				 ?>

					 <section class="aui-content order" data="<?= $v['order_id']; ?>">
						 <div class="aui-flex-col order-info aui-padded-10">
							 <div class="aui-flex-item-12">
								 <span>下单时间</span>
								 <time><?= $v['create_time']; ?></time>
<!--								 <i class="aui-iconfont aui-icon-delete aui-pull-right"></i>-->
							 </div>
						 </div>
						 <a href="/webapp_order/get_order_detail?order_id=<?= $v['order_id']; ?>">
							 <div class="aui-flex-col">

								 <div class="aui-flex-item-12 aui-padded-0-15">
									 <p class="order-title aui-border-b"><?= $v['title']; ?>
									 </p>
									 <p class="goods-list">
										 订单号：<?= $v['order_id']; ?>
									 </p>
									 <p class="goods-list">
										 出发日期：<?= date('Y-m-d', $v['travel_date']); ?>
									 </p>

									 <p class="aui-text-right aui-border-b count-info">
										 总金额：<strong>￥<?= $v['total_fee']; ?></strong>
									 </p>
								 </div>
							 </div>
						 </a>
						 <div class="aui-flex-col aui-padded-15 btn">
							 <div class="aui-flex-item-12 aui-text-right">
								 <!--<div class="aui-btn aui-btn-outlined aui-btn-danger">修改订单11</div>-->
								 <?php

								 if ($v['status'] == Ptype::ORDER_STATUS_WILL_PAY) { ?>
									 <div class="aui-btn aui-btn-outlined delete">删除订单</div>
									 <div class="aui-btn aui-btn-outlined  cancel">取消订单</div><div class="aui-btn aui-btn-outlined  pay">去付款</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_PAYED) { ?>
									 <div class="aui-btn aui-btn-outlined aui-btn-danger refund">申请退款</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_CANCELED) { ?>
									 <div class="aui-text-right">订单已取消</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_CANCELING) { ?>
									 <div class="aui-text-right">取消中</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_AGREE) { ?>
									 <div class="aui-text-right">已同意</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_REJECT) { ?>
									 <div class="aui-text-right">已拒绝</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_REFUND_CHECHING) { ?>
									 <div class="aui-text-right">退款审核中</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_REFUNDING) { ?>
									 <div class="aui-text-right">退款中</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_REFUNDED) { ?>
									 <div class="aui-text-right">退款完成</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_REFUND_FAILED) { ?>
									 <div class="aui-text-right">退款失败</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_CLOSED) { ?>
									 <div class="aui-text-right">已关闭</div>
								 <?php } else if ($v['status'] == Ptype::ORDER_STATUS_END) { ?>
									 <div class="aui-text-right">已完成</div>
								 <?php } ?>
							 </div>
						 </div>
					 </section>
			 <?php }

		 ?>
		</div>
		<div id="scroller-pullUp">
			<span class="pullUpLabel"></span>
		</div>
	</div>
</div>
	<?php
	}else{
		echo "<p style='text-align:center;color:#585858;font-size:18px;margin-top:100px'>您还暂无订单!</p>";
	}
	?>
	<script>
	$(function () {
		var refrese = window.location.pathname;
		Date.prototype.Format = function (fmt) {
	    var o = {
	        "M+": this.getMonth() + 1, //月份 
	        "d+": this.getDate(), //日 
	        "h+": this.getHours(), //小时 
	        "m+": this.getMinutes(), //分 
	        "s+": this.getSeconds(), //秒 
	        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
	        "S": this.getMilliseconds() //毫秒 
	    };
	    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
	    for (var k in o)
	    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
	    return fmt;
	}
	 var cancel_reason = '';
    $('body').delegate('.js_cancel_order_pop_select','change',function(){
        cancel_reason = $(this).val();
    })
    var refund_reason = '';
    $('body').delegate('.js_cancel_order_pop_select','change',function(){
        refund_reason = $(this).val();
    })
    function check_reason(){
        var e = $('.js_cancel_order_pop_select');
       if(e.val()=="请选择取消原因"){
            alert('请选择取消原因');
            return false;
        }else{
            return true;
        }
    }
    function check_reason_refund(){
        var e = $('.js_cancel_order');
    	if(e.val()=="请选择退款原因"){
            alert('请选择退款原因');
            return false;
        }else{
            return true;
        }
    	
    }
    var index1 = '';
  var mydate = new Date();
    $('body').delegate('.cancel','click',function(){
    	  var order_id =$(this).parents('section').attr('data');
        var msg = '<table id="J_crosswise_pay" class="crosswise_tb" style="display: table;"> <tbody><tr> <td style="width:10%;"><span id="js_cancel_order_pop_tip">取消原因</span><strong class="required">*</strong></td></tr><tr> <td> <select style="width:100%;" class="js_cancel_order_pop_select" name="reason"> <option value="请选择取消原因">请选择取消原因</option><option value="行程不确定">行程不确定</option> <option value="无法按时付款">无法按时付款</option> <option value="价格原因">价格原因</option> <option value="重复预订">重复预订</option> <option value="材料无法按时提供">材料无法按时提供</option> <option value="担心不成团">担心不成团</option> <option value="突发事件">突发事件</option> <option value="其他原因">其他原因</option> </select> </td> </tr> </tbody> </table>';
        var msg1 = '<div style="display: block;" class="order_masking_content"><strong id="J_cancelmsg">确认申请取消订单<span class="js_pop_orderId">'+order_id+'</span>吗？一经取消订单将无法恢复，请再次确认，谢谢！</strong></div>';
         layer.open({
                     title:'取消订单',
                     content: msg,
                     area: ['80%', '200px'],
                     yes: function(index, layero){
                        if(check_reason()){
                            layer.open({ 
                                title:'取消订单',
                                content: msg1,
                                area: ['80%', '185px'],
                                btn: ['确定', '取消']
                                ,yes:function(index){
                                    index1 = layer.load(1,{offset:['50%','45%'],shade: [0.4, '#393D49']});
                                    $.ajax({
                                        url:'/order/cancel_order',
                                        data:{order_id:order_id,reason:cancel_reason},
                                        type:'post',
                                        success:function(data){
                                            if(data.result.err==0){
                                               layer.close(index);
                                               layer.close(index1);
                                               document.location.href=refrese+"?a="+mydate;
                                               return true;
                                            }else{
                                                var msg = data.result.err+':'+data.result.msg;
                                                  layer.open({ 
                                                        title:'取消订单',
                                                        content: msg,
                                                        area: ['80%', '145px']
                                                   })
                                                   layer.close(index1);     
                                                return false;
                                            }
                                        }
                                },'json')
                                    
                                }
                            })
                            return true;
                        }

                        return false;
                       
                    }
            });
    })
     var index2 = '';
   $('body').delegate('.refund','click',function(){
   	var order_id =$(this).parents('section').attr('data');
        var msg1 = '<table id="J_crosswise_pay" class="crosswise_tb" style="display: table;"> <tbody><tr> <td style="width:10%;"><span id="js_cancel_order_pop_tip">退款原因</span><strong class="required">*</strong></td></tr><tr> <td> <select style="width:100%;" class="js_cancel_order" name="reason"> <option value="请选择退款原因">请选择退款原因</option><option value="行程不确定">行程不确定</option> <option value="无法按时付款">无法按时付款</option> <option value="价格原因">价格原因</option> <option value="重复预订">重复预订</option> <option value="材料无法按时提供">材料无法按时提供</option> <option value="担心不成团">担心不成团</option> <option value="突发事件">突发事件</option> <option value="其他原因">其他原因</option> </select> </td> </tr></tbody> </table>';
        var refund_inst = '<div class="instruct"><div class="refund_inst">退款说明:</div><div>1. 游客申请退款;</div><div>2. 逍品旅游与供应商核算损失;</div><div>3. 客服人员提交退款申请;</div><div>4. 财务人员审核通过;</div><div>5. 出纳退款;</div><div>6. 退款进入银行处理程序</div><div>特别说明:所有退款均为"原路退回"方式.</div><div>到账时间说明</div><div>处理退款的时间为3个工作日左右,银行处理时间视客人不同支付方式不同,具体如下:</div><div>1.支付宝余额支付,及时到账;</div><div>2.网上银行支付,5-10个工作日到账;</div><div>3.信用卡支付,10-25个工作日到账;</div><div>4.借记卡汇款,3-5个工作日.</div><div>如果退款过时不到账,请致电逍品旅游客服询问是否已进行退款处理,或致电银行客户询问账目情况.</div></div>';

        var msg = msg1 + refund_inst;
        var msg2 = '<div style="display: block;" class="order_masking_content"><strong id="J_cancelmsg">确认申请退款订单号为:<span class="js_pop_orderId">'+order_id+'</span>的订单吗？退款对您将产生一定损失，具体损失视产品而定,请再次确认，谢谢！</strong></div>';
        layer.open({
                     title:'退款申请',
                     content: msg,
                     area: '80%',
                     btn:'退款',
                     yes: function(index, layero){
                        if(check_reason_refund()){
                            layer.open({ 
                                title:'退款申请',
                                content: msg2,
                                area: ['80%', '200px'],
                                btn: ['确定', '取消']
                                ,yes:function(index){
                                    index2 = layer.load(1,{offset:['200px','650px'],shade: [0.4, '#393D49']});
                                    $.ajax({
                                        url:'/webapp_order/refund_order',
                                        data:{order_id:order_id,reason:refund_reason},
                                        type:'post',
                                        success:function(data){
                                            if(data.result.err==0){
                                               layer.close(index);
                                               layer.close(index2);
                                               document.location.href=refrese+"?a="+mydate;
                                               return true;
                                            }else{
                                                var msg = data.result.err+':'+data.result.msg;
                                                  layer.open({ 
                                                        title:'取消订单',
                                                        content: msg,
                                                        area: ['645px', '145px']
                                                   })     
                                                return false;
                                            }
                                        }
                                },'json')
                                    
                                }
                            })
                            return true;
                        }

                     }
        })             
   })

   $('body').delegate('.delete','click',function(){
   		var sect = $(this);
   		var order_id = $(this).parents('section').attr('data');
   		var msg1 = '删除之后订单不可恢复，您确定要删除吗？';
   		layer.open({ 
                title:'确定删除订单',
                content: msg1,
                area: ['80%', '185px'],
                btn: ['确定', '取消']
                ,yes:function(index){
                	$.ajax({
                        url:'/webapp_order/delete',
                        data:{order_id:order_id},
                        type:'post',
                        success:function(data){
                        	if(data.result.err==0){
                				
                                document.location.href=refrese+"?a="+mydate;
                                // sect.parents('section').remove();
                                layer.close(index);
                			}else{
                                var msg = data.result.err+':'+data.result.msg;
                                  layer.open({ 
                                        title:'确定删除订单',
                                        content: msg,
                                        area: ['80%', '150px']
                                   })     
                                return false;
                            }
                		}
                	})		

                }
        })        
   })

   $('body').delegate('.pay','click',function(){
   		var order_id = $(this).parents('section').attr('data');
   		location.href = '/webapp_order/order_pay?order_id='+order_id;
   })
		$('#scroller-pullUp').css('display','none');
})		
	</script>	
    </body>
</html>
