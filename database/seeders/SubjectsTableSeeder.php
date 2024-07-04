<?php

namespace Database\Seeders;

use App\Models\Subjects;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subjects::factory()->create([
            'degree_programme_id' => 1,
            'name' => 'OS',
            'description' => 'osss',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Subjects::create([
            'degree_programme_id' => 2,
            'name' => 'English',
            'description' => 'Eng',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
