<?php

namespace App\Filament\Resources\StudentResource\Widgets;

use App\Models\Student;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StudentOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Siswa', Student::count())
                ->description('Jumlah seluruh siswa')
                ->icon('heroicon-o-academic-cap'),
            
            Stat::make('Siswa PKL Aktif', Student::where('status_pkl', 'Aktif')->count())
                ->description('Siswa yang sedang PKL')
                ->icon('heroicon-o-check-circle')
                ->color('success'),

            Stat::make('Siswa PKL Tidak Aktif', Student::where('status_pkl', 'Tidak Aktif')->count())
                ->description('Siswa yang belum/selesai PKL')
                ->icon('heroicon-o-x-circle')
                ->color('danger'),
        ];
    }
}
