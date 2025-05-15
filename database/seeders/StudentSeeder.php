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
        $role = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
    
        $students = [
            [
                'name' => 'Abu Bakar Tsabit Ghufron',
                'gender' => 'L',
                'address' => 'Jl. Mawar No. 10, Jakarta',
                'contact' => '081234567001',
                'email' => '20388@student.stembayo.sch.id',
                'nis' => '20388',
                'status_pkl' => 'Aktif',
            ],
            [
                'name' => 'Ade Rafif Daneswara',
                'gender' => 'L',
                'address' => 'Jl. Melati No. 15, Jakarta',
                'contact' => '081234567002',
                'email' => '20389@student.stembayo.sch.id',
                'nis' => '20389',
                'status_pkl' => 'Aktif',
            ],
            [
                'name' => 'Ade Zaidan Altahf',
                'gender' => 'L',
                'address' => 'Jl. Anggrek No. 20, Jakarta',
                'contact' => '081234567003',
                'email' => '20390@student.stembayo.sch.id',
                'nis' => '20390',
                'status_pkl' => 'Aktif',
            ],
            [
                'name' => 'Adhwa Khalila Ramadani',
                'gender' => 'P',
                'address' => 'Jl. Dahlia No. 25, Jakarta',
                'contact' => '081234567004',
                'email' => '20391@studen.stembayo.sch.id',
                'nis' => '20391',
                'status_pkl' => 'aktif',
            ],
            [
                'name' => 'Adnan Faris',
                'gender' => 'L',
                'address' => 'Jl. Tulip No. 30, Jakarta',
                'contact' => '081234567005',
                'email' => '20392@student.stembayo.sch.id',
                'nis' => '20392',
                'status_pkl' => 'Aktif',
            ],
            [
                'name' => 'Ahmad Hanaffi Rahmadhani',
                'gender' => 'L',
                'address' => 'Jl. Kamboja No. 35, Jakarta',
                'contact' => '081234567006',
                'email' => '20393@student.stembayo.sch.id',
                'nis' => '20393',
                'status_pkl' => 'Aktif',
            ],
            [
                'name' => 'Farcah Amalia Nugrahaini',
                'gender' => 'P',
                'address' => 'Jl. Flamboyan No. 5, Jakarta',
                'contact' => '081234567006',
                'email' => '20408@student.stembayo.sch.id',
                'nis' => '20408',
                'status_pkl' => 'Aktif',
            ],
            [
                'name' => 'Akbar Ad\'ha Kusumawardhana',
                'gender' => 'L',
                'address' => 'Jl. Cempaka No. 40, Jakarta',
                'contact' => '081234567007',
                'email' => '20394@student.stembayo.sch.id',
                'nis' => '20394',
                'status_pkl' => 'Tidak Aktif',
            ],
            [
                'name' => 'Andhika August Farnaz',
                'gender' => 'P',
                'address' => 'Jl. Kenanga No. 45, Jakarta',
                'contact' => '081234567008',
                'email' => '20395@student@stembayo.sch.id',
                'nis' => '20395',
                'status_pkl' => 'Tidak Aktif',
            ],
            [
                'name' => 'Angelina Thitis Sekar Langit',
                'gender' => 'P',
                'address' => 'Jl. Teratai No. 50, Jakarta',
                'contact' => '081234567009',
                'email' => '20396@student.stembayo.sch.id',
                'nis' => '20396',
                'status_pkl' => 'Tidak Aktif',
            ],
            [
                'name' => 'Arifin Nur Ihsan',
                'gender' => 'L',
                'address' => 'Jl. Bougenville No. 55, Jakarta',
                'contact' => '081234567010',
                'email' => '20397@student.stembayo.sch.id',
                'nis' => '20397',
                'status_pkl' => 'Tidak Aktif',
            ],
            
        ];

        foreach ($students as $studentData) {
            $student = Student::create($studentData);
            $student->assignRole($role);
        }
    }
}
