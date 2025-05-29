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
        $industris = [
            [
                'name' => 'PT Aksa Digital Group',
                'bidang_usaha' => 'IT & Digital',
                'address' => 'Jl. Wongso Permono No.26, Klidon, Sukoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581',
                'contact' => '08982909000',
                'email' => 'aksa@gmail.com',
            ],
            [
                'name' => 'PT. Gamatechno Indonesia',
                'bidang_usaha' => 'IT Solutions & Startup Holding',
                'address' => 'Jl. Purwomartani, Karangmojo, Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta',
                'contact' => '0274-5044044',
                'email' => 'info@gamatechno.com',
            ],
            [
                'name' => 'CV. Karya Hidup Sentosa',
                'bidang_usaha' => 'Agriculture Equipment',
                'address' => 'Jl. Magelang KM.8.8, Jongke Tengah, Sendangadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55285',
                'contact' => '0274-512095',
                'email' => 'quick@gmail.com',
            ],

            [
                'name' => 'PT. Mega Andalan Kalasan',
                'bidang_usaha' => 'Manufacturing',
                'address' => 'Jl. Raya Kalasan, Sleman, DIY',
                'contact' => '0274-123456',
                'email' => 'info@makalasan.com',
            ],
            [
                'name' => 'Kotagede Silver Crafts',
                'bidang_usaha' => 'Silver Craft',
                'address' => 'Jl. Kemasan, Kotagede, Yogyakarta',
                'contact' => '0274-654321',
                'email' => 'kotagede.silver@gmail.com',
            ],
            [
                'name' => 'GMEDIA',
                'bidang_usaha' => 'IT & Digital',
                'address' => 'Jl. Merapi No. 10, Yogyakarta',
                'contact' => '0274-987654',
                'email' => 'contact@gmedia.com',
            ],
            [
                'name' => 'PT. Woonel Midas Leathers',
                'bidang_usaha' => 'Leather Industry',
                'address' => 'Jl. Wonosari, Bantul, DIY',
                'contact' => '0274-998877',
                'email' => 'info@woonel.com',
            ],
            [
                'name' => 'CV. Mitra Teknitama',
                'bidang_usaha' => 'General Trading & Manufacturing',
                'address' => 'Jl. Magelang, Sleman, DIY',
                'contact' => '0274-776655',
                'email' => 'mitra@teknitama.com',
            ],
            [
                'name' => 'Gerabah Kasongan',
                'bidang_usaha' => 'Ceramics Craft',
                'address' => 'Kasongan, Bantul, DIY',
                'contact' => '0274-554433',
                'email' => 'contact@kasongan.com',
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
