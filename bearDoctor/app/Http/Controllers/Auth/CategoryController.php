<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CategoryController extends Controller
{
	//商品分类
	public function category()
	{
		return view('category/category');
	}

	//分类列表
	public function list()
	{
		return view('category/categoryList');
	}
	
}