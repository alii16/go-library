<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function loan()
    {
        return $this->hasOne(Loan::class)->whereNull('tanggal_kembali');
    }
    protected $fillable = [
        'judul',
        'penulis',
        'kategori',
        'tahun',
        'sampul',
        'dipinjam', // ⬅ penting untuk update status buku
    ];


}
