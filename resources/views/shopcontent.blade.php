<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>商品详情</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="{{url('css/comm.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/goods.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('css/fsgallery.css')}}" rel="stylesheet" charset="utf-8">
    <link rel="stylesheet" href="{{url('css/swiper.min.css')}}">
    <style>
        .Countdown-con {padding: 4px 15px 0px;}
    </style>
</head>
<body fnav="2" class="g-acc-bg">
    <div class="page-group">
        <div id="page-photo-browser" class="page">
            <input type="hidden" id="_token" value="{{csrf_token()}}">
            <!--触屏版内页头部-->
        <div class="m-block-header" id="div-header">
            <strong id="m-title">商品详情</strong>
            <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
            <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
        </div>

                <!-- 焦点图 -->
                <div class="hotimg-wrapper">
                    <div class="hotimg-top"></div>
                    <section id="gallery" class="hotimg">
                        <ul class="slides" style="width: 600%; transition-duration: 0.4s; transform: translate3d(-828px, 0px, 0px);">
                            @foreach($goods['goods_imgs'] as $v)
                            <li style="width: 414px; float: left; display: block;" class="clone">
                                <a href="javascript:;">
                                    <img src="{{url('images/goodsLogo/'.$v)}}" alt="">
                                </a>
                            </li>
                                @endforeach
                        </ul>
                    </section>
                </div>
                <!-- 产品信息 -->
                <div class="pro_info">
                    <h2 class="gray6">
                        {{$goods['goods_name']}}
                    </h2>
                    <div class="purchase-txt gray9 clearfix">
                        价值：￥{{$goods['self_price']}}
                    </div>
                    <div class="clearfix">
                        
                        <div class="gRate">
                            <div class="Progress-bar">
                                <p class="u-progress" title="已完成90%">
                                    <span class="pgbar" style="width:90%;">
                                        <span class="pging"></span>
                                    </span>
                                </p>
                                <ul class="Pro-bar-li">
                                    <li class="P-bar01"><em>27</em>已参与</li>
                                    <li class="P-bar02"><em>30</em>总需人次</li>
                                    <li class="P-bar03"><em>{{$goods['goods_num']}}</em>剩余</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--本商品已结束-->
                    
                </div>
                <!--揭晓倒计时-->
                <div id="divLotteryTime" class="Countdown-con">
                    <p class="declare">声明：所有商品及活动均与苹果公司（Apple Inc）无关。</p>
                    <div class="state">
                        <em></em>
                        <span>我已阅读《潮购声明》</span>
                    </div>
                    <div class="guide">您还没有参与哦，试试吧！</div>
                </div>
                <div class="imgdetail">
                    <div class="ann_btn">
                        <a href="">图文详情<s class="fr"></s></a>
                    </div>
                </div>
                <div class="listtab tabs clearfix">
                    <a href="javascript:;" class="active">参与记录</a>
                    <a href="javascript:;">历史获得者</a>
                </div>

              

                <div class="ann_btn partcon" id="tabs-container">
                    <div class="swiper-wrapper">
                        <div class="record-wrapp swiper-slide">
                             <!--所有参与记录-->
                            <div class="part-record">
                                <div class="ann_list">
                                    <div class="fl">
                                        <img src="images/goods2.jpg" alt="">
                                    </div>
                                    <div class="fl">
                                        <h3>被小冉</h3>
                                        <p>2017-06-25 15:38:12:645</p>
                                    </div>
                                    <div class="fr people-num">
                                        <span>16人次</span><s class="fr"></s>
                                    </div>
                                </div>  
                                <div class="ann_list">
                                    <div class="fl">
                                        <img src="images/goods2.jpg" alt="">
                                    </div>
                                    <div class="fl">
                                        <h3>被小冉</h3>
                                        <p>2017-06-25 15:38:12:645</p>
                                    </div>
                                    <div class="fr people-num">
                                        <span>16人次</span><s class="fr"></s>
                                    </div>
                                </div>      
                                <div class="ann_list">
                                    <div class="fl">
                                        <img src="images/goods2.jpg" alt="">
                                    </div>
                                    <div class="fl">
                                        <h3>被小冉</h3>
                                        <p>2017-06-25 15:38:12:645</p>
                                    </div>
                                    <div class="fr people-num">
                                        <span>16人次</span><s class="fr"></s>
                                    </div>
                                </div>  
                                <div class="ann_list">
                                    <div class="fl">
                                        <img src="images/goods2.jpg" alt="">
                                    </div>
                                    <div class="fl">
                                        <h3>被小冉</h3>
                                        <p>2017-06-25 15:38:12:645</p>
                                    </div>
                                    <div class="fr people-num">
                                        <span>16人次</span><s class="fr"></s>
                                    </div>
                                </div>     
                            </div>
                            <!-- 无内容时显示 -->
                            <div class="nocontent" style="display: none">
                                <div class="m_buylist m_get">
                                    <ul id="ul_list">
                                        <div class="noRecords colorbbb clearfix">
                                            <s class="default"></s>您还没有参与记录哦~
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--历史获得者 -->
                        <div class="history-winwrapp mb48 swiper-slide">
                            <div class="history-win">
                                <div class="win-list clearfix">
                                    <div class="win-left fl">
                                        <p class="chao">第2779潮购</p>
                                        <img src="images/goods2.jpg" alt="">
                                    </div>
                                    <div class="win-right fl">
                                        <p class="show-time">揭晓时间:2017-06-28 15:16:46:000</p>
                                        <p class="winner">获得者：<i>穿越狂信者</i></p>
                                        <p class="show-count">本潮购参与：1480人次</p>
                                        <p class="show-code">幸运潮购码：10003664</p>
                                    </div>
                                </div>
                                <div class="win-list clearfix">
                                    <div class="win-left fl">
                                        <p class="chao">第2779潮购</p>
                                        <img src="images/goods2.jpg" alt="">
                                    </div>
                                    <div class="win-right fl">
                                        <p class="show-time">揭晓时间: <i>2017-06-28 15:16:46:000</i></p>
                                        <p class="winner">获得者：<i>穿越狂信者</i></p>
                                        <p class="show-count">本潮购参与：<i>1480</i>人次</p>
                                        <p class="show-code">幸运潮购码：<i>10003664</i></p>
                                    </div>
                                </div>
                            </div>
                            <!-- 无内容时显示 -->
                            <div class="nocontent" style="display: none">
                                <div class="m_buylist m_get">
                                    <ul id="ul_list">
                                        <div class="noRecords colorbbb clearfix">
                                            <s class="default"></s>您还没有参与记录哦~
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>     
                             
                    </div>
                    
                </div>
                           
                <div class="pro_foot"> 
                        <a href="" class="">第10364潮正在进行中<span class="dotting"></span></a>
                        <a href="" class="shopping">立即参与</a>
                        <span href="" class="fr cartadd" goods_id="{{$goods['goods_id']}}"><i><b num="1">1</b></i></span>
                </div>
            </div>
        </div>
    </div>

<script src="{{url('js/jquery-1.11.2.min.js')}}"></script>
<script src="http://cdn.bootcss.com/flexslider/2.6.2/jquery.flexslider.min.js"></script>
<script src="{{url('js/swiper.min.js')}}"></script>
<script src="{{url('js/photo.js')}}" charset="utf-8"></script>
<script>
    $(function () {
        $(document).on('click','.cartadd',function(){
            var goods_id=$(this).attr('goods_id');
            var _token=$('#_token').val();
            $.post(
                "{{url('cartadd')}}",
                {goods_id:goods_id,_token:_token},
                function (res) {
                    if(res==1){
                        alert('加入购物车成功');
                        location.href="{{url('shopcart')}}"
                    }else if(res==2){
                        alert('加入购物车失败');
                        location.href="{{url('/')}}"
                    }else{
                        alert('超过库存');
                    }
                }
            )
        });

        $('.hotimg').flexslider({
            directionNav: false,   //是否显示左右控制按钮
            controlNav: true,   //是否显示底部切换按钮
            pauseOnAction: false,  //手动切换后是否继续自动轮播,继续(false),停止(true),默认true
            animation: 'slide',   //淡入淡出(fade)或滑动(slide),默认fade
            slideshowSpeed: 3000,  //自动轮播间隔时间(毫秒),默认5000ms
            animationSpeed: 150,   //轮播效果切换时间,默认600ms
            direction: 'horizontal',  //设置滑动方向:左右horizontal或者上下vertical,需设置animation: "slide",默认horizontal
            randomize: false,   //是否随机幻切换
            animationLoop: true   //是否循环滚动
        });
        setTimeout($('.flexslider img').fadeIn());

        // 参与记录、历史获得者左右切换
        // $('.listtab a').click(function(){
        //     $(this).addClass('current').siblings('a').removeClass('current');
        //     if($('.partcon').css('display')=='block'){
        //         $('.partcon').css('display','none');
        //         $('.history-winwrapp').css('display','block');
        //     }else{
        //         $('.partcon').css('display','block');
        //         $('.history-winwrapp').css('display','none');
        //     }
        // })



        // 无内容判断
        if($('.partcon .part-record div.ann_list').length==0){
            $('.partcon .part-record').css('display','none');
            $('.partcon .nocontent').css('display','block');
        }else{
            $('.partcon .part-record').css('display','block');
            $('.partcon .nocontent').css('display','none');
        }


        if($('.history-winwrapp .history-win .win-list').length==0){
            $('.history-winwrapp .history-win').css('display','none');
            $('.history-winwrapp .nocontent').css('display','block');
        }else{
            $('.history-winwrapp .history-win').css('display','block');
            $('.history-winwrapp .nocontent').css('display','none');
        }

        // 滑动
        var tabsSwiper = new Swiper('#tabs-container',{
            speed:500,
            onSlideChangeStart: function(){
              $(".tabs .active").removeClass('active')
              $(".tabs a").eq(tabsSwiper.activeIndex).addClass('active')
            }
        })
        $(".tabs a").on('touchstart mousedown',function(e){
            e.preventDefault()
            $(".tabs .active").removeClass('active')
            $(this).addClass('active')
            tabsSwiper.slideTo( $(this).index() )
        })
        $(".tabs a").click(function(e){
            e.preventDefault()
        })
    })
</script>
</body>
</html>
