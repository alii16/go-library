@extends('layouts.app')
@section('title', 'Edit Buku')
@section('content')
<h1 class="text-xl font-bold mb-4">Edit Buku</h1>
<form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')
    <input name="judul" value="{{ $book->judul }}" class="w-full border p-2" required>
    <input name="penulis" value="{{ $book->penulis }}" class="w-full border p-2" required>
    <input name="kategori" value="{{ $book->kategori }}" class="w-full border p-2" required>
    <input name="tahun" type="number" value="{{ $book->tahun }}" class="w-full border p-2" required>
    <input name="sampul" type="file" class="w-full">
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection