<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Cates;
use DB;

class CatesController extends Controller
{
    /**
     * 分类数据处理
     */
    public static function getCates()
    {
        $cates = Cates::all();

        foreach($cates as $key => $value){
            $a = substr_count($value->path, ',');
            $cates[$key]->cname = str_repeat('|一一', $a).$value->cname;
        }
        return $cates;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search','');
        // 搜索
        $cates = Cates::where('cname','like','%'.$search.'%')
                ->get();

        

        return view('admin.cates.index',['cates'=>$cates,'title'=>'分类浏览']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cates = new Cates;
        return view('admin.cates.create',['cates'=>$cates,'title'=>'分类添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 添加数据
        $cates = new Cates;
        // 获取添加数据的数据
        $cates->cname = $request->input('cname','');
        $cates->intro = $request->input('intro','');
        if($cates -> save()){
            return redirect('/admin/cates')->with('success','添加成功');
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
        // 带着要修改的值,跳转到修改页面
        $cates = Cates::findOrFail($id);
        return view('admin.cates.edit',['cates'=>$cates,'title'=>'分类修改']); 
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
        $cates = Cates::findOrFail($id);
        // 获取修改后的数据
        $cates -> cname = $request->cname;
        $cates -> intro = $request->intro;

        if($cates -> save()){
            return redirect('/admin/cates')->with('success', '修改成功');
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
        // 获取要删除数据的ID
        $cates = Cates::findOrFail($id);
        // 该ID下有子分类不能删除
        if($cates){
            return back()->with('error','此分类有商品请不要删除');
        }

        if($cates->delete()){
             return redirect('/admin/cates')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
