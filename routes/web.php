<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutAddressController;


Route::get('/', [HomeController::class, 'siteHomePage'])->name('home');

// Contact
Route::resource('contact', ContactController::class);
Route::get('/contact-page', [ContactController::class, 'page'])->name('contact.page');
Route::get('/contact-data', [ContactController::class, 'data'])->name('contact.data');
Route::post('/contacts/{contact}/toggle-status', [ContactController::class, 'toggleStatus'])->name('contact.toggleStatus');


// About
Route::resource('/about', AboutController::class);
Route::get('/about-page', [AboutController::class, 'page'])->name('about.page');
Route::put('/about/{about}/emails', [AboutController::class, 'updateEmail'])->name('about.emails.update');
Route::delete('/about/{about}/emails', [AboutController::class, 'destroyEmail'])->name('about.emails.destroy');
Route::post('/about/{about}/emails', [AboutController::class, 'addEmail'])->name('about.emails.create');
Route::put('/about/{about}/phones', [AboutController::class, 'updatePhone'])->name('about.phones.update');
Route::delete('/about/{about}/phones', [AboutController::class, 'destroyPhone'])->name('about.phones.destroy');
Route::post('/about/{about}/phones', [AboutController::class, 'addPhone'])->name('about.phones.create');
Route::post('/about/{about}/other', [AboutController::class, 'updateOtherInfo'])->name('about.other-info.update');
Route::post('/about/{about}/our-history', [AboutController::class, 'updateOurHistory'])->name('about.our-history.update');
Route::prefix('/about/{about}')->name('about.address.')->group(function () {
    Route::put('/country', [AboutAddressController::class, 'updateCountry'])->name('updateCountry');
    Route::put('/city', [AboutAddressController::class, 'updateCity'])->name('updateCity');
    Route::put('/address', [AboutAddressController::class, 'updateAddress'])->name('updateAddress');
});
Route::post('/about/logo/update', [AboutController::class, 'updateLogo'])->name('about.logo.update');
Route::prefix('about/other')->name('about.other.')->group(function () {
    Route::patch('/company-creation-date', [AboutController::class, 'updateCompanyCreationDate'])
        ->name('updateCompanyCreationDate');
    Route::patch('/awards', [AboutController::class, 'updateAwards'])
        ->name('updateAwards');
});

// Services
Route::resource('services', ServicesController::class);
Route::get('/services-page', [ServicesController::class, 'page'])->name('services.page');
Route::get('service-detail/{slug}', [ServicesController::class, 'serviceDetail'])->name('service-detail');
Route::get('/services-data', [ServicesController::class, 'data'])->name('services.data');


// Projects
Route::resource('projects', ProjectsController::class);
Route::get('/projects-page', [ProjectsController::class, 'page'])->name('projects.page');
Route::get('/project-detail/{id}', [ProjectsController::class, 'projectDetial'])->name('project-detail');
Route::get('/projects-data', [ProjectsController::class, 'data'])->name('projects.data');

Route::get('/dashboard', HomeController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/image', [ProfileController::class, 'updateImage'])->name('profile.image');
});


require __DIR__.'/auth.php';
