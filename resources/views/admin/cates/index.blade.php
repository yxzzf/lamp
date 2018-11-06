@extends('layouts.index') @section('title') 分类浏览 @endsection @section('title','分类浏览') 
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>{{ $title }}</span>
    </div>
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
    <form action="/admin/cates" method="get">
    <div id="DataTables_Table_1_length" class="dataTables_filter">
        <label>关键字: 
            <input type="text" name="search"  value="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_1">
            <input type="submit" value="搜索" value="{{ $request['search'] or '' }}" class="btn btn-info">
        </label>
    </div>
    </form>

    <div id="mws-panel-body no-padding" class="dataTables_wrapper" style="text-align:center">
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>分类名称</th>
                    <th>分类介绍</th>
                    <th>分类图片</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cates as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->cname}}</td>
                    <td>{{$v->intro}}</td>
                    <td><img src="{{$v->cimage}}" width="50" alt=""></td>
                    <td>
                        <form action="/admin/cates/{{$v->id}}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <a href="/admin/cates/{{$v->id}}/edit" class="btn btn-success">修改</a>
                            <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="dataTables_info" id="DataTables_Table_1_info">{{ date('Y年m月d日 H:i',time()) }}</div>
    <div id="page_page">
    
    </div>
</div>
</div> 

@endsection