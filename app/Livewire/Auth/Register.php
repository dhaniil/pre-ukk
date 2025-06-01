<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Student;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', function ($attribute, $value, $fail) {
                $studentExists = Student::where('email', $value)->exists();
                
                if (!$studentExists) {
                    $fail('Email ini tidak terdaftar sebagai siswa. Hubungi administrator untuk mendaftarkan email Anda terlebih dahulu.');
                    return;
                }

                $userExists = User::where('email', $value)->exists();
                if ($userExists) {
                    $fail('Email ini sudah terdaftar sebagai user. Silakan login atau reset password jika lupa.');
                    return;
                }
            }],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $student = Student::where('email', $validated['email'])->first();
        $user = User::create([
            'name' => $student->name,
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        $user->assignRole('student');
        event(new Registered($user));
        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
