<?php

namespace App\Filament\Pages\Widgets;

use App\Models\Student;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class StudentInfoList extends Widget
{
    protected static string $view = 'filament.pages.widgets.student-info-list';
    
    public function getStudent(): ?Student
    {
        return Student::where('email', Auth::user()?->email)->first();
    }
}
