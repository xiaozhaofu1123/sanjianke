@extends('admin.parent')
    @section('content')
        <div class="block-area" id="text-input">
            <h3 class="block-title">修改类名</h3>

            <p>请输入分类信息</p>


        <form action="{{ url('admin/type').'/'.$type->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="类名" name="type" value="{{ $type->type }}">
                </div>

                <div class="col-lg-12">
                     <input type="submit" value="提交" class="btn btn-block btn-alt">
                </div>
            </div>
        </form>


    @endsection