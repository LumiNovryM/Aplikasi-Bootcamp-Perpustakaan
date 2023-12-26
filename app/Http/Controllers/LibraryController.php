<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index_admin () {
        return view('index_admin');
    }

    public function index_siswa() {
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

    public function buku () {
        $bukus = Buku::all();
        return view('panel_buku_admin', compact('bukus'));
    }

    public function delete_buku ($id) {
        $buku = Buku::findOrFail($id);

        $buku->delete();
    
        return redirect()->route('buku')->with('success', 'Book deleted successfully');
    }
}
