<?php

namespace App;

class Attribute extends Model
{
    protected $table = 'attribute';
    public function attr(){
        return $this->belongsToMany(Attr::class,'attr_id');
    }
}
