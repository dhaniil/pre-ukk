<?php

namespace Database\Seeders;

use App\Models\Industries;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class IndustriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $industris =[
            [
                'name' => 'PT Aksa Digital Group', 
                'bidang_usaha' => 'IT Service and IT Consulting (Information Technology Company)',
                'address' => 'Jl. Wongso Permono No.26, Klidon, Sukoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581',
                'contact' => '08982909000',
                'email' => 'aksa@gmail.com',
            ],
            [
                'name' => 'PT. Gamatechno Indonesia', 
                'bidang_usaha' => 'Penyedia layanan, solusi, dan produk inovasi teknologi informasi serta holding company yang melahirkan startup di bidang teknologi informasi.',
                'address' => 'Jl. Purwomartani, Karangmojo, Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta',
                'contact' => '0274-5044044',
                'email' => 'info@gamatechno.com',
            ],
            [
                'name' => 'CV. Karya Hidup Sentosa ', 
                'bidang_usaha' => 'Alat pertanian',
                'address' => 'JJl. Magelang KM.8,8, Jongke Tengah, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55285',
                'contact' => '0274-512095',
                'email' => 'quick@gmail.com',
            ],
        ];

        foreach ($industris as $industri) {
            Industries::create([
                'name' => $industri['name'], 
                'bidang_usaha' => $industri['bidang_usaha'],
                'address' => $industri['address'],
                'contact' => $industri['contact'],
                'email' => $industri['email'],
                'guru_pembimbing' => Teacher::inRandomOrder()->first()?->id
            ]);
        }
    }
}

