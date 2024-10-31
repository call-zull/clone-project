<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'mentor@mentor',
            'role' => 'mentor',
        ]);

        User::factory()->create([
            'name' => 'dosen',
            'email' => 'dosen@dosen.com',
            'role' => 'dosen',
        ]);

        User::factory()->create([
            'name' => 'mahasiswa',
            'email' => 'mahasiswa@mahasiswa.com',
            'role' => 'mahasiswa',
            'position_id' => 1
        ]);

        $this->call([
            PositionSeeder::class
        ]);
    }
}
