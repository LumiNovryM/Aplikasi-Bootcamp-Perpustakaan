<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['judul' => 'Jadi Dewa JavaScript', 'penerbit' => 'Metaverse', 'pengarang' => 'Fauzan Kirana Faiq Wibowo', 'stok_buku' => 20]
        ];

        foreach ($data as $val) {
            Buku::insert([
                'judul' => $val['judul'],
                'penerbit' => $val['penerbit'],
                'pengarang' => $val['pengarang'],
                'stok_buku' => $val['stok_buku']
            ]);
        }
    }
}
