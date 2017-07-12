@extends('admin.parent')
    @section('content')
        <ol class="breadcrumb hidden-xs">
            <li>
            <a href="#">Home</a>
            </li>
            <li>
            <a href="#">Library</a>
            </li>
            <li class="active">Data</li>
        </ol>
        <h4 class="page-title">TABLES</h4>

        <div class="block-area" id="responsiveTable">
            <h3 class="block-title">用户列表</h3>
            @if (session('msg'))
                <div class="alert alert-success">
                    {{ session('msg') }}
                        <script type="text/javascript">
                        setTimeout(function(){
                                location.href = location.href;
                        },2000)
                        </script>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                        <script type="text/javascript">
                        setTimeout(function(){
                                location.href = location.href;
                        },2000)
                        </script>
                </div>

            @endif

            <form action="" style="display: none" method="post" name="myform">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <div class="table-responsive overflow">
                <form action="{{url('admin/users')}}">
                    <div class="medio-body">
                        姓名: <input type="text" class="form-control input-sm m-b-10" name="name">
                        性别:<select class="form-control input-sm m-b-10" name="sex">
                                <option value=''>--请选择--</option>
                                <option value="1">男</option>
                                <option value="2">女</option>
                            </select>

                    </div>
                        <input type="submit" value="搜索" class="btn m-b-10" />
                </form>

                <table class="table tile">
                    <thead>
                        <tr>
                            <th>学号</th>
                            <th>姓名</th>
                            <th>年龄</th>
                            <th>性别</th>
                            <th>权限</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($list as $v)
                            <tr>
                                <td><input type="checkbox" name="check[]" value="[]">{{$v->id}}</td>
                                <td>{{$v->name}}</td>
                                <td>{{$v->age}}</td>
                                <td>{{($v->sex)==1?'男':'女'}}</td>

                                <td>
                                @if (($v->auth) == 0)
                                    普通用户
                                @elseif(($v->auth) == 1)
                                    VIP用户
                                @elseif(($v->auth) == 2)
                                    广告用户
                                @else(($v->auth) == 3)
                                    管理员
                                @endif
                                </td>

                                <td>
                                    <a class="btn btn-alt m-r-1" href="{{url('admin/users')}}/{{$v->id}}/edit">修改</a> |
                                    <a class="btn btn-alt m-r-1" href="javascript:doDel({{ $v->id }})">删除</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

               {!! $list->appends($where)->render() !!}
            </div>
            <!-- <div style="width: 100px;height: 50px;">
                <video src="http://47.94.215.115/media/m3.mp4" controls></video>
                <video src="http://47.94.215.115/media/m2.mp4" controls></video>
            </div> -->

            <div style="width: 200px;height: 30px;"></div>
        </div>
        <script type="text/javascript">
        var url = "{{url('admin/users')}}";
            function doDel(id)
            {
                if (confirm("你确定删除吗")) {
                    var form = document.myform;
                    form.action = url+'/'+id;
                    form.submit();
                }
            }
        </script>
    @endsection