<style>
    #page:target {
        position: absolute;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 99999;
        background: rgba(255, 255, 255, 0.9);
    }
    #page:target:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 120px;
        height: 120px;
        z-index: 999;
        border-radius: 50%;
        border: solid 15px rgba(10, 120, 255, 0.5);
        transform: translate(-60px, -60px);
    }

    #page:target:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 20px;
        height: 20px;
        z-index: 999;
        border-radius: 50%;
        border: solid 8px rgba(255, 255, 255, 0.8);
        animation-name: example-4;
        animation-duration: 3s;
        animation-iteration-count: infinite;
    }

    @keyframes example-4 {
        0% {
            transform: translate(42px, -10px);
        }
        2.5% {
            transform: translate(41px, -2px);
        }
        5% {
            transform: translate(39px, 6px);
        }
        7.5% {
            transform: translate(36px, 13px);
        }
        10% {
            transform: translate(32px, 20px);
        }
        12.5% {
            transform: translate(27px, 27px);
        }
        15% {
            transform: translate(20px, 32px);
        }
        17.5% {
            transform: translate(13px, 36px);
        }
        20% {
            transform: translate(6px, 39px);
        }
        22.5% {
            transform: translate(-2px, 41px);
        }
        25% {
            transform: translate(-10px, 42px);
        }
        27.5% {
            transform: translate(-19px, 41px);
        }
        30% {
            transform: translate(-27px, 39px);
        }
        32.5% {
            transform: translate(-34px, 36px);
        }
        35% {
            transform: translate(-41px, 32px);
        }
        37.5% {
            transform: translate(-48px, 27px);
        }
        40% {
            transform: translate(-53px, 20px);
        }
        42.5% {
            transform: translate(-57px, 13px);
        }
        45% {
            transform: translate(-60px, 6px);
        }
        47.5% {
            transform: translate(-62px, -2px);
        }
        50% {
            transform: translate(-63px, -10px);
        }
        52.5% {
            transform: translate(-62px, -19px);
        }
        55.0% {
            transform: translate(-60px, -27px);
        }
        57.5% {
            transform: translate(-57px, -34px);
        }
        60% {
            transform: translate(-53px, -41px);
        }
        62.5% {
            transform: translate(-48px, -48px);
        }
        65% {
            transform: translate(-41px, -53px);
        }
        67.5% {
            transform: translate(-34px, -57px);
        }
        70% {
            transform: translate(-27px, -60px);
        }
        72.5% {
            transform: translate(-19px, -62px);
        }
        75% {
            transform: translate(-11px, -63px);
        }
        77.5% {
            transform: translate(-2px, -62px);
        }
        80% {
            transform: translate(6px, -60px);
        }
        82.5% {
            transform: translate(13px, -57px);
        }
        85% {
            transform: translate(20px, -53px);
        }
        87.5% {
            transform: translate(27px, -48px);
        }
        90% {
            transform: translate(32px, -41px);
        }
        92.5% {
            transform: translate(36px, -34px);
        }
        95% {
            transform: translate(39px, -27px);
        }
        97.5% {
            transform: translate(41px, -19px);
        }
        100% {
            transform: translate(42px, -11px);
        }
    }

    .tip {
        font-size: 16px;
    }
</style>
<div class="main-body">

<!--    <a class="tip col-sm-offset-3" href="/page/login"><-返回登录</a>-->
    <a id="page" href="#"></a>

    <div>

        <div class="row col-sm-12">
            <h2 class="account-register-title text-center y-margin-bottom-10px">注册账号</h2>
        </div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-pills col-sm-6 col-sm-offset-3 y-margin-top-10px" role="tablist">
            <li role="presentation" class="active"><a href="#provider" aria-controls="provider" role="tab" data-toggle="tab">供应商注册</a></li>
            <li role="presentation" ><a href="#agents" aria-controls="agents" role="tab" data-toggle="tab">代理商注册</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="provider">
                <div>
                    <div class="form-group col-sm-6 col-sm-offset-3 y-margin-top-10px"></div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="p_type">供应商类型</label>
                        <select id="p_type" class="col-sm-2 form-control">
                            <option value="1" selected>海外地接社</option>
                            <option value="2">海外购物商店</option>
                            <option value="3">批发商</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="p_name">供应商名称</label>
                        <input placeholder="名称" required="required"  class="form-control" id="p_name" type="text"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="p_email">邮箱</label>
                        <input placeholder="sample@qq.com" required="required"  class="form-control" id="p_email" type="text"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="p_wei_chat">微信号</label>
                        <input placeholder="微信" class="form-control" id="p_wei_chat" type="text"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="p_country">贵公司所在国家</label>
                        <input placeholder="国家" class="form-control" id="p_country" type="text"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="p_city">贵公司所在城市</label>
                        <input placeholder="城市" class="form-control" id="p_city" type="text"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="p_pwd">设置密码</label>
                        <input placeholder="密码" required="required"  class="form-control" id="p_pwd" type="password"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="p_re_pwd">重新输入密码</label>
                        <input placeholder="重新输入密码" required="required" class="form-control" id="p_re_pwd" type="password"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3 ">
                        <button class="btn btn-success btn-block y-btn y-margin-top-10px" onclick="onclick_register_provider()">注册</button>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="agents">
                <div>
                    <div class="form-group col-sm-6 col-sm-offset-3 y-margin-top-10px"></div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="a_p_type">擅长产品类型</label>
                        <select id="a_p_type" class="col-sm-2 form-control">
                            <option value="1" selected>海外度假</option>
                            <option value="2">婚礼</option>
                            <option value="3">亲子</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="a_nickname">昵称</label>
                        <input placeholder="昵称" class="form-control" required="required" id="a_nickname" type="text"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="a_email">邮箱</label>
                        <input placeholder="邮箱" class="form-control" required="required" id="a_email" type="text"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="a_pwd">密码</label>
                        <input placeholder="密码" class="form-control" required="required" id="a_pwd" type="password"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3">
                        <label for="a_re_pwd">重新输入密码</label>
                        <input placeholder="重新输入密码" class="form-control" required="required" id="a_re_pwd" type="password"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3 ">
<!--                        <a href="#page">click to apply to page</a>-->
                        <button class="btn btn-success btn-block y-btn y-margin-top-10px" onclick="onclick_register_agent()">注册</button>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3 y-margin-top-80px">
                        <input class="form-control" required="required"  type="hidden"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3 y-margin-top-20px">
                        <input class="form-control" required="required" type="hidden"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3 y-margin-top-20px">
                        <input class="form-control" required="required" type="hidden"/>
                    </div>

                    <div class="form-group col-sm-6 col-sm-offset-3 y-margin-top-20px">
                        <input class="form-control" required="required" type="hidden"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    //供应商注册
    function onclick_register_provider() {

        //类型
        var type = $("#p_type").val() ;
        console.log("type=" + type) ;

        //名称
        var name = $("#p_name").val() ;

        //email
        var email = $("#p_email").val() ;

        //微信
        var wechat = $("#p_wei_chat").val() ;

        //国家
        var country = $("#p_country").val() ;

        //城市
        var city = $("#p_city").val() ;

        //密码
        var pwd = $("#p_pwd").val() ;

        //重新输入密码
        var repwd = $("#p_re_pwd").val() ;

        show_progressbar();
        request_server(1, email, pwd, name,  wechat, country, city) ;
    }

    //代理商注册
    function onclick_register_agent() {
        var name = $("#a_nickname").val() ;
        var email = $("#a_email").val() ;
        var pwd = $("#a_pwd").val() ;
        var repwd = $("#a_re_pwd").val() ;

        if(pwd !== repwd) {
            alert("密码不一致,请确认密码！") ;
        } else {
            var wechat = "" ;
            var country = "" ;
            var city = "" ;

//            console.log('22222222') ;
            show_progressbar() ;
            request_server(2, email, pwd, name,  wechat, country, city) ;
        }
    }

    function request_server(user_type, email, password, name,  we_chat, country, city) {
        var url = window.location.protocol + "//" +  window.location.hostname + "/user/register" ;
        console.log(url) ;

        $.post(url, {
                user_type: user_type,
                email: email,
                password:password,
                country:country,
                city:city,
                name:name,
                we_chat:we_chat,
            },
            function(data) {
//                alert("data:" + data) ;
                if(data != null ) {
                    if(data.result.err == 0) {
//                        alert('注册成功') ;
                        hide_progressbar() ;
//                        window.location.href = "/page/login" ;register_confirm
                        window.location.href = "/page/register_confirm?email="+data.content.email+ '&email_url=' + data.content.email_url ;
                    } else {
                        alert(data.result.msg) ;
                        hide_progressbar() ;
                    }
                } else {
                    alert("data:" + data) ;
                    hide_progressbar() ;
                }
            }) ;
    }

    function show_progressbar() {
        var url = window.location.pathname ;
        url = url.replace("#page","") ;
        window.location.href = url + "#page" ;
//        console.log(window.location.href) ;
    }

    function hide_progressbar() {
//        var url = window.location.pathname ;
//        url = url.replace("#page","#") ;
        window.location.href = "#"  ;
    }


</script>