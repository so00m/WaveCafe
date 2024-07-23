<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Beverage;
use App\Models\Message;
use App\Models\Notification;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     */ 
    
     

    public function run(): void
    {
       $this->call(AdminSeeder::class);
        Category::factory(3)->create();
        Beverage::factory(20)->create();
        Message::factory(20)->create();
        Notification::factory(Message::count())->create();
        user::factory(10)->create();
  
    }
}
