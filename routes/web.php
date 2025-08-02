<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('contact', ContactController::class);
Route::get('/contact', [ContactController::class, 'page'])->name('contact.page');


// About
Route::resource('about', AboutController::class);
Route::get('/about', [AboutController::class, 'page'])->name('about.page');