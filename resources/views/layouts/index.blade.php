<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admin/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/themer.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/page_page.css" media="screen">
<!-- 地址 start -->
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<!-- <link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">  -->
<script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script> 
<script src="/dizhi/js/distpicker.data.js"></script>
<script src="/dizhi/js/distpicker.js"></script>
<script src="/dizhi/js/main.js"></script> 
<!-- 地址 end -->

<title>@yield('title')</title>

</head>

<body>
    <!-- Header -->
    <div id="mws-header" class="clearfix">
    
        <!-- Logo Container -->
        <div id="mws-logo-container">
        
            <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
            <div id="mws-logo-wrap">
                <img src="/admin/images/enheng.png" alt="mws admin">
            </div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
                <!-- User Photo -->
                <div id="mws-user-photo">
                    <img src="/admin/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        你好,管理员
                    </div>
                    <ul>
                        <li><a href="#">更改密码</a></li>
                        <li><a href="/admin/login">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
        <!-- Necessary markup, do not remove -->
        <div id="mws-sidebar-stitch"></div>
        <div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
            <!-- Searchbox -->
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li class="active">
                        <a href="#"><i class="icon-add-contact"></i>用户管理</a>
                        <ul>
                            <li><a href="/admin/user">用户列表</a></li>
                            <li><a href="/admin/user/create">用户添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-align-left"></i>分类管理</a>
                        <ul>
                            <li><a href="/admin/cates">分类列表</a></li>
                            <li><a href="/admin/cates/create">分类添加</a></li>
                        </ul>
                    </li>

                     <li class="active">
                        <a href="#"><i class="icon-list"></i>口味管理</a>
                        <ul>
                            <li><a href="/admin/kow">口味列表</a></li>
                            <li><a href="/admin/kow/create">口味添加</a></li>
                        </ul>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>商品管理</a>
                        <ul>
                            <li><a href="/admin/shops">商品列表</a></li>
                            <li><a href="/admin/shops/create">商品添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>标签管理</a>
                        <ul>
                            <li><a href="/admin/tag">标签列表</a></li>
                            <li><a href="/admin/tag/create">标签添加</a></li>

                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>包装管理</a>
                        <ul>
                            <li><a href="/admin/baozhuang">包装列表</a></li>
                            <li><a href="/admin/baozhuang/create">包装添加</a></li>
                        </ul>
                    </li>

                    <li class="active">
                        <a href="#"><i class="icon-list"></i>轮播图管理</a>
                        <ul>
                            <li><a href="/admin/lunbo">轮播图列表</a></li>
                            <li><a href="/admin/lunbo/create">轮播图添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>地址管理</a>
                        <ul>
                            <li><a href="/admin/dizhi">地址列表</a></li>
                            <li><a href="/admin/dizhi/create">地址添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>推荐位管理</a>
                        <ul>
                            <li><a href="/admin/tuijian">推荐位列表</a></li>
                            <li><a href="/admin/tuijian/create">推荐位添加</a></li>
                        </ul>
                    </li>
                    <li class="active">

                        <a href="/admin/links"><i class="icon-users"></i>友情连接</a>
                        <ul>
                            <li><a href="/admin/links">友情列表</a></li>
                            <li><a href="/admin/links/create">连接添加</a></li>

                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-stats"></i>广告管理</a>
                        <ul>

                            <li><a href="/admin/guanggao">广告列表</a></li>
                            <li><a href="/admin/guanggao/create">广告添加</a></li>

                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-stats"></i>物流管理</a>
                        <ul>
                            <li><a href="/admin/wuliu">物流列表</a></li>
                            <li><a href="/admin/wuliu/create">物流添加</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>网站配置</a>
                        <ul>
                            <li><a href="/admin/setting">网站配置</a></li>
                            <li><a href="/admin/wzkgs/create">网站开关</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>订单管理</a>
                        <ul>
                            <li><a href="/admin/order">订单列表</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>支付管理</a>
                        <ul>
                            <li><a href="/admin/zhifu">合作列表</a></li>
                            <li><a href="/admin/zhifu/create">支付管理</a></li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#"><i class="icon-list"></i>足迹管理</a>
                        <ul>
                            <li><a href="/admin/zuji">足迹列表</a></li>
                            <li><a href="/admin/zuji/create">足迹添加</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
            <div class="container">

            <!-- 添加删除修改成功失败  开始 -->
            @if (session('success'))
                <div class="mws-form-message success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mws-form-message error">
                    {{ session('error') }}
                </div>
            @endif
            <!-- 添加删除修改成功失败  结束 -->

            <!-- 显示错误信息 开始 -->
            @if (count($errors) > 0)
                <div class="mws-form-message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- 显示错误信息 结束 -->
        @section('content')


        @show


            </div>       
            <!-- Footer -->       
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admin/custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admin/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admin/plugins/validate/jquery.validate-min.js"></script>

    <!-- Core Script -->
    <script src="/admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admin/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->

</body>
</html>
