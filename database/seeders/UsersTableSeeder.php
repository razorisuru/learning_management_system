<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Isuru Bandara',
            'email' => 'isurubandara318@gmail.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('Isuru@123'), // Use a strong password for production
            'remember_token' => null,
            'current_team_id' => null,
            'profile_photo_path' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
