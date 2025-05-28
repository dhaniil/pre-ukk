<?php

namespace App\Observers;

use App\Models\Internship;
use App\Models\Student;

class InternshipObserver
{
    public function created(Internship $internship){



         Student::where('id', $internship->student_id)
         ->update(['status_pkl' => 'Aktif']);
    }
}
