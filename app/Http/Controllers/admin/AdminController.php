<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Model\Setting;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Users;
use Hash;

class AdminController extends Controller
{
    public function setting()
    {
        //读取表中的数据
        $setting = setting::first();

        return view('admin.setting', compact('setting'),['title'=>'网站配置']);
    }

    public function update(Request $request)
    {
    	// 修改logo 
    	if($request -> hasFile('logo')){
            $profile = $request -> file('logo');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/logo/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            // 如果没有修改就使用默认logo
            $profile_path = '/uploads/iaugfa105210350.png';
        }

		$setting = setting::first();
		if(!$setting){
			$setting = new setting;
		}
        // 网站控制中的所有数据,并修改
		$setting -> title = $request->title;
		$setting -> keywords = $request->keywords;
		$setting -> description = $request->description;
		$setting -> logo = $profile_path;		
		$setting -> banquan = $request->banquan;
		$setting -> close = $request->close;
		if($setting->save()){
			return back()->with('success','设置成功');
		}else{
			return back()->with('error','设置失败!!');
		}
    }

    public function htmm()
    {
        $id = session('adminUser')->id;
        $user = Users::where('id','=',$id)->first();
        return view('admin.ggmm.htmm',['title'=>'修改密码','user'=>$user]);
    }

    public function zmxg(Request $request, $id)
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
