@extends('layouts.index') @section('title') 修改密码 @endsection @section('title','修改密码') 
@section('content')
	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	 <link rel="stylesheet" href="/home/layui/css/layui.css" media="all">
        <script src="/home/layui/layui.all.js"></script>
    	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>修改密码</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/stepstyle.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="/home/js/jquery-1.7.2.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

</head>
		<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
					</div>
					<hr/>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name">重置密码</p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name">完成</p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form class="am-form am-form-horizontal" action="/admin/zmxg/{{ session('adminUser')->id }}" method="post">
						{{ csrf_field() }}
						<div class="am-form-group">
							<label for="user-old-password" class="am-form-label">原密码</label>
							<div class="am-form-content">
								<input type="password" id="pwd" name="oldpwd" placeholder="请输入原登录密码" value="">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-new-password" class="am-form-label">新密码</label>
							<div class="am-form-content">
								<input type="password" name="pwd" id="user-new-password" placeholder="由数字、字母组合" value="">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label">确认密码</label>
							<div class="am-form-content">
								<input type="password" name="pwdok" id="user-confirm-password" placeholder="请再次输入上面的密码" value="">
							</div>
						</div>
						<div class="info-btn">
							<button class="am-btn am-btn-danger">保存修改</button>
						</div>

					</form>

				</div>








</script>
         <!-- 读取提示信息开始 -->
    @if (session('success'))
        <script type="text/javascript">
            var layer = layui.layer
                 ,form = layui.form;


            layer.alert("{{ session('success') }}");           
        </script>;
    @endif
    @if (session('error'))
      <script type="text/javascript">
      var layer = layui.layer
         ,form = layui.form;
            layer.alert("{{ session('error') }}");         
        </script>;
    @endif
    <!-- 读取提示信息结束 -->


    <!-- 显示验证错误信息 开始 -->
    @if (count($errors) > 0)
    <div class="">
        <ul> 
        @foreach ($errors->all() as $k=>$v)
            <script type="text/javascript">
            var layer = layui.layer
                ,form = layui.form;
                if('{{ $k }}' == 0){
                    layer.alert('{{ $v }}')
                }                   
            </script>;
        @endforeach
       </ul>
    </div>
    @endif
    <!-- 显示验证错误信息 结束 -->
</body>
</html>
	









@endsection