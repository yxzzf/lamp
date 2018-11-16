@extends('layouts.index') @section('title') 物流修改 @endsection @section('title','物流修改') 
@section('content')

<div class="mws-panel-body no-padding">
	<form class="mws-form" action="/admin/wuliu/{{ $wuliu['id'] }}" method="post"  enctype="multipart/form-data">
		<div class="mws-form-block">
			<h2>{{ $title }}</h2>
			<label class="mws-form-label">物流名称:</label>
			<div class="mws-form-item">
				<input type="text" value="{{ $wuliu['name'] }}" class="small" name="name">
			</div>
			<div class="mws-form-row">
                    <label class="mws-form-label">物流图片</label>
                    <div class="mws-form-item">
                        <input type="file" name="images" value="{{ $wuliu['image'] }}">
                    </div>
                </div>
			<br>

			{{method_field('PUT')}}
			{{csrf_field()}}
            <button class="waves-effect waves-light btn" style="margin-left:0px;">修改</button>
	</form>
</div>
@endsection