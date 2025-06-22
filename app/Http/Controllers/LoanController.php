<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoanController extends Controller
{
    // Daftar peminjaman di admin panel
    public function index()
    {
        $loans = Loan::with('user', 'book')->get(); 
        return view('admin.loans.index', compact('loans'));
    }

    // Simpan peminjaman buku
    public function store(Request $request, Book $book)
    {
        // Validasi max 3 buku
        $activeLoans = Loan::where('user_id', Auth::id())->whereNull('tanggal_kembali')->count();
        if ($activeLoans >= 3) {
            return back()->with('error', 'Anda sudah meminjam maksimal 3 buku');
        }

        // Cek apakah buku sudah dipinjam
        if ($book->dipinjam) {
            return back()->with('error', 'Buku sedang dipinjam orang lain');
        }

        // Validasi data peminjam
        $request->validate([
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);

        Loan::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'nama' => Auth::user()->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tanggal_pinjam' => now(),
        ]);

        $book->update(['dipinjam' => true]);

        return back()->with('success', 'Buku berhasil dipinjam')->with('notif_duration', 2000);
    }

    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete(); 

        return redirect()->route('loans.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }

}