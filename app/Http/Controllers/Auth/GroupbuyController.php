<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth\UserController;

class GroupbuyController extends Controller
{
    //抢购
    public function buy()
    {
    	$user = UserController::status();
    	//dd($user);
        return view('groupbuy/buy',compact('user',$user));
    }
}