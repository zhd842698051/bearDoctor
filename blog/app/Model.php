<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    // protected  $table = "posts";
    protected $guarded = [];//不可注入字段
    //protected $fillable = ['title','content'];//可注入字段1
}
