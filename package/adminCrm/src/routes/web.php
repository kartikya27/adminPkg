<?php
// use Illuminate\Support\Facades\Route;
use Kartikey\AdminCrm\Http\controllers\admin\Auth\AuthenticatedSessionController;

Route::group(['namespace'=>'Kartikey\AdminCrm\Http\controllers','middleware' => 'web'],function(){

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->group(function(){
        Route::get('login','AuthenticatedSessionController@create')->name('login');
        Route::post('login','AuthenticatedSessionController@store')->name('login');
        });
    Route::middleware('admin')->group(function(){
        Route::get('dashboard','AdminController@index')->name('dashboard');
        Route::get('/','AdminController@index')->name('dashboard');
        Route::get('orders','AdminController@orders')->name('orders');
        Route::get('checkouts','AdminController@checkouts')->name('checkouts');
        Route::get('products','AdminController@products')->name('products');
        Route::get('categories','AdminController@categories')->name('categories');
        
    });
        

        Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
    });

});

