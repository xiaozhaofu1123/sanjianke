<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //防止登录之后再重复登录
        if ($request->session()->has('adminuser')) {
            return redirect('admin/demo2');
        }else{
           return view('admin.login');
        }

    }

    public function doLogin(Request $request)
    {
        // dd($request->pass);
        // 获取session中的验证码
        $mycode = session('mycode');
        //判断session中的验证码和用户输入的验证码是否一致
        if($mycode != $request->input('mycode')){
            //不一致则跳转回上一页
            return back()->with('msg', '登录失败：验证码错误');
        }

        //实例化一个模型,上面已经use了
        $user = new User();

        //调用模型中的index验证用户登录
        $ob = $user->index($request);
        if($ob){

                //如果用户登录成功，保存用户登录信息
            session(['adminuser'=>$ob]);
            //跳转到后台首页
            return redirect('admin/demo2');

        }else{
            //登录失败则跳转回上一页
            return redirect('admin/login')->with('msg', '登录失败：用户名或密码错误');
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


    //ajax验证
    public function doAjax(Request $request)
    {

        $user = new User();
        //获取输入的用户名
        $name = $request->input('name');
        // 从数据库查询用户名,并且权限为3
        $auth = $user->where('name',$name)
                     ->where('auth', '=',3)
                     ->first();


                if($auth){
                    echo 'y';
                }else{
                    echo 'n';
                }

    }
}

