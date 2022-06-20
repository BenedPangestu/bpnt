<?php

namespace App\Http\Controllers;

use App\masyarakat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $data = ([
            'title'=> 'kecamatan',
            'masyarakat' => masyarakat::all(),
            // 'request' => $request->nama,
        ]);
        return view('pages/admin/dashboard', $data);
    }
}
