<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>
         <meta charset="utf-8">
         <title>Fullscreen Login</title>
        <!-- 错误修改 -->
         <link rel="stylesheet" href="/home/layui/css/layui.css" media="all">
        <script src="/home/layui/layui.all.js"></script>
        <!-- 错误修改 -->      
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel="stylesheet" assets/css/reset.css">
        <link rel="stylesheet" href="/admin/assets/css/supersized.css">
        <link rel="stylesheet" href="/admin/assets/css/style.css">

    </head>

    <body>

        <div class="page-container">
            <h1>Login</h1>
            <form action="/admin/dologin" method="post">
                 {{ csrf_field() }}
                <input type="text" name="uname" class="uname" placeholder="Uname">
                <input type="password" name="pwd" class="pwd" placeholder="pwd">
                <button type="submit">Sign me in</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect">
                <p>男神的网站:</p>
                <p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>
            </div>
        </div>
        <!-- Javascript -->
        <script src="/admin/assets/js/jquery-1.8.2.min.js"></script>
        <script src="/admin/assets/js/supersized.3.2.7.min.js"></script>
        <script src="/admin/assets/js/supersized-init.js"></script>
        <script src="/admin/assets/js/scripts.js"></script>


        </script>
         <!-- 读取提示信息开始 -->
    @if (session('success'))
        <script type="text/javascript">
            var layer = layui.layer
                 ,form = layui.form;
            layer.alert("<em style='color:red'>"+"{{ session('success') }}"+"</em>");           
        </script>;
    @endif
    @if (session('error'))
      <script type="text/javascript">
      var layer = layui.layer
         ,form = layui.form;
            layer.alert("<em style='color:red'>"+"{{ session('error') }}"+"</em>");         
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

