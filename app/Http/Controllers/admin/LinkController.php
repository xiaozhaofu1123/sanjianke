<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $where = [];
         $ob = DB::table('link');


         if($request->has('name')){
            // 获取搜索的条件
            $name = $request->input('name');
            //添加到将要带到分页中的数组
            $where['name'] = $name;
            //给查询语句添加where条件
            $ob->where('name','like','%'.$name.'%');
        }

       $list = $ob->paginate(5);


        return view('admin.link.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.add');
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
            'name.required' => '请输入链接名称',
            'name.unique' => '链接名称已存在',
            'content.required'  => '请输入链接内容',
            'link_url.required'  => '请输入链接地址',
            'link_url.unique'  => '链接地址已存在',

        ];

        $this->validate($request, [
                'name' => 'required|unique:link',
                'content' => 'required',
                'link_url' => 'required|unique:link',
            ],$messages);


        $arr = $request->except('_token');

        $res = DB::table('link')->insert($arr);

        if($res){
            return redirect('admin/link')->with('msg','添加成功');
        }else{
            return redirect('admin/link/add');
        }

    }

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
         //$edit = DB::table('link')->where('id', $id)->first();

        $edit = DB::table('link')->where('id',$id)->first();
        return view('admin.link.edit',['edit'=>$edit]);
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
        $arr = $request->except('_token','_method');
        $res = DB::table('link')->where('id',$id)->update($arr);
         if($res > 0){
            return redirect('admin/link')->with('msg', '修改成功');
        }else{
            return redirect('admin/link')->with('error', '修改失败');
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
         $res = DB::table('link')->where('id',$id)->delete();
        if($res > 0){
            return redirect('admin/link')->with('msg', '删除成功');
        }else{
            return redirect('admin/link')->with('error', '删除失败');
        }
    }
}
