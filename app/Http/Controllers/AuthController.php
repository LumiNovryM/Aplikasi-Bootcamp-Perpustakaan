<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->login_as === "Login As"){
            return redirect()->route('login');
        }

        if($request->login_as === "admin"){
            
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
            ]);
     
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->route('dashboard_admin');
            }

            return redirect()->route('login');

        }elseif($request->login_as === "siswa"){
            return "Siswa";
        }
    }
}
