<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\RazorpayPaymentController;

Route::get('/', [WebController::class, 'index']);

Route::get('/contact', [WebController::class, 'contact']);

Route::get('what-we-do/{category}/{schemeUrl}', [WebController::class, 'programs']);

Route::get('what-we-do/volunteer', [WebController::class, 'volunteer'])
    ->name('volunteer');

Route::get('what-we-do/success-stories', [WebController::class, 'successStories'])
    ->name('success-stories');

Route::get('events', [WebController::class, 'events'])
    ->name('events');

Route::get('activity', [WebController::class, 'activity'])
    ->name('activity');

Route::get('gallery', [WebController::class, 'gallery'])
    ->name('gallery');

Route::get('what-we-do/{param}', [WebController::class, 'webpage'])
    ->name('webpage');

Route::get('details', [WebController::class, 'details']);

Route::get('donate', [WebController::class, 'donate']);




Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});

Route::get('/makemodel/{model}', [WebController::class, 'makemodel']);
Route::get('/migrate/{model}', [WebController::class, 'migrate']);

// For Payment Gatway
Route::get('donation', [RazorpayPaymentController::class, 'index']);
Route::get('paysuccess', [RazorpayPaymentController::class, 'razorPaySuccess']);
Route::get('razor-thank-you', [RazorpayPaymentController::class, 'RazorThankYou']);

### NOT IN USE FOR LOGIN NOW
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
