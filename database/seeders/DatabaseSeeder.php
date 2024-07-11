<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Beverage;
use App\Models\Message;
use Illuminate\Database\Seeder;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();
        Category::factory(3)->create();
        Beverage::factory(20)->create();
        Message::factory(20)->create();
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
