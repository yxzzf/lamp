@extends('layouts.grzx') @section('title') 个人资料 @endsection @section('title','个人资料') 
@section('content')
	<div class="user-info">
	<!--标题 -->
<div class="am-cf am-padding">
		<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
	</div>
	<hr>
	<!--头像 -->
	<div class="user-infoPic">
		<div class="filePic">
		<input type="file" name="pic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*" value="">
	<img class="am-circle am-img-thumbnail" width="70px;" height="70px;" >
	</div>

	<p class="am-form-help">头像</p>

	<div class="info-m">
		<div><b>用户名：<i>小叮当</i></b></div>
		<div class="u-safety">
			<a href="/admin/safety.html">
				 账户安全
				<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
				</a>
			</div>
		</div>
	</div>

	<!--个人信息 -->
	<div class="info-main">
	<form class="am-form am-form-horizontal" action="/home" method="post" enctype="multipart/form-data">
		 {{ csrf_field() }}
	<div class="am-form-group">
	<label for="user-name" class="am-form-label">姓名</label>
	<div class="am-form-content">
	<input type="text" id="user-name2" placeholder="uname">

	</div>
	</div>
	<div class="am-form-group">
	<label for="password" class="am-form-label">密码</label>
	<div class="am-form-content">
	<input type="password" id="pwd" placeholder="pwd">

	</div>
	</div>
	<div class="am-form-group">
	<label for="email" class="am-form-label">邮箱</label>
	<div class="am-form-content">
	<input type="email" id="email" placeholder="email">

	</div>
	</div>
    <div class="am-form-group">
    <label class="am-form-label">性别</label>
    <div class="am-form-content sex">
    	<label class="am-radio-inline">
 		<input type="radio" name="sex" value="1" data-am-ucheck="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 男
 	</label>
    <label class="am-radio-inline">
    <input type="radio" name="sex" value="2" data-am-ucheck="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 女
		</label>
		<label class="am-radio-inline">
			<input type="radio" name="sex" value="3" data-am-ucheck="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 保密
		</label>
	</div>
</div>
<div class="am-form-group">
	<label for="user-phone" class="am-form-label">电话</label>
	<div class="am-form-content">
		<input placeholder="phone" type="tel" name="phone" value="">

	</div>
</div>
			<div class="info-btn">
				<div class="am-btn am-btn-danger">保存修改</div>
			</div>

		</form>
	</div>

</div>


@endsection