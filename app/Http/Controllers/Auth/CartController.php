<?php

namespace App\Http\Controllers\Auth;
use Input;
use Request;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Order;
class CartController extends Controller
{
	//购物车列表
	public function cartShow()
	{
		//判断用户是否登录 并验证
		//逻辑处理
		$userid = \Auth::id();
		return view('cart/cartShow',['user_id'=>$userid]);
	}

	//清空购物车
	public function test()
	{
		if(request::ajax() && request::isMethod('get'))
		{
			//验证
			$this->validate(request(),['userid'=>'required']);
			$userid = request('userid');
			//删除数据
			$sre = Cart::where("user_id",$userid)->delete();
			if($sre)
			{
				$status = 'ok';
			}
			else
			{
				$status = 'no';
			}
		}
		else
		{
			$status = 'no';
		}
		return $status;
	}

	//单删
	public function onlyDel()
	{
		if(request::ajax() && request::isMethod('get'))
		{
			$cart = new Cart();
			$cart->product_id = request('cart_id');
			$this->validate(request(),['cart_id'=>'required']);
			$sre = $cart->del();
			if($sre)
			{
				return 'ok';
			}
			else
			{
				return 'no';
			}
		}
	}
	//查询
	public function cartSel()
	{
		if(request::ajax() && request::isMethod('get'))
		{
			//验证
			$this->validate(request(),['userid'=>'required']);
			$userid = request('userid');
			//查询数据
			$data = Db::table('cart')->where('user_id',$userid)->join('product','cart.product_id','=','product.id')->join('goods','product.goods_id','=','goods.id')->select('cart.num','user_id','price','sell_price','cover','goods_id','name','product_id')->get();
		}
		else
		{
			$data = [];
		}
		return $data;
	}

	//结算生成订单
	public function createOrder()
	{
		$data = request('data');
		return $data;
		// $model = new Cart();
		// $order = new Order();
		// foreach($data as $k=>$v)
		// {
		// 	//
		// 	//查询库存
		// 	//$row = Db::table('cart')->where('cart.product_id',$v['goods_id'])->join('product','cart.product_id','=','product.id')->get()->toArray();
		// 	$model ->product_id = $v['goods_id'];
		// 	$row = $model->selNum();
		// 	return $row;
		// 	if($row->num<$v['goods_num'])
		// 	{
		// 		return $row->goods_id.' 库存不足';
		// 	}
		// 	else
		// 	{
		// 		try{
		// 			$model ->cart_id = $row->id;
		// 			$sre = $model ->del();
		// 			if($sre)
		// 			{
		// 				//库存减少
		// 				//$row->num = $row->num-$v['goods_num'];
		// 				$sr = $model->updateNum($row,$v['goods_num']);
		// 				if($sr)
		// 				{
		// 					//加入订单
		// 					$order->goods_id = $row['goods_id'];
		// 					$order->num = $v['goods_num']+$row['num'];
		// 					//$order->user_id = Auth::id();
		// 				}
		// 				else
		// 				{
		// 					throw new Expection;
		// 				}
		// 				return $sr;
		// 			}
		// 			else
		// 			{
		// 				throw new Exception;
		// 			}
		// 		}
		// 		catch(Exception $e)
		// 		{
		// 			return 2;
		// 		}
		// 	}
			
		// }
	}

	public function nav()
	{
		$userid = \Auth::id();
		$data = Db::table('cart')->where('user_id',$userid)->join('product','cart.product_id','=','product.id')->join('goods','product.goods_id','=','goods.id')->select('cart.num','user_id','price','sell_price','cover','goods_id','name','product_id','sell_price')->get();
		if(!empty($data[0]))
		{
			$result['count'] = count(Db::table('cart')->where('user_id',$userid)->get());
			$result['data'] = $data;
			$result['status'] = 'ok';
		}
		else
		{
			$result['status'] = 'no';
			$result['result'] = [];
		}
        return $result;
	}

	//添加
	public function addData()
	{
		if(request::ajax() && request::isMethod('get'))
		{
			$data = request('data');
			$userid = \Auth::id();
			foreach($data as $k=>$v)
			{
				$row = Db::table('cart')->where(['product_id'=>$v['product_id'],'user_id'=>$userid])->get();
				if(!empty($row[0]))
				{
					$num = $row[0]->num+$v['goods_num'];
					$sre = DB::table('cart')->where(['user_id'=>$userid,'product_id'=>$v['product_id']])->update(['num'=>$num]);
					//$sre = Db::table('cart')->query("update cart set num=$num where user_id =$userid and product_id=".$v['product_id']);
					//$row[0]->save();
				}
				else
				{
					$sre=DB::table('cart')->insert(['user_id'=>$userid,'product_id'=>$v['product_id'],'num'=>$v['goods_num']]);
					if(!$sre)
					{
						return 'no';
					}
				}
			}
			return 'ok';
		}
	}

	//确认订单信息
	public function cartOrderInfo()
	{
		return view('cart/cartOrderInfo');
	}

	//提交订单
	public function submitOrder()
	{
		return view('cart/submitOrder');
	}
}