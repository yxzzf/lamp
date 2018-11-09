@extends('layouts.index') @section('title') 推荐位修改 @endsection @section('title','推荐位修改') 
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title or '' }}</span>
	</div>
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/tuijian/{{$tuijian['id']}}" method="post" enctype="multipart/form-data" class="banner-upload">
     		{{ csrf_field() }}
               <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">推荐位图片</label>
                         <div class="mws-form-item">
                              <input type="file" class="small" name="tpic" value="
                              {{$tuijian['tpic']}}">
                         </div>
                    </div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">推荐位名</label>
     				<div class="mws-form-item">
     					<input type="text" class="small" name="sname" value="{{$tuijian['sname']}}">
     				</div>
     			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">推荐位描述</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="miaoshu" value="{{$tuijian['miaoshu']}}">
                    </div>
                </div>
                   <div class="mws-form-row">
                         <label class="mws-form-label">状态</label>
                         <div class="mws-form-item">
                              <label>
                             <input class="radio" name="status" type="radio" @if($tuijian->status == '1') checked  @endif value="1">
                             <span>启用</span>
                         </label>
                         <label>
                             <input class="radio" name="status" type="radio" @if($tuijian->status == '0') checked @endif value="0">
                             <span>禁用</span>
                         </label>
                         </div>
                    </div>
     			<div class="mws-form-row">
                                   
                         {{method_field('PUT')}}
                         {{csrf_field()}}
     				<input type="submit" value="提交" id="img_upload" class="btn btn-danger">
     				<input type="reset" value="取消" class="btn">
     			</div>
     	</form>
     </div> 
</div>
@endsection