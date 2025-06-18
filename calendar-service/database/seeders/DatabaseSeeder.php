<?php

namespace Database\Seeders;

use App\Models\Event;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Event::factory(10)->create();

        Event::factory()->create([
            'name' => 'Test Event',
            'email' => 'test@example.com',
        ]);
    }
}
