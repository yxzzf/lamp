@extends('layouts.index') @section('title') 包装添加 @endsection @section('title','包装添加') 
@section('content')


<!-- Panels Start -->

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/baozhuang" method="post">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">包装添加</label>
                    <div class="mws-form-item">
                        <input type="text"
                         name="pname" class="large">
                    </div>
                </div>
            </div>
			</div>
            <div class="mws-button-row">
                <input type="submit" value="添加" class="btn btn-success">
                <input type="reset" value="重置" class="btn btn-info">
            </div>
        </form>
    </div>      
</div>
<!-- Panels End -->

@endsection