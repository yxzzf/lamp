@extends('layouts.index') @section('title')头条详情页 @endsection @section('title','头条详情页') 
@section('content')
<div class="mws-panel grid_8">
     <div class="mws-panel-header">
          <span>{{$toutiao->title}}</span>
     </div>
     <div class="mws-panel-body">
          <p>{!!$toutiao->content!!}</p>
     </div>
     <div >
          <form action="/admin/toutiao/{{$toutiao->id}}" method="post">
                                {{method_field('DELETE')}}
                                {{ csrf_field() }}
                                <input type="submit" value="删除" class="btn btn-danger">
          </form>
     </div>
</div>
@endsection