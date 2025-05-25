<?php

namespace App\Observers;

use App\Models\Teacher;
use App\Models\User;

class TeacherObserver
{
    /**
     * Handle the Teacher "created" event.
     */
    public function created(Teacher $teacher): void
    {
        User::create([
            'name' => $teacher->name,
            'email' => $teacher->email,
            'password' => Hash::make($teacher->nip),
            'email_verified_at' => now(),
            'role' => 'teacher',
        ]);
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
