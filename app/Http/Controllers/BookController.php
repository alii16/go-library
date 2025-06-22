<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Tampilkan daftar buku (untuk semua user)
    public function index()
    {
        $books = Book::all();

        // Jika user mengakses lewat URL admin
        if (request()->is('admin/books')) {
            return view('admin.books.index', compact('books')); // pustakawan
        }

        return view('buku.index', compact('books')); // peminjam
    }


    // Tampilkan form tambah buku
    public function create()
    {
        return view('admin.books.create');
    }

    // Simpan buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'tahun' => 'required|integer',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('sampul')) {
            $validated['sampul'] = $request->file('sampul')->store('sampul');
        }

        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan');
    }

    // Tampilkan form edit
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    // Update data buku
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'kategori' => 'required',
            'tahun' => 'required|integer',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('sampul')) {
            $validated['sampul'] = $request->file('sampul')->store('sampul');
        }

        $book->update($validated);
        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate');
    }

    // Hapus buku
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus');
    }
}
