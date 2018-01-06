<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class GroupbuyController extends Controller
{
    //抢购
    public function buy()
    {
        return view('groupbuy/buy');
    }
}