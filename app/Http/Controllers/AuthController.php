<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = Siswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'email' => $request->email,
            'role_status' => 'siswa',
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        if ($request->login_as === 'Admin') {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('dashboard');
            }
        } else if ($request->login_as === 'Siswa') {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::guard('siswa')->attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('dashboard');
            }
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
        } elseif (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
