@extends('layouts.index') @section('title') 商品标签添加 @endsection @section('title','商品标签添加') 
@section('content')

<!-- Panels Start -->

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title }}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/tag" method="post">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">标签名称</label>
                    <div class="mws-form-item">
                        <input type="text" name="tname" class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">所属类别</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            @foreach($cates as $v)
                            <input name="cates_id" type="radio" value="{{$v['id']}}" id="test{{$v['id']}}">
                            <label for="test{{$v['id']}}">{{$v['cname']}}</label>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @endforeach
                        </ul>
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
