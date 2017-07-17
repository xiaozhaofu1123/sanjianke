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
                    <h3 class="block-title">分类列表</h3>
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
                    <form name='myform1' action="" style='display:none' method='get'>
                        <input type="hidden" name="order" value="asc">
                    </form>
                    <form name='myform2' action="" style='display:none' method='get'>
                        <input type="hidden" name="order" value="desc">
                    </form>
                    <!-- 搜索  -->
                    <form action="/admin/type">
                        <div class='medio-body'>
                            分类名：<input type="text" class='form-control input-sm m-b-10' name='type'>
                        </div>
                        <input type="submit" class='btn m-b-10' value='搜索'>
                    </form>
                    <table class="table tile">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>分类名</th>
                                <th>级别  
                                <img onclick="doOrdera()" src="{{asset('admin/img/1.jpg')}}" id="img">
                                <img onclick="doOrderd()" src="{{asset('admin/img/2.jpg')}}" id="img">
                                </th>
                                <th>父分类</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $k=>$v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->type }}</td>
                                    <td>
                                    {{ 
                                    $v->path? $cc[$k]:"1级分类"
                                    }}</td>
                                    <td>
                                    {{
                                     $v->tid?$aa[$k]:"无"

                                     }}</td>
                                    <td>
                                        <a class="btn m-r-5" href='javascript:doDel({{ $v->id }})'>删除</a>
                                        <a class="btn m-r-5" href='{{ url("admin/type")."/".$v->id }}/edit'>修改</a>
                                        <a class="btn m-r-5" href='{{ url("admin/typeSon")."/".$v->id }}'>添加子分类</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $list->appends($where)->render() !!}
                </div>
                <script>
                    function doDel(id)
                    {
                        if(confirm('你确定要删除吗？')){
                            var form = document.myform;
                            var url = "{{ url('admin/type') }}";
                            form.action = url+'/'+id;
                            form.submit();
                        }
                    }
                    function doOrdera()
                    {       
                        var form = document.myform1;
                        var url = "{{ url('admin/type') }}";
                        form.action = url;
                        form.submit();
       
                    }
                    function doOrderd()
                    {       
                        var form = document.myform2;
                        var url = "{{ url('admin/type') }}";
                        form.action = url;
                        form.submit();
       
                    }
                                
                </script>
    @endsection
