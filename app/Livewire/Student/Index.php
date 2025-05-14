<?php

namespace App\Livewire\Student;

use Livewire\Component;

class Index extends Component
{
    public $openModal = false;


    public function buttonModal()
    {
        $this->openModal = !$this->openModal;
    }

    public function render()
    {
        return view('livewire.student.index');
    }
}
