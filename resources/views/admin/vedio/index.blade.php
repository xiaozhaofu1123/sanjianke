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

        <!-- Deafult Table -->
                <div class="block-area" id="defaultStyle">
                    <h3 class="block-title">视频列表</h3>
                    @if (session('msg'))
                        <div class="alert alert-success">
                            {{ session('msg') }}
                            <script type="text/javascript">
                                setTimeout(function(){
                                    location.href=location.href;
                                },2000);
                            </script>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form name='myform' action="" style='display:none' method='post'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                    <!-- 搜索  -->
                    <form action="{{url('admin/video')}}">
                        <div class='medio-body'>
                            视频名：<input type="text" class='form-control input-sm m-b-10' name='name'>
                        </div>
                        <input type="submit" class='btn m-b-10' value='搜索'>
                    </form>

                    <form action="{{url('admin/videodel')}}" method="post">
                    {{ csrf_field() }}
                    <input type="submit" value="批量删除" class='btn m-b-10'>
                    <table class="table tile">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>视频名</th>
                                <th>视频类别</th>
                                <th>视频地址</th>
                                <th>视频描述</th>
                                <!-- <th>视频观看</th> -->
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $v)
                                <tr>
                                    <td><input type="checkbox" name="check[]" value="{{ $v->id }}">{{ $v->id }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td>{{ $v->type}}</td>
                                    <td><a href="{{ $v->path }}">{{ $v->path }}</a></td{{ $v->id }}>
                                    <td>{{ $v->status}}</td>
                                    <!-- <td><video src="{{ $v->path }}" style="width: 100px;height: 50px;" controls></video></td>
                                    <td> -->
                                     <td>{{date('Y-m-d H:i:s', $v->updata_time)}}</td>
                                     <td>
                                        <a class="btn m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
                                        <a class="btn m-r-5" href="{{ url('admin/video').'/'.$v->id }}/edit">修改</a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table></form>
                    </form>
                    {!! $list->appends($where)->render() !!}
                </div>
                <script>
                    function doDel(id)
                    {
                        if(confirm('你确定要删除吗？')){
                            var form = document.myform;
                            var url = "{{ url('admin/video') }}";
                            form.action = url+'/'+id;
                            form.submit();
                        }
                    }
                </script>
    @endsection
