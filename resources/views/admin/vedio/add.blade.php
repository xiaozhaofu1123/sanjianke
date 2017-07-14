@extends('admin.parent')
    @section('content')
        <div class="block-area" id="text-input">
            <h3 class="block-title">添加视频</h3>

            <p>请输入类别名</p>
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

        <form action="{{url('admin/vedio')}}" method="post">
            {{ csrf_field()}}
            <div class="row">

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="视频名称" name="name">
                </div>

                <div class="col-lg-6">
                    <select class="form-control m-b-10" name="type">
                        <option  value="">--视频分类--</option>
                        <option  value="1">科幻</option>
                        <option  value="2">武侠</option>
                        <option  value="3">爱情</option>
                    </select>
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10"  name="path" placeholder="视频地址">
                </div>

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" name="upid" placeholder="视频描述">
                </div>
                <div class="col-lg-12">
                     <input type="submit" value="提交" class="btn btn-block btn-alt">
                </div>
            </div>
        </form>


    @endsection