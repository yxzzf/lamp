@extends('layouts.index') @section('title') 用户浏览 @endsection @section('title','用户浏览') 
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>{{ $title }}</span>
    </div>
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
    <form action="/admin/user" method="get">
    <div id="DataTables_Table_1_length" class="dataTables_filter">
        <label style="float
        :left">显示 
            <select size="1" name="showCount" aria-controls="DataTables_Table_1">
            <option value="3"  @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 3) selected @endif>3</option>
            <option value="5"  @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 5) selected @endif>5</option>
            <option value="10"  @if((isset($request['showCount']) && !empty($request['showCount'])) && $request['showCount'] == 10) selected @endif>10</option>
            </select>条
        </label>
        <label>关键字: 
            <input type="text" name="search" aria-controls="DataTables_Table_1">
            <input type="submit" value="搜索" value="{{ $request['search'] or '' }}" class="btn btn-info">
        </label>
    </div>
    </form>
</div>
    <div id="mws-panel-body no-padding" class="dataTables_wrapper" style="text-align:center">
        <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
            <table class="mws-table">
                <thead>
                        <tr>
                            <th>ID</th>
                            <th>用户名</th>
                            <th>手机号</th>
                            <th>性别</th>
                            <th>权限</th>
                            <th>邮箱</th>
                            <th>头像</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                        	@foreach($users as $k=>$v)
                        	<tr class="odd">
                                    <td class="table-id">{{$v->id}}</td>
                                    <td class="table-uname">{{$v->uname}}</td>
                                    <td class="table-phone">{{$v->phone}}</td>
                                    <td class="table-phone">
                                        @if($v->sex == '1') 男 @elseif($v->sex == '2') 女 @elseif($v->sex == '3') 保密 @endif
                                    </td>
                                    <td class="table-phone">
                                        @if($v->qx == '1') 普通会员 @elseif($v->qx == '2') 管理员 @endif
                                    </td>
                                    <td class="table-email">{{$v->email}}</td>
                                    <td class="table-pic"><span><img width="40px" height="40px" src="{{$v->pic}}" alt=""></span></td>
                                    <td class=" ">
                                    
                                        <form action="/admin/user/{{$v->id}}" method="post">
                                        <span class="btn-group">
			                            {{method_field('DELETE')}}
			                            {{ csrf_field() }}
			                            <a href="/admin/user/{{$v->id}}/edit" class="btn btn-success">修改</a>
			                            <input type="submit" value="删除" class="btn btn-danger">
			                            </span>
                        </form>
                                    </td>

                                </tr>
							@endforeach
          </tbody>
        </table>
    </div>
    <div class="dataTables_info" id="DataTables_Table_1_info">{{ date('Y年m月d日 H:i',time()) }}</div>
    <div id="page_page">
    {!! $users->render() !!}
    </div>
</div>
</div>
		
@endsection