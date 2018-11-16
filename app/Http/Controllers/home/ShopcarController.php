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
    public function index(Request $request,$id)
    {
        echo 'aaaaa';
        // $shopcar = new Shopcars();
        // $shopcar->shops_id = $id;
        // $shopcar->kows_id = $request->kows_id;
        // $shopcar->baozhuangs_id = $request->baozhuangs_id;
        // $shopcar->shuliang = $request->shuliang;
        // dd($shopcar);
        // $shopcar->save();
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
        dd(11111);
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
