<?php

namespace App;


use Illuminate\Support\Facades\App;

class Product extends Model
{
    protected $table = 'product';
    protected $guarded = [];

    public function goods(){
        return $this->belongsTo(Goods::class);
    }
}
