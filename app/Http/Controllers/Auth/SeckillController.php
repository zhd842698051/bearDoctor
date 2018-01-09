<?php

namespace App\Http\Controllers\Auth;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\UserController;

class SeckillController extends Controller
{


    //抢购
    public function seckill()
  {
    $user = UserController::status();
 
    $data = \App\Seckill::orderBy('created_at','update_at','seckill_price')->get()->toArray();
    // dd($data);die;

    //获取数据库时间
    $time=strtotime('created_at');
    // dd($time);

    //获取本地时间
    date_default_timezone_set("PRC");
    strtotime('now');


    foreach ($data as $key => $value) {
      $goods=\App\Goods::where(['id'=>$data[$key]['goods_id']])->first()->toArray();
      // dd($goods);
      $data[$key]['name']=$goods['name'];
      $data[$key]['sell_price']=$goods['sell_price'];
      $data[$key]['cover']=$goods['cover'];
    }
    
    return view('seckill/seckill',compact('data','user'));
  }

    //优惠券
    public function coupon()
    {
        return view('seckill/coupon');
    }


}