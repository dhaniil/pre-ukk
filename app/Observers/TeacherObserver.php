<?php

namespace App\Observers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class TeacherObserver
{
    /**
     * Handle the Teacher "created" event.
     */
    public function created(Teacher $teacher): void
    {
        $user = User::create([
            'name' => $teacher->name,
            'email' => $teacher->email,
            'password' => Hash::make('12345678'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('teacher');


    }

    /**
     * Handle the Teacher "updated" event.
     */
    public function updated($teacher): void
    {
        // Logic to handle when a teacher is updated
    }

    /**
     * Handle the Teacher "deleted" event.
     */
    public function deleted($teacher): void
    {
        // Logic to handle when a teacher is deleted
    }

    /**
     * Handle the Teacher "restored" event.
     */
    public function restored($teacher): void
    {
        // Logic to handle when a teacher is restored
    }

    /**
     * Handle the Teacher "force deleted" event.
     */
    public function forceDeleted($teacher): void
    {
        // Logic to handle when a teacher is force deleted
    }
}
