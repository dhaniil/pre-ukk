<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentInfoWidget extends Widget
{
    protected static string $view = 'filament.widgets.student-info-widget';
    protected int | string | array $columnSpan = 'full';

    protected function getViewData(): array
    {
        $student = Student::where('email', Auth::user()?->email)->first();
        $internship = $student?->internships()?->latest()->first();

        return [
            'student' => $student,
            'internship' => $internship,
        ];
    }
}
