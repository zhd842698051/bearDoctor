<?php

namespace App;
use App\Model;

class Cart extends Model
{
    protected $table = 'cart';

    //用户购物车对应的商品
    public function select($userid)
    {
    	$data = self::where("user_id",$userid)->get()->toArray();
    	return $data;
    }

    //结算
    public function selNum()
    {
    	$data = self::where("product_id",$this->product_id)->join('product','cart.product_id','=','product.id')->select('cart.id','num','')->get();
    	return $data;
    }

    //删除结算内容
    public function del()
    {
    	return self::where("id",$this->cart_id)->delete();
    }
     
}
