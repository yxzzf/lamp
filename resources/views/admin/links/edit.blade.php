@extends('layouts.index') @section('title') 友链修改 @endsection @section('title','友链修改') 
@section('content')

<div class="mws-panel-body no-padding">
	<form class="mws-form" action="/admin/links/{{ $links['id'] }}" method="post">
		<div class="mws-form-block">
			<h2>{{ $title }}</h2>
			<label class="mws-form-label">友链名称:</label>
			<div class="mws-form-item">
				<input type="text" value="{{ $links['name'] }}" class="small" name="name">
			</div>
			<label class="mws-form-label">友链地址:</label>
			<div class="mws-form-item">
				<input type="text" value="{{ $links['url'] }}" class="small" name="url">
			</div>
			<br>

			{{method_field('PUT')}}
			{{csrf_field()}}
            <button class="waves-effect waves-light btn" style="margin-left:0px;">修改</button>
	</form>
</div>
@endsection