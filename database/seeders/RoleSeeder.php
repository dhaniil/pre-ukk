<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = 'Admin';
        $email = 'admin@ilazer.me';
        $password = '12345678';
        
        $user = User::create([
            'name' => $name,
            'email_verified_at' => Carbon::now(),
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $superAdminRole = Role::create(['name' => 'super_admin', 'guard_name' => 'web']);
        $teacherRole = Role::create(['name' => 'teacher', 'guard_name' => 'web']);
        $studentRole = Role::create(['name' => 'student', 'guard_name' => 'web']);

        Artisan::call('shield:generate', ['--all' => true, '--panel' => 'admin']);

        $superAdminRole->givePermissionTo(\Spatie\Permission\Models\Permission::all());
        $user->assignRole($superAdminRole);

        $teacherPermissions = [
            'view_any_industries',
            'view_industries',
            'view_any_internship', 
            'view_internship',
            'view_any_student',
            'view_student',
        ];
        $teacherRole->givePermissionTo($teacherPermissions);

        $studentPermissions = [
            'view_any_industries', 
            'view_industries', 
            'view_internship',    
            'update_internship',   
            'page_StudentDashboard',
        ];
        $studentRole->givePermissionTo($studentPermissions);
    }
}
