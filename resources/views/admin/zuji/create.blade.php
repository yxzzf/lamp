@extends('layouts.index') @section('title') 添加足迹 @endsection @section('title','添加足迹') 
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-body no-padding">
     	<form class="mws-form" action="/admin/zuji" method="post" enctype="multipart/form-data" class="banner-upload">
               <div class="mws-form-inline">
                    <div class="mws-form-row">
                         <label class="mws-form-label">选择用户</label>
                         <div class="mws-form-item">
                              
                              <select class="large" name="user_id">@foreach($users as $v)
                                   <option value="{{$v->uname}}"><font style="vertical-align: inherit;">{{$v->uname}}</font></option>@endforeach    
                              </select>
                              
                         </div>
                    </div>
     			<div class="mws-form-row">
     				<label class="mws-form-label">选择商品</label>
     				<div class="mws-form-item">
                              
     					<select class="large"name="shop_id">
                                 @foreach($shops as $v)  
                                   <option value="{{$v->sname}}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$v->sname}}</font></option>
                                   @endforeach
                              </select>
                              
     				</div>
     			</div>
                    {{csrf_field()}}
     			<div class="mws-form-row">
     				<input type="submit" value="提交" id="img_upload" class="btn btn-danger">
     				<input type="reset" value="取消" class="btn">
     			</div>
     	</form>
     </div> 
</div>
@endsection