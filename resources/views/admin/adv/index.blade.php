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
            <h3 class="block-title">广告列表</h3>
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
               <form action="/admin/adv">
                    <div class='medio-body'>
                        广告描述：<input type="text" class='form-control input-sm m-b-10' name='comment'>
                        广告所有者：<input type="text" class='form-control input-sm m-b-10' name='own'>
                    </div>
                    <input type="submit" class='btn m-b-10' value='搜索'>
                </form>
                <table class="table tile">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>广告描述</th>
                            <th>广告所有者</th>
                            <th>广告链接</th>
                            <th>添加时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($list as $k=>$v)
                            <tr>
                                <td>{{$v->id}}</td>
                                <td>{{$v->comment}}</td>
                                <td>{{$bb[$k]}}</td>
                                <td>{{$v->advertisements_url}}</td>
                                <td>{{  date('Y-m-d H:i:s', $v->create_time)}}</td>

                                <td>
                                    <a class="btn btn-alt m-r-1" href="/admin/adv/{{$v->id}}/edit">修改</a> |
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
            function doDel(id)
            {
                if (confirm("你确定删除吗")) {
                    var form = document.myform;
                    form.action = '/admin/adv/'+id;
                    form.submit();
                }
            }
        </script>
    @endsection