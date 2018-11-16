<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>{{ $setting['title'] }}</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/seastyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/home/js/script.js"></script>


@include('layouts.home.menu')
<div class="am-g am-g-fixed">
                    <div class="am-u-sm-12 am-u-md-12">
                        <div class="theme-popover">
                        </div>
                        <div>
                            <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">

                            	@foreach($cates as $k => $v)
                            	@foreach($shops as $kk2 => $vv2)
								@if ($v->id == $vv2->cates_id)
                                <li>
                                    <div class="i-pic limit">
                                       <a href="/{{ $vv2['id'] }}.html"> <img src="{{ $vv2['simage'] }}" /></a>
                                        <p class="title fl">{{ $vv2['sname'] }}</p>
                                        <p class="price fl">
                                            <b>¥</b>
                                            <strong>{{ $vv2['money'] }}</strong>
                                        </p>
                                    </div>
                                </li>
								@endif
								@endforeach
								@endforeach
                            </ul>
                        </div>
                        <div class="clear"></div>
                        <!--分页 -->
                        
                    </div>
                </div>

@include('layouts.home.foot')