<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Model\Wuliu;
use App\Model\Shops;
use App\Model\Links;
use App\Model\Setting;
use App\Model\Shopcars;
use App\Model\Zhifus;
use App\Model\Dizhis;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class JiesuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jiesuan(Request $request)
    {
        // 获取登录用户的ID
        $uid = session('id');
        // 通过登录用户的ID获取购物车表里的数据
        $shopcars = Shopcars::where('users_id',$uid)->get();
        $shop_id = [];
        foreach ($shopcars as $k => $v) {
            $shop_id[] = $v['shops_id'];
        }
        $setting = Setting::first();
        $links = Links::all();
        $shops = Shops::all();
        $zhifu = Zhifus::all();
        $wuliu = Wuliu::all();
        $dizhi = Dizhis::all();
        return view('home.shop.jiesuan',['shops'=>$shops,'zhifu'=>$zhifu,'wuliu'=>$wuliu,'dizhi'=>$dizhi,'shop_id'=>$shop_id,'shopcars'=>$shopcars]);
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
