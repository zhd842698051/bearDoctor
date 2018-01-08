<?php

namespace App\Http\Controllers\Auth;
use Input;
use Request;
use App\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class CartController extends Controller
{
	//购物车列表
	public function cartShow()
	{
		//判断用户是否登录 并验证
		
		//逻辑处理
		$userid = 1;
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
		foreach($data as $k=>$v)
		{
			//
			//查询库存
			$row = Db::table('cart')->where('cart.product_id',$v['goods_id'])->join('product','cart.product_id','=','product.id')->get()->toArray();
			
			if($row[0]->num<$v['goods_num'])
			{
				return $row[0]->goods_id.' 库存不足';
				// 1库存不足
				// $msg = $row[0]['goods_id'].' 1';
				// return $msg;
			}
			
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