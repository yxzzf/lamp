@extends('layouts.index') @section('title') 商品添加 @endsection @section('title','商品添加')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title or '' }}</span>
	</div>
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/shops" method="post" enctype="multipart/form-data" class="banner-upload">
     		{{ csrf_field() }}
               <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">商品名称</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="sname">
                         </div>
                    </div>
     			</div>
     			<div class="mws-form-row">
                    <label class="mws-form-label">商品类别</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            @foreach($cates as $v)
                            <input name="cates_id" type="radio" value="{{$v['id']}}" id="test{{$v['id']}}">
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
                              <input type="text" class="small" name="money">
                         </div>
                    </div>
     			</div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">商品图片</label>
     				<div class="mws-form-item">
     					<input type="file" class="small" name="simage">
     				</div>
     			</div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">商品图片</label>
     				<div class="mws-form-item">
     					<input type="file" class="small" name="simage2">
     				</div>
     			</div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">商品图片</label>
     				<div class="mws-form-item">
     					<input type="file" class="small" name="simage3">
     				</div>
     			</div>
     			<div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">商品库存</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="scount">
                         </div>
                    </div>
     			</div>
                   
     			<div class="mws-form-row">
     				<input type="submit" value="提交" id="img_upload" class="btn btn-danger">
     				<input type="reset" value="取消" class="btn">
     			</div>
     	</form>
     </div> 
</div>
@endsection