<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Model\Cates;
use App\Model\Setting;
use App\Model\Lunbotus;
use App\Model\Links;
use App\Model\Shops;
use App\Model\Tuijian;
use App\Model\Baozhuangs;
use App\Model\Kows;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 商品显示页面  搜索分页
        $showCount = $request->input('showCount',3);
        $search = $request->input('search','');
        // 获取分类的ID,显示商品属于的分类
        $cates = Cates::all();
        $shops = Shops::where('sname','like','%'.$search.'%')->paginate($showCount);
        return view('admin.shops.index',['shops'=>$shops,'title'=>'商品浏览','request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Cates::all();
        $shops = new Shops;
        return view('admin.shops.create',['shops'=>$shops,'cates'=>$cates,'title'=>'商品添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 添加商品图片和各种数据
        if($request -> hasFile('simage')){
            $profile = $request -> file('simage');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/shangpin/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        if($request -> hasFile('simage2')){
            $profile = $request -> file('simage2');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/shangpin/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path2 = ltrim($dir_name.'/'.$file_name,'.');
        }
        if($request -> hasFile('simage3')){
            $profile = $request -> file('simage3');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/shangpin/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path3 = ltrim($dir_name.'/'.$file_name,'.');
        }

        $shops = new Shops;
        $shops -> sname = $request ->sname;
        $shops -> cates_id = $request ->cates_id;   
        $shops -> money = $request ->money; 
        $shops -> simage = $profile_path;
        $shops -> simage2 = $profile_path2;
        $shops -> simage3 = $profile_path3;
        $shops -> scount = $request ->scount;
        if($shops -> save()){
            return redirect('/admin/shops')->with('success','添加成功');
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
        $setting = Setting::first();
        $lunbotus = Lunbotus::all();
        $links = Links::all();
        $kows = Kows::all();
        $baozhuangs = baozhuangs::all();
        $shops = Shops::findOrFail($id);
        $tuijian = Tuijian::all();
        return view('home.shop.index',['setting'=>$setting,'lunbotus'=>$lunbotus,'links'=>$links,'shops'=>$shops,'kows'=>$kows,'baozhuangs'=>$baozhuangs,'tuijian'=>$tuijian]);
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
        $cates = Cates::all();
        $shops = Shops::findOrFail($id);
        return view('admin.shops.edit',['shops'=>$shops,'cates'=>$cates,'title'=>'商品修改']);
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
        // 修改商品图片及各种数据
        if($request -> hasFile('simage')){
            $profile = $request -> file('simage');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }
        if($request -> hasFile('simage2')){
            $profile = $request -> file('simage2');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path2 = ltrim($dir_name.'/'.$file_name,'.');
        }
        if($request -> hasFile('simage3')){
            $profile = $request -> file('simage3');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path3 = ltrim($dir_name.'/'.$file_name,'.');
        }
        $shops = Shops::findOrFail($id);
        $shops -> sname = $request->sname; // 商品名称
        $shops -> money = $request->money; // 商品价格
        $shops -> scount = $request->scount; // 商品库存
        $shops -> cates_id = $request->cates_id; // 商品分类
        $shops -> simage = $profile_path;
        $shops -> simage2 = $profile_path2;
        $shops -> simage3 = $profile_path3;
        if($shops -> save()){
            return redirect('/admin/shops')->with('success', '修改成功');
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
        $shops = Shops::findOrFail($id);
        if($shops->delete()){
             return redirect('/admin/shops')->with('success','删除成功');
        }else{
             return back()->with('error','删除失败');
        }
    }
}
