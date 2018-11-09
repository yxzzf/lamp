@extends('layouts.index') @section('title') 网站设置 @endsection @section('title','网站设置') @section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title or '' }}</span>
    </div>
<div class="mws-panel-body no-padding">
    <form class="col s12" method="post" action="/admin/setting" enctype="multipart/form-data">
        <div class="row"><br>
            <div class=" col s6">
                <label for="mws-form-item">&nbsp;&nbsp;标题</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id="first_name" type="text" class="small" name="title" value="{{$setting['title']}}">
            </div><br>
            <div class=" col s6">
                <label for="mws-form-item">&nbsp;&nbsp;关键字</label>&nbsp;&nbsp;&nbsp;
                <input id="last_name" type="text" class="small" name="keywords" value="{{$setting['keywords']}}">
            </div>
        </div><br>
        <div class="row">
            <div class=" col s12">
                <label for="password">&nbsp;&nbsp;描述</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <textarea class="" name="description" rows="5">{{$setting['description']}}</textarea>
            </div>
        </div><br>
        <div class="row">
            <div class=" col s12">
                <label for="password">&nbsp;&nbsp;logo</label>
                <input type="file" name="logo" class="waves-effect waves-light btn" id="user-name" placeholder="" style="margin-left:60px;">
            </div>
        </div><br>
        <div class="row">
            <div class="mws-form-item">
                <label for="email">&nbsp;&nbsp;版权</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id="email" type="text" class="small" name="banquan" value="{{$setting['banquan']}}">
            </div>
        </div><br>
        {{csrf_field()}}
        <button class="waves-effect waves-light btn" style="margin-left:450px">提交</button>
    </form>
    <div class="clearBoth"></div>
</div>
</div>
@endsection