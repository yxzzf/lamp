<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<link rel="icon" href="/home/images/meat.png" type="image/x-icon"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>{{ $setting['title'] }}</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/hmstyle.css" rel="stylesheet" type="text/css"/>
		<link href="/home/css/skin.css" rel="stylesheet" type="text/css" />
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>
		<div class="hmtop">
			<!--顶部导航条 -->
<div class="am-container header">
	<ul class="message-l">
		<div class="topMessage">
		 <div class="menu-hd">
                    @if(empty(session('Users')))
                        <a href="{{ url('home/denglu') }}" target="_top" class="h">亲，请登录</a>
                        <a href="{{ url('home/zhuce') }}" target="_top">免费注册</a>
                    @else
                        <span class="h">你好：{{ session('uname') }}</span>
                        <a href="{{ url('home/loginout') }}">退出</a>
                    @endif
                </div>
		</div>
	</ul>
	<ul class="message-r">
		<div class="topMessage home">
			<div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
		</div>
		@if(!empty(session('Users')))
		<div class="topMessage my-shangcheng">
			<div class="menu-hd MyShangcheng"><a href="/home/grzx" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
		</div>
		@endif
		
		@if(!empty(session('Users')))
		<div class="topMessage mini-cart">
			<div class="menu-hd"><a id="mc-menu-hd" href="/home/shopcar/index/{{ session('id') }}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
		</div>
		@else
		<div class="topMessage mini-cart">
			<div class="menu-hd"><a id="mc-menu-hd" href="{{ url('home/denglu') }}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>登陆后在进入购物车</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
		</div>
		@endif
		<div class="topMessage favorite">
			<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
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

	<div class="clear"></div>