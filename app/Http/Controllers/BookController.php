<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get(); 
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all(); 
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Penambahan rule validasi baru sesuai syarat Tugas Pertemuan 10
        $validate = $request->validate([
            'title'       => 'required|string|min:3|max:255',
            'author'      => 'required|string|min:3|max:255',
            'year'        => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'stock'       => 'required|integer|min:0|max:1000',
            'category_id' => 'required|exists:categories,id', 
        ]);

        Book::create($validate);

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        // Penambahan rule validasi baru sesuai syarat Tugas Pertemuan 10
        $validate = $request->validate([
            'title'       => 'required|string|min:3|max:255',
            'author'      => 'required|string|min:3|max:255',
            'year'        => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'stock'       => 'required|integer|min:0|max:1000',
            'category_id' => 'required|exists:categories,id',
        ]);

        $book->update($validate);

        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')
                         ->with('success', 'Buku berhasil dihapus!');
    }
}