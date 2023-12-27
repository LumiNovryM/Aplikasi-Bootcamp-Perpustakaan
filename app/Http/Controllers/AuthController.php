<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        if($request->login_as == "Login As"){
            return redirect()->route('login')->withErrors('Login As harus di isi!');
        }

        if ($request->login_as === 'Admin') {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ], [
                'password.min' => "Password harus memiliki panjang minimal 8 karakter!",
                'password.required' => "Password harus dimasukkan untuk login!",
                'email.required' => "Email harus dimasukkan untuk login!"
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('dashboard_admin');
            }else{
                return redirect()->route('login');
            }

        } else if ($request->login_as === 'Siswa') {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ]);

            if (Auth::guard('siswa')->attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('dashboard_siswa');
            }else{
                return redirect()->route('login');
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
