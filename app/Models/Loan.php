<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Loan extends Model
{
    public function getDendaAttribute()
    {
        $batas = Carbon::parse($this->tanggal_pinjam)->addDays(4);
        $sekarang = Carbon::now();

        if ($this->tanggal_kembali) {
            $sekarang = Carbon::parse($this->tanggal_kembali);
        }

        $terlambatJam = $sekarang->greaterThan($batas) ? $sekarang->diffInHours($batas) : 0;
        return $terlambatJam * 500;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }    protected $fillable = [
        'user_id',
        'book_id',
        'nama',
        'no_hp',
        'alamat',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];



}
