@extends('layouts.index') @section('title') 订单列表 @endsection @section('title','订单列表') 
@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">

    </div>
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
    <form action="/admin/toutiao" method="get">
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
                <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 116px;">订单ID</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 156px;">用户</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 156px;">商品名</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">商品口味</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">商品包装</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">商品数量</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">物流方式</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">支付方式</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">订单编号</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">收货地址</th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 143px;">订单状态</th>
                <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 102px;">操作</th></tr>
            </thead>
            @foreach($os as $v)
            <tbody role="alert" aria-live="polite" aria-relevant="all">
                <tr class="odd">
                    <td>{{$v->order_id}}</td>
                    <td>{{$v->order->user->uname}}</td>
                    <td>{{$v->shop->sname}}</td>
                    <td>{{$v->flavor->fname}}</td>
                    <td>{{$v->pack->pname}}</td>
                    <td>{{$v->shuliang}}</td>
                    <td>{{$v->order->wuliu->name}}</td>
                    <td>{{$v->order->zhifu->name}}</td>
                    <td>{{$v->order_bh}}</td>
                    <td width="210px">{{$v->order->uaddress->address.$v->order->uaddress->xadress}}</td>
                    <td>{{$v->order->zhuangtai->zhuangtai}}</td>
                    <td width="140px">
                        <a href="/admin/order/{{$v->id}}/edit" style="float:left " class="waves-effect waves-light btn update">编辑</a>
                        <form action="/admin/order/{{$v->order_id}}" method="post">
                            {{method_field('DELETE')}} {{csrf_field()}}
                            <button class="btn btn-danger dropdown-toggle delete" style="float:right">删除</button>
                        </form>
                    </td>       
                </tr>
            </tbody>
            @endforeach
        </table>

    </div>
    <div class="dataTables_info" id="DataTables_Table_1_info">{{ date('Y年m月d日 H:i',time()) }}</div>
    <div id="page_page">

    </div>
</div>
</div> 
@endsection
