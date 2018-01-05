<?php

namespace App;

class Attr extends Model
{
    protected $table = 'attr';
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attribute(){
        return $this->hasMany(Attribute::class,'attr_id');
    }
}
