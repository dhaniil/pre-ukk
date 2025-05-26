<?php

namespace App\Livewire\Teacher;

use App\Models\Internship;
use Livewire\Component;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $search = '';
    public $statusFilter = 'all';
    
    public function updatedSearch()
    {
        // Automatically refresh when search changes
    }
    
    public function updatedStatusFilter()
    {
        // Automatically refresh when filter changes
    }
    
    public function getFilteredStudents($student)
    {
        $filtered = $student;
        
        // Apply search filter
        if ($this->search) {
            $filtered = $filtered->filter(function ($internship) {
                return stripos($internship->student->name, $this->search) !== false ||
                       stripos($internship->student->nis, $this->search) !== false ||
                       stripos($internship->student->email, $this->search) !== false;
            });
        }
        
        // Apply status filter
        if ($this->statusFilter !== 'all') {
            $filtered = $filtered->filter(function ($internship) {
                $now = Carbon::now();
                $start = Carbon::parse($internship->mulai);
                $end = Carbon::parse($internship->selesai);
                
                switch ($this->statusFilter) {
                    case 'belum_mulai':
                        return $now < $start;
                    case 'aktif':
                        return $now >= $start && $now <= $end;
                    case 'selesai':
                        return $now > $end;
                    default:
                        return true;
                }
            });
        }
        
        return $filtered;
    }

    public function render()
    {
        $teacher = Teacher::where('email', Auth::user()->email)->first();
        if(!$teacher){
            abort(404, 'Data guru tidak ditemukan');
        }
        
        $industry = $teacher->industries->first();
        $student = collect(); // Default empty collection
        
        if($industry) {
            $student = Internship::where('industries_id', $industry->id)->with('student')->get();
            $student = $this->getFilteredStudents($student);
        }
        
        return view('livewire.teacher.dashboard', [
            'teacher' => $teacher,
            'industry' => $industry,
            'student' => $student,
            'allStudents' => $industry ? Internship::where('industries_id', $industry->id)->with('student')->get() : collect(),
        ]);
    }
}
