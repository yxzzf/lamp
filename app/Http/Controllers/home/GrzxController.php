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
   {		
   			if($request -> hasFile('pic')){
            $profile = $request -> file('pic');

            $ext = $profile ->getClientOriginalExtension();

            $file_name = str_random(20).time().'.'.$ext;

            $dir_name = './uploads/'.date('Ymd',time());
           
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');

            }


	        $users = Users::find($id);
	        $users -> uname = $request->input('uname');
	        $users -> phone = $request->input('phone');
	        $users -> email = $request->input('email');
	        $users -> sex = $request->input('sex');
	        $users -> pic = $profile_path;
	       if($users ->save()){
                    echo  "<script>alert('修改成功');location.href='/home/grzx'</script>";
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


}
