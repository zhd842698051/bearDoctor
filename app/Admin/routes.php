<?php

use Illuminate\Routing\Router;

Admin::registerHelpersRoutes();

Route::group([
    'prefix'        => config('admin.prefix'),
    'namespace'     => Admin::controllerNamespace(),
    'middleware'    => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('goods', GoodsController::class);
    $router->resource('attr', AttrController::class);
    $router->resource('attribute', AttributeController::class);
    $router->resource('brand', BrandController::class);
    $router->resource('category', CategoryController::class);
    $router->resource('order', OrderController::class);
    $router->resource('seckill', SeckillController::class);
    $router->resource('user', UserController::class);
    $router->resource('prop', PropController::class);

});

Route::get("/admin/goods/getAttr",'App\Admin\Controllers\GoodsController@getAttr');
Route::get("/admin/goods/getAttribute",'App\Admin\Controllers\GoodsController@getAttribute');
Route::get("/admin/goods/ajaxGetAttr",'App\Admin\Controllers\GoodsController@ajaxGetAttr');
Route::post("/admin/goods/add",'App\Admin\Controllers\GoodsController@add');
