<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Lumi', 'kelas' => 'XII PPLG 1', 'email' => 'lumi@gmail.com', 'role_status' => 'siswa', 'password' => Hash::make('Mysql@2023')]
        ];

        foreach ($data as $val){
            Siswa::insert([
                'nama' => $val['nama'],
                'kelas' => $val['kelas'],
                'email' => $val['email'],
                'role_status' => $val['role_status'],
                'password' => $val['password']
            ]);
        }
    }
}
