<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function proses(Request $request)
{
    $user = \App\Models\User::where(
        'user_name',
        $request->user_name
    )->first();

    if (
        $user &&
        \Illuminate\Support\Facades\Hash::check(
            $request->password,
            $user->password
        )
    ) {
        Auth::login($user);

        $request->session()->regenerate();

        session([
            'waktu_login' => now()->format('d-m-Y H:i:s')
        ]);

        return redirect()->route('dashboard');
    }

    return back()->with(
        'gagal',
        'Username atau password salah.'
    );
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}