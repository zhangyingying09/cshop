<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>订单详情</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('css/buyrecord.css')}}" rel="stylesheet" type="text/css">
    <script src="{{url('js/jquery-1.8.3.min.js')}}"></script>
</head>
<body>
    
    <!--触屏版内页头部-->
    <div class="m-block-header" id="div-header">
        <strong id="m-title">订单详情</strong>
        <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
        <a href="/" class="m-index-icon"></a>
    </div>
    <div class="status">
        <img src="images/yifahuo.png" alt="">
    </div>
    <div class="userinfo">
        <div class="express-status">
            <i></i><span>已成功提交确认收货地址</span><s class="fr"></s>
        </div>
        <div class="express-bottom">
            <ul class="clearfix">
                <li class="position"><s></s></li>
                <li class="info">
                    <div class="clearfix">
                        <span class="user fl">收货人：{{$info['address_name']}}</span>
                        <span class="tel fr">联系电话：{{$info['address_tel']}}</span>
                    </div>
                    <div class="clearfix">
                        <span class="user fl">详细地址：{{$info['address_desc']}}</span>
                        <span class="tel fr">订单号：{{$trade_no}}</span>
                    </div>

                </li>

            </ul>
        </div>
    </div>


    @foreach($goodsInfo as $k=>$v)
    <div class="getshop">
        <div class="shopsimg fl">
            <img src="{{url('images/goodsLogo/'.$v->goods_img)}}" alt="">
        </div>

        <div class="shopsinfo">
            <h3>{{$v->goods_name}}</h3>
            <p class="price">价值：￥<i>{{$v->self_price}}</i></p>
        </div>
        @endforeach
        <div class="hot-line">
            <i></i><span>客服热线：400-666-2110</span>
        </div>
    </div>

</body>
</html>
