<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Model\Zhifus;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ZhifuController extends Controller
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
       

        $zhifuf = zhifus::where('name','like','%'.$search.'%')->paginate($showCount);
        $zhifu = zhifus::orderBy('id','desc')
            ->where('name','like', '%'.request()->keywords.'%')            
            ->get();
        return view('admin.zhifu.index', ['zhifuf'=>$zhifuf,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('admin.zhifu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request -> hasFile('image')){
            $profile = $request -> file('image'); 
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext; 
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim('.'.$dir_name.'/'.$file_name,'.');
        }

        $res = new zhifus;
        $res -> name = $request -> name;
        $res -> image = $profile_path;

       if($res -> save()){
            return redirect('/admin/zhifu')->with('success','添加成功');
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
        //
        $zhifu = zhifus::findOrFail($id);
        return view('admin.zhifu.edit', ['zhifu'=>$zhifu]);
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
        
        $zhifu = zhifus::findOrFail($id);
        
        if($request -> hasFile('image')){
            $profile = $request -> file('image'); 
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext; 
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim('.'.$dir_name.'/'.$file_name,'.');
        }

        $zhifu -> name = $request->name;
        $zhifu -> image = $profile_path;
        if($zhifu->save()){
            return redirect('/admin/zhifu')->with('success','更新成功');
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
        $zhifu = zhifus::findOrFail($id);
        if($zhifu->delete()){
            return redirect('/admin/zhifu')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
