<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
            'Akuntansi Bisnis Digital',
            'Bisnis Digital',
            'Budidaya Tanaman Perkebunan',
            'Manajemen Pemasaran Internasional',
            'Teknik Informatika',
            'Teknik Otomotif',
            'Teknik Rekayasa Multimedia',
        ];

        foreach ($majors as $majorName) {
            Major::updateOrCreate(
                ['name' => $majorName], // Kondisi untuk mencari data
                ['name' => $majorName]  // Data yang akan di-update atau dibuat
            );
        }
    }
}