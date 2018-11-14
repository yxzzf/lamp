<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Model\Tag;
use App\Model\Cates;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $showCount = $request->input('showCount',3);
        $search = $request->input('search','');
        $cates = Cates::all();
        $tag = Tag::where('tname','like','%'.$search.'%')->paginate($showCount);
        return view('admin.tag.index',['tag'=>$tag,'title'=>'标签浏览','request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Cates::all();
        $tag = new Tag;
        return view('admin.tag.create',['tag'=>$tag,'cates'=>$cates ,'title'=>'标签添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag;
        $tag -> tname = $request ->tname;
        $tag -> cates_id = $request ->cates_id;
        if($tag -> save()){
            return redirect('/admin/tag')->with('success','添加成功');
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
        $cates = Cates::all();
        $tag = tag::findOrFail($id);
        return view('admin.tag.edit',['tag'=>$tag,'cates'=>$cates,'title'=>'商品标签修改']);
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
        $tag = Tag::findOrFail($id);
        $tag -> tname = $request->tname;
        $tag -> cates_id = $request->cates_id;
        if($tag -> save()){
            return redirect('/admin/tag')->with('success', '修改成功');
        }else{
            return back()->with('error','修改失败');
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
        $tag = Tag::findOrFail($id);
        if($tag->delete()){
             return redirect('/admin/tag')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
