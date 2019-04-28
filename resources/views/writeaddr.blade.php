<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>填写收货地址</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('css/writeaddr.css')}}">
    <link rel="stylesheet" href="{{url('layui/css/layui.css')}}">
    <link rel="stylesheet" href="{{url('dist/css/LArea.css')}}">
</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">填写收货地址</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="javascript:;" class="m-index-icon">保存</a>
</div>
<div class=""></div>
<!-- <form class="layui-form" action="">
  <input type="checkbox" name="xxx" lay-skin="switch">
</form> -->
<form class="layui-form" action="">
    <div class="addrcon">
        <ul>
            <li><em>收货人</em><input type="text" name="address_name" id="address_name" placeholder="请填写真实姓名"></li>
            <li><em>手机号码</em><input type="number" name="address_tel" id="address_tel" placeholder="请输入手机号"></li>
            <li><em>所在区域</em><input id="demo1" type="text"  name="area" placeholder="请选择所在区域"></li>
            <li class="addr-detail"><em>详细地址</em><input type="text" placeholder="20个字以内" name="address_desc" id="address_desc" class="addr"></li>
        </ul>
        <div class="setnormal"><span>设为默认地址</span>
            <input type="checkbox" id="is_default" name="xxx" lay-skin="switch">
        </div>
    </div>
    <input type="hidden" id="_token" value="{{csrf_token()}}">
</form>

<!-- SUI mobile -->
<script src="{{url('dist/js/LArea.js')}}"></script>
<script src="{{url('dist/js/LAreaData1.js')}}"></script>
<script src="{{url('dist/js/LAreaData2.js')}}"></script>
<script src="{{url('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('layui/layui.js')}}"></script>

<script>
  //Demo
layui.use('form', function(){
  var form = layui.form();

    //添加
    $('.m-index-icon').click(function () {
        var address_name=$("#address_name").val();
        var address_tel=$("#address_tel").val();
        var area=$("#demo1").val();
        var address_desc=$("#address_desc").val();
        var is_default=$("#is_default").prop('checked');
        var _token=$("#_token").val();
        if(is_default==true){
            is_default=1
        }else if (is_default==false) {
            is_default=2
        }
        $.post(
            '{{url('addressadd')}}',
            {_token:_token,address_name:address_name,address_tel:address_tel,area:area,address_desc:address_desc,is_default:is_default},
            function (res) {
                 console.log(res)
                if(res=='添加成功'){
                    layer.msg('添加成功',{icon:1});
                    location.href="{{url('address')}}";
                }else{
                    layer.msg(res,{icon:2});
                }
            }
        )
    });
  //监听提交
  form.on('submit(formDemo)', function(data){
    layer.msg(JSON.stringify(data.field));
    return false;
  });
});
var area = new LArea();
area.init({
    'trigger': '#demo1',//触发选择控件的文本框，同时选择完毕后name属性输出到该位置
    'valueTo':'#value1',//选择完毕后id属性输出到该位置
    'keys':{id:'id',name:'name'},//绑定数据源相关字段 id对应valueTo的value属性输出 name对应trigger的value属性输出
    'type':1,//数据源类型
    'data':LAreaData//数据源
});

</script>

</body>
</html>
