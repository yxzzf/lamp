@extends('layouts.grzx') @section('title') @endsection @section('title','个人信息') 
@section('content')
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人信息</title>

		<link href="/home/pone/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/pone/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/home/pone/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/pone/css/infstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/pone/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/home/pone/mazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
			
	</head>
	<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人信息</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr>
						<!--个人信息 -->
						<div class="info-main">
							<form action="/home/xxxg/{{$user->id}}" method="post" class="am-form am-form-horizontal" enctype="multipart/form-data">

							<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" name="pic" value="{{ $user->pic }}">
								<img class="am-circle am-img-thumbnail" src="{{ $user->pic}}" alt="">
							</div>  

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div>
									@if(empty(session('Users')))
			                        <a href="{{ url('home/denglu') }}" target="_top" class="h">亲，请登录</a>
			                        <a href="{{ url('home/zhuce') }}" target="_top">免费注册</a>
			                  		  @else
			                        <span class="h">{{ session('uname') }}</span>
			                        <a href="{{ url('home/loginout') }}"></a>
			                  		  @endif
								</div>
								<div class="u-safety">
									<a href="safety.html">
									 账户安全
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
									</a>
								</div>
							</div>
						</div>
						       
								<input type="hidden" name="_token" value="{{ csrf_token() }}" />
								<input type="hidden" name="id" value="{{session('uname')}}">
							
								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
								
									<div class="am-form-content">
										<input type="text" id="user-name2" name="uname"  value="{{$user->uname}}">
									
									</div>
								
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="1" 
											@if($user->sex ==1)
											checked 
											@endif
											 data-am-ucheck="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="2" 
											@if($user->sex == 2)
											checked
											@endif
											data-am-ucheck="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="3" 
												@if($user->sex == 3)
											checked
											@endif
											data-am-ucheck="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 保密
										</label>
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" placeholder="telephonenumber" type="tel" value="{{$user->phone}}" name="phone">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" placeholder="Email" type="email" value="{{$user->email}}" name="email">

									</div>
								</div>
								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="address.html">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>

									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">

											<span class="am-icon-angle-right"></span>

										</a>

									</div>
								</div>
								<div class="info-btn">
									<button class="am-btn am-btn-danger">保存修改</button>
								</div>

							</form>
						</div>

					</div>








@endsection