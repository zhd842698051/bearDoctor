<?php

namespace App\Http\Controllers\Auth;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Http\Controllers\Auth\UserController;

class SeckillController extends Controller
{
    //抢购
    public function seckill()
  {
    // $user = UserController::status();
    $data = \App\Seckill::orderBy('start_time','end_time','seckill_price')->get()->toArray();
    // dd($time);

    //获取本地时间
    date_default_timezone_set("PRC");
    $nowtime=time();
    
    foreach ($data as $key => $value) {
      $data[$key]['start_time'] = strtotime($value['start_time'])-$nowtime;
    
      // dd($data[$key]);
      $goods=\App\Goods::where(['id'=>$data[$key]['product_id']])->first();
      // dd($goods);
      $data[$key]['name']=$goods['name'];
      $data[$key]['sell_price']=$goods['sell_price'];
      $data[$key]['cover']=$goods['cover'];
    }
    return view('seckill/seckill',compact('data'));
  }
  

    //优惠券
    public function coupon()
    {
        return view('seckill/coupon');
    }


}