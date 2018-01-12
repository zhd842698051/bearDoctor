<?php

namespace App\Http\Controllers\Auth;
use Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use App\Http\Controllers\Auth\UserController;
use App\Seckill;

class SeckillController extends Controller
{
    //抢购
    public function seckill()
  {
    // $user = UserController::status();
    $data = \App\Seckill::orderBy('start_time','end_time','seckill_price')->get()->toArray();
    // dd($data);

    //获取本地时间
    date_default_timezone_set("PRC");
    $nowtime=time();

    foreach ($data as $key => $value) {
      $data[$key]['start_time'] = strtotime($value['start_time'])-$nowtime;
      $data[$key]['end_time'] = $value['end_time'];
       $data[$key]['start_time'] = $value['start_time'];
       $data[$key]['seckill_stock']=$value['seckill_stock'];
      // dd($data[$key]);
      $goods=\App\Goods::where(['id'=>$data[$key]['product_id']])->first();
      // dd($goods);
      $data[$key]['name']=$goods['name'];
      $data[$key]['sell_price']=$goods['sell_price'];
      $data[$key]['cover']=$goods['cover'];
    }

    return view('seckill/seckill',compact('data'));

  }

  //判断库存
  public function show(){
        $id=8;
        // dd($id);
       $res=Seckill::where([['id','=',$id],['seckill_stock','>','0']])->first()->toArray();
       
       if($res){
        $data['error']=0;
        $data['seckill_stock']=$res;
       }else{
        $data['error']=1;
       }
       echo json_encode($data);
  }
 
    //优惠券
    public function coupon()
    {
        return view('seckill/coupon');
    }


}