<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Siswa;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index_admin () {
        $bukus = Buku::all();
        return view('index_admin', compact("bukus"));
    }

    public function index_siswa () {
        return view('index_siswa');
    }

    public function login () {
        return view('login');
    }

    public function register () {
        return view('register');
    }

    public function profil () {
        return view('profil');
    }

    public function delete_buku($id) {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('dashboard_admin')->with('success', 'Buku berhasil dihapus');
    }
}
