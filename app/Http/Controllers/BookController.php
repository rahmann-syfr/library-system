<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // READ: Menampilkan semua data buku ke dalam View (Tabel HTML)
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // CREATE: Menampilkan form tambah buku
    public function create()
    {
        return view('books.create');
    }

    // STORE: Menyimpan data baru yang dikirim dari form ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index');
    }

    // EDIT: Menampilkan form edit berdasarkan data buku yang dipilih
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // UPDATE: Menyimpan perubahan data ke database
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('books.index');
    }

    // DELETE: Menghapus data buku dari database
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}