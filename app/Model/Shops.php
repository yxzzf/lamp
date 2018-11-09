<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model
{
    public function cates()
	{
	    return $this->hasOne('App\Model\Cates','id','cates_id');
	}
}
