<?php

namespace App;

class Seckill extends Model
{
    protected $table = 'seckill';

    public static function getGoods($id){
        $product = Product::find($id);
        $goods = Goods::find($product->goods_id);
        $attr_id = explode(',',$product->attribute_id);
        $attr = Attribute::whereIn('id',$attr_id)->get(['value']);
        $str = "";
        foreach ($attr as $v){
            $str .= $v->value."   ";
        }
        $data['name'] = $goods->name;
        $data['image'] = $goods->cover;
        $data['id'] = $goods->id;
        $data['attr'] = $str;
        return $data;
    }

    
}
