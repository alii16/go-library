@extends('layouts.app')
@section('title', 'Admin - Buku')
@section('content')
<h1 class="text-2xl font-bold mb-4">Kelola Buku</h1>
<a href="{{ route('books.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Buku</a>
<table class="min-w-full bg-white">
    <thead>
        <tr>
            <th class="py-2">Judul</th>
            <th>Penulis</th>
            <th>Kategori</th>
            <th>Tahun</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td class="py-2">{{ $book->judul }}</td>
            <td>{{ $book->penulis }}</td>
            <td>{{ $book->kategori }}</td>
            <td>{{ $book->tahun }}</td>
            <td>
                <a href="{{ route('books.edit', $book->id) }}" class="text-blue-600">Edit</a> |
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection