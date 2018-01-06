<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;


class Goods extends Model
{
    //
    protected $table = 'goods';

    public function setPicturesAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['images'] = implode(',',$pictures);
        }
    }
}
