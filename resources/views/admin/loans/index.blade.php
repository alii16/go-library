@extends('layouts.app')
@section('title', 'Daftar Peminjaman')
@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Buku Dipinjam</h1>
<table class="min-w-full bg-white">
    <thead>
        <tr>
            <th class="py-2">Nama</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Pengembalian</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($loans as $loan)
        <tr>
            <td>{{ $loan->nama }}</td>
            <td>{{ $loan->book->judul }}</td>
            <td>{{ $loan->tanggal_pinjam }}</td>
            <td>{{ $loan->tanggal_kembali ?? '-' }}</td>
            <td>
                @if ($loan->denda > 0)
                    <span class="text-red-600">Terlambat (Rp {{ number_format($loan->denda) }})</span>
                @else
                    <span class="text-green-600">Tepat Waktu</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection