<?php

namespace App\Admin\Controllers;

use App\Brand;

use App\Category;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class BrandController extends Controller
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
        return Admin::grid(Brand::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name("品牌名称");
            $grid->logo("品牌logo")->image('',50,50);
            $grid->category("所属分类")->display(function ($roles) {

                $roles = array_map(function ($role) {
                    return "<span class='label label-success'>{$role['title']}</span>";
                }, $roles);

                return join('&nbsp;', $roles);
            });
            $grid->created_at("创建时间");
            $grid->updated_at("修改时间");
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Brand::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','品牌名称');
            $form->image('logo','品牌logo');
            $form->textarea('description','品牌描述');
            $form->number('order','排序')->default(50);
            $res = Category::selectOptions();
            unset($res[0]);
            $form->multipleSelect('category','所属分类' )->options($res);
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
