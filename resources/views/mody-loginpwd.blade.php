<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>修改支付密码</title>
<meta content="app-id=984819816" name="apple-itunes-app" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta content="telephone=no" name="format-detection" />
<link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('css/login.css')}}" rel="stylesheet" type="text/css" />
<link href="{{url('css/findpwd.css')}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{url('layui/css/layui.css')}}">
<link rel="stylesheet" href="{{url('css/modipwd.css')}}">
<script src="{{url('js/jquery-1.11.2.min.js')}}"></script>
</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">修改登录密码</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
</div>


<div class="wrapper">
    <form class="layui-form" action="">
        <input type="hidden" name="_token"  value="{{csrf_token()}}">
        <div class="registerCon regwrapp">
            <div class="account">
                <em>账户名：</em> <i>{{session('user_name')}}</i>
            </div>
            <div><em>当前密码</em><input type="password" name="user_pwd"></div>
            <div><em>新密码</em><input type="password" name="new_pwd1" placeholder="请输入6-16位数字、字母组成的新密码"></div>
            <div><em>确认新密码</em><input type="password"  name="new_pwd2" placeholder="确认新密码"></div>
            <div class="save"><span lay-submit="" lay-filter="*">保存</span></div>
        </div>
    </form>
</div>
<script src="{{url('layui/layui.js')}}"></script>
    <script>
        //Demo
        layui.use(['layer','form'], function(){
            var form = layui.form();
            var layer =layui.layer;
            //监听提交
            form.on('submit(*)', function(data){

                $.post(
                    "{{url('editpwd')}}",
                    data.field,
                    function (res) {
                        if(res==1){
                            alert('修改成功');
                            location.href="{{url('login')}}"
                        }else{
                            layer.msg(res,{icon:2});
                        }
                    }
                );
                return false;
            });
        });

    </script>