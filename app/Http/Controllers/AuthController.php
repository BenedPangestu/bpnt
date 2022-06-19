<?php

namespace App\Http\Controllers;

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
        $data = [
            'username'     => $request->username,
            'password'  => $request->password,
        ];
        Auth::attempt($data);
        if (Auth::check()) {
            return redirect()->to('admin/dashboard')->with('success', 'Berhasil Login');
        } else {
            return redirect()->back()->with('failed', 'Gagal Login');
        }
    }
}
