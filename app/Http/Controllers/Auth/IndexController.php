<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
	//首页
	public function index()
	{
		$user=Auth::user();
		if($user == null){
			return view('index/index',compact('user',$user));
		}else{
			$isLogin=Auth::check();
			$user->isLogin = $isLogin;
			return view('index/index',compact('user',$user));
		}
	}

	//判断当前用户是否登录
	public static function isLogin(){
		$status=Auth::check();
		return $status;
	}
}