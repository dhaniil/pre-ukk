<?php

namespace App\Livewire\Teacher;

use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.teacher.index');
    }
}
