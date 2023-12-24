<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'Kenshi', 'role_status' => 'admin', 'email' => 'kenshi@gmail.com', 'password' => Hash::make('Mysql@2023')]
        ];

        foreach ($data as $val) {
            User::insert([
                'nama' => $val['nama'],
                'role_status' => $val['role_status'],
                'email' => $val['email'],
                'password' => $val['password']
            ]);
        }
    }
}
