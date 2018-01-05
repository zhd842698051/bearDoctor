<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//首页
Route::get('/','\App\Http\Controllers\Auth\IndexController@index');
//登录
Route::get('/login','\App\Http\Controllers\Auth\LoginController@login');
//注册
Route::get('/register','\App\Http\Controllers\Auth\RegisterController@register');
//购物车
Route::get('/cart/show','\App\Http\Controllers\Auth\CartController@cartShow');
Route::get('/cart/order_info','\App\Http\Controllers\Auth\CartController@cartOrderInfo');
Route::get('/cart/submitOrder','\App\Http\Controllers\Auth\CartController@submitOrder');
//品牌
Route::get('/brand','\App\Http\Controllers\Auth\BrandController@brand');
Route::get('/brand/list','\App\Http\Controllers\Auth\BrandController@brandList');
Route::get('/brand/list','\App\Http\Controllers\Auth\BrandController@brandList');
//分类
Route::get('/category','\App\Http\Controllers\Auth\CategoryController@category');
Route::get('/category/list','\App\Http\Controllers\Auth\CategoryController@list');
//用户
Route::get('/user','\App\Http\Controllers\Auth\UserController@index');
Route::get('/user/address','\App\Http\Controllers\Auth\UserController@address');
Route::get('/user/cash','\App\Http\Controllers\Auth\UserController@cash');
Route::get('/user/collect','\App\Http\Controllers\Auth\UserController@collect');
Route::get('/user/commission','\App\Http\Controllers\Auth\UserController@commission');
Route::get('/user/links','\App\Http\Controllers\Auth\UserController@links');
Route::get('/user/member','\App\Http\Controllers\Auth\UserController@member');
Route::get('/user/memberList','\App\Http\Controllers\Auth\UserController@memberList');
Route::get('/user/memberMoney','\App\Http\Controllers\Auth\UserController@memberMoney');
Route::get('/user/memberCharge','\App\Http\Controllers\Auth\UserController@memberCharge');
Route::get('/user/moneyPay','\App\Http\Controllers\Auth\UserController@moneyPay');
Route::get('/user/message','\App\Http\Controllers\Auth\UserController@message');
Route::get('/user/packet','\App\Http\Controllers\Auth\UserController@packet');
Route::get('/user/results','\App\Http\Controllers\Auth\UserController@results');
Route::get('/user/safe','\App\Http\Controllers\Auth\UserController@safe');

//订单
Route::get('/order','\App\Http\Controllers\Auth\OrderController@list');
Route::get('/orderno','\App\Http\Controllers\Auth\OrderController@orderNo');
Route::get('/orderinfo','\App\Http\Controllers\Auth\OrderController@orderInfo');
Route::get('/addorder','\App\Http\Controllers\Auth\OrderController@addOrder');
Route::get('/delCart','\App\Http\Controllers\Auth\OrderController@delCart');

//商品
Route::get('/goods/product','\App\Http\Controllers\Auth\GoodsController@product');
Route::get('/goods/sell','\App\Http\Controllers\Auth\GoodsController@sell');
Route::get('/goods/sellDetails','\App\Http\Controllers\Auth\GoodsController@sellDetails');
