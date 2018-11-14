<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	public function shops()
	    {
	        return $this->hasMany('App\Model\Shops','id');
	    }
 	public function cates()
 	{
 		return $this->belongsTo('App\Model\Cates','cates_id','id');
 	}
}
