@extends('layouts.index') @section('title') 足迹列表 @endsection @section('title','足迹列表') 
@section('content')
<div class="mws-panel grid_8">
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
    <form action="/admin/zuji" method="get">
    <div id="DataTables_Table_1_length" class="dataTables_filter">
       
        <label>关键字: 
            <input type="text" name="search" aria-controls="DataTables_Table_1">
            <input type="submit" value="搜索" value="{{ $request['search'] or '' }}" class="btn btn-info">
        </label>
    </div>
    </form>

    <div id="mws-panel-body no-padding" class="dataTables_wrapper" style="text-align:center">
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
        <table class="mws-table">
            <thead>
                <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 116px;">ID</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 156px;">用户名</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">商品名</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">时间</th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 102px;">操作</th></tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                 @foreach($zujis as $v)
                <tr class="odd">
                        <td class="table-id">{{ $v->id }}</td>

                        <td class="table-url">{{$v->user_id}}</td>
    
                        
                        <td class="table-url">{{$v->shop_id}}</td>
                      
                        <td class="table-pic">{{ $v->created_at}}</td>
                        <td class=" ">
                            <form action="/admin/zuji/{{$v->id}}" method="post">
                                {{method_field('DELETE')}}
                                {{ csrf_field() }}
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
         {!! $zujis ->render() !!}
    </div>
</div>
</div> 

@endsection