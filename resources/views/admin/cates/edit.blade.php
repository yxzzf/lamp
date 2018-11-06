@extends('layouts.index') @section('title') 分类修改 @endsection @section('title','分类修改') 
@section('content')

<div class="mws-panel-body no-padding">
    <form class="mws-form" action="/admin/cates/{{ $cates['id'] }}" method="post">
        <div class="mws-form-block">
            <h2>{{ $title }}</h2>
                <div class="mws-form-row">
                    <label class="mws-form-label">分类名称</label>
                    <div class="mws-form-item">
                        <input type="text"
                         name="cname" class="large" value="{{ $cates->cname }}">
                    </div>
                </div>
            </div>
            <br>

            {{method_field('PUT')}}
            {{csrf_field()}}
            <button class="waves-effect waves-light btn" style="margin-left:0px;">修改</button>
    </form>
</div>
@endsection