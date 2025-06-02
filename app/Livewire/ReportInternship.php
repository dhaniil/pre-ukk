<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Internship;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\Industries;
use Illuminate\Support\Facades\DB;

class ReportInternship extends Component
{
    public $isOpen = false;
    public $industriesId;
    public $mulai;
    public $selesai;

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

    public function closeModal()
    {
        $this->reset(['industriesId', 'mulai', 'selesai']);
        $this->resetValidation();
        $this->dispatch('closeReportModal');
    }

    public function save()
    {
        $this->validate();
    
        DB::beginTransaction();
        try { 
            $duration = \Carbon\Carbon::parse($this->mulai)->diffInDays(\Carbon\Carbon::parse($this->selesai));
            if ($duration < 90) {
                $this->addError('selesai', 'Durasi PKL minimal 90 hari.');
                session()->flash('error', 'Durasi PKL minimal 90 hari.');
                DB::rollBack();
                return;
            }

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

            DB::commit();
            session()->flash('message', 'Laporan PKL berhasil disimpan!');
            $this->closeModal();
            $this->dispatch('internship-created');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan saat menyimpan laporan PKL: ' . $e->getMessage());
            return;
        }
    }
        

    public function render()
    {
        $industries = Industries::all();
        // 321
        return view('livewire.report-internship', [
            'industries' => $industries,
        ]);
    }
}
