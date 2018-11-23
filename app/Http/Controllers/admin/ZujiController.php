<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Users;
use App\Model\Shops;
use App\Model\Zuji;
use DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class ZujiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // echo '111';
         $showCount = $request->input('showCount',5);

        $search = $request->input('search','');
       

        $zujis = Zuji::where('user_id','like','%'.$search.'%')->paginate($showCount);
        return view('admin.zuji.index',['request'=>$request,'zujis'=>$zujis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = Users::all();
        $shops = Shops::all();
        return view('admin.zuji.create',compact('users','shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zuji = new Zuji;
        $zuji -> user_id = $request->user_id;
        $zuji -> shop_id= $request->shop_id;
        if($zuji -> save()){
            return redirect('/admin/zuji')->with('success','添加成功');
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
        $zuji = Zuji::findOrFail($id);
        if($zuji->delete()){
            return redirect('/admin/zuji')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

}
