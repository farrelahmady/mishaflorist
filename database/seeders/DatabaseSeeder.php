<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin Misha Florist',
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);

        // \App\Models\Product::factory(10)->create();

        $this->call([
            ProductSeeder::class,
        ]);
    }
}
