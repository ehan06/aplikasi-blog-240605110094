<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'nama_lengkap' =>
                Auth::user()->nama_depan . ' ' .
                Auth::user()->nama_belakang,

            'foto' => Auth::user()->foto,

            'waktu_login' =>
                session('waktu_login')
        ]);
    }
}