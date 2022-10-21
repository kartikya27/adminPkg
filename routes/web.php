<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\RazorpayPaymentController;

Route::get('/', [WebController::class, 'index']);
Route::get('/contact', [WebController::class, 'contact']);
Route::post('/contact', [WebController::class, 'contact_submit']);
Route::get('what-we-do/{category}/{schemeUrl}', [WebController::class, 'programs']);
Route::get('what-we-do/volunteer', [WebController::class, 'volunteer'])->name('volunteer');
Route::get('what-we-do/success-stories', [WebController::class, 'successStories'])->name('success-stories');
Route::get('events', [WebController::class, 'events'])->name('events');
Route::get('activity', [WebController::class, 'activity'])->name('activity');
Route::get('gallery', [WebController::class, 'gallery'])->name('gallery');
Route::get('what-we-do/{param}', [WebController::class, 'webpage'])->name('webpage');
Route::get('details', [WebController::class, 'details']);
Route::get('donate', [WebController::class, 'donate']);


// For Payment Gatway
Route::get('donation', [RazorpayPaymentController::class, 'index']);
Route::get('paysuccess', [RazorpayPaymentController::class, 'store']);
Route::post('paymentsuccess', [RazorpayPaymentController::class, 'paymentsuccess']);
Route::get('thankyou', [RazorpayPaymentController::class, 'success']);
Route::post('pay', [RazorpayPaymentController::class, 'pay']);

// For User Dashboard
Route::get('/dashboard', [WebController::class,'dashboard'])->middleware(['auth','verified'])->name('dashboard');
Route::get('/mydonation', [WebController::class,'donationView'])->middleware(['auth','verified'])->name('donation');
Route::POST('/dashboard', [WebController::class,'updateDetails'])->middleware(['auth','verified'])->name('donation');


// For Api
Route::group(['prefix' => 'api'], function(){
    Route::GET('GetFinalLocation',[ApiController::class,'GetFinalLocation']);
});

// For Web Artisan Command
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    });

Route::get('/makemodel/{model}', [WebController::class, 'makemodel']);
Route::get('/migrate/{model}', [WebController::class, 'migrate']);

require __DIR__.'/auth.php';
