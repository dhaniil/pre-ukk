<?php

namespace App\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $openModal = false;
    public $search = '';
    public $statusPKL = '';
    public $gender = '';
    public $perPage = 10;
    public $sortField = 'name';
    public $sortDirection = 'asc';

    protected $queryString = [
        'search' => ['except' => ''],
        'statusPKL' => ['except' => ''],
        'gender' => ['except' => ''],
        'sortField' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $students = Student::query()
            ->when($this->search, function($query) {
                $query->where(function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%')
                          ->orWhere('nis', 'like', '%'.$this->search.'%')
                          ->orWhere('email', 'like', '%'.$this->search.'%');
                });
            })
            ->when($this->statusPKL, function($query) {
                $query->where('status_pkl', $this->statusPKL);
            })
            ->when($this->gender, function($query) {
                $query->where('gender', $this->gender);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.student.index', [
            'students' => $students
        ]);
    }
}
