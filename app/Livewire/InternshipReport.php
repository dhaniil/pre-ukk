<?php

namespace App\Livewire;

use App\Models\Internship;
use App\Models\Student;
use App\Models\Industries;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
class InternshipReport extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    public bool $showModal = false;

    protected $listeners = ['openModal' => 'openModal'];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function openModal(): void
    {
        $this->showModal = true;
        $this->form->fill();
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->reset('data');
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('student_id')
                    ->label('Siswa')
                    ->options(Student::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('Pilih siswa...')
                    ->default(function () {
                        $student = Student::where('email', Auth::user()->email)->first();
                        return $student ? $student->id : null;
                    })
                    ->disabled(),

                Select::make('industries_id')
                    ->label('Industri')
                    ->options(Industries::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('Pilih industri...'),

                Select::make('teacher_id')
                    ->label('Guru Pembimbing')
                    ->options(Teacher::pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->placeholder('Pilih guru pembimbing...'),

                DatePicker::make('mulai')
                    ->label('Tanggal Mulai')
                    ->required()
                    ->native(false),

                DatePicker::make('selesai')
                    ->label('Tanggal Selesai')
                    ->required()
                    ->native(false)
                    ->after('mulai'),
            ])
            ->statePath('data');
    }

    public function create(): void
    {
        try {
            // Validate the form
            $validatedData = $this->form->getState();

            // Create the record
            $internship = Internship::create($validatedData);

            // Reset form and close modal
            $this->reset('data');
            $this->form->fill();
            $this->closeModal();

            // Success notification
            Notification::make()
                ->title('Berhasil!')
                ->body('Laporan PKL berhasil dibuat!')
                ->success()
                ->send();

            // Refresh the parent component
            $this->dispatch('internship-created');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Let Filament handle validation errors
            throw $e;

        } catch (\Exception $e) {
            Notification::make()
                ->title('Error!')
                ->body('Terjadi kesalahan: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }

    public function render(): View
    {
        return view('livewire.internship-report');
    }
}
