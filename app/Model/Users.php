<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    public $table = 'users';
    public function comment()
    {
        return $this->hasMany('App\Model\Comment');
    }

    public function shops()
    {

        return $this->belongsToMany('App\Model\Shops');
    }
    public function order()
    {

        return $this->belongsToMany('App\Model\order');
    }
    public function Dizhis()
    {
        return $this->hasMany('App\Model\Dizhis','id','uid');
    }
    public function collect()
    {
        return $this->hasMany('App\Model\Collect');
    }
    
}
