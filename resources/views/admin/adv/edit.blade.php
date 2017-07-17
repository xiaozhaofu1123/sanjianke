@extends('admin.parent')
    @section('content')
        <div class="block-area" id="text-input">
            <h3 class="block-title">修改广告</h3>

            <p>广告所有者: {{ $name}}</p>
          


        <form action="/admin/adv/{{$user->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="姓名" name="comment" value="{{ $user->comment }}">
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="年龄" name="advertisements_url" value="{{ $user->advertisements_url }}">
                </div>

                <div class="col-lg-12">
                     <input type="submit" value="提交" class="btn btn-block btn-alt">
                </div>
            </div>
        </form>


    @endsection