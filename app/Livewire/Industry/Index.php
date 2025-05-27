<?php

namespace App\Livewire\Industry;

use Livewire\Component;
use App\Models\Industries;

class Index extends Component
{
    public function render()
    {
        $industries = Industries::with('teacher')->get( );
        return view('livewire.industry.index', [
            'industries' => $industries,
        ]);
    }
}
