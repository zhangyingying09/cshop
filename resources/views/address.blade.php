<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>地址管理</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('css/address.css')}}">
    <link rel="stylesheet" href="{{url('css/sm.css')}}">
</head>
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">地址管理</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="{{url('writeaddr')}}" class="m-index-icon">添加</a>
</div>
<div class="addr-wrapp">
    <div class="addr-list">
        <input type="hidden" id="_token" value="{{csrf_token()}}">
        @foreach($res as $v)
         <ul>
            <li class="clearfix">
                <span class="fl">{{$v->address_name}}</span>
                <span class="fr">{{$v->address_tel}}</span>
            </li>
            <li>
                <p>{{$v->area}}{{$v->address_desc}}</p>
            </li>
            <li class="a-set">
                @if($v->is_default==1)
                    <s class="z-set" style="margin-top: 6px;"></s>
                @else
                    <s class="z-defalt" style="margin-top: 6px;" ></s>
                @endif

                <span class="moren">设为默认</span>
                    <div class="fr" address_id="{{$v->address_id}}">
                <a href="{{url('editaddress')}}/{{$v->address_id}}"><span class="edit">编辑</span></a>
                    <span class="remove del" address_id={{$v->address_id}}>删除</span>
                    </div>
            </li>
        </ul>
            @endforeach
    </div>
</div>

<script src="{{url('js/zepto.js')}}" charset="utf-8"></script>
<script src="{{url('js/sm.js')}}"></script>
<script src="{{url('js/sm-extend.js')}}"></script>

<!-- 单选 -->
<script>
     // 删除地址
    // $(document).on('click','span.remove', function () {
    //     var buttons1 = [
    //         {
    //           text: '删除',
    //           bold: true,
    //           color: 'danger',
    //           onClick: function() {
    //             $.alert("您确定删除吗？");
    //           }
    //         }
    //       ];
    //       var buttons2 = [
    //         {
    //           text: '取消',
    //           bg: 'danger'
    //         }
    //       ];
    //       var groups = [buttons1, buttons2];
    //       $.actions(groups);
    // });
</script>
<script src="{{url('js/jquery-1.8.3.min.js')}}"></script>
<script>
    var $$=jQuery.noConflict();
    $$(document).ready(function(){
            // jquery相关代码
            $$('.addr-list .a-set s').toggle(
            function(){
                if($$(this).hasClass('z-set')){
                    
                }else{
                    $$(this).removeClass('z-defalt').addClass('z-set');
                    $$(this).parents('.addr-list').siblings('.addr-list').find('s').removeClass('z-set').addClass('z-defalt');
                }   
            },
            function(){
                if($$(this).hasClass('z-defalt')){
                    $$(this).removeClass('z-defalt').addClass('z-set');
                    $$(this).parents('.addr-list').siblings('.addr-list').find('s').removeClass('z-set').addClass('z-defalt');
                }
                
            }
        )

    });
    $(document).on('click','.moren', function () {
        var address_id=$(this).next('div').attr('address_id');

        var _token=$("#_token").val();
        $.post(
            '{{url('moren')}}',
            {address_id:address_id,_token:_token},
            function (res) {
                // console.log(res);
                if(res==1){
                    alert('设置成功');

                }else{
                    alert('设置失败');
                }
                history.go(0);
            }
        )
    })

    $(document).on('click','.del',function () {
        var address_id=$(this).attr('address_id');
        console.log(address_id);
        var _token=$('#_token').val();
        $.post(
            "{{url('del')}}",
            {address_id:address_id,_token:_token},
            function (res) {
                //console.log(res);
                if(res==1){
                    alert('删除成功');
                }else{
                    alert('删除失败');
                }
                history.go(0);
            }
        )
    })

    
</script>


</body>
</html>
