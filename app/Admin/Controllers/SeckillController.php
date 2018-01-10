<?php

namespace App\Admin\Controllers;

use App\Seckill;
use App\Goods;
use App\Product;
use App\Attribute;
use App\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\Session;

class SeckillController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Seckill::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->product_id('商品')->display(function($id){
                $data = Seckill::getGoods($id);
                return $data['name']."      属性:".$data['attr'];
            })->label('info');
            $grid->seckill_price('秒杀价格')->label();
            $grid->seckill_num('秒杀数量');
            $grid->seckill_stock('秒杀库存');
            $grid->start_time('秒杀开始');
            $grid->end_time('秒杀结束');
            $grid->created_at('创建时间');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Seckill::class, function (Form $form) {

            $form->display('id', 'ID');
            $res = Product::get();
            foreach ($res as $k=>$v){
                $goods = Goods::find($v->goods_id);
                $attr_id = explode(',',$v->attribute_id);
                $attr = Attribute::whereIn('id',$attr_id)->get(['value']);
                $str = "";
                foreach ($attr as $vv){
                    $str .= $vv->value."   ";
                }
                $data[$v->id] = $goods->name."   属性:".$str;
            }
            $form->select('product_id', '产品')->options($data);
            $form->decimal('seckill_price','秒杀价格');
            $form->number('seckill_num','秒杀数量');
            $form->number('seckill_stock','确认秒杀数量')->help('必须相同');
            $form->datetimeRange('start_time','end_time','秒杀时段');
        });
    }
}
