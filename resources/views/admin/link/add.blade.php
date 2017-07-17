@extends('admin.parent')
    @section('content')
        <div class="block-area" id="input-masking">
                    
                    <h3 class="block-title">添加友情链接</h3>
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

                    
                    <br/><br/><br/>
                   
                    
                  
                <form action="{{url('admin/link')}}" method="post">
                 {{ csrf_field()}}
                    <div class="row">
                        <div class="col-md-3 m-b-15">
                            <label>链接名称</label>
                            <input type="text" name="name" class="input-sm form-control mask-date" placeholder="...">
                        </div>
                        
                        <div class="col-md-3 m-b-15">
                            <label>链接内容</label>
                            <input type="text" name="content" class="input-sm form-control mask-time" placeholder="...">
                        </div>
                        
                        <div class="col-md-3 m-b-15">
                            <label>链接地址</label>
                            <input type="text" name="link_url" class="input-sm form-control mask-date_time" placeholder="...">
                        </div>
                        
                        
                        
                        
                    </div>
                

                        <button type="submit" class="btn btn-sm m-r-5">提交</button>
                </form>
                </div>

     @endsection