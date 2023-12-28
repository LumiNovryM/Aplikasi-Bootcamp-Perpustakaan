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

    public function create_buku(Request $request) {
        $datas = $request->validate([
            'judul' => 'required|string',
            'penerbit' => 'required|string',
            'pengarang' => 'required|string',
            'stok_buku' => 'required|integer',
        ]);

        Buku::create($datas);
        return redirect()->route('dashboard_admin')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit_buku(Request $request, $id) {
        $datas = $request->validate([
            'judul' => 'required|string',
            'penerbit' => 'required|string',
            'pengarang' => 'required|string',
            'stok_buku' => 'required|integer',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($datas);
        return redirect()->route('dashboard_admin')->with('success', 'Buku berhasil diedit');
    }
}
