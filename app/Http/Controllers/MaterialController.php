<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Weixin;
use Illuminate\Support\Facades\Storage;
use CURLFile;

class MaterialController extends Controller
{
    public function index()
    {
        return view('wechat.index');
    }
    public function uploadFile(Request $request)
    {
        //接收文件
        $file=$request->material;
        //获取文件类型
        $data=$file->getClientMimeType();

        //获取文件的后缀名
        $ext=$file->getClientOrginalExtension();
        //获取临时文件位置
        $path=$file->getRealPath();
        //上传后的文件名称
        $newfilename=date('Ymd')."/".mt_rand(1111,9999).".".$ext;
        //上传
        $re= Storage::disk('uploads')->put($newfilename,file_get_contents($path));

        if($re){
            $token=Weixin::GetAccessToken();
            $type=Weixin::getType($data);
            $imgpath=public_path().'/uploads/'.$newfilename;
            $url="https://api.weixin.qq.com/cgi-bin/media/upload?access_token=$token&type=$type";
            $data=['media'=>new CURLFile(realpath($imgpath))];
            $re=Weixin::HttpsPost($url,$data);
            var_dump($re);
        }else{
            die('失败');
        }


        // $url= "https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE";
    }
}