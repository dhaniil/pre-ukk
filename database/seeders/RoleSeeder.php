<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin Data
        $name = 'Admin';
        $email = 'admin@ilazer.me';
        $password = '12345678';

        // Create Role
        $user = User::create([
            'name' => $name,
            'email_verified_at' => Carbon::now(),
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $superAdminRole = Role::create(['name' => 'super_admin', 'guard_name' => 'web']);
        Role::create(['name' => 'teacher', 'guard_name' => 'web']);
        Role::create(['name' => 'student', 'guard_name' => 'web']);
        Role::create(['name' => 'student', 'guard_name' => 'web']);

        $superAdminRole->givePermissionTo(\Spatie\Permission\Models\Permission::all());
        $user->assignRole($superAdminRole);
    }
}
