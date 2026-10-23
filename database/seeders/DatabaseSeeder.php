<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat data Kategori terlebih dahulu
        $catTeknologi = Category::create(['name' => 'Teknologi', 'slug' => 'teknologi']);
        $catPemrograman = Category::create(['name' => 'Pemrograman', 'slug' => 'pemrograman']);
        $catBasisData = Category::create(['name' => 'Basis Data', 'slug' => 'basis-data']);

        // 2. Masukkan data Buku dengan menghubungkan category_id-nya
        Book::insert([
            [
                'title' => 'Pemrograman PHP Dasar', 
                'author' => 'Eko Kurniawan', 
                'category_id' => $catPemrograman->id,
                'year' => 2021, 
                'stock' => 10, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'title' => 'Laravel untuk Pemula', 
                'author' => 'Budi Santoso', 
                'category_id' => $catPemrograman->id,
                'year' => 2022, 
                'stock' => 15, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'title' => 'Basis Data Relasional', 
                'author' => 'Rina Melati', 
                'category_id' => $catBasisData->id,
                'year' => 2020, 
                'stock' => 8, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'title' => 'Jaringan Komputer Dasar', 
                'author' => 'Andi Wijaya', 
                'category_id' => $catTeknologi->id,
                'year' => 2019, 
                'stock' => 12, 
                'created_at' => now(), 
                'updated_at' => now()
            ],
        ]);
    }
}