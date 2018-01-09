<?php

namespace App;

class Order extends Model
{
    protected $table = 'order';

    public static function orderList($user_id){
        $order=Order::where('user_id','=',$user_id)->get();
        return $order;
    }

}
