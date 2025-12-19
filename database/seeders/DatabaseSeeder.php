<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()->create([
            'name' => 'Admin LMS',
            'email' => 'admin@lms.com',
            'password' => bcrypt('password'),
        ]);

        // Run seeders
        $this->call([
            CategorySeeder::class,
            MaterialSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
