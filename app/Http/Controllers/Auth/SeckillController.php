<?php

namespace App\Http\Controllers\Auth;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class SeckillController extends Controller
{
    //抢购
    public function seckill()
  {

    $data = \App\Brand::orderBy('created_at','update_at')->get();
		
    return view('seckill/seckill',compact('data'));
  }

  // public function show(){
  // 	date_default_timezone_set('prc');//配置时差
    
  // 	 $time=time(request('time'));//数据库时间
    
  //    $now=strtotime(date("y-m-d h:i:s",time()));//当前时间戳
     
  // }


    $data = \App\Seckill::orderBy('created_at','update_at','seckill_price')->get()->toArray();
    // dd($data);die;

    foreach ($data as $key => $value) {
      $goods=\App\Goods::where(['id'=>$data[$key]['goods_id']])->first()->toArray();
      // dd($goods);
      $data[$key]['goods']=$goods['name'];
      $data[$key]['sell_price']=$goods['sell_price'];
      $data[$key]['price']=$goods['promotion_price'];
      $data[$key]['cover']=$goods['cover'];

    }
    // dd($data);
    return view('seckill/seckill',compact('data'));
  }


    //优惠券
    public function coupon()
    {
        return view('seckill/coupon');
    }


}