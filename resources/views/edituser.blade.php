<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>编辑个人资料</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/mywallet.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">编辑个人资料</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
</div>

    <div class="wallet-con">
        <div class="w-item">
            <ul class="w-content clearfix">
                <li class="headimg">
                    <a href="">头像</a>
                    <s class="fr"></s>
                    <span class="img fr"></span>
                </li>
                <li>
                    <a href="{{url('rename')}}">昵称</a>
                    <s class="fr"></s>
                    <span class="fr">{{session('user_name')}}</span>
                </li>
                <li>
                    <a href="">我的主页</a>
                    <s class="fr"></s>
                </li>
                <li>
                    <a href="">手机号码</a>
                    <span class="fr">400-666-2110</span>
                </li>           
            </ul>     
        </div>
        <div class="quit">
            <a href="{{url('edit')}}">退出登录</a>
        </div>
    </div>

<div class="footer clearfix">
    <ul>
        <li class="f_home"><a href="{{url('../')}}"  id="f_home"><i></i>潮购</a></li>
        <li class="f_announced"><a href="{{url('allshops')}}" id="f_announced"><i></i>所有商品</a></li>
        <li class="f_single"><a href="{{url('share')}}" ><i></i>晒单</a></li>
        <li class="f_car"><a id="btnCart" href="{{url('shopcart')}}"><i></i>购物车</a></li>
        <li class="f_personal"><a href="{{url('userpage')}}"  id="f_personal"><i></i>我的潮购</a></li>
    </ul>
</div>
<script src="{{url('js/jquery-1.11.2.min.js')}}"></script>
</body>
</html>
