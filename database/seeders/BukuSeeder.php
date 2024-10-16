<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 1000; $i++) {
            Buku::create([
                'judul' => fake()->sentence(3),
                'penulis'=> fake()->name(),
                'harga'=> fake()->numberBetween(130000,500000),
                'tgl_terbit'=> fake()->date(),
            ]);
        }
    }
}
