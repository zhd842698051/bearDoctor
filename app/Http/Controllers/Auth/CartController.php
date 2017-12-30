<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CartController extends Controller
{
	//购物车列表
	public function cartShow()
	{
		return view('cart/cartShow');
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