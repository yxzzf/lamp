<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Order;
use App\Model\Users;
use App\Model\Shops;
use App\Model\Order_shop;
use App\Model\Zhifus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //读取数据库 获取订单数据
        $os = Order_shop::orderBy('id','desc')
                ->where('order_bh','like', '%'.request()->keywords.'%')
                ->paginate(5);
        return view('admin.order.index', compact('os'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uid = \Session::get('adminUser')['id'];
        // $user = Users::findOrFail($uid); 

         //读取支付信息
        $zhifu = zhifus::all();
      
        // $wuliu = wuliu::all();

        //读取物流信息
        // $wuliu =wuliu::all();
          return view('admin.order.create',['zhifu'=>$zhifu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new order;
        // dd($request-> shop_id);
        $order -> wuliu_id = $request-> wuliu_id;
        $order -> shop_id = $request-> shop_id;
        $order -> uaddress_id = $request-> uaddress_id;
        $order -> order_bh = $request-> order_bh;
        $order -> user_id = $request-> user_id;
        $order -> shopcar_id = $request-> shopcar_id;
        $order -> zhifu_id = $request-> zhifu_id;
       

        if($order -> save()){
            return redirect('/admin/order')->with('success', '添加成功');
        }else{
            return back()->with('error','添加失败');
        }
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
