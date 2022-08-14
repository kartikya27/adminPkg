<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;


Route::get('/', function () {
    return view('index');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('what-we-do/education/sabko-shiksha', [WebController::class, 'sabkoShiksha'])
    ->name('what-we-do.sabko-shiksha');

Route::get('what-we-do/volunteer', [WebController::class, 'volunteer'])
    ->name('volunteer');

Route::get('what-we-do/success-stories', [WebController::class, 'successStories'])
    ->name('success-stories');

Route::get('events', [WebController::class, 'events'])
    ->name('events');

Route::get('gallery', [WebController::class, 'gallery'])
    ->name('gallery');



### NOT IN USE FOR LOGIN NOW
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
