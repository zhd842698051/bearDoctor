<?php

namespace App\Http\Controllers\Auth;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class BrandController extends Controller
{
	//品牌
	public function brand()
	{
		$Brand = $this->getBrand();
		return view('brand/brand',compact('Brand'));
	}
	//品牌列表
	public function brandList($brand_id)
	{
		$Brand = $this->getBrandFirst($brand_id); 
		return view('brand/brandList',compact('Brand'));
	}

	public function getBrand(){
		return $Brand = Brand::get();
	}

	public function getBrandFirst($brand_id){
		return $Brand = Brand::where('id',$brand_id)->first()->toArray();
	}
}