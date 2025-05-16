<?php

namespace App\Filament\Pages;

use App\Models\Student;
use App\Models\Internship;
use Filament\Forms\Form;
use Filament\Pages\Page;
use App\Models\Industries;
use Filament\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

class StudentDashboard extends Page
{
    protected static string $view = 'filament.pages.student-dashboard';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Dashboard Siswa';
    protected static ?string $title = 'Dashboard PKL Saya';
    protected static ?string $slug = 'student-dashboard';
    protected static ?int $navigationSort = 2;


    protected function getHeaderActions(): array
    {
        if(auth()->user()->role === "student")
        {
            return [
                Action::make('create')
                    ->label('Tambah PKL')
                    ->form($this->form(...))
                    ->action(function (array $data): void {
                        Internship::create($data);
                    })
            ];
        }
        return [];
    }

    protected function getStudent(): ?Student
    {
        return Student::where('email', Auth::user()?->email)->first();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('student_id')
                    ->default(fn () => $this->getStudent()?->id),

                Select::make('industries_id')
                    ->label('Industri')
                    ->options(Industries::query()->pluck('name', 'id'))
                    ->searchable()
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (callable $set, $state) {
                        if ($state) {
                            $industry = Industries::find($state);
                            if ($industry && $industry->teacher) {
                                $set('teacher_id', $industry->teacher->id);
                                $set('guru_pembimbing', $industry->teacher->name);
                            } else {
                                $set('teacher_id', null);
                                $set('guru_pembimbing', '-');
                            }
                        } else {
                            $set('teacher_id', null);
                            $set('guru_pembimbing', '-');
                        }
                    }),

                Hidden::make('teacher_id'),

                TextInput::make('guru_pembimbing')
                    ->label('Guru Pembimbing')
                    ->disabled()
                    ->dehydrated(false)
                    ->visible(fn (callable $get) => (bool) $get('industries_id')),

                DatePicker::make('mulai')
                    ->label('Tanggal Mulai')
                    ->required()
                    ->beforeOrEqual('selesai'),

                DatePicker::make('selesai')
                    ->label('Tanggal Selesai')
                    ->required()
                    ->afterOrEqual('mulai'),
            ]);
    }

    protected static function shouldRegister(): bool
    {
        return Auth::check();
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Siswa';
    }

}

