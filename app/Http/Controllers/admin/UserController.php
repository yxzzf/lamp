<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Users;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsersStoreRequest;



class UserController extends Controller
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
       

        $users = Users::where('uname','like','%'.$search.'%')->paginate($showCount);
        return view('user.index',['users'=>$users,'request'=>$request,'title'=>'用户浏览']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          
          return view('user.create',['title'=>'用户添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersStoreRequest $request)
    {

        if($request -> hasFile('pic')){
            $profile = $request -> file('pic');

            $ext = $profile ->getClientOriginalExtension();

            $file_name = str_random(20).time().'.'.$ext;

            $dir_name = './uploads/'.date('Ymd',time());
           
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');

        }
           

            $users = new Users;
            $users->uname = $request->input('uname','');
            $users->phone = $request->input('phone','');
        

            $users->qx = $request->input('qx','');
            $users->sex = $request->input('sex','');
            


            $users->email = $request->input('email','');
            $users->pic = $profile_path;
            $users->pwd = Hash::make($request->pwd);
  
             if($users ->save()){
                    return redirect('/admin/user')->with('success','添加成功');
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
         $users = Users::findOrFail($id);
         return view('/user/edit',['users'=>$users]);
  
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
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');

            }
        //
        $users = Users::findOrFail($id);
        $users -> uname = $request->uname;
        $users -> phone = $request->phone;
        $users -> pwd = $request->pwd;
        $users -> email = $request->email;
        $users -> pic = $profile_path;
        $users->pwd = Hash::make($request->pwd);
        if($users->save()){
            return redirect('/admin/user')->with('success','更新成功');
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
        $users = Users::findOrFail($id);

        if($users->delete()){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败!');
        }
    }





}