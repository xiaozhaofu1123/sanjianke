@extends('admin.parent')
    @section('content')
        <div class="block-area" id="text-input">
            <h3 class="block-title">修改类名</h3>

            <p>请输入分类信息</p>


        <form action="{{ url('admin/video').'/'.$type->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="row">

                <div class="col-lg-6">
                    <input type="text" class="form-control m-b-10" placeholder="类名" name="name" value="{{ $type->name }}">
                </div>
               <div class="col-lg-6">
                   <select class="form-control m-b-10" name="vid">
                       <!-- <option  value="">--视频分类--</option> -->
                       <option  value="13" ({{ $type->vid }}==13)?'selected':''>院线</option>
                       <option  value="14" ({{ $type->vid }}==14)?'selected':''>喜剧</option>
                       <option  value="15" ({{ $type->vid }}==15)?'selected':''>剧情</option>
                       <option  value="16" ({{ $type->vid }}==16)?'selected':''>动作</option>
                       <option  value="17" ({{ $type->vid }}==17)?'selected':''>犯罪</option>
                       <option  value="18" ({{ $type->vid }}==18)?'selected':''>冒险</option>
                       <option  value="19" ({{ $type->vid }}==19)?'selected':''>恐怖</option>
                       <option  value="20" ({{ $type->vid }}==20)?'selected':''>科幻</option>
                       <option  value="21" ({{ $type->vid }}==21)?'selected':''>奇幻</option>

                   </select>
               </div>
               <div class="col-lg-6">
                   <input type="text" class="form-control m-b-10"  name="path" placeholder="视频地址" value="{{ $type->path }}">
               </div>

               <div class="col-lg-6">
                   <input type="text" class="form-control m-b-10" name="status" placeholder="视频描述" value="{{ $type->status }}">
               </div>



                <div class="col-lg-12">
                     <input type="submit" value="提交" class="btn btn-block btn-alt">
                </div>
            </div>
        </form>


    @endsection