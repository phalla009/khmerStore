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
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => '123', // will be auto-hashed
                'is_admin' => 1,
                'status' => 1,
                'is_delete' => 0,
                'verification_code' => null,
            ]);
        }
    }
}
