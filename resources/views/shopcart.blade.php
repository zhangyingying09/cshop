@extends('master')
@section('title')
    购物车
@endsection
@section('content')
    <input name="hidUserID" type="hidden" id="hidUserID" value="-1" />
    <input type="hidden" id="_token" value="{{csrf_token()}}">
    <div>
        <!--首页头部-->
        <div class="m-block-header">
            <a href="/" class="m-public-icon m-1yyg-icon"></a>
            <a href="/" class="m-index-icon">编辑</a>
        </div>
        <!--首页头部 end-->
        <div class="g-Cart-list">
            <ul id="cartBody">
                @foreach($res as $v)
                    <li>
                        <s class="xuan current" ></s>
                        <a class="fl u-Cart-img" href="#，">
                            <img src="{{url('images/goodsLogo/'.$v->goods_img)}}" border="0" alt="">
                        </a>
                        <div class="u-Cart-r" cart_id="{{$v->cart_id}}">
                            <a href="{{url('shopcontent')}}/{{$v->goods_id}}" class="gray6">{{$v->goods_name}}</a>
                            <span class="gray9">
                                <em>剩余{{$v->goods_num}}件</em>
                                <em class="self">单价<a class="self_price" self_price="{{$v->self_price}}">{{$v->self_price}}</a>元</em>
                            </span>
                            <div class="num-opt">
                                <em class="num-mius dis min"><i></i></em>
                                <input class="text_box" name="num" maxlength="6" type="text" value="{{$v->buy_number}}" codeid="12501977">
                                <em class="num-add add"><i></i></em>
                            </div>
                            <a href="javascript:;" name="delLink" cid="12501977" isover="0" class="z-del"><s></s></a>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div id="divNone" class="empty "  style="display: none"><s></s><p>您的购物车还是空的哦~</p><a href="https://m.1yyg.com" class="orangeBtn">立即潮购</a></div>
        </div>
        <div id="mycartpay" class="g-Total-bt g-car-new" style="">
            <dl>
                <dt class="gray6">
                    <s class="quanxuan current"></s>全选
                    <p class="money-total">合计<em class="orange total"><span>￥</span></em></p>
                    
                </dt>
                <dd>
                    <a href="javascript:;" id="a_payment" class="orangeBtn w_account remove">删除</a>
                    <a href="#" id="a_payment" class="orangeBtn w_account order">去结算</a>
                </dd>
            </dl>
        </div>
@endsection
{{--<!---商品加减算总数---->--}}
@section('my-js')
    <script>
        //删除
        $(document).on('click',".z-del",function () {
            var cart_id=$(this).parents().attr('cart_id');
            //console.log(cart_id);
            var _token=$("#_token").val();
            $.post(
                '{{url('cartdel')}}',
                {cart_id:cart_id,_token:_token},
                function (res){
                    console.log(res)
                    if(res==1){
                        alert('删除成功');
                        history.go(0)
                    }else if(res==2){
                        alert('删除失败');
                    }
                }
            )
        })
        $('.remove').click(function () {
            var cart_id='';
            $(".xuan").each(function () {
                if($(this).attr('class')=='xuan current'){
                    cart_id+=$(this).siblings("div[class='u-Cart-r']").attr('cart_id')+'.';
                }
            });
            if(cart_id==''){
                alert('请至少选择一个商品');
                location.href="shopcart"
            }
            cart_id=cart_id.substr(0,cart_id.length-1);
            var _token=$("#_token").val();
            $.post(
                '{{url('cartdel')}}',
                {cart_id:cart_id,_token:_token},
                function (res){
                    if(res==1){
                        alert('删除成功');
                        location.href="{{url('shopcart')}}"
                    }else if(res==2){
                        alert('删除失败');
                    }
                }
            )
        })

        //下导航显示颜色
        $("#btnCart").addClass('hover');
        $("#btnCart").parent('li').siblings('li').children('a').removeClass('hover');
    $(function () {
        $(".add").click(function () {
            var t = $(this).prev();
            t.val(parseInt(t.val()) + 1);
            GetCount();
        })
        $(".min").click(function () {
            var t = $(this).next();
            if(t.val()>1){
                t.val(parseInt(t.val()) - 1);
                GetCount();
            }
        })
    })

    // 全选        
    $(".quanxuan").click(function () {
        if($(this).hasClass('current')){
            $(this).removeClass('current');

             $(".g-Cart-list .xuan").each(function () {
                if ($(this).hasClass("current")) {
                    $(this).removeClass("current"); 
                } else {
                    $(this).addClass("current");
                } 
            });
            GetCount();
        }else{
            $(this).addClass('current');

             $(".g-Cart-list .xuan").each(function () {
                $(this).addClass("current");
                // $(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
            });
            GetCount();
        }
        
        
    });
    // 单选
    $(".g-Cart-list .xuan").click(function () {
        if($(this).hasClass('current')){
            

            $(this).removeClass('current');

        }else{
            $(this).addClass('current');
        }
        if($('.g-Cart-list .xuan.current').length==$('#cartBody li').length){
                $('.quanxuan').addClass('current');

            }else{
                $('.quanxuan').removeClass('current');
            }
        // $("#total2").html() = GetCount($(this));
        GetCount();
        //alert(conts);
    });
  // 已选中的总额
    function GetCount() {
        var conts = 0;
        var aa = 0; 
        $(".g-Cart-list .xuan").each(function () {
            if ($(this).hasClass("current")) {
                for (var i = 0; i < $(this).length; i++) {
                    conts += parseInt($(this).parents('li').find('input.text_box').val());
                    // aa += 1;
                }
            }
        });
        
         $(".total").html('<span>￥</span>'+(conts).toFixed(2));
    }
    GetCount();

        function GetCount() {
            var conts = 0;
            var aa = 0;
            $(".xuan").each(function () {
                if($(this).attr('class')=='xuan current'){
                    var self_price=$(this).siblings("div[class='u-Cart-r']").find("a[class='self_price']").attr('self_price');
                    var buy_number=$(this).siblings("div[class='u-Cart-r']").find("input[class='text_box']").val();
                    conts+=parseInt(self_price)*parseInt(buy_number);
                }
            });
            $(".total").html('<span>￥</span>'+(conts).toFixed(2));
        }

        $('.order').click(function () {
            var cart_id='';
            $('.xuan').each(function () {
                if($(this).attr('class')=='xuan current'){
                    cart_id+=$(this).siblings("div[class='u-Cart-r']").attr('cart_id')+'.'
                }
            })
            cart_id=cart_id.substr(0,cart_id.length-1);
            var _token=$("#_token").val();
            if(cart_id==''){
                alert('请至少选择一个商品');
                location.href="shopcart"
            }
            $.post(
                '{{url('pay')}}',
                {cart_id:cart_id,_token:_token},
                function (res) {
                    console.log(res);
                    location.href="{{url('payment')}}"+'/'+res;
                }
            )
            //console.log(cart_id)
        })
</script>
    </div>
@endsection