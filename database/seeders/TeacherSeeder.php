<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $gurus = [
            [
                'name' => 'Drs. Ahmad Subagyo',
                'nip' => '197203172005011012',
                'gender' => 'L',
                'address' => 'Klaten',
                'contact' => '085643188811',
            ],
            [
                'name' => 'Siti Mariyam S.Pd',
                'nip' => '198105152010012001',
                'gender' => 'P',
                'address' => 'Surakarta',
                'contact' => '081234567890',
            ],
            [
                'name' => 'Bambang Suroso S.Kom',
                'nip' => '197912102008011003',
                'gender' => 'L',
                'address' => 'Yogyakarta',
                'contact' => '085612345678',
            ],
            [
                'name' => 'Dr. Endah Kusumawati',
                'nip' => '198302201009022002',
                'gender' => 'P',
                'address' => 'Semarang',
                'contact' => '082345678901',
            ],
            [
                'name' => 'Fajar Nugroho S.T',
                'nip' => '198507142012011004',
                'gender' => 'L',
                'address' => 'Magelang',
                'contact' => '087654321098',
            ],
            [
                'name' => 'Rina Safitri M.Pd',
                'nip' => '199001082015022003',
                'gender' => 'P',
                'address' => 'Boyolali',
                'contact' => '089876543210',
            ]
        ];
        foreach ($gurus as $guru) {
            $partname = explode(' ',$guru['name']);
            $parting = implode(' ', array_slice($partname, 0, 2));
            $email = Str::slug($parting, '.') . rand(1, 99) . '@gmail.com';
            
            Teacher::create([
                'name' => $guru['name'],
                'nip' => $guru['nip'],
                'gender' => $guru['gender'],
                'address' => $guru['address'],
                'contact' => $guru['contact'],
                'email' => $email,
            ]);
        }
    }
}

