<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class ComposerServiceProvider extends ServiceProvider
{
    public function head(){
        view()->composer('index_head',function($view){
            $user = auth\user();
            $view->with('user',$user);
        })
    }

    public function userCommon(){
        view()->composer('userCommon',function($view){
            $user = auth\user();
            $view->with('user',$user);
        })
    }

}
