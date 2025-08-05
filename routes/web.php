<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ProjectsController;

Route::get('/', [HomeController::class, 'siteHomePage'])->name('home');

Route::resource('contact', ContactController::class);
Route::get('/contact', [ContactController::class, 'page'])->name('contact.page');


// About
Route::resource('about', AboutController::class);
Route::get('/about', [AboutController::class, 'page'])->name('about.page');

// Services
Route::resource('services', ServicesController::class);
Route::get('/services', [ServicesController::class, 'page'])->name('services.page');
Route::get('service-detail/{slug}', [ServicesController::class, 'serviceDetail'])->name('service-detail');

// Projects
Route::resource('projects', ProjectsController::class);
Route::get('/projects', [ProjectsController::class, 'page'])->name('projects.page');