<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Internship;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\Industries;

class ReportInternship extends Component
{
    public $isOpen = false;
    public $industriesId;
    public $mulai;
    public $selesai;

    protected $listeners = [
        'openReportModal' => 'openModal',
        'closeReportModal' => 'closeModal'
    ];

    protected $rules = [
        'industriesId' => 'required|exists:industries,id',
        'mulai' => 'required|date',
        'selesai' => 'required|date|after:mulai',
    ];

    protected $messages = [
        'industriesId.required' => 'Industri harus dipilih',
        'industriesId.exists' => 'Industri tidak valid',
        'mulai.required' => 'Tanggal mulai harus diisi',
        'mulai.date' => 'Format tanggal mulai tidak valid',
        'selesai.required' => 'Tanggal selesai harus diisi',
        'selesai.date' => 'Format tanggal selesai tidak valid',
        'selesai.after' => 'Tanggal selesai harus setelah tanggal mulai',
    ];

    public function openModal()
    {
        $this->isOpen = true;
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset(['industriesId', 'mulai', 'selesai']);
        $this->resetValidation();
    }

    public function save()
    {
        $this->validate();

        $student = Student::where('email', Auth::user()->email)->firstOrFail();
        $industries = Industries::find($this->industriesId);
        $teacher = $industries->teacher;
        Internship::create([
            'student_id' => $student->id,
            'teacher_id' => $teacher->id,
            'industries_id' => $this->industriesId,
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
        ]);

        session()->flash('message', 'Laporan PKL berhasil disimpan!');
        $this->closeModal();

    }

    public function render()
    {
        $industries = Industries::all();
        return view('livewire.report-internship', [
            'industries' => $industries,
        ]);
    }
}
