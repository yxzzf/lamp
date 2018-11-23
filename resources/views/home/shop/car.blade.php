<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>购物车</title>
    <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
    <link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/cartstyle.css" rel="stylesheet" type="text/css" />
    <link href="/home/css/optstyle.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/home/js/jquery.js"></script>
    <link href="/gwc/css/demo.css" rel="stylesheet" media="all" />
    <link rel="stylesheet" href="/gwc/css/reset.css">
    <link rel="stylesheet" href="/gwc/css/carts.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if IE]>

    <style type="text/css">
        li.remove_frame a {
            padding-top: 5px;
            background-position: 0px -3px;
        }
    </style>

    <![endif]-->
    <script type="text/javascript" src="/gwc/js/jquery.min.js"></script>
    <script type="text/javascript" src="/gwc/js/jquery.qrcode.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        function fixHeight() {
            var headerHeight = $("#switcher").height();
            $("#iframe").attr("height", $(window).height() - 54 + "px");
        }
        $(window).resize(function() {
            fixHeight();
        }).resize();

        $('.icon-monitor').addClass('active');

        $(".icon-mobile-3").click(function() {
            $("#by").css("overflow-y", "auto");
            $('#iframe-wrap').removeClass().addClass('mobile-width-3');
            $('.icon-tablet,.icon-mobile-1,.icon-monitor,.icon-mobile-2,.icon-mobile-3').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        $(".icon-mobile-2").click(function() {
            $("#by").css("overflow-y", "auto");
            $('#iframe-wrap').removeClass().addClass('mobile-width-2');
            $('.icon-tablet,.icon-mobile-1,.icon-monitor,.icon-mobile-2,.icon-mobile-3').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        $(".icon-mobile-1").click(function() {
            $("#by").css("overflow-y", "auto");
            $('#iframe-wrap').removeClass().addClass('mobile-width');
            $('.icon-tablet,.icon-mobile,.icon-monitor,.icon-mobile-2,.icon-mobile-3').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        $(".icon-tablet").click(function() {
            $("#by").css("overflow-y", "auto");
            $('#iframe-wrap').removeClass().addClass('tablet-width');
            $('.icon-tablet,.icon-mobile-1,.icon-monitor,.icon-mobile-2,.icon-mobile-3').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        $(".icon-monitor").click(function() {
            $("#by").css("overflow-y", "hidden");
            $('#iframe-wrap').removeClass().addClass('full-width');
            $('.icon-tablet,.icon-mobile-1,.icon-monitor,.icon-mobile-2,.icon-mobile-3').removeClass('active');
            $(this).addClass('active');
            return false;
        });
    });
    </script>
    <script type="text/javascript">
        function Responsive($a) {
            if ($a == true) $("#Device").css("opacity", "100");
            if ($a == false) $("#Device").css("opacity", "0");
            $('#iframe-wrap').removeClass().addClass('full-width');
            $('.icon-tablet,.icon-mobile-1,.icon-monitor,.icon-mobile-2,.icon-mobile-3').removeClass('active');
            $(this).addClass('active');
            return false;
        };
    </script>
</head>

<body id="by">
    
    <div class="am-container header">
    <ul class="message-l">
        <div class="topMessage">
            <div class="menu-hd">
                                <a href="/home/index" target="_top" class="h">你好: {{ session('uname') }}</a>
                <a href="/home/logout">&nbsp;&nbsp;&nbsp;退出</a>              </div>
        </div>
    </ul>
    <ul class="message-r">
        <div class="topMessage home">
            <div class="menu-hd">
                <a href="/" target="_top" class="h">商城首页</a>
            </div>
        </div>
        <div class="topMessage my-shangcheng">
            <div class="menu-hd MyShangcheng">
                <a href="/home/index" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
            </div>
        </div>
        <div class="topMessage mini-cart">
            <div class="menu-hd">
                <a id="mc-menu-hd" href="/home/shopcars" target="_top">
                        <i class="am-icon-shopping-cart  am-icon-fw"></i>
                        <span>购物车</span>
                </a>     
            </div>
        </div>
        <div class="topMessage favorite">
            <div class="menu-hd">
                <a href="/home/collect" target="_top">
                        <i class="am-icon-heart am-icon-fw"></i>
                        <span>收藏夹</span>
                    </a>
            </div>
    </ul>
    </div>
    <!--悬浮搜索框-->
    <div class="nav white">
        <div class="logoBig">
            <a href="/">
                <li><img src="{{ $setting['logo'] }}"/></li>
            </a>
        </div>
        <div class="search-bar pr">
            <a name="index_none_header_sysc" href="#"></a>
            <form action="/soso" method="get">
                <input style="padding-left:0px;" id="searchInput" name="keywords" value="" type="text" placeholder="搜索" autocomplete="off">
                <input style="padding:0px; width:128px;" id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                
            </form>
          
        </div>
    </div>
    <div class="clear"></div>         <div class="nav white" id="xiaoshi">
            <center><h3 style="color:black;">添加购物车成功</h3></center>
        </div>
         <div id="iframe-wrap">
        <section class="cartMain">
            <div class="cartMain_hd">
                <ul class="order_lists cartTop">
                    <li class="list_chk">
                        <!--所有商品全选-->
                        <input type="checkbox" id="all" class="whole_check">
                        <label for="all"></label>
                        全选
                    </li>
                    <li class="list_con">商品信息</li>
                    <li class="list_info">商品参数</li>
                    <li class="list_price">单价</li>
                    <li class="list_amount">数量</li>
                    <li class="list_sum">金额</li>
                    <li class="list_op">操作</li>
                </ul>
            </div>
            <div class="cartBox">
                <form action="/home/jiesuan" method="get" class="qwe">
                    <div class="order_content">
                        <?php $i= 0; ?> 
                        @foreach($shop_id as $k => $v)
                        <?php $i++; ?>
                        <ul class="order_lists">
                            <li class="list_chk">
                                <input type="checkbox" id="{{$i}}" class="son_check" name="shop_id[]" value="{{$shops[$v-1]->id}}">
                                <label for="{{$i}}" id="label"></label>
                            </li>
                            <li class="list_con">
                                <div class="list_img"><a href="javascript:;"><img src="{{$shops[$v-1]->simage}}" alt=""></a></div>
                                <div class="list_text"><a href="{{$shops[$v-1]->id}}.html">
                                    <center>{{$shops[$v-1]->sname}}</center>
                                </a></div>
                            </li>
                            <li class="list_info">
                                <p>口味：{{$shopcars[$k]->kows['kname']}}</p>
                                <p>包装：{{$shopcars[$k]->baozhuangs['pname']}}</p>
                            </li>
                            <li class="list_price">
                                <p class="price">￥{{$shops[$v-1]->money}}</p>
                            </li>
                            <li class="list_amount">
                                <div class="amount_box">
                                    <a href="javascript:;" class="reduce reSty">-</a>
                                    <input type="text" name="shuliang[]" value="{{$shopcars[$k]->shuliang}}" class="sum">
                                    <a href="javascript:;" class="plus">+</a>
                                </div>
                            </li>
                            <li class="list_sum">
                                <p class="sum_price">￥{{$shops[$v-1]->money * $shopcars[$k]->shuliang}}</p>
                            </li>
                            {{csrf_field()}}
                       
                              <form action="/home/shopcar/destroy/{{$shopcars[$k]->id}}" method="post">
                                    
                                        {{csrf_field()}}
                                        <button style="background-color:red;width:50px;height:30px;">删除</button>
                                    
                                </form>
                        </ul>

                        @endforeach
                    </div>
                 </form>    
            </div>
            <!--底部-->
            <div class="bar-wrapper">
                <form action="/home/jiesuan" method="post">
                <div class="bar-right">
                    <div class="piece">已选商品<strong class="piece_num">0</strong>件</div>
                    <div class="totalMoney">共计: <strong class="total_text">0.00</strong></div>
                    {{csrf_field()}}
                            <input type="submit" value="结算" />
                    
                </div>
                </form>
            </div>
        </section>
        <section class="model_bg"></section>
        
        <script src="/gwc/js/gwc.js"></script>
        <script src="/gwc/js/carts.js"></script>
    </div>
    <!--百度流量统计代码-->
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?382f81c966395258f239157654081890";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();

        setTimeout(function() {
            $('#xiaoshi').css('display', 'none');
        }, 2000);
    </script>

    <!-- 结算 -->
    <script>
    $('.asd').click(function(){
        $('.qwe').submit();
    });    
    </script>
