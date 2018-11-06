<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Dizhis;



class DizhiController extends Controller
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
       

        $dizhis = Dizhis::where('uname','like','%'.$search.'%')->paginate($showCount);
        return view('dizhi.index',['dizhis'=>$dizhis,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('dizhi.create',['title'=>'地址添加']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [

            'uname' => 'required|unique:dizhis|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/',

        ],[
            'uname.required' => '收货人必填',
            'uname.regex' => '收货人格式错误',
            'uname.unique' => '收货人已存在',
            'phone.required' => '电话号必填',
            'phone.regex' => '电话格式不正确',

        ]);
        $dizhis = new Dizhis;
        $dizhis -> uname = $request->uname;
        $dizhis -> phone = $request->phone;
        $dizhis -> dizhi = $request->sheng.'-'.$request->shi.'-'.$request->xian;
        $dizhis -> xd = $request->xd;

        if($dizhis -> save()) {
            return redirect('/admin/dizhi')->with('success','添加成功');
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
         $dizhis = Dizhis::findOrFail($id);
         return view('/dizhi/edit',['dizhis'=>$dizhis]);
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
        $dizhis = Dizhis::findOrFail($id);
        $dizhis -> uname = $request->uname;
        $dizhis -> phone = $request->phone;
        $dizhis -> dizhi = $request->dizhi;
        $dizhis -> xd = $request->xd;
        if($dizhis->save()){
            return redirect('/admin/dizhi')->with('success','更新成功');
        }else{
            return back()->with('error','更新失败');
        }

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
         $dizhis = Dizhis::findOrFail($id);

        if($dizhis->delete()){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败!');
        }
    }
}
