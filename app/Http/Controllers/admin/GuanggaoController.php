<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Guanggao;

class GuanggaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 广告显示页面
        $showCount = $request->input('showCount',3);
        $search = $request->input('search','');
        // 搜索分页
        $gg = Guanggao::where('name','like','%'.$search.'%')->paginate($showCount);
        return view('admin.guanggao.index',['gg'=>$gg,'title'=>'广告浏览','request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.guanggao.create',['title'=>'广告添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 广告图片
        if($request -> hasFile('images')){
            $profile = $request -> file('images');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        $gg = new Guanggao;

        $gg -> name = $request ->name;
        $gg -> content = $request ->content;    
        $gg -> images = $profile_path;    

        if($gg -> save()){
            return redirect('/admin/guanggao')->with('success','添加成功');
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
        $gg = Guanggao::findOrFail($id);
        return view('admin.guanggao.edit',['gg'=>$gg , 'title'=>'广告修改']);
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
        // 要修改的广告图片
        if($request -> hasFile('images')){
            $profile = $request -> file('images');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        
        
        $gg = Guanggao::findOrFail($id);
        $gg -> name = $request->name;
        $gg -> content = $request->content;
        $gg -> images = $profile_path;
        
        if($gg -> save()){
            return redirect('/admin/guanggao')->with('success', '修改成功');
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
        // 删除该数据
        $gg = Guanggao::findOrFail($id);
        if($gg->delete()){
             return redirect('/admin/guanggao')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
