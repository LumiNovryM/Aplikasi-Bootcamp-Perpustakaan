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
            ['judul' => 'Jadi Dewa JavaScript', 'penerbit' => 'Metaverse', 'pengarang' => 'Fauzan Kirana Faiq Wibowo']
        ];

        foreach ($data as $val) {
            Buku::insert([
                'judul' => $val['judul'],
                'penerbit' => $val['penerbit'],
                'pengarang' => $val['pengarang']
            ]);
        }
    }
}
