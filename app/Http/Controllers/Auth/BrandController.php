<?php

namespace App\Http\Controllers\Auth;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Db;

class BrandController extends Controller
{
    //品牌
    public function brand()
    {
        $Brand = $this->getBrand();
        return view('brand/brand', compact('Brand'));
    }
    //品牌列表
    public function brandList($brand_id)
    {
        $Brand  = $this->getBrandFirst($brand_id);
        $BrandC = $this->getBrandCategoryGoods($brand_id);
        return view('brand/brandList', compact('Brand','BrandC'));
    }

    public function getBrand()
    {
        return $Brand = Brand::paginate(2);
    }

    public function getBrandFirst($brand_id)
    {
        return $Brand = Brand::where('id', $brand_id)->first()->toArray();
    }

    public function getBrandCategoryGoods($brand_id)
    {
        $category = Db::table('brand_category')
            ->join('category', 'brand_category.category_id', '=', 'category.id')
            ->where('brand_category.brand_id', $brand_id)
            ->select('brand_category.category_id', 'category.title')
            ->get()
            ->toArray();
        foreach ($category as $cate) {
            $num       = Db::table('goods')->where(['brand_id' => $brand_id, 'category_id' => $cate->category_id])->count();
            $cate->num = $num;
        }
        return $category;
    }
}