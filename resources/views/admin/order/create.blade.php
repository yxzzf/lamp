@extends('layouts.index') @section('title') 订单管理 @endsection @section('title','订单管理')


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title or '' }}</span>
	</div>
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/order" method="post" enctype="multipart/form-data" class="banner-upload">
     		{{ csrf_field() }}
               <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">订单编号</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="order_bh">
                         </div>
                    </div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">支付方式</label>
     				<div class="mws-form-item">
     					<input type="text" class="small" name="zhifu_id">
     				</div>
     			</div>
                   {{--<div class="mws-form-row">
                         <label class="mws-form-label">物流公司</label>
                         <select data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="true" name="wuliu_id"><span class="caret"></span>
                                        @foreach($wuliu as $v)
                                            <option value="{{$v->id}}">{{$v->name}}</option>
                                        @endforeach
                                    </select>
                    </div>--}}
                    {{--<div class="mws-form-row">
                         <label class="mws-form-label">购物车id</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="shopcar_id">
                         </div>
                    </div>--}}
                    <div class="mws-form-row">
                         <label class="mws-form-label">用户id</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="user_id">
                         </div>
                    </div>
                    <div class="mws-form-row">
                         <label class="mws-form-label">商品id</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="shop_id">
                         </div>
                    </div>
                    <div class="mws-form-row">
                         <label class="mws-form-label">收货地址</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="shop_id">
                              <textarea class="" name="uaddress_id" rows="5"></textarea>
                         </div>
                    </div>
                    {{csrf_field()}}
     			<div class="mws-form-row">
     				<input type="submit" value="提交" id="img_upload" class="btn btn-danger">
     				<input type="reset" value="取消" class="btn">
     			</div>
     	</form>
     </div> 
</div>
@endsection