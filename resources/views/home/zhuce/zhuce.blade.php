<!DOCTYPE html>
<html>
	
	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/home/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
		<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
		<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

		<link rel="stylesheet" type="text/css" href="/admin/css/mws-style.css" media="screen">
		<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol16.css" media="screen">
		<link rel="stylesheet" type="text/css" href="/admin/css/icons/icol32.css" media="screen">


	</head>

	<body>
		<!-- 显示验证错误信息开始 -->
    @if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--显示验证错误信息结束  -->
		<div class="login-boxtitle">
			<a href="/home/demo.html"><img alt="" src="/home/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/home/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li><a href="">用户名注册</a></li>
							</ul>

								<div class="am-tab-panel">
									<form action="/home/store" method="post">
							
            							  {{ csrf_field() }}
                 				<div class="user-uname">
								    <label for="uname"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								    <input type="text" name="uname" id="uname" placeholder="请输入用户名">
                 				</div>																	
                 				<div class="user-password">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pwd" id="pwd" placeholder="设置密码">
                 				</div>										
                 				<div class="user-password">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pwds" id="pwds" placeholder="确认密码">

                 </div>	
                 <input type="submit" class="am-btn am-btn-primary am-btn-sm am-fl" value="注册">
									</form>
								</div>

							</div>
						</div>

				</div>
			</div>
		</div>	
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
							</p>
						</div>
					</div>
	</body>

</html>