<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
    
    // PKL/Internship routes
    Route::get('pkl', App\Livewire\Internship\Index::class)->name('pkl');
    Route::get('internship', App\Livewire\Internship\Index::class)->name('internship');
    Route::get('student', App\Livewire\Student\Index::class)->name('student');
});

Route::get('test', function () {
    return 'test';
})->name('test');

require __DIR__.'/auth.php';
