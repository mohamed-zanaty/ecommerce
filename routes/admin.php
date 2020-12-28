<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    //set guard
    Config::set('auth.define', 'admin');

    //login
    Route::get('login', 'AdminAuthController@index');
    Route::post('login', 'AdminAuthController@dologin')->name('login');
    Route::get('forget', 'AdminAuthController@forget_password')->name('forget.password');
    Route::post('forget', 'AdminAuthController@forget_password_action')->name('forget.password.action');
    Route::get('reset/{token}', 'AdminAuthController@reset')->name('reset');
    Route::post('reset/{token}', 'AdminAuthController@reset_password')->name('reset.password');


    //dashboard
    Route::group(['middleware' => 'admin:admin'], function () {
        //admin
        Route::resource('moderator', 'AdminController');
        Route::delete('moderator/destroy/all', 'AdminController@destroy_all')->name('admin.destroy.all');

        //user
        Route::resource('user', 'UserController');
        Route::delete('user/destroy/all', 'UserController@destroy_all')->name('user.destroy.all');

        //country
        Route::resource('country', 'CountryController');
        Route::delete('country/destroy/all', 'CountryController@destroy_all')->name('country.destroy.all');

        //city
        Route::resource('city', 'CityController');
        Route::delete('city/destroy/all', 'CityController@destroy_all')->name('city.destroy.all');

        //State
        Route::resource('state', 'StateController');
        Route::delete('state/destroy/all', 'StateController@destroy_all')->name('state.destroy.all');

        //department
        Route::resource('department', 'DepartmentsController');

        //trademarks
        Route::resource('trademarks', 'TradeMarksController');
        Route::delete('trademarks/destroy/all', 'TradeMarksController@destroy_all')->name('trademarks.destroy.all');


        //manufactures
        Route::resource('manufacturers', 'ManufacturersController');
        Route::delete('manufacturers/destroy/all', 'ManufacturersController@destroy_all')->name('manufacturers.destroy.all');


        //shipping
        Route::resource('shipping', 'ShippingController');
        Route::delete('shipping/destroy/all', 'ShippingController@destroy_all')->name('shipping.destroy.all');


        //malls
        Route::resource('malls', 'MallsController');
        Route::delete('malls/destroy/all', 'MallsController@destroy_all')->name('malls.destroy.all');


        //colors
        Route::resource('colors', 'ColorsController');
        Route::delete('colors/destroy/all', 'colorsController@destroy_all')->name('colors.destroy.all');


        //sizes
        Route::resource('sizes', 'SizesController');
        Route::delete('sizes/destroy/all', 'SizesController@destroy_all')->name('sizes.destroy.all');


        //weights
        Route::resource('weights', 'WeightsController');
        Route::delete('weights/destroy/all', 'WeightsController@destroy_all')->name('weights.destroy.all');


        //products
        Route::resource('products', 'ProductsController');
        Route::delete('products/destroy/all', 'ProductsController@multi_delete');
        Route::post('products/search', 'ProductsController@product_search');
        Route::post('products/copy/{pid}', 'ProductsController@copy_product');
        Route::post('upload/image/{pid}', 'ProductsController@upload_file');
        Route::post('delete/image', 'ProductsController@delete_file');
        Route::post('update/image/{pid}', 'ProductsController@update_product_image');
        Route::post('delete/product/image/{pid}', 'ProductsController@delete_main_image');
        Route::post('load/wight/size', 'ProductsController@prepare_weight_size');

        //setting
        Route::get('settings', 'SettingController@setting')->name('setting.index');
        Route::post('settings', 'SettingController@setting_save')->name('setting.save');

        Route::get('/', function () {
            return view('dashboard.page.home');
        })->name('dashboard');
    });//middleware admin


    //lang
    Route::get('lang/{lang}', function ($lang) {
        session()->has('lang') ? session()->forget('lang') : '';
        $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
        return back();
    })->name('lang');

    //currency
    Route::get('currency/{currency}', function ($currency) {
        session()->has('currency') ? session()->forget('currency') : '';
        $currency != null ? session()->put('currency',$currency ) : session()->put('currency', 'EGB');
        return back();
    })->name('currency');

});//for prefix admin
