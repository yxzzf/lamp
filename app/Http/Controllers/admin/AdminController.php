<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Model\Setting;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
    	
    	if($request -> hasFile('logo')){
            $profile = $request -> file('logo');
            $ext = $profile ->getClientOriginalExtension();
            $file_name = str_random(20).time().'.'.$ext;
            $dir_name = './uploads/logo/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }

		$setting = setting::first();
		if(!$setting){
			$setting = new setting;
		}
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
}
