@extends('layouts.grzx') @section('title') @endsection @section('title','密码修改') 
@section('content')
<head>
	<!-- 错误修改 -->
	 <link rel="stylesheet" href="/home/layui/css/layui.css" media="all">
        <script src="/home/layui/layui.all.js"></script>
	<!-- 错误修改 -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/addstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>


		<!-- 地址 start -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<!-- <link href="http://www.jq22.com/jquery/bootstrap-3.3.4.css" rel="stylesheet">  -->
		<script src="http://www.jq22.com/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://www.jq22.com/jquery/bootstrap-3.3.4.js"></script> 
		<script src="/dizhi/js/distpicker.data.js"></script>
		<script src="/dizhi/js/distpicker.js"></script>
		<script src="/dizhi/js/main.js"></script> 
		<!-- 地址 end -->


</head>
<body>

 
  <div class="user-address"> 
   <!--标题 --> 
   <div class="am-cf am-padding"> 
    <div class="am-fl am-cf">
     <strong class="am-text-danger am-text-lg">地址管理</strong> / 
     <small>Address&nbsp;list</small>
    </div> 
   </div> 
   <hr /> 
   <ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails"> 
   	@foreach($dizhis as $k => $v)
    <li class="user-addresslist defaultAddr"> <span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span> <p class="new-tit new-p-re"> <span class="new-txt">{{ $v->uname }}</span> <span class="new-txt-rd2">{{ $v->phone }}</span> </p> 
     <div class="new-mu_l2a new-p-re"> 
      <p class="new-mu_l2cw"> <span class="title">地址：</span>{{ $v->dizhi }}<span class="street">{{ $v->xd }}</span></p> 
     </div> 
     <div class="new-addr-btn"> 
      <a href="/home/dzsc/{{$v->id}}" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a> 
     </div> </li> 
     @endforeach	
   </ul> 
   <div class="clear"></div> 
   <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a> 
   <!--例子--> 
   <div class="" id="doc-modal-1"> 
    <div class="add-dress"> 
     <!--标题 --> 
     <div class="am-cf am-padding"> 
      <div class="am-fl am-cf">
       <strong class="am-text-danger am-text-lg">新增地址</strong> / 
       <small>Add&nbsp;address</small>
      </div> 
     </div> 
     <hr /> 
     <div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;"> 
      <form class="am-form am-form-horizontal" action="/home/dztj" method="post">    
       {{ csrf_field() }}
       <div class="am-form-group">

        <label for="user-name" class="am-form-label">收货人</label> 
        <div class="am-form-content"> 
         <input type="text" id="user-name" name="uname" value="" placeholder="收货人" /> 
        </div> 
       </div> 
       <div class="am-form-group"> 
        <label for="user-phone" class="am-form-label">手机号码</label> 
        <div class="am-form-content"> 
         <input id="user-phone" placeholder="手机号必填" type="text" name="phone" value="" /> 
        </div> 
       </div> 
       <div class="am-form-group"> 
        <label for="user-address" class="am-form-label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">所在地</font></font></label> 
                        <div data-toggle="distpicker">
                            <div class="am-form-content address">
                                <select class="data-am-selected" id="province1" name="sheng"></select>
                            </div>
                            <div class="am-form-content address">
                                <select class="data-am-selected" id="city1" name="shi"></select>
                            </div>
                            <div class="am-form-content address">
                                <select class="data-am-selected" id="district1" name="xian"></select>
                            </div>
                        </div> 
       </div> 
       <div class="am-form-group"> 
        <label for="user-intro" class="am-form-label">详细地址</label> 
        <div class="am-form-content"> 
         <textarea class="" rows="3" id="user-intro" placeholder="输入详细地址" name="xd" value=""></textarea> 
         <small>100字以内写出你的详细地址...</small> 
        </div> 
       </div> 
       <div class="am-form-group"> 
        <div class="am-u-sm-9 am-u-sm-push-3"> 
        <button class="am-btn am-btn-danger">保存</button> 
         <input type="reset" value="Reset" class="am-close am-btn am-btn-danger" data-am-modal-close="">
        </div> 
       </div> 
      </form> 
     </div> 
    </div> 
   </div> 
  </div> 
 </body>
</html>

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