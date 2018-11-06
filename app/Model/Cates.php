<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    //
    public function shops()
 	{
    	return $this->hasMany('App\Shops');
 	} 

 	public function tags()
 	{
 		return $this->hasMany('App\Tag');
 	}
}
