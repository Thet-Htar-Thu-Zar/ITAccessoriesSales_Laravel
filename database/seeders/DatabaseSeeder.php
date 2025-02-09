<?php

namespace Database\Seeders;

// use App\Http\Middleware\Admin;
use App\Models\User;
use App\Models\Admin;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Admin::factory()->create([
            'name' => 'Christopher ',
            'email' => 'thethtar@gmail.com',
            'password' => Hash::make('th123')

        ]);
    }
}
