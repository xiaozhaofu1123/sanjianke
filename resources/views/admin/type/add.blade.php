@extends('admin.parent')
    @section('content')
        <div class="block-area" id="text-input">
            <h3 class="block-title">添加顶级分类</h3>

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

        <form action="{{url('admin/type')}}" method="post">
            {{ csrf_field()}}
            <div class="row">

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="分类名" name="type">
                </div>
                <div class="col-lg-6">
                    <input type="hidden" class="form-control m-b-10" value="0" name="path">
                </div>

                <div class="col-lg-6">
                    <input type="hidden" class="form-control m-b-10" name="tid" value="0">
                </div>
                <div class="col-lg-12">
                     <input type="submit" value="提交" class="btn btn-block btn-alt">
                </div>
            </div>


    @endsection