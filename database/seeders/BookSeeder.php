<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::insert([
            ['title' => 'Pemrograman PHP Dasar', 'author' => 'Eko Kurniawan', 'year' => 2021, 'stock' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Laravel untuk Pemula', 'author' => 'Budi Santoso', 'year' => 2022, 'stock' => 15, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Basis Data Relasional', 'author' => 'Rina Melati', 'year' => 2020, 'stock' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Algoritma & Pemrograman', 'author' => 'Andi Wijaya', 'year' => 2019, 'stock' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pemrograman Berorientasi Objek', 'author' => 'Siti Aminah', 'year' => 2023, 'stock' => 20, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}