<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');
Route::get('/', function () {
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    return match(true){
        $user->hasRole('admin') => redirect('admin'),
        $user->hasRole('teacher') => redirect()->route('teacher.dashboard'),
        $user->hasRole('student') => redirect()->route('student.dashboard'),
        default => abort(403, 'Anda tidak memiliki akses ke halaman ini.'),
    };
})->middleware(['auth'])->name('dashboard');

Route::get('student', App\Livewire\Internship\Index::class)
    ->name('student.dashboard')
    ->middleware(['role:student', 'auth']);

Route::get('teacher', App\Livewire\Teacher\Dashboard::class)
    ->name('teacher.dashboard')
    ->middleware(['role:teacher', 'auth']);

Route::get('industry', App\Livewire\Industry\Index::class)
    ->name('industry.dashboard')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});


require __DIR__.'/auth.php';
