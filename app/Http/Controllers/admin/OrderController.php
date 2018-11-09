<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Model\Order;
use App\Model\Users;

use App\Model\Orderdetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request ,$request)
    {
        //查询订单表 信息
        $res = Order::leftjoin('order_detail','order.id','=','order_detail.id');
        //订单页的分页和搜索
        $res = $res->where('oid','like','%'.Input::get('search').'%')->paginate(5);
        $user = Users::get();
        $search = Input::get('search');
        return view('admin.order.index',compact('res','search','user'));
    }
    /**
     *订单详情
     */
    public function detail($id)
    {
        $input = Order::find($id);
        //查询出订单表里商品ID
        $gid = OrderDetail::where('id',$id)->value('gid');
        //根据此iD查询出所购买商品的具体信息
        $gid = \GuzzleHttp\json_decode($gid);
        foreach($gid as $k=>$v){
            $goods[] = Goods::where('id',$v)->get()[0];
        }
        //订单号
        $num = OrderDetail::where('id',$id)->value('oid');
        //购买商品的总价
       $price = $good[0]['num'] * $good[0]['price'];
        return view('admin.order.detail',compact('ad','goods','num','price','id'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
