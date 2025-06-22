@extends('layouts.app')
@section('title', 'Tambah Buku')
@section('content')
<h1 class="text-xl font-bold mb-4">Tambah Buku</h1>
<form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <input name="judul" placeholder="Judul" class="w-full border p-2" required>
    <input name="penulis" placeholder="Penulis" class="w-full border p-2" required>
    <input name="kategori" placeholder="Kategori" class="w-full border p-2" required>
    <input name="tahun" type="number" placeholder="Tahun" class="w-full border p-2" required>
    <input name="sampul" type="file" class="w-full">
    <button class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection