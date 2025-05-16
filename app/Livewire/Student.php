<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student as ModelStudent;

class Student extends Component
{
    public $students;

    public function mount()
    {
        $this->students = ModelStudent::with('internships')->get();
    }
    public function render()
    {
        return view('livewire.student');
    }
}
