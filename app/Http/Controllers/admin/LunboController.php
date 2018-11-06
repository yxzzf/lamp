<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\data;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Image;
use App\Model\Lunbotus;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LunboController extends Controller
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
        
        $lunbotu = Lunbotus::where('url','like','%'.$search.'%')->paginate($showCount);
        return view('admin.lunbo.index',['lunbotus'=>$lunbotu,'title'=>'轮播图列表','request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.lunbo.create',['title'=>'轮播图添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request -> hasFile('pic')){
            $profile = $request -> file('pic'); 
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext; 
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim('.'.$dir_name.'/'.$file_name,'.');
        }

        $res = new Lunbotus;
        $res -> url = $request -> url;
        $res -> pic = $profile_path;
        $res -> status = $request-> status;

       if($res -> save()){
            return redirect('/admin/lunbo')->with('success','添加成功');
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
        $lunbo = Lunbotus::findOrFail($id);
        return view('admin.lunbo.edit',['lunbo'=>$lunbo,'title'=>'修改']); 
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
        if($request -> hasFile('pic')){
            $profile = $request -> file('pic'); 
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext; 
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim('.'.$dir_name.'/'.$file_name,'.');
        }
        $lunbo = lunbotus::findOrFail($id);

        $lunbo -> url = $request->url;
        $lunbo -> pic = $profile_path;
        $lunbo -> status = $request->status;

        if($lunbo -> save()){
            return redirect('/admin/lunbo')->with('success', '修改成功');
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
        $Lunbotu = lunbotus::findOrFail($id);
        if($Lunbotu->delete()){
             return redirect('/admin/lunbo')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
