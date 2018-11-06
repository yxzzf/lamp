<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tuijian extends Model
{
    //
    protected $table = 'tuijian';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
