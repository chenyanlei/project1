<style>
	/*.item label{
		margin-right:10px;
	}*/
	.margin-left-40px{
        background-color: #fff;
    }
    .customer_detail-main{
        width: 1075px;
        padding:30px 30px 200px 30px;
        background-color: #fff;
        margin:0 auto;
    }
    .customer_detail-title{
        height: 40px;
        line-height: 40px;
        background-color: #b1f2fe;
        color: #fff;
        font-size: 16px;
        padding-left:20px;
        margin-bottom: 20px; 
    }
    .detail-name{
        display: inline-block;
        width: 120px;
        height: 25px;
        line-height: 25px;
        color: #585858;
        font-size: 16px;
        text-align: right;
    }
    .detail-val{
        width: 200px;
        margin-left: 20px;
        color: #585858;
        height: 25px;
        line-height: 25px;
        font-size: 16px;
    }
    .item{
        margin: 10px 0;
    }
</style>

    <div class="customer_detail-main">
            <div class="customer_detail-title">客户详情</div>
            <div style="padding-left:20px;">
                <div class="item">
                    <span class="detail-name">姓名：</span><span class="detail-val"><?php echo $name;?></span>
                </div>

                <div class="item">
                    <span class="detail-name">性别：</span><span class="detail-val"> <?=$sex==1?'男':'女';?></span>
                </div>
                <div class="item">
                    <span class="detail-name">邮件：</span><span class="detail-val"><?php echo $email;?></span>
                </div>

                <div class="item">
                    <span class="detail-name">身份证：</span><span class="detail-val"><?php echo $id_card;?></span>
                </div>

                <div class="item">
                    <span class="detail-name">护照：</span><span class="detail-val"><?php echo $passport;?></span>
                </div>

                <div class="item">
                    <span class="detail-name">是否是联系人：</span><span class="detail-val"><?=$is_contact==1?'是':'否';?></span>
                </div>
            </div>
            <div style="border-bottom:1px solid #ccc"></div>
            <div style="margin: 30px 0px;padding-left:20px;"><a href="javascript:history.go(-1);">返回上一页</a></div>
    </div>