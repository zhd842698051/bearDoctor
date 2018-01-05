<?php

namespace App\Admin\Controllers;

use App\Attr;
use App\Attribute;
use App\Category;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AttrController extends Controller
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
        return Admin::grid(Attr::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name("属性名称");
            $grid->attribute("属性值")->display(function ($roles) {

                $roles = array_map(function ($role) {
                    return "<span class='label label-success'>{$role['value']}</span>";
                }, $roles);

                return join('&nbsp;', $roles);
            });
            $grid->created_at('添加时间');
            //$grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Attr::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('name','属性名称');
            $form->multipleSelect('category','所属分类')->options(Category::all()->pluck('title', 'id'));
            $form->hasMany('attribute',function (Form\NestedForm $form){
                $form->text("value",'属性值');
                $form->number("sort",'排序')->default(0);
                $form->display('created_at', 'Created At');
                $form->display('updated_at', 'Updated At');
            })->label("属性值");
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
