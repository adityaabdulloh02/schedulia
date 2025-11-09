<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Urutan ini penting karena ada ketergantungan data
        $this->call([
            UserSeeder::class,
            ProdiSeeder::class,
            HariJamRuangSeeder::class,
            DosenSeeder::class,
            MahasiswaSeeder::class,
            MataKuliahSeeder::class,
            KelasSeeder::class,
            PengampuSeeder::class,
        ]);
    }
}
