<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contact', ContactController::class);
Route::get('/contact', [ContactController::class, 'page'])->name('contact.page');


// About
Route::resource('about', AboutController::class);
Route::get('/about', [AboutController::class, 'page'])->name('about.page');

// Services
Route::resource('services', ServicesController::class);
Route::get('/services', [ServicesController::class, 'page'])->name('services.page');