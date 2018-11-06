@extends('layouts.index')
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>{{ $title }}</span>
    </div>
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
    <form action="/admin/tuijian" method="get">
    <div id="DataTables_Table_1_length" class="dataTables_filter">
        <label style="float:left">显示 
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

    <div id="mws-panel-body no-padding" class="dataTables_wrapper" style="text-align:center">
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
        <table class="mws-table">
            <thead>
                <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 116px;">ID</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 156px;">推荐图片</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">推荐名字</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">推荐描述</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 98px;">状态</th><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 102px;">操作</th></tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
            @foreach($tuijian as $k=>$v)
                <tr class="odd">
                        <td class="table-id">{{ $v->id }}</td>
                        <td class="table-pic"><img src="{{ $v ->tpic}}" alt="" width="50"></td>
                        <td class="table-id">{{ $v->sname }}</td>
                        <td class="table-id">{{ $v->miaoshu }}</td>
                        <td class="table-status">
                            @if($v->status == '1') 启用
                                @elseif($v->status == '0') 禁用
                            @endif
                        </td>
                        <td class=" ">
                            <form action="/admin/tuijian/{{$v->id}}" method="post">
                                {{method_field('DELETE')}}
                                {{ csrf_field() }}
                                <a href="/admin/tuijian/{{$v->id}}/edit" class="btn btn-success">修改</a>
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
        {!! $tuijian->render() !!}
    </div>
</div>
</div> 

@endsection