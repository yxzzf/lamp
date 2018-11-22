<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Users;
use Hash;
use Auth;
use User;
use App\Model\Dizhis;



class GrzxController extends Controller
{
   public function index()
   {
   	
   		$user = Users::where('id',session('id'))->first();
	  	return view('home.grzx.index',['title'=>'个人中心','user'=>$user]);
   }

   public function grxx($id)
   {
   	$user = Users::where('id','=',$id)->first();
   	return view('home.grzx.grxx',['title'=>'个人信息','user'=>$user]);
   }

   public function xxxg(Request $request, $id)
   {		$this->validate($request, [
        'phone' => 'regex:/^1{1}[345678]{1}[\d]{9}$/',
      ],[
          //格式错误提示
        'phone.regex' => '手机号格式不正确',

      ]);
        $users = Users::find($id);
   			if($request -> hasFile('pic')){
            $profile = $request -> file('pic');

            $ext = $profile ->getClientOriginalExtension();

            $file_name = str_random(20).time().'.'.$ext;

            $dir_name = './uploads/'.date('Ymd',time());
           
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
            $users -> pic = $profile_path;
            }
	        $users -> uname = $request->input('uname');
	        $users -> phone = $request->input('phone');
	        $users -> email = $request->input('email');
	        $users -> sex = $request->input('sex');
	       if($users ->save()){
                   return back()->with('success','修改成功');
                }else{
                    return back()->with('error','修改失败');
                }

  	 }


  	 public function mmxx($id)
  	 {
  	 	//显示密码修改页面
  	 	$id = session('id');
  	 	$user = Users::where('id','=',$id)->first();
  	 	return view('home.grzx.mmxx',['title'=>'密码修改','user'=>$user]);
  	 }

  	  public function zxxg(Request $request, $id)
  	  {

  	  	$user = Users::find($id);
  	    $oldpwd = $request->input('oldpwd');
  	    if (!Hash::check($oldpwd, $user['pwd'])){
    		return back()->with('error','原密码错误,请重新输入');
	
    		}

    		$pwd = Hash::make($request->input('pwd'));
    		$pwdok = Hash::make($request->input('pwdok'));
    		if (Hash::check($oldpwd, $pwd)){
        		return back()->with('error','修改密码不能与原密码相同');
    		}
    		$user->pwd = $pwd;
    		$res = $user->save();
    		if($res){
    			return back()->with('success','修改密码成功');
    		}else{
    			return back()->with('error','修改密码失败');
    		}

     } 

  	  public function dzym(Request $request, $id)
  	  {
  	  	$id = session('id');
  	  	$dizhis = Dizhis::all();
  	  	return view('home.grzx.dzym',['title'=>'地址管理','dizhis'=>$dizhis]);
  	  }


  	  public function dztj(Request $request)
  	  {
  	  	 $this->validate($request, [

           'uname' => 'required|unique:users|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9-_]+$/u',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/',

        ],[
            'uname.required' => '收货人必填',
            'uname.regex' => '收货人格式错误',
            'uname.unique' => '收货人已存在',
            'phone.required' => '电话号必填',
            'phone.regex' => '电话格式不正确',

        ]);   
        $dizhis = new Dizhis;
        $dizhis -> uid = session('id');
        $dizhis -> uname = $request->uname;
        $dizhis -> phone = $request->phone;
        $dizhis -> dizhi = $request->sheng.'-'.$request->shi.'-'.$request->xian;
        $dizhis -> xd = $request->xd;

        if($dizhis -> save()) {
            return redirect('/home/grzx')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
  	  }

  	  public function dzsc($id)
  	  {
  	  	$dizhis = Dizhis::findOrFail($id);

        if($dizhis->delete()){
            return back()->with('success','删除成功');
        }else{
            return back()->with('error','删除失败!');
        }
  	  }


}
