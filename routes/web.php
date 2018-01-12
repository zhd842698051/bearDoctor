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
Route::get('/', '\App\Http\Controllers\Auth\IndexController@index');
//登录
Route::get('/login', '\App\Http\Controllers\Auth\LoginController@login')->name('login');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
//qq登录
Route::get('/qqCallback', '\App\Http\Controllers\Auth\LoginController@qqCallback');
Route::get('/qqlogin', '\App\Http\Controllers\Auth\LoginController@qqlogin');
// Route::get('/qq','\App\Http\Controllers\Auth\LoginController@qq');
Route::get('/qqCallback','\App\Http\Controllers\Auth\LoginController@qqCallback');
//Route::get('/qqlogin','\App\Http\Controllers\Auth\LoginController@qqlogin');
Route::get('/qq','\App\Http\Controllers\Auth\LoginController@qq');
Route::get('/login/binbing','\App\Http\Controllers\Auth\LoginController@binbing');
Route::post('/login/qqlogin','\App\Http\Controllers\Auth\LoginController@qqbinbing');
//微博登录
Route::get('/wbCallback','\App\Http\Controllers\Auth\LoginController@wbCallback');
Route::get('/wb','\App\Http\Controllers\Auth\LoginController@wb');
Route::post('/login/wblogin','\App\Http\Controllers\Auth\LoginController@wbbinbing');
//微信登录
Route::get('/wxCallback','\App\Http\Controllers\Auth\LoginController@wxCallback');
Route::get('/wx','\App\Http\Controllers\Auth\LoginController@wx');
//执行登录
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@loginDo');
//注册
Route::get('/register', '\App\Http\Controllers\Auth\RegisterController@register');
//执行注册
Route::post('/register', '\App\Http\Controllers\Auth\RegisterController@registerDo');
//检测用户名是否唯一
Route::get('/checkUsername', '\App\Http\Controllers\Auth\RegisterController@checkUsername');
//验证验证码
Route::get('/checkCaptcha', '\App\Http\Controllers\Auth\RegisterController@checkCaptcha');
Route::get('/checkPassword', '\App\Http\Controllers\Auth\UserController@checkPassword');
Route::post('/user/save_password', '\App\Http\Controllers\Auth\UserController@save_password');
//购物车
Route::get('/cart/show', '\App\Http\Controllers\Auth\CartController@cartShow');
Route::get('/cart/order_info', '\App\Http\Controllers\Auth\CartController@cartOrderInfo');
Route::get('/cart/submitOrder', '\App\Http\Controllers\Auth\CartController@submitOrder');
Route::get('/cart', '\App\Http\Controllers\Auth\CartController@test');
Route::get('/cart/dataSel', '\App\Http\Controllers\Auth\CartController@cartSel');
Route::get('/cart/createOrder', '\App\Http\Controllers\Auth\CartController@createOrder');
Route::get('/cart/show','\App\Http\Controllers\Auth\CartController@cartShow');
Route::get('/cart/order_info','\App\Http\Controllers\Auth\CartController@cartOrderInfo');
Route::get('/cart/submitOrder','\App\Http\Controllers\Auth\CartController@submitOrder');
Route::get('/cart','\App\Http\Controllers\Auth\CartController@test');
Route::get('/cart/dataSel','\App\Http\Controllers\Auth\CartController@cartSel');
Route::get('/cart/createOrder','\App\Http\Controllers\Auth\CartController@createOrder');
Route::get('/cart/nav','\App\Http\Controllers\Auth\CartController@nav');
Route::get('/cart/addData','\App\Http\Controllers\Auth\CartController@addData');
Route::get('/cart/onlyDel','\App\Http\Controllers\Auth\CartController@onlyDel');

//品牌
Route::get('/brand', '\App\Http\Controllers\Auth\BrandController@brand');
Route::get('/brand/list/{brand_id}', '\App\Http\Controllers\Auth\BrandController@brandList');
//分类
Route::get('/category', '\App\Http\Controllers\Auth\CategoryController@category');
Route::get('/category/list', '\App\Http\Controllers\Auth\CategoryController@list');
//用户
Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/user', '\App\Http\Controllers\Auth\UserController@index');
    Route::get('/user/address', '\App\Http\Controllers\Auth\UserController@address');
    Route::get('/user/cash', '\App\Http\Controllers\Auth\UserController@cash');
    Route::get('/user/collect', '\App\Http\Controllers\Auth\UserController@collect');
    Route::get('/user/commission', '\App\Http\Controllers\Auth\UserController@commission');
    Route::get('/user/links', '\App\Http\Controllers\Auth\UserController@links');
    Route::get('/user/member', '\App\Http\Controllers\Auth\UserController@member');
    Route::get('/user/memberList', '\App\Http\Controllers\Auth\UserController@memberList');
    Route::get('/user/memberMoney', '\App\Http\Controllers\Auth\UserController@memberMoney');
    Route::get('/user/memberCharge', '\App\Http\Controllers\Auth\UserController@memberCharge');
    Route::get('/user/moneyPay', '\App\Http\Controllers\Auth\UserController@moneyPay');
    Route::get('/user/message', '\App\Http\Controllers\Auth\UserController@message');
    Route::get('/user/packet', '\App\Http\Controllers\Auth\UserController@packet');
    Route::get('/user/results', '\App\Http\Controllers\Auth\UserController@results');
    Route::get('/user/safe', '\App\Http\Controllers\Auth\UserController@safe');
    Route::get('/user/collect/{id}/del', '\App\Http\Controllers\Auth\UserController@collectDel');
    //收货地址四级联动
    Route::get('/user/address/country', '\App\Http\Controllers\Auth\UserController@country');
    Route::post('/user/address/add', '\App\Http\Controllers\Auth\UserController@add');

//收货地址
    Route::get('/user/address/country', '\App\Http\Controllers\Auth\UserController@country');
    Route::post('/user/address/add', '\App\Http\Controllers\Auth\UserController@add');
    Route::get('/user/address/del', '\App\Http\Controllers\Auth\UserController@del');
    Route::get('/user/address/find', '\App\Http\Controllers\Auth\UserController@find');
    Route::post('/user/address/update', '\App\Http\Controllers\Auth\UserController@update');

    //营销（秒杀-优惠券-团购）
    Route::get('/seckill/seckill','\App\Http\Controllers\Auth\SeckillController@seckill');
    Route::get('/seckill/show','\App\Http\Controllers\Auth\SeckillController@show');
    Route::get('/seckill/ticket','\App\Http\Controllers\Auth\SeckillController@ticket');
    Route::get('/groupbuy/buy','\App\Http\Controllers\Auth\GroupbuyController@buy');
   
    //订单
    Route::get('/order', '\App\Http\Controllers\Auth\OrderController@list');
    Route::get('/orderinfo', '\App\Http\Controllers\Auth\OrderController@orderInfo');
    Route::get('/addorder', '\App\Http\Controllers\Auth\OrderController@addOrder');
    Route::get('/delCart', '\App\Http\Controllers\Auth\OrderController@delCart');
    Route::get('/getaddress', '\App\Http\Controllers\Auth\OrderController@getAddress');
    Route::get('/getadd', '\App\Http\Controllers\Auth\OrderController@getAdd');
    Route::get('/order','\App\Http\Controllers\Auth\OrderController@list');
   
    Route::get('/orderinfo','\App\Http\Controllers\Auth\OrderController@orderInfo');
    Route::post('/addorder','\App\Http\Controllers\Auth\OrderController@addOrder');
     Route::get('/confirmorder','\App\Http\Controllers\Auth\OrderController@confirmOrder');
     Route::get('/saveOrder','\App\Http\Controllers\Auth\OrderController@saveOrder');
    Route::get('/delCart','\App\Http\Controllers\Auth\OrderController@delCart');
    Route::get('/cartorder','\App\Http\Controllers\Auth\OrderController@cart');
    Route::get('/getaddress','\App\Http\Controllers\Auth\OrderController@getAddress');
    Route::get('/getadd','\App\Http\Controllers\Auth\OrderController@getAdd');
    Route::get('/order/tailOrder','\App\Http\Controllers\Auth\OrderController@tailOrder');
    Route::get('/order/alreadyBuy','\App\Http\Controllers\Auth\OrderController@alreadyBuy');
    Route::get('/order/save_goods_status','\App\Http\Controllers\Auth\OrderController@save_goods_status');

//支付宝支付
Route::post('/alipay','\App\Http\Controllers\Auth\alipayController@Alipay'); 

Route::any('notify','\App\Http\Controllers\Auth\alipayController@AliPayNotify'); //服务器异步通知页面路径
Route::get('return','\App\Http\Controllers\Auth\alipayController@AliPayReturn');  //页面跳转同步通知页面路径


    //微信支付
Route::get('/wechatpay','\App\Http\Controllers\Auth\WechatController@index');
});

//商品
Route::get('/showinfo/{id}', '\App\Http\Controllers\Auth\GoodsController@product');
Route::get('/showinfo/{id}/{attr}', '\App\Http\Controllers\Auth\GoodsController@product');

Route::get('/goods/sell', '\App\Http\Controllers\Auth\GoodsController@sell');
Route::get('/goods/sellDetails', '\App\Http\Controllers\Auth\GoodsController@sellDetails');

//营销（秒杀-优惠券-团购）

Route::get('/seckill/show', '\App\Http\Controllers\Auth\SeckillController@show');
Route::get('/groupbuy/buy', '\App\Http\Controllers\Auth\GroupbuyController@buy');

//后台
Route::get("/admin/goods/getAttr", 'App\Admin\Controllers\GoodsController@getAttr');
Route::get("/admin/goods/getAttribute", 'App\Admin\Controllers\GoodsController@getAttribute');
Route::get("/admin/goods/ajaxGetAttr", 'App\Admin\Controllers\GoodsController@ajaxGetAttr');

//后台
Route::get("/admin/goods/getAttr", 'App\Admin\Controllers\GoodsController@getAttr');
Route::get("/admin/goods/getAttribute", 'App\Admin\Controllers\GoodsController@getAttribute');
Route::get("/admin/goods/ajaxGetAttr", 'App\Admin\Controllers\GoodsController@ajaxGetAttr');
Route::get("/admin/goods/add", 'App\Admin\Controllers\GoodsController@add');

Route::get('/seckill/coupon', '\App\Http\Controllers\Auth\SeckillController@coupon');

Route::get('/seckill/coupon', '\App\Http\Controllers\Auth\SeckillController@coupon');

Route::get('/groupbuy/buy', '\App\Http\Controllers\Auth\GroupbuyController@buy');

//商品详情页面
