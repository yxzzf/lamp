<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    //
    public function shops()
 	{
    	return $this->hasMany('App\Model\Shops','id');
 	} 

 	public function tags()
 	{
 		return $this->hasMany('App\Model\Tag','id','cates_id');
 	}

}
