<?php

namespace App\Http\Controllers\home;

use App\Tool\Validate\ValidateCode;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tool\SMS\SendTemplateSMS;
use App\Models\TempPhone;
use App\Models\M3Result;
use App\Models\TempEmail;
use App\Models\User;

class ValidateController extends Controller
{
  public function create(Request $request)
  {
    $validateCode = new ValidateCode;
    $request->session()->put('validate_code', $validateCode->getCode());
    return $validateCode->doimg();
  }

  public function sendSMS(Request $request)
  {
    $m3_result = new M3Result;

    $phone = $request->input('phone', '');
    if($phone == '') {
      $m3_result->status = 1;
      $m3_result->message = '手机号不能为空';
      return $m3_result->toJson();
    }
    if(strlen($phone) != 11 || $phone[0] != '1') {
      $m3_result->status = 2;
      $m3_result->message = '手机格式不正确';
      return $m3_result->toJson();
    }

    $sendTemplateSMS = new SendTemplateSMS;
    $code = '';
    $charset = '1234567890';
    $_len = strlen($charset) - 1;
    for ($i = 0;$i < 6;++$i) {
        $code .= $charset[mt_rand(0, $_len)];
    }
    $m3_result = $sendTemplateSMS->sendTemplateSMS($phone, array($code, 60), 1);
    if($m3_result->status == 0) {
      $tempPhone = TempPhone::where('phone', $phone)->first();
      if($tempPhone == null) {
        $tempPhone = new TempPhone;
      }
      $tempPhone->phone = $phone;
      $tempPhone->code = $code;
      $tempPhone->deadline = date('Y-m-d H-i-s', time() + 60*60);
      $tempPhone->save();
    }

    return $m3_result->toJson();
  }
//================邮箱验证===========================
  public function validateEmail(Request $request)
  {
    $uid = $request->input('uid', '');
    $code = $request->input('code', '');
    if($uid == '' || $code == '') {
      return '验证异常';
    }

    $tempEmail = TempEmail::where('uid', $uid)->first();
    if($tempEmail == null) {
      return '验证异常';
    }

    if($tempEmail->code == $code) {
      if(time() > strtotime($tempEmail->timeline)) {
        return '该链接已失效';
      }

      $user = User::find($uid);
      $user->active = 1;
      $user->save();

      return redirect('/')->with('msg', '验证成功,请登录');
    } else {
      return '该链接已失效';
    }
  }
}
