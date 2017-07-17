@extends('admin.parent')
    @section('content')







                 <div class="block-area" id="tableBordered">
                    <h3 class="block-title">友情链接列表</h3>
                    @if (session('msg'))
                   
                    <div class="alert alert-success">
                         成功
                    </div>
                    <script type="text/javascript">
                    setTimeout(function() {
                        location.href = location.href;
                    },2000);
                    </script>
                   
                   
              

                    @endif


                     @if (session('error'))
                   
                    <div class="alert alert-danger">
                         失败
                    </div>
                    <script type="text/javascript">
                    setTimeout(function() {
                        location.href = location.href;
                    },2000);
                    </script>
                   
                   
              

                    @endif


                    <div class="table-responsive overflow">
                        <table class="table table-bordered tile">
                        <form name='myform' action="" style='display:none' method='post'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                        <form action="/admin/link">
                       
                        <input type="text" name="name" class="form-control m-b-10" placeholder="请输入链接名称">

                        <button type="submit" class="btn btn-sm m-r-5">搜索</button>
                        </form>
                        <br/><br/>
                            <thead>
                                <tr>
                                    <th>排名</th>
                                    <th>名称</th>
                                    <th>内容</th>
                                    <th>地址</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($list as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->content}}</td>
                                    <td>{{$v->link_url}}</td>
                                    <td>
                                        <a href="javascript:doDel({{ $v->id }})">删除</a>|
                                        <a href="/admin/link/{{ $v->id }}/edit">修改</a>
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
                            form.action = 'link/'+id;
                            form.submit();
                        }
                    }
                </script>      
                </div>

     @endsection
                