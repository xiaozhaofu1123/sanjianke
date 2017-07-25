<?php

/**
 * @Author: anchen
 * @Date:   2017-07-22 17:08:23
 * @Last Modified by:   anchen
 * @Last Modified time: 2017-07-22 17:25:29
 */
//操作日志
function insertlog($userid,$fun,$typename,$content)
{
    date_default_timezone_set('Asia/Shanghai');
    $addtime=date('Y-m-d H:i:s',time());
    $userIp=$_SERVER['REMOTE_ADDR'];
    // $log_content=$username->username.'操作'.$typename.','.'进行'.$modifytype.'操作';
    $list=DB::table('log')->insert(['userid'=>$userid,'addtime'=>$addtime,'typename'=>$typename,'content'=>$content,'fun'=>$fun,'ip'=>$userIp]);
}