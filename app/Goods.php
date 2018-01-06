<?php

namespace App;

<<<<<<< HEAD
=======
//use Illuminate\Database\Eloquent\Model;

>>>>>>> 1ce86247b3f66a3ec17daf6bca917ab04a544719
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
