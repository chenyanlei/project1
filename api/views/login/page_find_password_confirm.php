<div class="main-body">
    <div class="row">
        <div>
            <h2 class="account-register-title text-center y-margin-bottom-10px">确认修改密码</h2>
        </div>
        <form data-toggle="validator" role="form" action="/user/reset_password" method="post">
        <div class="form-group col-sm-6 col-sm-offset-3">
            <label for="password">密码</label>
            <input class="form-control" id="pwd" name="pwd" type="password" required="true"  placeholder="输入密码" type="password"/>
        </div>

        <div class="form-group col-sm-6 col-sm-offset-3">
            <label for="re_password">重新输入</label>
            <input class="form-control" id="re_password" name="re_pwd" type="password" required="true"  placeholder="重新输入密码" type="password"/>
        </div>

        <input id="token" name="token" type="hidden" value="<?php echo $token ;?>"/>
        <div class="form-group col-sm-6 col-sm-offset-3 ">
            <input type="submit" class="btn btn-success btn-block y-btn y-margin-top-10px" value="确认修改"></input>
        </div>
        </form>
    </div>
</div>

<script>
    function onclick_confirm_change() {
        var token = $("#token").val() ;
        var password = $("#password").val() ;
        var re_password = $("#re_password").val() ;

        if(re_password != password) {
            alert("两次输入密码不同") ;
            return ;
        }

        var url = "/user/reset_password";
        $.post(url,{token:token,pwd:password}, function(data) {
            if(data.result.err == 0) {

                window.location.href = "/page/login" ;
            } else {

                ;
                alert(JSON.stringify(data) ) ;
            }
        }) ;
    }

</script>