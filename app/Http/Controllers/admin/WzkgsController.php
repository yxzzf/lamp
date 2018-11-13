<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Model\Wzkgs;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class WzkgsController extends Controller
{
    public function create()
    {
        return view('admin.index');
    }
    
    public function store(Request $request)
    {
        $wzkgs = Wzkgs::find(1);
        $wzkgs->kg = $request->kg;
        if($wzkgs -> save()){
            return redirect('/admin/wzkgs/create')->with('success', '更改成功 ! ! !');
        }else{
            return back()->with('error','修改失败');
        }
    }


}
