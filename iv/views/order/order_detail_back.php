<?php

//    $detail =
    $order_status = $detail['order_status'];
    $contact = $detail['contact'];

?>
<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.min.css"/>

<script src="/Public/js/layer.js"></script>
<style>

    .item {
        float: left;
        margin-left: 10px;   
    }
    .item2 {
        width: 500px;
        position: relative;
        float: left;
        margin-left: 10px;
        margin-top:20px
    }
    .item2 input{
        width:200px
    }
    .item1 {
        width:70px;
        float: left;
        margin-left: 10px;
        margin-top:20px;
        height:30px;
        line-height:30px
    }
    .margin-left-40px {
        margin-left: 40px;;
    }

    .clear {
        clear: both;
    }

    #div_order h2 {
        font-size: 18px;
        font-weight: bold;
        color: #585858;
        margin-left:10px
    }

    #div_order div {
        font-size: 14px;
     
    }

    .order_man{
        margin-top:50px
    }
    .cacel{
        border:solid #6f97d6 1px;
        padding:10px;
        color:#585858;
        width:150px;
        text-align:center
    }
    .cacel:hover{
         border:solid red 1px;
         cursor:pointer
    }
    .mode,.refund{
        background:#6f97d6;
        padding:10px;
        color:#ffffff;
        width:150px;
        text-align:center;
        margin-top:10px;
        border:solid transparent 1px;
    }

    .mode:hover,.refund:hover{
         border:solid red 1px;
         cursor:pointer
    }
    .layui-layer-title{background:#6fc3f8; color:#fff; border: none;}
    .layui-layer-btn{
        background:#ffffff;
    }
    .layui-layer-btn a{
        color: #fff;
        cursor: pointer;
        font-size: 14px;
        font-weight: 700;
        height: 40px;
        line-height: 40px;
        margin: 0 8px;
        padding: 0 20px;
        text-decoration: none;
        width:100px;
        background:#0097d6
    }
    .contact h2{
        float:left;
        display:block
    }
    .contact span{
        float:right;
        color:#0097d6;
        cursor:pointer;
        width:100px;
        margin-top:15px
    }
    .man{
        width:320px;
        margin:40px 10px;
    } 
    .contact_mod{
        display:none
    }
     .order_error {
        background-color: rgba(51, 153, 204, 0.8);
        border: medium none green;
        border-radius: 3px;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
        color: #fff;
        font-size: 12px;
        height: 25px;
        line-height: 0;
        margin-left: 25px;
        padding: 2px 0;
        position: absolute;
        top: 0;
    }
    .order_error .triangle {
        border-bottom: 2px solid transparent;
        border-right: 20px solid rgba(51, 153, 204, 0.8);
        border-top: 10px solid transparent;
        height: 0;
        margin-left: -20px;
        margin-right: 5px;
        width: 0;
    }
    .order_error span{
        color:#ffffff
    }
    .fleft{
        float:left;
        width:100px;
    }

    .modify{
        float:right;
        width:100px;
        margin-top:20px;
    
        cursor:pointer
    }
    .customer_info .modify{
        color:#0097d6;
    }
    .customer_mod{
        display:none
    }
    .bd{
        background:#f1f1f1;
        width:100%;
        min-height:908px;
        position:relative
    }
    .date_sel{
        background:#ffffff
    }
    #verify{
        width:420px;
        margin:0 auto;
    }
    .v_title{
        margin-top:5px;
        text-align:center;
        font-size:16px;
        color:#585858
    }

    .v_to{
        margin-top:30px;
        color:#585858
    }
    .v_con{
        margin-top:20px;
        color:#585858;
        display: inline-block;
        vertical-align: middle;
        position: relative;
    }
    .js_cancel_order_pop_select{
        display: inline-block;
        vertical-align: middle;
        position: relative;
    }
    .v_con input{
        width:200px;
        border:solid #cccccc 1px;
        margin:10px 0px;
        height:30px;
        padding:10px;
    }
    .v_con button{
        color:#ffffff;
        border-radius:4px;
        background:#7fcbea;
        height:30px;
        width:100px;
        border:none
    }

    .valid,.invalid{
        display: none;
        line-height: 1.5;
        position: absolute;
    }
    .invalid {
        color: #999;
        left: 86px;
        top:100%;
        white-space: nowrap;
        word-break: keep-all;
    }
    .js_cancel_order_pop_select~.invalid{
        left: 100px;
        top:24%;
    }
    .js_cancel_order~.invalid{
        left: 100px;
        top:49px;
    }
    .valid {
        background-position: 0 -125px;
        line-height: 1.5;
        position: absolute;
        left: 93%;
        margin-top: -0.75em;
        top: 45%;
     }
    .invalid i{
        background-position: 0 5px;
        left: -20px;
        position: absolute;
        top: 34%;
    }
    .invalid i {
        background-image: url("/Public/images/wrong1.png");
        background-repeat: no-repeat;
    }
   //  .valid{
   //     background-image: url("/Public/images/sign.png?2");
   //     background-repeat: no-repeat;
   // }
   .valid,.invalid i {
        height: 20px;
        margin-top: -10px;
        width: 20px;
   }
   #J_cancelmsg{
        margin-top:10px;
        text-align:center
    }
    .layui-layer-btn .layui-layer-btn1 {
      background-color: #e5e5e5;
        color: #ffffff;
    }
    .instruct{
        padding:10px 0px;
        color:#999999;
        font-size:12px;
        text-indent:2em;
    }
    .refund_inst{
        background:url("/Public/images/attention1.png") no-repeat 0px 4px;
        font-size:14px;
        color:#585858
    }
    #contact,.bt_customer{
        width:80px;
        height:40px;
        background:#0097d6;
        color:#ffffff;
        border:none;
        margin-right:30px;
    }
    #cacel_c,.cacel_customer{
        width:80px;
        height:40px;
        background:#e5e5e5;
        color:#585858;
        border:none
    }
    .required{
        width:150px;
        height:30px;
        padding:0px 10px;
        border-color:#cccccc solid 1px;
    }
   

</style> 

    

<div class="bd">
<div class="col-sm-8 col-sm-offset-2 date_sel" id="div_order">
    <div><h2>订单佣金:1500</h2></div>
    <div><hr/></div>
    <div><h2>订单状态</h2></div>
    <div>
        <?php //foreach($order_status as $status_item)
        {
            $status_item = $detail['order_cur_status'] ;//$order_status[sizeof($order_status) - 1] ;

            ?>

            <div>
                <div class="item">状态:</div>
                <div class="item"><?php
                    $CI = &get_instance() ;
                    $CI->load->library('commen') ;
                    $status_txt = $CI->commen->get_order_status_txt($status_item['status']) ;
                    echo $status_txt;?>
                </div>
                <div class="item"><?php
                    if($status_item['status'] == '0'){
                        echo '<a href="/order/order_pay?order_id='.$detail['order_id'].'">立即支付</a>' ;
                    }  else {
//                        echo $status_txt ;
                    }?></div>
                <div class="clear"></div>
            </div>

        <?php  } ?>
    </div>
    <div><hr/></div>
    <div><h2>订单信息</h2></div>
    <div>
        <div>
            <div class="item">订单id:</div>
            <div class="item"><?php echo $detail['order_id'] ;?></div>
            <div class="clear"></div>
        </div>

        <div>
            <div class="item">产品信息:</div>
            <div class="item"><a href="/product/product_detail?&p_type=1&pid=<?php echo $detail['pid'];?>"><?php echo $detail['title'] ;?></a></div>
            <div class="clear"></div>
        </div>

        <div>
            <div class="item">出发日期:</div>
            <div class="item"><?php echo date('Y-m-d',$detail['travel_date']) ;?></div>
            <div class="clear"></div>
        </div>

        <div>
            <div class="item">总价钱:</div>
            <div class="item">￥<?php echo $detail['total_fee'] ;?>元</div>
            <div class="clear"></div>
        </div>

        <div>
            <div class="item">单价:</div>
            <div class="item">￥<?php echo $detail['unit_price'] ;?>元</div>
            <div class="clear"></div>
        </div>

        <div>
            <div class="item">人数:</div>
            <div class="item"><?php echo $detail['num'] ;?>人</div>
            <div class="clear"></div>
        </div>

        <div>
            <div class="item">下单时间:</div>
            <div class="item"><?php echo $detail['create_time'] ;?></div>
            <div class="clear"></div>
        </div>

    </div>
    <div><hr/></div>



    
        <?php
        $costomers ;
        $contact_1 ;
        $index = 0 ;
        foreach($contact as $contact_item) {
            if($contact_item['is_contact'] == 1) {
                $contact_1 = $contact_item ;
            } else {
                $costomers[] = $contact_item ;
            }
         } ?>
    <div class="contact"><h2>联系人</h2>
    <?php  if($status_item['status'] == Ptype::ORDER_STATUS_WILL_PAY || $status_item['status'] == Ptype::ORDER_STATUS_PAYED ){?>
    <span>修改<span>
    <?php }?>
    </div>
    <div class="clear"></div>
    <div class="contact_info" data="<?=$contact_1['id'];?>">

        <div>
            <div class="item">姓名:</div>
            <div class="item name"><?php echo $contact_1['name']; ?></div>
            <div class="clear"></div>
        </div>

       <!-- <div>
            <div class="item">性别:</div>
            <div class="item sex"><?php echo $contact_1['sex']==0?'男':'女' ;?></div>
            <div class="clear"></div>
        </div>-->

        <div>
            <div class="item">手机号:</div>
            <div class="item phone"><?php echo $contact_1['phone'] ;?></div>
            <div class="clear"></div>
        </div>

        <div>
            <div class="item">邮件:</div>
            <div class="item email"><?php echo $contact_1['email'] ;?></div>
            <div class="clear"></div>
        </div>

        <!--<div>
            <div class="item">身份证:</div>
            <div class="item id_card"><?php echo $contact_1['id_card'] ;?></div>
            <div class="clear"></div>
        </div>

        <div>
            <div class="item">护照:</div>
            <div class="item passport"><?php echo $contact_1['passport'] ;?></div>
            <div class="clear"></div>
        </div>-->


        <div><hr/></div>
    </div>
    <div class="contact_mod">
        <div>
            <div class="item1">姓名:</div>
            <div class="item2"><input type="text" class="required" value="<?=$contact_1['name'];?>" name="name">
            <div style="display: none;" class="order_error">
                        <div class="triangle"></div>
                        <span>请输入汉字或字母！</span>
                        </div>
            </div>
            <div class="clear"></div>
        </div>

       <!-- <div>
            <div class="item1">性别:</div>
            <div class="item">
                <select name="sex">
                    <option value="0" <?=$contact_1['sex']=='0'?'selected':'';?>>男</option>
                    <option value="1" <?=$contact_1['sex']=='1'?'selected':'';?>>女</option>
                </select>
            
            </div>
            <div class="clear"></div>
        </div>-->

        <div>
            <div class="item1">手机号:</div>
            <div class="item2"><input type="text" class="required" id="phone" value="<?=$contact_1['phone'];?>" name="phone">
            <div style="display: none;" class="order_error">
                        <div class="triangle"></div>
                        <span>手机号格式错误！</span>
            </div>
            </div>
            <div class="clear"></div>
        </div>

        <div>
            <div class="item1">邮件:</div>
            <div class="item2"><input type="text"  id="email" class="required" value="<?=$contact_1['email'];?>" name="email">
            <div style="display: none;" class="order_error">
                        <div class="triangle"></div>
                        <span>邮箱格式错误！</span>
            </div>
            </div>
            <div class="clear"></div>
        </div>

        <!--<div>
            <div class="item1">身份证:</div>
            <div class="item"><input type="text" class="required"  value="<?=$contact_1['id_card'];?>" name="id_card">

            </div>
            <div class="clear"></div>
        </div>

        <div>
            <div class="item1">护照:</div>
            <div class="item"><input type="text" class="required" value="<?=$contact_1['passport'];?>" name="passport"></div>
            <div class="clear"></div>
        </div>-->

        <div class="man"><button id="contact">保存</button><button id="cacel_c">取消</button></div>
        <div><hr/></div>
    </div>

    <?php if(isset($costomers) && sizeof($costomers) > 0) { ?>
    <div class="customer"><h2>客人详情</h2></div>

    
        <?php foreach($costomers as $contact_item) {
            $index++;

        ?>
        <div class="customer_info">
            <div>
                <div class="item fleft" style="font-size: 16px">游客<?php echo $index;?></div>
                <?php  if($status_item['status'] == Ptype::ORDER_STATUS_WILL_PAY || $status_item['status'] == Ptype::ORDER_STATUS_PAYED ){?>
                <div class="modify">修改</div>

                <?php }?>
            </div>
            <div style="clear: both;font-weight: bold">

            </div>
            <div>
                <div class="item">姓名:</div>
                <div class="item name"><?php echo $contact_item['name']; ?></div>
                <div class="clear"></div>
            </div>

            <div>
                <div class="item">性别:</div>
                <div class="item sex"><?php echo $contact_item['sex']==0?'男':'女';?></div>
                <div class="clear"></div>
            </div>

            <div>
                <div class="item">身份证:</div>
                <div class="item id_card"><?php echo $contact_item['id_card'] ;?></div>
                <div class="clear"></div>
            </div>

            <div>
                <div class="item">护照:</div>
                <div class="item passport"><?php echo $contact_item['passport'] ;?></div>
                <div class="clear"></div>
            </div>
            <div><hr/></div>
        </div>
        <div class="customer_mod" data="<?=$contact_item['id'];?>">
             <div>
                <div class="item" style="font-size: 16px">游客<?php echo $index;?></div>
            </div>
            <div class="clear"></div>
            <div>
                <div class="item1">姓名:</div>
                <div class="item2"><input type="text" class="required" value="<?=$contact_item['name'];?>" name="name">
                <div style="display: none;" class="order_error">
                            <div class="triangle"></div>
                            <span>请输入汉字或字母！</span>
                            </div>
                </div>
                <div class="clear"></div>
            </div>

           <div>
                <div class="item1">性别:</div>
                <div class="item">
                    <select name="sex">
                        <option value="0" <?=$contact_item['sex']=='0'?'selected':'';?>>男</option>
                        <option value="1" <?=$contact_item['sex']=='1'?'selected':'';?>>女</option>
                    </select>
                
                </div>
                <div class="clear"></div>
            </div>

            <div>
                <div class="item1">身份证:</div>
                <div class="item2"><input type="text" class="required"  value="<?=$contact_item['id_card'];?>" name="id_card">
                <div class="order_error" style="display: none;">
                        <div class="triangle"></div>
                        <span>身份证号格式错误！</span>
                </div>
                </div>
                <div class="clear"></div>
            </div>

            <div>
                <div class="item1">护照:</div>
                <div class="item2"><input type="text" class="required" value="<?=$contact_item['passport'];?>" name="passport">
                <div class="order_error" style="display: none;">
                    <div class="triangle"></div>
                    <span>护照号码格式不正确！</span>
                </div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="man"><button class="bt_customer">保存</button><button class="cacel_customer">取消</button></div>
            <div><hr/></div>
        </div>   
        <?php  } ?>
    
    <?php  } ?>
    <div class="order_man">
        <?php 

        if($status_item['status'] == Ptype::ORDER_STATUS_WILL_PAY){ ?>
        <div class="cacel">取消订单</div>
        <?php }else if($status_item['status'] == Ptype::ORDER_STATUS_PAYED){ ?>
        <div class="refund">申请退款</div>
        <?php } ?>

        <!--<div class="mode">修改订单</div>-->

    </div>

    <div style="margin-bottom: 100px">
    </div>
    <div style="margin-bottom: 100px"><a href="javascript:history.go(-1);">返回上一页</a></div>

</div>
</div>
<script>
var order_id = '<?=$detail['order_id'];?>';
    function check_reason(){
        var e = $('.js_cancel_order_pop_select');
       if(e.val()==""){
            error_ui(e,'请选择取消原因');
            ui_false(e);
            return false;
        }else{
            error_ui(e,"");
            ui_true(e);
            return true;
        }
    }
    function check_reason_refund(){
         var e = $('.js_cancel_order');
       if(e.val()==""){
            error_ui(e,'请选择退款原因');
            ui_false(e);
            return false;
        }else{
            error_ui(e,"");
            ui_true(e);
            return true;
        }
    }
    var reason = '';
    var desc = '';
    $('body').delegate('.js_cancel_order_pop_select','change',function(){
        check_reason();
        reason = $('.js_cancel_order_pop_select').val();
        desc = $('#js_cancel_order_remark').val();
    })
    var refund_reason = '';
    var refund_desc = '';
    $('body').delegate('.js_cancel_order','change',function(){

        check_reason_refund();
        refund_reason = $('.js_cancel_order').val();
        refund_desc = $('#js_cancel_order').val();
    })
   var index1 = '';
    $('.cacel').click(function(){
        var msg = '<table id="J_crosswise_pay" class="crosswise_tb" style="display: table;"> <tbody><tr> <th style="width:82px;"><span id="js_cancel_order_pop_tip">取消原因</span><strong class="required">*</strong></th> <td> <select style="width:278px;" class="js_cancel_order_pop_select" name="reason"> <option value=""></option><option value="行程不确定">行程不确定</option> <option value="无法按时付款">无法按时付款</option> <option value="价格原因">价格原因</option> <option value="重复预订">重复预订</option> <option value="材料无法按时提供">材料无法按时提供</option> <option value="担心不成团">担心不成团</option> <option value="突发事件">突发事件</option> <option value="其他原因">其他原因</option> </select> </td> </tr>   <tr> <th style="vertical-align:middle;margin-top:20px">取消描述<strong id="js_cancel_order_pop_star" style="display: none;" class="required">*</strong></th> <td><textarea id="js_cancel_order_remark" style="width:470px;height:100px;resize:none;margin-top:30px"></textarea></td> </tr> </tbody> </table>';
        var msg1 = '<div style="display: block;" class="order_masking_content"><strong id="J_cancelmsg">确认申请取消订单<span class="js_pop_orderId">'+order_id+'</span>吗？一经取消订单将无法恢复，请再次确认，谢谢！</strong></div>';
         layer.open({
                     title:'取消订单',
                     content: msg,
                     area: ['645px', '245px'],
                     yes: function(index, layero){
                        if(check_reason()){
                            layer.open({ 
                                title:'取消订单',
                                content: msg1,
                                area: ['645px', '145px'],
                                btn: ['确定', '取消']
                                ,yes:function(index){
                                    index1 = layer.load(1,{offset:['200px','650px'],shade: [0.4, '#393D49']});
                                    $.ajax({
                                        url:'/order/cancel_order',
                                        data:{order_id:order_id,reason:reason,desc:desc},
                                        type:'post',
                                        success:function(data){
                                            if(data.result.err==0){
                                               layer.close(index);
                                               layer.close(index1);
                                               document.location.href="";
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

                        return false;
                       
                    }
            });
    })

    $('.contact span').click(function(){
        $('.contact_info').css('display','none');
        $('.contact_mod').css('display','block');
    })
    $('#cacel_c').click(function(){
        $('.contact_info').css('display','block');
        $('.contact_mod').css('display','none');

    })
    $('.modify').click(function(){
        $(this).parents('.customer_info').css('display','none').next().css('display','block');
    })
    //检查邮箱格式
    function is_email(email){
        //检测用户名的格式是否ok
        var reg = /^[0-9A-Za-zd]+([-_.][A-Za-zd]+)*@([0-9A-Za-zd]+[-.])+[A-Za-zd]{2,5}$/;
        //获取用户名的值
        //检测   exec
        return reg.test(email);
    }

    //检查手机号格式
    function is_phone(phone){
        var reg = /^1[3-9][0-9]{9}$/; 
        //检测   exec
        return reg.test(phone);
    }
    function is_name(name){
        var reg =/^[^\d]+$/;
        //检测   exec
        return reg.test(name); 
    }

    function is_idnumber(idnum){
        var reg = /(^\d{15}$)|(^\d{17}(\d|X)$)/;
        //检测   exec
        return reg.test(idnum);  
    }
    function is_passport(pass){
        var reg = /^1[45][0-9]{7}$|E[0-9]{8}$|G[0-9]{8}$|P[0-9]{7}$|S[0-9]{7,8}$|D[0-9]+$/;
        //检测   exec
        return reg.test(pass);
    }
    function checkemail(){

        var email = $('#email').val();
        if(is_email(email)){
            
            ui_true1($('#email'));
            return true;
        }else{
            ui_false1($('#email'));
            $('#email').trigger('focus');
            return false;
        }
    }
    function checkphone(){
        var phone = $('#phone').val();
        if(is_phone(phone)){
            ui_true1($('#phone'));
            return true;
        }else{
            ui_false1($('#phone'));
            $('#phone').trigger('focus');
            return false;
        }
    }

    function checkname(a){
        var name = a;
        if(is_name(name.val())){
            ui_true1(name);
            return true;
        }else{
            ui_false1(name);
            return false;
        }
    }

    function checkidnum(b){

        var idnum= b;
        if(is_idnumber(idnum.val())){
            ui_true1(idnum);
            return true;
        }else{
            ui_false1(idnum);
            return false;
        }
    }

    function checkpass(c){
        var passport = c;
        if(is_passport(passport.val())){
            ui_true1(passport);
            return true;
        }else{
            ui_false1(passport);
            return false;
        }
    }
    function ui_false1(e){
        e.next().css('display','inline');
        e.addClass('error');
        e.trigger('focus');
    }

    function ui_true1(e){
       e.next().css('display','none');
       e.removeClass('error');

    }

    $('#email').blur(function(){
        checkemail();
    })
    $('#phone').blur(function(){
        checkphone();
    })
    $('input[name="name"]').blur(function(){
        var a = $(this);
        checkname(a);
    })
    $('input[name="id_card"]').blur(function(){
        var a = $(this);
        checkidnum(a);
    })
    $('input[name="passport"]').blur(function(){
        var a = $(this);
        checkpass(a);
    })
    function checkallname(e){

        var allname = e; 
        var is_passall = new Array();
        var IS_PASS = false;
        allname.each(function(index,el) {
            if(this.getAttribute('class')!='required'){
                is_passall.push(false);     
            }else{
                is_passall.push(true);
            }
        })

        if(is_passall.contains(false)){
            IS_PASS = false;
        }else{
            IS_PASS = true;
        }   
        // console.log(is_passall);
        return IS_PASS;
    }

    Array.prototype.contains = function (element) {
        for (var i = 0; i < this.length; i++) {
            if (this[i] == element) {
                return true;
            }
        }
        return false;
    } 
     $('#contact').click(function(){
       $(this).parents('.contact_mod').find('input').trigger('blur');
       var o = $(this);
       

       var i = $('.contact_mod').find('select').attr('name');
       $('.contact_info').find('.'+i).html($('.contact_mod').find('select').val()=='1'?'女':'男');

       var e = $('.contact_mod').find('input');

       var id = $('.contact_info').attr('data');
       var a =$('.contact_mod').find('input[name="name"]').val();
       var b = $('.contact_mod').find('input[name="email"]').val();
       var c = $('.contact_mod').find('input[name="phone"]').val();
       if(checkallname(e)){
             $.ajax({
                url:'/order/modify_user',
                data:{order_id:order_id,customer_id:id,name:a,email:b,phone:c},
                type:'post',
                success:function(data){

                    if(data.result.err==0){
                        o.parents('.contact_mod').find('input').each(function(){
                            var a = $(this).attr('name');
                           $('.contact_info').find('.'+a).html($(this).val());
                        })
                        $('.contact_info').css('display','block');
                        $('.contact_mod').css('display','none');
                        return true;
                    }else{
                        
                    }
                }
            },'json')
       }

       return false;
   })
   
   $('.bt_customer').click(function(){
       $(this).parents('.customer_mod').find('input').trigger('blur');
       var o = $(this);
       
      var e = $(this).parents('.customer_mod').find('select').attr('name');
      $(this).parents('.customer_mod').prev().find('.'+e).html($(this).parents('.customer_mod').find('select').val()=='1'?'女':'男');
       var e = $(this).parents('.customer_mod').find('input');
       var k =  $(this).parents('.customer_mod');
       var id =  $(this).parents('.customer_mod').attr('data');
       var a = $(this).parents('.customer_mod').find('input[name="name"]').val();
       var b = $(this).parents('.customer_mod').find('select').val();
       var c = $(this).parents('.customer_mod').find('input[name="id_card"]').val();
       var d = $(this).parents('.customer_mod').find('input[name="passport"]').val();
       if(checkallname(e)){
             $.ajax({
                url:'/order/modify_user',
                data:{order_id:order_id,customer_id:id,name:a,sex:b,id_card:c,passport:d},
                type:'post',
                success:function(data){

                    if(data.result.err==0){
                        o.parents('.customer_mod').find('input').each(function(){
                            var a = $(this).attr('name');
                            $(this).parents('.customer_mod').prev().find('.'+a).html($(this).val());
                       })
                        k.prev().css('display','block');
                        k.css('display','none');
                        return true;
                    }else{
                        
                    }
                }
            },'json')
          
       }

       return false;
   })
   $('.cacel_customer').click(function(){
        $(this).parents('.customer_mod').prev().css('display','block');
        $(this).parents('.customer_mod').css('display','none');
   })

   //正确的ui 
        function ui_false(e){
            e.parent().find('.invalid').css('display','block');
        }
        //错误的ui
        function ui_true(e){
            e.parent().find('.invalid').css('display','none');
            e.parent().find('.valid').css('display','inline');
        }

        function error_ui(e,i){
            var error_info = '<div class="invalid" style="display:none;margin-left:20px"><i></i><div class="msg">'+i+'</div></div><i class="valid" style="display: none;"></i>';
            if(e.parent().find('.invalid').attr('class') != 'invalid'){
                e.parent().append(error_info);
            }else{
                e.parent().find('.msg').html(i);
            }
            
        }

        function check_verify(){
            var e = $('#verify_code');

            if(e.val()==""){
                 error_ui(e,'授权码不能为空');
                 ui_false(e);
                 return false;
            }else{
                error_ui(e,"");
                ui_true(e);
                return true;
            }
        }
   $('.mode').click(function(){
    var msg = '<div id="verify"><div class="v_title">游客提供授权码</div><div class="v_to">将发验证码到:151***0231,请及时与游客联系确认</div><div class="v_con">请输入授权码 <input type="text" name="verify" id="verify_code"> <button class="sedbtn">发送授权码</button></div></div>';
         layer.open({
                     title:'修改订单',
                     content: msg,
                     area: ['700px', '250px'],
                     yes: function(index, layero){
                        if(!check_verify()){
                             return false;
                        }
                       
                     }

            });
   })
   var index2 = '';
   $('.refund').click(function(){
        var msg1 = '<table id="J_crosswise_pay" class="crosswise_tb" style="display: table;"> <tbody><tr> <td style="width:82px;"><span id="js_cancel_order_pop_tip">退款原因</span><strong class="required">*</strong></td> <td> <select style="width:278px;" class="js_cancel_order" name="reason"> <option value=""></option><option value="行程不确定">行程不确定</option> <option value="无法按时付款">无法按时付款</option> <option value="价格原因">价格原因</option> <option value="重复预订">重复预订</option> <option value="材料无法按时提供">材料无法按时提供</option> <option value="担心不成团">担心不成团</option> <option value="突发事件">突发事件</option> <option value="其他原因">其他原因</option> </select> </td> </tr>   <tr> <td style="vertical-align:middle;margin-top:20px">原因描述<strong id="js_cancel_order_pop_star" style="display: none;" class="required">*</strong></td> <td><textarea id="js_cancel_order" style="width:470px;height:100px;resize:none;margin-top:30px"></textarea></td> </tr> </tbody> </table>';
        var refund_inst = '<div class="instruct"><div class="refund_inst">退款说明:</div><div>1. 游客申请退款;</div><div>2. 逍品旅游与供应商核算损失;</div><div>3. 客服人员提交退款申请;</div><div>4. 财务人员审核通过;</div><div>5. 出纳退款;</div><div>6. 退款进入银行处理程序</div><div>特别说明:所有退款均为"原路退回"方式.</div><br><div>到账时间说明</div><div>处理退款的时间为3个工作日左右,银行处理时间视客人不同支付方式不同,具体如下:</div><div>1.支付宝余额支付,及时到账;</div><div>2.网上银行支付,5-10个工作日到账;</div><div>3.信用卡支付,10-25个工作日到账;</div><div>4.借记卡汇款,3-5个工作日.</div><div>如果退款过时不到账,请致电逍品旅游客服询问是否已进行退款处理,或致电银行客户询问账目情况.</div></div>';

        var msg = msg1 + refund_inst;
        var msg2 = '<div style="display: block;" class="order_masking_content"><strong id="J_cancelmsg">确认申请退款订单号为:<span class="js_pop_orderId">'+order_id+'</span>的订单吗？退款对您将产生一定损失，具体损失视产品而定,请再次确认，谢谢！</strong></div>';
        layer.open({
                     title:'退款申请',
                     content: msg,
                     area: ['700px', '445px'],
                     btn:'退款',
                     yes: function(index, layero){
                        if(check_reason_refund()){
                            layer.open({ 
                                title:'退款申请',
                                content: msg2,
                                area: ['645px', '145px'],
                                btn: ['确定', '取消']
                                ,yes:function(index){
                                    index2 = layer.load(1,{offset:['200px','650px'],shade: [0.4, '#393D49']});
                                    $.ajax({
                                        url:'/order/refund_order',
                                        data:{order_id:order_id,reason:refund_reason,desc:refund_desc},
                                        type:'post',
                                        success:function(data){
                                            if(data.result.err==0){
                                               layer.close(index);
                                               layer.close(index2);
                                               document.location.href="";
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
</script>