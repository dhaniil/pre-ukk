<?php

namespace App\Livewire\Industry;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Industries;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $bidang_usaha = '';
    public $perPage = 10;
    public $sortField = 'name';
    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'bidang_usaha' => ['except' => ''],
        'perPage' => ['except' => 10],
        'sortField' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingBidangUsaha()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
    public function resetFilter()
    {
        $this->reset(['search', 'bidang_usaha']);
        $this->resetPage();
    }

    public function render()
    {
        $optionBidangUsaha = Industries::select('bidang_usaha')
            ->distinct()
            ->pluck('bidang_usaha');
            
        $industries = Industries::with('teacher')
            ->when($this->search, function ($query) {
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('bidang_usaha', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->bidang_usaha, function ($query) {
                $query->where('bidang_usaha', $this->bidang_usaha);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);
            
        return view('livewire.industry.index', [
            'industries' => $industries,
            'optionBidangUsaha' => $optionBidangUsaha,
        ]);
    }
}