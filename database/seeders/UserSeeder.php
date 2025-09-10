<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mencari pengguna dengan email sarah@gmail.com
        $user = User::where('email', 'sarah@gmail.com')->first();

        // Jika pengguna belum ada, maka buat pengguna baru
        if (!$user) {
            User::create([
                'name' => 'Sarah',
                'username' => 'sarah',
                'email' => 'sarah@gmail.com',
                'phone' => '081234567890', // Nomor telepon contoh
                'email_verified_at' => now(),
                'password' => Hash::make('sarah12345'), // Password di-hash
            ]);
        }
        // Jika pengguna sudah ada, tidak melakukan apa-apa untuk menghindari duplikat
    }
}
