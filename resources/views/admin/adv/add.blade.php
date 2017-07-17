@extends('admin.parent')
    @section('content')
        <div class="block-area" id="text-input">
            <h3 class="block-title">添加广告</h3>

            <p>请输入广告信息</p>
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

        <form action="{{url('admin/adv')}}" method="post">
            {{ csrf_field()}}
            <div class="row">

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="广告描述" name="comment">
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="广告所有者" name="own">
                </div>
               
                <div class="col-lg-12">
                    <input type="text" class="form-control m-b-10" placeholder="广告链接" name="advertisements_url">
                </div>              
                
                   
                    
                
                <div class="col-lg-12">
                     <input type="submit" value="提交" class="btn btn-block btn-alt">
                </div>
            </div>
        </form>


    @endsection