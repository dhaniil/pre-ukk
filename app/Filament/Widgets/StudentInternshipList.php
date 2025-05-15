<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Internship;
use Filament\Tables\Table;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
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
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
