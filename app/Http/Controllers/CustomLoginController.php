<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomLoginController extends Controller
{
    public function customLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            if (Auth::user()->role == 0) {
                return redirect()->route('dashboard-dinas');
            } else {
                return redirect()->route('dashboard-sekolah');
            }
        } else {
            dd('Gagal');
        }
    }
}
