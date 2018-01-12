<?php

namespace App\Http\Controllers\Auth;

use App\Brand;
use App\Goods;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
{
    //商品信息
    public function product($goods_id, $attr_id = '')
    {
        $Attr  = [];
        $Goods = $this->getGoodsInfo($goods_id);
        if ($Goods['is_attr'] == 1) {
            if (empty($attr_id)) {
                $checked = $this->getChecked($goods_id);
            } else {
                $checked = explode(',', $attr_id);
            }
            $Attr = $this->getGoodsAttr($goods_id);
        }
        if (!empty($attr_id)) {
            $Product = $this->getProduct($goods_id, 1, $attr_id);
        } else {
            $Product = $this->getProduct($goods_id, 0);
        }

        var_dump($Attr);die;
        $Brand = $this->getBrand($Goods['brand_id']);
        return view('goods/product', compact('Goods', 'Attr', 'Product', 'checked', 'Brand'));
    }

    //商品团购特卖
    public function sell()
    {
        return view('goods/sell');
    }

    //团购商品详情
    public function sellDetails()
    {
        return view('goods/sellDetails');
    }

    public function getGoodsInfo($goods_id)
    {
        $Goods           = Goods::where('id', $goods_id)->first()->toArray();
        $Goods['images'] = explode(',', $Goods['images']);
        return $Goods;
    }

    public function getProduct($goods_id, $checked = 1, $attr_id = '')
    {
        if (empty($attr_id)) {
            if ($checked) {
                $Product = Product::where(['goods_id' => $goods_id, 'checked' => 1])->first()->toArray();
            } else {
                $Product = Product::where(['goods_id' => $goods_id])->first()->toArray();
            }
        } else {
            $Product = Product::where(['goods_id' => $goods_id, 'attribute_id' => $attr_id])->first()->toArray();
        }
        return $Product;
    }

    public function getGoodsAttr($goods_id)
    {
        $goodsAttr = Db::table('goods_attr')
            ->join('attribute','goods_attr.attribute_id','=','attribute.id')
            ->join('attr', 'goods_attr.attribute_id', '=', 'attr.id')
            ->where('goods_attr.goods_id', $goods_id)
            ->get()
            ->toArray();
        $arr = [];
        foreach ($goodsAttr as $k => $v) {
            $arr[$v->name][] = $v;
        }
        return $arr;
    }

    public function getChecked($goods_id)
    {
        $checked = Product::where(['goods_id' => $goods_id, 'checked' => 1])->first(['attribute_id'])->toArray();
        return explode(',', $checked['attribute_id']);
    }

    public function getBrand($brand_id)
    {
        $Brand = Brand::where('id', $brand_id)->first()->toArray();
        return $Brand;
    }
}
