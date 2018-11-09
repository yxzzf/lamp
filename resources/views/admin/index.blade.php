@extends('layouts.index') @section('title') 网站开关 @endsection @section('title','网站开关') @section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>网站开关</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" method="post" action="/admin/wzkgs" enctype="multipart/form-data">
             
              {{ csrf_field() }}
            <div class="mws-form-inline">
            <div class="mws-form-row">
                <label class="mws-form-label">网站开关</label>
                <div class="mws-form-item clearfix">
                    <ul class="mws-form-list inline">
                        <li><input type="radio" name="kg" value="1" id="s1"> <label for="s1">开启网站</label></li>
                        <li><input type="radio" name="kg" value="2" id="s2"> <label for="s2">关闭网站</label></li>
                    </ul>
                </div>
            </div>
            </div>
      
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value='提交'  class="btn btn-success"><br>&nbsp;
        </form>
    </div>      
</div>

@endsection
