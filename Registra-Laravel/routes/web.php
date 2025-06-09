<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LanguageController;


Route::get('/', [RegistrationController::class, 'show'])->name('home');
Route::get('/register', [RegistrationController::class, 'show'])->name('registration.form');
Route::post('/register', [RegistrationController::class, 'store'])->name('registration.submit');
Route::get('/success', function () {
    return view('registration.success');
})->name('registration.success');
Route::get('lang/change', [LanguageController::class, 'change'])->name('change_lang');
Route::post('/change-language', [App\Http\Controllers\LanguageController::class, 'changeLanguage'])->name('change.language');



// Static pages
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/info', 'info')->name('info');

// Contact form submission
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// API routes
Route::post('/check-username', [APIController::class, 'checkUsername']);
Route::post('/check-email', [APIController::class, 'checkEmail']);
Route::post('/validate-whatsapp', [APIController::class, 'validateWhatsApp']);

Route::post('/change-language', [App\Http\Controllers\LanguageController::class, 'changeLanguage'])->name('change.language');

