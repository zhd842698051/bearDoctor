<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;


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

    public function goodsAttrs(){
        return $this->hasMany('App\GoodsAttr','goods_id','id');
    }
}
