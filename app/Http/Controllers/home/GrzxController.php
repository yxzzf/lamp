<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Users;




class GrzxController extends Controller
{
   public function index(Request $request)
   {	           

    
	  return view('home.grzx.index',['title'=>'个人中心']);

   }


}
