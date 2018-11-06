@extends('layouts.index') @section('title') 用户添加 @endsection @section('title','用户添加') 
@section('content')
    <!-- 显示验证错误信息开始 -->
    @if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--显示验证错误信息结束  -->
    <div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{ $title or ''}}</span>
    </div>
    <div class="mws-panel-body no-padding">      
        <form class="mws-form" action="/admin/user" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">用户姓名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="uname" value="{{ old('uname') }}">
                    </div>
                </div>
                    

                <div class="mws-form-row">
                    <label class="mws-form-label">密码</label>
                    <div class="mws-form-item">
                        <input type="password" class="medium" name="pwd" value="">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">手机号</label>
                    <div class="mws-form-item">
                        <input type="text" class="medium" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">性别</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name="sex" value="1" id="s1" checked> <label for="s1">男</label></li>
                            <li><input type="radio" name="sex" value="2" id="s2"> <label for="s2">女</label></li>
                            <li><input type="radio" name="sex" value="3" id="s3"> <label for="s3">保密</label></li>
                        </ul>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">权限</label>
                    <div class="mws-form-item">
                        <select class="large" name="qx">
                            <option value="1">普通会员</option>
                            <option value="2">管理员</option>
                        </select>
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">邮箱</label>
                    <div class="mws-form-item">
                        <input type="text" class="large" name="email" value="{{ old('email') }}">
                    </div>
                </div>
            </div>
            <div class="am-form-group">
                        <label for="user-weibo" class="am-u-sm-3 am-form-label">用户头像</label>
                        <div class="am-u-sm-9">
                            <div class="am-form-group am-form-file">
                                <div class="tpl-form-file-img">
                                </div>
                                <input id="doc-form-file" type="file" name="pic" value="">
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