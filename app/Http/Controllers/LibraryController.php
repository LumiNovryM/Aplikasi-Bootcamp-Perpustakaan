<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index_admin () {
        return view('index_admin');
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
}
