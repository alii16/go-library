@extends('layouts.app')
@section('title', 'Daftar Peminjaman')
@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Buku Dipinjam</h1>

<table class="min-w-full bg-white border border-gray-200">
    <thead>
        <tr class="bg-gray-100 text-left">
            <th class="py-2 px-4">Nama</th>
            <th class="py-2 px-4">Buku</th>
            <th class="py-2 px-4">Tanggal Pinjam</th>
            <th class="py-2 px-4">Pengembalian</th>
            <th class="py-2 px-4">Status</th>
            <th class="py-2 px-4">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($loans as $loan)
        <tr class="border-t border-gray-200">
            <td class="py-2 px-4">{{ $loan->nama }}</td>
            <td class="py-2 px-4">{{ $loan->book->judul }}</td>
            <td class="py-2 px-4">{{ $loan->tanggal_pinjam }}</td>
            <td class="py-2 px-4">{{ $loan->tanggal_kembali ?? '-' }}</td>
            <td class="py-2 px-4">
                @if ($loan->denda > 0)
                    <span class="text-red-600">Terlambat (Rp {{ number_format($loan->denda) }})</span>
                @else
                    <span class="text-green-600">Tepat Waktu</span>
                @endif
            </td>
            <td class="py-2 px-4">
                <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection