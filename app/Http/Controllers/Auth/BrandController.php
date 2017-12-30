<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class BrandController extends Controller
{
	//品牌
	public function brand()
	{
		return view('brand/brand');
	}
	//品牌列表
	public function brandList()
	{
		return view('brand/brandList');
	}
}