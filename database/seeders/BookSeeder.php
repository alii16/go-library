<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'kategori' => 'Fiksi',
                'tahun' => 2005,
                'sampul' => 'https://upload.wikimedia.org/wikipedia/id/2/2e/Laskar_Pelangi_sampul.jpg'
            ],
            [
                'judul' => 'Bumi',
                'penulis' => 'Tere Liye',
                'kategori' => 'Fantasi',
                'tahun' => 2014,
                'sampul' => 'https://upload.wikimedia.org/wikipedia/id/c/c3/Novel_Bumi.jpg'
            ],
            [
                'judul' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'kategori' => 'Inspirasi',
                'tahun' => 2009,
                'sampul' => 'https://upload.wikimedia.org/wikipedia/id/4/45/Negeri_5_Menara.jpg'
            ],
            [
                'judul' => 'Dilan 1990',
                'penulis' => 'Pidi Baiq',
                'kategori' => 'Romansa',
                'tahun' => 2014,
                'sampul' => 'https://upload.wikimedia.org/wikipedia/id/f/fb/Dilan_1990_sampul.jpg'
            ],
            [
                'judul' => 'Perahu Kertas',
                'penulis' => 'Dee Lestari',
                'kategori' => 'Drama',
                'tahun' => 2009,
                'sampul' => 'https://upload.wikimedia.org/wikipedia/id/9/93/Perahu_Kertas_sampul.jpg'
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
