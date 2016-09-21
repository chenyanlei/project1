<!DOCTYPE html>
<html><head>
<title>qsctrip</title> 
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" src="/Public/js/jquery-1.9.0.min.js"></script>
<link rel="stylesheet" href="/Public/css/bootstrap.min.css">
<style type="text/css">
    body{
    background: #f1f1f1 url("/Public/images/bk.png") no-repeat scroll 0 -35px;
    font-family: "黑体";
    font-size: 12px;
    margin: 0;
  }
 .top{
    background: #fff url("/Public/images/01_02.png") no-repeat scroll 0 0;
    height:180px
  }
  .logo{
    background:transparent url("/Public/images/logo_02.png") no-repeat scroll center center;
    height:180px;
  }
  .lag{
        margin-top:120px;
        color:#585858;
    }
   .setfont{
     color:#585858;
     font-size:18px;
     margin-top:40px
   } 
</style>
<style type="text/css">
	input{
		background: #fff none repeat scroll 0 0;
	    border: 1px solid #d7d7d7;
	    border-radius: 2px;
	    color: #333;
	    font-family: Verdana,Tahoma,Arial;
	    font-size: 16px;
	    height: 33px;
	    ime-mode: disabled;
	    line-height: 33px;
	    padding-left: 5px;
	    width: 200px;
	}

	:focus{
		border:1px solid blue;
	}
	.focus_text{
		display: none
	}
	:focus~.focus_text{
		display: block;
	}
	.inputOuter{
        display: inline-block;
        vertical-align: middle;
        position: relative;
    }

    .inputOuter .focus_text,.inputOuter .error{
        color: #999;
        left: 0;
        margin-top: 4px;
        top:100%;
        white-space: nowrap;
        word-break: keep-all;
        width:100px;
        position:absolute;
        margin-left:-2px;
        font-size:12px 
    }

    .error{
    	display: none;
    }
    .canx{
        cursor: pointer;
    }
</style>
</head>
<body>
	<div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 top">
                    <div class="col-sm-6 logo"></div>
                    <div class="col-sm-6 text-center lang">
                         <select class="lag">
                            <option>中文(简体)&nbsp;&nbsp;</option>
                            <option>英文&nbsp;&nbsp;&nbsp;&nbsp;</option>
                        </select>
                    </div>
                </div>
            </div>
    
	<div class="row">
		<form action="/user/doforgot_pwd" method="post">

		<div class="col-sm-12 text-center">

             <div style="font-size:14px;color:#0097d6;font-weight:bold;margin-top:100px">QSC认证编号(输入编号自动注册成功)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <div class="inputOuter" style="margin-top:10px">
            <input type="text" name="qsc" id="qsc" style="width:300px;height:30px;border-radius:4px;color:#999999;font-size:14px;padding-left:10px;border-color:#0097d6;background:#f1f1f1">
			<div class="focus_text">请填写QSC认证编号</div>
			<div class="error"></div>
            </div>
		</div>
	    <div class="col-sm-12 text-center">   
		<input type="submit" value="确定" style="margin-top:40px;background:#0097d6;border-color:#0097d6;color:white;font-weight:bold;font-size:14px;width:100px;height:40px;border-radius:40px" id="sub">
        </div>
		</form>
	</div>
    </div>
	<script type="text/javascript">

        $('input').focus(function(){
            $(this).parent().find('.error').css('display','none');
            $(this).val();
        })
		//检查邮箱格式
        function Is_qsc(){

           
            //获取qsc的值
            var qsc = $('#qsc').val();
            if(!qsc){
              $('#qsc').parent().find('.error').html('qsc认证编号不能为空').css('display','block');
              return false;
           }else{
              return true;
           }

        }

      
        
        function check_qsc_exists(){ 		
        	
        }
        $('#sub').click(function(){
        	 
        	if(Is_qsc()){
        		var inp = $('#qsc');
                var qsc = $('#qsc').val();
                // 发送ajax检测用户名是否已经存在
                $.ajax({
                    url:'/user/check_qsc_exists',
                    data:{qsc_code:qsc},
                    type:'post',
                    async:false,//设置同步
                    success:function(data){
                
                        if(data.result.err==0){
                          document.location.href="/index/success";     
                          return true;
                        }else{
                            $('#qsc').parent().find('.error').html('您输入qsc码尚未认证').css('display','block');
                           
                           return false;
                        }
                    }
                },'json')
            
        	}

        	return false;
        })

	</script>

</body>
</html>