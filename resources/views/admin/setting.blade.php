@extends('layouts.index') @section('title') 网站设置 @endsection @section('title','网站设置') 
@section('content')

<div class="mws-panel-body no-padding">
    <form class="mws-form" action="/admin/cates/" method="post">
        <div class="mws-form-block">
            <h2>{{ $title }}</h2>
                <div class="mws-form-row">
                    <label class="mws-form-label">标题</label>
                    <div class="mws-form-item">
                        <input type="text"
                         name="title" class="large" value="">
                    </div>
                </div>
				<div class="mws-form-row">
                    <label class="mws-form-label">版权</label>
                    <div class="mws-form-item">
                        <input type="text"
                         name="banquan" class="large" value="">
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