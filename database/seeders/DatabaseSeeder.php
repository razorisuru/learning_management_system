<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Subjects;
use Illuminate\Support\Str;
use App\Models\DegreeProgramme;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            User::class,
            Subjects::class,
            DegreeProgramme::class,
        ]);
    }
}
