<?php

namespace App\Observers;

use App\Models\Student;
use App\Models\User;
use Nette\Utils\Random;

class UserObserver
{
    /**
     * Handle the user "created" event.
     */
    public function created(User $user): void
    {
        Student::create([
            'name' => $user->name,
            'gender' => 'L',
            'address' => 'Default',
            'contact' => '089',
            'email' => $user->email,
            'nis' => Random::generate(5, '0-9'),
            'status_pkl' => 'Tidak Aktif'
        ]);
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(user $user): void
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     */
    public function deleted(user $user): void
    {
        //
    }

    /**
     * Handle the user "restored" event.
     */
    public function restored(user $user): void
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(user $user): void
    {
        //
    }
}
