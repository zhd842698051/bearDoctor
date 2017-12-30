<?php

namespace App\Admin\Controllers;

use App\Category;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Layout\Row;
use Encore\Admin\Tree;

class CategoryController extends Controller
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

            $content->row(function (Row $row){
                $row->column(6, $this->treeView()->render());
                $row->column(6,$this->form()->render());
            });
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
        return Admin::grid(Category::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $res = Category::selectOptions();
            unset($res[0]);

            $grid->title("分类名称");
            $grid->created_at();
            $grid->updated_at();
        });
    }

    protected function treeView()
    {
        return Category::tree(function (Tree $tree) {
            $tree->disableCreate();

            $tree->branch(function ($branch) {
                $payload = "<i class='fa-bars'></i>&nbsp;<strong>{$branch['title']}</strong>";
                return $payload;
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
        return Admin::form(Category::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->select('parent_id', trans('admin::lang.parent_id'))->options(Category::selectOptions());
            $form->text('title', trans('admin::lang.name'))->rules('required');
            $form->radio('visibility','是否首页显示')->options([1=>'显示',0=>'不显示'])->default(0);
            $form->number('order','排序')->default(50);
            $res = Category::where("parent_id",0)->get()->toArray();
            $i=0;
            foreach ($res  as $v){
                $i = $v['group_id']>$i?$v['group_id']:$i;
                $arr[$v['group_id']] = isset($arr[$v['group_id']])?$arr[$v['group_id']]."/".$v['title']:$v['title'];
            }
            $arr[$i+1] = "新建分组";
            $form->select('group_id','分组')->options($arr)->default($i+1);
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
