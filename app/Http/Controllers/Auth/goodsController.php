<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class GoodsController extends Controller
{
	//商品信息
	public function product()
	{
		return view('goods/product');
	}

	//商品团购特卖
	public function sell()
	{
		return view('goods/sell');
	}
	
	//团购商品详情
	public function sellDetails()
	{
		return view('goods/sellDetails');
	}
}