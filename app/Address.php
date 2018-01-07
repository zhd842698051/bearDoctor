<?php

namespace App;


class Address extends Model
{
    protected $table = 'address';

    //根据当前用户查询其收货地址
    public static function userAddress($user_id){
        $userAddress=Address::where('user_id','=',$user_id)->get();
        return $userAddress;
    }

    //删除收货地址
    public static function delAddress($address_id){
        $res=Address::where('id','=',$address_id)->delete();
        return $res;
    }

    //查询当前用户是否已经设置过默认地址
    public static function is_default($user_id){
          $is_default=Address::where('user_id','=',$user_id)->get();
          return $is_default;
    }
}
