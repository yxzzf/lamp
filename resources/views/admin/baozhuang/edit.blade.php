@extends('layouts.index') @section('title') 包装修改 @endsection @section('title','包装修改') 
@section('content')


<!-- Panels Start -->

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/baozhuang/{{$baozhuangs['id']}}" method="post" enctype="multipart/form-data">
            {{ method_field('PUT')}}
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">包装修改</label>
                    <div class="mws-form-item">
                        <input type="text"
                         name="pname" class="large" value="{{$baozhuangs['pname']}}">
                    </div>
                </div>
            </div>
			</div>
            <div class="mws-button-row">
                <input type="submit" value="修改" class="btn btn-success">
                <input type="reset" value="重置" class="btn btn-info">
            </div>
        </form>
    </div>      
</div>
<!-- Panels End -->

@endsection