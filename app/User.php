<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'user';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','phone','qq_auth',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function findQq($openId){
        $userQQ=self::where('qq_auth','=',$openId)->get();
        return $userQQ;
    }

    //查找当前的用户名是否绑定openid
    public static function findUsername($username){
        return self::where('username','=',$username)->get()->toArray();
    }

    //修改当前用户名绑定的openID
    public static function save_qq_auth($username,$qq_auth){
        return  self::where('username','=',$username)->update(['qq_auth' => $qq_auth]);
    }
}
