<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            [
                'email' => 'admin@admin.com',
                'user_name' => 'admin'
            ],
            [
                'name' => 'admin',
                'email_verified_at' => now(),
                'active' => 1,
                'password' => Hash::make('12345678'),
                'remember_token' => Str::random(10),
            ]
        );
    }
}