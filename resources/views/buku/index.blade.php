@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Buku</h1>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($books as $book)
        <div class="bg-white shadow rounded-lg p-4">
            <img src="{{ $book->sampul }}" alt="{{ $book->judul }}" class="w-full h-48 object-cover mb-2">
            <h3 class="text-lg font-semibold">{{ $book->judul }}</h3>
            <p>Penulis: {{ $book->penulis }}</p>
            <p>Kategori: {{ $book->kategori }}</p>
            <p>Tahun: {{ $book->tahun }}</p>
            @auth
                @if (!$book->dipinjam)
                    <form method="POST" action="{{ route('pinjam', $book->id) }}" class="mt-2">
                        @csrf
                        <input type="text" name="no_hp" placeholder="No HP" required class="border p-1 w-full mb-1">
                        <input type="text" name="alamat" placeholder="Alamat" required class="border p-1 w-full mb-1">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-1 rounded">Pinjam</button>
                    </form>
                @else
                    <p class="text-red-500 mt-2">Sedang dipinjam</p>
                @endif
            @else
                <button onclick="toastLogin()" class="bg-yellow-500 text-white px-4 py-1 rounded mt-2">Pinjam</button>
            @endauth
        </div>
    @endforeach
</div>
<script>
    function toastLogin() {
        alert('Anda harus login terlebih dahulu');
        window.location.href = "{{ route('login') }}";
    }
</script>
@endsection
