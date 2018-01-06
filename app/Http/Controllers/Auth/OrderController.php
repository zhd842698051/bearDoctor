<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use \App\Cart;
use App\Product;
use App\Attribute;
use App\Goods;
use App\Address;
use App\Prop;
use App\User_prop;
use App\Order;
class OrderController extends Controller
{
	public function orderInfo(){

		//购物车商品信息
		$goods_list=Cart::where(['user_id'=>1])->orderBy('created_at', 'desc')->get()->toArray();

		foreach ($goods_list as $key => $value) {
			$product=Product::find($goods_list[$key]['product_id'])->toArray();
			$goods=Goods::find($product['goods_id'])->toArray();
		    $goods_list[$key]['goods']=$goods['name'];
		    $goods_list[$key]['cover']=$goods['cover'];
		    $goods_list[$key]['price']=($goods['sell_price']+$product['price'])*$goods_list[$key]['num'];
			$attr_id = '(' .$product['attribute_id'] . ')';
			$attr=DB::select("select * from xbs_attribute where id in $attr_id");

			$str="";
			foreach($attr as $v){
				$str.=$v->value.",";
			}
			$goods_list[$key]['attr']=rtrim($str,',');

		}

		//收货人信息
		$man=Address::where([['user_id', '=', '1'],['is_default', '=', '1']])->get()->toArray();
		$man=$man[0];
		//红包优惠券
		$user_prop=User_prop::where(['user_id'=>1])->get()->toArray();

		foreach ($user_prop as $key => $value) {
		   $prop=Prop::where([['id', '=', $user_prop[$key]['prop_id']],['num', '>', '0']])->first()->toArray();
		   $user_prop[$key]['prop_name']=$prop['name'];
		   $user_prop[$key]['full']=$prop['full'];
		   $user_prop[$key]['price']=$prop['price'];
		   $user_prop[$key]['start']=$prop['start_time'];
		   $user_prop[$key]['end']=$prop['end_time'];
		}

		return view('Order/orderinfo',compact('goods_list','man','user_prop'));
	}

	public function delCart(){
	  $user_id=request('user_id');
	  $cart_id=request('cart_id');
	  $res=Cart::where([['user_id','=',$user_id],['id','=',$cart_id]])->delete();

	  if($res){
	  	$data['error']=0;
	  }else{
	  	$data['error']=1;
	  }
	  echo json_encode($data);
	}


	public function addOrder(){

		$user_id=sprintf("%04d",$user_id);
		$order_no=substr(time(),-8).mt_rand(1000,9999).$user_id;
		$user_id = \Auth::id();

		return view('Order/addorder',compact('order_no'));
	}


	//提交订单
	public function submitOrder()
	{
		return view('cart/submitOrder');
	}

	//订单列表
	public function list()
	{
		$status=IndexController::isLogin();
		if($status == false){
			return redirect('/login');
		}else{
		$user=Auth::user();
		if($user == null){
			return view('index/index',compact('user',$user));
		}else{
			//检测用户是否登录  并且在导航栏展示用户登录状态
			$isLogin=Auth::check();
			$user->isLogin = $isLogin;

			$order=Order::orderList($user->id);
			//dd($order);
			return view('Order/list',compact('user',$user));
			}
		}
	}

}
