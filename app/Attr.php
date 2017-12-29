<?php

namespace App;

class Attr extends Model
{
    protected $table = 'attr';
    public function category()
    {
        return $this->belongsToMany(Category::class);
    }
}
