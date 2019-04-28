<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{

    public function ordersend()
    {
        $user_id=session('user_id');
        $info=session('data');
        $goods_ids=session('goods_id');
        $goodsInfo=session('goodsInfo');
        $trade_no=session('trade_no');
        return view('order-send',['info'=>$info,'goodsInfo'=>$goodsInfo,'trade_no'=>$trade_no]);
    }

    public function ordersupply()
    {
        return view('order-supplyment');
    }


}
