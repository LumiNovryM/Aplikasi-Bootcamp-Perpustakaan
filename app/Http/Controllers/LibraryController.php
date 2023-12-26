<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index_admin()
    {
        return view('index_admin');
    }

    public function index_siswa()
    {
        return view('index_siswa');
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function profil()
    {
        return view('profil');
    }

    public function buku()
    {
        $bukus = Buku::all();
        return view('panel_buku_admin', compact('bukus'));
    }

    public function store_buku(Request $request)
    {
        $datas = $request->validate([
            'judul' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'stok_buku' => 'required|integer',
        ]);

        Buku::create($datas);

        return redirect()->route('buku')->with('success', 'Book added successfully');
    }

    public function delete_buku($id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect()->route('buku')->with('success', 'Book deleted successfully');
    }
}
