<?php

namespace App\Filament\Pages\Widgets;

use App\Models\Student;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Infolist;

class StudentInfoWidget extends Widget
{
    protected static string $view = 'filament.pages.widgets.student-info-widget';

    public function getStudent(): ?Student
    {
        return Student::where('email', Auth::user()?->email)->first();
    }

    public function getInfolist(): Infolist
    {
        $student = $this->getStudent();
        $internship = $student?->internships()?->latest()->first();

        return Infolist::make()
            ->schema([
                Section::make('Informasi Siswa')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama'),
                        TextEntry::make('nis')
                            ->label('NIS'),
                        TextEntry::make('status_pkl')
                            ->label('Status PKL')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Aktif' => 'success',
                                'Tidak Aktif' => 'danger',
                            }),
                    ])
                    ->columns(3),

                Section::make('Detail PKL')
                    ->schema([
                        TextEntry::make('internships.industries.name')
                            ->label('Industri')
                            ->visible(fn () => $internship !== null),
                        TextEntry::make('internships.teacher.name')
                            ->label('Guru Pembimbing')
                            ->visible(fn () => $internship !== null),
                        TextEntry::make('internships.mulai')
                            ->label('Tanggal Mulai')
                            ->date()
                            ->visible(fn () => $internship !== null),
                        TextEntry::make('internships.selesai')
                            ->label('Tanggal Selesai')
                            ->date()
                            ->visible(fn () => $internship !== null),
                    ])
                    ->columns(2)
                    ->visible(fn () => $student?->status_pkl === 'Aktif'),
            ])
            ->record($student);
    }
}
