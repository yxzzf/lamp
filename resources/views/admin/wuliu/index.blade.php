@extends('layouts.index') @section('title') 物流浏览 @endsection @section('title','物流浏览') 
@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>{{ $title }}</span>
    </div>
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">


    <div id="mws-panel-body no-padding" class="dataTables_wrapper" style="text-align:center">
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>友情名称</th>
                    <th>友情地址</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
           @foreach($wuliu as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->name}}</td>
                    <td><img src="{{$v->image}}" alt="" width="70"></td>
                    <td>
                        <form action="/admin/wuliu/{{$v->id}}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <a href="/admin/wuliu/{{$v->id}}/edit" class="btn btn-success">修改</a>
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