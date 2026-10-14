<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder buku dan user yang sudah dibuat
        $this->call([
            BookSeeder::class,
            UserSeeder::class,
        ]);
    }
}