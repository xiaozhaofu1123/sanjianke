<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
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
         // dd($request);


        // 获取session中的验证码
        $mycode = session('mycode');
        // dd($mycode);
         // dd($request->input('mycode'));
        //判断session中的验证码和用户输入的验证码是否一致
        if($mycode != $request->input('mycode')){
            //不一致则跳转回上一页
            return back()->with('msg', '添加失败：验证码错误');
        }

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

        $arr = $request->except(['_token','mycode']);
        //insertGetId数据库里插入的方法,返回插入的数据的id,若数据表有自动递增的 id，则可使用 insertGetId 方法来插入记录并获取其 ID
       $id =  DB::table('user')->insertGetId($arr);
       if ($id > 0) {
           return redirect('admin/users')->with('msg','添加成功');
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
        $user = DB::table('user')->where('id',$id)->first();
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
        $res = DB::table('user')->where('id',$id)->update($arr);
        if ($res > 0) {
            return redirect('admin/users')->with('msg','修改成功');
        }else{
             return redirect('admin/users')->with('error','修改失败');
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
        $res = DB::table('user')->where('id',$id)->delete();
        if ($res > 0) {
            return redirect('admin/users')->with('msg','删除成功');
        }else{
             return redirect('admin/users')->with('error','删除失败');
        }
    }

    public function capth()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        // $builder->build($width = 200, $height = 44, $font = null);
        $builder->build(200, 44, null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();

        //把内容存入session
        session()->flash('mycode', $phrase);
        // Session::flash('milkcaptcha', $phrase);
        //生成图片
        // header('Content-Type: image/jpeg');
        return response($builder->output())->header('Content-type', 'image/jpeg');
    }
}
