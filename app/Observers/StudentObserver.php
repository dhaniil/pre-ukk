<?php

namespace App\Observers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudentObserver
{
    public function created(Student $student): void
    {
        $user = User::create([
            'name' => $student->name,
            'email' => $student->email,
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
        ]);

        $role = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
        $user->assignRole($role);
    }

    public function updated(Student $student): void
    {
        // Update user ketika student diupdate
        $user = User::where('email', $student->email)->first();
        if ($user) {
            $user->update([
                'name' => $student->name,
                'email' => $student->email,
            ]);
        }
    }
}
