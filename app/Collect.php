<?php

namespace App;

class Collect extends Model
{
    protected $table = 'collect';

    public static function collect($user_id){
        return Collect::where('user_id','=',$user_id)->join('goods','collect.goods_id','=','goods.id')->get();
    }

    //删除用户收藏
    public static function delCollect($user_id,$goods_id){
        return Collect::where('user_id','=',$user_id)->where('goods_id','=',$goods_id)->delete();
    }
}
