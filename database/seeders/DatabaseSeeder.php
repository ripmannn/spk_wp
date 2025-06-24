<?php

namespace Database\Seeders;
use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\Criteria;

use App\Models\Score;
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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seed kriteria
        $criterias = [
            ['code' => 'C1', 'name' => 'Pendidikan Terakhir', 'weight' => 3],
            ['code' => 'C2', 'name' => 'Tes Psikologi', 'weight' => 4],
            ['code' => 'C3', 'name' => 'Wawancara', 'weight' => 4],
            ['code' => 'C4', 'name' => 'Tes Kesehatan', 'weight' => 4],
            ['code' => 'C5', 'name' => 'Pengalaman Kerja', 'weight' => 5],
            ['code' => 'C6', 'name' => 'Kemampuan', 'weight' => 5],
        ];

        foreach ($criterias as $criteria) {
            Criteria::create($criteria);
        }

        // Seed alternatif beserta nilai
        $alternatives = [
            'A1' => [2, 3, 3, 3, 3, 3],
            'A2' => [1, 2, 3, 3, 1, 2],
            'A3' => [1, 3, 2, 2, 3, 3],
            'A4' => [3, 3, 3, 3, 3, 2],
            'A5' => [3, 2, 2, 2, 2, 2],
            'A6' => [2, 2, 2, 3, 2, 3],
            'A7' => [2, 2, 2, 3, 3, 2],
            'A8' => [1, 3, 2, 3, 1, 3],
            'A9' => [2, 3, 3, 2, 3, 2],
            'A10' => [2, 2, 2, 3, 1, 3],
            'A11' => [3, 3, 3, 2, 3, 2],
            'A12' => [2, 2, 2, 2, 1, 3],
            'A13' => [1, 3, 3, 3, 2, 2],
            'A14' => [3, 3, 2, 2, 3, 3],
            'A15' => [1, 3, 3, 3, 2, 2],
        ];

        foreach ($alternatives as $name => $scores) {
            $alternative = Alternative::create(['name' => $name]);

            foreach (Criteria::all() as $index => $criteria) {
                Score::create([
                    'alternative_id' => $alternative->id,
                    'criteria_id' => $criteria->id,
                    'value' => $scores[$index]
                ]);
            }
        }
    }
}
