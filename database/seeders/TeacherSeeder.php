<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder

    /**
     * Run the database seeds.
     */
{
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $gurus = [
            [
                'name' => 'SUGIARTO, S.T.',
                'nip' => '197203172005011012',
                'gender' => 'L',
                'address' => 'Klaten',
                'contact' => '085643188811',
            ],
            [
                'name' => 'YUNIANTO HERMAWAN, S.Kom.',
                'nip' => '197306202006041005',
                'gender' => 'L',
                'address' => 'Klaten',
                'contact' => '081548734649',
            ],
            [
                'name' => 'MARGARETHA ENDAH TITISARI, S.T.',
                'nip' => '197403022006042008',
                'gender' => 'P',
                'address' => 'Pokoh, Maguwo',
                'contact' => '085608990027',
            ],
            [
                'name' => 'EKA NUR AHMAD ROMADHONI, S.Pd.',
                'nip' => '199303012019031011',
                'gender' => 'L',
                'address' => 'Klaten',
                'contact' => '085895780078',
            ],
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

