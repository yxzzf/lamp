@extends('layouts.index') @section('title') 推荐位添加 @endsection @section('title','推荐位添加') 
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title or '' }}</span>
	</div>
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/tuijian" method="post" enctype="multipart/form-data" class="banner-upload">
     		{{ csrf_field() }}
               <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">推荐位图片</label>
                         <div class="mws-form-item">
                              <input type="file" class="small" name="tpic">
                         </div>
                    </div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">图片名字</label>
     				<div class="mws-form-item">
     					<input type="text" class="small" name="sname">
     				</div>
     			</div>
                    <div class="mws-form-row">
                         <label class="mws-form-label">图片描述</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="miaoshu">
                         </div>
                    </div>
                   <div class
                   ="mws-form-row">
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