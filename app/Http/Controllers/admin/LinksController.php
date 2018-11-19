<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Links;
use App\Http\Requests\LinksStoreRequest;
use DB;

class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 友链首页显示,分页搜索
        $showCount = $request->input('showCount',3);
        $search = $request->input('search','');

        $links = Links::where('name','like','%'.$search.'%')->paginate($showCount);
        return view('admin.links.index',['links'=>$links,'title'=>'友情链接浏览','request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.links.create',['title'=>'友情链接添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LinksStoreRequest $request)
    {
        //
        $links = new Links;
        // 要添加的数据
        $links -> name = $request ->name;
        $links -> url = $request ->url;


        if($links -> save()){
            return redirect('/admin/links')->with('success','添加成功');
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
        // 跳转修改页面
        $links = Links::findOrFail($id);
        return view('admin.links.edit',['links'=>$links,'title'=>'友链修改']); 
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
        // 修改友链的数据
        $links = Links::findOrFail($id);

        $links -> name = $request->name;
        $links -> url = $request->url;

        if($links -> save()){
            return redirect('/admin/links')->with('success', '修改成功');
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
        //
        $links = Links::findOrFail($id);
        if($links->delete()){
             return redirect('/admin/links')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
