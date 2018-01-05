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
       // $list = Db::table('category')->get()->toArray();
        
       // var_dump($category);die;
       // var_dump($list);die;

        view()->composer('layout/index_head',function($view){
            $category = $this->getOrderCategory();
            $view->with('category',$category);
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
        //  '男装/女装/内衣'=>[
        //        '0' => [
        //              'title'=>'男装'
        //              'son'=>[
        //                  'title' => '皮衣'
        //              ]
        //        ]
        //  ]
        // foreach($arr as $k => $v){
        //         if($v->parent_id == $pid){
        //             $tree[] = $v;
        //             $tree = array_merge($tree,$this->getOrderCategory($arr,$v->id));
        //         }
        // }
        // return $tree;
        
        // foreach($arr as $k => $v){
        //     if($v->parent_id == $pid){
        //         $v->son = $this->getOrderCategory($arr,$v->id);
        //         $tree[] = $v;
        //     }
        // }
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
}