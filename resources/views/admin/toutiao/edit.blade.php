@extends('layouts.index') @section('title') 合作公司修改 @endsection @section('title','合作公司修改') 
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
		<span>{{ $title or '' }}</span>
	</div>
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/zhifu/{{$zhifu['id']}}" method="post" enctype="multipart/form-data" class="banner-upload">
     		{{ csrf_field() }}
              <div class="mws-form-row">
                         <label class="mws-form-label">合作公司</label>
                         <div class="mws-form-item">
                              <input type="text" class="small" name="name" value="{{$zhifu['name']}}">
                         </div>
                         <label class="mws-form-label">图片</label>
                         <div class="mws-form-item">
                              <input type="file" class="small" name="image">
                         </div>
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