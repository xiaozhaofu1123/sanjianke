@extends('admin.parent')
    @section('content')
    <div id="upload" class="block-area">
   @if (session('msg'))
       <div class="alert alert-success">
           {{ session('msg') }}
               <script type="text/javascript">
               setTimeout(function(){
                       location.href = location.href;
               },2000)
               </script>
       </div>
   @endif
    <form action="/doUploads" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-preview thumbnail form-control"></div>

                            <div>
                                <span class="btn btn-file btn-alt btn-sm">
                                    <span class="fileupload-new">选择图片</span>
                                    <span class="fileupload-exists">更改</span>
                                    <input type="file" name="mypic" multiple>
                                    <!-- <input type="file" name="mypic[]" multiple> -->
                                </span>
                                <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">移除</a>
                            </div>
                        </div>
                      <input type="submit" class="btn btn-xm btn-alt m-r-5" value="上传">
                        </form>
        </div>
        @endsection

