<?php

namespace App\Http\Controllers;

use App\Http\Requests\register;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //加入购物车
    public function cartadd(Request $request)
    {
        $goods_id=$request->goods_id;
        $user_id=session('user_id');
        $where=[
            'user_id'=>$user_id,
            'goods_id'=>$goods_id,
            'cart_status'=>1
        ];
        $data=DB::table('cart')->where($where)->first();
        $goodsInfo=DB::table('goods')->where(['goods_id'=>$goods_id])->first();

        if($data){
            //已添加到购物车
            $buy_number=$data->buy_number+1;
            $this->num($goodsInfo->goods_num,$buy_number);
            $num=[
                'buy_number'=>$buy_number
            ];
            $cartInfo=DB::table('cart')->update($num,$where);
            dd($cartInfo);
        }else{
            $this->num($goodsInfo->goods_num,1);
            $where['buy_number']=1;
            $cartInfo=DB::table('cart')->insert($where);
        }
        if($cartInfo){
            return 1;
        }else{
            return 2;
        }
    }

    public function num($goods_num,$cart_num)
    {
        if($cart_num>$goods_num){
            echo 3;die;
        }
    }

    //删除
    public function cartdel(Request $request)
    {

        $cart_id=$request->cart_id;
        $cart_id=explode('.',$cart_id);
        $res=DB::table('cart')->whereIn('cart_id',$cart_id)->update(['cart_status'=>2]);
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
    public function pay(Request $request){
        $cart_id=$request->cart_id;
        echo $cart_id;
    }

    public function payment($cart_id)
    {
        $cart_id=explode('.',$cart_id);
        $res=DB::table('cart')->whereIn('cart_id',$cart_id)->get();

        $goods_id=[];
        foreach ($res as $k=>$v){
            $goods_id[]=$v->goods_id;
        }
        session(['goods_id'=>$goods_id]);
        $goodsInfo=DB::table('cart')
            ->join('goods','cart.goods_id','=','goods.goods_id')
            ->whereIn('cart_id',$cart_id)
            ->get();
        session(['goodsInfo'=>$goodsInfo]);
        $buy_number=0;
        foreach ($goodsInfo as $k=>$v){
            $buy_number+=$v->self_price*$v->buy_number;

        }
        session(['buy_number'=>$buy_number]);
        return view('payment',['goodsInfo'=>$goodsInfo,'buy_number'=>$buy_number]);
    }

   public function aa(){
        dump(session('buy_number'));
   }

}

