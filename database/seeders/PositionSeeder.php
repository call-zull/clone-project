<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $position = [
            'Programmer',
            'UI/UX Designer',
            'Photo Video',
            'Graphic Designer',
        ];

        foreach ($position as $value) {
            Position::updateOrCreate([
                'name' => $value,
            ]);
        }
    }
}