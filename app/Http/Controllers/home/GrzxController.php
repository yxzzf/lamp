<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Users;





class GrzxController extends Controller
{
   public function index()
   {	
	  	return view('home.grzx.index',['title'=>'个人中心']);
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
	        $users -> pic = $profile_path('pic');
	       if($users ->save()){
                    echo  "<script>alert('修改成功');location.href='/home/denglu'</script>";
                }else{
                    return back()->with('error','修改失败');
                }

   }


}
