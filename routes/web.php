<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstController;

Route::post('/logout', [FirstController::class, 'logout'])->name('logout');


Route::get('/', function () {
    return view('land');
})->name('land');

Route::view("/land", "land")->name('land');

// Auth Admin
Route::view('adminAuth', 'adminAuth')->name('adminAuth');

Route::post('adminAuth', [FirstController::class, 'adminAuth'])->name('adminAuth');

// Dashboard Admin
Route::view('/dashboard_admin', 'dashboard_admin')->name('dashboard_admin');


Route::get("/connection", function(){
    return view('connection');
});
Route::post('/connexion', [FirstController::class, 'connexion'])->name('connexion');

Route::view("/adminAuth", "adminAuth");
Route::post('/adminAuth', [FirstController::class, 'adminAuth'])->name('adminAuth');


Route::view("/inscription", 'inscription');
Route::post('/inscription', [FirstController::class, 'inscription'])->name('inscription');

Route::view("/forgotpwd", 'forgotpwd');
Route::post('forgotpwd', [FirstController::class, 'forgotpwd'])->name('forgotpwd');


Route::view("/redirectionUser", "redirectionUser");
Route::post('/redirectionUser', [FirstController::class, 'redirectionUser'])->name('redirectionUser');

Route::view("/regisDoc", "regisDoc");
Route::post('/regisDoc', [FirstController::class, 'regisDoc'])->name('regisDoc');

Route::view("/demandeDoc", "demandeDoc");
Route::post('/demandeDoc', [FirstController::class, 'demandeDoc'])->name('demandeDoc');

Route::get('/dashboard/patient', function () {
    return view('dashboard.patient');
})->name('dashboard.patient');

// Dashboard Médecin
Route::get('/dashboard/medecin', function () {
    return view('dashboard.medecin');
})->name('dashboard.medecin');
//
Route::get('/dashboard/admin_dashboard', function () {
    return view('dashboard.admin_dashboard');
})->name('dashboard.admin_dashboard');

Route::get('/admin', function() {
    return view('admin'); // vue admin.blade.php
})->name('admin.auth');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
