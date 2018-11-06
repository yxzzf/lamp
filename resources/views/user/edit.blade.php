@extends('layouts.index') @section('title') 用户修改 @endsection @section('title','用户修改') 
@section('content')
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>用户修改</span>
    </div>
    <div class="mws-panel-body no-padding">      
        <form class="mws-form" action="/admin/user/{{$users->id}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户姓名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="uname" value="{{$users->uname}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">手机号</label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="phone" value="{{$users->phone}}">
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">性别</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            @if($users -> sex == '1')
                            <li><input type="radio" name="sex" value="1" id="s1" checked> <label for="s1">男</label></li>
                            @else
                            <li><input type="radio" name="sex" value="1" id="s1"> <label for="s1">男</label></li>
                            @endif
                            @if($users -> sex == '2')
                            <li><input type="radio" name="sex" value="2" id="s2" checked> <label for="s2">女</label></li>
                            @else
                            <li><input type="radio" name="sex" value="2" id="s2"> <label for="s2">女</label></li>
                            @endif
                            @if($users -> sex == '3')
                            <li><input type="radio" name="sex" value="3" id="s3" checked> <label for="s3">保密</label></li>
                            @else
                            <li><input type="radio" name="sex" value="3" id="s3"> <label for="s3">保密</label></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">权限</label>
                    <div class="mws-form-item">
                        <select class="large" name="qx">
                            <option value="1" {{ $users->qx == 1 ? 'selected' : '' }}>普通会员</option>
                            <option value="2" {{ $users->qx == 2 ? 'selected' : '' }}>管理员</option>
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">邮箱</label>
                    <div class="mws-form-item">
                        <input type="text" class="large" name="email" value="{{$users->email}}">
                    </div>
                </div>
            </div>
            <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">用户头像</label>
                        <div class="am-u-sm-9">
                            <div class="am-form-group am-form-file">
                                <div class="tpl-form-file-img">
                                </div>
                                <input id="doc-form-file" type="file" name="pic" value="{{$users->pic}}">
                            </div>
                        </div>
                    </div>
            <div class="mws-button-row">
                <input type="submit" value="修改" class="btn btn-danger">
                <input type="reset" value="重置" class="btn ">
            </div>
        </form>
    </div>      
</div>
@endsection