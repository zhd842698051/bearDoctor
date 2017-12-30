<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{
	//用户
	public function index()
	{
		return view('user/index');
	}

	//地址
	public function address()
	{
		return view('user/address');
	}

	//申请提现
	public function cash()
	{
		return view('user/cash');
	}

	//我的收藏
	public function collect()
	{
		return view('user/collect');
	}

	//我的佣金
	public function commission()
	{
		return view('user/commission');
	}

	//推广链接
	public function links()
	{
		return view('user/links');
	}

	//我的会员
	public function member()
	{
		return view('user/member');
	}
	
	//会员列表
	public function memberList()
	{
		return view('user/memberList');
	}

	//申请余额记录
	public function memberMoney()
	{
		return view('user/memberMoney');
	}

	//充值
	public function memberCharge()
	{
		return view('user/memberCharge');
	}

	//支付
	public function moneyPay()
	{
		return view('user/moneyPay');
	}

	//我的留言
	public function message()
	{
		return view('user/message');
	}

	//我的红包
	public function packet()
	{
		return view('user/packet');
	}

	//我的业绩
	public function results()
	{
		return view('user/results');
	}

	//账户安全
	public function safe()
	{
		return view('user/safe');
	}
}