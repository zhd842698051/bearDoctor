<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class IndexController extends Controller
{
	//首页
	public function index()
	{
		return view('index/index');
	}
}