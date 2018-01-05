<?php

namespace App\Admin\Controllers;

use App\Goods;
use App\Category;
use App\Brand;
use App\Attr;
use App\Attribute;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
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

            $content->header('商品列表');
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
            $cate = Category::selectOptions();
            unset($cate[0]);
            $brand = Brand::all()->pluck('name', 'id');
            $content->body(view('admin/goods_add',compact('cate','brand'))->render());
            //$content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Goods::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name("商品名称");
            $grid->cover("封面图片");
            $grid->descript("描述");
            $grid->created_at()
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Goods::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name', '商品名称');
            $form->currency('sell_price','商品价格')->symbol("¥");
            $form->image('cover', '封面图片');
            $form->multipleImage('images','商品图片');
            $res = Category::selectOptions();
            unset($res[0]);
            $form->select("category_id",'所属分类')->options($res);
            $form->select("brand_id",'所属品牌')->options(Brand::all()->pluck('name', 'id'));
            $form->radio("is_hot","是否热销")->options([1=>'是',0=>'否']);
            $form->radio("is_son","是否上架")->options([1=>'是',0=>'否']);
            $form->radio("is_promotion","是否促销")->options([1=>'是',0=>'否']);
            $form->currency('promotion_price','促销价格')->symbol("¥");
            $form->radio("is_attr","是否有属性")->options([1=>'是',0=>'否']);
            $form->multipleSelect("attr",'属性')->options(Attr::all()->pluck('name','id'));
            $form->multipleSelect("attribute",'属性值')->options(Attribute::all()->where('attr_id',request()->input('attr') )->pluck('value','id'));
            $form->number("num",'库存');
            $form->text("keywords",'关键词')->help("多个关键词,隔开");
            $form->textarea('descript', '商品描述');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
    public function getAttr(){
        $id = request('id');
        $id=1;
        $res = Db::select('select a.id,a.name from xbs_attr_category as c INNER JOIN xbs_attr as a on c.attr_id=a.id where category_id =1');
        echo json_encode($res);
    }

    public function getAttribute(){
        $id = request('id');
        $id = implode(",",$id);
        $res = Db::select("select id,`value`,attr_id from xbs_attribute where attr_id in ($id)");
        echo json_encode($res);
    }

    public function ajaxGetAttr(){
        $id = request('id');
        foreach ($id as $k=>$v){
            $id[$k]=explode("-",$v);
        }
        foreach ($id as $k=>$v){
            $arr[$v[0]][$v[1]]=$v[2];
        }
        foreach ($arr as $k=>$v){
            $newArray[]=$v;
        }
        //print_r($newArray);die;
        $len = count($newArray);
        $html = array();
        $str = "";
        foreach ($newArray[0] as $k=>$v){
          foreach ($newArray[1] as $kk=>$vv){
              $str ="";
              $str.=$vv.'-'.$v;

              if(isset($newArray[2])){
                  foreach ($newArray[2] as $kkk=>$vvv){
                      $str ="";
                      $str.=$vvv.'-'.$vv.'-'.$v;
                      $str .="<br>";
                      echo $str;
                      if(isset($newArray[3])){
                          foreach ($newArray[3] as $kkkk=>$vvvv){
                              $str ="";
                                $str.=$vvvv.'-'.$vvv.'-'.$vv.'-'.$v;
                              $str .="<br>";
                              echo $str;
                          }
                      }
                  }
              }
          }

        }


    }
}
