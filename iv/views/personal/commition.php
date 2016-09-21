<?php

$list = $data['list'] ;

?>
<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<style type="text/css">
	body{
		background-color:#f5f5f5
	}
	.td_style {
		word-wrap:break-word;
		text-align: center;
	}

	.td_width_60 {
		width:100px;
	}

	.td_width_100 {
		width:100px;
	}

	.margin_top {
		margin-top: 30px;
		padding-bottom:150px
	}

	ol>li {
		display: block;
		float: left;
		padding: 5px;
		padding-left: 10px;
		padding-right: 10px;
		list-style: none;
		margin-right: 20px;
		font-size: 14px;
	}

	ol>li:hover, ol .active{
		background: #0097d6;
		color: #ffffff;
		padding: 5px;
		padding-left: 10px;
		padding-right: 10px;
		border-radius: 2px;
		border-bottom-left-radius: 2px;
		border-bottom-right-radius: 2px;
		-moz-border-radius: 2px;
	}

	.item{
		width: 300px;
	}
	.item img {
		width: 300px;
		height: 200px;
		min-height:100%;
	}

	.li_div {
		position: relative;
		padding: 0px;
		/*background: rgba(0, 0, 0, 0.2);;*/
		float:left;
		margin-left:60px;
		margin-top:40px ;
		background: #f1f1f1;
	}
</style>
<div class="container margin_top">
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-striped">
			<thead style="background: #CCCCCC">

			<tr >
				<th class="td_style">
					<?php
						if($c_type === 1){
							echo "佣金";
						}else if($c_type === 2){
							echo "奖励金额";
						}
					?>
				</th>
				<th class="td_style">订单id</th>
				<th class="td_style">总金额</th>
				<th class="td_style">单价</th>
				<th class="td_style">个数</th>
				<th class="td_style">下单时间</th>
				<th class="td_style">订单状态</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach($list as $list_item) {  ?>
				<tr>
					<td class="td_style td_width_60"><?php echo $list_item['commition']; ?></td>
					<td class="td_style td_width_60"><?php echo $list_item['order_id']; ?></td>
					<td class="td_style td_width_60"><?php echo $list_item['total_fee']; ?></td>
					<td class="td_style td_width_60"><?php echo $list_item['unit_price']; ?></td>
					<td class="td_style td_width_60"><?php echo $list_item['num']; ?></td>
					<td class="td_style td_width_60"><?php echo $list_item['create_time']; ?></td>
					<td class="td_style td_width_60"><?php echo $list_item['status']; ?></td>
				<tr>
				<?php } ?>
			</tbody>
			</table>
			<div><?php
				if($c_type === 1){
					echo "佣金";
				}else if($c_type === 2){
					echo "奖励金额";
				}
				?>总金额：<?php echo $data['total_commition'];?>元</div>
			<div>订单总个数：<?php echo $data['total_num'];?>个</div>

			<ul class="center pagination pagination-sm" id="ul_pages"></ul>
		</div>

	</div>
</div>
<script type="text/javascript">
	
	$(function(){
		add_pages(<?php echo $data['total_num'];?>, <?php echo $data['pn'];?>) ;
	}) ;

	var m_page_record = <?php echo $data['rn'];?> ;

	/**
	 * 添加页码
	 * @param total
	 */
	function add_pages(total, current) {
        m_total_page = Math.ceil(total /m_page_record);
		var html = "<li" ;

		//首页
		if(current == 0) {
			html += " class=\"disabled\"" ;
		}

		html += "><a onclick=\"on_page_click(0)\">首页<li>";

		html += "<li" ;

		//上一页
		if(current == 0) {
			html += " class=\"disabled\"" ;
		}
		html += "><a onclick=\"pre_page()\">上一页</a></li>" ;

		//中间页
		if(m_total_page<10){
			for(var i=0;i<m_total_page;i++) {
				if(i == current ) {
					html += "<li class=\"active\">" ;
				} else {
					html += "<li>";
				}

				html += "<a onclick=\"on_page_click(" + (i+1) + ")\">" + (i+1) + "</a></li>" ;
			}
		}else{
			var now_half =  m_total_page-9;

			if(current < now_half){
				for(var i=0;i<4;i++) {
					if(current + i== current ) {
						html += "<li class=\"active\">" ;
					} else {
						html += "<li>";
					}

					html += "<a onclick=\"on_page_click(" + (current+i) + ")\">" + (current+i+1) + "</a></li>" ;
				}
				html += "<li><a onclick=\"on_page_click(" + (current+4) + ")\">" + "..." + "</a></li>";
				for(var i=4;i>0;i--) {
					if(m_total_page-i == current ) {
						html += "<li class=\"active\">" ;
					} else {
						html += "<li>";
					}

					html += "<a onclick=\"on_page_click(" + (m_total_page-i)+ ")\">" + (m_total_page-i+1) + "</a></li>" ;
				}
			}else{
				for(var i= 9;i>0;i--) {
					if(m_total_page-i == current ) {
						html += "<li class=\"active\">" ;
					} else {
						html += "<li>";
					}

					html += "<a onclick=\"on_page_click(" + (m_total_page-i)+ ")\">" + (m_total_page-i+1) + "</a></li>" ;
				}
			}

		}

		//下一页
		html += "<li" ;
		if(current == m_total_page - 1){
			html += " class=\"disabled\"";
		}
		html += "><a onclick=\"next_page("+current+")\">下一页</a></li>" ;

		//尾页
		html += "<li" ;
		if(current == m_total_page - 1){
			html += " class=\"disabled\"";
		}

		html += "><a onclick=\"on_page_click("+(m_total_page - 1)+")\">尾页</a></li>" ;

		console.log(html) ;
		$("#ul_pages").html(html) ;
	}

</script>