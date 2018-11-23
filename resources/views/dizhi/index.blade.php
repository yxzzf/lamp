@extends('layouts.index')
@section('content')
	<div class="mws-panel grid_8 mws-collapsible">
    <form action="/admin/dizhi" method="get">
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
                    <div class="mws-panel-inner-wrap"><div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid"><table class="mws-table mws-datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                            <thead>
                                <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 116px;">用户ID</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 156px;">收货人</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">电话</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 98px;">地址</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 98px;">详细地址</th><form action="/admin/xx/uploads" method="post" enctype="multipart/from-data"></form><th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 102px;">操作</th></tr>
                            </thead>
                            
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            @foreach($dizhis as $k=>$v)
                            <tr class="odd">
                                    <td class="table-id">{{$v->id}}</td>
                                    <td class="table-uname">{{$v->uname}}</td>
                                    <td class="table-phone">{{$v->phone}}</td>
                                    <td class="table-email">{{$v->dizhi}}</td>
                                    <td class="table-email">{{$v->xd}}</td>
                                    <td class=" ">
                                    
                                        <form action="/admin/dizhi/{{$v->id}}" method="post">
                                        <span class="btn-group">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <a href="/admin/dizhi/{{$v->id}}/edit" class="btn btn-success">修改</a>
                                        <input type="submit" value="删除" class="btn btn-danger">
                                        </span>
                        </form>
                                    </td>

                                </tr>
                            @endforeach

                    </tbody></table>
                    
                    <div id="page_page">
                    {!! $dizhis->render() !!}
                    </div>
                      </div>
            
                     
                    </div></div>
                    
                </div>
@endsection