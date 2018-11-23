<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Model\Users;
use App\Model\Shops;
use App\Model\Dizhis;
use App\Model\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
          
       $showCount = $request->input('showCount',3);
        $search = $request->input('search','');

        $orderfy = Order::where('uid','like','%'.$search.'%')->paginate($showCount);
        $order = Order::all();
        $shops = Shops::all();
        return view('admin.order.index',['order'=>$order,'shops'=>$shops,'orderfy'=>$orderfy,'request'=>$request]);
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
        $order = Order::findOrFail($id);
        if($order->delete()){
            return redirect('/admin/order')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
