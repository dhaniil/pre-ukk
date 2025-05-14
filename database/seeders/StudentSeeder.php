<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = Student::create([
            'name' => 'Siswa Admin',
            'gender' => 'L',
            'address' => 'Bubla',
            'contact' => 'bublla',
            'email' => 'bubla@student.me',
            'nis' => '20393',
            'status_pkl' => 'Aktif',
        ]);

        $role = Role::create(['name' => 'Siswa', 'guard_name' => 'web']);
        $siswa->assignRole($role);

    }
}
