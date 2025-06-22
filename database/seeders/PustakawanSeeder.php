<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PustakawanSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Pustakawan',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('admin123'), // Password default
            'role' => 'pustakawan'
        ]);
    }
}
