@extends('layouts.index')
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>地址修改</span>
    </div>
    <div class="mws-panel-body no-padding">      
        <form class="mws-form" action="/admin/dizhi/{{$dizhis->id}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">收货人</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="uname" value="{{$dizhis->uname}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">电话</label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="phone" value="{{$dizhis->phone}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">地址</label>
                    <div class="mws-form-item">
                        <input type="password" class="medium" name="dizhi" value="{{$dizhis->dizhi}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">详细地址</label>
                    <div class="mws-form-item">
                        <input type="text" class="large" name="xd" value="{{$dizhis->xd}}">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-danger">
                <input type="reset" value="重置" class="btn ">
            </div>
        </form>
    </div>      
</div>
@endsection