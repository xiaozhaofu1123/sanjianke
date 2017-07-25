<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use Mail;
use App\Tool\UUID;
use App\Models\User;
use App\Models\M3Result;
use App\Models\M3Email;
use App\Models\TempEmail;
use App\Models\SMS\CCPRestSDK;



class RegisterController extends Controller
{

    //主帐号,对应官网开发者主账号下的 ACCOUNT SID
        private $accountSid= null;

        //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
        private $accountToken= null;

        //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
        //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
        private $appId=null;

        //请求地址
        //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
        //生产环境（用户应用上线使用）：app.cloopen.com
        private $serverIP=null;


        //请求端口，生产环境和沙盒环境一致
        private $serverPort=null;

        //REST版本号，在官网文档REST介绍中获得。
        private $softVersion=null;




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home/register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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





         $messages = [
             'name.required' => '请输入用户名',
             'pass.required'  => '请输入密码',


         ];

         $this->validate($request, [
                 'name' => 'required',
                 'pass' => 'required',
                 'repass' => 'required',

             ],$messages);



         if ($request->pass == $request->repass) {
              $arr = $request->except(['_token','submit','repass']);
               $arr['pass']=Hash::make($request->pass);


              //insertGetId数据库里插入的方法,返回插入的数据的id,若数据表有自动递增的 id，则可使用 insertGetId 方法来插入记录并获取其 ID
             $id =  DB::table('user')->insertGetId($arr);
             if ($id > 0) {
                 return redirect('home/register')->with('msg','注册成功,请登录');
         }


    }else{
        return redirect('home/mail')->with('error', '密码不一致,注册失败');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function doAjax(Request $request)
    {

        //获取用户输入的密码的值
        $pass = $request->input('name');
        if (strlen($pass) < 6) {
            echo 'n';
        }else{
            echo 'y';
        }

    }

    public function confirmAjax(Request $request)
    {

        //获取用户输入的密码的值和确认密码的值
        if ($request->input('name') == $request->input('cname')) {
            echo 'y';
        }else{
            echo 'n';
        }


    }

    public function dophoneAjax(Request $request)
    {

        //获取用户输入的手机号
        $phone = $request->input('name');
        if (!preg_match('/^1[3-8]([0-9]{9})$/',$phone) ) {
            echo 'n';
        }else{
            echo 'y';
        }

    }

    public function mail()
    {
        return view('home/mail');
    }

    public function phone()
    {
        return view('home/phone');
    }

    public function send(Request $request)
    {
        //==========邮箱密码验证===============
        if ($request->pass != $request->repass) {
            return redirect('home/mail')->with('error', '密码不一致,注册失败');
        }
        if (strlen($request->pass) < 6) {
            return redirect('home/mail')->with('error', '密码不能少于6位数字');
        }

        //============================获取用户填写信息=======================
        // 获取输入的用户邮箱
        $email = $request->input('name', '');
        // dd($email);
        //对输入的数据进行哈希加密
        $pass = Hash::make($request->input('pass', ''));;

         $user = new User;
         $user->email = $email;
         $user->pass = $pass;
         //将在注册页面填写的数据添加到数据库
         $user->save();
        //============================================================================
         //设置发送连接中的32位随即字符串
         $uuid = UUID::create();

        //================================邮件发送的内容===============================
         $m3_email = new M3Email;
         $m3_email->to = $email;
         $m3_email->cc = 'xiaozhaofu@163.com';
         $m3_email->subject = '三剑客视频验证';
         $m3_email->content = '请于24小时点击该链接完成验证.http://47.94.215.115/home/validate_email'. '?uid=' . $user->id
                    . '&code=' . $uuid;


        $tempEmail = new TempEmail;
        $tempEmail->uid = $user->id;
        $tempEmail->code = $uuid;
        $tempEmail->timeline = date('Y-m-d H-i-s', time() + 24*60*60);
        $tempEmail->save();


        //==============================邮件发送=====================================
       $info = '三剑客视频网站';
         Mail::send('home/send', ['m3_email' => $m3_email], function ($m) use ($info,$m3_email) {
                    //mail.php中已经设置好邮件发送人的信息
                     // $m->from('xiaozhaofu@163.com', '三剑客视频网站');

                   $m->to($m3_email->to, '尊敬的用户')
                     ->cc($m3_email->cc)
                     ->subject($m3_email->subject);
                 });
          return redirect('home/mail')->with('msg', '邮件发送成功,请于24小时点击该链接完成验证');
    }








    //=====================手机短信注册========================================
    public function phoneCode(Request $request)
    {
         // dd($request);

        //主帐号,对应官网开发者主账号下的 ACCOUNT SID
        $this->accountSid= '8a216da85d158d1b015d4f07248f1604';

        //主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
        $this->accountToken= 'dc29bd2a0e4a45f190957d06c12a098f';

        //应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
        //在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
        $this->appId='8a216da85d158d1b015d4f0724d61608';

        //请求地址
        //沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
        //生产环境（用户应用上线使用）：app.cloopen.com
        $this->serverIP='app.cloopen.com';


        //请求端口，生产环境和沙盒环境一致
        $this->serverPort='8883';

        //REST版本号，在官网文档REST介绍中获得。

        $this->softVersion='2013-12-26';

        $phone = $request->input('name', '');
         // dd($phone);
        //设置验证码
        $yzm = '';
        $charset = '1234567890';
        $_len = strlen($charset) - 1;
        for ($i = 0;$i < 6;++$i) {
            $yzm .= $charset[mt_rand(0, $_len)];
        }
  // dd($yzm);
        session(['code'=>$yzm]);
        $this->sendTemplateSMS($phone,array($yzm,'60'),"1");

        // dd($send);
      // var_dump($send);

    }


    public function sendTemplateSMS($to,$datas,$tempId)
    {
         // 初始化CCPRestSDK
       // echo  111111111111;
         $accountSid = $this->accountSid;
         $accountToken = $this->accountToken;
         $appId = $this->appId;
         $serverIP = $this->serverIP;
         $serverPort = $this->serverPort;
         $softVersion = $this->softVersion;
         $rest = new CCPRestSDK($serverIP,$serverPort,$softVersion);
         $rest->setAccount($accountSid,$accountToken);
         $rest->setAppId($appId);

         // 发送模板短信
         echo "Sending TemplateSMS to $to <br/>";
         $result = $rest->sendTemplateSMS($to,$datas,$tempId);
         // dd($result);
         if($result == NULL ) {
             echo "result error!";
             return;
         }
         if($result->statusCode!=0) {
             echo "error code :" . $result->statusCode . "<br>";
             echo "error msg :" . $result->statusMsg . "<br>";
             //TODO 添加错误处理逻辑

         }else{
             echo "Sendind TemplateSMS success!<br/>";
             // 获取返回信息
             $smsmessage = $result->TemplateSMS;
             echo "dateCreated:".$smsmessage->dateCreated."<br/>";
             echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
             //TODO 添加成功处理逻辑

         }
    }

//==============手机注册===============================
    public function phoneRegister(Request $request)
    {
           // dd($request);
        // dd(session('code'));
        if ($request->pass != $request->repass) {
           return redirect('home/phone')->with('error','密码不一致,注册失败');
        }

        if ($request->yzm != session('code')) {
            return redirect('home/phone')->with('error', '验证码错误,请重新输入');
        }
          $arr = $request->only('phone','pass');
          $arr['pass']=Hash::make($request->input('pass',''));
          $id = DB::table('user')->insertGetId($arr);

        // $user = new User;
        // $user->phone = $request->input('phone');
        // // dd($user->phone);
        // $user->pass =Hash::make($request->input('pass',''));
        // $id = $user->save();
        if ($id) {
            return redirect('/')->with('msg', '注册成功,请登录');
        }


    }





}
