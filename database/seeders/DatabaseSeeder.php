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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'test@example.com',
            'phone' => '237675066919',
            'parrain_id' => 1,
            'user_type' => 0,
            'password' => bcrypt("123456789"),
        ]);
    }
}
