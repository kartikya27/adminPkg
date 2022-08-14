<?php
// use Illuminate\Support\Facades\Route;
use Kartikey\AdminCrm\Http\controllers\admin\Auth\AuthenticatedSessionController;
use Kartikey\AdminCrm\Http\controllers\admin\AdminController;

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
        Route::get('announcement_bar','AdminController@announcement_bar_show')->name('announcement_bar');
        Route::get('announcement_bar/create','AdminController@announcement_create')->name('announcement_bar_create');
        Route::post('announcement_bar/create','AdminController@announcement_store')->name('announcement_bar_store');
        Route::get('announcement_bar/{announcementID}', [AdminController::class, 'announcement']) ;
        Route::POST('announcement_bar/{announcementID}/edit', [AdminController::class, 'announcement_edit']);
        Route::get('announcement_bar/{announcementID}/delete', [AdminController::class, 'announcement_delete']);
    });
        

        Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
    });

});

