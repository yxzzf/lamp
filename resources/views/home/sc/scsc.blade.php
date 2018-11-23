@extends('layouts.grzx') @section('title') @endsection @section('title','我的收藏') 
@section('content')
<head>
        <title>我的收藏</title>
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
   <div class="am-cf am-padding">
                            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>Browser&nbsp;History</small></div>
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
                        <!--收藏 -->
                        @foreach($shops as $k=>$v)
                        <div class="goods">
                            <div class="goods-box first-box">
                                <div class="goods-pic">
                               
                                    <div class="goods-pic-box">
                                        <a class="goods-pic-link" target="_blank" href="" title="">
                                            
                                            <img src="{{$v->image}}" class="goods-img"></a>
                                    </div>
                                    
                                   <a class="goods-delete" href="/home/colldel?sc_id={{$v['id']}}"><i class="am-icon-trash"></i></a>
                                </div>

                                <div class="goods-attr">
                                    <div class="good-title">
                                        <a class="title" href="" target="_blank">{{$v->content}}</a>
                                    </div>
                                    <center><span style="font-size:10px;">{{$v['updated_at']}}</span>
                                    </center>
                                    <div class="goods-price">
                                        <span class="g_price">                                    
                                        <span>¥</span><strong>{{$v->money}}</strong>
                                        </span>
                                    </div>
                          
                                    <div class="clear"></div>
                                   
                                </div>
                            </div>
                        </div>
                        @endforeach
@endsection
