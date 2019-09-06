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

Route::get('/', function () {
    return view('frontend.homepages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function (){

    Route::get('/','AdminController@index')->name('admin.dashboard');

    /**
     * route đăng nhập thành công
     */
    Route::get('/dashboard','AdminController@index')->name('admin.dashboard');


    /**
     * route Đăng ký tài khoản
     */
    Route::get('register','AdminController@create')->name('admin.register');


    /**
     *
     */
    Route::post('register','AdminController@store')->name('admin.register.store');

    /**
     * url: authen.com/admin/login
     * route trả về view đăng nhập admin
     */
    Route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');

    /**
     * route xử lý đăng nhập
     */
    Route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /**
     * url:authen.com/admin/logout
     * route để đăng xuất
     */
    Route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');


    /**
     * route admin shopping
     */
    Route::get('shop/category','Admin\ShopCategoryController@index');
    Route::get('shop/category/create','Admin\ShopCategoryController@create');
    Route::get('shop/category/{id}/edit','Admin\ShopCategoryController@edit');
    Route::get('shop/category/{id}/delete','Admin\ShopCategoryController@delete');

    Route::post('shop/category','Admin\ShopCategoryController@store');
    Route::post('shop/category/{id}','Admin\ShopCategoryController@update');
    Route::post('shop/category/{id}/delete','Admin\ShopCategoryController@destroy');




    /**
     * -------------------------route admin shopping product---------------------
     * ----------------------------------------------------------------------------
     * -----------------------------------------------------------------------------
     */
    Route::get('shop/product','Admin\ShopProductController@index');
    Route::get('shop/product/create','Admin\ShopProductController@create');
    Route::get('shop/product/{id}/edit','Admin\ShopProductController@edit');
    Route::get('shop/product/{id}/delete','Admin\ShopProductController@delete');

    Route::post('shop/product','Admin\ShopProductController@store');
    Route::post('shop/product/{id}','Admin\ShopProductController@update');
    Route::post('shop/product/{id}/delete','Admin\ShopProductController@destroy');




    Route::get('shop/order',function (){
        return view('admin.content.shop.order.index');
    });
    Route::get('shop/review',function (){
        return view('admin.content.shop.review.index');
    });

    // khách hàng

    Route::get('shop/customer','Admin\CustomerManagerController@index');
    Route::get('shop/customer/create','Admin\CustomerManagerController@create');
    Route::get('shop/customer/{id}/edit','Admin\CustomerManagerController@edit');
    Route::get('shop/customer/{id}/delete','Admin\CustomerManagerController@delete');

    Route::post('shop/customer','Admin\CustomerManagerController@store');
    Route::post('shop/customer/{id}','Admin\CustomerManagerController@update');
    Route::post('shop/customer/{id}/delete','Admin\CustomerManagerController@destroy');


// route nhà vận chuyển
    Route::get('shop/shipper','Admin\ShipperManagerController@index');
    Route::get('shop/shipper/create','Admin\ShipperManagerController@create');
    Route::get('shop/shipper/{id}/edit','Admin\ShipperManagerController@edit');
    Route::get('shop/shipper/{id}/delete','Admin\ShipperManagerController@delete');

    Route::post('shop/shipper','Admin\ShipperManagerController@store');
    Route::post('shop/shipper/{id}','Admin\ShipperManagerController@update');
    Route::post('shop/shipper/{id}/delete','Admin\ShipperManagerController@destroy');


// route nhà cung cấp
    Route::get('shop/seller','Admin\SellerManagerController@index');
    Route::get('shop/seller/create','Admin\SellerManagerController@create');
    Route::get('shop/seller/{id}/edit','Admin\SellerManagerController@edit');
    Route::get('shop/seller/{id}/delete','Admin\SellerManagerController@delete');

    Route::post('shop/seller','Admin\SellerManagerController@store');
    Route::post('shop/seller/{id}','Admin\SellerManagerController@update');
    Route::post('shop/seller/{id}/delete','Admin\SellerManagerController@destroy');



    //nhãn hiệu
    Route::get('shop/brand','Admin\ShopBrandController@index');
    Route::get('shop/brand/create','Admin\ShopBrandController@create');
    Route::get('shop/brand/{id}/edit','Admin\ShopBrandController@edit');
    Route::get('shop/brand/{id}/delete','Admin\ShopBrandController@delete');

    Route::post('shop/brand','Admin\ShopBrandController@store');
    Route::post('shop/brand/{id}','Admin\ShopBrandController@update');
    Route::post('shop/brand/{id}/delete','Admin\ShopBrandController@destroy');




    Route::get('shop/statistic',function (){
        return view('admin.content.shop.statistic.index');
    });
    Route::get('shop/product/oder',function (){
        return view('admin.content.shop.adminorder.index');
    });
    /**
     * --------route admin nội dung------
     *
     */

    Route::get('content/category','Admin\contentCategoryController@index');
    Route::get('content/category/create','Admin\contentCategoryController@create');
    Route::get('content/category/{id}/edit','Admin\contentCategoryController@edit');
    Route::get('content/category/{id}/delete','Admin\contentCategoryController@delete');

    Route::post('content/category','Admin\contentCategoryController@store');
    Route::post('content/category/{id}','Admin\contentCategoryController@update');
    Route::post('content/category/{id}/delete','Admin\contentCategoryController@destroy');

//content post

    Route::get('content/post','Admin\ContentPostController@index');
    Route::get('content/post/create','Admin\ContentPostController@create');
    Route::get('content/post/{id}/edit','Admin\ContentPostController@edit');
    Route::get('content/post/{id}/delete','Admin\ContentPostController@delete');

    Route::post('content/post','Admin\ContentPostController@store');
    Route::post('content/post/{id}','Admin\ContentPostController@update');
    Route::post('content/post/{id}/delete','Admin\ContentPostController@destroy');

//content page


    Route::get('content/page','Admin\ContentPageController@index');
    Route::get('content/page/create','Admin\ContentPageController@create');
    Route::get('content/page/{id}/edit','Admin\ContentPageController@edit');
    Route::get('content/page/{id}/delete','Admin\ContentPageController@delete');

    Route::post('content/page','Admin\ContentPageController@store');
    Route::post('content/page/{id}','Admin\ContentPageController@update');
    Route::post('content/page/{id}/delete','Admin\ContentPageController@destroy');



   // content tag
    Route::get('content/tag','Admin\ContenttagController@index');
    Route::get('content/tag/create','Admin\ContenttagController@create');
    Route::get('content/tag/{id}/edit','Admin\ContenttagController@edit');
    Route::get('content/tag/{id}/delete','Admin\ContenttagController@delete');

    Route::post('content/tag','Admin\ContenttagController@store');
    Route::post('content/tag/{id}','Admin\ContenttagController@update');
    Route::post('content/tag/{id}/delete','Admin\ContenttagController@destroy');


    /**
     * -------------------------route admin menu---------------------------
     * --------------------------------------------------------------------
     * ---------------------------------------------------------------------
     */
    // route menu
    Route::get('menu','Admin\MenuController@index');
    Route::get('menu/create','Admin\MenuController@create');
    Route::get('menu/{id}/edit','Admin\MenuController@edit');
    Route::get('menu/{id}/delete','Admin\MenuController@delete');

    Route::post('menu','Admin\MenuController@store');
    Route::post('menu/{id}','Admin\MenuController@update');
    Route::post('menu/{id}/delete','Admin\MenuController@destroy');


// route menuitems
    Route::get('menuitems','Admin\MenuItemController@index');
    Route::get('menuitems/create','Admin\MenuItemController@create');
    Route::get('menuitems/{id}/edit','Admin\MenuItemController@edit');
    Route::get('menuitems/{id}/delete','Admin\MenuItemController@delete');

    Route::post('menuitems','Admin\MenuItemController@store');
    Route::post('menuitems/{id}','Admin\MenuItemController@update');
    Route::post('menuitems/{id}/delete','Admin\MenuItemController@destroy');


//golbal setting
    Route::get('config','Admin\ConfigController@index');

    Route::post('config','Admin\ConfigController@store');

// route media
    Route::get('media/',function (){
        return view('admin.content.media.index');
    });

// quản trị admin
    Route::get('users','Admin\AdminManagerController@index');
    Route::get('users/create','Admin\AdminManagerController@create');
    Route::get('users/{id}/edit','Admin\AdminManagerController@edit');
    Route::get('users/{id}/delete','Admin\AdminManagerController@delete');

    Route::post('users','Admin\AdminManagerController@store');
    Route::post('users/{id}','Admin\AdminManagerController@update');
    Route::post('users/{id}/delete','Admin\AdminManagerController@destroy');

    Route::get('newleters/',function (){
        return view('admin.content.newleter.index');
    });







});

/**
 * route cho các nhà cung cấp sản phẩm (seller)
 */
Route::prefix('seller')->group(function (){
    Route::get('/','SellerController@index')->name('seller.dashboard');

    Route::get('/dashboard','SellerController@index')->name('seller.dashboard');



    Route::get('register','SellerController@create')->name('seller.register');
    /**
     *
     */
    Route::post('register','SellerController@store')->name('seller.register.store');



    /**
     * url: authen.com/seller/login
     * route trả về view đăng nhập admin
     */
    Route::get('login','Auth\Seller\LoginController@login')->name('seller.auth.login');

    /**
     * route xử lý đăng nhập
     */
    Route::post('login','Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

    /**
     * url:authen.com/admin/logout
     * route để đăng xuất
     */
    Route::post('logout','Auth\Seller\LoginController@logout')->name('seller.auth.logout');




});

/**
 * route cho các nhà cung cấp sản phẩm (shipper)
 */
Route::prefix('shipper')->group(function (){
    Route::get('/','ShipperController@index')->name('shipper.dashboard');

    Route::get('/dashboard','ShipperController@index')->name('shipper.dashboard');



    Route::get('register','ShipperController@create')->name('shipper.register');
    /**
     *
     */
    Route::post('register','ShipperController@store')->name('shipper.register.store');


    /**
     * url: authen.com/shipper/login
     * route trả về view đăng nhập admin
     */
    Route::get('login','Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    /**
     * route xử lý đăng nhập
     */
    Route::post('login','Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');


    /**
     * url:authen.com/admin/logout
     * route để đăng xuất
     */
    Route::post('logout','Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');






});


