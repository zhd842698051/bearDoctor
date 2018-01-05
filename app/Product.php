<?php

namespace App;


class Product extends Model
{
    protected $table = 'product';

    //和购物车关联
    // public function cart()
    // {
    // 	return $this->hasOne('App\Cart');
    // }
}
