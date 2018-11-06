<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Tuijian;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TuijianController extends Controller
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
        
        $tuijian = Tuijian::where('sname','like','%'.$search.'%')->paginate($showCount);
        return view('admin.tuijian.index',['tuijian'=>$tuijian,'title'=>'推荐位列表','request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.tuijian.create',['title'=>'推荐位添加']);
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
         if($request -> hasFile('tpic')){
            $profile = $request -> file('tpic'); 
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext; 
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim('.'.$dir_name.'/'.$file_name,'.');
        }

        $res = new Tuijian;
        $res -> sname = $request -> sname;
        $res -> miaoshu = $request -> miaoshu;
        $res -> tpic = $profile_path;
        $res -> status = $request-> status;

       if($res -> save()){
            return redirect('/admin/tuijian')->with('success','添加成功');
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
         $tuijian = Tuijian::findOrFail($id);
        return view('admin.tuijian.edit',['tuijian'=>$tuijian,'title'=>'推荐位修改']); 
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
        if($request -> hasFile('tpic')){
            $profile = $request -> file('tpic'); 
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext; 
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim('.'.$dir_name.'/'.$file_name,'.');
        }
        $tuijian = Tuijian::findOrFail($id);

        $tuijian -> sname = $request->sname;
        $tuijian -> miaoshu = $request->miaoshu;
        $tuijian -> tpic = $profile_path;
        $tuijian -> status = $request->status;

        if($tuijian -> save()){
            return redirect('/admin/tuijian')->with('success', '修改成功');
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
        $tuijian = Tuijian::findOrFail($id);
        if($tuijian->delete()){
             return redirect('/admin/tuijian')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
