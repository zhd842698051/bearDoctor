<?php

namespace App\Admin\Controllers;

use App\Prop;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PropController extends Controller
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
        return Admin::grid(Prop::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->name('名称')->label();
            $grid->num('数量')->label('primary');
            $grid->margin('已送数量')->label('primary');
            $grid->full('满多少可用')->label('warning');
            $grid->price('优惠价格')->label('default');
            $grid->type("类型")->display(function($type){
                if($type==0){
                    return '优惠券';
                }elseif($type==1){
                    return '红包';
                }
            })->label('info');
            $grid->start_time('结束');
            $grid->end_time('开始');
            $grid->created_at('添加时间');

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Prop::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '道具名称');
            $form->select('type','类型')->options([0=>'优惠券',1=>'红包']);
            $form->number('num', '道具数量');
            $form->decimal('full', '满多少可用')->symbol("¥");
            $form->decimal('price', '优惠价格')->symbol("¥");
            $form->datetimeRange('start_time', 'end_time', '有效时间');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
