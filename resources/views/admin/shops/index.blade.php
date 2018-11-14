@extends('layouts.index') @section('title') 商品浏览 @endsection @section('title','商品浏览')
@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>{{ $title }}</span>
    </div>
    <div class="dataTables_wrapper" id="DataTables_Table_1" role="grid">
    <form action="/admin/shops" method="get">
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
            <input type="text" name="search"  value="{{ $request['search'] or '' }}" aria-controls="DataTables_Table_1">
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
                    <th>商品名称</th>
                    <th>商品类别</th>
                    <th>商品价格</th>
                    <th>商品图片</th>
                    <th>商品图片1</th>
                    <th>商品图片2</th>
                    <th>商品库存</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
           @foreach($shops as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->sname}}</td>
                    <td>{{$v->cates->cname}}</td>
                    <td>{{$v->money}}</td>
                    <td><img src="{{$v->simage}}" width="50" height="50"></td>
                    <td><img src="{{$v->simage2}}" width="50" height="50"></td>
                    <td><img src="{{$v->simage3}}" width="50" height="50"></td>
                    <td>{{$v->scount}}</td>
                    <td>
                        <form action="/admin/shops/{{$v->id}}" method="post">
                            {{method_field('DELETE')}}
                            {{ csrf_field() }}
                            <a href="/admin/shops/{{$v->id}}/edit" class="btn btn-success">修改</a>
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
    {!! $shops->render() !!}
    </div>
</div>
</div> 

@endsection