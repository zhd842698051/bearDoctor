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
    	$data = self::where("product_id",$this->product_id)->join('product','cart.product_id','=','product.id')->select('cart.id','cart.num','user_id','product_id','price')->first();
    	return $data;
    }

    //删除结算内容
    public function del()
    {
    	return self::where(['product_id'=>$this->product_id,'user_id'=>\Auth::id()])->delete();
    }

    //修改库存数量
    public function updateNum($row,$num)
    {
    	$row->num = $row->num - $num;
    	$sre = $row->save();
    	return $sre;
    }

   
     
}
