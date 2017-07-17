@extends('admin.parent')
    @section('content')
        <div class="block-area" id="input-masking">
                    
                    <h3 class="block-title">修改友情链接</h3>
                    
                    <br/><br/><br/>
                   

                  
                <form action="/admin/link/{{$edit->id}}" method='post'>
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
               
               
                    <div class="row">
                        <div class="col-md-3 m-b-15">
                            <label>链接名称</label>
                            <input type="text" name="name" value="{{$edit->name}}" class="input-sm form-control mask-date" placeholder="...">
                        </div>
                        
                        <div class="col-md-3 m-b-15">
                            <label>链接内容</label>
                            <input type="text" name="content" value="{{$edit->content}}" class="input-sm form-control mask-time" placeholder="...">
                        </div>
                        
                        <div class="col-md-3 m-b-15">
                            <label>链接地址</label>
                            <input type="text" name="link_url" value="{{$edit->link_url}}" class="input-sm form-control mask-date_time" placeholder="...">
                        </div>
                        
                        
                        
                        
                    </div>
                

                        <button type="submit" class="btn btn-sm m-r-5">提交</button>
                </form>
                </div>

     @endsection