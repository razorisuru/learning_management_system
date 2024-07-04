<?php

namespace Database\Seeders;

use App\Models\DegreeProgramme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DegreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DegreeProgramme::factory()->create([
            'name' => 'BSC',
            'description' => 'bsc',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DegreeProgramme::create([
            'name' => 'B-tech',
            'description' => 'btech',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
