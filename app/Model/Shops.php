<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
	public $table = 'shops';


    public function cates()
	{
	    return $this->hasOne('App\Model\Cates','id','cates_id');
	}

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
}
