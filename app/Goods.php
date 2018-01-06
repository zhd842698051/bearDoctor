<?php

namespace App;

class Goods extends Model
{
    //
    protected $table = 'goods';
    protected $guarded = [];
   // protected $fillable = [];
    public function setPicturesAttribute($pictures)
    {
        if (is_array($pictures)) {
            $this->attributes['images'] = implode(',',$pictures);
        }
    }
}
