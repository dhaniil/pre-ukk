<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Internship;
use Filament\Tables\Table;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Filament\Widgets\TableWidget as BaseWidget;

class StudentInternshipList extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';
    
    protected function getTableQuery(): Builder
    {
        return Internship::query()
            ->with(['teacher', 'industries'])
            ->when($this->getStudent(), fn (Builder $query) => 
                $query->where('student_id', $this->getStudent()?->id)
            );
    }

    protected function getStudent(): ?Student
    {
        return Student::where('email', Auth::user()?->email)->first();
    }

    public function getTableColumns(): array
    {
        return [
            TextColumn::make('industries.name')
                ->label('Industri')
                ->searchable()
                ->sortable(),
            TextColumn::make('teacher.name')
                ->label('Guru Pembimbing')
                ->searchable()
                ->sortable(),
            TextColumn::make('mulai')
                ->label('Tanggal Mulai')
                ->date()
                ->sortable(),
            TextColumn::make('selesai')
                ->label('Tanggal Selesai')
                ->date()
                ->sortable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            ViewAction::make()
                ->infoList([
                    Section::make('Informasi PKL')
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextEntry::make('industries.name')
                                        ->label('Industri'),
                                    TextEntry::make('industries.bidang_usaha')
                                        ->label('Bidang Usaha'),
                                ]),
                            Grid::make(2)
                                ->schema([
                                    TextEntry::make('teacher.name')
                                        ->label('Guru Pembimbing'),
                                    TextEntry::make('teacher.nip')
                                        ->label('NIP'),
                                ]),
                        ]),
                    Section::make('Detail Waktu')
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextEntry::make('mulai')
                                        ->label('Tanggal Mulai')
                                        ->date('d F Y'),
                                    TextEntry::make('selesai')
                                        ->label('Tanggal Selesai')
                                        ->date('d F Y'),
                                ]),
                        ]),
                    Section::make('Informasi Kontak')
                        ->schema([
                            Grid::make(2)
                                ->schema([
                                    TextEntry::make('industries.address')
                                        ->label('Alamat Industri'),
                                    TextEntry::make('industries.contact')
                                        ->label('Kontak Industri'),
                                ]),
                            TextEntry::make('industries.email')
                                ->label('Email Industri'),
                        ]),
                ]),
            DeleteAction::make(),
        ];
    }
}
