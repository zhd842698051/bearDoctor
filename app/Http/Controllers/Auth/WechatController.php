<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
class WechatController extends Controller
{
    public function index(Request $request){  
        if(!is_numeric(Input::get('money'))){  
            return Redirect::back();  
        }  
        $money = Input::get('money')*10;   
//因为微信的钱是按分为单位，所以传进来，先*10，然后微信会回调回来，在执行一次这个方法，所以再*10，如果是5元，传个5就变成500分，就是5元钱了  
  
        return view("home.student.jsapi")  
            ->withMoney($money);//把money作为参数带到jsapi.blade.php  
    }  
  
    //这里是你的回调函数，这个很坑，官方都没有文档的  
     public function notify(Request $request){  
        $streamData = isset($GLOBALS['HTTP_RAW_POST_DATA'])? $GLOBALS['HTTP_RAW_POST_DATA'] : ''; //拿到微信回调回来的信息判断支付成功没  
  
        if(empty($streamData)){  
            $streamData = file_get_contents('php://input');  
        }  
  
        if($streamData!=''){  
            $streamData=xmlToArray($streamData);   
            $Data=json_encode($streamData);  
            Log::debug('Alipay notify post data verification fail.', [ //写入服务器文档，你不加这个也行  
                'data' => $Data.'xxxxxx'  
            ]);  
            if($streamData['return_code'] == 'SUCCESS' && $streamData['result_code'] == 'SUCCESS'){ //支付成功  
                try { //开始事务  
                    //支付成功，你要干些什么都写这里，例如增加余额的操作什么的  
  
                } catch (Exception $e) {  
                    //如果try里面的东西出现问题的话，进行数据库回滚  
                    throw $e;           
                }  
                  
            }  
        }else{  
            $ret = false; //支付失败  
        }  
    }  
    
}