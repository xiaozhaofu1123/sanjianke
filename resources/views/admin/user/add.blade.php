@extends('admin.parent')
    @section('content')
        <div class="block-area" id="text-input">
            <h3 class="block-title">添加用户</h3>

            <p>请输入用户信息</p>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <script type="text/javascript">
                    setTimeout(function() {
                        location.href = location.href;
                    },2000);
                </script>
            @endif

<<<<<<< HEAD
        <form action="{{url('admin/users')}}" method="post">
=======
        <form action="/users" method="post">
>>>>>>> ed9b2f2d9d2e05f8014e11e385e551412c6c7ad8
            {{ csrf_field()}}
            <div class="row">

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="姓名" name="name">
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="年龄" name="age">
                </div>
                <div class="col-lg-6">
                    <select class="form-control m-b-10" name="sex">
                        <option>保密</option>
                        <option  value="1">男</option>
                        <option  value="2">女</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="密码" name="pass">
                </div>
<<<<<<< HEAD
                <div class="col-lg-6">
                    <select class="form-control m-b-10" name="auth">

                        <option  value="0">普通用户</option>
                        <option  value="1">VIP用户</option>
                        <option  value="2">广告用户</option>
                        <option  value="3">管理员</option>
                    </select>
                </div>
                <div class='row'>
                    <div class='col-lg-3'>
                        <input type="text" class='form-control m-b-10' name='mycode' placeholder="请输入验证码">

                    </div>
                    <div class='col-lg-3'>
                        <img src="{{ url('admin/capth2/'.time()) }}" onclick="this.src=this.src+Math.random()" style="height: 34px;">
                        <!-- 下边的方法也可以 -->
                       <!--  <img src="{{ url('admin/capth/'.time()) }}" onclick="this.src='{{ url('admin/capth') }}/'+Math.random()"> -->
                    </div>
                </div>
=======
>>>>>>> ed9b2f2d9d2e05f8014e11e385e551412c6c7ad8
                <div class="col-lg-12">
                     <input type="submit" value="提交" class="btn btn-block btn-alt">
                </div>
            </div>
        </form>


    @endsection