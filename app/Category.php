<?php

namespace App;

use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class Category extends Model
{
    use ModelTree, AdminBuilder;

    protected $table = 'category';

    public function brand(){
        return $this->belongsToMany(Brand::class);
    }

    public function attr(){
        return $this->belongsToMany(Attr::class);
    }

}
