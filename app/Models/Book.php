<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Mengizinkan form untuk menyimpan data ke kolom-kolom ini
    protected $fillable = [
        'title', 
        'author', 
        'category_id', 
        'year', 
        'stock'
    ];

    // Menghubungkan tabel books dengan tabel categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}