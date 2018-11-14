<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Zhifus extends Model
{
    //
    public $table = 'zhifus';
    public function order()
    {
    	return $this->hasMany('App\Model\order');
    }
}
