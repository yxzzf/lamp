<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Model\Toutiao;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ToutiaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //
        $toutiao = Toutiao::all();

        return view('admin.toutiao.index',['toutiao'=>$toutiao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.toutiao.create',['title'=>'头条添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $toutiao = new Toutiao;
        $toutiao->title = $request->input('title','');
        $toutiao->content = $request->input('content','');
        if($toutiao->save()){
            return redirect('/admin/toutiao')->with('success','添加成功');
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
        $toutiao = Toutiao::find($id);
        return view('admin.toutiao.show',['title'=>'头条添加','toutiao'=>$toutiao]);
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
        $toutiao = Toutiao::findOrFail($id);
        if($toutiao->delete()){
             return redirect('/admin/toutiao')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
