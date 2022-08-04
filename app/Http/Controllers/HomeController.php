<?php

namespace App\Http\Controllers;

use App\masyarakat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function realisasi()
    {
        $data = ([
            'title'=> 'kecamatan',
            'masyarakat' => masyarakat::where('status', 'lolos')->get(),
            // 'request' => $request->nama,
        ]);
        return view('pages/home', $data);
    }
}
