<?php

namespace App;

class Brand extends Model
{
    protected $table = 'brand';
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
