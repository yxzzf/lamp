@extends('layouts.index') @section('title') 商品浏览 @endsection @section('title','商品浏览')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title or '' }}</span>
	</div>
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/shops/{{ $shops['id'] }}" method="post" enctype="multipart/form-data" class="banner-upload">
     		{{ method_field('PUT') }}
     		{{ csrf_field() }}
               <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">商品名称</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="sname" value="{{ $shops->sname }}">
                         </div>
                    </div>
     			</div>
     			<div class="mws-form-row">
                    <label class="mws-form-label">商品类别</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            @foreach($cates as $v)
                            <input name="cates_id" type="radio" value="{{$v['id']}}" id="test{{$v['id']}}"  
                            @if($v['id'] == $shops['cates_id']) 
                                checked
                            @endif>
                            <label for="test{{$v['id']}}">{{$v['cname']}}</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">商品价格</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="money" value="{{ $shops->money }}">
                         </div>
                    </div>
     			</div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">商品图片</label>
     				<img src="{{ $shops->simage }}" height="100" width="100">
     				<div class="mws-form-item">
     					<input type="file" class="small" name="simage">
     				</div>
     			</div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">商品图片</label>
     				<img src="{{ $shops->simage2 }}" height="100" width="100">
     				<div class="mws-form-item">
     					<input type="file" class="small" name="simage2">
     				</div>
     			</div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">商品图片</label>
     				<img src="{{ $shops->simage3 }}" height="100" width="100">
     				<div class="mws-form-item">
     					<input type="file" class="small" name="simage3">
     				</div>
     			</div>
     			<div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">商品库存</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="scount" value="{{ $shops->scount }}">
                         </div>
                    </div>
     			</div>
                   
     				<button class="waves-effect waves-light btn" style="margin-left:0px;">修改</button>
     		
     			
     	</form>
     </div> 
</div>
@endsection