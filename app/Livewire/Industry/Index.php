<?php

namespace App\Livewire\Industry;

use Livewire\Component;
use App\Models\Industries;

class Index extends Component
{
    public $search = '';
    public $bidang_usaha = '';

    public function render()
    {
        $optionBidangUsaha = Industries::select('bidang_usaha')
            ->distinct()
            ->pluck('bidang_usaha');
        $industries = Industries::with('teacher')
            ->when($this->search, function ($query) {$query->where('name', 'like', '%' . $this->search . '%');})
            ->when($this->bidang_usaha, function ($query) {$query->where('bidang_usaha', $this->bidang_usaha);
            })
            ->get();
        return view('livewire.industry.index', [
            'industries' => $industries,
            'optionBidangUsaha' => $optionBidangUsaha,
        ]);
    }
}
