<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $where = array();
        $ob = DB::table('types');
        if ($request->has('type')) {
            $type = $request->input('type');
            $where['type'] = $type;
            $ob->where('type', 'like', '%'.$type.'%');
        }
        $aa = array();
        $bb = array();
        $cc = array();
        $list=$ob->paginate(5);

        //正倒序控制
        // dd($request->input('order'));
        if($request->input('order')=='asc'){
             $list=$ob->orderBy('path', 'asc')->paginate(5);
        }
        if($request->input('order')=='desc'){
             $list=$ob->orderBy('path', 'desc')->paginate(5);
        }

        // $list=$ob->orderBy('path', 'asc')->paginate(10);
        foreach ($list->all() as $v) {
           //将tid对应的type存进aa
            $aa[count($aa)] = DB::table('types')->where('id',$v->tid)->value('type');
        }
        foreach ($list->all() as $v) {
           //将tid对应的type存进aa
            $bb[count($bb)] = DB::table('types')->where('id',$v->id)->value('path');
        }
        // dd($bb);
        foreach ($bb as $v) {
            $b = explode(",", $v);
            $cc[count($cc)] = count($b)."级分类";
        }

        return view('admin.type.index',['list'=>$list,'aa'=>$aa,'cc'=>$cc,'where'=>$where]);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type.add');
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
            'type.required' => '请输入分类名',
            'type.unique' => '分类名已存在',

        ];

        $this->validate($request, [
                'type' => 'required|unique:types',

            ],$messages);

        $arr = $request->except('_token');
       $id =  DB::table('types')->insertGetId($arr);
       if ($id > 0) {
           return redirect('/admin/type')->with('msg','添加成功');
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
        $type = DB::table('types')->where('id',$id)->first();
        return view('admin.type.edit',['type'=>$type]);
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
        $res = DB::table('types')->where('id',$id)->update($arr);
        if ($res > 0) {
            return redirect('admin/type')->with('msg','修改成功');
        }else{
             return redirect('admin/type')->with('error','修改失败');
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
        $del = DB::table('types')->where('tid',$id)->first();
        // dd($del);
        if(!$del){
            $res = DB::table('types')->where('id',$id)->delete();
            if ($res > 0) {
                return redirect('admin/type')->with('msg','删除成功');
            }else{
                return redirect('admin/type')->with('error','删除失败');
            }

        }else{
            return redirect('admin/type')->with('error','不能删除该分类:分类下存在子分类');
        }

    }

    public function createSon($id)
    {

        $res = DB::table('types')->where('id',$id)->first();
        // dd($res);
        return view('admin.type.addSon',['res'=>$res]);
    }

    public function doAddSon(Request $request)
    {
        $messages = [
            'type.required' => '请输入子分类名',
            'type.unique' => '子分类名已存在',

        ];

        $this->validate($request, [
                'type' => 'required|unique:types',

            ],$messages);

        $arr = $request->except('_token');
        $arr['path'] =  $arr['path'].','. $arr['tid'];
        $arr['tid'] = $arr['tid'];
        $id =  DB::table('types')->insertGetId($arr);

        // dd($aa);
        if ($id > 0) {
           return redirect('/admin/type')->with('msg','添加成功');
            // return view('admin.type.index', ['aa'=> $aa])->with('msg','添加成功');
            // return redirect()->action('TypeController@index',['aa'=>$aa]);
        };
    }
}
