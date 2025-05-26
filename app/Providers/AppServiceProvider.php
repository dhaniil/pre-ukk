<?php

namespace App\Providers;

use App\Models\Student;
use App\Observers\StudentObserver;
use App\Observers\TeacherObserver;
use Illuminate\Support\ServiceProvider;
use App\Models\Teacher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
        if ($this->app->environment('local') && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**TextInput::make('password')
     * ->maxLength(255)
     * ->dehydrated(fn($state) => filled($state)),
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Student::observe(StudentObserver::class);
        Teacher::observe(TeacherObserver::class);

    }
}
