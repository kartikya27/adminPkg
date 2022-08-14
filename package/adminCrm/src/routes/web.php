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
        
Route::get('home_banner', [AdminController::class, 'home_banner']);
Route::get('home_banner/new', [AdminController::class, 'home_banner_new']);
Route::POST('home_banner/new', [AdminController::class, 'home_banner_add']);
Route::get('home_banner/{bannerID}', [AdminController::class, 'home__banner_form']);
Route::POST('home_banner/{bannerID}/edit', [AdminController::class, 'home_banner_edit']);
Route::POST('home_banner/{bannerID}/image', [AdminController::class, 'home_banner_edit_image']);
Route::get('home_banner/{bannerID}/delete', [AdminController::class, 'home_banner_delete']);

Route::get('who-we-are', [adminController::class, 'who_we']);
Route::get('who-we-are/new', [adminController::class, 'who_we_new']);
Route::POST('who-we-are/new', [adminController::class, 'who_we_add']);
Route::get('who-we-are/{sectionID}', [adminController::class, 'who_we_form']);
Route::POST('who-we-are/{sectionID}/edit', [adminController::class, 'who_we_edit']);
Route::get('who-we-are/{sectionID}/delete', [adminController::class, 'who_we_delete']);

Route::get('success-stories', [adminController::class, 'success_stories']);
Route::get('success-stories/new', [adminController::class, 'success_stories_new']);
Route::POST('success-stories/new', [adminController::class, 'success_stories_add']);
Route::get('success-stories/{sectionID}', [adminController::class, 'success_stories_form']);
Route::POST('success-stories/{sectionID}/edit', [adminController::class, 'success_stories_edit']);
Route::get('success-stories/{sectionID}/delete', [adminController::class, 'success_stories_delete']);


    });
        

        Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
    });

});

