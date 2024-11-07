<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menambahkan akun pengguna untuk setiap role
        $users = [
            [
                'name' => 'Junaidi',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => bcrypt('password')
            ],
            // mentor
            [
                'name' => 'Oka Rajeb Abdilah',
                'email' => 'mentor@programmer.com',
                'role' => 'mentor',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Oka',
                'email' => 'mentor@uiux.com',
                'role' => 'mentor',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Oka Rajeb',
                'email' => 'mentor@pv.com',
                'role' => 'mentor',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Oka Abdilah',
                'email' => 'mentor@graphic.com',
                'role' => 'mentor',
                'password' => bcrypt('password')
            ],
            // dosen
            [
                'name' => 'Bambang s.pd',
                'email' => 'dosen@programmer.com',
                'role' => 'dosen',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Bagus s.pd',
                'email' => 'dosen@uiux.com',
                'role' => 'dosen',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Budi s.pd',
                'email' => 'dosen@pv.com',
                'role' => 'dosen',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Bayu s.pd',
                'email' => 'dosen@graphic.com',
                'role' => 'dosen',
                'password' => bcrypt('password')
            ],
        ];

        // Insert or update user records
        foreach ($users as $item) {
            User::updateOrCreate(
                ['email' => $item['email']],
                $item
            );
        }

        // Call other seeders if necessary
        $this->call([
            PositionSeeder::class,
            BatchSeeder::class,
            ProjectSeeder::class,
            MajorSeeder::class,
        ]);

        // Ambil posisi yang ada di tabel positions
        $programmerPosition = Position::where('name', 'Programmer')->first();
        $uiuxPosition = Position::where('name', 'UI/UX Designer')->first();
        $photoVideoPosition = Position::where('name', 'Photo Video')->first();
        $graphicDesignerPosition = Position::where('name', 'Graphic Designer')->first();

        // Assign posisi hanya untuk Mentor dan Dosen

        // Mentor
        if ($programmerPosition) {
            $mentorProgrammer = User::where('email', 'mentor@programmer.com')->first();
            if ($mentorProgrammer) {
                $mentorProgrammer->position_id = $programmerPosition->id;
                $mentorProgrammer->save();
            }
        }

        if ($uiuxPosition) {
            $mentorUIUX = User::where('email', 'mentor@uiux.com')->first();
            if ($mentorUIUX) {
                $mentorUIUX->position_id = $uiuxPosition->id;
                $mentorUIUX->save();
            }
        }

        if ($photoVideoPosition) {
            $mentorPV = User::where('email', 'mentor@pv.com')->first();
            if ($mentorPV) {
                $mentorPV->position_id = $photoVideoPosition->id;
                $mentorPV->save();
            }
        }

        if ($graphicDesignerPosition) {
            $mentorGraphic = User::where('email', 'mentor@graphic.com')->first();
            if ($mentorGraphic) {
                $mentorGraphic->position_id = $graphicDesignerPosition->id;
                $mentorGraphic->save();
            }
        }

        // Dosen
        if ($programmerPosition) {
            $dosenProgrammer = User::where('email', 'dosen@programmer.com')->first();
            if ($dosenProgrammer) {
                $dosenProgrammer->position_id = $programmerPosition->id;
                $dosenProgrammer->save();
            }
        }

        if ($uiuxPosition) {
            $dosenUIUX = User::where('email', 'dosen@uiux.com')->first();
            if ($dosenUIUX) {
                $dosenUIUX->position_id = $uiuxPosition->id;
                $dosenUIUX->save();
            }
        }

        if ($photoVideoPosition) {
            $dosenPV = User::where('email', 'dosen@pv.com')->first();
            if ($dosenPV) {
                $dosenPV->position_id = $photoVideoPosition->id;
                $dosenPV->save();
            }
        }

        if ($graphicDesignerPosition) {
            $dosenGraphic = User::where('email', 'dosen@graphic.com')->first();
            if ($dosenGraphic) {
                $dosenGraphic->position_id = $graphicDesignerPosition->id;
                $dosenGraphic->save();
            }
        }
    }
}