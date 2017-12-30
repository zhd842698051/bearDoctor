<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class OrderController extends Controller
{
	//订单列表
	public function list()
	{
		return view('Order/list');
	}
	
}