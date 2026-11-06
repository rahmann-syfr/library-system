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
        $validate = $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer|min:1900',
            'stock'       => 'required|integer|min:0',
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
        $validate = $request->validate([
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:255',
            'year'        => 'required|integer|min:1900',
            'stock'       => 'required|integer|min:0',
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