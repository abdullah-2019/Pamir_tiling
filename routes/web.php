<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'siteHomePage'])->name('home');

// Contact
Route::resource('contact', ContactController::class);
Route::get('/contact-page', [ContactController::class, 'page'])->name('contact.page');
Route::get('/contact-data', [ContactController::class, 'data'])->name('contact.data');


// About
Route::resource('/about', AboutController::class);
Route::get('/about-page', [AboutController::class, 'page'])->name('about.page');
Route::put('/about/{about}/emails', [AboutController::class, 'updateEmail'])->name('about.emails.update');
Route::delete('/about/{about}/emails', [AboutController::class, 'destroyEmail'])->name('about.emails.destroy');
Route::post('/about/{about}/emails', [AboutController::class, 'addEmail'])->name('about.emails.create');
Route::put('/about/{about}/phones', [AboutController::class, 'updatePhone'])->name('about.phones.update');
Route::delete('/about/{about}/phones', [AboutController::class, 'destroyPhone'])->name('about.phones.destroy');
Route::post('/about/{about}/other', [AboutController::class, 'updateOtherInfo'])->name('about.other-info.update');

// Services
Route::resource('services', ServicesController::class);
Route::get('/services', [ServicesController::class, 'page'])->name('services.page');
Route::get('service-detail/{slug}', [ServicesController::class, 'serviceDetail'])->name('service-detail');

// Projects
Route::resource('projects', ProjectsController::class);
Route::get('/projects', [ProjectsController::class, 'page'])->name('projects.page');
Route::get('/project-detail/{id}', [ProjectsController::class, 'projectDetial'])->name('project-detail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
