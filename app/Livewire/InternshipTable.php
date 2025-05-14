<?php

namespace App\Livewire;

use App\Models\Industries;
use App\Models\Internship;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\In;
use Livewire\Component;

class InternshipTable extends Component
{
    public $internships;

    public function mount()
    {
        $user = Auth::user();
        $student = Student::where('email', $user->email)->with('industry')->first();
//        $industry = $student->industry;
        dd($student);
    }

    public function render()
    {
        return view('livewire.internship-table');
    }
}
