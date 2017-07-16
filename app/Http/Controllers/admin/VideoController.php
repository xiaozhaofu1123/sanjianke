<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        $where = [];
        //多表联查,用join
        $pro = DB::table('videos')
                    ->join('types', 'videos.vid', '=', 'types.id')
                    ->select('videos.*',  'types.type');

        if ($request->has('name')) {
            $name = $request->input('name');
            $where['name'] = $name;
            //注意'videos.name',而不能用name
            $pro->where('videos.name', 'like', '%'.$name.'%');
        }

        $list = $pro->paginate(5);
        // dd($list); $list的值

        return view('admin.vedio.index',['list'=>$list,'where'=>$where]);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $time = time();
        // dd($time);
        return view('admin.vedio.add',['time'=>$time]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'name.required' => '请输入分类名',

        ];

        $this->validate($request, [
                'name' => 'required',

            ],$messages);

        $arr = $request->except('_token');
       $id =  DB::table('videos')->insertGetId($arr);
       // $time=time();
       if ($id > 0) {
           return redirect('/admin/video')->with('msg','添加成功');
       }

    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => '请输入用户名',
    //         'age.required'  => '请输入年龄',
    //     ];
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);
        $type = DB::table('videos')->where('id',$id)->first();
        // dd($type);
        return view('admin.vedio.edit',['type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $arr = $request->except('_token','_method');
        // dd($arr);
        $res = DB::table('videos')->where('id',$id)->update($arr);
        // dd($res);
        if ($res > 0) {
            return redirect('admin/video')->with('msg','修改成功');
        }else{
             return redirect('admin/video')->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = DB::table('videos')->where('id',$id)->delete();
        if ($res > 0) {
            return redirect('admin/video')->with('msg','删除成功');
        }else{
             return redirect('admin/video')->with('error','删除失败');
        }
    }

    public function del(Request $request)
    {
        // dd($request);
        $arr = $request->input('check');
          // dd($arr);
        $res = DB::table('videos')->whereIn('id',$arr)->delete();
        if ($res > 0) {
            return redirect('admin/video')->with('msg','删除成功');
        }else{
             return redirect('admin/video')->with('error','删除失败');
        }
    }



}
