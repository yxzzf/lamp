<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Model\Shopcars;
use App\Model\Shops;
use App\Model\Links;
use App\Model\Setting;
use App\Model\Kows;
use App\Model\Users;
use App\Model\Baozhuangs;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShopcarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        $kows = Kows::all();
        $baozhuangs = Baozhuangs::all();

        return view('home.shop.car',['shops'=>$shops,'shop_id'=>$shop_id,'shopcars'=>$shopcars,'links'=>$links,'setting'=>$setting,'title'=>'购物车','kows'=>$kows,'baozhuangs'=>$baozhuangs]);
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
    public function edit(Request $request, $id)
    {

        // if(empty($request->kows_id)){
        //     return back()->('error','口味不能为空');
        
        // }

        $shopcar = new Shopcars();
        $shopcar->shops_id = $id;
        $shopcar->kows_id = $request->kows_id;
        $shopcar->baozhuangs_id = $request->baozhuangs_id;
        $shopcar->shuliang = $request->shuliang;
        $shopcar->users_id = session('id');
        
        if(empty($request->kows_id)){
            return back()->with('error','口味不能为空');
        }
        if(empty($request->baozhuangs_id)){
            return back()->with('error','包装不能为空');
        }
        if ($shopcar->save()) {
           return redirect('/')->with('success','添加成功');
        }else{
              return back()->with('error','添加失败');
        }

        // $k = $request->all();
        // $kows_id = $k['kows_id'];
        // $baozhuangs_id = $k['baozhuangs_id'];
        // $kows = Kows::where('id','=',$kows_id)->first();

        // $baozhuang = Baozhuangs::where('id','=',$baozhuangs_id)->first();

        // $uid = session('id');
        // $shopcars = Shopcars::where('users_id',$uid)->get();
        // $shop_id = [];
        // foreach ($shopcars as $k => $v) {
        //     $shop_id[] = $v['shops_id'];
        // }
        
        // $shopcars

        

        // $setting = Setting::first();
        // $links = Links::all();
        // $shops = Shops::all();

        // return view('home.shop.car',['shops'=>$shops,'shop_id'=>$shop_id,'shopcars'=>$shopcars,'links'=>$links,'setting'=>$setting,'title'=>'购物车','kows'=>$kows,'baozhuang'=>$baozhuang]);
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
        $shopcars = Shopcars::findOrFail($id);
        $uid = session('id');
        if($shopcars->delete()){
             return back()->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
