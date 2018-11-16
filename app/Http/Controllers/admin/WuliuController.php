<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Model\Wuliu;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class WuliuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wuliu = Wuliu::all();
        return view('admin.wuliu.index',['wuliu'=>$wuliu,'title'=>'物流浏览']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wuliu.create',['title'=>'物流添加']);
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
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            $profile_path = '/uploads/shopimages/baishi.png';
        }
        $wuliu = new Wuliu;
        $wuliu -> name = $request->name;
        $wuliu -> image = $profile_path;

        if($wuliu -> save()){
            return redirect('/admin/wuliu')->with('success','添加成功');
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
        $wuliu = Wuliu::findOrFail($id);
        return view('admin.wuliu.edit',['wuliu'=>$wuliu,'title'=>'物流修改']); 
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
        if($request -> hasFile('image')){
            $profile = $request -> file('image');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            $profile_path = '/uploads/shopimages/baishi.png';
        }
        $wuliu = Wuliu::findOrFail($id);

        $wuliu -> name = $request->name;
        $wuliu -> image = $profile_path;

        if($wuliu -> save()){
            return redirect('/admin/wuliu')->with('success', '修改成功');
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
        $wuliu = Wuliu::findOrFail($id);
        if($wuliu -> delete()){
            return redirect('/admin/wuliu')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
