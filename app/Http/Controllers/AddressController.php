<?php

namespace App\Http\Controllers;

use App\Http\Requests\register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    //收货地址
    public function address()
    {
        $where=[
            'address_status'=>1,
            'user_id'=>session('user_id')
        ];
        $res=DB::table('address')->where($where)->get();

        return view('address',['res'=>$res]);
    }
    //添加地址
    public function writeaddr()
    {

        return view('writeaddr');
    }
    //删除
    public function del(Request $request)
    {
        $address_id=$request->address_id;
        $where=[
            'address_id'=>$address_id,
            'address_status'=>1
        ];
        $res=DB::table('address')->where($where)->update(['address_status'=>2]);
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
    //修改地址
    public function editaddress($address_id)
    {

        $where=[
            'address_id'=>$address_id
        ];
        $res=DB::table('address')->where($where)->first();
        return view('editaddress',['res'=>$res]);
    }
    //修改执行
    public function editdo(Request $request)
    {
        $data=$request->all();
        $address_id=$data['address_id'];
        unset($data['_token']);
        $user_id=session('user_id');
        if($data['address_name']==''){
            return '姓名不能为空'; die;
        }
        if($data['address_tel']==''){
            return '电话不能为空';die;
        }
        if($data['area']==''){
            return '所在区域不能为空';die;
        }
        if($data['address_desc']==''){
            return '详细不能为空';die;
        }
        $data['user_id']=$user_id;
       if($data['is_default']==2){
           $res=DB::table('address')->where(['address_id'=>$address_id])->update($data);
           if($res){
               return  '修改成功';
           }else{
               return '修改失败';
           }
       }else{
           $arr=DB::table('address')->where(['user_id'=>$user_id])->update(['is_default'=>2]);
           $res=DB::table('address')->where(['address_id'=>$address_id])->update($data);
           if($arr!==false&&$res){
               return '修改成功';
           }else{
               return  '修改失败';
           }
       }
    }
    public function addressadd(Request $request)
    {
        $data=$request->all();
        unset($data['_token']);
        $user_id=session('user_id');
        if($data['address_name']==''){
            return '姓名不能为空'; die;
        }
        if($data['address_tel']==''){
            return '电话不能为空';die;
        }
        if($data['area']==''){
            return '所在区域不能为空';die;
        }
        if($data['address_desc']==''){
            return '详细不能为空';die;
        }
        $data['user_id']=$user_id;
//        var_dump($data);die;
        session(['data'=>$data]);
        if($data['is_default']==1){
            $data['is_default']=1;
            $arr=DB::table('address')->where(['user_id'=>$user_id])->update(['is_default'=>2]);
            $res=DB::table('address')->insert($data);
            if($arr!==false&&$res){
                return '添加成功';
            }else{
                return  '添加失败';
            }
        }else{
            $data['is_default']=2;
            $res=DB::table('address')->insert($data);
            if($res){
                return  '添加成功';
            }else{
                return '添加失败';
            }
        }
    }

    public function moren(Request $request)
    {
        $address_id=$request->address_id;
        $user_id=session('user_id');
        $where=[
            'address_id'=>$address_id,
            'user_id'=>$user_id
        ];
        $arr=DB::table('address')->where(['user_id'=>$user_id])->update(['is_default'=>2]);
        $res=DB::table('address')->where($where)->update(['is_default'=>1]);
        if($arr&&$res){
            return 1;
        }else{
            return 2;
        }
    }

}
