<?php

namespace App\Admin\Controllers;

use App\Order;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class OrderController extends Controller
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

            return back();
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Order::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->order_no('订单号');
            $grid->order_money('订单金额');
            $grid->real_money('实付金额');
            $grid->status('订单状态')->display(function($status){
                if($status==0){
                    return "订单过期";
                }else if($status==1){
                    return "待支付";
                }else if($status==2){
                    return "已支付";
                }else if($status==3){
                    return "已完成";
                }else if($status==4){
                    return "退款";
                }
            })->label('info');
            $grid->pay_type('支付方式')->display(function($pay_type){
                if($pay_type==1){
                    return '支付宝';
                }else if($pay_type==2){
                    return '微信';
                }else if($pay_type==3){
                    return '银联';
                }else if($pay_type==0){
                    return '未支付';
                }
            });
            $grid->type('订单类型')->display(function ($type){
              if($type==0){
                    return '普通订单';
              }else if($type==1){
                    return '团购订单';
              }else if($type==2){
                    return '限时抢购';
              }
            })->label();
            $grid->created_at("创建时间");
            $grid->actions(function ($actions) {
                $actions->disableDelete();
                $actions->disableEdit();
            });
            $grid->tools(function ($tools) {
                $tools->batch(function ($batch) {
                    $batch->disableDelete();
                });
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Order::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
