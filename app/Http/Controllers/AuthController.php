<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $data = ([
            'title' => 'Login'
        ]);
        return view('pages/home', $data);
    }
    public function login(Request $request)
    {
        $data = User::where('username', $request->username)->first();
        // dd($data);
        if ($data) {
            if ($data->password == $request->password) {
                session(['berhasil_login' => true]);
                return redirect()->to('admin/dashboard')->with('success', 'Berhasil Login');
            }
            return redirect()->back()->with('fail', 'Password Salah');
        } else {
            return redirect()->back()->with('fail', 'Email tidak ditemukan');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
