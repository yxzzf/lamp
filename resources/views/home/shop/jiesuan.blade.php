<head>
<title>确认订单信息-零食</title>
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
<link href="http://www.lingshi.com/templates/default/css/reset.css" rel="stylesheet" type="text/css">
<link href="http://www.lingshi.com/templates/default/css/header_footer.css" rel="stylesheet" type="text/css">
<link href="http://www.lingshi.com/templates/default/css/cart.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="http://www.lingshi.com/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="http://www.lingshi.com/js/jquery.json-1.3.js"></script>
<script type="text/javascript" src="http://www.lingshi.com/js/common.js"></script>
<script type="text/javascript" src="http://www.lingshi.com/js/shopping.js?t=11015"></script>
<script type="text/javascript" src="http://www.lingshi.com/js/kf.js"></script><style type="text/css">#rightDiv{position: fixed; z-index: 100000000; overflow: hidden;}</style>
<style type="text/css">#flDiv{position: fixed; z-index: 100000000; overflow: hidden; width:110px;height:282px;}</style>
<style type="text/css">#frDiv{position: fixed; z-index: 100000000; overflow: hidden; width:110px;height:282px;}</style>

<script type="text/javascript" src="http://www.lingshi.com/js/header_footer.js"></script>
</head>
<div class="wrap2">

	<div class="title">填写并确认订单信息<a style="font-size:12px; font-family:宋体; color:#458df0; margin-left:10px;margin-right:10px;float:right;font-weight:normal;" href="http://art.lingshi.com/articles/articles/bangzhu/16" target="_blank">运费说明</a></div>
	<div class="new_address">
		<div class="address_title">确认收货地址</div>
				
		<script type="text/javascript">
			onload = function() {
				if (!document.all) {
					document.forms['theForm'].reset();
				}
			}
		</script>
				<script type="text/javascript" src="http://www.lingshi.com/js/region.js"></script>
		<script type="text/javascript" src="http://www.lingshi.com/js/utils.js"></script>
	
	
	<div class="clear"></div>
<form action="/home/scdd" method="get" name="orderForm" id="orderForm" >

	<div class="user-address"> 
	<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails"> 
   	@foreach($dizhi as $k => $v)
    <li class="user-addresslist defaultAddr"> <span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span> <p class="new-tit new-p-re"> <span class="new-txt">{{ $v->uname }}</span> <span class="new-txt-rd2">{{ $v->phone }}</span> </p> 
        <input type="hidden" name="dizhi[]" value="{{$v->dizhi}}">

     <div class="new-mu_l2a new-p-re"> 
      <p class="new-mu_l2cw"> <span class="title">地址：</span>{{ $v->dizhi }}<span class="street">{{ $v->xd }}</span></p> 
     </div> 
     <div class="new-addr-btn"> 
      <a href="/home/dzsc/{{$v->id}}" onclick="delClick(this);"><i class="am-icon-trash"></i>删除</a> 
     </div> </li> 
     @endforeach	
   </ul> 			</div>
	<input type="hidden" name="step" value="done">
		<input type="hidden" name="deliveryman" value="0">
		<div class="pay_way">
		<div class="pay_way_title">选择支付方式</div>
		<table width="540" border="0" cellpadding="0" cellspacing="0" class="table_info2 mt10" cellspcing="0">
			<tr width="70" align="right">支付平台</tr>
			@foreach($zhifu as $v)

				
				<td width="1030">
					<span class="bank">
						<input type="radio" name="payment" value="5" id="pay_5">
						<label for="pay_5">
							<img src="{{$v->image}}" alt="{{$v->name}}" width="130" height="40">
						</label>
					</span>	
				</td>

			@endforeach
		</table>		
	
	<div class="snack_list">
	
		<div class="snack_list_title">商品名称<a href="http://pay.lingshi.com/?step=cart" style="font-size:12px; font-family:宋体; color:#458df0; margin-left:10px;margin-right:10px;float:right;font-weight:normal;">返回购物车&gt;&gt;</a></div>
		<?php $i= 0; ?> 
        @foreach($shop_id as $k => $v)
        <?php $i++; ?>
        <input type="hidden" name="sname[]" value="{{$shops[$v-1]->sname}}">
		<table border="0" cellspacing="0" cellpadding="0" class="list_table">
			<tbody><tr>
				<th colspan="2" class="align-l" style="text-indent:160px;">{{$shops[$v-1]->sname}}</th>
								<th width="130">市场价</th>
				<th width="130">购买数量</th>
				<th width="130">小计</th>
			</tr>
						<tr>
				<td width="100">
					<a href="http://www.lingshi.com/product/lingshi-11995.htm" target="_blank" class="snack_img">
						<img src="http://image.lingshi.com/images/201704/thumb_img/11995_thumb_G_1492590907404.jpg" width="58" height="58">
					</a>
				</td>
				<td width="500" class="align-l">
					<a href="http://www.lingshi.com/product/lingshi-11995.htm" target="_blank">限时购买，最低价</a>
					<span style="color:#FF0000">（秒杀）</span>
				</td>
				<td>
					<span class="price">￥{{$shops[$v-1]->money}}</span>
				</td>
			
				<td>{{$shopcars[$k]->shuliang}}</td>
				<td>
					<span class="price2">￥{{$shops[$v-1]->money * $shopcars[$k]->shuliang}}</span>
				</td>
			</tr>
					</tbody>
		@endforeach
		</table>
	</div>
	
	

	<div class="other fixed">
		
		<p onclick="togglebox(this)" class="cur" id="bonus_">
			<a class="icon_open"></a>
			使用代金券
		</p>
		<div class="other_wrap hide" id="bonus_box">
			<p>
				<b>代金券</b>

				<input type="text" class="activation" name="bonus_sn" id="bonus_sn" placeholder="输入代金券激活码">
				<a href="javascript:void(0)" onclick="validateBonus(document.getElementById('bonus_sn').value)" class="btn_activation" id="act_validate_bonus" style="color:#fff;">激活代金券</a>
				<span id="bonus_msg" class="bonus_msg hide"></span>
			</p>
			<div class="frame" id="bonus_html">

				<span class="title mt20" id="change_bonus" style="border-bottom:1px solid #f8dbb1;">
					<input type="checkbox" name="use_bonus" id="use_bonus" value="1" onclick="changeBonus()"><label for="use_bonus">&nbsp;可使用的代金券
					<em id="bonus_num">（0）</em>
				</label></span>

				<div class="inner_frame" style="border:none;" id="bonus_list">
														</div>

			</div>
		</div>
		

		
				<p onclick="togglebox(this)" class="cur mt15" id="bill_">
			<a class="icon_open" id="postscriptBtn"></a>
			发票
		</p>
		<div class="other_wrap hide" id="bill_box">
			<div class="frame">
				<span class="title">
					<input type="checkbox" class="check" onclick="selectInv(this)" value="1" id="need_inv" name="need_inv"><label for="need_inv">开发票</label></span>
	
			</div>
		</div>
				
		<p onclick="togglebox(this)" class="cur mt15" id="mssage_">
			<a class="icon_open" id="postscriptBtn"></a>
			留言
		</p>
		<div class="other_wrap hide" id="mssage_box">
			<textarea id="postscript" rows="" cols="" name="postscript"></textarea>
		</div>
		
		<div class="clear"></div>
		<div class="total_price mt15" id="ECS_ORDERTOTAL">
			<div class="ordertotal">
    <ul>
        <li><span class="snack"><em>2件</em>商品，重量：<em></em></span>商品总价：<span class="price">￥17.60元</span></li>
                
        
        
        <li>配送费用：<span class="price">+￥0.00元</span></li>
                                    </ul>
</div>
总额：<span class="price2">￥17.60元</span>		</div>
		<div class="clear"></div>
	</div>
	

	<div class="submit" id="order_submit">
		<p class="pp">
			<span>获得积分：<em>17</em></span>
			<span>
	应付款金额：
		<span>
		￥17.60元		</span>
	</span>
	{{csrf_field()}}
	<input type="submit" value="提交订单" class="btn_submit" id="ordersubmit">
</p>
	</div>
</form>
<script type="text/javascript">
	$("#inv_payee").keydown(function(e){
		if (e.keyCode == 13) {
			return false;
		}
	});

	$("#bonus_sn").keydown(function(e){
		if (e.keyCode == 13) {
			$("#act_validate_bonus").click();
			return false;
		}
	});
	var flow_no_payment   = "您必须选定一个支付方式。";
	var flow_no_address   = "您必须选定一个收货地址。";
	var flow_no_best_time = "您必须选定一个收货时间。";
	var flow_no_inv_payee = "请输入发票抬头。";
	var flow_no_inv_type  = "请选择发票类型。";
</script>


	

</div>