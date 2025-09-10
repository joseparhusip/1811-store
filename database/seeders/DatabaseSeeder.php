<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // [PENAMBAHAN] Panggil UserSeeder yang sudah kita buat
        $this->call([
            UserSeeder::class,
            // Anda bisa menambahkan seeder lain di sini jika ada
        ]);
    }
}
