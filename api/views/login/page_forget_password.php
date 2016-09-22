<div class="main-body">
    <div class="row">
        <form action="/user/find_password" method="post">
            <div>
                <h2 class="account-register-title text-center y-margin-bottom-10px">找回密码</h2>
            </div>

            <div class="form-group col-sm-6 col-sm-offset-3">
                <label for="login_name">邮箱</label>
                <input class="form-control" id="login_name" name="login_name" type="text" placeholder="sample@mail.com"/>
            </div>
            <div class="form-group col-sm-6 col-sm-offset-3 ">
                <input type="submit" class="btn btn-success btn-block y-btn y-margin-top-10px" value="找回密码"/>
            </div>
        </form>
    </div>
</div>

<script>
    function onclick_find_password() {
        alert('find_password') ;

        var email = $("#email").val() ;
        var url = "/user/find_password";
        $.post(url,{login_name:email}, function(data) {
            alert(data) ;

        }) ;
    }

</script>