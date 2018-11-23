@extends('layouts.grzx') @section('title') @endsection @section('title','我的足迹') 
@section('content')
<head>
		<title>我的足迹</title>
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/footstyle.css" rel="stylesheet" type="text/css">
        
        <script src="/home/jquery.js"></script>
        <script>
        setTimeout(function() {
            $('#xiaoshi').css('display', 'none');
        }, 2000);
        </script>

</head>
<body>

    <?php
    use App\Model\Links;
    use App\Model\Setting;
    use App\Model\User;
    $uid = \Session::get('homeUser')['id'];
    $user = null;
    if($uid !== null){
        $user = Users::find($uid);
    }
    $links = Links::all();

    $setting = Setting::first();
    ?>
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>Browser&nbsp;History</small></div>
						</div>
						<hr/>
						 @if(Session::has('success'))
                        <div class="nav white" id="xiaoshi" style="margin-top: 10px;">
                            <center>
                                <p>
                                    <font style="color:red; font-size:20px;">{{Session::get('success')}}</font>
                                </p>
                            </center>
                        </div>
                        @endif
                        @if(Session::has('error'))
                        <div class="nav white" id="xiaoshi" style="margin-top: 10px;">
                            <center>
                                <p>
                                    <font style="color:red; font-size:20px;">{{Session::get('error')}}</font>
                                </p>
                            </center>
                        </div>
                        @endif
						<!--足迹列表 -->
						@foreach($zuji as $v)
                        <div class="goods">
                            <div class="goods-box first-box">
                                <div class="goods-pic">
                               
                                    <div class="goods-pic-box">
                                        <a class="goods-pic-link" target="_blank" href="/{{$v->shops->id}}.html" title="">
                                            
                                            <img src="{{$v->shops->simage}}" class="goods-img"></a>
                                    </div>
                                    
                                    <a class="goods-delete" href="/shanzuji?zuji_id={{$v['id']}}"><i class="am-icon-trash"></i></a>
                                </div>

                                <div class="goods-attr">
                                    <div class="good-title">
                                        <a class="title" href="/{{$v->shops->id}}" target="_blank">{{$v->shops->sname}}</a>
                                    </div>
                                    <center><span style="font-size:10px;">{{$v['updated_at']}}</span>
                                    </center>
                                    <div class="goods-price">
                                        <span class="g_price">                                    
                                        <span>¥</span><strong>{{$v->shops->money}}</strong>
                                        </span>
                                    </div>
                          
                                    <div class="clear"></div>
                                    <div class="goods-num">
                                        <div class="match-recom">
                                            <a href="#" class="match-recom-item">找相似</a>
                                            <a href="#" class="match-recom-item">找搭配</a>
                                            <i><em></em><span></span></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

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