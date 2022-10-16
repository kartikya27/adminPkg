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
        
        Route::get('menu', [AdminController::class, 'menu']);
        Route::get('menu/new', [AdminController::class, 'menu_add']);
        Route::post('menu/new', [AdminController::class, 'menu_store']);
        Route::get('menu/{menuID}', [AdminController::class, 'menu_form']);
        Route::post('menu/{menuID}/edit', [AdminController::class, 'menu_edit']);
        Route::get('menu/{menuID}/delete', [AdminController::class, 'menu_delete']);
               
Route::get('page_menu', [AdminController::class, 'page_menu']);
Route::get('page_menu/new', [AdminController::class, 'page_menu_add']);
Route::post('page_menu/new', [AdminController::class, 'page_menu_store']);
Route::get('page_menu/{menuID}', [AdminController::class, 'page_menu_form']);
Route::post('page_menu/{menuID}/edit', [AdminController::class, 'page_menu_edit']);
Route::get('page_menu/{menuID}/delete', [AdminController::class, 'page_menu_delete']);

Route::get('page_content', [AdminController::class, 'page_content']);
Route::get('page_content/new', [AdminController::class, 'page_content_new']);
Route::POST('page_content/new', [AdminController::class, 'page_content_store']);
Route::get('page_content/{pageID}', [AdminController::class, 'page_content_form']);
Route::POST('page_content/image/{pageID}', [AdminController::class, 'page_content_add_image']);
Route::post('page_content/{pageID}/edit', [AdminController::class, 'page_content_edit']);
Route::DELETE('page_content/delete', [AdminController::class, 'page_content_delete']);
Route::DELETE('/web_image', [AdminController::class, 'delete_web_image']);
  
        Route::get('products', [AdminController::class, 'products']);
        Route::get('products/new', [AdminController::class, 'product_new']);
        Route::POST('products/new', [AdminController::class, 'product_store']);
        Route::get('products/{productID}', [AdminController::class, 'product']);
        Route::POST('products/image/{productID}', [AdminController::class, 'add_image']);
        Route::post('products/{productID}/edit', [AdminController::class, 'product_edit']);
        Route::DELETE('products/delete', [AdminController::class, 'product_delete']);
        Route::DELETE('/image', [AdminController::class, 'delete_image']);
            
        Route::get('categories', [AdminController::class, 'categories']);
        Route::get('categories/new', [AdminController::class, 'categories_new']);
        Route::post('categories/new', [AdminController::class, 'categories_store']);
        Route::get('categories/{categorieID}', [AdminController::class, 'categorie']);
        Route::post('categories/{categorieID}/edit', [AdminController::class, 'categorie_edit']);
        Route::get('categories/{categorieID}/delete', [AdminController::class, 'categorie_delete']);
            
                
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
            
        Route::put('arrange_slider_table/',[AdminController::class,'arrange_slider_table']);
            
        Route::get('who-we-are', [adminController::class, 'who_we']);
        Route::get('who-we-are/new', [adminController::class, 'who_we_new']);
        Route::POST('who-we-are/new', [adminController::class, 'who_we_add']);
        Route::get('who-we-are/{sectionID}', [adminController::class, 'who_we_form']);
        Route::POST('who-we-are/{sectionID}/edit', [adminController::class, 'who_we_edit']);
        Route::POST('who-we-are/{bannerID}/image', [AdminController::class, 'who_we_edit_image']);
        Route::get('who-we-are/{sectionID}/delete', [adminController::class, 'who_we_delete']);
            
        Route::get('success-stories', [adminController::class, 'success_stories']);
        Route::get('success-stories/new', [adminController::class, 'success_stories_new']);
        Route::POST('success-stories/new', [adminController::class, 'success_stories_add']);
        Route::get('success-stories/{sectionID}', [adminController::class, 'success_stories_form']);
        Route::POST('success-stories/{sectionID}/edit', [adminController::class, 'success_stories_edit']);
        Route::get('success-stories/{sectionID}/delete', [adminController::class, 'success_stories_delete']);
            
        Route::get('testimonial', [adminController::class, 'testimonial']);
        Route::get('testimonial/new', [adminController::class, 'testimonial_new']);
        Route::POST('testimonial/new', [adminController::class, 'testimonial_add']);
        Route::get('testimonial/{sectionID}', [adminController::class, 'testimonial_form']);
        Route::POST('testimonial/{sectionID}/edit', [adminController::class, 'testimonial_edit']);
        Route::get('testimonial/{sectionID}/delete', [adminController::class, 'testimonial_delete']);
            
        Route::get('Contact', [adminController::class, 'contact']);
        Route::get('Contact/new', [adminController::class, 'contact_new']);
        Route::POST('Contact/new', [adminController::class, 'contact_add']);
        Route::get('Contact/{sectionID}', [adminController::class, 'contact_form']);
        Route::POST('Contact/{sectionID}/edit', [adminController::class, 'contact_edit']);
        Route::get('Contact/{sectionID}/delete', [adminController::class, 'contact_delete']);
            
        Route::get('events', [adminController::class, 'events']);
        Route::get('events/new', [adminController::class, 'events_new']);
        Route::POST('events/new', [adminController::class, 'events_add']);
        Route::get('events/{sectionID}', [adminController::class, 'events_form']);
        Route::POST('events/{sectionID}/edit', [adminController::class, 'events_edit']);
        Route::get('events/{sectionID}/delete', [adminController::class, 'events_delete']);
        Route::POST('events/{bannerID}/image', [AdminController::class, 'events_edit_image']);

    });
        

        Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
    });

});