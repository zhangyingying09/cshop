<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Common;

use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //登录
    public function login()
    {
        return view('login');
    }
    //登录
    public function loginDo(Request $request)
    {
        $usermodel=new User;
        if(empty($request->txtAccount)){
            echo json_encode(['font'=>'账户不能为空', 'code'=>2]);exit;
        }
        if(empty($request->txtPassword)){
            echo json_encode(['font'=>'密码不能为空', 'code'=>2]);exit;
        }
        $verifycode=session('verifycode');
        $code=$request->verifycode;
        if($verifycode!=$code){
            echo json_encode(['font'=>'验证码错误', 'code'=>2]);exit;
        }
        $where=[
            'user_name'=>$request->txtAccount
        ];
        $data=$usermodel->where($where)->first();
        if(!empty($data)){
            if(decrypt($data->user_pwd)==$request->txtPassword){
                // 存储数据到 session...
                session(['user_id' =>$data->user_id,'user_name'=>$data->user_name]);
                echo json_encode(['font'=>'登陆成功', 'code'=>1]);
            }else{
                echo json_encode(['font'=>'账号密码错误', 'code'=>2]);exit;
            }
        }else{
            echo json_encode(['font'=>'账号密码错误', 'code'=>2]);exit;
        }
    }
    //注册
    public function register()
    {
        return view('register');
    }

    public function regdo(Request $request)
    {
        $user_name=$request->user_name;
        $verifycode=$request->verifycode;
        $code=session('code');
        if($verifycode!=$code){
            return 4;exit;
        }
        $pwd=$request->pwd;
        $where=[
            'user_name'=>$user_name
        ];
        $usermodel=new User;
        $res=$usermodel->where($where)->first();
        if($res){
            return 1;
            //用户名已存在
        }else{
            $arr=$request->all();
            unset($arr['verifycode']);
            unset($arr['_token']);
            $arr['user_pwd']=encrypt($arr['user_pwd']);
            $data=$usermodel->insert($arr);
            if($data){
                return 2;
                //注册成功
            }else{
                return 3;
                //注册失败
            }
        }
    }
    //发送短信验证码
    public function code(Request $request)
    {
        $tel=$request->reg_tel;
        $code=rand(1000,9999);
        session(['code'=>$code]);
        $this->sendMobile($code,$tel);
    }
    //验证码
    public function regauth()
    {
        return view('regauth');
    }
    /*
     * @content 发送手机验证码
     * @params  $mobile  要发送的手机号
     *
     * */
    private function sendMobile($code,$mobile)
    {
        $host = env("MOBILE_HOST");
        $path = env("MOBILE_PATH");
        $method = "POST";
        $appcode = env("MOBILE_APPCODE");
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "content=【创信】你的验证码是：".$code."，3分钟内有效！&mobile=".$mobile;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        var_dump(curl_exec($curl));
    }

    public function edituser()
    {
        return view('edituser');
    }

    //退出
    public function edit()
    {
        session(['user_id'=>null]);
        return redirect('login');
    }
    //潮购记录
    public function buyrecord()
    {
        return view('buyrecord');
    }

    public function mywallet()
    {
        return view('mywallet');
    }

    public function sharedetail()
    {
        return view('sharedetail');
    }

    public function willshare()
    {
        return view('willshare');
    }

    public function set()
    {
        return view('set');
    }

    public function invite()
    {
        return view('invite');
    }

    public function safeset()
    {
        return view('safeset');
    }

    public function resetpassword()
    {
        return view('resetpassword');
    }

    public function loginpwd()
    {
        return view('mody-loginpwd');
    }

    public function rename()
    {
        return view('nicknamemodify');
    }

    //修改密码
    public function editpwd(Request $request)
    {
        $user_id=session('user_id');
        if(empty($user_id)){
            return '请先登录再试';die;//请先登录再试
        }
        $data=$request->all();
        $user_pwd=$data['user_pwd'];
        if(empty($user_pwd)){
            return '当前密码不能为空';die;//请先登录再试
        }
        $new_pwd1=$data['new_pwd1'];
        $new_pwd2=$data['new_pwd2'];
        if(empty($new_pwd1)){
            return '新密码不能为空';die;//请先登录再试
        }else if($new_pwd1!=$new_pwd2){
            return '确认密码一致';die;//请先登录再试
        }

        $res=DB::table('user')->where(['user_id'=>$user_id])->first();
        if($res){
            if(decrypt($res->user_pwd)==$user_pwd){
                $new_pwd1=encrypt($new_pwd1);
                $arr=DB::table('user')->where(['user_id'=>$user_id])->update(['user_pwd'=>$new_pwd1]);

                if($arr){
                    $arr2=session(['user_id'=>null]);
                    $arr3=session(['user_name'=>null]);
                    return 1;
                }else{
                    return '修改失败';
                }
            }else{
                return '当前密码错误';die;
            }
        }else{
            return '请先登录';die;
        }
    }

}
