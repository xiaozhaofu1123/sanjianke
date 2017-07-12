<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class UsersController extends Controller
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
        $ob = DB::table('user');
        if ($request->has('name')) {
            $name = $request->input('name');
            $where['name'] = $name;
            $ob->where('name', 'like', '%'.$name.'%');
        }

        if ($request->has('sex')) {
            $sex = $request->input('sex');
            $where['sex'] = $sex;
            $ob->where('sex', $sex);
        }
        $list=$ob->paginate(10);
        return view('admin.user.index',['list'=>$list,'where'=>$where]);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
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
            'name.required' => '请输入用户名',
            'age.required'  => '请输入年龄',
            'age.integer'  => '年龄必须为整数',
            'age.min'  => '年龄必须为正整数',
        ];

        $this->validate($request, [
                'name' => 'required',
                'age' => 'required|integer|min:0',
            ],$messages);

        $arr = $request->except('_token');
       $id =  DB::table('user')->insertGetId($arr);
       if ($id > 0) {
           return redirect('/users')->with('msg','添加成功');
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
        $user = DB::table('user')->where('uid',$id)->first();
        return view('admin.user.edit',['user'=>$user]);
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
        $res = DB::table('user')->where('uid',$id)->update($arr);
        if ($res > 0) {
            return redirect('/users')->with('msg','修改成功');
        }else{
             return redirect('/users')->with('error','修改失败');
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
        $res = DB::table('user')->where('uid',$id)->delete();
        if ($res > 0) {
            return redirect('/users')->with('msg','删除成功');
        }else{
             return redirect('/users')->with('error','删除失败');
        }
    }
}
