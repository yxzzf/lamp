<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Kows;

class KowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $kows = Kows::orderBy('id','desc')
            ->where('kname','like','%'.request()->keywords.'%')
            ->paginate(5);
       
    	return view('admin.kow.index',['title'=>'口味列表','kows'=>$kows,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kow.create',['title'=>'口味添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         	$kows = new Kows;
	        $kows -> kname = $request -> kname; 
	        if($kows->save()){
	            return redirect('/admin/kow')->with('success','添加成功');
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
        $kows = Kows::findOrFail($id);
      	 return view('admin.kow.edit',['title'=>'口味修改','kows'=>$kows]);
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
        $kows = Kows::findOrFail($id);
        $kows -> kname = $request -> kname;
        if($kows->save()){
            return redirect('/admin/kow')->with('success','修改成功');
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
          $kows = Kows::findOrFail($id);
        if($kows -> delete()){
            return redirect('/admin/kow')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
