<?php

namespace App;

class User_prop extends Model
{
    protected $table = 'user_prop';

    //当前用户所拥有的红包
    public static function prop($user_id){
        return User_prop::where('user_id','=',$user_id)->join('prop','user_prop.prop_id','=','prop.id')->get();
    }
}
