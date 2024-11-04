<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Junaidi',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Oka Rajeb Abdilah',
                'email' => 'mentor@mentor.com',
                'role' => 'mentor',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Bambang s.pd',
                'email' => 'dosen@dosen.com',
                'role' => 'dosen',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Rizki',
                'email' => 'mahasiswa@mahasiswa.com',
                'role' => 'mahasiswa',
                'password' => bcrypt('password')
            ],
            // [
            //     'name' => 'asep',
            //     'email' => 'mahasiswas@mahasiswa.com',
            //     'role' => 'mahasiswa',
            //     'password' => bcrypt('password')
            // ]
        ];

        foreach ($users as $item) {
            User::updateOrCreate(
                ['email' => $item['email']],
                $item
            );
        }

        $this->call([
            PositionSeeder::class,
            BatchSeeder::class,
            ProjectSeeder::class,
            MajorSeeder::class,
        ]);
    }
}
