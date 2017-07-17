<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where = array();
        $ob = DB::table('advertisements');

        if ($request->has('comment')) {
            $comment = $request->input('comment');
            $where['comment'] = $comment;
            $ob->where('comment', 'like', '%'.$comment.'%');
        }

        if ($request->has('own')) {
            $own = $request->input('own');


            $res = DB::table('user')->where('name','like','%'.$own.'%')->get();
            $cc = array();
            foreach ($res as  $v) {
                $cc[count($cc)] = $v->id;
            }
            // dd($cc);

           $dd =$ob->whereIn('own',$cc);

        }

        $bb = array();

        $list=$ob->paginate(5);

        foreach ($list->all() as $v) {

            $bb[count($bb)] = DB::table('user')->where('id',$v->own)->value('name');
        }
        return view('admin.adv.index',['list'=>$list,'bb'=>$bb,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adv.add');
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
            'comment.required' => '请输入广告描述',
            'own.required' => '请输入广所有者',
            'advertisements_url.required' => '请输入广告链接',


        ];

        $this->validate($request, [
                'comment' => 'required',
                'own' => 'required',
                'advertisements_url' => 'required',

            ],$messages);

        $arr = $request->except('_token');
        $name = $arr['own'];
        $tid = DB::table('user')->where('name',$name)->value('id');
        // dd($tid);
        if( !$tid ) {
            return redirect('/admin/adv')->with('error','不存在的广告用户');
        }
        $arr['own']=$tid;
        $arr['create_time'] = time();
        $id =  DB::table('advertisements')->insertGetId($arr);
        if ($id > 0) {
           return redirect('/admin/adv')->with('msg','添加成功');
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
        $user = DB::table('advertisements')->where('id',$id)->first();
        $own= $user->own;
        $name = DB::table('user')->where('id',$own)->value('name');

        return view('admin.adv.edit',['user'=>$user,'name'=>$name]);
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
        $res = DB::table('advertisements')->where('id',$id)->update($arr);
        if ($res > 0) {
            return redirect('admin/adv')->with('msg','修改成功');
        }else{
             return redirect('admin/adv')->with('error','修改失败');
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
        $res = DB::table('advertisements')->where('id',$id)->delete();
        if ($res > 0) {
            return redirect('admin/adv')->with('msg','删除成功');
        }else{
             return redirect('admin/adv')->with('error','删除失败');
        }
    }
}
