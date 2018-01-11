<?php

namespace App;

class Order extends Model
{
    protected $table = 'order';

    public static function orderList($user_id){
        $order=Order::where('user_id','=',$user_id)->where('del_order_status','=',0)->paginate(5);
        return $order;
    }

    //修改订单状态
    public static function save_order_status($user_id,$order_id){
        return Order::where('user_id','=',$user_id)->where('id','=',$order_id)->update(['del_order_status' => 1]);
    }

    //查询已经购买的宝贝
    public static function alreadyBuy($user_id){
        return Order::where('user_id','=',$user_id)->where('status','=',5)->where('del_goods_status','=',0)->join('order_goods','order.id','=','order_goods.order_id')->join('product','order_goods.product_id','=','product.id')->join('goods','product.goods_id','=','goods.id')->get();
    }

    //修改订单中商品状态
    public static function save_goods_status($user_id,$order_id,$goods_id){
        return Order::where('user_id','=',$user_id)->where('id','=',$order_id)->update(['del_goods_status' => 1]);
    }
}
