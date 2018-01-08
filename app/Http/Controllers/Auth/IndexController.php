<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Goods;

class IndexController extends Controller
{
	//首页
	public function index()
	{
<<<<<<< HEAD
		$hotGoods = $this->getHotGoods();
        $user     = Auth::user();
        if ($user == null) {
            return view('index/index', compact('user', 'hotGoods'));
        } else {
            $isLogin       = Auth::check();
            $user->isLogin = $isLogin;
            return view('index/index', compact('user', 'hotGoods'));
        }
	}

	//判断当前用户是否登录
	public static function isLogin(){
		$status=Auth::check();
		return $status;
=======
			return view('index/index');
>>>>>>> 41ad786b343beb2d6e2444bc07b77ae3b814e828
	}

	public function getHotGoods()
    {
        $arr = Goods::where('is_hot', 1)->get(['id', 'brand_id', 'name', 'cover', 'sell_price', 'category_id', 'sell_price'])->toArray();
        return $arr;
    }
}