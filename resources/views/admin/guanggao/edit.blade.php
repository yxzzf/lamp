@extends('layouts.index') @section('title') 广告修改 @endsection @section('title','广告修改') 
@section('content')

<div class="mws-panel-body no-padding">
	<form class="mws-form" action="/admin/guanggao/{{ $gg['id'] }}" method="post"  enctype="multipart/form-data">
		<div class="mws-form-block">
			<h2>{{ $title }}</h2>
			<label class="mws-form-label">广告名称:</label>
			<div class="mws-form-item">
				<input type="text" value="{{ $gg['name'] }}" class="small" name="name">
			</div>
			<label class="mws-form-label">广告内容:</label>
			<div class="mws-form-item">
				<input type="text" value="{{ $gg['content'] }}" class="small" name="content">
			</div>
			<div class="mws-form-row">
                    <label class="mws-form-label">广告图片</label>
                    <div class="mws-form-item">
                        <input type="file" name="images" value="{{ $gg['images'] }}">
                    </div>
                </div>
			<br>

			{{method_field('PUT')}}
			{{csrf_field()}}
            <button class="waves-effect waves-light btn" style="margin-left:0px;">修改</button>
	</form>
</div>
@endsection