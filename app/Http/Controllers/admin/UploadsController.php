<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

 // use App\Org\Image;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
class UploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.uploads.index');
    }

    public function doUploads(Request $request)
    {

        dd($request);
        //=================单图上传====================
        //判断是否有文件上传
        if ($request->hasFile('mypic')) {
            // dd($request);
            //判断文件是否有效
            if ($request->file('mypic')->isValid()) {
                //生成上传文件对象
                $file = $request->file('mypic');
                // dd($file);
                //获取上传的源文件的后缀名
                $ext = $file->getClientOriginalExtension();
                // dd($ext);
                //定义一个新的文件名
                $filename = time().rand(1000,9999).'.'.$ext;
                //执行上传,移动文件
                $file->move('./admin/upload', $filename);
                // dd($file->getError());
                if ($file->getError()>0) {
                    // return redirect('/uploads')->with('msg','上传失败');
                    echo '上传失败';
                }else{
                    // return reetdirect('/uploads')->with('msg','上传成功');
                    echo '上传成功';
                    echo "<img src='./admin/upload/{$filename}' width='200' height='200'>";
                }

            }
         }

        //=============多图片上传===============
        // $err = [];
        // if ($request->hasFile('mypic')) {
        //     $data = $request->file('mypic');
        //     for ($i=0; $i < count($data); $i++)
        //         {
        //            $ext =  $data[$i]->getClientOriginalExtension();
        //            $filename = time().rand(1000,9999).'.'.$ext;
        //            $data[$i]->move('./admin/upload', $filename);
        //            $orname = $data[$i]->getClientOriginalName();
        //            if ($data[$i]->getError()>0) {
        //                $err[]=$orname.'上传失败';
        //            }
        //         }
        //     }
        //     $str = implode(',', $err);
        //     if (count($err)>0) {
        //         return redirect('/uploads')->with('msg',$str);
        //     }else{
        //         return redirect('/uploads')->with('msg','上传成功');
        //     }

         // 1.使用自定义的类来进行图片的缩放

                 // $img = new Image();
                 // $img->open("./admin/upload/{$filename}");
                 // $img->thumb(400,400);
                 // $img->save("./admin/upload/s_{$filename}");

         $img = Image::make("./admin/upload/{$filename}");
        $img->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save("./admin/upload/s_{$filename}");

    }

}

