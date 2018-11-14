<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Baozhuangs;

class BaozhuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	 $baozhuangs = Baozhuangs::orderBy('id','desc')
            ->where('pname','like','%'.request()->keywords.'%')
            ->paginate(5);
       
    	return view('admin.baozhuang.index',['title'=>'商品包装','baozhuangs'=>$baozhuangs,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.baozhuang.create',['title'=>'包装添加']);
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
        $baozhuangs = new Baozhuangs;
        $baozhuangs -> pname = $request -> pname; 
        if($baozhuangs->save()){
            return redirect('/admin/baozhuang')->with('success','添加成功');
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
      $baozhuangs = Baozhuangs::findOrFail($id);
       return view('admin.baozhuang.edit',['title'=>'包装修改','baozhuangs'=>$baozhuangs]);
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
        $baozhuangs = Baozhuangs::findOrFail($id);
        $baozhuangs -> pname = $request -> pname;
        if($baozhuangs->save()){
            return redirect('/admin/baozhuang')->with('success','修改成功');
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
         $baozhuangs = Baozhuangs::findOrFail($id);
        if($baozhuangs -> delete()){
            return redirect('/admin/baozhuang')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
