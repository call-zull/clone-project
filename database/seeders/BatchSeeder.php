<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Batch::updateOrCreate([
            'name' => 'Batch 1',
            'start_date' => '2024-10-01',
            'end_date' => '2024-11-30',
        ]);
    }
}