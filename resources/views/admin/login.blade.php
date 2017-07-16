<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="Violate Responsive Admin Template">
        <meta name="keywords" content="Super Admin, Admin, Template, Bootstrap">

        <title>Super Admin Responsive Template</title>

        <!-- CSS -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/css/generics.css') }}" rel="stylesheet">
    </head>
    <body id="skin-blur-violate">
        <section id="login">
            <header>
                <h1>后台登陆</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
            </header>

            <div class="clearfix"></div>

            <!-- 登录提交 -->
            <form class="box tile animated active" id="box-login" action='{{ url("admin/login") }}' method="post">
                {{ csrf_field()}}
                <h2 class="m-t-0 m-b-15">
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                                <script type="text/javascript">
                                setTimeout(function(){
                                        location.href = location.href;
                                },2000)
                                </script>
                        </div>
                        @else
                        登录
                    @endif
                </h2>

                <input type="text" class="login-control m-b-10" placeholder="请输入用户名" name="name">
                <input type="password" class="login-control" placeholder="请输入密码" name="pass">
                <div class="row" style="height: 10px;"></div>
                <div class='row'>
                    <div class='col-xs-4'>
                        <input type="text" class='login-control' name='mycode' placeholder="请输入验证码">
                    </div>
                    <div class='col-xs-4'>
                        <img src="{{ url('admin/capth/'.time()) }}" onclick="this.src=this.src+Math.random()">
                        <!-- 下边的方法也可以 -->
                       <!--  <img src="{{ url('admin/capth/'.time()) }}" onclick="this.src='{{ url('admin/capth') }}/'+Math.random()"> -->
                    </div>
                </div>
                <div class="checkbox m-b-20">
                    <label>
                        <input type="checkbox">
                        记住账户
                    </label>
                </div>
                <button class="btn btn-sm m-r-5">登录</button>

                <small>
                    <a class="box-switcher" data-switch="box-register" href="">注册</a> or
                    <a class="box-switcher" data-switch="box-reset" href="">忘记密码</a>
                </small>
            </form>

            <!-- Register -->
            <form class="box animated tile" id="box-register">
                <h2 class="m-t-0 m-b-15">Register</h2>
                <input type="text" class="login-control m-b-10" placeholder="Full Name">
                <input type="text" class="login-control m-b-10" placeholder="Username">
                <input type="email" class="login-control m-b-10" placeholder="Email Address">
                <input type="password" class="login-control m-b-10" placeholder="Password">
                <input type="password" class="login-control m-b-20" placeholder="Confirm Password">

                <button class="btn btn-sm m-r-5">注册</button>

                <small><a class="box-switcher" data-switch="box-login" href="">已注册</a></small>
            </form>

            <!-- Forgot Password -->
            <form class="box animated tile" id="box-reset">
                <h2 class="m-t-0 m-b-15">重置密码</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu risus. Curabitur commodo lorem fringilla enim feugiat commodo sed ac lacus.</p>
                <input type="email" class="login-control m-b-20" placeholder="Email Address">

                <button class="btn btn-sm m-r-5">重置</button>

                <small><a class="box-switcher" data-switch="box-login" href="">已注册</a></small>
            </form>
        </section>

        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="{{ asset('admin/js/jquery.min.js') }}"></script> <!-- jQuery Library -->

        <!-- Bootstrap -->
        <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

        <!--  Form Related -->
        <script src="{{ asset('admin/js/icheck.js') }}"></script> <!-- Custom Checkbox + Radio -->

        <!-- All JS functions -->
        <script src="{{ asset('admin/js/functions.js') }}"></script>
    </body>

    <script >

        $('input[name="name"]').focus(function(){
            //把input后面的span提示删除
            $(this).next('span').remove();
        }).blur(function(){
            // alert(111111111);
            //获取用户输入的用户名
            var v = $(this).val();
            // alert(v);
            // 发送地址
            var url = "{{ url('admin/ajax') }}";
            // alert(url);

            $.ajax({
                url:url,
                type:'get',
                async:true,
                data:{name:v},
                //因为返回值为'y'或者'n'的字符串,所以这里类型不能写json
                // dataType:'json',

                success:function(data)
                {

                    if(data=='y'){
                        $('<span style="color:#10F310;font-size:15px;">管理员你好</span>').insertAfter('input[name="name"]');
                    }else{
                        $('<span style="color:#F70909;font-size:15px;">此账号违法,禁止使用</span>').insertAfter('input[name="name"]');
                    }
                },
                error:function(){
                    alert('ajax请求失败');
                }
            });


        });
    </script>
</html>
