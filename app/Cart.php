<?php

namespace App;
class Cart extends Model
{
    protected $table = 'cart';

    //用户购物车对应的商品
    public function select($userid)
    {
    	$data = self::where("user_id",$userid)->get()->toArray();
    	return $data;
    }
     
}
