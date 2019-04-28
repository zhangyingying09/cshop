<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Weixin extends Model
{
    //
    public static function HttpsPost($url,$post_datas)
    {
        //1、初始化
        $curl = curl_init();
        //2、设置选项，包括URL
        curl_setopt($curl, CURLOPT_URL, $url);
        //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //启动时会将头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置为post
        curl_setopt($curl, CURLOPT_POST, 1);
        //把post的变量加上
        curl_setopt($curl, CURLOPT_POSTFIELDS,$post_datas);
        //3、执行并获取HTML文档内容
        $data=curl_exec($curl);
        //4、释放句柄
        curl_close($curl);
        return $data;

    }
    /*
      * @content 获取要获取天气的城市
      * @params $str string  用户输入的含有城市名称的字符串
      *
      * */
    public static function getCityName($str)
    {
        //第一种方式 截取
        //$city = substr($str,0,strpos($str,'天气'));
        //第二种方式 通过数组获取

        $arr = explode('天气',$str);
        $city = $arr[0];

        return $city;
    }

    /*
   * @content 通过城市名称获取天气
   * @params $city string 城市名称
   * */
    public static function getCityWether($city)
    {
        $url = "http://api.k780.com/?app=weather.today&weaid=$city&appkey=15936&sign=78701394ee7d3718a88a7d17038d1e3c&format=json";

        $data = file_get_contents($url);
        $data = json_decode($data,true);
        $code = $data['success'];

        if($code){
            $result = $data['result'];
            $str = "今天是:".$result['days']."日".$result['week']."\r\n";
            $str .= "天气:".$result['weather']."\r\n";
            $str .= "最高气温:".$result['temp_high']."度\r\n";
            $str .= "最低气温:".$result['temp_low']."度\r\n";
            $str .= $result['wind'].$result['winp'];
        }else{
            $str = "你是火星来的吗，地球上没有这个";
        }


        return $str;

    }

    public  static function createAccessToken()
    {
        $appid=env('WXAPPID');
        $appsecret=env('WXAPPSECRET');
        $token_url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
        $re=file_get_contents($token_url);
        $token=json_decode($re,true)['access_token'];
        return $token;
    }
public static function GetAccessToken()
{
    /*
     * 读取文件，看有没有 ，有的话读取，没有的话创建
     * 看看token是否过期，没有获取，有的话 生成
     */
    //定义文件路径
    $filepath=public_path()."/wechat/token.txt";
    //文件内容读取
    $fileinfo=file_get_contents($filepath);
    //判断
    if(!empty($fileinfo)){
        $data=json_decode($fileinfo,true);
        $expire=$data['expire'];
        if(time()>$expire){
            $token=self::createAccessToken();
            $time=time()+7100;
            $arr=[
                'token'=>$token,
                'expire'=>$time,
            ];
            $content=json_encode($arr,JSON_UNESCAPED_UNICODE);
            file_put_contents($filepath,$content);
        }else{
            $token=$data['token'];
        }
    }else{
        $token=self::createAccessToken();
        $time=time()+7100;
        $arr=[
            'token'=>$token,
            'expire'=>$time,
        ];
        $content=json_encode($arr,JSON_UNESCAPED_UNICODE);
        file_put_contents($filepath,$content);
    }
    return $token;
}

    public static function getType($str)
    {
        $arr=explode('/',$str);
        $ty=$arr[0];
        $allow_type=[
            'image'=>'image',
            'audio'=>'voice',
            'video'=>'video'
        ];
        return $allow_type[$ty];
    }

}

