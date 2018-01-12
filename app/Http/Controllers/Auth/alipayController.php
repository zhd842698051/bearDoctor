<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\OrderController;
use App\Order;
//use Latrell\Alipay\Web\SdkPayment;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class alipayController extends Controller{
    use DatabaseTransactions;
  public function Alipay(){
    $order_no=request('order_no');
    $goods=request('goods');
    $money=request('money');
    $alipay = app('alipay.web');
    $alipay->setOutTradeNo($order_no);
    $alipay->setTotalFee('0.01');
    $alipay->setSubject($goods);
    $alipay->setBody($goods);

    $alipay->setQrPayMode('5'); //该设置为可选1-5，添加该参数设置，支持二维码支付。

    // 跳转到支付页面。

    return redirect()->to($alipay->getPayLink());
}

// 异步通知支付结果
public function AliPayNotify(Request $request){
    $data=$request->input();
    file_put_contents('pay.log', json_encode($data));
// 验证请求。
if (!app('alipay.web')->verify()) {
    Log::notice('Alipay notify post data verification fail.', [
        'data' => $request->instance()->getContent()
    ]);
    return 'fail';
}
// 判断通知类型。
switch ($request ->input('trade_status','')) {
    case 'TRADE_SUCCESS':
    case 'TRADE_FINISHED':
        // TODO: 支付成功，取得订单号进行其它相关操作。

        Log::debug('Alipay notify post data verification success.', [
            'out_trade_no' => $request -> input('out_trade_no',''),
            'trade_no' => $request -> input('trade_no','')
        ]);
        break;
}
return 'success';
}

// 同步通知支付结果
public function AliPayReturn(Request $request){
// 验证请求。
if (!app('alipay.web')->verify()) {
    Log::notice('支付宝返回查询数据验证失败。', [
        'data' => $request->getQueryString()
    ]);
    return view('alipayfail');
}
// 判断通知类型。
switch ($request ->input('trade_status','')) {
    case 'TRADE_SUCCESS':
    case 'TRADE_FINISHED':
         // TODO: 支付成功，取得订单号进行其它相关操作。
       $time=date("Y-m-d H:i:s",time());
        $order_no=$request->input('out_trade_no');
        $data['pay_type']=1;
        $data['status']=2;
        $data['pay_time']=$request->input('notify_time');
        $data['real_money']=$request->input('total_fee');
        Order::where(['order_no'=>$order_no])->update($data);
        Log::debug('支付宝通知获得数据验证成功。', [
            'out_trade_no' => $request ->input('out_trade_no',''),
            'trade_no' => $request -> input('trade_no','')
        ]);
        break;

}

return view('alipay/success');
}

}