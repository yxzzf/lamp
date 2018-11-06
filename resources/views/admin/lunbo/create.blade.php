@extends('layouts.index') @section('title') 轮播添加 @endsection @section('title','轮播添加') 轮播


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title or '' }}</span>
	</div>
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/lunbo" method="post" enctype="multipart/form-data" class="banner-upload">
     		{{ csrf_field() }}
               <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">图片连接</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="url">
                         </div>
                    </div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">图片上传</label>
     				<div class="mws-form-item">
     					<input type="file" class="small" name="pic">
     				</div>
     			</div>
                   <div class="mws-form-row">
                         <label class="mws-form-label">状态</label>
                         <div class="mws-form-item">
                              <input type="radio" value="1" name="status">启用&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp
                              <input type="radio" value="0" name="status">禁用
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