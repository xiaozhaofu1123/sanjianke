@extends('admin.parent')
    @section('content')
        <div class="block-area" id="text-input">
            <h3 class="block-title">修改用户</h3>

            <p>请输入用户信息</p>


        <form action="{{url('admin/users')}}/{{$user->id}}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="姓名" name="name" value="{{ $user->name }}">
                </div>
                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="年龄" name="age" value="{{ $user->age }}">
                </div>
                <div class="col-lg-6">
                    <select class="form-control m-b-10" name="sex" value="{{ $user->sex }}">
                        <option>保密</option>
                        <option value='1' @if($user->sex == 1)selected @endif>男</option>
                        <option value='2' @if($user->sex == 2)selected @endif>女</option>
                    </select>
                </div>
                <!-- <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="密码" name="pass" value="{{ $user->pass }}">
                </div>
 -->
                <div class="col-lg-6">
                        <select class="form-control m-b-10" name="auth" value="{{ $user->auth }}">
                            <option value='0' @if($user->auth == 0)selected @endif>普通用户</option>
                            <option value='1' @if($user->auth == 1)selected @endif>VIP用户</option>
                            <option value='2' @if($user->auth == 2)selected @endif>广告用户</option>
                            <option value='3' @if($user->auth == 3)selected @endif>管理员</option>
                        </select>
                </div>

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="密码" name="pass" value="{{ $user->pass }}">
                </div>

                <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <!-- 加载默认图片 -->
                                        <div class="fileupload-preview thumbnail form-control"><img src="{{url('admin/upload')}}/{{$user->photo}}"></div>

                                        <div>
                                            <span class="btn btn-file btn-alt btn-sm">
                                                <span class="fileupload-new">选择图片</span>
                                                <span class="fileupload-exists">更改</span>
                                                <input type="file" name="photo" >

                                            </span>
                                            <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">移除</a>
                                        </div>
                </div>

                <div class="col-lg-12">
                     <input type="submit" value="提交" class="btn btn-block btn-alt">
                </div>
            </div>
        </form>


    @endsection