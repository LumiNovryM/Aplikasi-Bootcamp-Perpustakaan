<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'siswas';

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'siswa_id');
    }

}
