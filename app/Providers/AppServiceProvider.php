<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layout/index_head',function($view){
            $category = $this->getOrderCategory();
            $visibility = $this->getVisibility();
            $view->with(compact('category','visibility'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function getOrderCategory($arr=[],$pid=0){
        $arr = [];
        $res = Category::get(['id','title','parent_id','group_id'])->toArray();
        foreach ($res  as $v){
            if($v['parent_id']==0){
                $arr[$v['group_id']]['name']= isset($arr[$v['group_id']])?$arr[$v['group_id']]['name']."/".$v['title']:$v['title'];
                $arr[$v['group_id']]['id'][] = $v['id'];
            }
        }
        foreach ($arr as $v){
            $newArray[$v['name']] = $v['id'];
        }
        unset($arr);
        $len = count($res);
        foreach ($newArray as $k=>$v){
            $array = [];
                for($i=0;$i<$len;$i++){
                    if(in_array($res[$i]['parent_id'],$v)){
                        $array[]=$res[$i];
                    }
                }
                foreach ($array as $kk=>$vv){
                    for($i=0;$i<$len;$i++){
                        if($res[$i]['parent_id']==$vv['id']){
                            $array[$kk]['child'][]=$res[$i];
                        }
                    }
                }
                $newArray[$k]=$array;
        }
        return $newArray;
    }

    public function getVisibility()
    {
        $arr = Category::where('visibility', 1)->get()->toArray();
        foreach ($arr as $key => $value) {
            $res              = Category::where('parent_id', $value['id'])->get()->toArray();
            $arr[$key]['son'] = $res;
        }
        return $arr;
    }
}