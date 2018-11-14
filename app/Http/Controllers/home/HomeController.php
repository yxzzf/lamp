<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Cates;
use App\Model\Links;
use App\Model\Tag;
use App\Model\Setting;
use App\Model\Guanggao;
use App\Model\Shops;
use App\Model\Lunbotus;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cates = Cates::all();
        $guanggao = Guanggao::all();
        $lunbotus = Lunbotus::all();
        $links = Links::all();
        $shops = Shops::all();
        $tag = Tag::all();
        $setting = Setting::first();
        return view('home',['cates'=>$cates,'tag'=>$tag,'shops'=>$shops,'guanggao'=>$guanggao,'links'=>$links,'lunbotus'=>$lunbotus,'setting'=>$setting]);
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


    public function modify()
    {
        return view('home.modify.modify');
    }
}
