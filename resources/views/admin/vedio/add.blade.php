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

        <form action="{{url('admin/video')}}" method="post">
            {{ csrf_field()}}
            <div class="row">

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="视频名称" name="name">
                </div>

                <div class="col-lg-6">
                    <select class="form-control m-b-10" name="vid">
                        <option  value="">--视频分类--</option>
                        <option  value="13">院线</option>
                        <option  value="14">喜剧</option>
                        <option  value="15">剧情</option>
                        <option  value="16">动作</option>
                        <option  value="17">犯罪</option>
                        <option  value="18">冒险</option>
                        <option  value="19">恐怖</option>
                        <option  value="20">科幻</option>
                        <option  value="21">奇幻</option>

                    </select>
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10"  name="path" placeholder="视频地址">
                </div>

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" name="status" placeholder="视频描述">
                </div>

                <div class="col-lg-6">

                    <input type="hidden" class="form-control m-b-10" name="updata_time" placeholder="添加时间" value="{{time()}}">
                </div>
                <div class="col-lg-12">
                     <input type="submit" value="提交" class="btn btn-block btn-alt">
                </div>
            </div>
        </form>


    @endsection