<?php

namespace App\Livewire\Internship;

use App\Models\Industries;
use App\Models\Internship;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $openModal = false;
    public $showReportModal = false;
    public $industries_id;
    public $mulai;
    public $selesai;
    public $internshipId;

    protected $listeners = [
        'closeReportModal' => "closeReportModal"
    ];

    protected $rules = [
        'industries_id' => 'required|exists:industries,id',
        'mulai' => 'required|date',
        'selesai' => 'required|date|after:mulai',
        
    ];

    protected $messages = [
        'industries_id.required' => 'Industri harus dipilih',
        'industries_id.exists' => 'Industri tidak valid',
        'mulai.required' => 'Tanggal mulai harus diisi',
        'mulai.date' => 'Format tanggal mulai tidak valid',
        'selesai.required' => 'Tanggal selesai harus diisi',
        'selesai.date' => 'Format tanggal selesai tidak valid',
        'selesai.after' => 'Tanggal selesai harus setelah tanggal mulai',
        'selesai.after_or_equal' => 'Durasi PKL minimal 90 hari',
    ];

    public function create()
    {
        $this->resetForm();
        $this->openModal = true;
    }

    public function store()
    {
        $this->validate();
        
        try {
            DB::beginTransaction();
            $duration = \Carbon\Carbon::parse($this->mulai)->diffInDays(\Carbon\Carbon::parse($this->selesai));
            
            if ($duration < 90) {
                $this->addError('selesai', 'Durasi PKL minimal 90 hari.');
                session()->flash('error', 'Durasi PKL minimal 90 hari.');
                DB::rollback();
                return;
            }

            
            $student = Student::where('email', Auth::user()->email)->firstOrFail();
            $industries = Industries::find($this->industries_id);
            if (!$industries) {
                DB::rollBack();
                session()->flash('error', 'Industri tidak ditemukan.');
                return;
            }

            Internship::create([
                'student_id' => $student->id,
                'teacher_id' => $industries->guru_pembimbing,
                'industries_id' => $this->industries_id,
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
            ]);

            DB::commit();
            $this->resetForm();
            session()->flash('message', 'Data PKL berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(Internship $internship)
    {
        $this->internshipId = $internship->id;
        $this->industries_id = $internship->industries_id;
        $this->mulai = $internship->mulai;
        $this->selesai = $internship->selesai;
        $this->openModal = true;
    }

    public function update()
    {
        $this->validate();

        try {
            DB::beginTransaction();
            
    
            $duration = \Carbon\Carbon::parse($this->mulai)->diffInDays(\Carbon\Carbon::parse($this->selesai));
            if ($duration < 90) {
                $this->addError('selesai', 'Durasi PKL minimal 90 hari.');
                session()->flash('error', 'Durasi PKL minimal 90 hari.');
                DB::rollBack();
                return;
            }

            $internship = Internship::find($this->internshipId);
            if (!$internship) {
                DB::rollBack();
                session()->flash('error', 'Data PKL tidak ditemukan.');
                return;
            }

            $internship->update([
                'industries_id' => $this->industries_id,
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
            ]);

            DB::commit();
            $this->resetForm();
            session()->flash('message', 'Data PKL berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function delete(Internship $internship)
    {
        $internship->delete();
        session()->flash('message', 'Data PKL berhasil dihapus.');
    }

    public function resetForm()
    {
        $this->reset(['industries_id', 'mulai', 'selesai', 'internshipId', 'openModal']);
        $this->resetValidation();
    }

    public function openReportModal()
    {
        $this->showReportModal = true;
    }

    public function closeReportModal()
    {
        $this->showReportModal = false;
        $this->render();
    }

    public function render()
    {
        $student = Student::where('email', Auth::user()->email)->firstOrFail();
        $industries = Industries::all();
        $internships = Internship::with('industries')
            ->where('student_id', $student->id)->latest()
            ->first();

        return view('livewire.internship.index', [
            'student' => $student,
            'industries' => $industries,
            'internships' => $internships,
        ]);
    }
}
