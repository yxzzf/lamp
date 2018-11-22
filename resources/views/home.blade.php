<!--顶部导航条 -->
			@include('layouts.home.top')
			</div>
			<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
								@foreach($lunbotus as $v)
                				<li class="banner1"><a><img src="{{$v->pic}}" title="{{$v->url}}" height="430" /></a></li>
                				@endforeach
							</ul>
						</div>
						<div class="clear"></div>	
			</div>
			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>					
		        				
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category">
										<ul class="category-list" id="js_climit_li">
											@foreach($cates as $k => $v)
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/home/images/cake.png"></i><a class="ml-22" title="点心">{{ $v->cname }}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	<dl class="dl-sort">
																		<dt><span title="蛋糕">{{ $v->cname }}</span></dt>
																		@foreach($tags as $vv) @if($vv->cates_id == $v->id)
																		<dd>
																			<a title="{{$vv->sname}}" href="#">{{$vv ->tname}}<span></span></a>
																		</dd>
																		@endif
																		@endforeach
																	</dl>
																</div>
																<div class="brand-side">
																	<dl ><dt><span>零食</span></dt>
																		<dd><a rel="nofollow" title="零食" target="_blank" href="#" rel=""><span  class="red" >零食，通常是指一日三餐时间点之外的时间里所食用的食品。一般情况下，人的生活中除了一日三餐被称为正餐食物外，其余的一律被称为零食。
零食跟食用的时间点有关跟种类无关，比如一般南方人把面食当做零食，但其却是北方人的主食。零食可分为三类，原产品零食、初加工零食和深加工零食。很多一般儿童比较喜欢吃零食，但吃过多深加工零食易造成偏食和肥胖现象。但对于老年人来说适当吃些零食对身体健康有益处，但是多食也是无益的，在选购零食时请注意选择健康零食。一般情况下原产品零食和初加工零食是健康零食。[Snack;Between-meal nibbles] 一日三餐饭食以外的零星的食品。零食，也称零嘴、零嘴儿、小零嘴。</span></a></dd>
																	</dl>
																</div>
															</div>
														</div>
													</div>
												</div>
											<b class="arrow"></b>	
											</li>
											@endforeach
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						
						<!--轮播-->
						
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>



					

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商cheng头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="/home/images/TJ2.jpg"></img>
									<span>[tehui]</span>两块钱你买不了吃亏							
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[xixi]</span>sha啥啥皮革厂倒闭啦
								     <img src="/home/images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="javascript:void(0);">
									<img src="/home/images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name">{{ session('uname') }}</span>
									<a href="javascript:void(0);"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="/home/denglu">登录</a>
								<a class="am-btn-warning btn" href="/home/zhuce">注册</a>
							</div>
							<div class="clear"></div>	
						</div>																	    
							    @foreach($guanggao as $k=>$v)
								<li><a target="_blank" href="#"><span>[{{ $v->name }}]</span>{{ $v->content }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3" ">
							<img src="/home/2018-3.png"></img>
							<p>赵丽颖<br>结 婚 啦</p>
						</div>

						<?php $a =0; ?>

						@foreach($tuijian as $v)
						@if ($a<=2)
						<?php $a++; ?>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3><?php echo Mb_substr($v['sname'],0,10,'utf-8');?></h3>
								<h4><?php echo Mb_substr($v['miaoshu'],0,10,'utf-8');?></h4>






							</div>
							<div class="recommendationMain one">
								<a href="introduction.html"><img src="{{ $v->tpic }}"></img></a>
							</div>
						</div>
						@endif
						@endforeach
					</div>
					<div class="clear "></div>

					@foreach($cates as $k => $v)
                    <div id="f{{ $a++ }}">
					<div class="am-container ">
						<div class="shopTitle ">
							<h4>{{$v -> cname}}</h4>
							<h3>{{$v -> intro}}</h3>
							<div class="today-brands ">
								@foreach($tags as $kk => $vv)
								@if ($v->id == $vv->cates_id)
									
                            	<a href="/tags/{{$vv->id}}">{{$vv->tname}}</a>
								@endif
                            	@endforeach
							</div>
							<span class="more ">
                    <a href="# ">更多美味<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                        </span>
						</div>
					</div>
					<div class="am-g am-g-fixed floodThree ">
						<div class="am-u-sm-4 text-four list">
							<div class="word">
								<?php $a =0; ?>
								@foreach($tags as $kk1 => $vv1)
								@if ($v->id == $vv1->cates_id && $a<=5)
								<?php $a++; ?>
                            		<a class="outer" href="#"><span class="inner"><b class="text">{{$vv1->tname}}</b></span></a>
								@endif
                            	@endforeach
							</div>
							<a href="/cates/{{ $v['id'] }} ">
								<img src="{{$cates[$k] -> cimage}}" />
								<div class="outer-con ">
									<div class="title ">
										{{$v -> intro}}
									</div>									
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						<?php $b=0; ?>
						@foreach($shops as $kk2 => $vv2)
						@if ($v->id == $vv2->cates_id && $b<=7)
						<?php $b++; ?>		
						<div class="am-u-sm-4 text-four">

							<a href="/{{$vv2->id}}.html">

								<img src="{{$vv2->simage}}" />
								<div class="outer-con ">
									<div class="title ">
										<?php echo Mb_substr($vv2['sname'],0,10,'utf-8');?>
									</div>
									<div class="sub-title ">
										¥{{$vv2 -> money}}
									</div>
									<i class="am-icon-shopping-basket am-icon-md  seprate"></i>
								</div>
							</a>
						</div>
						@endif
						@endforeach
					</div>
					<div class="clear "></div>
					</div>
					@endforeach
<center> @include('layouts.home.footer')</center>